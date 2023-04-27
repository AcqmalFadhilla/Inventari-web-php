<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC\Controller;

use ProgrammerZamanNow\Belajar\PHP\MVC\App\View;
use ProgrammerZamanNow\Belajar\PHP\MVC\Config\Database;
use ProgrammerZamanNow\Belajar\PHP\MVC\Exception\ValidationException;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DataDeleteRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DataUpdateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseGudangRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseJenisRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseMerekRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseRakRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DataRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\SessionRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\UserRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\DatabaseGudangService;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\DatabaseJenisService;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\DatabaseMerekService;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\DatabaseRakService;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\DataService;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\SessionService;

class HomeController
{

    private SessionService $sessionService;
    private DataService $dataService;

    private DatabaseJenisService $databaseJenisService;
    private DatabaseMerekService $databaseMerekService;
    private DatabaseGudangService $databaseGudangService;
    private DatabaseRakService $databaseRakService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $sessionRepository = new SessionRepository($connection);
        $userRepository = new UserRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);

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


    function index()
    {
        $dataBarang = $this->dataService->current();
        $dataMerek = $this->databaseMerekService->current();
        $dataRak = $this->databaseRakService->current();
        $dataJenis = $this->databaseJenisService->current();
        $dataGudang = $this->databaseGudangService->current();
        $user = $this->sessionService->current();
        if ($user == null) {
            View::render('Home/index', [
                "title" => "PHP Login Management"
            ]);
        } else {
            View::render('Home/dashboard', [
                "title" => "Dashboard",
                "dataBarang" => $dataBarang,
                "dataJenis" => $dataJenis,
                "dataMerek" => $dataMerek,
                "dataGudang" => $dataGudang,
                "dataRak" => $dataRak,
                "name" => $user->id,
                "status" => $user->status
            ]);
        }
    }

    function update()
    {

    }

    function postUpdate()
    {

    }

    function delete()
    {
        $dataBarang = $this->dataService->current();
        $dataMerek = $this->databaseMerekService->current();
        $dataRak = $this->databaseRakService->current();
        $dataJenis = $this->databaseJenisService->current();
        $dataGudang = $this->databaseGudangService->current();
        $user = $this->sessionService->current();
        //delete
        $request = new DataDeleteRequest();
        $request->id_barang = $_GET["id"];

        try {
            $this->dataService->deleteData($request->id_barang);
            View::redirect("/");
        }catch (ValidationException $exception){
            if ($user == null) {
                View::render('Home/index', [
                    "title" => "PHP Login Management"
                ]);
            } else {
                View::render('Home/dashboard', [
                    "title" => "Dashboard",
                    "dataBarang" => $dataBarang,
                    "dataJenis" => $dataJenis,
                    "dataMerek" => $dataMerek,
                    "dataGudang" => $dataGudang,
                    "dataRak" => $dataRak,
                    "user" => [
                        "name" => $user->id,
                        "status" => $user->status

                    ]
                ]);
            }
        }
    }
}