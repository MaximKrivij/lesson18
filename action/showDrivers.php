<?php

require_once '../vendor/autoload.php';

$driverRepository = new \App\Repositories\DriversRepository();
$drivers = $driverRepository->getList();

echo '<a href="createDriver.php">Create Driver</a>';
echo '<table border="1">';
echo '<tr>';
echo '<th>full_name</th>';
echo '<th>data_birthday</th>';
echo '<th>driving_experience</th>';
echo '<th>driver_license_number</th>';
echo '<th>hourly_labor_cost</th>';
echo '<th>Action</th>';
echo '</tr>';

foreach ($drivers as $driver) {
    echo '<tr>';
    echo '<td>' . $driver['full_name'] . '</td>';
    echo '<td>' . $driver['data_birthday'] . '</td>';
    echo '<td>' . $driver['driving_experience'] . '</td>';
    echo '<td>' . $driver['driver_license_number'] . '</td>';
    echo '<td>' . $driver['hourly_labor_cost'] . '</td>';
    echo '<td>';
    echo '<a href="updateDriver.php?id='. $driver['id'] .'">Update</a> ';
    echo '<a href="deleteDriver.php?id='. $driver['id'] .'">Delete</a>';
    echo '</td>';
    echo '</tr>';
}
echo '</table>';

