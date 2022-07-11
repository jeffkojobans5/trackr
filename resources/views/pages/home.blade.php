@extends('app')

@section('content')

@include('sweetalert::alert')

<main class="dash-content">
    <div class="container-fluid">
        <h3 id="my-section-1" class="content-anchor mb-3"> <b> <span id="greetings"></span> </b> Jeff, </h3>
                    <div class="row dash-row">
                        <div class="col-xl-4">
                            <div class="stats stats-primary">
                                <h3 class="stats-title"> Total Activities </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number"> {{ count($activitiesAll) }}</div>
                                        <div class="stats-change">
                                            <span class="stats-percentage"></span>
                                            <span class="stats-timeframe">Starting from March</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="stats stats-success ">
                                <h3 class="stats-title"> Completed Activities </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number"> {{ count($activitiesComplete ) }} </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="stats stats-danger">
                                <h3 class="stats-title"> Pending Activities </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="far fa-times"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number"> {{ count($activitiesPending ) }} </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="spur-card-title"> Add Activity </div>
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
                                    <form action="{{ route('createActivity') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Activity</label>
                                            <input type="text" class="form-control" name="activity" placeholder="Daily SMS count in comparison to SMS count from logs">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Remarks</label>
                                            <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title">Recently Added</div>
                                </div>
                                <div class="card-body py-5">
                                    <table class="table table-striped table-in-card ">
                                        @if(count($activitiesThree) == 0 ) 
                                            <h2> No Recent Activities </h2>
                                        @endif
                                        @if(count($activitiesThree) > 0 ) 
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Activity</th>
                                                <th scope="col">Added By</th>
                                                <th scope="col">View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach( $activitiesThree as $data )
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td> {{ Str::limit($data->activity, 5) }} </td>
                                                    <td> {{ $data->user }} </td>
                                                    <td><a class="button bg-primary btn text-white" href="{{ route('getSingle' , ['id' => $data->id] ) }} "> View </a> </td>
                                                </tr>
                                            @endforeach        
                                        </tbody>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
@stop