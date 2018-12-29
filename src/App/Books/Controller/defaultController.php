<?php

namespace App\Books\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Books\Model\Books;
use App\Books\Helper\Validator;
use Core\App;

class defaultController extends App
{
    
    public function indexAction(Request $request)
    {

        return $this->render(TWIG.'Books/View/default.html.twig', array(
            'delete' => $request->get('delete')
        ));
        
    }

    public function addAction(Request $request)
    {

        $books = new Books();
        
        if($request->get('book')){
            
            $book = $request->get('book');
            $validator = new Validator();
            
            $errors = [];

            foreach ($book as $key => $value) {
                
                if(method_exists($validator, $key.'Check') and $validator->{$key.'Check'}($value)){

                    $errors[] = $validator->{$key.'Check'}($value);
                    
                }
                
            }
            
            if(count($errors) === 0){
                
                try{
                    
                    $id = $books->add($book);
                    
                    header('Location: /?id='.$id);
                    exit();
                    
                } catch (\Exception $ex) {
                    
                    return new Response($ex->getMessage(), '500');
                    
                }

            }
            
        }

        return $this->render(TWIG.'Books/View/book.html.twig', array(
            'authors' => $books->getAllAuthors(),
            'publishing_houses' => $books->getAllPublishingHouses(),
            'errors' => isset($errors) ? $errors : null,
            'book' => isset($book) ? $book : [],
            'template' => 'add'
        ));
        
    }
    
    public function editAction(Request $request, $id)
    {

        $books = new Books();
        $book = $request->get('book');
        
        if($request->get('book')){
            
            $book = $request->get('book');
            $validator = new Validator();
            
            $errors = [];

            foreach ($book as $key => $value) {
                
                if(method_exists($validator, $key.'Check') and $validator->{$key.'Check'}($value)){

                    $errors[] = $validator->{$key.'Check'}($value);
                    
                }
                
            }
            
            if(count($errors) === 0){
                
                try{
                    
                    $books->edit($id, $book);
                    
                } catch (\Exception $ex) {
                    
                    return new Response($ex->getMessage(), '500');
                    
                }

            }
            
        }
        
        $book = $books->get($id);

        return $this->render(TWIG.'Books/View/book.html.twig', array(
            'authors' => $books->getAllAuthors(),
            'publishing_houses' => $books->getAllPublishingHouses(),
            'errors' => isset($errors) ? $errors : null,
            'book' => isset($book) ? $book : [],
            'template' => 'edit',
            'edited' => $request->get('book') ? true : false
        ));
        
    }
    
    public function getAction($page, $sortBy, $type, $filter)
    {
        
        $books = new Books();
        
        return new JsonResponse(array(
            'success' => true, 
            'books' => $books->getAll($page, $sortBy, $type, $filter),
            'page' => $page,
            'pagination' => ceil(count($books->getAll(false, $sortBy, $type, $filter))/PAGINATION),
        ));
        
    }
    
    public function removeAction($id)
    {
        
        $books = new Books();
        
        try{

            $books->remove($id);

            header('Location: /?delete=1');
            exit();

        } catch (\Exception $ex) {

            return new Response($ex->getMessage(), '500');

        }
        
    }
    
}