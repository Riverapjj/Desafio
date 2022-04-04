<?php

    require_once 'Model.php';
    class AutoresModel extends Model {

        public function get($id = '') {
            $query = "";
            if ($id == '') {
                //Retornar todos los autores
                $query = "SELECT * FROM Autores";

            }else {
                //Retornar un autor
                $query = "SELECT * FROM Autores WHERE codigo_autor = ?";
            }

            $rows = [];
            $this->db_open();
            
            $stmt = $this->conn->prepare($query);

            if ($id != '') {
                $stmt->bind_param("s", $id);
            }

            $stmt->execute();

            $result = $stmt->get_result();

            while($rows[] = $result->fetch_assoc());

            $result->close();
            $stmt->close();
            $this->db_close();
            array_pop($rows);

            return $rows;
        }

        public function create($autor = array()) {
            extract($autor);

            $query = "INSERT INTO Autores(codigo_autor, nombre_autor, nacionalidad) VALUES(?, ?, ?)";

            try {
                $this->db_open();

                $stmt = $this->conn->prepare($query);
                $stmt->bind_param("sss", $codigo_autor, $nombre_autor, $nacionalidad);
                $stmt->execute();

                $affectedRows = $stmt->affected_rows;

                $stmt->close();
                $this->db_close();
                return $affectedRows;
            } catch (exception $e) {
                return 0;
            }
        }

        public function update($autor = array()) {
            extract($autor);

            $query = "UPDATE Autores SET nombre_autor = ?, nacionalidad = ?";

            return $this->set_query($query);
            try {
                $this->db_open();
                
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param("ss", $nombre_autor, $nacionalidad);
                $stmt->execute();

                $affectedRows = $this->conn->affected_rows;
                $this->db_close();
                return $affectedRows;
            } catch (exception $e) {
                return 0;
            }
        }

        public function delete() {}
    }