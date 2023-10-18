<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel View</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<div class="container">
    <form action="{{ route('family.create') }}" method="POST">
        @csrf
        <label for="family_id">Family id を入力してください</label>
        <input type="text" id="family_id" name="family_id" placeholder="入力してください">
        <label for="family_id">Family name を入力してください</label>
        <input type="text" id="family_name" name="family_name" placeholder="入力してください">
        <button type="submit">送信</button>
    </form>
</div>