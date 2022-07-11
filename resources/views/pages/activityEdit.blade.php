@extends('app')

@section('content')


<main class="dash-content">
    <div class="container-fluid">
                    <div class="row dash-row">
                        <div class="col-xl-6">
                           <a href={{ url()->previous() }}> <button type="button" class="btn btn-primary mb-1"><i class="fa fa-caret-left" aria-hidden="true"></i> Back </button> </a>
                        </div>
                        <div class="col-xl-6 d-flex justify-content-end">
                            <button type="button" class="btn btn-warning mb-1"> Edit History <i class="fa fa-eye" aria-hidden="true"></i>  </button>
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
                            <div class="alert alert-primary" role="alert"> Most recent Edits <span class="badge badge-pill badge-warning">Edit 54</span></div>
                            <p> On Mon 23 September 2022 : 2 O'olock</p>
                            <p> Activity: Changed to completed </p>
                            <p> Editor: Bansah Jephthah </p>
                            <p> Status: <i class="fas fa-check-circle"></i> </p>
                            <p> Comments : </p>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, fuga at. Facere, iure. 
                                In cum, eaque et recusandae quibusdam beatae ullam vitae dolor sapiente 
                                magni doloribus voluptatem ea dolorum odio!</p>
                        </div>


                        

                    </div>
    </div>

</main>

@stop