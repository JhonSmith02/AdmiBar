<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=search" />
    <link rel="stylesheet" href="../build/css/app.css">
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
                    <ul>
                        <li> <a href="">INFORME</a> </li>
                        <li> <a href="">INVENTARIO</a> </li>
                        <li> <a href="">INFORME</a> </li>
                    </ul>
                </div>

                <div class="nav-salir">
                    <span>SALIR</span>
                </div>
            </div>

        </nav>

        <div class="cuerpo-inventario">

            <div class="lateral-opt">
                <div class="later-component">
                    <div class="lateral-icon">
                        <img src="/images/usuario.png" alt="User-icon">
                    </div>
                    <div class="laterl-information">
                        <div class="lateral-rol">
                            <span>ADMIN</span> <br>
                            <span class="user-name">Freddy Krueger</span>
                        </div>
                    </div>
                </div>

                <aside class="later-component">
                    <div class="lateral-icon">
                        <img src="/images/lector-tarj.png" alt="Lector-icon">
                    </div>
                    <div class="laterl-information">
                        <span>VENTA</span>
                    </div>
                </aside>

                <div class="later-component">
                    <div class="lateral-icon">
                        <img src="/images/usuario.png" alt="Lector-icon">
                    </div>
                    <div class="laterl-information">
                        <span>Proveedor</span>
                    </div>
                </div>
            </div>

            <?php

            echo $contenido;

            ?>