<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC\Service;

use ProgrammerZamanNow\Belajar\PHP\MVC\Config\Database;
use ProgrammerZamanNow\Belajar\PHP\MVC\Domain\DatabaseGudang;
use ProgrammerZamanNow\Belajar\PHP\MVC\Domain\DatabaseJenis;
use ProgrammerZamanNow\Belajar\PHP\MVC\Exception\ValidationException;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseGudangCreateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseGudangCreateResponse;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseJenisCreateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseJenisCreateResponse;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseGudangRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseJenisRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseMerekRepository;

class DatabaseGudangService
{
   private DatabaseGudangRepository $databaseGudangRepository;

    /**
     * @param DatabaseGudangRepository $databaseGudangRepository
     */
    public function __construct(DatabaseGudangRepository $databaseGudangRepository)
    {
        $this->databaseGudangRepository = $databaseGudangRepository;
    }

    public function createGudang(DatabaseGudangCreateRequest $request): DatabaseGudangCreateResponse
    {
        $this->validateDatabaseGudangCreateRequest($request);
        try {
            Database::beginTransaction();
            $databaseGudang = $this->databaseGudangRepository->findById($request->id_gudang);
            if ($databaseGudang != null) {
                throw new ValidationException("id gudang already exists");
            }

            $databaseGudang = new DatabaseGudang();
            $databaseGudang->id_gudang = $request->id_gudang;
            $databaseGudang->nama_gudang = $request->nama_gudang;

            $this->databaseGudangRepository->save($databaseGudang);

            $response = new DatabaseGudangCreateResponse();
            $response->databaseGudang = $databaseGudang;
            Database::commitTransaction();

            return $response;
        }catch (\Exception $exception){
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function validateDatabaseGudangCreateRequest(DatabaseGudangCreateRequest $request)
    {
        if ($request->id_gudang == null || $request->nama_gudang == null ||
            trim($request->id_gudang) == ""){
            throw new ValidationException("id & nama gudang not blank");
        }
    }

    public function current()
    {
        $statement = $this->databaseGudangRepository->view();
        return $statement;
    }

    public function deleteData($request){
        $statment = $this->databaseGudangRepository->delete($request);
        return $statment;
    }

}