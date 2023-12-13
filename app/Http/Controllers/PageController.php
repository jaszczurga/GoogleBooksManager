<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index(){
        // fetching data from the API with 5 random breeds
        $response = Http::get('https://www.googleapis.com/books/v1/volumes?q=python');

        // Check if the request was successful and data is present
        if ($response->successful()) {
            $books = $response->json()['items'];

            // Extracting titles from fetched books
            $titles = [];
            foreach ($books as $book) {
                $title = $book['volumeInfo']['title'];
                $titles[] = $title;
            }

            // Pass titles to the view
            return view('index', compact('titles'));
        } else {
            // Handle the case when the request fails
            return "Failed to fetch data from the API.";
        }
    }

    public function search(Request $request){

        $query = $request->input('query');
        // fetching data from the API with 5 random breeds
       $response = Http::get('https://www.googleapis.com/books/v1/volumes?q=' . urlencode($query));

        // Check if the request was successful and data is present
        if ($response->successful()) {
            $books = $response->json()['items'];

            // Extracting titles from fetched books
            $titles = [];
            foreach ($books as $book) {
                $title = $book['volumeInfo']['title'];
                $titles[] = $title;
            }

            // Pass titles to the view
            return view('index', compact('titles'));
        } else {
            // Handle the case when the request fails
            return "Failed to fetch data from the API.";
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nazwa' => 'required'
        ]);

        // Stworzenie celu
        $cel = new Books;
        $cel->tytul = $request->input('nazwa');
        $cel->autor = $request->input('tresc');


        $cel->save();

        return redirect('/')->with('success', 'Cel dodany!');
    }

    public function edit($id)
    {
        return view('3details.edit')->with('cel', $id);
    }
}
