<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset ('css/novopost.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Novo Post</title>
</head>
<body>
    <div class="container1"></div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="title-navbar" href="#">SimpleBlog</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <button class="button">Home</button>
                <a href="{{ route('NovoPost.dashboard')}}"><button class="button">Novo Post</button></a>
                <button class="button">Meus Posts</button>
            </ul>
            </div>
        </div>
    </nav>
</div>
    <div class="container">
        <div class="form_area">
            <p class="title">Novo Post</p>
            <form action="{{ route('register.save') }}" method="POST">
                @csrf
                <div class="form_group">
                    <label class="sub_title" for="title">Titulo</label>
                    <input placeholder="title" class="form_style" type="text" id="title" name="title" required>
                </div>
                <div class="form_group">
                    <label class="sub_title" for="content">Content</label>
                    <input placeholder="Content" class="form_style" type="content" id="content" name="content" required>
                </div>
                <button class="btn" type="submit">Adicionar Post</button>
            </form>
        </div>
    </div>
</body>
</html>

