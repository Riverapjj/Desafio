<?php

    require_once 'Model/ProductosModel.php';
    require_once 'Model/CategoriasModel.php';
    require_once 'Controllers/Controller.php';
    require_once 'core/validaciones.php';

    class ProductosController extends Controller {
        private $model;
        private $categoriasModel;

        function __construct() {

            if(!isset($_SESSION['login_data'])) {

                header('location:'.PATH.'/Usuarios/login');

                if($_SESSION['login_data']['codigo_tipo_usuario'] == 3) {

                    header('location:'.PATH.'/IndexPublic/index');
                }
            }
            

            $this->model = new ProductosModel();
            $this->categoriasModel = new CategoriasModel();
        }

        public function index() {
            //var_dump($this->model->get());
            $viewBag = array();
            $viewBag['productos'] = $this->model->get();
            $viewBag['categorias'] = $this->categoriasModel->get();
            $this->render("index.php", $viewBag);
        }

        public function details($id) {
            //var_dump($this->model->get($id));
            echo json_encode($this->model->get($id)[0]);
        }

        public function create() {
            $viewBag = array();
            $viewBag['categorias'] = $this->categoriasModel->get();
            $this->render("new.php", $viewBag);
        }

        public function add() {

            $errores = array();
            $producto = array();
        
            if (isset($_POST['Guardar'])) {
        
                extract($_POST);
        
                if (!isset($codigo_producto) || estaVacio($codigo_producto)) {
                    array_push($errores, "Debes ingresar el codigo de la producto");
                }else if (!esCodigoProducto($codigo_producto)) {
                    array_push($errores, "Código de producto no válido");
                }

                if (!isset($codigo_categoria) || estaVacio($codigo_categoria)) {
                    array_push($errores, "Debes ingresar el codigo de la categoria");
                }else if (!esCodigoCategoria($codigo_categoria)) {
                    array_push($errores, "Código de categoria no válido");
                }
        
                if (!isset($nombre_producto) || estaVacio($nombre_producto)) {
                    array_push($errores, "Debes ingresar el nombre de producto");
                }else if (!esTexto($nombre_producto)) {
                    array_push($errores, "Nombre del producto no válido");
                }

                if (!isset($descripcion) || estaVacio($descripcion)) {
                    array_push($errores, "Debes ingresar la descripción de producto");
                }else if (!esTexto($descripcion)) {
                    array_push($errores, "Descripción del producto no válido");
                }

                if (!isset($talla) || estaVacio($talla)) {
                    array_push($errores, "Debes ingresar la talla de producto");
                }else if (!esTexto($talla)) {
                    array_push($errores, "Talla del producto no válido");
                }

                if (!isset($existencias) || estaVacio($existencias)) {
                    array_push($errores, "Debes ingresar las existencias de producto");
                }else if (!esNumero($existencias)) {
                    array_push($errores, "Existencias del producto no válido");
                }

                if (!isset($precio) || estaVacio($precio)) {
                    array_push($errores, "Debes ingresar el precio de producto");
                }else if (!esDecimal($precio)) {
                    array_push($errores, "Precio del producto no válido");
                }


                $producto['codigo_producto'] = $codigo_producto;
                $producto['codigo_categoria'] = $codigo_categoria;
                $producto['nombre_producto'] = $nombre_producto;
                $producto['talla'] = $talla;
                $producto['descripcion'] = $descripcion;
                $producto['precio'] = $precio;
                $producto['imagen'] = $imagen;
                $producto['existencias'] = $existencias;


                if (count($errores) > 0) {

                    $viewBag = array();
                    $viewBag['errores'] = $errores;
                    $viewBag['producto'] = $producto;
                    $this->render("new.php", $viewBag);

                }else {

                    if ($this->model->create($producto) > 0) {
                        
                        header('location:'.PATH.'/Productos/index');

                    }else {

                        array_push($errores, "Ya existe un producto con este código.");
                        $viewBag = array();
                        $viewBag['errores'] = $errores;
                        $viewBag['producto'] = $producto;
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
        
                if (!isset($codigo_producto) || estaVacio($codigo_producto)) {
                    array_push($errores, "Debes ingresar el codigo de la producto");
                }else if (!esCodigoProducto($codigo_producto)) {
                    array_push($errores, "Código de producto no válido");
                }

                if (!isset($codigo_categoria) || estaVacio($codigo_categoria)) {
                    array_push($errores, "Debes ingresar el codigo de la categoria");
                }else if (!esCodigoCategoria($codigo_categoria)) {
                    array_push($errores, "Código de categoria no válido");
                }
        
                if (!isset($nombre_producto) || estaVacio($nombre_producto)) {
                    array_push($errores, "Debes ingresar el nombre de producto");
                }else if (!esTexto($nombre_producto)) {
                    array_push($errores, "Nombre del producto no válido");
                }

                if (!isset($descripcion) || estaVacio($descripcion)) {
                    array_push($errores, "Debes ingresar la descripción de producto");
                }else if (!esTexto($descripcion)) {
                    array_push($errores, "Descripción del producto no válido");
                }

                if (!isset($talla) || estaVacio($talla)) {
                    array_push($errores, "Debes ingresar la talla de producto");
                }else if (!esTexto($talla)) {
                    array_push($errores, "Talla del producto no válido");
                }

                if (!isset($existencias) || estaVacio($existencias)) {
                    array_push($errores, "Debes ingresar las existencias de producto");
                }else if (!esNumero($existencias)) {
                    array_push($errores, "Existencias del producto no válido");
                }

                if (!isset($precio) || estaVacio($precio)) {
                    array_push($errores, "Debes ingresar el precio de producto");
                }else if (!esDecimal($precio)) {
                    array_push($errores, "Precio del producto no válido");
                }

                if (!isset($imagen) || estaVacio($imagen)) {
                    $imagen = json_encode($this->model->get($codigo_producto)[5]);
                }

                $producto['codigo_producto'] = $codigo_producto;
                $producto['codigo_categoria'] = $codigo_categoria;
                $producto['nombre_producto'] = $nombre_producto;
                $producto['talla'] = $talla;
                $producto['descripcion'] = $descripcion;
                $producto['precio'] = $precio;
                $producto['imagen'] = $imagen;
                $producto['existencias'] = $existencias;

                if (count($errores) > 0) {

                    $viewBag = array();
                    $viewBag['errores'] = $errores;
                    $viewBag['producto'] = $producto;
                    $this->render("index.php", $viewBag);

                }else {

                    if ($this->model->update($producto) > 0) {
                        
                        header('location:'.PATH.'/Productos/index');

                    }else {

                        array_push($errores, "Ya existe un producto con este código.");
                        $viewBag = array();
                        $viewBag['errores'] = $errores;
                        $viewBag['producto'] = $producto;
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