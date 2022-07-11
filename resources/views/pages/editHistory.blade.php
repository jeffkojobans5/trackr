@extends('app')

@section('content')


<main class="dash-content">
    <div class="container-fluid">
                    <div class="row dash-row">
                        <div class="col-xl-6">
                            <a href="{{ url()->previous() }}" type="button" class="btn btn-primary mb-1"><i class="fa fa-caret-left" aria-hidden="true"></i> Back </a>
                        </div>
                </div>
    </div>
    <div class="container-fluid ">
                    <div class="row dash-row">
                    <table class="table table-striped table-in-card">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="col-xl-6 p-3">
                                                        <span class="badge badge-pill badge-warning p-1">Edit 54</span>
                                                        <p> On Mon 23 September 2022 : 2 O'olock</p>
                                                        <p> Activity: Changed to completed </p>
                                                        <p> Editor: Bansah Jephthah </p>
                                                        <p> Status: <i class="fas fa-check-circle"></i> </p>
                                                        <p> Comments : </p>
                                                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, fuga at. Facere, iure. 
                                                            In cum, eaque et recusandae quibusdam beatae ullam vitae dolor sapiente 
                                                            magni doloribus voluptatem ea dolorum odio!</p>
                                                    </div>
                                                </td>                                                    
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="col-xl-6 p-3">
                                                        <span class="badge badge-pill badge-warning p-1">Edit 54</span>
                                                        <p> On Mon 23 September 2022 : 2 O'olock</p>
                                                        <p> Activity: Changed to completed </p>
                                                        <p> Editor: Bansah Jephthah </p>
                                                        <p> Status: <i class="fas fa-check-circle"></i> </p>
                                                        <p> Comments : </p>
                                                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, fuga at. Facere, iure. 
                                                            In cum, eaque et recusandae quibusdam beatae ullam vitae dolor sapiente 
                                                            magni doloribus voluptatem ea dolorum odio!</p>
                                                    </div>
                                                </td>                                                    
                                            </tr>
                                        </tbody>
                        </table>

                    </div>
    </div>
</main>

@stop