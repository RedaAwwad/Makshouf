<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('frontend.pages.contact');
    }

    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        ContactMessage::create([
            'user_id'   => Auth::id(),
            'name'      => $request->validated('name'),
            'email'     => $request->validated('email'),
            'subject'   => $request->validated('subject'),
            'message'   => $request->validated('message'),
            'ip_address'=> $request->ip(),
        ]);

        return redirect()
            ->back()
            ->with('success', 'تم إرسال رسالتك بنجاح، سنتواصل معك قريبًا.');
    }
}
