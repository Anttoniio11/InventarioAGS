<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventario AGS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <link href="{{ asset('css/elementos/style.css') }}" rel="stylesheet">
    <style>
        .wrapper {
            display: flex;
        }

        #sidebar {
            width: 200px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ffffff;
            color: #343a40;
            padding-top: 20px;
            transition: all 0.3s;
        }

        #sidebar i {
            margin-right: 1rem
        }

        .content {
            margin-left: 200px;
            padding: 20px;
            flex-grow: 1;
            background-color: #f8f9fa;
            margin-top: 56px;
            height: calc(100vh - 56px);
            overflow-y: auto;
            transition: margin-left 0.3s;
        }

        .navbar {
            background-color: #ffffff;
            font-weight: 600;
        }

        .navbar-brand {
            color: #01A497;

        }

        .nav-item .nav-link {
            color: #343a40;
        }

        .nav-item.active>.nav-link {
            color: #01A497;
        }


        .nav-item.active .submenu {
            display: block;
        }

        .navbar-brand:hover,
        .navbar-brand:focus {
            color: #01A497 !important;
            text-decoration: none;
        }

        @media (min-width: 767.98px) {
            .navbar {
                height: 56px;
                z-index: 1000;
                width: 100%;
                position: fixed;
                top: 0;
                right: 0;
                left: 200px;
            }
        }

        .nav-link {
            font-weight: 400;
            color: #343a40;
            margin-bottom: 10px;
        }

        .submenu {
            padding-left: 2rem;
        }

        .submenu li {
            padding-left: 0;
        }

        .sub-item {
            font-weight: 100;
            font-size: 15px;
        }

        #sidebar img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            padding: 10px;
        }

        .nav-item.active .submenu {
            display: block;
        }

        @media (max-width: 767.98px) {
            #sidebar {
                width: 100%;
                position: static;
                height: auto;
                left: 0;
                padding-top: 0;
                background-color: #ffffff;
              
            }

            .content {
                margin-left: 0;
            }

            .navbar {
                height: 56px;
                z-index: 1000;
            }
        }
    </style>
    
</head>

<body>
    <nav class="navbar navbar-expand-lg   fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Inventario</a>
        </div>
    </nav>

    <div class="wrapper">
        <div id="sidebar">


            <ul class="nav flex-column">

                <img src="{{ asset('img/agsLogo.png') }}" alt="agsLogo">

                <li class="nav-item">
                    <a class="nav-link" href=""><i class="fa-solid fa-chart-line"></i>Panel</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="" id="inventarioToggle"><i
                            class="fa-solid fa-boxes-stacked"></i>Inventario</a>
                    <ul class="submenu">
                        <li><a class="nav-link sub-item" href="{{ route('inventarioTecnologico.index') }}">Tecnológico</a></li>
                        <li><a class="nav-link sub-item" href="{{ route('inventarioFisico.index') }}">Físico</a></li>
                        <li><a class="nav-link sub-item" href="{{ route('inventarioMedico.index') }}">Médico</a></li>
                        <li><a class="nav-link sub-item" href="{{ route('inventarioInsumo.index') }}">Insumos</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-users"></i>Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-user-check"></i>Asignaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-arrow-trend-down"></i>Bajas</a>
                </li>
            </ul>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/bfdeae7cfe.js" crossorigin="anonymous"></script>
    <script>
        const navLinks = document.querySelectorAll('.nav-item');

        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navLinks.forEach(item => item.classList.remove('active'));
                this.classList.add('active');
            });
        });

        const subItem = document.querySelectorAll('.sub-item');

        subItem.forEach(link => {
            link.addEventListener('click', function() {
                subItem.forEach(item => item.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>

</html>
