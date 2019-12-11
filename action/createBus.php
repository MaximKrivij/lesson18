<?php

require_once '../vendor/autoload.php';

$busRepository = new \App\Repositories\BusesRepository();

if (isset($_POST['model']) && isset($_POST['spaciousness']) &&
    isset($_POST['registration_number']) && isset($_POST['fuel_consumption']) &&
    isset($_POST['transportation_cost_per_hour'])) {

    $bus['model'] = $_POST['model'];
    $bus['spaciousness'] = $_POST['spaciousness'];
    $bus['registration_number'] = $_POST['registration_number'];
    $bus['fuel_consumption'] = $_POST['fuel_consumption'];
    $bus['transportation_cost_per_hour'] = $_POST['transportation_cost_per_hour'];

    $busRepository->create($bus);
    header("Location: ../action/showBuses.php");
}

echo '<form name="create" method="post" action="createBus.php">
    <p>модель:</p>
    <input type="text" name="model" value="" placeholder="model">
    <br>
    <p>вместительность:</p>
    <input type="text" name="spaciousness" value="" placeholder="spaciousness">
    <br>
    <p>регистрационный номер:</p>
    <input type="text" name="registration_number" value="" placeholder="registration_number">
    <br>
    <p>расход топлива:</p>
    <input type="text" name="fuel_consumption" value="" placeholder="fuel_consumption">
    <br>
    <p>стоимость перевозки за час:</p>
    <input type="text" name="transportation_cost_per_hour" value="" placeholder="transportation_cost_per_hour">
    <br>
    <input type="submit" value="Save">
    </form>';