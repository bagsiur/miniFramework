<?php

namespace Core\Providers;

class PDOServiceProvider extends ServiceProvider
{
    
    public function provide() {
        
        $pdo = new \PDO('mysql:host=localhost;dbname='.$this->config['db'], $this->config['user'], $this->config['password']);
        
        return $pdo;
        
    }
    
}