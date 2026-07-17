<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'nama',
        'tempat',
        'tgl',
        'bulan',
        'tahun',
        'jk',
        'alamat',
        'sekolah',
        'mtk',
        'inggris',
        'indo',
        'pil1',
        'pil2',
        'alasan'
    ];
}
