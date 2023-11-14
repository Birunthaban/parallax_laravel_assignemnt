<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    //
    public function index(){
        $books = Book::all();
        return view('books.index',['books'=>$books]);
    }
    public function create(){
        return view('books.create');
    }
    	public function store(Request $request)
    	    {
            // Validation rules
            $rules = [
                'title' => 'required|string|max:255',
               'author' => 'required|string|max:255',
               'price' => [
                'required',
                'numeric',
                'regex:/^-?\d+(\.\d{1,2})?$/',
                'min:0.01', // Allows up to two decimal places
            ],
            
               'stock' => 'required|integer|min:0',
       ];
    
          // Custom messages for validation errors
          $messages = [
               'title.required' => 'The title is required.',
               'author.required' => 'The author is required.',
              'price.required' => 'The price is required.',
              'price.regex' => 'The price must have up to two decimal places and can not be negative ',
              

           ];
    
    	        // Validate the request
    	        $validator = Validator::make($request->all(), $rules, $messages);
    	
            // If validation fails, redirect back with errors
            if ($validator->fails()) {
               return redirect()->route('books.create')
                   ->withErrors($validator)
                   ->withInput();
           }
    
            // Validation passed, create and save the book
            Book::create([
            'title' => $request->input('title'),
	            'author' => $request->input('author'),
    	            'price' => $request->input('price'),
                'stock' => $request->input('stock'),
            ]);
    
            // Redirect to the index page with a success message
    	        return redirect()->route('books.index')->with('success', 'Book added successfully!');
        }
        public function edit(Book $book){
          return view('books.edit',['book'=>$book]);

        }
        public function update(Request $request, $id)
        {
            // Validation rules
            $rules = [
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|min:0.01', // Allows up to two decimal places
                'stock' => 'required|integer|min:0',
            ];
    
            // Custom messages for validation errors
            $messages = [
                'title.required' => 'The title is required.',
                'author.required' => 'The author is required.',
                'price.required' => 'The price is required.',
                'price.regex' => 'The price must have up to two decimal places.',
                // Add custom messages for other fields as needed...
            ];
    
            // Validate the request
            $validator = Validator::make($request->all(), $rules, $messages);
    
            // If validation fails, redirect back with errors
            if ($validator->fails()) {
                return redirect()->route('books.edit', $id)
                    ->withErrors($validator)
                    ->withInput();
            }
    
            // Validation passed, update the book
            $book = Book::findOrFail($id);
            $book->update([
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
            ]);
    
            // Redirect to the index page with a success message
            return redirect()->route('books.index')->with('success', 'Book updated successfully!');
        }
        public function destroy($id)
        {
            // Find the book with the specified ID
            $book = Book::findOrFail($id);
    
            // Delete the book
            $book->delete();
    
            // Redirect to the index page with a success message
            return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
        }    
    
}
