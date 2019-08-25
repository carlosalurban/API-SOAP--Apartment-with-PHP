<?php
/************************************************************************************************************************************************************************** */
/************This is only and quick example of the interface from this API SOAP and how could it works with the API with an a FAKE databa on MySQL **************************/
/************************************************************************************************************************************************************************** */
$options["location"] = "http://localhost/APIsoap/API_SOAP/APIserver.php"; 
$options["uri"] = "http://localhost/APIsoap/API_SOAP/APIserver.php";
$client = new SoapClient(NULL, $options);
echo $client->buscador("carlos", "Alvarez", "urbano");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API SOAP Client Interface</title>
    <link href="estilosSoap.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
        <h1>API SOAP Client Interface</h1>
    </header>
    <h3 class="tableclient" id="registroClick">Registro de Usuarios</h3>
    <div id="registro">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <fieldset>
                <legend>Registro de usuario</legend>
                <div class="field-class">
                    <div class="labels"><label for="name">Nom</label></div>
                    <div class="inputs"><input type="text" size="12" placeholder="Nom" name="name"></div>
                </div>
                <div class="field-class">
                    <div class="labels"><label for="surname1">Primer cognom</label></div>
                    <div class="inputs"><input type="text" size="12" placeholder="Apellido" name="surname1"></div>
                </div>
                <div class="field-class">
                    <div class="labels"><label for="mail">Correu</label></div>
                    <div class="inputs"><input type="text" size="12" placeholder="mail" name="mail"></div>
                </div>
                <div class="field-class">
                    <div class="labels"><label for="tel">Teléfon</label></div>
                    <div class="inputs"><input type="tel" size="12" placeholder="Telefono" name="tel"></div>
                </div>
                <div class="btn"><input type="submit" name="send" value="Registrar"></div>
            </fieldset>
        </form>
    </div>
    <?php
    if ((isset($_POST['send'])) && (isset($_POST['name'])) && (isset($_POST['surname1'])) && (isset($_POST['mail'])) && isset($_POST['tel'])) {
        $send = $_POST['send'];
        $name = $_POST['name'];
        $surname1 = $_POST['surname1'];
        $mail = $_POST['mail'];
        $tel = $_POST['tel'];
        $user = $client->insertarCliente($name, $surname1, $mail, $tel);
        if (!$user) {
            echo "<div class='questions'>no insertado</div>";
        } else {
            echo "<div class='questions'>Cliente insertado tu numero de usuario es el {$user}</div>";
        }
    }
    ?>
    <h3 class="tableclient" id="buscadorClick">Buscador de Usuarios</h3>
    <div id="buscador">
        <form action="<?php /*echo $_SERVER['PHP_SELF']*/ ?>" method="POST">
            <fieldset>
                <legend>Buscador de id de usuario</legend>
                <div class="field-class">
                    <div class="labels"><label for="name">Nom</label></div>
                    <div class="inputs"><input type="text" size="12" placeholder="Nom" name="nameUser"></div>
                </div>
                <div class="field-class">
                    <div class="labels"><label for="surname">Primer cognom</label></div>
                    <div class="inputs"><input type="text" size="12" placeholder="Primer cognom" name="surname1User"></div>
                </div>
                <div class="btn"><input type="submit" name="send3" value="Buscar"></div>
            </fieldset>
        </form>
    </div>
    <?php

    if ((isset($_POST['send3']))) {
        $searchName = $_POST['nameUser'];
        $searchSurname = $_POST['surname1User'];
        $search = $client->buscador($searchName, $searchSurname);
        echo "<div class='questions'>Hola {$searchName}, tu numero de clientes es el {$search}</div>";
    }
    ?>
    <h3 class="tableclient" id="registroClick2">Registro de Reservas</h3>
    <div id="registro2">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <fieldset>
                <legend>Registro de reservas</legend>
                <div class="field-class">
                    <div class="labels"><label for="name">Numero de client</label></div>
                    <div class="inputs"><input type="number" size="3" name="clientNum"></div>
                </div>
                <div class="field-class">
                    <div class="labels"><label for="checkin">Entrada</label></div>
                    <div class="inputs"><input type="date" size="12" placeholder="Primer cognom" name="checkin"></div>
                </div>
                <div class="field-class">
                    <div class="labels"><label for="checkout">Sortida</label></div>
                    <div class="inputs"><input type="date" size="12" placeholder="Primer cognom" name="checkout"></div>
                </div>
                <div class="btn"><input type="submit" name="send2" value="Reservar"></div>
            </fieldset>
        </form>
    </div>
    <?php
    if ((isset($_POST['send2'])) && (isset($_POST['clientNum'])) && (isset($_POST['checkin'])) && (isset($_POST['checkout']))) {
        $idClient = $_POST['clientNum'];
        $checkin = $_POST['checkin'];
        $checkOut = $_POST['checkout'];
        $booking = $client->insertarReserva($idClient, $checkin, $checkOut);
        if (!$booking) {
            echo "<div class='questions'>no reservado</div>";
        } else {
            echo "<div class='questions'>Reservado tu numero de reserva es el: {$booking}</div>";
        }
    }
    ?>
</body>

</html>