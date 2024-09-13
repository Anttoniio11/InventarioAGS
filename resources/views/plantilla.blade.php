<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo del menú lateral */
        #sidebar {
            width: 200px;
            height: 100vh; /* Ocupa todo el alto de la pantalla */
            position: fixed; /* Fijo al lado izquierdo */
            top: 56px; /* Justo debajo del navbar */
            left: 0;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
            transition: all 0.3s; /* Transición suave para el menú lateral */
        }

        /* Estilo del contenido principal */
        .content {
            margin-left: 200px; /* Deja espacio para el menú lateral */
            padding: 20px;
            flex-grow: 1;
            background-color: #f8f9fa;
            margin-top: 56px; /* Espacio suficiente para el navbar */
            height: calc(100vh - 56px); /* Ajusta el alto restando el tamaño del navbar */
            overflow-y: auto; /* Scroll en caso de que haya mucho contenido */
            transition: margin-left 0.3s; /* Transición suave para el contenido */
        }

        /* Estilo del navbar */
        .navbar {
            height: 56px;
            z-index: 1000; /* Asegúrate de que el navbar esté siempre encima */
        }

        /* Estilo de los enlaces del menú lateral */
        .nav-link {
            color: white;
            margin-bottom: 10px;
        }

        /* Submenú del inventario */
        .submenu {
            display: none;
            padding-left: 20px;
        }
        .nav-item.active .submenu {
            display: block;
        }

        /* Estilo responsive para pantallas pequeñas */
        @media (max-width: 767.98px) {
            #sidebar {
                width: 100%;
                position: static;
                height: auto; /* Ajusta la altura del menú lateral */
                top: 0;
                left: 0;
                padding-top: 0;
                background-color: #343a40;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Inventario</a>
        </div>
    </nav>

    <!-- Menú lateral fijo -->
    <div id="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#" id="inventarioToggle">Inventario</a>
                <ul class="submenu">
                    <li><a class="nav-link" href="#">Tecnológico</a></li>
                    <li><a class="nav-link" href="#">Físico</a></li>
                    <li><a class="nav-link" href="#">Médico</a></li>
                    <li><a class="nav-link" href="#">Insumos</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Asignaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Bajas</a>
            </li>
        </ul>
        
        <!-- Menú de usuario -->
        <div class="user-menu mt-auto">
            <a class="nav-link" href="#" id="userMenuToggle">Usuario</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle del submenú de inventario
        document.getElementById('inventarioToggle').addEventListener('click', function(e) {
            e.preventDefault();
            this.parentElement.classList.toggle('active');
        });
    </script>
</body>
</html>
