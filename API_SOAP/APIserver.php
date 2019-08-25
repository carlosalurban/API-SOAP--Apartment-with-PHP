<?php
class Api
{
    private $db;
    function __construct()
    {
        require 'constants.php';
        $this->db = $this->conect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    }
    private function conect($dbHost, $dbUser, $dbPass, $dbName)
    {
        $dataBaseObject = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($dataBaseObject->connect_error) {
            die("No se puede conectar: " . $dataBaseObject->connect_error);
        }
        return $dataBaseObject;
    }
    function disponibilidad($checkIn, $checkOut)
    {
        $full = false;
        $querySentence = "SELECT entrada, sortida FROM clients c INNER JOIN reserves r ON c.id_client=r.id_client WHERE (entrada BETWEEN '{$checkIn}' AND '{$checkOut}') OR (sortida BETWEEN '{$checkIn}' AND '{$checkOut}') OR ( entrada <'{$checkIn}' AND sortida >'{$checkIn}')OR(entrada <'{$checkOut}' AND sortida >= '{$checkOut}')";
        $sentence = $this->db->query($querySentence);
        if ($sentence->num_rows > 0) {
            while ($row = $sentence->fetch_assoc()) {
                echo $row['entrada'];
                echo $row['sortida'];
                echo $checkOut;
                echo $checkIn;

                if (($row['entrada'] == $checkOut) || ($row['sortida'] == $checkIn)) {
                    $full = true;
                } else {
                    $full = false;
                }
            }
        } else {
            $full = true;
        }
        return $full;
    }
    function insertarCliente($name, $surname, $mail, $phoneNumber)
    {
        $codeVal1 = utf8_encode($name);
        $codeVal2 = utf8_encode($surname);
        $codeVal1 = $this->db->real_escape_string($codeVal1);
        $codeVal2 = $this->db->real_escape_string($codeVal2);
        $sqlSelect = "INSERT INTO clients(nom, cognom1, correu, telefon) VALUES('$codeVal1','$codeVal2','$mail','$phoneNumber')";
        $this->db->query($sqlSelect);

        if ($this->db->affected_rows == 1) {
            $num = $this->buscador($name, $surname);
            return $num;
        } else {
            return false;
        }
    }
    function insertarReserva($id, $checkIn, $checkOut)
    {
        $disponible = $this->disponibilidad($checkIn, $checkOut);
        if ($disponible) {
            $insertar = $this->insertReserves($id, $checkIn, $checkOut);
            return $insertar;
        } else {
            return false;
        }
    }
    private function insertReserves($id, $checkIn, $checkOut)
    {
        $sqlSelect = "INSERT INTO reserves(id_client, entrada, sortida) VALUES('{$id}','{$checkIn}','{$checkOut}')";
        $this->db->query($sqlSelect);
        if ($this->db->affected_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
      function buscador($val1, $val2)
    {
        $codeNom = utf8_encode($val1);
        $codeAp = utf8_encode($val2);
        $rows = [];
        $querySentence = "SELECT id_client FROM clients WHERE nom=? AND cognom1=?";
        $sentence = $this->db->stmt_init();
        if (!$sentence->prepare($querySentence)) {
            die("error:" . $sentence->error);
        } else {
            $sentence->bind_param("ss", $codeNom, $codeAp);
        }
        $sentence->execute();
        $finalQuery = $sentence->get_result();
        if ($finalQuery->num_rows > 0) {
            for ($i = 0; $i < $finalQuery->num_rows; $i++) {
                $row = $finalQuery->fetch_assoc();
                $rows[] = $row;
                foreach ($rows as $index) {
                    foreach ($index as $index2 => $value) {
                        $value;
                    }
                }
            }
            return $value;
        }
    }
}
$options["uri"] = "http://localhost/APIsoap/API_SOAP/APIserver.php";
$server = new SoapServer(NULL, $options);
echo $server->setClass("Api");
$server->handle();
