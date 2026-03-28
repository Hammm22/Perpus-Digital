<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,heic'
        ]);

        $data = $request->only(['title', 'author', 'description']);

        $file = $request->file('cover');

        if ($file && $file->isValid()) {

            $filename = time() . '.' . $file->getClientOriginalExtension();

            // pastikan folder ada
            $file->move(public_path('storage/books'), $filename);

            $data['cover'] = 'books/' . $filename;
        }

        Book::create($data);

        return redirect()->route('admin.books.index');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, $id)
{
    $book = Book::findOrFail($id);

    $data = $request->only(['title', 'author', 'description']);

    $file = $request->file('cover');

    if ($file && $file->isValid()) {
        $filename = time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('storage/books'), $filename);

        $data['cover'] = 'books/' . $filename;
    }

    $book->update($data);

    return redirect()->route('admin.books.index');
}

    public function destroy($id)
    {
        Book::destroy($id);
        return back();
    }
}
