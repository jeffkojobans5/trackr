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

                        @if(count($histories) > 1)
                            <table class="table table-striped table-in-card">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- began loooping less one data from the back  --}}
                                            @for( $i = 0; $i < count($histories) - 1; $i++ )                                            
                                            <tr>
                                                <td>
                                                    <div class="col-xl-6 p-3">
                                                        <p> <b>Updated on :   {{ $histories[$i]->created_at->format('d-m-Y | H:i:s') }}  <br/> Editor: {{ $histories[$i]->user  }}   </b></p>
                                                        <span class="badge badge-pill badge-warning p-1">Edit {{ (count($histories) - 1) - $i }}</span>
                                                        <!-- check if activity is null || not -->
                                                        @if($histories[$i]->activity == NULL)
                                                        @else
                                                        <p> Changed Activity to : {{ $histories[$i]->activity  }}  </p>
                                                        <!-- end activity check  -->
                                                        @endif

                                                        <!-- check status is null || not -->
                                                        @if($histories[$i]->status == NULL)
                                                        @else
                                                        <p> Changed Status to : 
                                                            @if ($histories[$i]->status ==  1)
                                                                <i class="fas fa-check-circle"></i>
                                                            @else
                                                                <i class="fas fa-hourglass-half"></i>
                                                            @endif                                                                
                                                        </p>
                                                        @endif
                                                        <!-- end status check  -->

                                                        <!-- check if remark is null || not -->
                                                        @if($histories[$i]->remarks == NULL)
                                                        @else
                                                        <p> Changed Comments to : <br/>
                                                            {!! nl2br(e($histories[$i]->remarks)) !!}
                                                        </p>
                                                        <!-- end status check  -->
                                                        @endif
                                                    </div>
                                                </td>                                                    
                                            </tr>
                                            @endfor 
                                            
                                            {{-- inital activity here --}}
                                            <tr>
                                                <td>
                                                    <div class="col-xl-6 p-3">
                                                        <span class="badge badge-pill badge-success p-1">Created </span>
                                                        <p> <b>Created on :   {{ $histories[ count($histories) - 1]->created_at->format('d-m-Y | H:i:s') }}  <br/> Initially Created By: {{$histories[ count($histories) - 1]->user }}  </b></p>
                                                        <p> Initial Activity  : {{ $histories[ count($histories) - 1]->activity }} <br/>                                                        
                                                        <p> Initial Status  : 
                                                            @if ($histories[ count($histories) - 1]->status ==  1)
                                                                <i class="fas fa-check-circle"></i>
                                                            @else
                                                                <i class="fas fa-hourglass-half"></i>
                                                            @endif                                                                
                                                        </p>
                                                        <p> Initial Comments  : <br/>
                                                        {!! nl2br(e($histories[ count($histories) - 1]->remarks)) !!}
                                                        </p>
                                                    </div>
                                                </td>                                                    
                                            </tr>
                                        </tbody>
                            </table>
                        @else 
                            <h1> Sorry there no edits yet</h1>
                        @endif
                    </div>
                    <div class="pg mt-1"> {{ $histories->links() }} </div>
    </div>
</main>

@stop