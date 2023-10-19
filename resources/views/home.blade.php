<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel View</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-12 p-4">
    <div class="grid grid-cols-3 gap-4">
        <!-- Calendar Button -->
        <div>
            <a href="{{ route('calendar') }}" class="block w-full px-6 py-2 bg-blue-500 text-white text-center rounded">Calendar</a>
        </div>


        <!-- Chat Button -->
        <div class="flex items-center justify-center h-screen">
            <div class="block w-64 h-32 mx-auto px-6 py-6 bg-gray-400 text-black rounded-full flex items-center justify-center">
                <!-- ここのhrefにはchat機能のrouteを参照してください。byいいだ -->
                <a href="" class="block w-64 h-32 mx-auto px-6 py-6 bg-gray-400 text-black rounded-full flex items-center justify-center">Chat</a>
            </div>
        </div>
       

        <!-- Family List -->
        <div class="absolute bottom-4 right-4">
            @foreach($users as $user)
                <div class="flex justify-between items-center bg-white p-2 mb-2 rounded">
                    {{ $user->name }}
                    <select class="border bg-gray-100 rounded">
                        <option value="sleeping">就寝中</option>
                        <option value="out">外出中</option>
                        <option value="home">家</option>
                    </select>
                </div>
            @endforeach
        </div>


        </div>
    </div>
</div>

</body>
</html>
