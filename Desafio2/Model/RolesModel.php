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

        public function create($rol = array()) {

            $query = "INSERT INTO tipo_usuarios(tipo_usuario) VALUES(:tipo_usuario)";

            return $this->set_query($query, $rol);
        }

        public function update($rol = array()) {

            $query = "UPDATE tipo_usuarios SET tipo_usuario = :tipo_usuario WHERE codigo_tipo_usuario = :codigo_tipo_usuario";

            return $this->set_query($query, $rol);
        }

        public function delete() {}
    }