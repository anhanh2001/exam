@extends('admin.layout.main')
@section('title', 'Exam')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <input type="hidden" id="timeCheck" value="{{$timeStart}}">
                        @if($timeStart == 'none')
                        <h2 class="content-header-title float-start mb-0">Câu Hỏi</h2>
                        @else
                        <h2 class="content-header-title float-start mb-0" id="demo"></h2>
                        @endif
                    </div>
                </div>
            </div>
            <!-- <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <h2 class="text-danger" id="clock"></h2>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="content-body" hidden>
            <!-- Basic Radio Button start -->
            <section id="basic-radio">
                <div class="row">
                    <form action="{{route('link')}}" method="post">
                        @csrf
                        <div class="col-12">
                            @php $dem =0;$totalPoint=0;@endphp
                            @foreach($model as $c)
                            @php
                            $totalPoint += $c->point_question;
                            @endphp
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Câu hỏi {{++$dem}} : {{$c->question}} ({{$c->point_question}} point)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="demo--spacing">
                                        <div class="form-check form-check-inline mb-1">
                                            <input class="form-check-input" type="radio" name="question[{{$c->id}}]" id="" value="1" />
                                            <label class="form-check-label" for="">1.&nbsp&nbsp{{$c->answer_1}}</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-1">
                                            <input class="form-check-input" type="radio" name="question[{{$c->id}}]" id="" value="2" />
                                            <label class="form-check-label" for="">2.&nbsp&nbsp{{$c->answer_2}}</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-1">
                                            <input class="form-check-input" type="radio" name="question[{{$c->id}}]" id="" value="3" />
                                            <label class="form-check-label" for="">3.&nbsp&nbsp{{$c->answer_3}}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="question[{{$c->id}}]" id="" value="4" />
                                            <label class="form-check-label" for="">4.&nbsp&nbsp{{$c->answer_4}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <input type="hidden" name="totalPoint" value="{{$totalPoint}}">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </section>
            <!-- Basic Radio Button end -->

        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    // function startTimer(duration, display) {
    //     var timer = duration,
    //         minutes, seconds;
    //     var countDown = setInterval(function() {
    //         minutes = parseInt(timer / 60, 10);
    //         seconds = parseInt(timer % 60, 10);

    //         minutes = minutes < 10 ? "0" + minutes : minutes;
    //         seconds = seconds < 10 ? "0" + seconds : seconds;

    //         display.text(minutes + ":" + seconds);

    //         if (--timer < 0) {
    //             clearInterval(countDown);
    //             $('form').submit();

    //         }
    //     }, 1000);
    // }

    // jQuery(function($) {
    //     // Tính thời gian bài thi
    //     var totalQuestion = document.getElementById('total-time').value*60;
    //     var display = $('#clock');
    //     startTimer(totalQuestion, display);
    // });
    // Set the date we're counting down to
    var a = document.getElementById('timeCheck');
    if (a.value != 'none') {
        var countDownDate = new Date(a.value).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = "Bài thi sẽ bắt đầu sau : " + days + "ngày " + hours + "giờ " +
                minutes + "phút " + seconds + "giây ";

            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "Câu Hỏi";
                $('.content-body').attr('hidden',false);
            }
        }, 1000);
    }
    else{
        $('.content-body').attr('hidden',false);
    }
</script>
@endsection