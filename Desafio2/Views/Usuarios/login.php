<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <?php
        include 'Views/cabecera.php';
    ?>
</head>
<body>
<div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <h2>Inicio de sesión</h2>
                    
                    <?php
                        if(isset($errores)){
                            if(count($errores)>0){
                                echo "<div class='alert alert-danger'><ul>";
                                foreach ($errores as $error) {
                                    echo "<li>$error</li>";
                                }
                                echo "</ul></div>";

                            }
                        }

                   ?>

                    <form method="post" action="<?= PATH ?>/Usuarios/validate">
                       
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control"  id="usuario" placeholder="Usuario" name="usuario" >
                        </div>

                        <div class="form-group">
                            <label for="clave">Password:</label>
                            <input type="password" class="form-control"  id="clave" placeholder="Password" name="clave" >
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" name="enviar" type="submit">Iniciar sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<body>
    </html>