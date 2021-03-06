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

            /* Estilizando lista */
            .outorgantes_list {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .outorgante_data {
                padding: 10px;
            }

            table {
                padding: 15px;
                text-align: left;
            }

            table tr td,
            table tr th {
                padding: 10px;
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
                    Outorgantes <a href="{{route('outorgantes.create')}}">+</a>
                </div>

                <div class="outorgantes_list">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Nome Empresarial</th>
                            <th>Nacionalidade</th>
                            <th>Estado Civil</th>
                            <th>Profissão</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Endereço</th>
                            <th>RG</th>
                            <th>UF</th>
                            <th>Órgão Emissor</th>
                            <th>Ações</th>
                        </tr>

                        @foreach($outorgantes as $o)
                            <tr>
                                <td>{{$o->id}}</td>
                                <td>{{$o->nome}}</td>
                                <td>{{$o->nome_empresarial}}</td>
                                <td>{{$o->nacionalidade}}</td>
                                <td>{{$o->estado_civil}}</td>
                                <td>{{$o->profissao}}</td>
                                <td>{{$o->CPF}}</td>
                                <td>{{$o->email}}</td>
                                <td>{{$o->endereco}}</td>
                                <td>{{$o->RG}}</td>
                                <td>{{$o->UF}}</td>
                                <td>{{$o->orgao_emissor}}</td>
                                <td>
                                    <form method="GET" action="{{route('outorgantes.edit', $o)}}" >
                                        @csrf

                                        <button type="submit">Editar</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{route('outorgantes.destroy', $o->id)}}">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
