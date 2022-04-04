<?php

    require_once 'Model/AutoresModel.php';
    require_once 'Controllers/Controller.php';
    require_once 'core/validaciones.php';

    class AutoresController extends Controller {
        private $model;

        function __construct() {
            $this->model = new AutoresModel();
        }

        public function index() {
            //var_dump($this->model->get());
            $viewBag = array();
            $viewBag["autores"] = $this->model->get();
            var_dump($viewBag);
        }

        public function details($id) {
            var_dump($this->model->get($id));
        }

        public function create() {
            
            $this->render("new.php");
        }

        public function add() {
            $autor = [
                'codigo_autor' => 'AUT093',
                'nombre_autor' =>'Julio Cortazar',
                'nacionalidad' => 'Argentino'
            ];

            echo $this->model->create($autor);
        }
    }