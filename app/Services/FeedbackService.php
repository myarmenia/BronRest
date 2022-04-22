<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Models\Feedback;

class FeedbackService
{
    public static function index()
    {
        return Feedback::with('user')->get();
    }

    public static function find(int $id)
    {
        return Feedback::with('user')->findOrFail($id);
    }
}
