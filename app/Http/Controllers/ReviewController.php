<?php

namespace App\Http\Controllers;

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
            'contents' => 'nullable|string',
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

    public function destroy($id)
    {
        $review = Review::where('id', '=', $id);
        // Check if the authenticated user is authorized to delete the review
        // if ($review->user_id === auth()->id()) {
        $review->delete();
        return redirect(url('/products/' . $id))->with('success', 'Review deleted successfully.');
        // } else {
        //     return redirect()->back()->with('error', 'You are not authorized to delete this review.');
        // }


    }
}
