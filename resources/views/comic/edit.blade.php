@extends('layouts.app')

@section('main-content')
<section>
    <div class="container mt-5">
        <a href="{{ route('comic.index') }}" class="">
            <button class="btn btn-secondary mb-3">Return to the list</button>
        </a>

        <h1>Edit Comic</h1>
        <form action="{{route('comic.update', $comic)}}" method="POST">
            @csrf

            @method('PUT')

            <div class="row">
                <div class="col-4">
                    <img src="{{$comic->thumb}}" alt="" id="preview-image">
                </div>
                <div class="col-8">
                    <div class="row g-4">
                        <div class="col-4">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$comic->title}}">
                        </div>
                        <div class="col-8">
                            <label for="thumb" class="form-label">Link img</label>
                            <input type="url" class="form-control" id="thumb" name="thumb" value="{{$comic->thumb}}">
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" class="form-control" id="description" name="description">
                                {{$comic->description}}
                            </textarea>
                        </div>
                        <div class="col-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{$comic->price}}">
                        </div>
                        <div class="col-3">
                            <label for="series" class="form-label">Series</label>
                            <input type="text" class="form-control" id="series" name="series" value="{{$comic->series}}">
                        </div>
                        <div class="col-3">
                            <label for="sale_date" class="form-label">Sale Date</label>
                            <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{$comic->sale_date}}">                    
                        </div>
                        <div class="col-3">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" id="type" class="form-select">
                                <option value="graphic novel" @if ($comic->type == 'graphic novel') selected @endif>Graphic Novel</option>
                                <option value="comic book" @if ($comic->type == 'comic book') selected @endif>Comic Book</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Save</button>
                        </div>
                    </div>
                </div>
                
            </div>


            

        </form>
    </div>
</section>

@endsection

@section('scripts')
<script>
    const previewImg = document.getElementById('preview-image');
    const srcInput = document.getElementById('thumb');

    srcInput.addEventListener('change', function() {
        previewImg.src = this.value
    })

</script>
@endsection