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
    function __construct()
    {

        $this->middleware('permission:word-create', ['only' => ['create','store']]);
        $this->middleware('permission:word-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:word-delete', ['only' => ['delete','destroy']]);
    }

    /**
     * Display a listing of the word resource.
     */
    public function index()
    {
        //$definitions=Definition::first();

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

        return view('word.index', compact(['words', 'searchFor']));
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

        if((auth()->check() && Auth::user()->hasRole('staff') && $word->user_id != 1) ||
            (auth()->check() && Auth::user()->hasRole('admin'))||
            (auth()->check() && Auth::user()->id == $word->user_id)){
        return view('word.edit', compact(['word']));}
        else
        {
            return redirect(route('words.index'))
                ->with('updatedOwn', $word->word)
                ->with('messages', 'updatedOwn');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWordRequest $request, Word $word)
    {
        $validated = $request->validated();
            $word->word = $request->input('word');
            $word->review = $request->review == true ? '1':'0';
            $word->update();

        return redirect(route('words.index'))
            ->with('updated', "{$word->word}")
            ->with('messageType', 'updated');

    }

    public function delete(Word $word)
    {
        if((auth()->check() && Auth::user()->hasRole('admin'))||
            (auth()->check() && Auth::user()->id == $word->user_id)){
        return view('word.delete', compact(['word']));}
        else
        {
            return redirect(route('words.index'))
                ->with('deletedOwn', $word->word)
                ->with('messages', 'deletedOwn');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {
            $oldWord = $word;
            $word->delete();
            $word->definitions()->delete();

        return redirect(route('words.index'))->with('deleted', "{$oldWord->word}")
            ->with('messages', 'deleted');
    }
}
