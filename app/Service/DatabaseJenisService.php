<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC\Service;

use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use ProgrammerZamanNow\Belajar\PHP\MVC\Config\Database;
use ProgrammerZamanNow\Belajar\PHP\MVC\Domain\DatabaseJenis;
use ProgrammerZamanNow\Belajar\PHP\MVC\Domain\User;
use ProgrammerZamanNow\Belajar\PHP\MVC\Exception\ValidationException;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseJenisCreateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseJenisCreateResponse;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\UserRegisterResponse;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseJenisRepository;

class DatabaseJenisService
{
    private DatabaseJenisRepository $databaseJenisRepository;

    public function __construct(DatabaseJenisRepository $databaseJenisRepository)
    {
        $this->databaseJenisRepository = $databaseJenisRepository;
    }

    public function createJenis(DatabaseJenisCreateRequest $request): DatabaseJenisCreateResponse
    {
        $this->validateDatabaseJenisCreateRequest($request);
        try {
            Database::beginTransaction();
            $databaseJenis = $this->databaseJenisRepository->findById($request->id_jenis);
            if ($databaseJenis != null) {
                throw new ValidationException("id jenis already exists");
            }

            $databaseJenis = new DatabaseJenis();
            $databaseJenis->id_jenis = $request->id_jenis;
            $databaseJenis->nama_jenis = $request->nama_jenis;

            $this->databaseJenisRepository->save($databaseJenis);

            $response = new DatabaseJenisCreateResponse();
            $response->databaseJenis = $databaseJenis;
            Database::commitTransaction();

            return $response;
        }catch (\Exception $exception){
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function validateDatabaseJenisCreateRequest(DatabaseJenisCreateRequest $request)
    {
        if ($request->id_jenis == null || $request->nama_jenis == null ||
            trim($request->id_jenis) == ""){
            throw new ValidationException("id & nama barang not blank");
        }
    }

    public function current(){
        $statment = $this->databaseJenisRepository->view();
        return $statment;
    }

    public function  deleteData($request){
        $statment = $this->databaseJenisRepository->delete($request);
        return $statment;
    }
}