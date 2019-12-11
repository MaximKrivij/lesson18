<?php

require_once '../vendor/autoload.php';

$driverOnBus = new \App\Repositories\DriversOnBusesRepository();

$listDrivers = $driverOnBus->getListDrivers();

$listBuses = $driverOnBus->getListBuses();

if (isset($_POST['submit']) && isset($_POST['selectDriver']) &&
    isset($_POST['selectBus']) && isset($_POST['selectDay'])) {

    $data['driver'] = $_POST['selectDriver'];
    $data['bus_model'] = $_POST['selectBus'];
    $data['today'] = $_POST['selectDay'];
    $data['create_time'] = date("Y-m-d H:i:s");;

    $driverOnBus->create($data);
    header("Location: ../action/createDriverOnBus.php");
}

echo '<form action="" method="post">
    <select size="3" multiple name="selectDriver">
    <option disabled>Выберите Водителя:</option>
    ';
foreach ($listDrivers as $value) {
    echo' <option value="'.$value['full_name'].'">'.$value['full_name'].'</option>';
}
echo '</select>';

echo ' <select size="3" multiple name="selectBus">
    <option disabled>Выберите Автобус:</option>
    ';
foreach ($listBuses as $value) {
    echo' <option value="'.$value['model'].'">'.$value['model'].'</option>';
}
echo '</select>';

echo '<select size="3" multiple name="selectDay">
    <option disabled>Выберите день недели:</option>
    <option value="Понедельник">Понедельник</option>
    <option selected value="Вторник">Вторник</option>
    <option value="Среда">Среда</option>
    <option value="Четверг">Четверг</option>
    <option value="Пятница">Пятница</option>
    <option value="Суббота">Суббота</option>
    <option value="Воскресенье">Воскресенье</option>
    </select>
    ';
echo '<input type="submit" name="submit" value="Назначить">
    </form>
    ';





