<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- js --}}
</head>
<body>
    <div>

    </div>
    <div>
        @yield('panelLateral')
        <div class="position-fixed top-0 start-0 h-100 bg-dark text-white" style="width: 280px;">
            <div class="d-flex flex-column p-3 h-100">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                  <span class="fs-4">Barra lateral</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                  <li class="nav-item">
                    <a href="#" class="nav-link" aria-current="page">
                      Hogar
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" >Panel</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">Pedidos</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">Productos</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">Clientes</a>
                  </li>
                </ul>
                <hr>
                <div class="dropdown mt-auto">
                  <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">Nuevo proyecto...</a></li>
                    <li><a class="dropdown-item" href="#">Ajustes</a></li>
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Desconectar</a></li>
                  </ul>
                </div>
            </div>
        </div>
    <div class="container">
        @yield('contenido')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>