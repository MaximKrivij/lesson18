<?php

require_once '../vendor/autoload.php';

$driverRepository = new \App\Repositories\DriversRepository();

if (isset($_POST['full_name']) && isset($_POST['data_birthday']) &&
    isset($_POST['driving_experience']) && isset($_POST['driver_license_number']) &&
    isset($_POST['hourly_labor_cost'])) {

    $driver['full_name'] = $_POST['full_name'];
    $driver['data_birthday'] = $_POST['data_birthday'];
    $driver['driving_experience'] = $_POST['driving_experience'];
    $driver['driver_license_number'] = $_POST['driver_license_number'];
    $driver['hourly_labor_cost'] = $_POST['hourly_labor_cost'];

    $driverRepository->create($driver);
    header("Location: ../action/showDrivers.php");
}

echo '<form name="create" method="post" action="createDriver.php">
    <p>ФИО:</p>
    <input type="text" name="full_name" value="" placeholder="full_name">
    <br>
    <p>Дата рождения:</p>
    <input type="text" name="data_birthday" value="" placeholder="data_birthday">
    <br>
    <p>Стаж водительских прав:</p>
    <input type="text" name="driving_experience" value="" placeholder="driving_experience">
    <br>
    <p>Номер лицензии:</p>
    <input type="text" name="driver_license_number" value="" placeholder="driver_license_number">
    <br>
    <p>Почасовая оплата труда:</p>
    <input type="text" name="hourly_labor_cost" value="" placeholder="hourly_labor_cost">
    <br>
    <input type="submit" value="Save">
    </form>';