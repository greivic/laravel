<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks Panel</title>
    <link rel="stylesheet" href="{{ asset('login_style.css') }}">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .buttons-container {
            display: flex;
            justify-content: space-between;
            width: auto;
            padding: 15px;
        }

        .list-container {
            max-height: 80vh;
            overflow-y: auto;
            padding: 20px;
            background-color: auto;
            width: auto; /* Ajusta el ancho según sea necesario */
        }

        .bg-gray-200 {
            background-color: #ffffff;
            padding: 5px;
            border-radius: 25px;
        }

        .card {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
        }

        .title {
            text-align: center;
        }

        .description {
            margin-top: 10px;
        }

        .separator {
            height: 1px;
            background-color: #ccc;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="buttons-container">
    <a href="{{route('logout')}}"><button type="button" class="btn btn-sm btn-outline-secondary" style="margin-right: 10px">Cerrar Sesión</button></a>
    <a href="{{route('adminTasks')}}"><button type="button" class="btn btn-sm btn-outline-secondary">Crear Tarea</button></a>
</div>
<h1 class="title">Listado de tareas</h1>
<div class="list-container">
    @foreach($tasks as $task)
            <!-- Card 1 -->
            <div class="card">
                <!-- Title -->
                <center>
                <div class="title">
                    <h3>Nombre de la tarea</h3>
                    <p class="text-blue-600 font-semibold"> {{$task->title}} </p>
                    <input id="title_{{$task->id}}" type="hidden" value="{{$task->title}}">
                    <input id="description_{{$task->id}}" type="hidden" value="{{$task->description}}">
                </div>
                <!-- Description -->

                <div class="description">
                    <h3>Descripción</h3>
                    <p class="text-sm text-gray-800 font-light">{{$task->description}} </p>
                </div>

                </center>
            </div>
    @endforeach
</div>
</body>
</html>
