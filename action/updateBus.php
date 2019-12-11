<?php

require_once '../vendor/autoload.php';

$busRepository = new \App\Repositories\BusesRepository();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $bus = $busRepository->get($id);

    echo '<form name="update" method="post" action="updateBus.php">
    <input type="hidden" name="id" value="' .$bus['id'] .'">
     <p>модель:</p>
    <input type="text" name="model" value="' .$bus['model'] .'" placeholder="model">
    <br>
    <p>вместительность:</p>
    <input type="text" name="spaciousness" value="' .$bus['spaciousness'] .'" placeholder="spaciousness">
    <br>
    <p>регистрационный номер:</p>
    <input type="text" name="registration_number" value="' .$bus['registration_number'] .'" placeholder="registration_number">
    <br>
    <p>расход топлива  л/100км:</p>
    <input type="text" name="fuel_consumption" value="' .$bus['fuel_consumption'] .'" placeholder="fuel_consumption">
    <br>
    <p>стоимость перевозки за час:</p>
    <input type="text" name="transportation_cost_per_hour" value="' .$bus['transportation_cost_per_hour'] .'" placeholder="transportation_cost_per_hour">
    <br>
    <input type="submit" value="Save">
    </form>';
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $bus = $busRepository->get($id);

    $bus['model'] = $_POST['model'];
    $bus['spaciousness'] = $_POST['spaciousness'];
    $bus['registration_number'] = $_POST['registration_number'];
    $bus['fuel_consumption'] = $_POST['fuel_consumption'];
    $bus['transportation_cost_per_hour'] = $_POST['transportation_cost_per_hour'];

    $busRepository->update($id, $bus);

    header("Location: ../action/showBuses.php");
}
