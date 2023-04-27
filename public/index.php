<?php

require_once __DIR__ . '/../vendor/autoload.php';

use ProgrammerZamanNow\Belajar\PHP\MVC\App\Router;
use ProgrammerZamanNow\Belajar\PHP\MVC\Controller\HomeController;
use ProgrammerZamanNow\Belajar\PHP\MVC\Controller\UserController;
use ProgrammerZamanNow\Belajar\PHP\MVC\Middleware\MustNotLoginMiddleware;
use ProgrammerZamanNow\Belajar\PHP\MVC\Middleware\MustLoginMiddleware;
use ProgrammerZamanNow\Belajar\PHP\MVC\Controller\DataController;
use ProgrammerZamanNow\Belajar\PHP\MVC\Config\Database;
use ProgrammerZamanNow\Belajar\PHP\MVC\Controller\DatabaseJenisController;
use ProgrammerZamanNow\Belajar\PHP\MVC\Middleware\MustAdminMiddleware;

Database::getConnection('prod');

// Home Controller
Router::add('GET', '/', HomeController::class, 'index', []);
Router::add('GET', '/hapus([0-9a-zA-Z]*)', HomeController::class, 'delete');



// User Controller
Router::add('GET', '/users/register', UserController::class, 'register', [MustLoginMiddleware::class, MustAdminMiddleware::class]);
Router::add('POST', '/users/register', UserController::class, 'postRegister', [MustLoginMiddleware::class, MustAdminMiddleware::class]);
Router::add('GET', '/users/login', UserController::class, 'login', [MustNotLoginMiddleware::class]);
Router::add('POST', '/users/login', UserController::class, 'postLogin', [MustNotLoginMiddleware::class]);
Router::add('GET', '/users/logout', UserController::class, 'logout', [MustLoginMiddleware::class]);
Router::add('GET', '/users/profile', UserController::class, 'updateProfile', [MustLoginMiddleware::class]);
Router::add('POST', '/users/profile', UserController::class, 'postUpdateProfile', [MustLoginMiddleware::class]);
Router::add('GET', '/users/password', UserController::class, 'updatePassword', [MustLoginMiddleware::class]);
Router::add('POST', '/users/password', UserController::class, 'postUpdatePassword', [MustLoginMiddleware::class]);

//Data Controller
Router::add('GET', '/datas/create', DataController::class, 'create', [MustLoginMiddleware::class]);
Router::add('POST', '/datas/create', DataController::class, 'postCreate', [MustLoginMiddleware::class]);
Router::add('GET', '/datas/update([0-9a-zA-Z]*)', DataController::class, 'update');
Router::add('POST', '/datas/update([0-9a-zA-Z]*)', DataController::class, 'postUpdate');
//Database Controller
Router::add("GET", '/databases/database', DatabaseJenisController::class, 'index', [MustLoginMiddleware::class]);
Router::add("GET", '/databases/jenis', DatabaseJenisController::class, 'createJenis', [MustLoginMiddleware::class]);
Router::add("POST", '/databases/jenis', DatabaseJenisController::class, 'postCreateJenis', [MustLoginMiddleware::class]);
Router::add('GET', '/deleteJenis([0-9a-zA-Z]*)', DatabaseJenisController::class, 'deleteJenis');


Router::add("GET", '/databases/merek', DatabaseJenisController::class, 'createMerek', [MustLoginMiddleware::class]);
Router::add("POST", '/databases/merek', DatabaseJenisController::class, 'postCreateMerek', [MustLoginMiddleware::class]);
Router::add('GET', '/deleteMerek([0-9a-zA-Z]*)', DatabaseJenisController::class, 'deleteMerek');


Router::add("GET", '/databases/gudang', DatabaseJenisController::class, 'createGudang', [MustLoginMiddleware::class]);
Router::add("POST", '/databases/gudang', DatabaseJenisController::class, 'postCreateGudang', [MustLoginMiddleware::class]);
Router::add('GET', '/deleteGudang([0-9a-zA-Z]*)', DatabaseJenisController::class, 'deleteGudang');


Router::add("GET", '/databases/rak', DatabaseJenisController::class, 'createRak', [MustLoginMiddleware::class]);
Router::add("POST", '/databases/rak', DatabaseJenisController::class, 'postCreateRak', [MustLoginMiddleware::class]);
Router::add('GET', '/deleteRak([0-9a-zA-Z]*)', DatabaseJenisController::class, 'deleteRak');


Router::run();