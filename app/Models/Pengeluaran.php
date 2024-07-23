<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    public $fillable = ['jumlah_pengeluaran', 'deskripsi', 'id_kartu'];
    public $visible = ['jumlah_pengeluaran', 'deskripsi', 'id_kartu'];

    public function Kartu()
    {
        return $this->belongsTo(Kartu::class, 'id_kartu');
    }
}
