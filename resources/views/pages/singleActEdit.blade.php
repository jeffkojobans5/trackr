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
                                            {{-- inital activity here --}}
                                            <tr>
                                                <td>
                                                    <div class="col-xl-6 p-3">
                                                        <p> <b>Updated on :   {{ $histories->created_at->format('d-m-Y | H:i:s') }}  <br/> Editor: {{ $histories->user  }}   </b></p>
                                                        <!-- check if activity is null || not -->
                                                        @if($histories->activity == NULL)
                                                        @else
                                                        <p> Changed Activity to : {{ $histories->activity  }}  </p>
                                                        <!-- end activity check  -->
                                                        @endif

                                                        <!-- check status is null || not -->
                                                        @if($histories->status == NULL)
                                                        @else
                                                        <p> Changed Status to : 
                                                            @if ($histories->status ==  1)
                                                                <i class="fas fa-check-circle"></i>
                                                            @else
                                                                <i class="fas fa-hourglass-half"></i>
                                                            @endif                                                                
                                                        </p>
                                                        @endif
                                                        <!-- end status check  -->

                                                        <!-- check if remark is null || not -->
                                                        @if($histories->remarks == NULL)
                                                        @else
                                                        <p> Changed Comments to : <br/>
                                                            {{ $histories->remarks }}
                                                        </p>
                                                        <!-- end status check  -->
                                                        @endif
                                                    </div>
                                                </td>                                                    
                                            </tr>
                                        </tbody>
                            </table>
                    </div>
    </div>
</main>

@stop