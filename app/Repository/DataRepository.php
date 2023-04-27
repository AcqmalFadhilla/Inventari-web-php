<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC\Repository;

use ProgrammerZamanNow\Belajar\PHP\MVC\Domain\Data;

class DataRepository
{
    private \PDO $connection;
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Data $data): Data
    {
        $statement = $this->connection->prepare("INSERT INTO barang(id_jenis, 
                 id_merek, 
                 id_gudang, 
                 id_rak,
                 id_barang,
                 nama_barang,
                 status) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $statement->execute([
                $data->id_jenis,
                $data->id_merek,
                $data->id_gudang,
                $data->id_rak,
                $data->id_barang,
                $data->nama_barang,
                $data->status
            ]);
            return $data;
    }

    public function findById(string $id_barang): ?Data{
        $statement = $this->connection->prepare("SELECT id_jenis, id_merek, id_gudang, id_rak, id_barang, nama_barang, status FROM barang WHERE id_barang = ?");
        $statement->execute([$id_barang]);
        try {
            if ($row = $statement->fetch()) {
                $data = new Data();
                $data->id_jenis = $row['id_jenis'];
                $data->id_merek = $row['id_merek'];
                $data->id_gudang = $row['id_gudang'];
                $data->id_rak = $row['id_rak'];
                $data->id_barang = $row['id_barang'];
                $data->nama_barang = $row['nama_barang'];
                $data->status = $row['status'];
                return $data;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function view()
    {
        $statement = $this->connection->prepare("SELECT * FROM barang");
        $statement->execute();
        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function viewUpdate($id)
    {
        $statement = $this->connection->prepare("SELECT * FROM barang WHERE id_barang = ?");
        $statement->execute([$id]);
        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function delete($id): void{
        $statement = $this->connection->prepare("DELETE FROM barang WHERE id_barang = ?");
        $statement->execute([$id]);
        $statement->rowCount();
    }

    public function update(Data $data): Data
    {
//        var_dump($data);
//        die;
        $statement = $this->connection->prepare("UPDATE barang SET

                                    id_jenis = ?,
                                    id_merek = ?,
                                    id_gudang = ?,
                                    id_rak = ?,
                                    nama_barang = ?,
                                    status = ? WHERE id_barang = ?");
        $statement->execute([
            $data->id_jenis,
            $data->id_merek,
            $data->id_gudang,
            $data->id_rak,
            $data->nama_barang,
            $data->status,
            $data->id_barang
        ]);
        return $data;
    }

}