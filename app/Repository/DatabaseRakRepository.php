<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC\Repository;

use ProgrammerZamanNow\Belajar\PHP\MVC\Domain\DatabaseRak;

class DatabaseRakRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(DatabaseRak $databaseRak): DatabaseRak
    {
        $statement = $this->connection->prepare("INSERT INTO Rak(id_rak, nama_rak) VALUES(?, ?)");
        $statement->execute([
            $databaseRak->id_rak,
            $databaseRak->nama_rak,
        ]);

        return $databaseRak;
    }

    public function findById(string $id_rak): ?DatabaseRak
    {
        $statement = $this->connection->prepare("SELECT id_rak, nama_rak FROM Rak WHERE id_rak = ?");
        $statement->execute([$id_rak]);

        try {
            if ($row = $statement->fetch()) {
                $databaseRak = new DatabaseRak();
                $databaseRak->id_rak = $row['id_rak'];
                $databaseRak->nama_rak = $row['nama_rak'];
                return $databaseRak;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }

    }

    public  function  view()
    {
        $statement = $this->connection->prepare("SELECT * FROM Rak");
        $statement->execute();
        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function delete($id){
        $statement = $this->connection->prepare("DELETE FROM Rak WHERE id_rak = ?");
        $statement->execute([$id]);
    }

}