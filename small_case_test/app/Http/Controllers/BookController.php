<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $books = Book::all();
        return view('books.list',compact('books','categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create',compact('categories'));
    }

    public function store(FormBookRequest $request)
    {
        $book = new Book();
        $book->name = $request->input('name');
        if($request->hasFile('image')){
            $path= $request->file('image')->store('image','public');
            $book->image = $path;
        }
        $book->writerName = $request->input('writerName');
        $book->category_id = $request->input('category_id');
        $book->price = $request->input('price');
        $book->description = $request->input('description');
        $book->save();
        return redirect()->route('books.index');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        return view('books.edit',compact('book','categories'));
    }

    public function update(FormBookRequest $request,$id)
    {
        $book = Book::find($id);
        $book->name = $request->input('name');
        if($request->hasFile('image')){
            $path= $request->file('image')->store('image','public');
            $book->image = $path;
        }
        $book->writerName = $request->input('writerName');
        $book->category_id = $request->input('category_id');
        $book->price = $request->input('price');
        $book->description = $request->input('description');
        $book->save();
        return redirect()->route('books.index');
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index');
    }

    public function showBooks($id)
    {
       $category = Category::find($id);
       $books = Book::where('category_id',$category->id)->get();
       return view('listBook',compact('books','category'));
    }
}
