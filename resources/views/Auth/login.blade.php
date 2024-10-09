<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset ('css/login.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="form_area">
        <p class="title">Login</p>
        <form action="{{ route('login.action') }}" method="POST">
            @csrf
            <div class="form_group">
                <label class="sub_title" for="email">Email:</label>
                <input placeholder="Email" class="form_style" type="email" id="email" name="email" required>
            </div>
            <div class="form_group">
                <label class="sub_title" for="password">Senha:</label>
                <input placeholder="Senha" class="form_style" type="password" id="password" name="password" required>
            </div>
            <div>
                <button class="btn">Login</button>
                <p>Não tem conta? <a class="link" href="{{ route('Register')}}">Cadastre-se</a></p>
            </a></div>
</body>
</html>
