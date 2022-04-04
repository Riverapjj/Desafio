<?php

    require_once 'Model/EditorialesModel.php';
    require_once 'Controllers/Controller.php';
    require_once 'core/validaciones.php';

    class EditorialesController extends Controller {
        private $model;

        function __construct() {
            $this->model = new EditorialesModel();
        }

        public function index() {
            //var_dump($this->model->get());
            $viewBag = array();
            $viewBag["editoriales"] = $this->model->get();
            $this->render("index.php", $viewBag);
        }

        public function details($id) {
            var_dump($this->model->get($id));
        }

        public function create() {
            $this->render("new.php");
        }

        public function add() {
            $errores = array();
        
            if (isset($_POST['Guardar'])) {
        
                extract($_POST);
        
                if (!isset($codigo_editorial) || estaVacio($codigo_editorial)) {
                    array_push($errores, "Debes ingresar el codigo de la editorial");
                }else if (!esCodigoEditorial($codigo_editorial)) {
                    array_push($errores, "Código de editorial no válido");
                }
        
                if (!isset($nombre_editorial) || estaVacio($nombre_editorial)) {
                    array_push($errores, "Debes ingresar el nombre de editorial");
                }else if (!esTexto($nombre_editorial)) {
                    array_push($errores, "Nombre de la editorial no válido");
                }
        
                if (!isset($contacto) || estaVacio($contacto)) {
                    array_push($errores, "Debes ingresar el contacto"); 
                }else if (!esTexto($contacto)) {
                    array_push($errores, "Contacto no válido");
                }
            
                if (!isset($telefono) || estaVacio($telefono)) {
                    array_push($errores, "Debes ingresar el telefono"); 
                }else if (!esTelefono($telefono)) {
                    array_push($errores, "Teléfono no válido");
                }

                $editorial['nombre_editorial'] = $nombre_editorial;
                $editorial['codigo_editorial'] = $codigo_editorial;
                $editorial['contacto'] = $contacto;
                $editorial['telefono'] = $telefono;

                if (count($errores) > 0) {

                    $viewBag = array();
                    $viewBag['errores'] = $errores;
                    $viewBag['editorial'] = $editorial;
                    $this->render("new.php", $viewBag);

                }else {

                    if ($this->model->create($editorial) > 0) {
                        
                        header('location:'.PATH.'/Editoriales/index');

                    }else {

                        array_push($errores, "Ya existe un editorial con este código.");
                        $viewBag = array();
                        $viewBag['errores'] = $errores;
                        $viewBag['editorial'] = $editorial;
                        $this->render("new.php", $viewBag);

                    }
                }
            }
        }
    }