<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC\Service;

use mysql_xdevapi\Exception;
use ProgrammerZamanNow\Belajar\PHP\MVC\Config\Database;
use ProgrammerZamanNow\Belajar\PHP\MVC\Domain\Data;
use ProgrammerZamanNow\Belajar\PHP\MVC\Exception\ValidationException;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DataCreateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DataCreateResponse;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DataDeleteRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DataDeleteResponse;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DataUpdateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DataUpdateResponse;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\UserRegisterResponse;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DataRepository;
use function PHPUnit\Framework\throwException;

class DataService
{
    private DataRepository $dataRepository;

    public function __construct(DataRepository $dataRepository)
    {
        $this->dataRepository = $dataRepository;
    }

    public function create(DataCreateRequest $request): DataCreateResponse
    {
        $this->validateCreateDataResponse($request);

        try {
            Database::beginTransaction();
            $data = $this->dataRepository->findById($request->id_barang);
            if ($data != null) {
                throw new ValidationException("Id Barang already exists");
            }

            $data = new Data();
            $data->id_jenis = $request->id_jenis;
            $data->id_merek = $request->id_merek;
            $data->id_gudang = $request->id_gudang;
            $data->id_rak = $request->id_rak;
            $data->id_barang = $request->id_barang;
            $data->nama_barang = $request->nama_barang;
            $data->status = $request->status;

            $this->dataRepository->save($data);

            $response = new DataCreateResponse();
            $response->data = $data;

            Database::commitTransaction();
            return $response;
        }catch (\Exception $exception){
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    private function validateCreateDataResponse(DataCreateRequest $request)
    {
        if($request->id_jenis == null || $request->id_merek == null || $request->id_gudang == null || $request->id_rak == null
            || $request->id_barang == null || $request->nama_barang == null || $request->status == null || trim($request->id_jenis) == ""
            || trim($request->id_merek) == "" || trim($request->id_gudang) == "" || trim($request->id_rak) == ""
            || trim($request->nama_barang) == "" || trim($request->status) == "")
        {
            throw new ValidationException("Not Blank");
        }
    }

    public function updateData(DataUpdateRequest $request): DataUpdateResponse
    {
        $this->validateDataUpdate($request);
        try {
            Database::beginTransaction();
            $data = $this->dataRepository->findById($request->id_barang);
            if ($data == null) {
                throw new ValidationException("Id barang not found");
            }

            $data->id_jenis = $request->id_jenis;
            $data->id_merek = $request->id_merek;
            $data->id_gudang = $request->id_gudang;
            $data->id_rak = $request->id_rak;
            $data->id_barang = $request->id_barang;
            $data->nama_barang = $request->nama_barang;
            $data->status = $request->status;
            $this->dataRepository->update($data);

            Database::commitTransaction();
            $response = new DataUpdateResponse();
            $response->data = $data;
            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function validateDataUpdate(DataUpdateRequest $request)
    {

        if($request->id_jenis == null || $request->id_merek == null || $request->id_gudang == null || $request->id_rak == null
            || $request->id_barang == null || $request->nama_barang == null || $request->status == null || trim($request->id_jenis) == ""
            || trim($request->id_merek) == "" || trim($request->id_gudang) == "" || trim($request->id_rak) == "" || trim($request->id_barang) == ""
            || trim($request->nama_barang) == "" || trim($request->status) == "")
        {
            throw new ValidationException("Not Blank");
        }
    }

    public function current(){
        $statement = $this->dataRepository->view();
        return $statement;
    }

    public function currentUpdate($request){
        $statment = $this->dataRepository->viewUpdate($request);
        return $statment;
    }

    public function deleteData($request)
    {
        $statment = $this->dataRepository->delete($request);
        return $statment;
    }
}