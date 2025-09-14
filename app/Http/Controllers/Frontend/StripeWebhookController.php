<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TestPurchase;
use Illuminate\Http\Request;

class StripeWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $secret = config('services.stripe.webhook.secret') ?: env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = \Stripe\Webhook::constructEvent($payload, $sigHeader, $secret);
        } catch (\UnexpectedValueException $e) {
            return response('Invalid payload', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return response('Invalid signature', 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            $purchaseId = $session->metadata->purchase_id ?? null;

            if ($purchaseId) {
                $purchase = TestPurchase::find($purchaseId);
                if ($purchase && $purchase->status !== 'succeeded') {
                    $purchase->update([
                        'status' => 'succeeded',
                        'stripe_payment_intent_id' => $session->payment_intent ?? null,
                    ]);

                    // grant access: create PersonalityResult or mark "purchased"
                    // PersonalityResult::create([...]) OR add a "can_take" flag on user/test
                }
            }
        }

        return response('Webhook handled', 200);
    }
}

