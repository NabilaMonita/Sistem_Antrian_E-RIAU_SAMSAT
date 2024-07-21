<?php

// app/Http/Livewire/Dashboard/Laporan/ShowLaporan.php

namespace App\Http\Livewire\Dashboard\Laporan;

use App\Models\Antrian;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class ShowLaporan extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $tanggal_antrian, $layanan, $search;
    protected $queryString = ['search'];

    public function render()
    {
        if ($this->tanggal_antrian == "today") {
            $laporan = Antrian::where('tanggal_antrian', Carbon::now()->toDateString())->where('is_call', 1)->paginate(10);
        } else if ($this->tanggal_antrian == "week") {
            $laporan = Antrian::whereBetween('tanggal_antrian', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('is_call', 1)->paginate(10);
        } elseif ($this->tanggal_antrian == "month") {
            $laporan = Antrian::whereMonth('tanggal_antrian', Carbon::now()->month)->where('is_call', 1)->paginate(10);
        } else if ($this->layanan) {
            $laporan = $this->layanan ? Antrian::where('layanan', $this->layanan)->where('is_call', 1)->paginate(10) : Antrian::where('is_call', 1)->paginate(10);
        } else if ($this->search) {
            $laporan = Antrian::where('nama', 'like', '%' . $this->search . '%')->paginate(10);
        } else {
            $laporan = Antrian::where('is_call', 1)->paginate(10);
        }

        return view('livewire.dashboard.laporan.show-laporan', compact('laporan'));
    }

    // app/Http/Livewire/Dashboard/Laporan/ShowLaporan.php

    // app/Http/Livewire/Dashboard/Laporan/ShowLaporan.php

    public function hapusAntrian($id)
    {
        try {
            $antrian = Antrian::findOrFail($id);
            $antrian->delete();
            session()->flash('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus data.');
            Log::error('Error menghapus data: ' . $e->getMessage());
        }

        // Redirect ke URL route
        return redirect('dashboard/laporan/index');
    }}
