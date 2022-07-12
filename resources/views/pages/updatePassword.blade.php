@extends('app')

@section('content')


<main class="dash-content">
    <div class="container-fluid">
                    <div class="row dash-row">
                        <div class="col-xl-6">
                            <button type="button" class="btn btn-primary mb-1"><i class="fa fa-caret-left" aria-hidden="true"></i> Back </button>
                        </div>
                        <div class="col-xl-6 d-flex justify-content-end">
                        </div>
                    </div>  
    </div>
    <div class="container-fluid ">
                    <div class="row dash-row">
                        <div class="col-xl-6 p-3">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="spur-card-title"> Update Password </div>
                                </div>
                                <div class="card-body ">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Username</label>
                                            <input type="text" class="form-control" name="name" value="Jeff" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Old Password</label>
                                            <input type="password" class="form-control" name="oldpassword" value="Jeff" >
                                        </div>                                        
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">New Password</label>
                                            <input type="password" class="form-control" name="newpassword" value="Jeff" >
                                        </div>                                        
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Confirm New Password</label>
                                            <input type="password" class="form-control" name="confirmpassword" value="Jeff" >
                                        </div>                                        
                                        <button type="submit" class="btn btn-warning"> Update </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
{{-- </div> --}}

</main>

@stop