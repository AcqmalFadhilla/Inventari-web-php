<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC\Controller;

use ProgrammerZamanNow\Belajar\PHP\MVC\App\View;
use ProgrammerZamanNow\Belajar\PHP\MVC\Config\Database;
use ProgrammerZamanNow\Belajar\PHP\MVC\Exception\ValidationException;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DataCreateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DataUpdateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DataUpdateRequestView;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\UserProfileUpdateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseGudangRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseJenisRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseMerekRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseRakRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DataRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\DatabaseGudangService;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\DatabaseJenisService;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\DatabaseMerekService;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\DatabaseRakService;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\DataService;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\UserService;

class DataController
{
    private DataService $dataService;
    private DatabaseJenisService $databaseJenisService;
    private DatabaseMerekService $databaseMerekService;
    private DatabaseGudangService $databaseGudangService;
    private DatabaseRakService $databaseRakService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $dataRepository = new DataRepository($connection);
        $this->dataService = new DataService($dataRepository);

        $dataMerekRepository = new DatabaseMerekRepository($connection);
        $this->databaseMerekService = new DatabaseMerekService($dataMerekRepository);

        $dataGudangRepository = new DatabaseGudangRepository($connection);
        $this->databaseGudangService = new DatabaseGudangService($dataGudangRepository);

        $dataRakRepository = new DatabaseRakRepository($connection);
        $this->databaseRakService = new DatabaseRakService($dataRakRepository);

        $dataJenisRepository = new DatabaseJenisRepository($connection);
        $this->databaseJenisService = new DatabaseJenisService($dataJenisRepository);

    }

    public function create()
    {
        $dataMerek = $this->databaseMerekService->current();
        $dataRak = $this->databaseRakService->current();
        $dataJenis = $this->databaseJenisService->current();
        $dataGudang = $this->databaseGudangService->current();

        View::render('Data/create', [
            'title' => "create new data",
            "dataJenis" => $dataJenis,
            "dataMerek" => $dataMerek,
            "dataGudang" => $dataGudang,
            "dataRak" => $dataRak
        ]);
    }

    public function  postCreate()
    {
        $request = new DataCreateRequest();
        $request->id_jenis = $_POST['id_jenis'];
        $request->id_merek = $_POST['id_merek'];
        $request->id_gudang = $_POST['id_gudang'];
        $request->id_rak = $_POST['id_rak'];
        $request->id_barang = $_POST['id_barang'];
        $request->nama_barang = $_POST['nama_barang'];
        $request->status = $_POST['status'];

        try {
            $this->dataService->create($request);
            View::redirect("/datas/create");
        }catch (ValidationException $exception){
            View::render('Data/create', [
                'title' => 'data',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function update()
    {
        $dataMerek = $this->databaseMerekService->current();
        $dataRak = $this->databaseRakService->current();
        $dataJenis = $this->databaseJenisService->current();
        $dataGudang = $this->databaseGudangService->current();

        $request = new DataUpdateRequestView();
        $request->id_barang = $_GET["id"];

        $request = $this->dataService->currentUpdate($request->id_barang);

        View::render('Data/update', [
                'title' => "update data",
                "dataJenis" => $dataJenis,
                "dataMerek" => $dataMerek,
                "dataGudang" => $dataGudang,
                "dataRak" => $dataRak,
                "data" => $request[0]
            ]);
    }


    public function postUpdate(){
        $request = new DataUpdateRequest();
        $requestGet = new DataUpdateRequestView();
        $requestGet->id_barang = $_GET["id"];
        $request->id_jenis = $_POST['id_jenis'];
        $request->id_merek = $_POST['id_merek'];
        $request->id_gudang = $_POST['id_gudang'];
        $request->id_barang = $_POST['id_barang'];
        $request->id_rak = $_POST['id_rak'];
        $request->nama_barang = $_POST['nama_barang'];
        $request->status = $_POST['status'];
//        var_dump($request);
//        die();
        try {
            $requestGet = $this->dataService->currentUpdate($requestGet->id_barang);
            $this->dataService->updateData($request);
            View::redirect("/");

        }catch (ValidationException $exception){
            View::render('Data/update', [
                'title' => 'data',
                "data" => $requestGet[0],
                'error' => $exception->getMessage()
            ]);
        }
    }
}