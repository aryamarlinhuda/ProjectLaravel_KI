<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CrudUser;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CrudUserController extends Controller
{
    use ApiResponse;

    function list(Request $request) {
        $listAllUser = CrudUser::latest('id')
            ->select(['id', 'nama', 'email', 'gender'])
            ->get();

        return $this->successData($listAllUser);
    }

    function detail(Request $request,$id){
        $findUser = CrudUser::findOrFail($id);
        return $this->successData($findUser);
    }

    public function create(Request $request)
    {
        // $request->validate([]);
        CrudUser::create([
            'nama' =>  $request->nama,
            'email' =>  $request->email,
            'gender' =>  $request->gender
        ]);
        return $this->successResponse('User Created Successfully');
    }

    public function update(Request $request, $id)
    {
        CrudUser::findOrFail($id)->update([
            'nama' =>  $request->nama,
            'email' =>  $request->email,
            'gender' =>  $request->gender
        ]);
        return $this->successResponse('User Successfully Updated');
    }

    public function delete(Request $request, $id)
    {
        CrudUser::findOrFail($id)->delete();
        return $this->successResponse('User Successfully Deleted');
    }
}
