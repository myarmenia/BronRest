<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ValidateRepository;
use App\Services\FeedbackService;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-feedback', ['only' => ['index']]);
    }

    public function index()
    {
        $data = FeedbackService::index();
        return view('feedback.index',['feedbacks' => $data]);
    }

    public function show($id)
    {
        $data = FeedbackService::find($id);

        return view('feedback.show',['feedback' => $data]);
    }

    public function destroy($id)
    {
        FeedbackService::find($id)->delete();

        return redirect()->route('seeFeedbacks');
    }

    public function store(Request $request)
    {
        $validated = ValidateRepository::start($request->all(),[
            'theme' => 'required|string',
            'message' => 'required|string',
        ]);

        Auth::user()->feedbacks()->create($validated);

        return response()->json([
            'status' => 200
       ]);
    }
}
