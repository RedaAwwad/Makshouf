<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $results = $user->personalityResults()
            ->with('test')
            // ->latest()
            ->get();

        return view('frontend.pages.user-dashboard', compact('user', 'results'));

        return view('frontend.pages.user-dashboard', compact('user'));
    }
}
