<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Activity;

class HistoryController extends Controller
{
    //
    public function getAllHistory ($id) {

        $histories = Activity::findorfail($id)->history()->orderBy('id', 'DESC')->get();

        return view('pages.editHistory')->with('histories' , $histories);
    }
}
