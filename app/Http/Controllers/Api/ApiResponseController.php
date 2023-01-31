<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ApiResponseController extends Controller
{
    use ApiResponse;

    public function list(Request $request) {
        return $this->successData([
            'nama' => 'Arya Marlin Huda',
        ]);
    }

    public function success(Request $request)
    {
        return $this->successResponse('Berhasil');
    }

    public function requestBad(Request $request)
    {
        return $this->badRequest('Ada yang salah bro');
    }

    public function requestUnathorized(Request $request)
    {
        return $this->unauthorized('Login dulu lah');
    }
}
