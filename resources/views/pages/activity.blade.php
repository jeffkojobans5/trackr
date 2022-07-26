@extends('app')

@section('content')

<main class="dash-content">
    <div class="container-fluid">
                    <div class="row dash-row">
                        <div class="col-xl-6">
                            <a href={{ route('editSingle' , $activity->id ) }}  class="btn btn-primary mb-1"><i class="fa fa-user-edit" aria-hidden="true"></i> Edit Activity</a>
                        </div>
                        <div class="col-xl-6 d-flex justify-content-end">
                            <a href="{{ route('getAllHistory' , $activity->id ) }}" class="btn btn-warning mb-1"> Edit History <i class="fa fa-eye" aria-hidden="true"></i>  </a>
                        </div>
                </div>
    </div>
    <div class="container-fluid ">
                    <div class="row dash-row">
                        <div class="col-xl-6 p-3">
                            <div class="alert alert-success" role="alert"><span class="act"> <i class="fa fa-book" aria-hidden="true"></i> Activity: </span>  {{ $activity->activity }} </div>                                                        
                            <p> <span class="act"> <i class="fa fa-user-edit" aria-hidden="true"></i>  
                            @if(count($histories) < 1)
                                Created By: 
                            @else
                                Updated By:
                            @endif
                            </span> {{ $activity->user }} </p>
                            <p> <span class="act"> <i class="fa fa-calendar-alt" aria-hidden="true"></i> Date : </span> {{ $activity->updated_at->format('d-m-Y') }}  </p>
                            <p> <span class="act"> <i class="fa fa-clock" aria-hidden="true"></i>  Time: </span>  {{ $activity->updated_at->format('H:i:s') }}  </p>
                            <p> <span class="act"> <i class="fa fa-monitor-heart-rate" aria-hidden="true"></i> 
                            Status: 
                                @if ($activity->status ==  1)
                                    <i class="fas fa-check-circle"></i>
                                @else
                                    <i class="fas fa-hourglass-half"></i>
                                @endif
                            </p>
                                @if ($activity->remarks)
                                    <p> <span class="act"> <i class="fa fa-pen" aria-hidden="true"></i> Comments: </span> </p>
                                    <div class="activity-comments">
                                        {!! nl2br(e($activity->remarks)) !!}
                                    </div>
                                @else
                                    <p> <span class="act"> <i class="fa fa-pen" aria-hidden="true"></i> No Comments yet </span> </p>
                                @endif                            
                        </div>
                    </div>
    </div>

</main>

@stop