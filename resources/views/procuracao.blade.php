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

            .select {
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
                            <select
                                id="outorgados_select"
                                class="select"
                                onchange="outorgadoChange()">

                                <option>Selecione um outorgado</option>

                                @foreach($outorgados as $outorgado)
                                    <option
                                        class="outorgado_opt"
                                        id="{{$outorgado->id}}"
                                        name="{{$outorgado->id}}">

                                        {{$outorgado->id}}
                                        {{$outorgado->nome}}

                                    </option>
                                @endforeach

                                <input
                                    type='hidden'
                                    id='outorgado_id'
                                    name='outorgado_id'
                                    value=''
                                />

                            </select>
                        </div>

                        <div class="fields outorgantes">
                            <label for="outorgantes">Outorgantes</label>
                            <select
                                id="outorgantes_select"
                                class="select"
                                onchange="outorganteChange()">

                                <option>Selecione um outorgante</option>

                                @foreach($outorgantes as $outorgante)
                                    <option
                                        class="outorgante_opt"
                                        id="{{$outorgante->id}}"
                                        name="{{$outorgante->id}}">

                                        {{$outorgante->id}}
                                        {{$outorgante->nome}}

                                    </option>
                                @endforeach

                                <input
                                    type='hidden'
                                    id='outorgante_id'
                                    name='outorgante_id'
                                    value=''
                                />

                            </select>
                        </div>

                        <div class="fields tipos_juridicos">
                            <label for="tipos_juridicos">Tipo Jurídico</label>
                            <select
                                id="tipos_juridicos_select"
                                class="select"
                                onchange="tiposJuridicosChange()">

                                <option>Selecione um tipo jurídico</option>

                                @foreach($tipos_juridicos as $tipo_juridico)
                                    <option
                                        class="tipo_juridico_opt"
                                        id="{{$tipo_juridico->id}}"
                                        name="{{$tipo_juridico->id}}">

                                        {{$tipo_juridico->id}}
                                        {{$tipo_juridico->texto}}

                                    </option>
                                @endforeach

                                <input
                                    type='hidden'
                                    id='tipojuridico_id'
                                    name='tipojuridico_id'
                                    value=''
                                />

                            </select>
                        </div>

                        <div class="fields operacoes">
                            <label for="operacoes">Operação</label>
                            <select
                                id="operacoes_select"
                                class="select"
                                onchange="operacoesChange()">

                                <option>Selecione uma operação</option>

                                @foreach($operacoes as $operacao)
                                    <option
                                        class="tipo_juridico_opt"
                                        id="{{$tipo_juridico->id}}"
                                        name="{{$tipo_juridico->id}}">

                                        {{$operacao->id}}
                                        {{$operacao->texto}}

                                    </option>
                                @endforeach

                                <input
                                    type='hidden'
                                    id='operacao_id'
                                    name='operacao_id'
                                    value=''
                                />

                            </select>
                        </div>

                        <div class="fields local">
                            Local da assinatura: 
                            <input id="local" name="local" type="text">
                        </div>

                        <div class="fields data">
                            Data da procuração: 
                            <input id="data" name="data" type="date">
                        </div>


                        <div class="fields btn">
                            <input type="submit" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function outorgadoChange() {
                var e = document.getElementById("outorgados_select");
                var selectedItem = e.options[e.selectedIndex].value;
                var id = selectedItem[0];
                document.getElementById("outorgado_id").value = id;
            }

            function outorganteChange() {
                var e = document.getElementById("outorgantes_select");
                var selectedItem = e.options[e.selectedIndex].value;
                var id = selectedItem[0];
                document.getElementById("outorgante_id").value = id;
            }

            function tiposJuridicosChange() {
                var e = document.getElementById("tipos_juridicos_select");
                var selectedItem = e.options[e.selectedIndex].value;
                var id = selectedItem[0];
                document.getElementById("tipojuridico_id").value = id;
            }

            function operacoesChange() {
                var e = document.getElementById("operacoes_select");
                var selectedItem = e.options[e.selectedIndex].value;
                var id = selectedItem[0];
                document.getElementById("operacao_id").value = id;
            }
        </script>

    </body>
</html>
