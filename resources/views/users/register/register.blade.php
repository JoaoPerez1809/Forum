<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Ajuste para ocupar toda a altura da viewport */
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
            text-align: center;
        }
        header {
            background-color: #fff;
            border-bottom: 1px solid #ddd;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000; /* Garante que a barra de navegação esteja acima do conteúdo */
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1000px; /* Ajuste para aumentar a largura máxima da barra de navegação */
            margin: 0 auto; /* Centraliza a barra de navegação */
            padding: 10px 20px; /* Ajuste no padding para espaçamento interno */
        }
        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .navbar ul li {
            margin-right: 15px;
        }
        .navbar ul li:first-child {
            margin-right: auto; /* Empurra o primeiro item para o canto esquerdo */
        }
        .navbar ul li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            font-weight: 600;
        }
        .navbar ul li a:hover {
            color: #007bff;
        }
        h1 {
            color: #4CAF50;
        }
        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 15px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
            box-sizing: border-box;
            background-color: #f0f0f0;
            font-size: 16px;
            color: #333;
        }
        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="password"] {
            padding-left: 17px;
            background-repeat: no-repeat;
            background-position: 10px center;
            background-size: 20px 20px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }
        .content {
            margin-top: 80px; /* Ajuste para compensar a altura da barra de navegação fixa */
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <div>
                <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Pagina Inicial</a>
            </div>
            <div>
                <ul>
                    @auth
                        <li><a href="{{ route('ListUser', ['uid' => Auth::user()->id]) }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Perfil</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Cadastrar</a></li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="container">
            <h1>Cadastrar-se</h1>
            <form id="registration-form" action="{{ route('register') }}" method="post" >
                @csrf
                <input type="text" id="name" name="name" placeholder="Nome" value="{{ old('name')}}" required>
                @error('name') <span>{{ $message }} </span> @enderror
                <input type="email" id="email" name="email" placeholder="E-mail" value="{{ old('email')}}" required>
                @error('email') <span>{{ $message }} </span> @enderror
                <input type="password" id="password" name="password" placeholder="Senha" value="{{ old('password')}}" required>
                @error('password') <span>{{ $message }} </span> @enderror
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Senha de Confirmação" required>
                <!--<input type="text" id="datepicker" placeholder="Data de Nascimento" required title="Preencher o campo">-->
                <input type="submit" value="Cadastrar" id="submit-button">
            </form>
        </div>
    </div>
</body>
</html>
