<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAnnouncementController extends Controller
{
    public function index(){
        return view('admin.announcement');
    }
}
