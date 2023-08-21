<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use App\Models\Feedback;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{
    public function showFeedback(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('feedback');
    }

    public function create(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required|max:200',
        ]);

        Feedback::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'comment' => $data['comment'],
        ]);

        $feedbackEmail = config('app.mail_username');
        Mail::to($feedbackEmail)->send(new FeedbackMail($data));

        return back()->with('success', 'Feedback submitted successfully');
    }

    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $feedback = Feedback::orderBy('created_at', 'desc')->get();
        return view('feedback', compact('feedback'));
    }

    public function delete($id): RedirectResponse
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->route('feedback.index');
    }
}
