<x-app-layout>
    <x-slot name="header">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </x-slot>

    <style>
        .other::before {
            content: "";
            position: absolute;
            top: 90%;
            left: -15px;
            margin-top: -30px;
            border: 5px solid transparent;
            border-right: 15px solid #c7deff;
        }

        .self::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 100%;
            margin-top: -15px;
            border: 3px solid transparent;
            border-left: 9px solid #c7deff;
        }
    </style>

    <body class="w-4/5 md:w-3/5 lg:w-2/5 m-auto">
        <div class="my-4 p-4 rounded-lg bg-blue-200">
            <ul>
                @foreach ($chats as $chat)
                    <li class="truncate chat-message {{ $chat->user_name === 'Haruki' ? 'my-message' : 'other-message' }}">
                        <strong>{{ $chat->user_name }}</strong>: {{ $chat->message }}
                    </li>
                @endforeach
            </ul>
        </div>
        <form class="my-4 py-2 px-4 rounded-lg bg-gray-300 text-sm flex flex-col md:flex-row flex-grow" action="{{ route('chat.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_identifier" value="test">
            <input class="py-1 px-2 rounded text-center flex-initial" type="text" name="user_name" placeholder="UserName" maxlength="20">
            <input class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded flex-auto" type="text" name="message" placeholder="Input message." maxlength="200">
            <button class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded text-center bg-gray-500 text-white" type="submit">Send</button>
        </form>
    </body>
    
</x-app-layout>
