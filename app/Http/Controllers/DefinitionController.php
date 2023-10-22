<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDefinitionRequest;
use App\Http\Requests\UpdateDefinitionRequest;
use App\Models\Definition;
use App\Models\Rating;
use App\Models\Word;
use App\Models\WordType;
use Illuminate\Support\Facades\Auth;

class DefinitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $definitions=Definition::with('word')->paginate(5);
        return view('definitions.index', compact(['definitions']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $words = Word::all();
        $wordTypes = WordType::all();
        $ratings = Rating::all();
        return view('definitions.create',compact('words','wordTypes','ratings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDefinitionRequest $request)
    {
        $definition = new Definition();

        //$definition->definition = $request['definition'];
        //$definition->word()->word_id = $request->get('word_id');
        //$request->user()->definitions()->save($definition);

        //$validatedData = $request->validated();
        //$word = Word::findorFail($validatedData['word_id']);
        //$wordType = WordType::findorFail($validatedData['word_type_id']);

        //$definition = $word->definitions()->create([
         //   'word_id'=>$validatedData['word_id'],
         //   'definition'=>$validatedData['definition']
        //]);

        //$definition = $wordType->definitions()->create([
         //   'word_type_id'=>$validatedData['word_type_id'],

        //]);

        $definition->word_id = $request->input('word_id');
        $definition->word_type_id = $request->input('word_type_id');
        $definition->definition = $request->input('definition');
        $definition->user_id = Auth::user()->id;
        //$definition->ratings_ids = $request->input('ratings_ids');
        //$request->user()->definitions()->save($definition);
        //$definition->save();


        $rating = Rating::find($request->rating_id);
        $rating->definition()->save($definition);
        //$rating = Rating::all();
        //$definition->rating()->attach(
        //    $rating
        //);
        //$request->user()->definitions()->save($definition);


        return redirect(route('definitions.index'))
            ->with('created', $definition->definition)
            ->with('messages', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Definition $definition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Definition $definition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDefinitionRequest $request, Definition $definition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Definition $definition)
    {
        //
    }
}
