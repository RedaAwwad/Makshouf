<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PersonalityTest;
use App\Models\TestPurchase;
use Illuminate\Http\Request;

class TestPaymentController extends Controller
{
    public function checkout(Request $request, PersonalityTest $test)
    {
        $user = $request->user();
        if (! $test->price) {
            return back()->with('error', 'This test is not payable.');
        }

        // Create DB record (pending)
        $purchase = TestPurchase::create([
            'user_id' => $user->id,
            'test_id' => $test->id,
            'amount_cents' => (int) ($test->price * 100),
            'currency' => $test->currency,
            'status' => 'pending',
        ]);

        // Create Stripe Checkout Session
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret', env('STRIPE_SECRET')));
        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => [[
                'price_data' => [
                    'currency' => $test->currency,
                    'product_data' => ['name' => $test->title],
                    'unit_amount' => (int) ($test->price * 100),
                ],
                'quantity' => 1,
            ]],
            'metadata' => [
                'purchase_id' => $purchase->id,
                'test_id' => $test->id,
                'user_id' => $user->id,
            ],
            'success_url' => route('tests.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => url()->previous(),
        ]);

        // store session id
        $purchase->update(['stripe_session_id' => $session->id]);

        // redirect user to Stripe-hosted checkout page
        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        if (! $sessionId) return redirect('/')->with('error', 'Missing session ID.');

        $stripe = new \Stripe\StripeClient(config('services.stripe.secret', env('STRIPE_SECRET')));
        $session = $stripe->checkout->sessions->retrieve($sessionId, ['expand' => ['payment_intent']]);

        // find purchase by metadata or session id
        $purchaseId = $session->metadata->purchase_id ?? null;
        $purchase = $purchaseId ? TestPurchase::find($purchaseId) : TestPurchase::where('stripe_session_id', $sessionId)->first();

        if ($session->payment_status === 'paid' && $purchase) {
            $purchase->update([
                'status' => 'succeeded',
                'stripe_payment_intent_id' => is_object($session->payment_intent)
                    ? $session->payment_intent->id
                    : $session->payment_intent,
            ]);

            // grant access: e.g. create a personality_results row or mark allowed
            // return redirect to test-taking page
            return redirect()->route('frontend.tests.take', [$purchase->test_id])->with('success','Payment successful. You can take the test now.');
        }

        return redirect()->route('frontend.tests.info', [$purchase->test_id ?? null])->with('error','Payment not confirmed yet.');
    }
}
