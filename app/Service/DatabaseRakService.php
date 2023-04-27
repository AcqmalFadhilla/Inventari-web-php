<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC\Service;

use ProgrammerZamanNow\Belajar\PHP\MVC\Config\Database;
use ProgrammerZamanNow\Belajar\PHP\MVC\Domain\DatabaseRak;
use ProgrammerZamanNow\Belajar\PHP\MVC\Exception\ValidationException;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseRakCreateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseRakCreateResponse;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseRakRepository;

class DatabaseRakService
{
    private DatabaseRakRepository $databaseRakRepository;
    public function __construct(DatabaseRakRepository $databaseRakRepository)
    {
        $this->databaseRakRepository = $databaseRakRepository;
    }

    public function createRak(DatabaseRakCreateRequest $request): DatabaseRakCreateResponse
    {
        $this->validateDatabaseRakCreateRequest($request);
        try {
            Database::beginTransaction();
            $databaseRak = $this->databaseRakRepository->findById($request->id_rak);
            if ($databaseRak != null) {
                throw new ValidationException("id rak already exists");
            }

            $databaseRak = new DatabaseRak();
            $databaseRak->id_rak = $request->id_rak;
            $databaseRak->nama_rak = $request->nama_rak;

            $this->databaseRakRepository->save($databaseRak);

            $response = new DatabaseRakCreateResponse();
            $response->databaseRak = $databaseRak;
            Database::commitTransaction();

            return $response;
        }catch (\Exception $exception){
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function validateDatabaseRakCreateRequest(DatabaseRakCreateRequest $request)
    {
        if ($request->id_rak == null || $request->nama_rak == null ||
            trim($request->id_rak) == ""){
            throw new ValidationException("id & nama rak not blank");
        }
    }



    public function current()
    {
        $statement = $this->databaseRakRepository->view();
        return $statement;

    }

    public function delete($request)
    {
        $statment = $this->databaseRakRepository->delete($request);
        return $statment;
    }
}