<ul>
    <li><img src="{{$book->image}}" alt="Immagine copertina"></li>
    <li>ISBN: {{$book->isbn}}</li>
    <li>Titolo: {{$book->title}}</li>
    <li>Autore: {{$book->author}}</li>
    <li>Genere: {{$book->genre}}</li>
    <li>Casa editrice:{{$book->edition}}</li>
    <li>Pagine: {{$book->pages}}</li>
    <li>Data pubblicazione: {{$book->year}}</li>
</ul>

<form action="{{route("books.destroy", $book->id)}}" method="POST">
    @method("DELETE")
    @csrf
    <input type="submit" value="Elimina">
</form>