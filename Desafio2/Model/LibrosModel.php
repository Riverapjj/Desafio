<?php

    require_once 'ModelPDO.php';

    class LibrosModel extends ModelPDO {


        public function get($id = '') {
            $query = "";
            if ($id == '') {
                //Retornar todas las editoriales
                $query = "SELECT * FROM Libros L INNER JOIN Autores A ON L.codigo_autor=A.codigo_autor
                            INNER JOIN Editoriales E ON L.codigo_editorial=E.codigo_editorial
                            INNER JOIN Generos G ON L.id_genero=G.id_genero";

            return $this->get_query($query);

            }else {
                //Retornar una editorial
                $query = "SELECT * FROM Libros L INNER JOIN Autores A ON L.codigo_autor=A.codigo_autor
                INNER JOIN Editoriales E ON L.codigo_editorial=E.codigo_editorial
                INNER JOIN Generos G ON L.id_genero=G.id_genero WHERE codigo_libro=:codigo_libro";

                return $this->get_query($query, [":codigo_libro"=>$id]);

            }

        }

        public function create($libro = array()) {

            $query = "INSERT INTO Libros(codigo_libro, nombre_libro, existencias, precio, codigo_autor, codigo_editorial, id_genero, descripcion) VALUES(:codigo_libro, :nombre_libro, :existencias, :precio, :codigo_autor, :codigo_editorial, :id_genero, :descripcion)";

            return $this->set_query($query, $libro);
        }

        public function update($libro = array()) {

            $query = "UPDATE Libros SET nombre_libro = :nombre_libro, existencias = :existencias, precio = :precio, codigo_autor = :codigo_autor, codigo_editorial = :codigo_editorial, id_genero = :id_genero, descripcion = :descripcion WHERE codigo_libro = :codigo_libro";

            return $this->set_query($query, $libro);
        }

        public function delete($id = '') {
            $query = "DELETE FROM Libros WHERE codigo_libro = :codigo_libro";

            return $this->set_query($query, [":codigo_libro"=>$id]);
        }


    }