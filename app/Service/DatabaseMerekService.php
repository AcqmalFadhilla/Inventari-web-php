<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC\Service;

use ProgrammerZamanNow\Belajar\PHP\MVC\Config\Database;
use ProgrammerZamanNow\Belajar\PHP\MVC\Domain\DatabaseJenis;
use ProgrammerZamanNow\Belajar\PHP\MVC\Domain\DatabaseMerek;
use ProgrammerZamanNow\Belajar\PHP\MVC\Exception\ValidationException;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseJenisCreateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseJenisCreateResponse;

use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseMerekCreateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseMerekCreateResponse;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseMerekRepository;

class DatabaseMerekService
{
   private DatabaseMerekRepository $databaseMerekRepository;

    public function __construct(DatabaseMerekRepository $databaseMerekRepository)
    {
        $this->databaseMerekRepository = $databaseMerekRepository;
    }


    public function createMerek(DatabaseMerekCreateRequest $request): DatabaseMerekCreateResponse
    {
        $this->validateDatabaseMerekCreateRequest($request);
        try {
            Database::beginTransaction();
            $databaseMerek = $this->databaseMerekRepository->findById($request->id_merek);
            if ($databaseMerek != null) {
                throw new ValidationException("id Merek already exists");
            }

            $databaseMerek = new DatabaseMerek();
            $databaseMerek->id_merek = $request->id_merek;
            $databaseMerek->nama_merek = $request->nama_merek;

            $this->databaseMerekRepository->save($databaseMerek);

            $response = new DatabaseMerekCreateResponse();
            $response->databaseMerek = $databaseMerek;
            Database::commitTransaction();

            return $response;
        }catch (\Exception $exception){
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function validateDatabaseMerekCreateRequest(DatabaseMerekCreateRequest $request)
    {
        if ($request->id_merek == null || $request->nama_merek == null ||
            trim($request->id_merek) == ""){
            throw new ValidationException("id & nama merek not blank");
        }
    }

    public function current()
    {
        $statement = $this->databaseMerekRepository->view();
        return $statement;
    }

    public function delete($request)
    {
        $statment = $this->databaseMerekRepository->delete($request);
        return $statment;
    }
}