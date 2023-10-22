<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWordTypeRequest;
use App\Http\Requests\UpdateWordTypeRequest;
use App\Models\WordType;

class WordTypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * todo: add a route to the word types index method
     * todo: make the index method display the wordtypes.index view
     * todo: create the wordtypes/index.blade.php file and
     *       display the word types in a table
     * todo: add pagination to the table & controller method to
     *       show 5 word types at a time
     */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wordTypes = WordType::paginate(5);

        return view('wordtypes.index', compact(['wordTypes']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wordtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWordTypeRequest $request)
    {
        $details = $request->validated();
        $wordType = WordType::create($details);

        return redirect(route('wordtypes.index'))
            ->with('created', $wordType->name)
            ->with('messages', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(WordType $wordtype)
    {
        return view('wordtypes.show', compact(['wordtype']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WordType $wordtype)
    {
        return view('wordtypes.edit', compact(['wordtype']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWordTypeRequest $request, WordType $wordtype)
    {
        $id = $wordtype->id;
        $validated = $request->validated();
        $wordtype->update($validated);

        return redirect(route('wordtypes.index'))
            ->with('updated', "{$wordtype->name}")
            ->with('messageType', 'updated');
    }

    public function delete(WordType $wordtype)
    {
        return view('wordtypes.delete', compact(['wordtype']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WordType $wordtype)
    {
        $oldWordType = $wordtype;
        $wordtype->delete();

        return redirect(route('wordtypes.index'))->with('deleted', "{$oldWordType->name}");
    }
}
