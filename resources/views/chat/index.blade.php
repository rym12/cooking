<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </x-slot>

    <style>
        /* メッセージコンテナのスタイル */
        .message-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* 基本的なメッセージのスタイル */
        .message {
            display: inline-block;
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
            clear: both;
        }

        /* ユーザー自身のメッセージのスタイル */
        .self .message {
            background-color: #c7deff;
            align-self: flex-end;
        }

        /* 他のユーザーのメッセージのスタイル */
        .other .message {
            background-color: #f0f0f0;
        }
    </style>

    <!-- 画面の全体的なレイアウトを設定 -->
    <body class="w-4/5 md:w-3/5 lg:w-2/5 m-auto">
        <!-- メッセージ表示エリア -->
        <div class="my-4 p-4 rounded-lg bg-blue-200">
            <ul class="message-container">
                @foreach ($chats as $chat)
                    <li class="message {{ $chat->user_name === 'Haruki' ? 'self' : 'other' }}">
                        <p class="text-xs">{{ $chat->created_at }} ＠{{ $chat->user_name }}</p>
                        {{ $chat->message }}
                    </li>
                @endforeach
            </ul>
        </div>
        
        <!-- メッセージ送信フォーム -->
        <form class="my-4 py-2 px-4 rounded-lg bg-gray-300 text-sm flex flex-col md:flex-row flex-grow" action="/chat" method="POST">
            @csrf
            <input type="hidden" name="user_identifier" value="test">
            <input class="py-1 px-2 rounded text-center flex-initial" type="text" name="user_name" placeholder="UserName" maxlength="20">
            <input class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded flex-auto" type="text" name="message" placeholder="Input message." maxlength="200">
            <button class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded text-center bg-gray-500 text-white" type="submit">Send</button>
        </form>
    </body>
</x-app-layout>
