@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    <section class="container mt-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                @forelse($comics as $comic)
                <div class="col">              
                    <div class="card h-100">
                        <img src="{{$comic->thumb}}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h3 class="card-title"><strong>{{$comic->title}}</strong></h3>
                        <p class="card-text">
                           <strong>Description: </strong> {{$comic->description}}
                        </p>
                        <ul>
                            <li><strong>Price: </strong>{{$comic->price}}</li>
                            <li><strong>Series: </strong>{{$comic->series}}</li>
                            <li><strong>Sale Date: </strong>{{$comic->sale_date}}</li>
                            <li><strong>Type: </strong>{{$comic->type}}</li>
                        </ul>
                      </div>
                    </div>              
                </div>
                @empty
                <h2>Non ci sono risultati</h2>
                @endforelse
            </div>
        </div>
      </section>
  </section>
@endsection
