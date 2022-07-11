<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\History;
use RealRashid\SweetAlert\Facades\Alert;

class ActivitiesController extends Controller
{
    public function store (Request $request) {
        $validated = $request->validate([
            'activity' => 'required|min:5',
        ]);

        // create new activity
        $newAct = new Activity();

        // inserts request into DB
        $newAct->activity = $request->activity;
        $newAct->remarks = $request->remarks;
        $newAct->user = "kojo";

        // saves
        $saved = $newAct->save();

        // if saved shows a popup to show successfully saved
        if($saved){
            // create first History
            $newHistory = new History();
            // inserts request into DB
            $newHistory->activity = $request->activity;
            $newHistory->remarks = $request->remarks;
            $newHistory->user = "kojo";        
            $newHistory->save();
            Alert::success('Success', 'Your Activity is saved');
        }  

        return redirect('/')->with('status' , 'success');
    }


    public function index () {
        // fetch activity status for dashboard
        $activitiesThree = Activity::latest()->take(3)->get();
        $activitiesAll = Activity::all();
        $activitiesPending = Activity::where('status' , '=' , 0)->get();
        $activitiesComplete = Activity::where('status' , '=' , 1)->get();
        
        return view('pages.home')
        ->with('activitiesThree' , $activitiesThree)
        ->with('activitiesAll' , $activitiesAll)
        ->with('activitiesComplete' , $activitiesComplete)
        ->with('activitiesPending' , $activitiesPending);
    }    

    public function getSingle ($id) {
        $activity = Activity::findOrFail($id);
        return view('pages.activity')->with('activity' , $activity );
    }


    public function editSingle ($id) {
        $activity = Activity::findOrFail($id);
        return view('pages.activityEdit')->with('activity' , $activity );
    }


    public function updateSingle (Request $request , $id) {
        $validated = $request->validate([
            'activity' => 'required|min:5',
        ]);

        // finds activity
        $newAct = Activity::find($id);

        // updated request into DB
        $newAct->activity = $request->activity;
        $newAct->status = $request->status;
        $newAct->remarks = $request->remarks;
        $newAct->user = "kojo";

        // saves
        $saved = $newAct->save();

        if(count($newAct->getChanges()) == 0) {
            Alert::error('Error', 'Noting was updated');
            return redirect()->route('editSingle' , $id);
        }

        if(count($newAct->getChanges()) > 0) {
            Alert::success('Success', 'Your Activity has been updated');

            $changes = $newAct->getChanges();
            $insertHis = new History($changes);
            $insertHis->user = "kojo";
            $insertHis->save();
        }        



        return redirect()->route('getSingle' , $id);
    }

    // public function updateSingle (Request $request , $id) {
    //     $validated = $request->validate([
    //         'activity' => 'required|min:5',
    //     ]);

    //     // finds activity
    //     $newAct = Activity::find($id);

    //     // updated request into DB
    //     $newAct->activity = $request->activity;
    //     $newAct->status = $request->status;
    //     $newAct->remarks = $request->remarks;
    //     $newAct->user = "kojo";

    //     // saves
    //     $saved = $newAct->save();

    //     // if updated shows a popup to show successfully saved
    //     if($saved){
    //         Alert::success('Success', 'Your Activity has been updated');
    //     }  
    //     return redirect()->route('getSingle' , $id);
    // }



    public function allActivities () {
        // fetch activity status for dashboard
        $activitiesThree = Activity::latest()->take(3)->get();
        $activitiesAll = Activity::all();
        $activitiesPending = Activity::where('status' , '=' , 0)->get();
        $activitiesComplete = Activity::where('status' , '=' , 1)->get();
        
        return view('pages.activities')
        ->with('activitiesThree' , $activitiesThree)
        ->with('activitiesAll' , $activitiesAll)
        ->with('activitiesComplete' , $activitiesComplete)
        ->with('activitiesPending' , $activitiesPending);
    }  

    public function searchActivities () {
        return view('pages.searchActivities');
    }    





    



    


}
