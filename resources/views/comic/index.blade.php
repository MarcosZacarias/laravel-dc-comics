@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

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
          {{-- <th scope="col">Thumb</th> --}}
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
          {{-- <th scope="col">{{$comic->thumb}}</th> --}}
          <th scope="col">{{$comic->price}}</th>
          <th scope="col">{{$comic->series}}</th>
          <th scope="col">{{$comic->sale_date}}</th>
          <th scope="col">{{$comic->type}}</th>  
          <th scope="col">
            <a href="{{ route('comic.show', $comic->id) }}">
              <i class="fa-solid fa-eye"></i>
            </a>
            <a href="{{ route('comic.edit', $comic) }}">
              <i class="fa-solid fa-pencil"></i>
            </a>
          </th>  
        </tr>
        @endforeach

        
      </tbody>
    </table>
  </section> 
@endsection
