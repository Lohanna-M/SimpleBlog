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
                        <img class="card-image" src="{{ asset('storage/' . $post->image) }}" alt="Imagem do Post" style="width: 100%; height: auto; border-radius: 8px;">
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
                  <button>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="22"
                      height="22"
                      viewBox="0 0 24 24"
                      fill="none"
                    >
                      <path
                        d="M19.4626 3.99415C16.7809 2.34923 14.4404 3.01211 13.0344 4.06801C12.4578 4.50096 12.1696 4.71743 12 4.71743C11.8304 4.71743 11.5422 4.50096 10.9656 4.06801C9.55962 3.01211 7.21909 2.34923 4.53744 3.99415C1.01807 6.15294 0.221721 13.2749 8.33953 19.2834C9.88572 20.4278 10.6588 21 12 21C13.3412 21 14.1143 20.4278 15.6605 19.2834C23.7783 13.2749 22.9819 6.15294 19.4626 3.99415Z"
                        stroke="#707277"
                        stroke-width="2"
                        stroke-linecap="round"
                        fill="#707277"
                      ></path>
                    </svg>
                  </button>

                  <span>{{$post->likes}}</span>
                </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
