<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{

    public function index()
    {
        $feedbacks = Feedback::paginate(10); // Sesuaikan jumlah sesuai kebutuhan
        return view('livewire.dashboard.feedback.show-feedback', compact('feedbacks'));
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Feedback berhasil dihapus!',
            'redirect' => route('dashboard.feedback.index') // Rute untuk kembali ke halaman feedback
        ]);
    }
    

    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string', // Simpan sebagai string
        ]);

        // Cek apakah data sudah ada sebelumnya untuk menghindari duplikasi
        $existingFeedback = Feedback::where('name', $request->name)
            ->where('email', $request->email)
            ->where('message', $request->message)
            ->first();

        if (!$existingFeedback) {
            Feedback::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message, // Simpan sebagai string
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Your feedback has been submitted!']);
    }

    public function show($id)
    {
        $feedback = Feedback::find($id);
        if ($feedback) {
            return response()->json($feedback);
        } else {
            return response()->json(['error' => 'Feedback not found'], 404);
        }
    }
}
