@extends('app')

@section('content')


<main class="dash-content">
    <div class="container-fluid">
                    <div class="row dash-row">
                        <div class="col-xl-6">
                           <a href={{ url()->previous() }}> <button type="button" class="btn btn-primary mb-1"><i class="fa fa-caret-left" aria-hidden="true"></i> Back </button> </a>
                        </div>
                        <div class="col-xl-6 d-flex justify-content-end">
                        </div>
                </div>
    </div>
    <div class="container-fluid ">
                    <div class="row dash-row">                        
                        <div class="col-xl-6 p-3">
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
                            <div class="card spur-card mt-5">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="spur-card-title"> Edit Activity </div>
                                </div>
                                <div class="card-body ">
                                        <!-- displays error -->
                                        @if (count($errors) > 0)
                                        <div class = "alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif     
                                        <!-- error -->                                    
                                    <form action="{{ route('updateSingle' , $activity->id ) }}" method="post">
                                        @method('PUT') 
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Activity</label>
                                            <input type="text" class="form-control" name="activity" value={{ $activity->activity }} placeholder="Daily SMS count in comparison to SMS count from logs">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Status</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="status">
                                                <option value=1 {{  ($activity->status === 1) ? 'selected' : null }} > Completed   </option>
                                                <option value=0 {{  ($activity->status === 0) ? 'selected' : null }} > Pending </option>
                                            </select>
                                        </div>                                        
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Remarks</label>
                                            <textarea class="form-control" id="remarks" name="remarks" rows="3"> {{ $activity->remarks }} </textarea>
                                        </div>
                                        <button type="submit" class="btn btn-warning">Edit </button>
                                    </form>
                                </div>
                            </div>
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