
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" 
                  data-toggle="collapse" data-target="#navbar" 
                  aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Desplegar navegacion</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="<?= PATH ?>/Productos/index">Desafío #2</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="active"><a href="#">Inicio</a></li> 
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                 role="button" aria-haspopup="true" 
                 aria-expanded="false">Productos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="<?= PATH ?>/Productos/create">Registrar producto</a></li>
                <li><a href="<?= PATH ?>/Productos/index">Ver lista de productos</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                 role="button" aria-haspopup="true" 
                 aria-expanded="false">Categorías<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= PATH ?>/Categorias/create">Registrar categoría</a></li>
                <li><a href="<?= PATH ?>/Categorias/index">Ver lista de categorías</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                 role="button" aria-haspopup="true" 
                 aria-expanded="false">Usuarios<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= PATH ?>/Usuarios/create">Registrar usuario</a></li>
                <li><a href="<?= PATH ?>/Usuarios/index">Ver lista de usuarios</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                 role="button" aria-haspopup="true" 
                 aria-expanded="false">Roles<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= PATH ?>/Roles/create">Registrar rol</a></li>
                <li><a href="<?= PATH ?>/Roles/index">Ver lista de roles</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav nav-navbar navbar-right">
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                 role="button" aria-haspopup="true" 
                 aria-expanded="false"><?=$_SESSION['login_data']['nombre_usuario']?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="<?= PATH ?>/Usuarios/logout">Cerrar sesión</a></li>
              </ul>
            </li>
          </ul>
          
        </div>
      </div>
    </nav>
        
