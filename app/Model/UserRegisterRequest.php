<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC\Model;

class UserRegisterRequest
{
    public ?string $id = null;
    public ?string $email = null;
    public ?string $status = null;
    public ?string $password = null;
}