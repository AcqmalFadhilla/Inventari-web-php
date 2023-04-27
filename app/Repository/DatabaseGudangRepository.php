<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC\Repository;

use ProgrammerZamanNow\Belajar\PHP\MVC\Domain\DatabaseGudang;
use ProgrammerZamanNow\Belajar\PHP\MVC\Domain\DatabaseJenis;

class DatabaseGudangRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(DatabaseGudang $databaseGudang): DatabaseGudang
    {
        $statement = $this->connection->prepare("INSERT INTO gudang(id_gudang, nama_gudang) VALUES(?, ?)");
        $statement->execute([
            $databaseGudang->id_gudang,
            $databaseGudang->nama_gudang,
        ]);
        return $databaseGudang;
    }

    public function findById(string $id_gudang): ?DatabaseGudang
    {
        $statement = $this->connection->prepare("SELECT id_gudang, nama_gudang FROM gudang WHERE id_gudang = ?");
        $statement->execute([$id_gudang]);

        try {
            if ($row = $statement->fetch()) {
                $databaseGudang = new DatabaseGudang();
                $databaseGudang->id_gudang = $row['id_gudang'];
                $databaseGudang->nama_gudang = $row['nama_gudang'];
                return $databaseGudang;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function view()
    {
        $statement = $this->connection->prepare("SELECT * FROM gudang");
        $statement->execute();
        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function delete($id){
        $statement = $this->connection->prepare("DELETE FROM gudang WHERE id_gudang = ?");
        $statement->execute([$id]);
    }
}