<?php

namespace App\Repositories;

use App\DataBase\Connection;

class DriversRepository
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
        $stmt = $this->pdo->query('SELECT * FROM drivers WHERE id = ' . $id);

        return $stmt->fetch();
    }


    public function getList()
    {
        $stmt = $this->pdo->query('SELECT * FROM drivers');

        return $stmt->fetchAll();
    }

    public function update(int $id, array $driver)
    {
        $stmt = $this->pdo->prepare(' UPDATE drivers  SET 
            full_name = :full_name, 
            data_birthday = :data_birthday, 
            driving_experience = :driving_experience,
            driver_license_number = :driver_license_number,
            hourly_labor_cost = :hourly_labor_cost
               
             WHERE id = :id'
        );

        $stmt->bindParam('full_name', $driver['full_name'], \PDO::PARAM_STR);
        $stmt->bindValue('data_birthday', $driver['data_birthday'], \PDO::PARAM_STR);
        $stmt->bindValue('driving_experience', $driver['driving_experience'], \PDO::PARAM_STR);
        $stmt->bindValue('driver_license_number', $driver['driver_license_number'], \PDO::PARAM_STR);
        $stmt->bindValue('hourly_labor_cost', $driver['hourly_labor_cost'], \PDO::PARAM_STR);
        $stmt->bindValue('id', $id, \PDO::PARAM_INT);

        $stmt->execute();
    }

    public function create(array $driver)
    {
        $stmt = $this->getStmtInsert();
        $stmt->execute([
            $driver['full_name'],
            $driver['data_birthday'],
            $driver['driving_experience'],
            $driver['driver_license_number'],
            $driver['hourly_labor_cost']
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM drivers WHERE id = :id');
        $stmt->bindValue('id', $id);

        $stmt->execute();
    }

    private function getStmtInsert(): \PDOStatement
    {
        return $this->pdo->prepare(
            'INSERT INTO drivers (full_name, data_birthday, driving_experience, driver_license_number, hourly_labor_cost) VALUES(?, ?, ?, ?, ?)'
        );
    }
}