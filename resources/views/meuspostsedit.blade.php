<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/meuspostsedit.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Editar Meu Post</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="title-navbar" href="#">SimpleBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a href="{{ route('Admin.dashboard') }}"><button class="button">Home</button></a>
                    <a href="{{ route('NovoPost.dashboard') }}"><button class="button">Novo Post</button></a>
                    <button class="button">Meus Posts</button>
                </ul>
            </div>
        </div>
    </nav>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('Novosposts.dashboard') }}" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="form_area">
                <p class="title">Editar Post</p>
                @csrf
                <div class="form_group">
                    <label class="sub_title" for="title">Título</label>
                    <input placeholder="Título" class="form_style" type="text" id="title" name="title"
                        value="{{ $post->title }}" required>
                </div>
                <div class="form_group">
                    <label class="sub_title" for="content">Conteúdo</label>
                    <input placeholder="Conteúdo" class="form_style" type="text" id="content" name="content"
                        value="{{ $post->content }}" required>
                </div>
                <div class="form-group">
                    <label for="category">Categoria</label>
                    <input type="text" name="category" id="category" class="form-control"
                        value="{{ $post->category }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Imagem</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Imagem atual" class="img-thumbnail mt-2"
                            width="200px">
                    @endif
                </div>
                <button class="btn1" type="submit">Editar Post</button>
            </div>
        </div>
    </form>
</body>
</html>
