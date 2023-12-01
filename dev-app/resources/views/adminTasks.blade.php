<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="route" id="route" content="{{ route('adminTasks') }}">
    <title>Admins Panel</title>
    <link rel="stylesheet" href="{{ asset('login_style.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
            overflow-x: auto;
        }

        .container {
            display: auto;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .buttons-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 15px;
            background-color: #ff;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .list-container {
            overflow-x: auto;
            max-width: 100%;
            padding: 20px;
            display: flex;
            flex-wrap: nowrap; /* Asegura que los elementos no se envuelvan */
            gap: 20px; /* Espaciado entre elementos */
        }

        .bg-gray-200 {
            background-color: #e0e0e0;
            padding: 10px;
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

        /* Añadido para la tarjeta */
        .card {
            flex: 0 0 auto; /* Evita que las tarjetas se estiren para llenar el contenedor */
        }
    </style>
</head>
<script src="{{asset('modal.js')}}"></script>


<body class="h-screen overflow-hidden">

    <div class="container">
  <div class="row g-0">
    <div class="col-md-12">
    <div class="buttons-container">
            <a href="{{route('tasks')}}"><button type="button" class="btn btn-sm btn-outline-secondary">Atrás</button></a>
            <a href="{{route('logout')}}"><button type="button" class="btn btn-sm btn-outline-secondary">Cerrar Sesión</button></a>
        </div>
        <div class="container text-center">
        <div class="card text-center" style="padding: 6px">
        <form action="{{ route ('adminTasks') }}" method="POST">
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif

            @error('title')
                <h6>{{$message}}</h6>
            @enderror

            @error('description')
                <h6>{{$message}}</h6>
            @enderror
            <div class="text-center" style="padding: 6px">
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="title" required style="margin-right: 6px">
                    <div class="underline"></div>
                    <label for="Title">Nombre de la tarea</label>
                </div>
                <div class="input-data">
                    <input type="text" name="description" required>
                    <div class="underline"></div>
                    <label for="">Descripción</label>
                </div>
            </div>
            <div class="form-row">
                <div class="input-data textarea">
                    <div class="form-row submit-btn">
                        <div class="input-data">
                            <div class="inner"></div>
                            <input type="submit" class="btn btn-sm btn-success" value="Insertar Tarea">
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
            
        </form>
        </div>
        <div class="list-container">
            @foreach($tasks as $task)
                    <!-- Card 1 -->
                    <div class="card" >
                    <div style="padding: 6px">
                        <center>
                        <!-- Title -->
                        <div class="title">
                            <h5>Nombre</h5>
                            <p> {{$task->title}} </p>
                            <input id="title_{{$task->id}}" type="hidden" value="{{$task->title}}">
                            <input id="description_{{$task->id}}" type="hidden" value="{{$task->description}}">
                        </div>
                        <!-- Description -->
                        <div class="description">
                            <h5>Descripción</h5>
                            <p>{{$task->description}} </p>
                        </div>
                        </center>
                        <!-- Buttons -->
                        <div class="buttons text-center">
                        <button type="submit" class="btn btn-sm btn-warning" onclick=" launchModal({{$task->id}})">Editar</button>
                            <form action="{{route('adminTasks-delete',['id'=>$task->id])}}" id="form-delete" method="POST" style="margin-top: 6px">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" >Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach()
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update fields</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="formulary">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="Title" class="form-label">Title</label>
                            <input type="text" value="" class="form-control" id="titleup" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Precio</label>
                            <input type="text" value="" class="form-control" id="descriptionup" name="description">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div> 
</div>

  </div>

</body>

</html>
