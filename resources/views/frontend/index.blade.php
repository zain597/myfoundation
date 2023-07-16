@extends('frontend.layouts.app')
@section('title')
    Myfoundation
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

    <style>
        .mrq .news, marquee{
            display: inline-block;
            background: rgb(255, 255, 255);
            /* width: fit-content; */
            padding: 10px
        }.mrq .news{
            background: #000;
            color: #ffdf;
            /* width: 5%; */
            padding: ;
            min-width: 5%;
        }
        marquee{
            width: 90%;
        }
        .mrq{
            margin-top:1rem;
            font-family: 'Gill Sans', 'Gill Sans MT', 'Trebuchet MS', sans-serif;
            padding: 0;
            margin-left: 5%;
            width: 90%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            vertical-align: middle;
            /* display: inline; */
            border: 2px solid black
        }
        .cal{
            display: flex;
            justify-content: space-between;
            padding-top: 5vh;
        }
        .fc-time{
            visibility: hidden;
        }
        .modal{
            backdrop-filter: blur(3px) !important;
        }
        .custom-modal{
            background-color: #ccb56b !important;
        }
        .upcoming_event{
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .upcoming_event .event_day h3, .upcoming_event .event_name h3{
            font-size: 16px;
            color: gray;
        }
        .upcoming_event .event_day h1{
            font-size: 30px;
        }
        .upcoming_event .event_name h1{
            font-size: 25px;
        }
        @media (max-width: 768px) {
            #calendar {
                width: 100%;
                height: auto;
            }
            .fc-toolbar.fc-header-toolbar 
            {
                font-size: 60%
            }
        }
    </style>
@endpush
@section('content')

<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content custom-modal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
            <button type="button" id="closeButton" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="padding:1px;font-weight:bold;font-size:20px">&times;</span>
            </button>
            
        </div>
        <div class="modal-body">
            <label for="title" class="text-dark">Title:</label>
            <input type="text" class="form-control" id="title" >
            <label for="desc" class="text-dark">Description:</label>
            <input type="textarea" class="form-control" id="desc" >
            <span id="titleError" class="text-danger"></span>
            <div class="mt-2">
                <label for="start_range" class="text-dark" >Start Time:</label>
                <input type="time" id="start_range" name="start_range">
                <label for="end_range" class="text-dark">End Time:</label>
                <input type="time" id="end_range" name="end_range">
            </div>
            <input type="text" id="location-input" name="location" placeholder="Enter location">
            <div id="map"></div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
          <button type="button" id="saveBtn" class="btn btn-warning">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="slider_text ">
                            <span>Myfoundation</span>
                            <h3> PLEASE DONATE AND SUPPORT MUHARRAM 2023</h3>
                            <p>With so much to consume and such little time, coming up <br>
                                with relevant title ideas is essential</p>
                            <a href="About.html" class="boxed-btn3">Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- slider_area_end -->
    <section class="d-flex flex-column p-5">
        <div class="mrq">
            <div class="news">News</div>
            <marquee direction="left">
                A Guide on adding Hyderi Events to your Calendar &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  Imam Reza (AS) Hardship Fund
            </marquee>
        </div>
        <div class="cal d-flex flex-wrap">
            <div class="sm col-md-3 d-flex flex-column pt-2 pb-2 text-center ">
                <h3 style="padding: 10px 2px;font-size: xx-large; color: #C09400; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; border-top: 1px solid black;border-bottom: 1px solid black;">UPCOMING EVENTS</h3 >
                    @foreach ($timings as $time)
                        @inject('carbon', 'Carbon\Carbon')
                        <div class="upcoming_event">
                            <div class="event_day">
                                <h3 id="eventMonth">{{ $carbon::parse($time->start_date)->format('M') }}</h3>
                                <h1 id="eventDay">{{ $carbon::parse($time->start_date)->format('d') }}</h1>
                            </div>
                            <div class="event_name">
                                <h3 id="eventRange">{{ $carbon::parse($time->start_range)->format('g:i A') }} - {{ $carbon::parse($time->end_range)->format('g:i A') }}</h3>
                                <h1 id="eventTitle">{{$time->title}}</h1>
                            </div>
                        </div>
                    @endforeach
                    <h5 style="color: #C09400;text-align:left;cursor:pointer"><a href="{{route('event.all')}}">View Calendar</a></h5>

            </div>
            <div class="lg col-md-5 col-sm-12 pt-2 pb-2 text-center">
                <h3 style="padding: 10px 2px;font-size: xx-large   ; color: #C09400; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; border-top: 1px solid black;border-bottom: 1px solid black;">ISLAMIC CALENDAR</h3 >
                    <div id="calendar">


                    </div>
            </div>
            <div class="sm col-md-3 pt-2 pb-2 text-center">
               <h3 style="padding: 10px 2px;font-size: xx-large    ; color: #C09400; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; border-top: 1px solid black;border-bottom: 1px solid black;">SALAAT TIMINGS</h3 > 
                <div>
                    <h3 id="todayDay"></h3>
                    <table width="100%" class="table table-bordered table-lg">
                        <tbody>
                            <tr >
                                <td>Fajr</td>
                                <td id="fajr"></td>
                            </tr>
                            <tr>
                                <td>Dhuhr</td>
                                <td id="dhuhr"></td>
                            </tr>
                            <tr>
                                <td>Asr</td>
                                <td id="asr"></td>
                            </tr>
                            <tr>
                                <td>Maghrib</td>
                                <td id="maghrib"></td>
                            </tr>
                            <tr>
                                <td>Isha</td>
                                <td id="isha"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    
    <div class="latest_activites_area">
        <div class=" video_bg_1 video_activite  d-flex align-items-center justify-content-center">
            <a class="popup-video" href="https://www.youtube.com/watch?v=MG3jGHnBVQs">
                <i class="flaticon-ui"></i>
            </a>
        </div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-7">
                    <div class="activites_info">
                        <div class="section_title">
                            <h3> <span>Watch Our Latest  </span><br>
                                Activities</h3>
                        </div>
                        <p class="para_1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do 
                            eiusmod tempor incididunt  ut labore dolore magna aliqua. 
                            enim minim veniam, quis nostrud exercitation.</p class="para_1">
                        <p class="para_2">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do 
                            eiusmod tempor incididunt  ut labore dolore magna aliqua. 
                            enim minim veniam, quis nostrud exercitation. tempor 
                            incididunt  ut labore dolore magna aliqua. enim minim 
                            veniam, quis nostrud exercitation.</p>
                        <a href="#" data-scroll-nav='1' class="boxed-btn4">Donate Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- latest_activites_area_end  -->

    <!-- popular_causes_area_start  -->
    <div class="popular_causes_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>Popular Causes</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="causes_active owl-carousel">
                        <div class="single_cause">
                            <div class="thumb">
                                <img src={{asset('frontend/img/card-img.jpg')}} alt="">
                            </div>
                            <div class="causes_content">
                                <h4>Jumuah (Friday) Prayers</h4>
                                <p>The passage is attributed to an 
                                    unknown typesetter in the century 
                                    who is thought</p>
                            </div>
                        </div>
                        <div class="single_cause">
                            <div class="thumb">
                                <img src={{asset('frontend/img/causes/2.png')}} alt="">
                            </div>
                            <div class="causes_content">
                                <h4>Islamic Madressah (School)</h4>
                                <p>The passage is attributed to an 
                                    unknown typesetter in the century 
                                    who is thought
                                </p>
                            </div>
                        </div>
                        <div class="single_cause">
                            <div class="thumb">
                                <img src={{asset('frontend/img/causes/3.png')}} >
                            </div>
                            <div class="causes_content">
                                <h4>Regular Islamic Programming</h4>
                                <p>The passage is attributed to an 
                                    unknown typesetter in the century 
                                    who is thought
                                </p>
                            </div>
                        </div>
                        <div class="single_cause">
                            <div class="thumb">
                                <img src={{asset('frontend/img/causes/1.png')}}  alt="">
                            </div>
                            <div class="causes_content">
                                <h4>Youth Programs</h4>
                                <p>The passage is attributed to an 
                                    unknown typesetter in the century 
                                    who is thought
                                </p>
                            </div>
                        </div>
                        
                        <div class="single_cause">
                            <div class="thumb">
                                <img src={{asset('frontend/img/causes/3.png')}} >
                            </div>
                            <div class="causes_content">
                                <h4>Funeral Services</h4>
                                <p>The passage is attributed to an 
                                    unknown typesetter in the century 
                                    who is thought
                                </p>
                            </div>
                        </div>
                        <div class="single_cause">
                            <div class="thumb">
                                <img src={{asset('frontend/img/causes/3.png')}} >
                            </div>
                            <div class="causes_content">
                                <h4>Sports & Recreation</h4>
                                <p>The passage is attributed to an 
                                    unknown typesetter in the century 
                                    who is thought
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_causes_area_end  -->

    <!-- counter_area_start  -->
    <div class="counter_area">
        <div class="container">
            <div class="counter_bg overlay">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="single_counter d-flex align-items-center justify-content-center">
                            <div class="icon">
                                <i class="flaticon-calendar"></i>
                            </div>
                            <div class="events">
                                <h3 class="counter">120</h3>
                                <p>Finished Event</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_counter d-flex align-items-center justify-content-center">
                            <div class="icon">
                                <i class="flaticon-heart-beat"></i>
                            </div>
                            <div class="events">
                                <h3 class="counter">120</h3>
                                <p>Finished Event</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_counter d-flex align-items-center justify-content-center">
                            <div class="icon">
                                <i class="flaticon-in-love"></i>
                            </div>
                            <div class="events">
                                <h3 class="counter">120</h3>
                                <p>Finished Event</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_counter d-flex align-items-center justify-content-center">
                            <div class="icon">
                                <i class="flaticon-hug"></i>
                            </div>
                            <div class="events">
                                <h3 class="counter">120</h3>
                                <p>Finished Event</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter_area_end  -->

    <!-- our_volunteer_area_start  -->
    <div class="our_volunteer_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>Our Volunteer</span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single_volenteer">
                        <div class="volenteer_thumb">
                            <img src={{asset('frontend/img/volenteer/1.png')}}  alt="">
                        </div>
                        <div class="voolenteer_info d-flex align-items-end">
                            <div class="social_links">
                                <ul>
                                    <li>
                                        <a href="#"> <i class="fa fa-facebook"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-pinterest"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-linkedin"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-twitter"></i> </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="info_inner">
                                <h4>Sakil khan</h4>
                                <p>Donner</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_volenteer">
                        <div class="volenteer_thumb">
                            <img src={{asset('frontend/img/volenteer/2.png')}}  alt="">
                        </div>
                        <div class="voolenteer_info d-flex align-items-end">
                            <div class="social_links">
                                <ul>
                                    <li>
                                        <a href="#"> <i class="fa fa-facebook"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-pinterest"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-linkedin"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-twitter"></i> </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="info_inner">
                                <h4>Emran Ahmed</h4>
                                <p>Volunteer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_volenteer">
                        <div class="volenteer_thumb">
                            <img src={{asset('frontend/img/volenteer/3.png')}}  alt="">
                        </div>
                        <div class="voolenteer_info d-flex align-items-end">
                            <div class="social_links">
                                <ul>
                                    <li>
                                        <a href="#"> <i class="fa fa-facebook"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-pinterest"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-linkedin"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-twitter"></i> </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="info_inner">
                                <h4>Sabbir Ahmed</h4>
                                <p>Volunteer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our_volunteer_area_end  -->

    <!-- news__area_start  -->
    <div class="news__area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>News & Updates</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="news_active owl-carousel">
                        <div class="single__blog d-flex align-items-center">
                            <div class="thum">
                                <img src={{asset('frontend/img/news/1.png')}}  alt="">
                            </div>
                            <div class="newsinfo">
                                <span>July 18, 2019</span>
                                <a href="single-blog.html">
                                    <h3>Pure Water Is More 
                                        Essential</h3>
                                </a>
                                <p>The passage experienced a 
                                    surge in popularity during the 
                                    1960s when used it on their  
                                    sheets, and again.</p>
                                <a class="read_more" href="single-blog.html">Read More</a>
                            </div>
                        </div>
                        <div class="single__blog d-flex align-items-center">
                            <div class="thum">
                                <img src={{asset('frontend/img/news/2.png')}}  alt="">
                            </div>
                            <div class="newsinfo">
                                <span>July 18, 2019</span>
                                <a href="single-blog.html">
                                    <h3>Pure Water Is More 
                                        Essential</h3>
                                </a>
                                <p>The passage experienced a 
                                    surge in popularity during the 
                                    1960s when used it on their  
                                    sheets, and again.</p>
                                <a class="read_more" href="single-blog.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news__area_end  -->

    <div data-scroll-index='1' class="make_donation_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>Make a Donation</span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="#" class="donation_form">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="single_amount">
                                    <div class="input_field">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon1">$</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="40,200" aria-label="Username" aria-describedby="basic-addon1">
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="single_amount">
                                   <div class="fixed_donat d-flex align-items-center justify-content-between">
                                       <div class="select_prise">
                                           <h4>Select Amount:</h4>
                                       </div>
                                        <div class="single_doonate"> 
                                            <input type="radio" id="blns_1" name="radio-group" checked>
                                            <label for="blns_1">10</label>
                                        </div>
                                        <div class="single_doonate"> 
                                            <input type="radio" id="blns_2" name="radio-group" checked>
                                            <label for="blns_2">30</label>
                                        </div>
                                        <div class="single_doonate"> 
                                            <input type="radio" id="Other" name="radio-group" checked>
                                            <label for="Other">Other</label>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="donate_now_btn text-center">
                        <a href="#" class="boxed-btn4">Donate Now</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var booking = @json($events);


            $('#calendar').fullCalendar({
                header:{
                    left : 'prev, next today',
                    center : 'title',
                    right : 'month, agendaWeek, agendaDay'
                },
                
                events: booking,
                selectable: true,
                selectHelper: true,
                defaultView: 'month',
                aspectRatio: 1.35,
                scrollTime: '08:00:00', // Adjust this value to set the initial scroll position
                scrollable: true,
                select: function(start, end, allDays){
                    $('#bookingModal').modal('toggle');

                    $('#saveBtn').click(function() { 
                        var title = $('#title').val();
                        var start_date = moment(start).format('YYYY-MM-DD');
                        var end_date = moment(end).format('YYYY-MM-DD');
                        var start_range = $('#start_range').val();
                        var end_range = $('#end_range').val();
                        var desc = $('#desc').val();


                        $.ajax({
                            url: "{{route('calendar.event.store')}}",
                            type: "POST",
                            dataType: 'json',
                            data: { title, start_date, end_date, start_range, end_range, desc},
                            success:function(response)
                            {
                                $('#bookingModal').modal('hide')
                                $('#calendar').fullCalendar('renderEvent', {
                                    'title': response.title,
                                    'start' : response.start,
                                    'end'  : response.end,
                                    'color' : response.color
                                });

                            },
                            error:function(error)
                            {
                                if(error.responseJSON.errors) {
                                    $('#titleError').html(error.responseJSON.errors.title);
                                }
                            },
                        });
                        
                    });
                },
                editable:true,
                eventDrop: function(event){
                    var id = event.id;
                    var start_date = moment(event.start).format('YYYY-MM-DD');
                    var end_date = moment(event.end).format('YYYY-MM-DD');
                    $.ajax({
                        url: "{{route('calendar.event.update', '')}}"+'/'+ id,
                        type: "PATCH",
                        dataType: 'json',
                        data: {start_date, end_date },
                        success:function(response)
                        {
                            swal('Good job','Event Updated!','success')

                        },
                        error:function(error)
                        {
                            console.log(error);
                        },
                    });
                },
                //for event delete
                eventClick: function(event){
                    var id = event.id;

                    if(confirm('Are you sure, you want to delete the event')){
                       
                        $.ajax({
                            url: "{{route('calendar.event.delete', '')}}"+'/'+ id,
                            type: "DELETE",
                            dataType: 'json',
                            success:function(response)
                            {
                                $('#calendar').fullCalendar('removeEvents', response)
                                swal('Good job','Event Deleted!','success')

                            },
                            error:function(error)
                            {
                                console.log(error);
                            },
                        });
                    }
                    
                },
                //disabling multiple event system
                selectAllow: function(event){
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                },
            });
            $("#bookingModal").on("hidden.bs.modal", function(){
                $('#saveBtn').unbind();
            });
            $('.fc-event').css('font-size','13px');
            $('.fc-event').css('border-radius','10%');
            $('.fc-event').css('border','1px solid goldenrod');
            // $('.fc').css('background-color','#f5f5f5');

            var apiEndpoint = 'https://api.aladhan.com/v1/timingsByCity';
            var cityName = 'Lahore';
            var countryName = 'Pakistan';

            // var cityName = 'London';
            // var countryName = 'United Kingdom';

            $.ajax({
                url: apiEndpoint,
                type: 'GET',
                dataType: 'json',
                data: {
                city: cityName,
                country: countryName,
                method: 2 // Method 2 represents the Islamic Society of North America (ISNA) method for calculation
                },
                success: function(response) {
                    var timings = response.data.timings;

                    // Access individual Salah timings
                    var fajrTime = timings.Fajr;
                    var dhuhrTime = timings.Dhuhr;
                    var asrTime = timings.Asr;
                    var maghribTime = timings.Maghrib;
                    var ishaTime = timings.Isha;

                    // Display Salah timings
                    $('#fajr').text(fajrTime); 
                    $('#dhuhr').text(dhuhrTime); 
                    $('#asr').text(asrTime); 
                    $('#maghrib').text(maghribTime); 
                    $('#isha').text(ishaTime); 
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
            const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            const months = [
                'January', 'February', 'March', 'April', 'May', 'June', 'July',
                'August', 'September', 'October', 'November', 'December'
            ];

            const today = new Date();
            const dayOfWeek = today.getDay();
            const currentMonth = today.getMonth() + 1; // Adding 1 since getMonth() returns zero-based month (0-11)
            const currentDay = today.getDate();
            const currentMonthIndex = today.getMonth();
            const currentMonthName = months[currentMonthIndex];
            var todayDay = daysOfWeek[dayOfWeek]+' '+currentMonthName+' '+currentDay;
            $('#todayDay').text(todayDay); 

           
        });
            
            






        

    </script>
@endpush