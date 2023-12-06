<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- font awesome  --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css'
        integrity='sha512-KOWhIs2d8WrPgR4lTaFgxI35LLOp5PRki/DxQvb7mlP29YZ5iJ5v8tiLWF7JLk5nDBlgPP1gHzw96cZ77oD7zQ=='
        crossorigin='anonymous' />

    {{-- stile vue  --}}
    @vite('resources/js/app.js')


    {{-- titolo  --}}
    <title>Laravel Boolfolio - API</title>
</head>

<body>

    @include('guest.partials.header')

    <div id="my-home">
        <div class="my-home container py-4">
            @yield('content')
        </div>
    </div>


</body>

</html>
