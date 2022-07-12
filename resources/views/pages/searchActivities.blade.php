@extends('app')

@section('content')

<main class="dash-content">
    <div class="container-fluid">
        <!-- <h3 id="my-section-1" class="content-anchor mb-3"> <b> <span id="greetings"></span> </b> Jeff, </h3> -->
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
                            <div class="card spur-card">
                                <div class="card-header bg-white ">
                                    <form action="{{ route('searchActivities') }}" method="get" class="container py-3 row" >
                                            <div class="col-xl-4">
                                                <label for="startDate"> Start Date</label>
                                                <input type="date" name="start_date" class="form-control" id="">
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="startDate"> End Date</label>
                                                <input type="date" name="end_date" class="form-control" id="">
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="startDate"> Search</label>
                                                <button type="submit" class="btn btn-secondary btn-md btn-block"> Search </button>
                                            </div>
                                    </form>       
                                </div>
                                <div class="card-body py-5">
                                    <table class="table table-striped table-in-card">
                                        @if(count($activitiesFilter) == 0 ) 
                                            <h2> No Recent Activities </h2>
                                        @endif
                                        @if(count($activitiesFilter) > 0 )                                         
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Personnel</th>
                                                <th scope="col">Actiivty</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $counter = 1;
                                            @endphp
                                            @foreach( $activitiesFilter as $data )
                                            <tr>
                                                <th scope="row"> {{ $counter++ }} </th>
                                                <td> {{ $data->created_at->format('d-m-Y | H:i:s') }}</td>
                                                <td> {{ $data->user }} </td>
                                                <td> {{ $data->activity }}  </td>
                                                <td> {{ $data->user }} </td>
                                                <td><a href class="btn btn-primary">Primary</a></td>
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
            </main>
@stop