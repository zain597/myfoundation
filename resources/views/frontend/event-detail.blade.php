@extends('frontend.layouts.app')
@section('title')
    Event Detail
@endsection
@section('css')
    <style>
        
    </style>
@endsection
@section('content')
    <div class="event-detail">
        <div class="container-fluid">
            @inject('carbon', 'Carbon\Carbon')
            <div class="event">
                <h1>{{$event->title}}</h1>
                <h4>{{ $carbon::parse($event->start_date)->format('F d, Y') }} @ {{ $carbon::parse($event->start_range)->format('g:i A') }} - {{ $carbon::parse($event->end_range)->format('g:i A') }}</h4>
                <p style="width: 80%">
                    {{$event->desc}}
                </p>
                <div class="event-detail-about">
                    <div class="col-md-3 col-sm-12 divs">
                        <h3>DETAILS</h3>
                        <h4>Date:</h4>
                        <h5>{{ $carbon::parse($event->start_date)->format('M') }} {{ $carbon::parse($event->start_date)->format('d') }}</h5>
                        
                        <h4>Time:</h4>
                        <h5>{{ $carbon::parse($event->start_range)->format('g:i A') }} - {{ $carbon::parse($event->end_range)->format('g:i A') }}</h5>
                    </div>
                    <div class="col-md-3 col-sm-12 divs">
                        <h3>ORGANISER:</h3>
                        <h3>Mohebban Al-Mahdi Youth Foundation</h3>
                        <h4>Phone:</h4>
                        <h5>090078601</h5>
                        <h4>Email:</h4>
                        <h5>chair@myfoundation.org.uk</h5>
                    </div>
                    <div class="col-md-3 col-sm-12 divs">
                        <h3>VENUE:</h3>
                        <h3>Mohebban Al-Mahdi Youth Foundation</h3>
                        <p>
                            {{$event->location}}
                        </p>
                        <h4>Email:</h4>
                        <h5>chair@myfoundation.org.uk</h5>

                    </div>
                    <div class="col-md-3 col-sm-12 divs" id="map-container"  >
                        <div class="map" id="my-iframe">
                            {!! $event->embededlocation !!}
                        </div>
                    </div>
                
                    
                </div>
            </div>
            
            
        </div>
    </div>
@endsection