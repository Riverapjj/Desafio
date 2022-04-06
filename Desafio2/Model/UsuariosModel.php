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
                $query = "SELECT * FROM Usuarios U
                INNER JOIN tipo_usuarios T ON U.codigo_tipo_usuario = T.codigo_tipo_usuario";

            return $this->get_query($query);

            }else {
                //Retornar una editorial
                $query = "SELECT * FROM Usuarios U
                INNER JOIN tipo_usuarios T ON U.codigo_tipo_usuario = T.codigo_tipo_usuario
                WHERE codigo_usuario = :codigo_usuario";

                return $this->get_query($query, [":codigo_usuario"=>$id]);

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

        public function update($usuario = array()) {

            $query = "UPDATE Usuarios SET nombre_usuario = :nombre_usuario, codigo_tipo_usuario = :codigo_tipo_usuario, activo = :activo WHERE codigo_usuario = :codigo_usuario";

            return $this->set_query($query, $usuario);
        }

        public function delete($id = '') {
            $query = "DELETE FROM Productos WHERE codigo_producto = :codigo_producto";

            return $this->set_query($query, [":codigo_producto"=>$id]);
        }


    }