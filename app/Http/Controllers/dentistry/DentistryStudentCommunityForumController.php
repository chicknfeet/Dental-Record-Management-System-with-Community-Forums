<?php

namespace App\Http\Controllers\dentistry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DentistryStudentCommunityForumController extends Controller
{
    public function index(){
        return view('dentistry.communityforum.communityforum');
    }
}
