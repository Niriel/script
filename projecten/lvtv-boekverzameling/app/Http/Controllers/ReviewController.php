<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
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
        $review = Review::create($validated);
        return new ReviewResource($review);
    }

    public function show(Review $review)
    {
        return new ReviewResource($review);
    }

    public function edit(Review $review)
    {
        //
    }

    public function update(UpdateReviewRequest $request, Review $review)
    {
        $validated = $request->validated();
        $review->update($validated);
        return new ReviewResource($review);
    }

    public function destroy(Review $review)
    {
        $review->delete();
    }
}
