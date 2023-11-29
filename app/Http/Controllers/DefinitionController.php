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
    function __construct()
    {

        $this->middleware('permission:definition-create', ['only' => ['create','store']]);
        $this->middleware('permission:definition-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:definition-delete', ['only' => ['delete','destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = Request()->all();
        $clear = $request['clear'] ?? '';
        $searchFor = $request['search'] ?? '';
        if ($clear) {
            $searchFor = "";
        }

        if ($searchFor === "") {
            $definitions=Definition::with('word')->paginate(5);
        }
        else{
            $definitions = Definition::with('word')
                ->where('appropriate', 0)
                ->where('definition', 'like', "%{$searchFor}%")
                ->paginate(5);
        }

        return view('definitions.index', compact(['definitions', 'searchFor']));
    }

    public function indexOwnDefinitions()
    {
        $request = Request()->all();
        $clear = $request['clear'] ?? '';
        $searchFor = $request['search'] ?? '';
        if ($clear) {
            $searchFor = "";
        }

        if ($searchFor === "") {
            $definitions=Definition::with('word')
            ->where('user_id', Auth::user()->id)->paginate(5);
        } else {
            $definitions = Definition::with('word')
                ->where('user_id', Auth::user()->id)
                ->where('definition', 'like', "%{$searchFor}%")
                ->paginate(5);

        }

        return view('definitions.indexOwnDefinitions', compact(['definitions', 'searchFor']));
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

        $definition->word_id = $request->input('word_id');
        $definition->word_type_id = $request->input('word_type_id');
        $definition->definition = $request->input('definition');
        $definition->user_id = Auth::user()->id;
        $definition->review = $request->review == true ? '1':'0';

        $rating = Rating::find($request->rating_id);
        $rating->definition()->save($definition,['user_id'=>Auth::user()->id]);


        return redirect(route('definitions.index'))
            ->with('created', $definition->definition)
            ->with('messages', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Definition $definition)
    {
        $words = Word::all();
        $wordTypes = WordType::all();
        $user = $definition->user()->first();
        $rating = $definition->rating()->first();
        return view('definitions.show',compact('words','rating','wordTypes','definition','user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Definition $definition)
    {

        $words = Word::all();
        $wordTypes = WordType::all();
        $ratings = Rating::with('definition')->get();
        if((auth()->check() && Auth::user()->hasRole('staff') && $definition->user_id != 1) ||
            (auth()->check() && Auth::user()->hasRole('admin')) ||
            (auth()->check() && Auth::user()->id == $definition->user_id)){
        return view('definitions.edit', compact(['words','wordTypes','ratings','definition']));
    }else{
            return redirect(route('definitions.index'))
                ->with('updatedOwn', $definition->definition)
                ->with('messages', 'updatedOwn');
        }}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDefinitionRequest $request, Definition $definition)
    {
        $definition->word_id = $request->input('word_id');
        $definition->word_type_id = $request->input('word_type_id');
        $definition->definition = $request->input('definition');
        $definition->appropriate = $request->appropriate == true ? '1' : '0';
        $definition->review = $request->review == true ? '1' : '0';

            $definition->update();
            $definition->rating()->syncWithPivotValues([$request->rating_id], ['user_id' => Auth::user()->id]);

            return redirect(route('definitions.index'))
                ->with('updated', $definition->definition)
                ->with('messages', 'updated');

    }


    public function delete(Definition $definition)
    {
        $words = Word::all();
        $wordTypes = WordType::all();
        $user = $definition->user()->first();
        $rating = $definition->rating()->first();
        if((auth()->check() && Auth::user()->hasRole('staff') && $definition->user_id != 1) ||
            (auth()->check() && Auth::user()->hasRole('admin')) ||
            (auth()->check() && Auth::user()->id == $definition->user_id)){
        return view('definitions.delete', compact(['definition','words','wordTypes','rating','user']));
    }else{
            return redirect(route('definitions.index'))
                ->with('deletedOwn', $definition->definition)
                ->with('messages', 'deleted');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Definition $definition)
    {

            $oldDefinition = $definition;
            $definition->delete();
            $definition->rating()->detach();

            return redirect(route('definitions.index'))
                ->with('deleted',$oldDefinition->definition)
                ->with('messages', 'deleted');

    }
}
