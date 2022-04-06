<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=PATH?>/Views/assets/css/estilos.css" rel="stylesheet" type="text/css">
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
            <?php
                foreach ($productos as $producto) {
                
            ?>
                    <div class="col-md-3" style="heigth: 30%">
                        <div class="thumbnail">
                            <img src="<?=PATH?>/Views/assets/img/<?=$producto['imagen']?>" alt="...">
                            <div class="caption">
                                <h3><strong><?=$producto['nombre_producto']?> - $<?=$producto['precio']?></strong></h3>
                                <div class="mt-3 mb-3" style="height: 60px; overflow: auto; margin-botton: 8px"><?=$producto['descripcion']?></div>
                                
                                
                                <?php
                                    if(isset($_SESSION['login_data'])) {
                                        if($producto['existencias'] > 0) {
                                        
                                ?>
                                    <a href="#" class="btn btn-success" role="button">Agregar</a>                   
                                <?php
                                        }
                                    }
                                ?>
                                
                                
                            </div>
                        </div>
                    </div>
                
                
            <?php
                }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>