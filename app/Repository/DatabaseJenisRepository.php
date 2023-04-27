<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC\Repository;

use ProgrammerZamanNow\Belajar\PHP\MVC\Domain\DatabaseJenis;

class DatabaseJenisRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(DatabaseJenis $databaseJenis): DatabaseJenis
    {
        $statement = $this->connection->prepare("INSERT INTO jenis(id_jenis, nama_jenis) VALUES(?, ?)");
        $statement->execute([
            $databaseJenis->id_jenis,
            $databaseJenis->nama_jenis,
        ]);
            return $databaseJenis;
    }

    public function findById(string $id_jenis): ?DatabaseJenis
    {
        $statement = $this->connection->prepare("SELECT id_jenis, nama_jenis FROM jenis WHERE id_jenis = ?");
        $statement->execute([$id_jenis]);

        try {
            if ($row = $statement->fetch()) {
                $databaseJenis = new DatabaseJenis();
                $databaseJenis->id_jenis = $row['id_jenis'];
                $databaseJenis->nama_jenis = $row['nama_jenis'];
                return $databaseJenis;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function view()
    {
        $statement = $this->connection->prepare('SELECT * FROM jenis');
        $statement->execute();
        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function delete($id)
    {
        $statement = $this->connection->prepare("DELETE FROM jenis WHERE id_jenis = ?");
        $statement->execute([$id]);
    }
}