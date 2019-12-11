<?php

namespace App\Repositories;

use App\DataBase\Connection;

class BusesRepository
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
        $stmt = $this->pdo->query('SELECT * FROM buses WHERE id = ' . $id);

        return $stmt->fetch();
    }


    public function getList()
    {
        $stmt = $this->pdo->query('SELECT * FROM buses');

        return $stmt->fetchAll();
    }

    public function update(int $id, array $bus)
    {
        $stmt = $this->pdo->prepare(' UPDATE buses  SET 
            model = :model, 
            spaciousness = :spaciousness, 
            registration_number = :registration_number,
            fuel_consumption = :fuel_consumption,
            transportation_cost_per_hour = :transportation_cost_per_hour
               
            WHERE id = :id'
        );

        $stmt->bindParam('model', $bus['model'], \PDO::PARAM_STR );
        $stmt->bindValue('spaciousness',$bus['spaciousness'], \PDO::PARAM_STR );
        $stmt->bindValue('registration_number', $bus['registration_number'], \PDO::PARAM_STR );
        $stmt->bindValue('fuel_consumption',$bus['fuel_consumption'], \PDO::PARAM_STR );
        $stmt->bindValue('transportation_cost_per_hour', $bus['transportation_cost_per_hour'], \PDO::PARAM_STR );
        $stmt->bindValue('id', $id, \PDO::PARAM_INT );

        $stmt->execute();
    }

    public function create(array $bus)
    {
        $stmt = $this->getStmtInsert();
        $stmt->execute([
            $bus['model'],
            $bus['spaciousness'],
            $bus['registration_number'],
            $bus['fuel_consumption'],
            $bus['transportation_cost_per_hour']
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM buses WHERE id = :id');
        $stmt->bindValue('id', $id );

        $stmt->execute();
    }

    private function getStmtInsert(): \PDOStatement
    {
        return $this->pdo->prepare(
            'INSERT INTO buses (model, spaciousness, registration_number, fuel_consumption, transportation_cost_per_hour) VALUES(?, ?, ?, ?, ?)'
        );
    }
}