<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWordRequest;
use App\Http\Requests\UpdateWordRequest;
use App\Models\Definition;
use App\Models\Word;
use App\Models\User;

class WordController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $definitions=Definition::first();
        $words = Word::paginate(5);

        return view('word.index', compact(['words','definitions']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('word.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWordRequest $request)
    {
        $word = new Word();
        $word->word = $request['word'];
        $request->user()->words()->save($word);
        return redirect(route('words.index'))
            ->with('created', $word->word)
            ->with('messages', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Word $word)
    {
        return view("word.show",compact(['word']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Word $word)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWordRequest $request, Word $word)
    {
        //
    }

    public function delete(Word $word)
    {
        return view('word.delete', compact(['word']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {
        $oldWord = $word;
        $word->delete();

        return redirect(route('words.index'))->with('deleted', "{$oldWord->word}");
    }
}
