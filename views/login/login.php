<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <title>AdmiBar</title>
</head>

<body>
    <div class="login-section contenedor">
        <div class="login-form">
            <form class="form-contain" action="/login" method="POST">
                <div class="title-login">
                    <h2>Ingrese usuario</h2>
                </div>

                <div class="form-user">
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input
                            type="text"
                            id="correo"
                            name="correo"
                            placeholder="Ingrese su correo">
                    </div>

                    <div class="form-group">
                        <label for="contraseña">Contraseña</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Ingrese contraseña">
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
                <img src="/imagenes/Logo-login.png" alt="Admibar-logo">
            </div>
            <div class="creditos">
                <span>Sistema creado por: <br></span>
                <span>Jhonatan Smith Pineda <br> Jhon Alexander González R.</span>
            </div>
            <div class="mensaje-contenedor">
                <?php if (!empty($errors)): ?>
                    <div class="list-errores">
                        <?php foreach ($errors as $error): ?>
                            <div class="msg error">
                                <span class="mensaje-texto"><?php echo htmlspecialchars($error); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</body>

</html>