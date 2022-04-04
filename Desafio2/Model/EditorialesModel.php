<?php

    require_once 'Model.php';

    class EditorialesModel extends Model {


        public function get($id = '') {
            $query = "";
            if ($id == '') {
                //Retornar todas las editoriales
                $query = "SELECT * FROM Editoriales";

            }else {
                //Retornar una editorial
                $query = "SELECT * FROM Editoriales WHERE codigo_editorial = '$id'";
            }

            return $this->get_query($query);
        }

        public function create($editorial = array()) {
            extract($editorial);

            $query = "INSERT INTO Editoriales(codigo_editorial, nombre_editorial, contacto, telefono) VALUES('$codigo_editorial', '$nombre_editorial', '$contacto', '$telefono')";

            return $this->set_query($query);
        }

        public function update($editorial = array()) {
            extract($editorial);

            $query = "UPDATE Editoriales SET nombre_editorial = '$nombre_editorial', contacto = '$contacto', telefono = '$telefono' WHERE codigo_editorial = '$codigo_editorial'";

            return $this->set_query($query);
        }

        public function delete($id = '') {
            $query = "DELETE FROM Editoriales WHERE codigo_editorial = '$id'";

            return $this->set_query($query);
        }


    }