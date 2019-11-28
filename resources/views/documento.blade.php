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

            .outorgados_select,
            .outorgantes_select,
            .tipos_juridicos_select,
            .operacoes_select {
                width: 100%;
                line-height: 25px;
                background: transparent;
                box-sizing: border-box;
                outline: none;
                border: none;
                border-bottom: 1px solid #ccc;
            }

            .fields input[type="button"] {
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

            .fields input[type="button"]:hover {
                background: #eca72c;
                transition: 1s;
            }

            .conteudo {
                text-align: justify;
                width: 550px;
            }

            #assinatura {
                display:  flex;
                flex-direction: row;
                justify-content: space-around;
            }
        </style>
    </head>
    <body>

        @include('./layouts/nav')

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
                    Procuração
                </div>

                <div class="conteudo">

                    <b>OUTORGANTE</b> (s): <br>
                    {{$outorgante->nome}},
                    {{$outorgante->CPF }},
                    {{$outorgante->nacionalidade}},
                    {{$outorgante->estado_civil}},
                    {{$outorgante->profissao}},
                    {{$outorgante->RG}} - {{$outorgante->orgao_emissor}}-{{$outorgante->UF}},
                    {{$outorgante->endereco}},
                    {{$outorgante->email}}

                    <br>
                    <br>

                    <b>OUTORGADO</b> (s): <br>
                    {{$outorgado->nome}},
                    {{$outorgado->CPF}},
                    {{$outorgado->nacionalidade}},
                    {{$outorgado->estado_civil}},
                    {{$outorgado->profissao}},
                    {{$outorgado->RG}} - {{$outorgado->orgao_emissor}}-{{$outorgado->UF}},
                    {{$outorgado->endereco}},
                    {{$outorgado->email}}

                    <br>
                    <br>

                    @php
                        if(strpos($conteudo->texto, "(nome_empresario)"))
                            $replaced = str_replace("(nome_empresario)",
                                $outorgante->nome,
                                $conteudo->texto);

                        if(strpos($conteudo->texto, "(nome_empresarial)"))
                            $replaced = str_replace("(nome_empresarial)",
                                $outorgante->nome_empresarial,
                                $conteudo->texto);
                    @endphp

                    {{$replaced}}

                    <br>
                    <br>
                    <br>
                    {{$local}}, {{$data}}

                    <br>
                    <br>


                    <div id="assinatura">
                        {{$outorgante->nome}}<br>
                        {{$outorgante->CPF}} <br>
                  </div>

                </div>
            </div>
        </div>
    </body>
</html>
