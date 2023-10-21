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
                            <input 
                            type="text" 
                            class="form-control @error('title') is-invalid @enderror" 
                            id="title" name="title" 
                            value="{{ old('title') ?? $comic->title}}">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-8">
                            <label for="thumb" class="form-label">Link img</label>
                            <input 
                            type="url" 
                            class="form-control @error('thumb') is-invalid @enderror" 
                            id="thumb" 
                            name="thumb" 
                            value="{{old('thumb') ?? $comic->thumb}}">
                            @error('thumb')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea 
                            type="text" 
                            class="form-control @error('description') is-invalid @enderror" 
                            id="description" 
                            name="description">
                                {{old('description') ?? $comic->description}}
                            </textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="price" class="form-label">Price</label>
                            <input 
                            type="text" 
                            class="form-control @error('price') is-invalid @enderror" 
                            id="price" 
                            name="price" 
                            value="{{old('price') ?? $comic->price}}">
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="series" class="form-label">Series</label>
                            <input 
                            type="text" 
                            class="form-control @error('series') is-invalid @enderror" 
                            id="series" 
                            name="series" 
                            value="{{old('series') ?? $comic->series}}">
                            @error('series')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="sale_date" class="form-label">Sale Date</label>
                            <input 
                            type="date" 
                            class="form-control @error('sale_date') is-invalid @enderror" 
                            id="sale_date" 
                            name="sale_date" 
                            value="{{old('sale_date') ?? $comic->sale_date}}">
                            @error('sale_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror                    
                        </div>
                        <div class="col-3">
                            <label for="type" class="form-label @error('type') is-invalid @enderror">Type</label>
                            <select name="type" id="type" class="form-select">
                                <option value="select" @if ($comic->type == 'select') selected @endif>Select a type</option>
                                <option value="graphic novel" @if ($comic->type == 'graphic novel') selected @endif>Graphic Novel</option>
                                <option value="comic book" @if ($comic->type == 'comic book') selected @endif>Comic Book</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror    
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