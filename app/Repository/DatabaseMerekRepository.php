<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC\Repository;

use ProgrammerZamanNow\Belajar\PHP\MVC\Domain\DatabaseMerek;

class DatabaseMerekRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(DatabaseMerek $databaseMerek): DatabaseMerek
    {
        $statement = $this->connection->prepare("INSERT INTO merek(id_merek, nama_merek) VALUES(?, ?)");
        $statement->execute([
            $databaseMerek->id_merek,
            $databaseMerek->nama_merek,
        ]);
        return $databaseMerek;
    }

    public function findById(string $id_merek): ?DatabaseMerek
    {
        $statement = $this->connection->prepare("SELECT id_merek, nama_merek FROM merek WHERE id_merek = ?");
        $statement->execute([$id_merek]);

        try {
            if ($row = $statement->fetch()) {
                $databaseMerek= new DatabaseMerek();
                $databaseMerek->id_merek = $row['id_merek'];
                $databaseMerek->nama_merek = $row['nama_merek'];
                return $databaseMerek;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }

    }

    public function view(){
        $statement = $this->connection->prepare("SELECT * FROM merek");
        $statement->execute();
        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function delete($id)
    {
        $statement = $this->connection->prepare("DELETE FROM merek WHERE id_merek = ?");
        $statement->execute([$id]);
    }
}