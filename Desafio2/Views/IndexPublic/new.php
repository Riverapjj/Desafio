<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <title>Tienda en línea</title>
    <?php
        include 'Views/cabecera.php';
    ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Tienda en línea</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    
                    <?php
                    if(isset($_SESSION['login_data'])) {
                    ?>
                        
                    <?php
                        if($_SESSION['login_data']['codigo_tipo_usuario'] == 3) {
                            
                    ?>
                        <li><a class="dropdown-item" href="<?=PATH?>/IndexPublic/logout">Cerrar sesión</a></li>                    
                    <?php
                        }
                    }else {
                    ?>
                        <li><a class="dropdown-item" href="<?=PATH?>/Usuarios/login">Iniciar sesión</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>/IndexPublic/register">Registrarse</a></li>
                    <?php
                    }
                    ?>
                </ul>

            </li>
        </ul>
        </div>
    </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                
                <h1>Formulario de registro</h1>
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
                <form method="POST" action="<?=PATH?>/IndexPublic/add">
                    <div class="mb-3 mt-5">
                        <label for="nombre_usuario" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre de usuario">
                    </div>
                    <div class="mb-5">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                    </div>
                    <div class="row">
                        <div class="d-flex">
                            <button type="submit" id="registrar" name="registrar" class="btn btn-success col-4 offset-2">Registrarme</button>
                            <a href="<?=PATH?>/IndexPublic/index" class="btn btn-danger col-4 offset-1">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>