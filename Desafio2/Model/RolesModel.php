<?php

    require_once 'ModelPDO.php';

    class RolesModel extends ModelPDO {


        public function get($id = '') {
            $query = "";
            if ($id == '') {
                //Retornar todas las editoriales
                $query = "SELECT * FROM tipo_usuarios";

            return $this->get_query($query);

            }else {
                //Retornar una editorial
                $query = "SELECT * FROM tipo_usuarios WHERE codigo_tipo_usuario = :codigo_tipo_usuario";

                return $this->get_query($query, [":codigo_tipo_usuario"=>$id]);

            }

        }

        public function create($categoria = array()) {

            $query = "INSERT INTO Categorias(codigo_categoria, nombre_categoria) VALUES(:codigo_categoria, :nombre_categoria)";

            return $this->set_query($query, $categoria);
        }

        public function update($categoria = array()) {

            $query = "UPDATE Categorias SET nombre_categoria = :nombre_categoria WHERE codigo_categoria = :codigo_categoria";

            return $this->set_query($query, $categoria);
        }

        public function delete($id = '') {
            $query = "DELETE FROM Categorias WHERE codigo_categoria = :codigo_categoria";

            return $this->set_query($query, [":codigo_categoria"=>$id]);
        }


    }