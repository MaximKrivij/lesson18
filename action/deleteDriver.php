<?php

require_once '../vendor/autoload.php';

$driverRepository = new \App\Repositories\DriversRepository();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $driver = $driverRepository->get($id);

    if (!empty($driver)) {
        echo '<form name="delete" method="post" action="deleteDriver.php">
        <input type="hidden" name="id" value="' . $driver['id'] .'">
         Вы действитьельно хотете удалить водителя: '.
                $driver['full_name'] .'?
         <input type="submit" value="Удалить">
         <a href="showDrivers.php">Назад</a>
        </form>';
    } else {
        echo 'Вы пытаетесь удалить не существующего водителя! 
            <a href="showDrivers.php">Вернутся назад.</a>';
    }
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $driverRepository->delete($id);

    header("Location: ../action/showDrivers.php");
}
