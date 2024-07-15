<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendNoticeEmailRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NoticeEmailController extends Controller
{
    public function noticeEmail()
    {
        $users = User::all();
        return view("notice-email",compact("users"));
    }

    public function sendNoticeEmail(SendNoticeEmailRequest $request)
    {
        $text_body = $request->input("text-body");
        $user = Auth::user();
        $email = $request->input("email");
        $subject = $request->input("subject");

        Mail::raw($text_body,function($message) use($email,$subject){
            $message->to($email)->subject($subject);
        });

        return redirect(route("email.write"));
    }
}
