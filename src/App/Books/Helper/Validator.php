<?php

namespace App\Books\Helper;

use App\Books\Model\Books;

class Validator{
    
    public function nameCheck($value){

        if(!preg_match('/^.{5,255}$/', $value)){
            return array(
                'error' => true,
                'message' => 'Tytuł nie może być krótszy niż 5 znaków i dłuższy niż 255.',
            );
        }
        
        return false;
        
    }

    public function priceCheck($value){

        if(!preg_match('/^(?!0+$)\d{0,5}(.\d{1,2})$/', $value)){
            return array(
                'error' => true,
                'message' => 'Format ceny jest niepoprawny.',
            );
        }
        
        return false;
        
    }
    
    public function authorCheck($value){

        $books = new Books();
        $authors = $books->getAllAuthors();

        if(array_search($value, array_column($authors, 'id')) === false){
            return array(
                'error' => true,
                'message' => 'Wybierz właściwego autora.',
            );
        }
        
        return false;
        
    }
    
    public function publishing_houseCheck($value){

        $books = new Books();
        $authors = $books->getAllPublishingHouses();

        if(array_search($value, array_column($authors, 'id')) === false){
            return array(
                'error' => true,
                'message' => 'Wybierz właściwe wydawnictwo.',
            );
        }
        
        return false;
        
    }
    
    
}
