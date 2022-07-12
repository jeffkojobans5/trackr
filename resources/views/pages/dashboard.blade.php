@extends('app')

@section('content')

@include('sweetalert::alert')

<main class="dash-content">
    <div class="container-fluid">
        <h3 id="my-section-1" class="content-anchor mb-3"> 
        <b> 
        @php
            $timestamp = date("Y-m-d") ;
            echo date("F jS, Y", strtotime($timestamp)); //September 30th, 2013
        @endphp
        </b></h3>
    </div>
    <div class="container-fluid">
        <h3 class="mt-5 mb-2"> Activities </h3>
        @php
            $counter = 1;
        @endphp
        @foreach ($todayAct as $data) 
            <p> {{ $counter++ }} At <b> {{ $data->created_at->format('H:i:s') }} </b> today  {{ $data->user }} created an <a href="{{ route('singleAct' , ['id' => $data->id] ) }}"     > activity </a>. </p>
        @endforeach
    </div>
    <div class="container-fluid mt-3">
        <h3 class="mt-5 mb-2"> Updates </h3>
        @php
            $counter = 1;
        @endphp
        @foreach ($edits as $data) 
            <p>  {{ $counter++ }} At <b> {{ $data->created_at->format('H:i:s') }} </b> today  {{ $data->user }} updated an <a href="{{ route('singleActEdit' , ['id' => $data->id] ) }}"     > activity </a>. </p>
        @endforeach
    </div>    
</main>
@stop