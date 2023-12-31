<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use App\Models\Rating;

class RatingController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:rating-list|rating-create|rating-edit|rating-delete', ['only' => ['index','show','search']]);
        $this->middleware('permission:rating-create', ['only' => ['create','store']]);
        $this->middleware('permission:rating-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:rating-delete', ['only' => ['delete','destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ratings = Rating::paginate(5);

        return view('ratings.index', compact(['ratings']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('ratings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRatingRequest $request)
    {
        $details = $request->validated();
        $rating = Rating::create($details);

        return redirect(route('ratings.index'))
            ->with('created', $rating->name)
            ->with('messages', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        return view('ratings.show', compact(['rating']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        return view('ratings.edit', compact(['rating']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        $id = $rating->id;
        $validated = $request->validated();
        $rating->update($validated);

        return redirect(route('ratings.index'))
            ->with('updated', "{$rating->name}")
            ->with('messageType', 'updated');
    }

    public function delete(Rating $rating)
    {
        return view('ratings.delete', compact(['rating']));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        $oldRating = $rating;
        $rating->delete();

        return redirect(route('ratings.index'))->with('deleted', "{$oldRating->name}");
    }
}
