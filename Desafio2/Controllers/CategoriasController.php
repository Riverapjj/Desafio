<?php

    require_once 'Model/CategoriasModel.php';
    require_once 'Model/EditorialesModel.php';
    require_once 'Model/AutoresModel.php';
    require_once 'Controllers/Controller.php';
    require_once 'core/validaciones.php';

    class CategoriasController extends Controller {
        private $model;

        function __construct() {
            $this->model = new CategoriasModel();
        }

        public function index() {
            //var_dump($this->model->get());
            $viewBag = array();
            $viewBag['categorias'] = $this->model->get();
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
            $categoria = array();
        
            if (isset($_POST['Guardar'])) {
        
                extract($_POST);
        
                if (!isset($codigo_categoria) || estaVacio($codigo_categoria)) {
                    array_push($errores, "Debes ingresar el codigo de la categoría");
                }else if (!esCodigoCategoria($codigo_categoria)) {
                    array_push($errores, "Código de categoría no válido");
                }
        
                if (!isset($nombre_categoria) || estaVacio($nombre_categoria)) {
                    array_push($errores, "Debes ingresar el nombre de categoría");
                }else if (!esTexto($nombre_categoria)) {
                    array_push($errores, "Nombre de la categoría no válido");
                }

                $categoria['codigo_categoria'] = $codigo_categoria;
                $categoria['nombre_categoria'] = $nombre_categoria;

                if (count($errores) > 0) {

                    $viewBag = array();
                    $viewBag['errores'] = $errores;
                    $viewBag['categoria'] = $categoria;
                    $this->render("new.php", $viewBag);

                }else {

                    if ($this->model->create($categoria) > 0) {
                        
                        header('location:'.PATH.'/Categorias/index');

                    }else {

                        array_push($errores, "Ya existe una categoría con este código.");
                        $viewBag = array();
                        $viewBag['errores'] = $errores;
                        $viewBag['categoria'] = $categoria;
                        $this->render("new.php", $viewBag);

                    }
                }
            }
        }

        public function update() {
            $errores = array();
            $categoria = array();
        
            if (isset($_POST['Guardar'])) {
        
                extract($_POST);
        
                if (!isset($nombre_categoria) || estaVacio($nombre_categoria)) {
                    array_push($errores, "Debes ingresar el nombre de categoría");
                }else if (!esTexto($nombre_categoria)) {
                    array_push($errores, "Nombre de la categoría no válido");
                }

                $categoria['codigo_categoria'] = $codigo_categoria;
                $categoria['nombre_categoria'] = $nombre_categoria;

                if (count($errores) > 0) {

                    $viewBag = array();
                    $viewBag['errores'] = $errores;
                    $viewBag['categoria'] = $categoria;
                    $this->render("index.php", $viewBag);

                }else {

                    if ($this->model->update($categoria) > 0) {
                        
                        header('location:'.PATH.'/Categorias/index');

                    }else {

                        array_push($errores, "Ya existe una categoría con este código.");
                        $viewBag = array();
                        $viewBag['errores'] = $errores;
                        $viewBag['categoria'] = $categoria;
                        $this->render("index.php", $viewBag);

                    }
                }
            }
        }

        public function delete($id) {
            $this->model->delete($id);
            $this->index();
        }
    }