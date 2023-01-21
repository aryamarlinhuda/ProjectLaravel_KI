<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function add(){
        Mahasiswa::create([
            'nama'=>'Arya Marlin Huda',
            'nim'=>'82968790254',
            'alamat'=>'Kota Semarang',
            'program_studi'=>' Komputer atau Informatika',
            'semester' =>'3'
        ]);

        Mahasiswa::create([
            'nama'=>'Muhammad Iqbal',
            'nim'=>'82835718468',
            'alamat'=>'Jakarta',
            'program_studi'=>'Hukum',
            'semester' =>'2'
        ]);

        Mahasiswa::create([
            'nama'=>'Putri Maharini',
            'nim'=>'82817962871',
            'alamat'=>'Jakarta',
            'program_studi'=>'Kedokteran dan Kesehatan',
            'semester' =>'2'
            ]);

        return 'Table selesai dibuat.';
    }

    public function edit(){
        Mahasiswa::where('id',3)->update(['alamat'=>'Bekasi']);

        return 'Data telah di update.';
    }

    public function delete(){
        Mahasiswa::where('id',3)->delete();

        return 'Data berhasil dihapus.';
    }
}