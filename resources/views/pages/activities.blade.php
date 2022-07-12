@extends('app')

@section('content')

<main class="dash-content">
    <div class="container-fluid">    
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
                        <div class="col-lg-12">
                            <p> <i class="fas fa-check-circle"></i> Completed &nbsp;&nbsp;&nbsp;
                                <i class="fas fa-hourglass-half"></i> Pending
                            </p>
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title">All Activties</div>
                                </div>
                                <div class="card-body ">
                                <table class="table table-striped table-in-card ">
                                        @if(count($activitiesAll) == 0 ) 
                                            <h2> No Recent Activities </h2>
                                        @endif
                                        @if(count($activitiesAll) > 0 ) 
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Activity</th>
                                                <th scope="col">Personnel</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $counter = 1;
                                            @endphp
                                            @foreach( $activitiesAll as $data )
                                                <tr>
                                                    <th scope="row"> {{ $counter++ }}</th>
                                                    <td scope="row"> {{ $data->created_at->diffForHumans() }}</td>
                                                    <td> {{ Str::limit($data->activity, 20) }} </td>
                                                    <td> {{ $data->user }} </td>
                                                    <td>
                                                        @if ($data->status ==  1)
                                                            <i class="fas fa-check-circle"></i>
                                                        @else
                                                            <i class="fas fa-hourglass-half"></i>
                                                        @endif
                                                    </td>
                                                    <td><a class="button bg-primary btn text-white" href="{{ route('getSingle' , ['id' => $data->id] ) }} "> View </a> </td>
                                                </tr>
                                            @endforeach        
                                        </tbody>
                                        @endif
                                    </table>
                                </div>
                            </div>
                            </div
                        </div>
                    </div>
                    <div class="pg mt-1"> {{ $activitiesAll->links() }} </div>
            </main>


@stop