<?php

namespace App\Books\Model;

use Core\App;

class Books extends App{
    
    public function getAll($page, $sortBy, $type, $filter){

        $filter = html_entity_decode($filter, null, 'UTF-8');

        if(!in_array($type, array('asc', 'desc')) or !in_array($sortBy, array('id', 'name', 'author', 'price'))){
            echo $type . ':' . $sortBy;
            throw new \Exception('Error');
        }
        
        $sql = 'SELECT '
                . 'books.id as id, '
                . 'books.name as name, '
                . 'books.price as price, '
                . 'CONCAT(authors.name, " ",authors.surname) as author, '
                . 'publishing_houses.name as publishing_house '
             . 'FROM '
                . 'books '
             . 'LEFT JOIN '
                . 'authors ON books.author = authors.id '
             . 'LEFT JOIN '
                . 'publishing_houses ON books.publishing_house = publishing_houses.id '
             . 'WHERE '
                . 'books.id LIKE :filter OR '
                . 'books.name LIKE :filter OR '
                . 'books.price LIKE :filter OR '
                . 'CONCAT(authors.name, " ",authors.surname) LIKE :filter '
             . 'ORDER BY '
                . $sortBy.' '.$type;
        
        if($page) $sql .= ' LIMIT '.PAGINATION.' OFFSET '.(PAGINATION * (intval($page) - 1));
        
        $query = $this->dbQuery($sql, array('filter' => '%'.$filter.'%'));
        return $query->fetchAll();
        
    }
    
    public function get($id){

        $sql = 'SELECT '
                . '* '
             . 'FROM '
                . 'books '
             . 'WHERE '
                . 'id = :id '
             . 'LIMIT 1';
        
        $query = $this->dbQuery($sql, array('id' => $id));
        return $query->fetch();
        
    }
    
    public function add($book){
        
        $data = array(
            'name' => $book['name'],
            'price' => $book['price'],
            'description' => $book['description'],
            'author' => $book['author'],
            'publishing_house' => $book['publishing_house']
        );
        
        $sql = 'INSERT INTO '
                . 'books (id, name, price, description, author, publishing_house) '
             . 'VALUES '
                . '(null, :name, :price, :description, :author, :publishing_house)';
        
        $this->dbQuery($sql, $data);
        
        return $this->pdo->lastInsertId();
        
    }
    
    public function edit($id, $book){
        
        $data = array(
            'id' => $id,
            'name' => $book['name'],
            'price' => $book['price'],
            'description' => $book['description'],
            'author' => $book['author'],
            'publishing_house' => $book['publishing_house']
        );
        
        $sql = 'UPDATE '
                . 'books '
             . 'SET '
                . 'name = :name, '
                . 'price = :price, '
                . 'description = :description, '
                . 'author = :author, '
                . 'publishing_house = :publishing_house '
             . 'WHERE '
                . 'id = :id';
        
        $this->dbQuery($sql, $data);
        
        return $this->pdo->lastInsertId();
        
    }
    
    public function remove($id){

        $sql = 'DELETE FROM '
                . 'books '
             . 'WHERE '
                . 'id = :id';
        
        $this->dbQuery($sql, array('id' => $id));
        
        return $this->pdo->lastInsertId();
        
    }
    
    public function getAllAuthors(){
        
        $sql = 'SELECT '
                . '* '
             . 'FROM '
                . 'authors '
             . 'ORDER BY '
                . 'id';
        
        $query = $this->dbQuery($sql);
        return $query->fetchAll();
        
    }
    
    public function getAllPublishingHouses(){
        
        $sql = 'SELECT '
                . '* '
             . 'FROM '
                . 'publishing_houses '
             . 'ORDER BY '
                . 'id';

        $query = $this->dbQuery($sql);
        return $query->fetchAll();
        
    }
    
}
