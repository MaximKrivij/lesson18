<?php

require_once '../vendor/autoload.php';

$viewDriversOnBus = new \App\Repositories\DriversOnBusesRepository();
$show = $viewDriversOnBus->getListDriversOnBuses();

echo '<table border="1">';
echo '<tr>';
echo '<th>Водитель</th>';
echo '<th>Автобус</th>';
echo '<th>День</th>';
echo '<th>Назначен</th>';
echo '<th>Action</th>';
echo '</tr>';

foreach ($show as $val) {
    echo '<tr>';
    echo '<td>' . $val['driver'] . '</td>';
    echo '<td>' . $val['bus_model'] . '</td>';
    echo '<td>' . $val['today'] . '</td>';
    echo '<td>' . $val['create_time'] . '</td>';
    echo '<td>';
    echo '<a href="deleteDriverOnBus.php?id='. $val['id'] .'">Delete</a>';
    echo '</td>';
    echo '</tr>';
}
echo '</table>';

