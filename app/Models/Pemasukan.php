<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $fillable = ['jumlah_pemasukan', 'deskripsi'];
    protected $visible = ['jumlah_pemasukan', 'deskripsi'];

    public function kartu()
    {
        return $this->belongsTo(Kartu::class, 'id_kartu');
    }
}
