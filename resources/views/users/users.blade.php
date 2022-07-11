@extends('app')

@section('content')

<main class="dash-content">
    <div class="container-fluid">
        <!-- <h3 id="my-section-1" class="content-anchor mb-3"> <b> <span id="greetings"></span> </b> Jeff, </h3> -->
                    <div class="row dash-row">
                        <div class="col-xl-4">
                            <div class="stats stats-primary">
                                <h3 class="stats-title"> All Users </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number">6</div>
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
                                <h3 class="stats-title"> Active Users </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number">4</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="stats stats-danger ">
                                <h3 class="stats-title"> Blocked Users </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="far fa-times"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number">4</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                                <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title">All Users</div>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-striped table-in-card">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>23rd September </td>
                                                <td> Jeff </td>
                                                <td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab  </td>
                                                <td> Jeff </td>
                                                <td><button type="button" class="btn btn-primary">Primary</button</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div
                    </div>
                </div>
            </main>
@stop