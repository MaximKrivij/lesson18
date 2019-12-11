<?php

require_once '../vendor/autoload.php';

$busRepository = new \App\Repositories\BusesRepository();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $bus = $busRepository->get($id);

    if (!empty($bus)) {
        echo '<form name="delete" method="post" action="deleteBus.php">
        <input type="hidden" name="id" value="' . $bus['id'] .'">
         Вы действитьельно хотете удалить эту модель автобуса: '.
            $bus['model'] .'?
         <input type="submit" value="Удалить">
         <a href="../action/showBuses.php">Назад</a>
        </form>';
    } else {
        echo 'Вы пытаетесь удалить не существующую модель автобуса! 
            <a href="../action/showBuses.php">Вернутся назад.</a>';
    }
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $busRepository->delete($id);

    header("Location: ../action/showBuses.php");
}
