@extends('layouts.app')

@section('main-content')  
  <section class="container mt-5">
    <a href="{{ route('comic.create') }}" class="">
      <button class="btn btn-primary mb-3">Add Comic</button>
    </a>

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Title</th>
          {{-- <th scope="col">Description</th> --}}
          <th scope="col">Thumb</th>
          <th scope="col">Price</th>
          <th scope="col">Series</th>
          <th scope="col">Sale date</th>
          <th scope="col">Type</th>          
          <th scope="col">Info</th>          
        </tr>
      </thead>
      <tbody>
        @foreach ($comics as $comic)
            
        <tr>
          <th scope="row">{{$comic->id}}</th>
          <th scope="col">{{$comic->title}}</th>
          {{-- <th scope="col">{{$comic->description}}</th> --}}
          <th scope="col">{{$comic->thumb}}</th>
          <th scope="col">{{$comic->price}}</th>
          <th scope="col">{{$comic->series}}</th>
          <th scope="col">{{$comic->sale_date}}</th>
          <th scope="col">{{$comic->type}}</th>  
          <th scope="col">
            <a href="{{ route('comic.show', $comic->id) }}">
              <button class="btn btn-info">More info</button>
            </a>
          </th>  
        </tr>
        @endforeach

        
      </tbody>
    </table>
  </section> 
@endsection
