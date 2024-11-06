<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="title-navbar" href="#">SimpleBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a href="{{ route('Admin.dashboard') }}"><button class="button">Home</button></a>
                    <a href="{{ route('NovoPost.dashboard') }}"><button class="button">Novo Post</button></a>
                    <a href="{{ route('MeusPosts.dashboard') }}"><button class="button">Meus Posts</button></a>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
