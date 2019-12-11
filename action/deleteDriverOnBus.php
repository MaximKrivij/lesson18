<?php

require_once '../vendor/autoload.php';

$driverOnBus = new \App\Repositories\DriversOnBusesRepository();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $driverOnBusId = $driverOnBus->get($id);

    if (!empty($driverOnBusId)) {
        echo '<form name="delete" method="post" action="deleteDriverOnBus.php">
        <input type="hidden" name="id" value="' . $driverOnBusId['id'] .'">
          Вы действитьельно хотете убрать водителя : 
          '.$driverOnBusId['driver'] .' с автобуса?
         <input type="submit" value="Удалить">
         <a href="ViewDriversOnBuses.php">Назад</a>
        </form>';
    } else {
        echo 'Вы пытаетесь удалить не существующего водителя и автобуса! 
            <a href="ViewDriversOnBuses.php">Вернутся назад.</a>';
    }
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $driverOnBus->delete($id);

    header("Location: ../action/ViewDriversOnBuses.php");
}

