<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class PageController extends Controller
{
    private $books;
    private $query = 'python';

    public function index(){
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

        return view('index')->with('books', $this->books);
    }

    public function search(Request $request){
        $query = $request->input('query');
        $cacheKey = 'books_query_' . $query;

        if (Cache::has($cacheKey)) {
            $this->books = Cache::get($cacheKey);
        } else {
            $response = Http::get('https://www.googleapis.com/books/v1/volumes?q=' . urlencode($query));

            if ($response->successful()) {
                $this->books = $response->json()['items'];
                Cache::put($cacheKey, $this->books, now()->addMinutes(60));
            } else {
                return "Failed to fetch data from the API.";
            }
        }

        return view('index')->with('books', $this->books);
    }

    public function store($id)
    {
        $cacheKey = 'book_' . $id;

        // Check if data exists in cache
        if (Cache::has($cacheKey)) {
            $bookData = Cache::get($cacheKey);
        } else {
            $response = Http::get('https://www.googleapis.com/books/v1/volumes?q=' . $id);

            if ($response->successful()) {
                $bookData = $response->json()['items'][0];

                // Cache the book data for 60 minutes (adjust this as needed)
                Cache::put($cacheKey, $bookData, now()->addMinutes(60));

                // Store book details in the database
                $this->storeBookDetails($bookData);
            } else {
                return redirect('/')->with('error', 'Failed to fetch data from the API.');
            }
        }

        return redirect('/')->with('success', 'Book data retrieved successfully!');
    }

    private function storeBookDetails($bookData)
    {
        $book = new Books;
        $book->book_id = $bookData['id'];
        $book->tytul = $bookData['volumeInfo']['title'];
        $book->autor = $bookData['volumeInfo']['authors'][0];

        $book->save();
    }

    public function edit($id)
    {
        $cacheKey = 'book_' . $id;


        // Check if data exists in cache
        if (Cache::has($cacheKey)) {
            $bookData = Cache::get($cacheKey);
            return view('edit')->with('book', $bookData);
        } else {
            $response = Http::get('https://www.googleapis.com/books/v1/volumes?q=' . urlencode($id));

            if ($response->successful()) {
                $this->books = $response->json()['items'];

                foreach ($this->books as $b) {
                    if ($b['id'] == $id) {
                        $bookData = $b;

                        // Cache the book data for 60 minutes (adjust this as needed)
                        Cache::put($cacheKey, $bookData, now()->addMinutes(60));
//
//                        // Store book details in the database
//                        $this->storeBookDetails($bookData);
//                        break;
                        return view('edit')->with('book', $bookData);
                    }
                }
            } else {
                return redirect('/')->with('error', 'Failed to fetch data from the API.');
            }
        }

//        return view('edit')->with('book', $bookData);
    }
}
