<?php

    require_once 'Model/ProductosModel.php';
    require_once 'Model/UsuariosModel.php';
    require_once 'Controllers/ProductosController.php';
    require_once 'core/validaciones.php';

    class IndexPublicController extends Controller {
        private $productosModel;
        private $usuariosModel;

        function __construct() {
            $this->productosModel = new ProductosModel();
            $this->usuariosModel = new UsuariosModel();
        }

        public function index() {
            $viewBag = array();
            $viewBag['productos'] = $this->productosModel->get();
            $this->render("index.php", $viewBag);
        }

        public function logout() {
            session_unset();
            session_destroy();
            $this->index();
        }

        public function register() {
            $this->render("new.php");
        }

        public function add() {
            $errores = array();
            $usuario = array();
        
            if (isset($_POST['registrar'])) {
        
                extract($_POST);
        
                if (!isset($nombre_usuario) || estaVacio($nombre_usuario)) {
                    array_push($errores, "Debes ingresar el codigo de la categoría");
                }
        
                if (!isset($password) || estaVacio($password)) {
                    array_push($errores, "Debes ingresar el nombre de categoría");
                }

                $usuario['nombre_usuario'] = $nombre_usuario;
                $usuario['password'] = $password;

                if (count($errores) > 0) {

                    $viewBag = array();
                    $viewBag['errores'] = $errores;
                    $viewBag['usuario'] = $usuario;
                    $this->render("new.php", $viewBag);

                }else {

                    if ($this->usuariosModel->createPublic($usuario) > 0) {
                        
                        header('location:'.PATH.'/Usuarios/login');

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
    
    }

?>