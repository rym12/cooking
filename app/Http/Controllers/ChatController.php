<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::latest()->get();
        return view('chat.index', compact('chats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|max:255',
            'message' => 'required',
        ]);

        Chat::create([
            'user_name' => $request->user_name,
            'message' => $request->message,
        ]);

        return redirect()->route('chat.index');
    }
}
