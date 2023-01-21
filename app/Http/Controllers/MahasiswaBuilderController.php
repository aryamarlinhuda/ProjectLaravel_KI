<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaBuilderController extends Controller
{
    public function add(){
        DB::table('table_mahasiswa')->insert([
            'nama'=>'Ahmad Reno Pratama',
            'nim'=>'82875864124',
            'alamat'=>'Lampung',
            'program_studi'=>'Seni dan Desain',
            'semester' =>'1'
        ]);

        return "Data berhasil ditambahkan.";
    }

    public function edit(){
        DB::table('table_mahasiswa')->where('id',2)->update([
			'nim' => '83748261937',
			'semester' => '3'
		]);

        return "Data berhasil diganti.";
    }

    public function delete(){
        DB::table('table_mahasiswa')->where('id',4)->delete();

        return "Data berhasil dihapus.";
    }
}
