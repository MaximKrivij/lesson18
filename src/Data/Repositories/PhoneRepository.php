<?php
namespace App\Data\Repositories;
use App\DataBase\Connection;
class PhoneRepository
{
    /**
     * @var \PDO
     */
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::createConnect();
    }

    public function getPhones()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM phones');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create( $phone)
    {
        $stmt = $this->getStmtInsert();
        $stmt->execute([
           $phone['phone'],
        ]);
    }
    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM phones WHERE id = :id');
        $stmt->bindValue('id', $id );
        $stmt->execute();
    }
    private function getStmtInsert(): \PDOStatement
    {
        return $this->pdo->prepare(
            'INSERT INTO phones (phone) VALUES(?)'
        );
    }
}


