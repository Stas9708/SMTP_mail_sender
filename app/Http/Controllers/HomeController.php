<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailService;
use App\Models\Email;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'from' => 'email',
            'to' => 'email',
            'cc' => 'nullable|email',
            'subject' => 'required|string|max:255',
            'type' => 'required',
            'body' => 'required|string',
        ]);
        $sendMail = MailService::send($validated['from'], $validated['to'], $validated['subject'], $validated['body'],
            $validated['type'], $validated['cc']);
        if ($sendMail) {
            $email = Email::create([
                'uuid' => Str::uuid()->toString(),
                'sender_address' => $validated['from'],
                'recipient_address' => $validated['to'],
                'copy_address_letter' => $validated['cc'],
                'ip' => $request->getClientIp(),
                'user_agent' => $request->userAgent(),
            ]);
            return redirect()->route('success', ['uuid' => $email->uuid])->with([
                'from_address' => $validated['from'],
                'to_address' => $validated['to'],
                'copy_address' => $validated['cc'],
                'letter_type' => $validated['type'],
                'letter_body' => $validated['body'],
            ]);
        } else {
            return redirect()->route('home')->with('error_message', 'Something went wrong');
        }
    }
}

