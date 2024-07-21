<?php

// app/Http/Livewire/Feedback/ShowFeedback.php

namespace App\Http\Livewire\Feedback;

use App\Models\Feedback;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class ShowFeedback extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        $feedbacks = Feedback::query()
            ->when($this->search, function($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.feedback.show-feedback', compact('feedbacks'));
    }

    public function destroy($id)
    {
        try {
            $feedback = Feedback::findOrFail($id);
            $feedback->delete();
            session()->json('success', 'Umpan balik telah dihapus.');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus umpan balik.');
            Log::error('Error menghapus umpan balik: ' . $e->getMessage());
        }

        // Emit Livewire event to refresh
        $this->emit('refreshLivewireDatatable');
    }
}

