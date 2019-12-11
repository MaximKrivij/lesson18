<?php

require_once '../vendor/autoload.php';

$driverRepository = new \App\Repositories\DriversRepository();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $driver = $driverRepository->get($id);

    echo '<form name="update" method="post" action="updateDriver.php">
    <input type="hidden" name="id" value="' . $driver['id'] .'">
    <p>ФИО:</p>
    <input type="text" name="full_name" value="' . $driver['full_name'] .'" placeholder="full_name">
    <br>
    <p>Дата рождения:</p>
    <input type="text" name="data_birthday" value="' . $driver['data_birthday'] .'" placeholder="data_birthday">
    <br>
    <p>Стаж водительских прав:</p>
    <input type="text" name="driving_experience" value="' . $driver['driving_experience'] .'" placeholder="driving_experience">
    <br>
    <p>Номер лицензии:</p>
    <input type="text" name="driver_license_number" value="' . $driver['driver_license_number'] .'" placeholder="driver_license_number">
    <br>
    <p>Почасовая оплата труда:</p>
    <input type="text" name="hourly_labor_cost" value="' . $driver['hourly_labor_cost'] .'" placeholder="hourly_labor_cost">
    <br>
    <input type="submit" value="Save">
    </form>';
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $driver = $driverRepository->get($id);

    $driver['full_name'] = $_POST['full_name'];
    $driver['data_birthday'] = $_POST['data_birthday'];
    $driver['driving_experience'] = $_POST['driving_experience'];
    $driver['driver_license_number'] = $_POST['driver_license_number'];
    $driver['hourly_labor_cost'] = $_POST['hourly_labor_cost'];

    $driverRepository->update($id, $driver);

    header("Location: ../action/showDrivers.php");
}
