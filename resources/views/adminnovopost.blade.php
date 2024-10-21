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
                <a href="{{ route('Admin.dashboard')}}"><button class="button">Home</button></a>
                <a href="{{ route('NovoPost.dashboard')}}"><button class="button">Novo Post</button></a>
                <a href="{{ route('MeusPosts.dashboard')}}"><button class="button">Meus Posts</button></a>
            </ul>
            </div>
        </div>
    </nav>
</div>
    @if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('Novosposts.dashboard') }}" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="form_area">
                <p class="title">Novo Post</p>
                @csrf
                <div class="form_group">
                    <label class="sub_title" for="title">Título</label>
                    <input placeholder="Título" class="form_style" type="text" id="title" name="title" required>
                </div>
                <div class="form_group">
                    <label class="sub_title" for="content">Conteúdo</label>
                    <input placeholder="Conteúdo" class="form_style" type="text" id="content" name="content" required>
                </div>
                <div class="form_group">
                    <label class="sub_title" for="category">Categoria</label>
                    <select class="form_style" id="category" name="category" required>
                        <option value="" disabled selected>Escolha uma categoria</option>
                        <option value="Tecnologia">Tecnologia</option>
                        <option value="Educação">Educação</option>
                        <option value="Saúde">Saúde</option>
                        <option value="Entretenimento">Entretenimento</option>
                    </select>
                </div>
                <div class="form_group">
                    <div class="mb-3">
                        <label for="imageUpload" class="form-label">Upload Image</label>
                        <input class="form-control" type="file" id="image" name="image" accept="image/*">
                    </div>
                </div>
                <button class="btn1" type="submit">Adicionar Post</button>
            </div>
        </div>
    </form>

</body>
</html>

