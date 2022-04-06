<?php

    require_once 'ModelPDO.php';

    class UsuariosModel extends ModelPDO {


        public function validateUser($username, $password) {
            $query = "SELECT nombre_usuario, activo, codigo_tipo_usuario FROM Usuarios WHERE nombre_usuario = :nombre_usuario AND password = SHA2(:password, 256)";

            return $this->get_query($query, [":nombre_usuario"=>$username, ":password"=>$password]);
        }

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

        public function create($usuario = array()) {

            $query = "INSERT INTO Usuarios(codigo_tipo_usuario, activo, password, nombre_usuario) VALUES(:codigo_tipo_usuario, 1, :password, :nombre_usuario)";
            
            return $this->set_query($query, $usuario);
        }

        public function createPublic($usuario = array()) {

            $query = "INSERT INTO Usuarios(codigo_tipo_usuario, activo, nombre_usuario, password) VALUES(3, 1, :nombre_usuario, SHA2(:password, 256))";
            
            return $this->set_query($query, $usuario);
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