<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'table_mahasiswa';
    protected $fillable = ['nama','nim','alamat','program_studi','semester'];
}
