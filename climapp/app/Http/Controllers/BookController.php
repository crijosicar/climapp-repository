<?php

namespace App\Http\Controllers;

class BookController extends Controller
{

    public function getAll(){
  
        $Books  = Book::all();
  
        return response()->json($Books);
  
    }

}
