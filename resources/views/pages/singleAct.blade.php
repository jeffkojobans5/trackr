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
                                                <td>
                                                    <div class="col-xl-6 p-3">
                                                        <span class="badge badge-pill badge-success p-1">Created </span>
                                                        <p> <b>Created on :   {{ $histories->created_at->format('d-m-Y | H:i:s') }}  <br/> Initially Created By: {{$histories->user }}  </b></p>
                                                        <p> Initial Activity  : {{ $histories->activity }} <br/>                                                        
                                                        <p> Initial Status  : 
                                                            @if ($histories->status ==  1)
                                                                <i class="fas fa-check-circle"></i>
                                                            @else
                                                                <i class="fas fa-hourglass-half"></i>
                                                            @endif                                                                
                                                        </p>
                                                        <p> Initial Comments  : <br/>
                                                            {{ $histories->remarks }}
                                                        </p>
                                                    </div>
                                                </td>                                                    
                                            </tr>
                                        </tbody>
                            </table>
                    </div>
    </div>
</main>

@stop