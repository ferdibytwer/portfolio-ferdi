<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index', ['title' => 'Contact']);
    }
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

         // Kirim email ke kamu pakai mailable
        Mail::to('youremail@gmail.com')->send(new ContactMail($data));

        // Redirect balik ke form dengan notif sukses
        return redirect()->route('contacts.index')->with('success', 'Email berhasil dikirim!');
    }
}
