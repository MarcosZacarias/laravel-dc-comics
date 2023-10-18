@extends('layouts.app')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <img src="{{$comic->thumb}}" alt="">
            </div>
            <div class="col-8">
                <div class="row g-4">
                    <div class="col-12"><strong>{{$comic->title}}</strong></div>
                    <div class="col-12"><strong>Description: </strong> {{$comic->description}}</div>
                    <div class="col-3"><strong>Price: </strong>{{$comic->price}}</div>
                    <div class="col-3"><strong>Series: </strong>{{$comic->series}}</div>
                    <div class="col-3"><strong>Sale Date: </strong>{{$comic->sale_date}}</div>
                    <div class="col-3"><strong>Type: </strong>{{$comic->type}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
