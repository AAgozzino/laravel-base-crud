<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        // Validazione dei campi in arrivo dal form - array che contiene il controllo per ogni attributo
        $request->validate([
            'isbn' => "required|unique:books|max:13",
            'title' => "required|max:30",
            'author' => "required|max:50",
            'genre' => "required|max:30",
            'edition' => "required|max:50",
            'pages' => "required|integer",
            'image' => "required",
            'year' => "required|date",

        ]);
        // Nuovo oggetto book dal model Book
        $book = new Book;

        // Associo ad ogni colonna il dato che arriva dal form
        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->pages = $data['pages'];
        $book->edition = $data['edition'];
        $book->year = $data['year'];
        $book->isbn = $data['isbn'];
        $book->genre = $data['genre'];
        $book->image = $data['image'];
        
        // Salvo nel database
        $book->save();
        
        // return view del nuovo libro inserito passando il libro (richiesto dalla show)
        return redirect()->route('books.show', $book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Cerco l'id all'interno del db
        $book = Book::find($id);

        // Ritorno la view del singolo libro passando il libro
        return view("show", ["book" => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //cerco l'id che voglio modificare
        $book = Book::find($id);

        // Ritorno la view per la modifica dei dati passando il libro 
        return view("edit", ["book" => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Salvo i dati in arrivo da form in una variabile
        $data = $request->all();

        // Validazione dei campi
        $request->validate([
            'isbn' =>[
                "required",
                "max:13",
                Rule::unique('books')->ignore($id),
            ],
            'title' => "required|max:30",
            'author' => "required|max:50",
            'genre' => "required|max:30",
            'edition' => "required|max:50",
            'pages' => "required|integer",
            'image' => "required",
            'year' => "required|date",
        ]);

        // Seleziono il libro da modificare
        $book = Book::find($id);

        // Modifico i dati con quelli del form
        $book->isbn = $data['isbn'];
        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->genre = $data['genre'];
        $book->edition = $data['edition'];
        $book->pages = $data['pages'];
        $book->image = $data['image'];
        $book->year = $data['year'];

        // Faccio l'update del db
        $book->update($data);

        // Ritorno la view del libro che ho modificato passando il libro
        return redirect()->route("books.show", $book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
