<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    protected $fillable = ['no_antrian', 'nama', 'alamat', 'no_hp', 'no_ktp','layanan', 'is_call', 'tanggal_antrian', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
