<?php

    require_once 'ModelPDO.php';

    class ProductosModel extends ModelPDO {


        public function get($id = '') {
            $query = "";
            if ($id == '') {
                //Retornar todas las editoriales
                $query = "SELECT * FROM Productos P
                INNER JOIN Categorias C ON P.codigo_categoria = C.codigo_categoria";

            return $this->get_query($query);

            }else {
                //Retornar una editorial
                $query = "SELECT * FROM Productos P
                INNER JOIN Categorias C ON P.codigo_categoria = C.codigo_categoria
                WHERE codigo_producto = :codigo_producto";

                return $this->get_query($query, [":codigo_producto"=>$id]);

            }

        }

        public function create($producto = array()) {

            $query = "INSERT INTO Productos(codigo_producto, codigo_categoria, nombre_producto, talla, descripcion, imagen, precio, existencias) VALUES(:codigo_producto, :codigo_categoria, :nombre_producto, :talla, :descripcion, :imagen, :precio, :existencias)";

            return $this->set_query($query, $producto);
        }

        public function update($producto = array()) {

            $query = "UPDATE Productos SET nombre_producto = :nombre_producto, codigo_categoria = :codigo_categoria, talla = :talla, descripcion = :descripcion, imagen = :imagen, precio = :precio, existencias = :existencias WHERE codigo_producto = :codigo_producto";

            return $this->set_query($query, $producto);
        }

        public function delete($id = '') {
            $query = "DELETE FROM Productos WHERE codigo_producto = :codigo_producto";

            return $this->set_query($query, [":codigo_producto"=>$id]);
        }


    }