<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=search" />
    <link rel="stylesheet" href="../build/css/app.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>


    <title>Inventario</title>
</head>


<body>
    <div class="con-inv">

        <nav class="navbar">
            <div class="nav-logo">
                <img src="/images/navbar-log.png" alt="nav_log">
            </div>

            <div class="nav-optioncontain">

                <div class="nav-option">
                    <!-- <ul>
                        <li> <a href="">INFORME</a> </li>
                        <li> <a href="">INVENTARIO</a> </li>
                    </ul> -->
                </div>

                <a href="/logout" class="nav-salir button">
                    <span>SALIR</span>
                </a>
            </div>

        </nav>

        <div id="menu-overlay" class="overlay"></div>

        <div class="cuerpo-inventario">

            <button id="toggle-menu" class="hamburger-btn">
                ☰
            </button>
            <div class="lateral-opt">
               <a href="/inicio" class="later-component">
                    <div class="lateral-icon">
                        <img src="/images/admin.png" alt="">
                    </div>
                    <div class="laterl-information">
                        <!-- <a href="/productos/admin">Productos</a> -->
                        <span>ADMIN: <?php echo $admin->nombre;?> <?php echo $admin->apellido; ?> </span>
                    </div>
                </a>

                <a href="/productos/admin" class="later-component">
                    <div class="lateral-icon">
                        <img src="/images/venta.png" alt="">
                    </div>
                    <div class="laterl-information">
                        <!-- <a href="/productos/admin">Productos</a> -->
                        <span>VENTA</span>
                    </div>
                </a>

                <a href="/productos/admin" class="later-component">
                    <div class="lateral-icon">
                        <img src="/images/inventory.png" alt="">
                    </div>
                    <div class="laterl-information">
                        <!-- <a href="/productos/admin">Productos</a> -->
                        <span>INVENTARIO</span>
                    </div>
                </a>


                <a href="/productos/admin" class="later-component">
                    <div class="lateral-icon">
                        <img src="/images/icons.png" alt="">
                    </div>
                    <div class="laterl-information">
                        <!-- <a href="/productos/admin">Productos</a> -->
                        <span>PRODUCTOS</span>
                    </div>
                </a>

                <a href="/proveedores/admin" class="later-component">

                    <div class="lateral-icon">
                        <img src="/images/delivery-man.png" alt="Lector-icon">
                    </div>
                    <div class="laterl-information">
                        <span>PROVEEDORES</span>
                    </div>
                </a>

                <a href="/categorias/admin" class="later-component">
                    <div class="lateral-icon">
                        <img src="/images/delivery-note.png" alt="Lector-icon">
                    </div>
                    <div class="laterl-information">
                        <span>CATEGORIAS</span>
                    </div>
                </a>


            </div>

            <?php

            echo $contenido;


            ?>

            <script>
    document.getElementById('toggle-menu').addEventListener('click', function () {
        document.querySelector('.lateral-opt').classList.toggle('active');
    });
</script>

<script>
    const toggleBtn = document.getElementById('toggle-menu');
    const menu = document.querySelector('.lateral-opt');
    const overlay = document.getElementById('menu-overlay');

    toggleBtn.addEventListener('click', () => {
        menu.classList.add('active');
        overlay.classList.add('active');
    });

    overlay.addEventListener('click', () => {
        menu.classList.remove('active');
        overlay.classList.remove('active');
    });
</script>
