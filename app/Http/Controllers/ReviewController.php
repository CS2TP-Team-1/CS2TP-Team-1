<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

// The ReviewController contains the functions related to the reviews system

class ReviewController extends Controller
{
    public function index()
    {
        // Logic to fetch and display all reviews
        $reviews = Review::all();
        return response()->json($reviews);
    }

    public function show($id)
    {
        // Logic to fetch and display a specific review
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }
        return response()->json($review);
    }

    public function store(Request $request)
    {
        // Validate the rating and comment fields
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'contents' => 'nullable|string|max:255',
            'title' => 'required|string|max:255'
        ]);

        // Create the review and associate it with the authenticated user and the product being reviewed
        $review = new Review();
        $review->user_id = Auth::id(); // Get the ID of the authenticated user
        $review->product_id = $request->input('product_id');
        $review->title = $request->input('title');
        $review->rating = $request->input('rating');
        $review->contents = $request->input('contents'); // Assuming 'comment' is the field representing the review content
        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

    public function deleteReview($id): RedirectResponse
    {
        $review = Review::findOrFail($id);
        if (( $review->user_id == Auth::id() ) || ( Auth::user()->accountType == 1 )){
            $review->delete();
            return redirect()->back()->with('success', 'review-deleted');
        } else {
            return redirect()->back()->with('failed', 'unauthorised');
        }


    }
}
