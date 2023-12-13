<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class PageController extends Controller
{
    private $books;
    private $query = "python";

    public function index(){
        // fetching data from the API with 5 random breeds
        $response = Http::get('https://www.googleapis.com/books/v1/volumes?q='.$this->query);

        // Check if the request was successful and data is present
        if ($response->successful()) {
            $this->books = $response->json()['items'];



//            // Extracting titles from fetched books
//            $titles = [];
//            foreach ($books as $book) {
//                $title = $book['volumeInfo']['title'];
//                $titles[] = $title;
//            }

            // Pass titles to the view

            //return view('index', compact('titles'));
            return view('index')->with('books', $this->books);
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
            $this->books = $response->json()['items'];

            // Extracting titles from fetched books
//            $titles = [];
//            foreach ($books as $book) {
//                $title = $book['volumeInfo']['title'];
//                $titles[] = $title;
//            }


            return view('index')->with('books', $this->books);
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
        Log::info($id);
        // fetching data from the API with 5 random breeds
        $response = Http::get('https://www.googleapis.com/books/v1/volumes?q='.urlencode($id));

        // Check if the request was successful and data is present
        if ($response->successful()) {
            $this->books = $response->json()['items'];


            $book = null;

            foreach ($this->books as $b) {
                if ($b['id'] == $id) {
                    $book = $b;
                }
            }

            return view('edit')->with('book', $book);
        }
    }
}
