@extends('admin.layout')

@section('content')
    <div class="bg-white shadow-sm rounded-lg">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900">Contact Messages</h2>
            <p class="mt-1 text-sm text-gray-600">Messages received from portfolio contact form</p>
        </div>

        <div class="p-6">
            @if ($messages->count() === 0)
                <div class="text-center py-12 bg-gray-50 rounded-lg">
                    <p class="text-gray-500">No messages yet</p>
                </div>
            @else
                <div class="space-y-4">
                    @foreach ($messages as $message)
                        <div
                            class="border rounded-lg {{ $message->read_at ? 'bg-gray-50 opacity-75' : 'bg-white border-blue-200' }} p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-2">
                                        <h3 class="text-lg font-bold text-gray-900">{{ $message->name }}</h3>
                                        @if (!$message->read_at)
                                            <span class="px-2 py-0.5 text-xs font-semibold bg-blue-600 text-white rounded-full">
                                                New
                                            </span>
                                        @endif
                                    </div>
                                    <p class="text-sm text-gray-600">
                                        {{ $message->email }} • {{ $message->created_at->format('M d, Y h:i A') }}
                                    </p>
                                    @if ($message->subject)
                                        <p class="text-sm font-medium mt-1">Subject: {{ $message->subject }}</p>
                                    @endif
                                </div>
                                <div class="flex gap-2">
                                    @if (!$message->read_at)
                                        <form action="{{ route('messages.read', $message->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="px-3 py-1.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                                Mark Read
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this message?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1.5 text-sm font-medium text-red-600 bg-white border border-red-300 rounded-md hover:bg-red-50">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="p-4 bg-gray-100 rounded-lg">
                                <p class="whitespace-pre-wrap text-gray-800">{{ $message->message }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection