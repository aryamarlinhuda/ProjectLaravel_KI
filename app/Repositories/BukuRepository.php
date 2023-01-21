<?php

namespace App\Repositories;

use App\Models\Buku;

class BukuRepository {
    public static function deleteBuku($id){
        return Buku::find($id)->delete();
    }
}