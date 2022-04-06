<?php

    require_once 'Model/UsuariosModel.php';
    require_once 'Model/RolesModel.php';
    require_once 'Controllers/Controller.php';
    require_once 'core/validaciones.php';

    class UsuariosController extends Controller {
        private $model;
        private $rolesModel;

        function __construct() {
            if(!isset($_SESSION['login_data'])) {
                return;
                if($_SESSION['login_data']['codigo_tipo_usuario'] == 3) {

                    header('location:'.PATH.'/IndexPublic/index');
                }
            }
            
            $this->model = new UsuariosModel();
            $this->rolesModel = new RolesModel();
        }

        public function login() {
            $this->render("login.php");
        }

        public function logout() {
            session_unset();
            session_destroy();
            $this->login();
        }

        public function validate() {
            $errores = array();
            $viewBag = array();
        
            if (isset($_POST['enviar'])) {
        
                extract($_POST);
        
                if (!isset($usuario) || estaVacio($usuario)) {
                    array_push($errores, "Debes ingresar un nombre de usuario");
                }

                if (!isset($clave) || estaVacio($clave)) {
                    array_push($errores, "Debes ingresar la clave del usuario");
                }

                if (count($errores) > 0) {

                    $viewBag['errores'] = $errores;
                    $this->render("login.php", $viewBag);

                }else {

                    $login_data = $this->model->validateUser($usuario, $clave);

                    if (count($login_data) > 0) {

                        $_SESSION['login_data'] = $login_data[0];

                        if($_SESSION['login_data']['codigo_tipo_usuario'] == 3) {

                            header('location:'.PATH.'/IndexPublic/index');

                        }else {

                            header('location:'.PATH.'/Productos/index');

                        }
                    }else {

                        array_push($errores, "Usuario y/o conteraseña incorrecto.");
                        $viewBag = array();
                        $viewBag['errores'] = $errores;
                        $this->render("login.php", $viewBag);

                    }
                }
            }
        }

        public function index() {
            //var_dump($this->model->get());
            $viewBag = array();
            $viewBag['usuarios'] = $this->model->get();
            $viewBag['roles'] = $this->rolesModel->get();
            $this->render("index.php", $viewBag);
        }

        public function details($id) {
            //var_dump($this->model->get($id));
            echo json_encode($this->model->get($id)[0]);
        }

        public function create() {
            $viewBag = array();
            $viewBag['usuarios'] = $this->model->get();
            $viewBag['roles'] = $this->rolesModel->get();
            $this->render("new.php", $viewBag);
        }

        public function add() {
            $errores = array();
            $usuario = array();
        
            if (isset($_POST['Guardar'])) {
        
                extract($_POST);
        
                if (!isset($nombre_usuario) || estaVacio($nombre_usuario)) {
                    array_push($errores, "Debes ingresar el codigo de la categoría");
                }
        
                if (!isset($password) || estaVacio($password)) {
                    array_push($errores, "Debes ingresar el nombre de categoría");
                }

                $usuario['codigo_tipo_usuario'] = $codigo_tipo_usuario;
                $usuario['nombre_usuario'] = $nombre_usuario;
                $usuario['password'] = $password;

                if (count($errores) > 0) {

                    $viewBag = array();
                    $viewBag['errores'] = $errores;
                    $viewBag['usuario'] = $usuario;
                    $this->render("new.php", $viewBag);

                }else {

                    if ($this->model->create($usuario) > 0) {
                        
                        header('location:'.PATH.'/Usuarios/index');

                    }else {
                        var_dump($usuario);
                        array_push($errores, "Algo salió mal!!");
                        $viewBag = array();
                        $viewBag['errores'] = $errores;
                        $viewBag['usuario'] = $usuario;
                        $this->render("new.php", $viewBag);

                    }
                }
            }
            
        }

        public function update() {
            $errores = array();
            $producto = array();
        
            if (isset($_POST['Guardar'])) {
        
                extract($_POST);
        
                if (!isset($codigo_usuario) || estaVacio($codigo_usuario)) {
                    array_push($errores, "Debes ingresar el codigo del usuario");
                }

                if (!isset($codigo_tipo_usuario) || estaVacio($codigo_tipo_usuario)) {
                    array_push($errores, "Debes ingresar el tipo de usuario");
                }
        
                if (!isset($nombre_usuario) || estaVacio($nombre_usuario)) {
                    array_push($errores, "Debes ingresar el nombre del usuario");
                }else if (!esTexto($nombre_usuario)) {
                    array_push($errores, "Nombre de usuario no válido");
                }

                if (!isset($activo) || estaVacio($activo)) {
                    array_push($errores, "Debes ingresar el estado del usuario");
                }

                $usuario['codigo_usuario'] = $codigo_usuario;
                $usuario['codigo_tipo_usuario'] = $codigo_tipo_usuario;
                $usuario['nombre_usuario'] = $nombre_usuario;
                $usuario['activo'] = $activo;

                if (count($errores) > 0) {

                    $viewBag = array();
                    $viewBag['errores'] = $errores;
                    $viewBag['usuario'] = $usuario;
                    $this->render("index.php", $viewBag);

                }else {

                    if ($this->model->update($usuario) > 0) {
                        
                        header('location:'.PATH.'/Usuarios/index');

                    }else {

                        array_push($errores, "Ya existe un usuario con este código.");
                        $viewBag = array();
                        $viewBag['errores'] = $errores;
                        $viewBag['usuario'] = $usuario;
                        $this->render("index.php", $viewBag);

                    }
                }
            }
        }
    }