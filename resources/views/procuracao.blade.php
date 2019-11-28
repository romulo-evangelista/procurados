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
                    Nova Procuração
                </div>
                <div class="outorgado_form">
                    <form method="POST" action="{{route('documento')}}">
                        @csrf

                        <div class="fields outorgados">
                            <label for="outorgados">Outorgado</label>
                            <select class="outorgados_select">
                                @foreach($outorgados as $outorgado)
                                    <option class="outorgado_opt">
                                        {{$outorgado->email}}
                                        <input
                                            type="hidden"
                                            id="outorgado_id"
                                            name="outorgado_id"
                                            value="{{$outorgado->id}}"
                                        />
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fields outorgantes">
                            <label for="outorgantes">Outorgantes</label>
                            <select class="outorgantes_select">
                                @foreach($outorgantes as $outorgante)
                                    <option class="outorgante_opt">
                                        {{$outorgante->email}}
                                        <input
                                            type="hidden"
                                            id="outorgante_id"
                                            name="outorgante_id"
                                            value="{{$outorgante->id}}"
                                        />
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fields tipos_juridicos">
                            <label for="tipos_juridicos">Tipo Jurídico</label>
                            <select class="tipos_juridicos_select">
                                @foreach($tipos_juridicos as $tipo_juridico)
                                    <option class="tipo_juridico_opt">
                                        {{$tipo_juridico->texto}}
                                        <input
                                            type="hidden"
                                            id="tipo_juridico_id"
                                            name="tipo_juridico_id"
                                            value="{{$tipo_juridico->id}}"
                                        />
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fields operacoes">
                            <label for="operacoes">Operação</label>
                            <select class="operacoes_select">
                                @foreach($operacoes as $operacao)
                                    <option class="operacao_opt">
                                        {{$operacao->texto}}
                                        <input
                                            type="hidden"
                                            id="operacao_id"
                                            name="operacao_id"
                                            value="{{$operacao->id}}"
                                        />
                                    </option>
                                @endforeach
                            </select>
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
