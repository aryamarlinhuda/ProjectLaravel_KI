<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class UploadController extends Controller
{
	public function upload(){
		return view('uploadfile');
	}
 
	public function hasil_upload(Request $request){
		$this->validate($request, [
			'file' => 'required'
		]);
 
		$file = $request->file('file');
 
      	        // nama file
		echo 'File Name : '.$file->getClientOriginalName();
		echo '<br>';
 
      	        // ekstensi file
		echo 'File Extension : '.$file->getClientOriginalExtension();
		echo '<br>';
 
		$tujuan_upload = 'storage';
 
		$file->move($tujuan_upload,$file->getClientOriginalName());
	}
}