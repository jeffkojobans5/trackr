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
                            <p> <span class="act"> <i class="fa fa-user-edit" aria-hidden="true"></i>  Created By: </span> {{ $activity->user }} </p>
                            <p> <span class="act"> <i class="fa fa-calendar-alt" aria-hidden="true"></i> Date : </span> {{ $activity->created_at->format('d-m-Y') }}  </p>
                            <p> <span class="act"> <i class="fa fa-clock" aria-hidden="true"></i>  Time: </span>  {{ $activity->created_at->format('H:i:s') }}  </p>
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
                                        {{ $activity->remarks }}
                                    </div>
                                @else
                                    <p> <span class="act"> <i class="fa fa-pen" aria-hidden="true"></i> No Comments yet </span> </p>
                                @endif                            
                        </div>
                        <div class="col-xl-6 p-3">
                            <p> <b>Updated on :   {{ $histories[0]->created_at->format('d-m-Y | H:i:s') }}  <br/> Editor: {{ $histories[0]->user  }}   </b></p>
                            <span class="badge badge-pill badge-warning p-1">Edit {{ (count($histories) - 1)  }}</span>
                            <!-- check if activity is null || not -->
                            @if($histories[0]->activity == NULL)
                            @else
                            <p> Changed Activity to : {{ $histories[0]->activity  }}  </p>
                            <!-- end activity check  -->
                            @endif

                            <!-- check status is null || not -->
                            @if($histories[0]->status == NULL)
                            @else
                            <p> Changed Status to : 
                                @if ($histories[0]->status ==  1)
                                    <i class="fas fa-check-circle"></i>
                                @else
                                    <i class="fas fa-hourglass-half"></i>
                                @endif                                                                
                            </p>
                            @endif
                            <!-- end status check  -->

                            <!-- check if remark is null || not -->
                            @if($histories[0]->remarks == NULL)
                            @else
                            <p> Changed Comments to : <br/>
                                {{ $histories[0]->remarks }}
                            </p>
                            <!-- end status check  -->
                            @endif
                        </div>
                    </div>
    </div>

</main>

@stop