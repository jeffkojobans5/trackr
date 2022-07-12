<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\History;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

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
        $newAct->user = Auth::user()->name;

        // saves
        $saved = $newAct->save();

        // if saved shows a popup to show successfully saved
        if($saved){
            // create first History
            $newHistory = new History();
            // inserts request into DB
            $newHistory->activity = $request->activity;
            $newHistory->remarks = $request->remarks;
            $newHistory->user = Auth::user()->name;  
            $newHistory->act = 1;  
            $newHistory->activity_id = $newAct->id;  
            $newHistory->save();
            Alert::success('Success', 'Your Activity is saved');
        }  

        return redirect('/addActivity')->with('status' , 'success');
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
        $histories = Activity::findorfail($id)->history()->orderBy('id', 'DESC')->get();

        return view('pages.activity')->with('activity' , $activity)->with('histories' , $histories);
    }


    public function editSingle ($id) {
        $activity = Activity::findOrFail($id);
        $histories = Activity::findorfail($id)->history()->orderBy('id', 'DESC')->get();

        return view('pages.activityEdit')->with('activity' , $activity)->with('histories' , $histories);
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
        $newAct->user = Auth::user()->name;

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
            $insertHis->user = Auth::user->name;
            $insertHis->activity_id = $id;  
            $insertHis->save();
        }        
        return redirect()->route('getSingle' , $id);
    }

    public function allActivities () {
        // fetch activity status for dashboard
        $activitiesThree = Activity::latest()->take(3)->get();
        $activitiesAll = Activity::paginate(10);
        $activitiesPending = Activity::where('status' , '=' , 0)->get();
        $activitiesComplete = Activity::where('status' , '=' , 1)->get();
        
        return view('pages.activities')
        ->with('activitiesThree' , $activitiesThree)
        ->with('activitiesAll' , $activitiesAll)
        ->with('activitiesComplete' , $activitiesComplete)
        ->with('activitiesPending' , $activitiesPending);
    }  

    public function searchActivities (Request $request) {
        $activitiesFilter = Activity::whereBetween('created_at', [$request->get('start_date'), $request->get('end_date')])->get();

        $activitiesThree = Activity::latest()->take(3)->get();
        $activitiesAll = Activity::all();
        $activitiesPending = Activity::where('status' , '=' , 0)->get();
        $activitiesComplete = Activity::where('status' , '=' , 1)->get();
        
        return view('pages.searchActivities')
        ->with('activitiesThree' , $activitiesThree)
        ->with('activitiesAll' , $activitiesAll)
        ->with('activitiesComplete' , $activitiesComplete)
        ->with('activitiesPending' , $activitiesPending)
        ->with('activitiesFilter', $activitiesFilter);
    }    

    public function dashboard () {
        $activitiesThree = Activity::latest()->take(3)->get();
        $todayAct = Activity::whereDate('created_at', Carbon::today())->orderBy('id', 'DESC')->get();
        $edits = History::where('act' , '=' , null)->orderBy('id', 'DESC')->get();

        return view('pages.dashboard')->with('todayAct' , $todayAct)->with('edits' , $edits);
    } 


    
    public function singleAct ($id) {

        $histories = Activity::findorfail($id);

        return view('pages.singleAct')->with('histories' , $histories);
    }        






    



    


}
