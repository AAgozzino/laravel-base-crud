<form action="{{route('books.update', $book->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div>
      <label for="title">Titolo</label>
        <input type="text" name="title" placeholder="Titolo" id="title" value="{{$book->title}}">
    </div>

    <div>
      <label for="author">Autore</label>
      <input type="text" name="author" placeholder="Autore" id="author" value="{{$book->author}}">
    </div>

    <div>
      <label for="edition">Editore</label>
      <input type="text" name="edition" placeholder="Editore" id="edition" value="{{$book->edition}}">
    </div>

    <div>
      <label for="genre">Genere</label>
      <input type="text" name="genre" placeholder="Genere" id="genre" value="{{$book->genre}}">
    </div>

    <div>
      <label for="image">Immagine URL</label>
      <input type="text" name="image" placeholder="Immagine URL" id="image" value="{{$book->image}}">
    </div>

    <div>
      <label for="year">Anno di pubblicazione</label>
      <input type="date" name="year" id="year" value="{{$book->year}}">
    </div>

    <div>
      <label for="isbn">ISBN</label>
      <input type="text" name="isbn" placeholder="ISBN" id="isbn" value="{{$book->isbn}}">
    </div>

    <div>
      <label for="pages">Numero pagine</label>
      <input type="text" name="pages" placeholder="Numero pagine" id="pages" value="{{$book->pages}}">
    </div>

    <input type="submit" value="Modifica">
  </form>
  
  {{-- Mostrare errori validazione campi form --}}
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif