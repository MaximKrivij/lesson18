<?php


namespace App\Repositories;

use App\DataBase\Connection;

class DriversOnBusesRepository
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::createConnect();
    }

    public function get(int $id)
    {
        $stmt = $this->pdo->query('SELECT * FROM driver_on_bus WHERE id = ' . $id);

        return $stmt->fetch();
    }

    public function getListDrivers()
    {
        $stmt = $this->pdo->query('SELECT * FROM drivers');

        return $stmt->fetchAll();
    }

    public function getListBuses()
    {
        $stmt = $this->pdo->query('SELECT * FROM buses');

        return $stmt->fetchAll();
    }

    public function getListDriversOnBuses()
    {
        $stmt = $this->pdo->query('SELECT * FROM driver_on_bus');

        return $stmt->fetchAll();
    }

    public function create(array $data)
    {
        $stmt = $this->getStmtInsert();
        $stmt->execute([
            $data['driver'],
            $data['bus_model'],
            $data['today'],
            $data['create_time']
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM driver_on_bus WHERE id = :id');
        $stmt->bindValue('id', $id);

        $stmt->execute();
    }

    private function getStmtInsert(): \PDOStatement
    {
        return $this->pdo->prepare(
            'INSERT INTO driver_on_bus (driver, bus_model, today, create_time) VALUES(?, ?, ?, ?)'
        );
    }
}