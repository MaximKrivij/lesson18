<?php

require_once '../vendor/autoload.php';

$busRepository = new \App\Repositories\BusesRepository();
$buses = $busRepository->getList();

echo '<a href="createBus.php">Create Bus</a>';
echo '<table border="1">';
echo '<tr>';
echo '<th>model</th>';
echo '<th>spaciousness</th>';
echo '<th>registration_number</th>';
echo '<th>fuel_consumption</th>';
echo '<th>transportation_cost_per_hour</th>';
echo '<th>Action</th>';
echo '</tr>';

foreach ($buses as $bus) {
    echo '<tr>';
    echo '<td>' . $bus['model'] . '</td>';
    echo '<td>' . $bus['spaciousness'] . '</td>';
    echo '<td>' . $bus['registration_number'] . '</td>';
    echo '<td>' . $bus['fuel_consumption'] . '</td>';
    echo '<td>' . $bus['transportation_cost_per_hour'] . '</td>';
    echo '<td>';
    echo '<a href="updateBus.php?id='. $bus['id'] .'">Update</a> ';
    echo '<a href="deleteBus.php?id='. $bus['id'] .'">Delete</a>';
    echo '</td>';
    echo '</tr>';
}
echo '</table>';

