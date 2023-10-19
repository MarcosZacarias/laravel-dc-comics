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
          <th scope="col"></th>          
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
            <div class="d-flex">

            <a href="{{ route('comic.show', $comic->id) }}" class="mx-1">
              <i class="fa-solid fa-eye"></i>
            </a>
            <a href="{{ route('comic.edit', $comic) }}" class="mx-1">
              <i class="fa-solid fa-pencil"></i>
            </a>
            
            <!-- Button trigger modal -->
            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$comic->id}}" class="mx-1">
              <i class="fa-solid fa-trash text-danger"></i>
            </a>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal-{{$comic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminate Comic</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to eliminate the comic "{{$comic->title}}"
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{route('comic.destroy', $comic)}}" method="POST" class="mx-1">
                      @csrf
                      @method('DELETE')
                      
                      <button class="btn btn-danger">Eliminate</button>
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
            
          </th>  
        </tr>
        @endforeach

        
      </tbody>
    </table>
  </section> 
@endsection
