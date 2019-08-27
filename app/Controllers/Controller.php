<?php
namespace App\Controllers;

use App\Services\Database;

use Delight\Auth\Auth;
use League\Plates\Engine;
use PDO;

class Controller
{
 
    protected $view;
    protected $database;

    public function __construct()
    {
       
        $this->view = components(Engine::class);
        $this->database = components(Database::class);
    }

  
}