<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateAnnouncement extends Controller
{
    public $designation = array('Dean' => 'Dean', 'Program Head' => 'Program Head', 'Registrar' => 'Registrar', 'Evaluator' => 'Evaluator', 'Professor' => 'Professor', 'Web Admin/MIS Coordinator' => 'Web Admin/MIS Coordinator');

    public function index(){
        $designationlist = $this->designation;
        return view('admin.create-announcement', compact('designationlist'));
    }

    public function store(Request $request){
        $request['design'] = $this->designation;
        $this->validate($request, [
            'lastName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'firstName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'designation' => 'required|in_array:design.*',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'type' => 'required'
        ],
        [
            'lastName.required' => 'Lastname is required',
            'firstName.required' => 'Firstname is required',
            'designation.required' => 'Designation is required',
            'title.required' => 'Title is required',
            'body.required' => 'Body is required.',
            'type.required' => 'Type is required.'
        ]);

        try {
            DB::transaction(function () use($request) {
                $name = $request->firstName." ".$request->lastName;
                $announcement = new Announcement([
                    'author' => $name,
                    'position' => $request->designation,
                    'title' => $request->title,
                    'body' => $request->body,
                    'announcement_type' => $request->type
                ]);
                
                $announcement->save();
            });
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect()->route('announcement')->with('message', 'Announcement created successfully!');

    }
}
