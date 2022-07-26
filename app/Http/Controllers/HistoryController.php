<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Activity;

class HistoryController extends Controller
{
    //
    public function getAllHistory ($id) {

        $histories = Activity::findorfail($id)->history()->orderBy('id', 'DESC')->paginate(5);

        return view('pages.editHistory')->with('histories' , $histories);
    }

    public function singleActEdit ($id) {

        $histories = History::findorfail($id);
        $activity  = Activity::findorfail($histories->activity_id);

        return view('pages.singleActEdit')->with('histories' , $histories)->with('activity' , $activity);
    }    


    
}
