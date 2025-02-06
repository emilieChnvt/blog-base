<?php

namespace App\Controller;

use App\Entity\Book;
use Core\Controller\Controller;
use Core\Response\Response;

class BookController extends Controller
{
    public function index():Response
    {
        $books= $this->getRepository()->findAll();
        return $this->render('book/index', [
            'books' => $books
        ]);
    }
    public function show(int $id):Response
    {
        $id=null;
        if(!empty($_GET['id'])&&ctype_digit($_GET['id'])){
            $id=$_GET['id'];
        }
        if(!empty($id)){
            return $this->redirect();
        }
        $book = $this->getRepository()->find($id);
        return $this->render('book/show', [
            'book' => $book
        ]);
    }

}