<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    // For web admin panel (Laravel Blade)
    public function webIndex()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('admin.messages.index', compact('messages'));
    }

    // For API (Next.js frontend)
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        return response()->json($messages);
    }

    public function markAsRead($id)
    {
        $message = Message::findOrFail($id);
        $message->read_at = now();
        $message->save();

        return response()->json([
            'success' => true,
            'message' => 'Message marked as read'
        ]);
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return response()->json([
            'success' => true,
            'message' => 'Message deleted successfully'
        ]);
    }
}
