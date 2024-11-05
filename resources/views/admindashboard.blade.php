<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset( 'css/admindashboard.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admin-Dashboard</title>
</head>
<body>
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
                <a href="{{ route('MeusPosts.dashboard')}}"><button class="button">Meus Posts</button></a>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container1">
        @foreach($posts as $post)
            <div class="card1">
                <div class="image">
                    @if(!empty($post->image))
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Imagem do Post" style="width: 100%; height: auto; border-radius: 8px;">
                    @else
                        <img class="card-image" src="caminho/para/imagem/padrao.jpg" alt="Imagem padrão">
                    @endif
                </div>
                <div class="content">
                    <p class="title1">
                        <span>{{ $post->title }}</span>
                    </p>
                    <p class="category">
                        Categoria: <span>{{ $post->category }}</span>
                    </p>
                    <p class="content1">{{ $post->content }}</p>
                    <div class="comment-react">
                        <button class="likebtn">
                            <svg class="icon" width="30" height="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path class="heart" d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z"></path></svg>
                            <span>{{ $post->likes }}</span>
                           </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
