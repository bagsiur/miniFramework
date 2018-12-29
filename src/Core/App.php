<?php

namespace Core;

use Core\Providers\TwigServiceProvider;
use Core\Providers\PDOServiceProvider;
use Symfony\Component\HttpFoundation\Response;

class App
{
    
    private $config;

    private $view;
    
    protected $pdo;
    
    public function __construct() {
        
        $this->loadConfig();

        $twig = new TwigServiceProvider($this->config['twig']);
        $this->view = $twig->provide();
        
        $pdo = new PDOServiceProvider($this->config['database']);
        $this->pdo = $pdo->provide();
        
    }
    
    public function __destruct() {
        
        $this->pdo = null;
        
    }
    
    private function loadConfig(){
        
        $this->config = include(__DIR__ . '/../Config/settings.php');
        
    }
    
    public function render($name, $data = []){
        
        $body = $this->view->render($name, $data);
        return new Response($body);
        
    }
    
    public function dbQuery($sql, $data = []){
        
        $stmt = $this->pdo->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(':'.$key, $value); 
        }
        
        $stmt->execute();
        //$stmt->debugDumpParams();die();

        return $stmt;
        
    }
    
}