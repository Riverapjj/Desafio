<?php

    require_once 'Model/RolesModel.php';
    require_once 'Controllers/Controller.php';
    require_once 'core/validaciones.php';

    class RolesController extends Controller {
        private $model;

        function __construct() {

            if(!isset($_SESSION['login_data'])) {

                header('location:'.PATH.'/Usuarios/login');

                if($_SESSION['login_data']['codigo_tipo_usuario'] == 3) {

                    header('location:'.PATH.'/IndexPublic/index');
                }
            }
            
            $this->model = new RolesModel();
        }

        public function index() {
            //var_dump($this->model->get());
            $viewBag = array();
            $viewBag['roles'] = $this->model->get();
            $this->render("index.php", $viewBag);
        }

        public function details($id) {
            //var_dump($this->model->get($id));
            echo json_encode($this->model->get($id)[0]);
        }

        public function create() {
            $this->render("new.php");
        }

        public function add() {

            $errores = array();
            $rol = array();
        
            if (isset($_POST['Guardar'])) {
        
                extract($_POST);

                if (!isset($tipo_usuario) || estaVacio($tipo_usuario)) {
                    array_push($errores, "Debes ingresar el nombre tipo de usuario");
                }else if (!esTexto($tipo_usuario)) {
                    array_push($errores, "Nombre no válido");
                }

                $rol['tipo_usuario'] = $tipo_usuario;

                if (count($errores) > 0) {

                    $viewBag = array();
                    $viewBag['errores'] = $errores;
                    $viewBag['rol'] = $rol;
                    $this->render("new.php", $viewBag);

                }else {

                    if ($this->model->create($rol) > 0) {
                        
                        header('location:'.PATH.'/Roles/index');

                    }else {

                        array_push($errores, "Ya existe un tipo de usuario con este código.");
                        $viewBag = array();
                        $viewBag['errores'] = $errores;
                        $viewBag['rol'] = $rol;
                        $this->render("new.php", $viewBag);

                    }
                }
            }
        }

        public function update() {
            $errores = array();
            $rol = array();
        
            if (isset($_POST['Guardar'])) {
        
                extract($_POST);
        
                if (!isset($codigo_tipo_usuario) || estaVacio($codigo_tipo_usuario)) {
                    array_push($errores, "Debes el codigo tipo de usuario.");
                }

                if (!isset($tipo_usuario) || estaVacio($tipo_usuario)) {
                    array_push($errores, "Debes ingresar el nombre de categoría");
                }else if (!esTexto($tipo_usuario)) {
                    array_push($errores, "Nombre de la categoría no válido");
                }

                $rol['codigo_tipo_usuario'] = $codigo_tipo_usuario;
                $rol['tipo_usuario'] = $tipo_usuario;

                if (count($errores) > 0) {

                    $viewBag = array();
                    $viewBag['errores'] = $errores;
                    $viewBag['rol'] = $rol;
                    $this->render("index.php", $viewBag);

                }else {

                    if ($this->model->update($rol) > 0) {
                        
                        header('location:'.PATH.'/Roles/index');

                    }else {

                        array_push($errores, "No se pudo actualizar el tipo de usuario.");
                        $viewBag = array();
                        $viewBag['errores'] = $errores;
                        $viewBag['rol'] = $rol;
                        $this->render("index.php", $viewBag);

                    }
                }
            }
        }
    }