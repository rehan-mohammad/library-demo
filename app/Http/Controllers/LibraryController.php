<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the Libraries.
     */
    public function index()
    {

        // get all the libraries
        $libraries = Library::all();

        // load the view and pass the libraries
        return view('libraries.index',compact('libraries'));
    }

    /**
     * Show the form for creating a new Library.
     *
     */
    public function create()
    {
        return view('libraries.create');
    }

    /**
     * Store a newly created Library in storage.
     *
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        $library = Library::create($validatedData);

        return view('libraries.index')->with('success', 'Library is successfully saved');
    }

    /**
     * Show the form for editing the specified Library.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $library = Library::findOrFail($id);

        return view('libraries.edit', compact('library'));
    }

    /**
     * Update the specified Library in storage.
     *
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        Library::whereId($id)->update($validatedData);

        return view('libraries.index')->with('success', 'Library is successfully updated');

    }

    /**
     * Remove the specified Library from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $library = Library::findOrFail($id);
        $library->delete();

        return view('libraries.index')->with('success', 'Library is successfully deleted');
    }
}
