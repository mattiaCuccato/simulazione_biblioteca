<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //LISTA LIBRI
    public function book_list(){
        return Book::all();
    }

    //NUOVO LIBRO
    public function insert_book(Request $request){
        $data = json_decode($request->getContent());
        $newBook = new Book();

        $newBook->title = $data->title;
        $newBook->author = $data->author;
        $newBook->isbn = $data->isbn;
        $newBook->cover = $data->cover;
        $newBook->genre = $data->genre;
        $newBook->raiting = $data->raiting;

        $newBook->save();
        return $newBook;
    }

    //DETTAGLIO LIBRO
    public function detail_book($id){
        $book = Book::find($id);
        return $book;
    }

    //ELIMINA LIBRO
    public function delete_book($id){
        $book = Book::destroy($id);
        return $book;
    }

    //MODIFICA LIBRO
    public function update_book(Request $request, $id){
        $data = json_decode($request->getContent());
        $book = Book::find($id);

        $book->title = $data->title;
        $book->author = $data->author;
        $book->isbn = $data->isbn;
        $book->cover = $data->cover;
        $book->genre = $data->genre;
        $book->raiting = $data->raiting;

        $book->save();
        return $book;
    }
}
