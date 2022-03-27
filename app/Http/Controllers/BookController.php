<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Car;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isInstanceOf;

class BookController extends Controller
{
    public function index()
    {
        return view('books/index', ['books' => Book::orderBy('author')->get()]);
    }

    public function showBook($id)
    {
        return view('books/single', ['book' => Book::find($id), 'customers' => Customer::all()]);
    }

    public function storeBook(Request $request)
    {
        if ($request->has('name')) {
            $book = new Book();
            $book->name = $request->input('name');
            $book->author = $request->input('author');
            try {
                if ($book->save()) {
                    return redirect()->route('books.index')->with('success', "Saved");
                }
            } catch (Exception $e) {
                return redirect()->back()->withInput()->withErrors("Could not store");
            }
        } else {
            print_r("no valid json");
        }
    }

    public function deleteBook($id)
    {
        if (is_numeric($id)) {
            try {
                Book::destroy($id);
                return redirect()->route('books.index')->with('success', "Saved");
            } catch (Exception $e) {
                return redirect()->back()->withInput()->withErrors("Could not store");
            }
        } else {
            print_r("no valid id");
        }
    }
}
