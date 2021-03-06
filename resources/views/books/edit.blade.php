@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/books/{{ $book->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Title" value={{$book->title}}>
                </div>
            </div>

            <div class="form-group row">
                <label for="author_id" class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-10">
                    <select name="author_id" class="form-control">
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{($author->id == $book->author_id)?'selected':''}}>{{ $author->name }} {{ $author->last_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="image_url" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image_url" class="form-control-file" id="image_url">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">description</label>
                <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" placeholder="description" rows="5" style="resize: none;">{{$book->description}}</textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="release_date" class="col-sm-2 col-form-label">Release Date</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="release_date" name="release_date" placeholder="release_date" value={{$book->release_date}}>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="release_date" class="col-sm-2 col-form-label">Pages</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" id="pages" name="pages" placeholder="pages" value={{$book->pages}}>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">დამატება</button>
                </div>
            </div>

            {{-- <input type="hidden" name="image_url" value="nonne"> --}}
        </form>
        
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
