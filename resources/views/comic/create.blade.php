@extends('layouts.app')

@section('main-content')
<section>
    <div class="container mt-5">
        <a href="{{ route('comic.index') }}" class="">
            <button class="btn btn-secondary mb-3">Return to the list</button>
        </a>

        <h1>Create Comic</h1>
        <form action="{{route('comic.store')}}" method="POST">
            @csrf
            <div class="row g-4">
                <div class="col-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="col-8">
                    <label for="thumb" class="form-label">Link img</label>
                    <input type="url" class="form-control" id="thumb" name="thumb">
                </div>
                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description">
                    </textarea>
                </div>
                <div class="col-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>
                <div class="col-3">
                    <label for="series" class="form-label">Series</label>
                    <input type="text" class="form-control" id="series" name="series">
                </div>
                <div class="col-3">
                    <label for="sale_date" class="form-label">Sale Date</label>
                    <input type="date" class="form-control" id="sale_date" name="sale_date">                    
                </div>
                <div class="col-3">
                    <label for="type" class="form-label">Type</label>
                    <select name="type" id="type" class="form-select">
                        <option value="graphic novel">Graphic Novel</option>
                        <option value="comic book">Comic Book</option>
                    </select>
                </div>
                <div class="col-3">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Create</button>
                </div>
            </div>


            

        </form>
    </div>
</section>

@endsection