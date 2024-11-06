@extends('layouts.default')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/meusposts.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Meus Posts</title>
    </head>

    <body>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container mt-4 d-flex justify-content-center">
            <div class="row justify-content-center">
                @foreach ($posts as $post)
                    <div class="col-md-4 mb-4 d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>
                                <!-- Limita o conteúdo a 100 caracteres -->
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('meusposts.edit', $post->id) }}" class="btn1">Editar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
@endsection

</html>
