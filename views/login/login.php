<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <title>AdmiBar</title>
</head>

<body>
    <a href="../../index.html">Ir a index</a>
    <div class="login-section contenedor">
        <div class="login-form">
            <form class="form-contain" action="login.php" method="POST">
                <div class="title-login">
                    <h2>Ingrese usuario</h2>
                </div>

                <div class="form-user">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input 
                        type="text"
                        id="usuario"
                        name="usuario"
                        placeholder="Ingrese su usario"
                        required
                        >
                    </div>

                    <div class="form-group">
                        <label for="contraseña">Contraseña</label>
                        <input 
                        type="password"
                        id="password"
                        name="password"   
                        placeholder="Ingrese contraseña"
                        required
                        >
                    </div>

                    <button type="submit" class="send-form button">Iniciar</button>
                </div>
            </form>
        </div>

        <div class="login-logo">
            <div class="text-logrfom">
                <h3>Sistema de <br> adminstración</h3>
            </div>
            <div class="logo-formcontainer">
                <img src="./src/images/Logo-login.png" alt="Admibar-logo">
            </div>
            <div class="creditos">
                <span>Sistema creado por: <br></span>
                <span>Jhonatan Smith Pineda <br> Jhon Alexander González R.</span>
            </div>
        </div>
    </div>
</body>

</html>