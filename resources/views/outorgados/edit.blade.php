<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Procurados</title>

        <!-- Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,600"
            rel="stylesheet"
        />

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            /* Estilizando formulário */
            .outorgado_form {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .fields {
                text-align: left;
                padding: 5px 0;
            }

            .btn {
                text-align: center;
            }

            .fields input {
                width: 100%;
                line-height: 25px;
                background: transparent;
                box-sizing: border-box;
                outline: none;

                border: none;
                border-bottom: 1px solid #ccc;
            }

            .fields input[type="submit"] {
                margin: 0 auto;
                width: 100px;
                height: 50px;
                background: #ccc;
                border: none;
                outline: none;
                padding: 10px 20px;
                cursor: pointer;
                border-radius: 5px;
                transition: 1s;
            }

            .fields input[type="submit"]:hover {
                background: #eca72c;
                transition: 1s;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Atualizar Outorgado
                </div>

                <div class="outorgado_form">
                    <form method="POST" action="{{route('outorgados.update', $outorgado->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="fields nome">
                            <label for="nome">Nome</label>
                            <input
                                id="nome"
                                name="nome"
                                type="text"
                                value="{{$outorgado->nome}}"
                            >
                        </div>

                        <div class="fields nacionalidade">
                            <label for="nacionalidade">Nacionalidade</label>
                            <input
                                id="nacionalidade"
                                name="nacionalidade"
                                type="text"
                                value="{{$outorgado->nacionalidade}}"
                            >
                        </div>

                        <div class="fields estado_civil">
                            <label for="estado_civil">Estado Civil</label>
                            <input
                                id="estado_civil"
                                name="estado_civil"
                                type="text"
                                value="{{$outorgado->estado_civil}}"
                            >
                        </div>

                        <div class="fields profissao">
                            <label for="profissao">Profissão</label>
                            <input
                                id="profissao"
                                name="profissao"
                                type="text"
                                value="{{$outorgado->profissao}}"
                            >
                        </div>

                        <div class="fields CPF">
                            <label for="CPF">CPF</label>
                            <input
                                id="CPF"
                                name="CPF"
                                type="text"
                                value="{{$outorgado->CPF}}"
                            >
                        </div>

                        <div class="fields email">
                            <label for="email">Email</label>
                            <input
                                id="email"
                                name="email"
                                type="text"
                                value="{{$outorgado->email}}"
                            >
                        </div>

                        <div class="fields endereco">
                            <label for="endereco">Endereço</label>
                            <input
                                id="endereco"
                                name="endereco"
                                type="text"
                                value="{{$outorgado->endereco}}"
                            >
                        </div>

                        <div class="fields RG">
                            <label for="RG">RG</label>
                            <input
                                id="RG"
                                name="RG"
                                type="text"
                                value="{{$outorgado->RG}}"
                            >
                        </div>

                        <div class="fields UF">
                            <label for="UF">UF</label>
                            <input
                                id="UF"
                                name="UF"
                                type="text"
                                value="{{$outorgado->UF}}"
                            >
                        </div>

                        <div class="fields orgao_emissor">
                            <label for="orgao_emissor">Órgão Emissor</label>
                            <input
                                id="orgao_emissor"
                                name="orgao_emissor"
                                type="text"
                                value="{{$outorgado->orgao_emissor}}"
                            >
                        </div>

                        <div class="fields btn">
                            <input type="submit" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
