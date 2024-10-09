<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset ('css/register.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="form_area">
            <p class="title">Cadastre-se</p>
            <form action="{{ route('register.save') }}" method="POST">
                @csrf
                <div class="form_group">
                    <label class="sub_title" for="name">Nome:</label>
                    <input placeholder="Nome" class="form_style" type="text" id="name" name="name" required>
                </div>
                <div class="form_group">
                    <label class="sub_title" for="email">Email:</label>
                    <input placeholder="Email" class="form_style" type="email" id="email" name="email" required>
                </div>
                <div class="form_group">
                    <label class="sub_title" for="password">Senha:</label>
                    <input placeholder="Senha" class="form_style" type="password" id="password" name="password" required>
                </div>
                <div class="form_group">
                    <div class="radio-input">
                        <label class="label" for="admin">
                            <input
                                type="radio"
                                id="admin"
                                name="role"
                                value="admin"
                                checked
                            />
                            <p class="text">Admin</p>
                        </label>
                        <label class="label" for="user">
                            <input
                                type="radio"
                                id="user"
                                name="role"
                                value="user"
                            />
                            <p class="text">User</p>
                        </label>
                    </div>
                </div>
                <button class="btn" type="submit">Cadastre-se</button>
                <p>Já possui uma conta? <a class="link" href="{{ route('Login') }}">Faça login!</a></p>
            </form>
        </div>
    </div>
</body>
</html>
