<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWordRequest;
use App\Http\Requests\UpdateWordRequest;
use App\Models\Definition;
use App\Models\Word;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $definitions=Definition::first();

        $request = Request()->all();
        $clear = $request['clear'] ?? '';
        $searchFor = $request['search'] ?? '';
        if ($clear) {
            $searchFor = "";
        }

        if ($searchFor === "") {
            $words = Word::paginate(10);
        } else {
            $words = Word::
                where('word', 'like', "%{$searchFor}%")
                ->paginate(10);
        }

        return view('word.index', compact(['words','definitions', 'searchFor']));
    }

    public function indexOwnWords()
    {
        $definitions=Definition::first();

        $request = Request()->all();
        $clear = $request['clear'] ?? '';
        $searchFor = $request['search'] ?? '';
        if ($clear) {
            $searchFor = "";
        }

        if ($searchFor === "") {
            $words = Word::where('user_id', Auth::user()->id)->paginate(10);
        } else {
            $words = Word::where('user_id', Auth::user()->id)
            ->where('word', 'like', "%{$searchFor}%")
                ->paginate(10);
        }

        return view('word.indexOwnWords', compact(['words','definitions', 'searchFor']));
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
        $word->word = $request->input('word');
        $word->review = $request->review == true ? '1':'0';
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
        //$definitions = Definition::all();

        return view('word.edit', compact(['word']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWordRequest $request, Word $word)
    {
        $validated = $request->validated();
        if(Auth::user()->id == $word->user_id){
            $word->word = $request->input('word');
            $word->review = $request->review == true ? '1':'0';
            $word->update();

        return redirect(route('words.index'))
            ->with('updated', "{$word->word}")
            ->with('messageType', 'updated');}
        else{
            return redirect(route('words.index'))
                ->with('updatedOwn', $word->word)
                ->with('messages', 'updatedOwn');
        }

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

        if(Auth::user()->id == $word->user_id){
            $oldWord = $word;
            $word->delete();
            $word->definitions()->delete();

        return redirect(route('words.index'))->with('deleted', "{$oldWord->word}");}
        else{
            $oldWord = $word;
            return redirect(route('words.index'))
                ->with('deletedOwn', $oldWord->word)
                ->with('messages', 'deletedOwn');
        }
    }
}
