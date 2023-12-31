<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ATPMucury | Home</title>
    @include('../layouts/css')

</head>
<body class="Standart-Background">
    @include('./layouts/menu')

    @include('./layouts/header')


    <div class="Cadastrar-Form">
        <div class="Menu-Form">
            <a class="Option-Menu-Form ativo" href="#" data-target="icon1-content">Gráficos</a>
            <a class="Option-Menu-Form" href="#" data-target="icon2-content">Dados Gerais</a>
            <a class="Option-Menu-Form" href="#" data-target="icon3-content">Tabelas de Rotas</a>
        </div>
<!--Gráficos-->
    <div class="Page-Form" id="icon1-content">

        <div class="Graficos-Home">
            <div class="Chart">
                @include('./charts/Mcard-Type', ['chartData' => $mcardChartData])
            </div>
            <div class="Chart">
                @include('./charts/Event-Date', ['chartData' => $eventsChartData])
            </div>
            <div class="Chart">
                @include('./charts/User-Quantity', ['chartData' => $usersChartData])
            </div>
        </div>

    </div>
    <div class="Page-Form" id="icon2-content">
        <!--Dados-->
    </div>
    <div class="Page-Form" id="icon3-content">

    </div>


 @include('./layouts/js')
</body>
</html>
