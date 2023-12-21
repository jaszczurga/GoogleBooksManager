<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class PageController extends Controller
{
    private $books;
    private $query = 'python';

    public function index(){

        $userName = Auth::user()->name;
        $cacheKey = 'books_query_' . $this->query;

        // Check if data exists in cache
        if (Cache::has($cacheKey)) {
            $this->books = Cache::get($cacheKey);
        } else {
            $response = Http::get('https://www.googleapis.com/books/v1/volumes?q='.$this->query);

            if ($response->successful()) {
                $this->books = $response->json()['items'];
                // Cache the API response for 60 minutes (adjust this as needed)
                Cache::put($cacheKey, $this->books, now()->addMinutes(60));
            } else {
                return "Failed to fetch data from the API.";
            }
        }

       // return view('index')->with('books', $this->books);
        return view('index')->with(['books' => $this->books, 'userName' => $userName]);
    }

    public function search(Request $request){

        $startTime = microtime(true); // Record start time

        $userName = Auth::user()->name;
        $query = $request->input('query');
        $cacheKey = 'books_query_' . $query;

        if (Cache::has($cacheKey)) {
            $this->books = Cache::get($cacheKey);
        } else {
            $response = Http::get('https://www.googleapis.com/books/v1/volumes?q=' . urlencode($query));
            Log::info($response);
            if ($response->successful() && $response->json()['totalItems'] > 0) {
                $this->books = $response->json()['items'];
                Cache::put($cacheKey, $this->books, now()->addMinutes(60));
            } else {
                $errors = ['wpisz ksiazke ktora chcesz wyszukac'];

                $endTime = microtime(true);
                $executionTime = round(($endTime - $startTime) * 1000, 2); // in milliseconds
                Log::info('Execution time for search '.$query.' function: ' . $executionTime . ' milliseconds');

                return redirect('/')->withErrors($errors);
            }
        }

        $endTime = microtime(true);
        $executionTime = round(($endTime - $startTime) * 1000, 2); // in milliseconds
        Log::info('Execution time for search '.$query.' function: ' . $executionTime . ' milliseconds');
//        return view('index')->with('books', $this->books);
        return view('index')->with(['books' => $this->books, 'userName' => $userName]);
    }

    public function store($id)
    {
        $userName = Auth::user()->name;
        $cacheKey = 'book_' . $id;

        // Check if data exists in cache
        if (Cache::has($cacheKey)) {
            $bookData = Cache::get($cacheKey);

            $this->storeBookDetails($bookData);
        } else {
            //$response = Http::get('https://www.googleapis.com/books/v1/volumes?q=' . $id);
            $response = Http::get('https://www.googleapis.com/books/v1/volumes/' . urlencode($id));

//            if ($response->successful()) {
//                $bookData = $response->json()['items'][0];
//
//
//                // Cache the book data for 60 minutes (adjust this as needed)
//                Cache::put($cacheKey, $bookData, now()->addMinutes(60));
//                // Store book details in the database
//                $this->storeBookDetails($bookData);
//            } else {
//                return redirect('/')->with('error', 'Failed to fetch data from the API.');
//            }
            if ($response->successful()) {
                //$this->books = $response->json()['items'];
                $this->books = $response->json();
                $bookData = $this->books;
               // foreach ($this->books as $b) {
                    //if ($b['id'] == $id) {
                     //   $bookData = $b;

                        // Cache the book data for 60 minutes (adjust this as needed)
                        Cache::put($cacheKey, $bookData, now()->addMinutes(60));
                        $bookData = $this->checkCorrect($bookData);
                        $this->storeBookDetails($bookData);
                   // }
               // }
            } else {
                return redirect('/')->with('error', 'Failed to fetch data from the API.');
            }
        }

        return redirect('/')->with('success', 'Book data retrieved successfully!');
    }

    private function storeBookDetails($bookData)
    {
        $bookData = $this->checkCorrect($bookData);
        $user = Auth::user();
        //check if in db exist book with this book_id
        if ($bookt = Books::where([
            ['book_id', $bookData['id']],
            ['user_id', $user->id],
        ])->first()) {
            // Book with the specified book_id and user_id exists
            $errors = ['Ta ksiazka jest juz zapisana w bazie danych.'];
            return redirect('/')->withErrors($errors);
        }



        $book = new Books;
        $book->book_id = $bookData['id'];
        $book->tytul = $bookData['volumeInfo']['title'];
        $book->autor = $bookData['volumeInfo']['authors'][0];
        $book->img = $bookData['volumeInfo']['imageLinks']['thumbnail'];
        $book->notatka ="Brak notatki";
        $book->user_id = $user->id;
        $book->przeczytana = "nie";
        $book->opis =  $bookData['volumeInfo']['description'];
        $book->save();
    }

    private function checkCorrect($bookData){
        //check is image exist
        if (isset($bookData['volumeInfo']['imageLinks']['thumbnail'])) {
            $bookData['volumeInfo']['imageLinks']['thumbnail'] = str_replace('&edge=curl', '', $bookData['volumeInfo']['imageLinks']['thumbnail']);
        } else {
            $bookData['volumeInfo']['imageLinks']['thumbnail'] = 'https://via.placeholder.com/128x192.png?text=No+Image';
        }
        //check if description exist
        if (!(isset($bookData['volumeInfo']['description'])) ){
            $bookData['volumeInfo']['description'] = 'Brak opisu';
        }

        //check if author exist
        if (!(isset($bookData['volumeInfo']['authors'][0])) ){
            $bookData['volumeInfo']['authors'][0] = 'Brak autora';
        }
        return $bookData;
    }

    public function bookDetails($id)
    {
        $cacheKey = 'book_' . $id;

        // Check if data exists in cache
        if (Cache::has($cacheKey)) {
            $bookData = Cache::get($cacheKey);
            $bookData = $this->checkCorrect($bookData);
            return view('bookDetails')->with('book', $bookData);
        } else {
            //$response = Http::get('https://www.googleapis.com/books/v1/volumes?q=' . urlencode($id));
            $response = Http::get('https://www.googleapis.com/books/v1/volumes/' . urlencode($id));

            if ($response->successful()) {
                //$this->books = $response->json()['items'];
                $this->books = $response->json();
                $bookData = $this->books;

                //foreach ($this->books as $b) {
                    //if ($b['id'] == $id) {
                      //  $bookData = $b;

                        // Cache the book data for 60 minutes (adjust this as needed)
                        Cache::put($cacheKey, $bookData, now()->addMinutes(60));
                        $bookData = $this->checkCorrect($bookData);

                        return view('bookDetails')->with('book', $bookData);
                   // }
                //}
            } else {
                return redirect('/')->with('error', 'Failed to fetch data from the API.');
            }
        }
    }


    public function delete($id)
    {
        $book = Books::find($id);
        $book->delete();

        return redirect('/myBooks')->with('success', 'Cel zniszczony');
    }
    public function show()
    {
        $user = Auth::user();

        // Retrieve all books associated with the user
        $userBooks = Books::where('user_id', $user->id)->get();

        // Count the number of books that are marked as read (where przeczytane is true)
        $readBooksCount = $userBooks->where('przeczytana', 'tak')->count();
        // count number of books
        $booksCount = $userBooks->count();
        if($booksCount==0){
            $booksCount=1;
        }

        Log::info('Showing user profile for user: ' . $user->id);

        return view('MyBooks')->with('books', $userBooks)
            ->with('readBooksCount', round(($readBooksCount/$booksCount)*100,0));
    }
    public function myBooksDetails($id)
    {
        $user = Auth::user();
        $book = Books::find($id);

        if ($book && $book->user_id == $user->id) {
            return view('myBooksDetails')->with('book', $book);
        } else {
            return redirect('/myBooks')->with('error', 'Nie masz uprawnień do edycji tego celu!');
        }
    }


    public function update(Request $request, $id)
    {
        $book = Books::find($id);
        $book->notatka = $request->input('notatka');
        $book->save();

        return redirect('/myBooks')->with('success', 'Cel zaktualizowany!');
    }

    public function updateRead( $id)
    {
        $book = Books::find($id);
        if($book->przeczytana=="nie"){
            $book->przeczytana = "tak";
        }else{
            $book->przeczytana = "nie";
        }
        $book->save();

        return redirect('/myBooks/myBooksDetails/'.$id)->with('success', 'Cel zaktualizowany!');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }


}
