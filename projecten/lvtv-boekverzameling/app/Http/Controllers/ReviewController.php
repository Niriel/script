<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return ReviewResource::collection($reviews);
    }

    public function create()
    {
        //
    }

    public function store(StoreReviewRequest $request)
    {
        $validated = $request->validated();
        Review::create($validated);
        // We should return the created object,
        // but we return everything because our front-end
        // store is dumb and tiny.
        $reviews = Review::all();
        return ReviewResource::collection($reviews);
    }

    public function show(Review $review)
    {
        return new ReviewResource($review);
    }

    public function edit(Review $review)
    {
        //
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validated();
        $review->update($validated);
        // We should return the created object,
        // but we return everything because our front-end
        // store is dumb and tiny.
        $reviews = Review::all();
        return ReviewResource::collection($reviews);
    }

    public function destroy(Review $review)
    {
        $review->delete();
        // We should return the created object,
        // but we return everything because our front-end
        // store is dumb and tiny.
        $reviews = Review::all();
        return ReviewResource::collection($reviews);
    }
}
