<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Rules\ImageValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignatureController extends Controller
{
    public function __construct()
   {
       $this->middleware(['verified']);
   }

   
    public function index(){

        return view('students.studentsignature',[
            'getsignature' => auth()->user()->studentsignature
        ]);
 
     }


     public function store(Request $request){

        $this->validate($request,[
            'signed' => new ImageValidation(),
        ]);

        $folderPath = public_path('upload/student-signatures/');
        
        $image = explode(";base64,", $request->signed);
              
        $image_base64 = base64_decode($image[1]);
           
        $filename = time() . '-' .auth()->user()->personalid . '.'.'svg';

        $file = $folderPath . $filename;
        file_put_contents($file, $image_base64);

        try {
            DB::transaction(function () use($request, $filename) {
        $request->user()->studentsignature()->create([
            'image_path' => $filename
        ]);

        $request->user()->studentformstatus()->update([
            'signature' => 1
        ]);
            });
        } catch (\Throwable $th) {
            throw $th;
        }

        return back()->with('success', 'Signature upload success!');
     }

    public function update(Request $request){
        $this->validate($request,[
            'signed' => new ImageValidation(),
        ]);

        $oldimagepath = public_path('upload/student-signatures/').auth()->user()->studentsignature->image_path;
        if(file_exists($oldimagepath)){
            unlink($oldimagepath);
        }
        else{
            abort(500, 'If you see this, contact the Registrar\'s Office immediately');
        }

        $folderPath = public_path('upload/student-signatures/');
        
        $image = explode(";base64,", $request->signed);
              
        $image_base64 = base64_decode($image[1]);
           
        $filename = time() . '-' . auth()->user()->personalid . '.'.'svg';

        $file = $folderPath . $filename;
        file_put_contents($file, $image_base64);

        try {
            DB::transaction(function () use($request, $filename) {
        $request->user()->studentsignature()->update([
            'image_path' => $filename
        ]);
            });
        } catch (\Throwable $th) {
            throw $th;
        }
        return back()->with('success', 'Signature upload success!');
    }

}
