@extends('frontend.layouts.app')
@section('title')
    events
@endsection
@section('css')
    <style>
        
    </style>
@endsection
@section('content')

    <div class="events-all">
        <div class="container-fluid col-xl-12 ">
            @inject('carbon', 'Carbon\Carbon')
            @foreach ($events as $event)
                <div class="all">
                    <div class="date">
                        <h3>{{ $carbon::parse($event->start_date)->format('M') }}</h3>
                        <h1><a href="{{ route('event.detail', ['id' => $event->id]) }}">{{ $carbon::parse($event->start_date)->format('d') }}</a></h1>
                    </div>
                    <div class="event">
                        <h3>{{ $carbon::parse($event->start_date)->format('F d, Y') }}&nbsp; @ &nbsp;{{ $carbon::parse($event->start_range)->format('g:i A') }} - {{ $carbon::parse($event->end_range)->format('g:i A') }}</h3>
                        <h1><a href="{{ route('event.detail', ['id' => $event->id]) }}">{{$event->title}}</a></h1>
                        <h4 class="location">Hyderi Islamic Centre <span class="locationAddress">6 Pioneer Place, Croydon</span></h4>
                        <p>{{$event->desc}} </p>
                    </div>
                </div>
            @endforeach
            
            
            
        </div>
    </div>

@endsection