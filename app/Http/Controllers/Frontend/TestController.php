<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PersonalityResult;
use App\Models\PersonalityTest;
use App\Models\TestPurchase;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestController extends Controller
{
    public function info($id = null): View
    {
        $test = PersonalityTest::find($id) ?? PersonalityTest::first();

        return view('frontend.pages.test.info', compact('test'));
    }

    public function take($id = null)
    {
        $test = PersonalityTest::with('scales.questions')->find($id) ?? PersonalityTest::with('scales.questions')->first();

        if (! $test) {
            abort(404, 'No tests available');
        }

        $purchase = TestPurchase::where('user_id', auth()->id())
            ->where('test_id', $test->id)
            ->where('status', 'succeeded')
            ->first();

        if (! $purchase && $test->price > 0) {
            return redirect()->route('tests.checkout', $test);
        }

        $questions = $test->scales->flatMap(function ($scale) {
            return $scale->questions->map(function ($q) use ($scale) {
                return [
                    'id'    => $q->id,
                    'text'  => $q->question,
                    'scale' => $scale->id,
                ];
            });
        })->values();

        return view('frontend.pages.test.take', compact('test', 'questions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'test_id' => 'required|exists:personality_tests,id',
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:personality_questions,id',
            'answers.*.answer_value' => 'required|in:yes,no',
        ]);

        $test = PersonalityTest::with(['scales.questions'])->findOrFail($data['test_id']);

        // Convert answers into [question_id => yes/no]
        $answers = collect($data['answers'])->mapWithKeys(function ($item) {
            return [$item['question_id'] => $item['answer_value']];
        });

        // Calculate diagnosis per scale
        $diagnosis = [];
        foreach ($test->scales as $scale) {
            $score = 0;
            foreach ($scale->questions as $question) {
                if (($answers[$question->id] ?? null) === 'yes') {
                    $score++;
                }
            }

            $diagnosis[$scale->id] = $score >= $scale->threshold;
        }

        // Save result
        $result = PersonalityResult::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'test_id' => $test->id,
            ],
            [
                'answers'   => $answers,     // saved as JSON
                'diagnosis' => $diagnosis,   // saved as JSON
            ]
        );

        return response()->json([
            'success'    => true,
            'message'    => 'Test submitted successfully',
            // 'result_id'  => $result->id,
            // 'diagnosis'  => $diagnosis,
        ]);
    }

    public function completed(): View
    {
        return view('frontend.pages.test.completed');
    }
}
