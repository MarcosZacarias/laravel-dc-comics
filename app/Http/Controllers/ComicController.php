<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comic.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $this->validation($request->all());
        $newComic = new Comic();
        $newComic->fill($data);
        $newComic->save();

        return redirect()->route('comic.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comic.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comic.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $this->validation($request->all(), $comic->id);

        $comic->update($data);

        return redirect()->route('comic.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comic.index');
    }

    private function validation($data, $id = null){
        $validator = Validator::make(
            $data, 
            [
                'title'=>'required|string|max:50',
                'description'=>'nullable|string',
                'thumb'=>'required|string|url',
                'price'=>'required|integer|',
                'series'=>'required|string|max:25',
                'sale_date'=>'required|date',
                'type'=>'required|string|in:graphic novel, comic book',
            ],
            [
                'title.required'=>'The title is obligatory',
                'title.string' => 'The title must be a string',
                'title.max' => 'The title must be a maximum of 50 characters',

                'description.string'=> 'The description must be a string',

                'thumb.required' => 'The image path is obligatory',
                'thumb.string' => 'The image path must be a string',
                'thumb.url' => 'The image path must be a URI',

                'price.required' => 'The price is obligatory',
                'price.integer' => 'The price must be a number',

                'series.required'=>'The series is obligatory',
                'series.string' => 'The series must be a string',
                'series.max' => 'The series must be a maximum of 25 characters',

                'sale_date.required'=>'The sale date is obligatory',
                'sale_date.date'=>'The sale date must be a date',

                'type.required' => 'The type date is obligatory',
                'type.string' => 'The type must be a string',
                'type.in' => 'The type must have a value between "graphic novel", " comic book"',
                
            ],
        )->validate();
        return $validator;
    }
}