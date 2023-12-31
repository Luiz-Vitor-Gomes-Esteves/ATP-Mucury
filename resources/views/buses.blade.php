<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ATPMucury | Buses</title>
    @include('./layouts/css')
</head>
<body class="Standart-Background">
    @include('./layouts/menu')

    @include('./layouts/header')

    <div class="Cadastrar-Form">
        <div class="Menu-Form">
            <a class="Option-Menu-Form ativo" href="#" data-target="icon1-content">Cadastrar</a>
            <a class="Option-Menu-Form" href="#" data-target="icon2-content">Editar</a>
        </div>

<!--Tipo-->
        <div class="Page-Form" id="icon1-content">
            <form method="post" class="Form-Padrao" action="{{route('Buses.register')}}">
                @csrf <!-- Token CSRF para proteção contra ataques -->
                <br>
                    <label class="Label-Form" for="name">Placa do ônibus</label>
                    <input class="Input-Form" type="text" name="plate" value="{{old('plate')}}">
                    @error('plate')
                                <span class="error-message">O campo é obrigatório.</span>
                    @enderror
                <br>
                    <label class="Label-Form" for="name">Modelo do ônibus</label>
                    <input class="Input-Form" type="text" name="model" value="{{old('model')}}">
                    @error('model')
                                <span class="error-message">O campo é obrigatório.</span>
                    @enderror
                <br>
                    <label class="Label-Form" for="name">Horário de saida</label>
                    <input class="Input-Form" type="time" name="hourLeft" value="{{old('hourLeft')}}">
                    @error('hourLeft')
                                <span class="error-message">O campo é obrigatório.</span>
                    @enderror
                <br>
                    <label class="Label-Form" for="route_id">Escolha a roa:</label>
                    <select class="Input-Form" name="route_id">
                        @foreach($routes as $route)
                            <option value="{{ $route->id }}">{{ $route->name }}</option>
                        @endforeach
                    </select>
                <button class="Button-Form" type="submit">Registrar</button>
                <br>
            </form>
        </div>
<!--Editar-->
        <div class="Page-Form hidden" id="icon2-content">
        {{--
            <table class="Table-Edit">
                <thead>
                    <tr>
                        <th>Rota</th>
                        <th>Ônibus</th>
                    </tr>
                </thead >
                <tbody class="Table-Itens">
                    @foreach ($routes as $route)
                        <tr>
                            <td>{{ $route->name }}</td>
                            <td>
                                <ul>
                                    @foreach ($buses as $bus)
                                        <li>{{ $bus->plate }} - {{ $bus->model }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>--}}

            <div class="flex flex-col mt-8 Table-Edit">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Placa</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Modelo</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Rota</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Editar</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Deletar</th>
                                </tr>
                            </thead>
                            @foreach ($buses as $bus)

                            <tbody class="bg-white">
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                <img class="w-10 h-10 rounded-full" src="https://source.unsplash.com/user/erondu"
                                                    alt="admin dashboard ui">
                                            </div>

                                            <div class="ml-4">
                                                <div class="text-sm font-medium leading-5 text-gray-900">

                                                        <li>{{ $bus->plate }}</li>

                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-500">

                                            <li>{{ $bus->model }}</li>

                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-500">

                                            <li>
                                                @if (isset($bus->route_id))
                                                @php
                                                    $route = \App\Models\Route::find($bus->route_id);
                                                @endphp
                                                {{ $route->name }}
                                            @endif
                                            </li>

                                        </div>
                                    </td>

                                    <td
                                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            <a href="{{Redirect::route('Buses.index')}}"></a>
                                        </svg>
                                    </td>
                                </tr>

                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


    @include('./layouts/js')
</body>
</html>
