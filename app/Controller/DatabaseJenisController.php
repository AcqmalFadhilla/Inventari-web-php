<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC\Controller;

use ProgrammerZamanNow\Belajar\PHP\MVC\App\View;
use ProgrammerZamanNow\Belajar\PHP\MVC\Config\Database;
use ProgrammerZamanNow\Belajar\PHP\MVC\Exception\ValidationException;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseGudangCreateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseGudangDeleteRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseJenisCreateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseJenisDeleteRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseMerekCreateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseMerekDeleteRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseRakCreateRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Model\DatabaseRakDeleteRequest;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseGudangRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseJenisRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseMerekRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\DatabaseRakRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\SessionRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Repository\UserRepository;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\DatabaseGudangService;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\DatabaseJenisService;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\DatabaseMerekService;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\DatabaseRakService;
use ProgrammerZamanNow\Belajar\PHP\MVC\Service\SessionService;
use function Sodium\add;

class DatabaseJenisController
{
    private SessionService $sessionService;
    private DatabaseJenisService $databaseJenisService;
    private DatabaseMerekService $databaseMerekService;
    private DatabaseGudangService $databaseGudangService;

    private DatabaseRakService $databaseRakService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $databaseJenisRepository = new DatabaseJenisRepository($connection);
        $this->databaseJenisService = new DatabaseJenisService($databaseJenisRepository);

        $databaseMerekRepository = new DatabaseMerekRepository($connection);
        $this->databaseMerekService = new DatabaseMerekService($databaseMerekRepository);

        $databaseGudangRepository = new DatabaseGudangRepository($connection);
        $this->databaseGudangService = new DatabaseGudangService($databaseGudangRepository);

        $databaseRakRepository = new DatabaseRakRepository($connection);
        $this->databaseRakService = new DatabaseRakService($databaseRakRepository);

        $sessionRepository = new SessionRepository($connection);
        $userRepository = new UserRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }

    public function index()
    {
        $dataMerek = $this->databaseMerekService->current();
        $dataRak = $this->databaseRakService->current();
        $dataJenis = $this->databaseJenisService->current();
        $dataGudang = $this->databaseGudangService->current();
        $user = $this->sessionService->current();

        if ($user == null) {
            View::render('Database/database', [
                "title" => "PHP Login Management"
            ]);
        } else {
            View::render('Database/database', [
                "title" => "jenis",
                "dataJenis" => $dataJenis,
                "dataMerek" => $dataMerek,
                "dataGudang" => $dataGudang,
                "dataRak" => $dataRak,
                "user" => [
                    "nama" => $user->id,
                    "status" => $user->status
                ]
            ]);
        }
    }

    //jenis
    public function createJenis()
    {
        View::render("Database/jenis", [
            'title' => "database"
        ]);
    }

    public function postCreateJenis()
    {
        $request = new DatabaseJenisCreateRequest();
        $request->id_jenis = $_POST['id_jenis'];
        $request->nama_jenis = $_POST['nama_jenis'];

        try {
            $this->databaseJenisService->createJenis($request);
            View::redirect('/databases/jenis');
        } catch (ValidationException $exception) {
            View::render('Database/jenis', [
                'title' => 'Register new jenis',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function deleteJenis(){
        $dataMerek = $this->databaseMerekService->current();
        $dataRak = $this->databaseRakService->current();
        $dataJenis = $this->databaseJenisService->current();
        $dataGudang = $this->databaseGudangService->current();
        $user = $this->sessionService->current();
        $request = new DatabaseJenisDeleteRequest();
        $request->id_jenis = $_GET["id"];
        try {
            $this->databaseJenisService->deleteData($request->id_jenis);
            View::redirect("/databases/database");
        }catch (ValidationException $exception){
            if ($user == null) {
                View::render('Database/database', [
                    "title" => "PHP Login Management"
                ]);
            } else {
                View::render('Database/database', [
                    "title" => "jenis",
                    "dataJenis" => $dataJenis,
                    "dataMerek" => $dataMerek,
                    "dataGudang" => $dataGudang,
                    "dataRak" => $dataRak,
                    "user" => [
                        "nama" => $user->id,
                        "status" => $user->status
                    ]
                ]);
            }
        }
    }

    //merek
    public function createMerek()
    {
        View::render("Database/merek", [
            'title' => "database"
        ]);
    }

    public function postCreateMerek()
    {
        $request = new DatabaseMerekCreateRequest();
        $request->id_merek = $_POST['id_merek'];
        $request->nama_merek = $_POST['nama_merek'];

        try {
            $this->databaseMerekService->createMerek($request);
            View::redirect('/databases/merek');
        } catch (ValidationException $exception) {
            View::render('Database/merek', [
                'title' => 'Register new User',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function deleteMerek(){
        $dataMerek = $this->databaseMerekService->current();
        $dataRak = $this->databaseRakService->current();
        $dataJenis = $this->databaseJenisService->current();
        $dataGudang = $this->databaseGudangService->current();
        $user = $this->sessionService->current();
        $request = new DatabaseMerekDeleteRequest();
        $request->id_merek = $_GET["id"];
        try {
            $this->databaseMerekService->delete($request->id_merek);
            View::redirect("/databases/database");
        }catch (ValidationException $exception){
            if ($user == null) {
                View::render('Database/database', [
                    "title" => "PHP Login Management"
                ]);
            } else {
                View::render('Database/database', [
                    "title" => "jenis",
                    "dataJenis" => $dataJenis,
                    "dataMerek" => $dataMerek,
                    "dataGudang" => $dataGudang,
                    "dataRak" => $dataRak,
                    "user" => [
                        "nama" => $user->id,
                        "status" => $user->status
                    ]
                ]);
            }
        }
    }

    //Gudang
    public function createGudang()
    {
        View::render("Database/gudang", [
            'title' => "database"
        ]);
    }

    public function postCreateGudang()
    {
        $request = new DatabaseGudangCreateRequest();
        $request->id_gudang = $_POST['id_gudang'];
        $request->nama_gudang = $_POST['nama_gudang'];

        try {
            $this->databaseGudangService->createGudang($request);
            View::redirect('/databases/gudang');
        } catch (ValidationException $exception) {
            View::render('Database/gudang', [
                'title' => 'Register new gudang',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function deleteGudang(){
        $dataMerek = $this->databaseMerekService->current();
        $dataRak = $this->databaseRakService->current();
        $dataJenis = $this->databaseJenisService->current();
        $dataGudang = $this->databaseGudangService->current();
        $user = $this->sessionService->current();
        $request = new DatabaseGudangDeleteRequest();
        $request->id_gudang = $_GET["id"];
        try {
            $this->databaseGudangService->deleteData($request->id_gudang);
            View::redirect("/databases/database");
        }catch (ValidationException $exception){
            if ($user == null) {
                View::render('Database/database', [
                    "title" => "PHP Login Management"
                ]);
            } else {
                View::render('Database/database', [
                    "title" => "jenis",
                    "dataJenis" => $dataJenis,
                    "dataMerek" => $dataMerek,
                    "dataGudang" => $dataGudang,
                    "dataRak" => $dataRak,
                    "user" => [
                        "nama" => $user->id,
                        "status" => $user->status
                    ]
                ]);
            }
        }
    }

    //rak

    public function createRak()
    {
        View::render("Database/rak", [
            'title' => "database"
        ]);
    }

    public function postCreateRak()
    {
        $request = new DatabaseRakCreateRequest();
        $request->id_rak = $_POST['id_rak'];
        $request->nama_rak = $_POST['nama_rak'];

        try {
            $this->databaseRakService->createRak($request);
            View::redirect('/databases/rak');
        } catch (ValidationException $exception) {
            View::render('Database/rak', [
                'title' => 'Register new rak',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function deleteRak(){
        $dataMerek = $this->databaseMerekService->current();
        $dataRak = $this->databaseRakService->current();
        $dataJenis = $this->databaseJenisService->current();
        $dataGudang = $this->databaseGudangService->current();
        $user = $this->sessionService->current();
        $request = new DatabaseRakDeleteRequest();
        $request->id_rak = $_GET["id"];
        try {
            $this->databaseRakService->delete($request->id_rak);
            View::redirect("/databases/database");
        }catch (ValidationException $exception){
            if ($user == null) {
                View::render('Database/database', [
                    "title" => "PHP Login Management"
                ]);
            } else {
                View::render('Database/database', [
                    "title" => "jenis",
                    "dataJenis" => $dataJenis,
                    "dataMerek" => $dataMerek,
                    "dataGudang" => $dataGudang,
                    "dataRak" => $dataRak,
                    "user" => [
                        "nama" => $user->id,
                        "status" => $user->status
                    ]
                ]);
            }
        }
    }
}