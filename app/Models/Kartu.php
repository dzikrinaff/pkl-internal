<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kartu extends Model
{
    use HasFactory;
    protected $fillable = [ 'nama_kartu','total','no'];
    protected $visible = ['nama_kartu','total','no'];

}
