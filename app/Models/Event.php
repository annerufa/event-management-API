<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['namaAcara', 'deskripsi', 'organizer_id', 'waktuMulai', 'waktuSelesai', 'status', 'lokasi'];
}
