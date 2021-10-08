@extends('admin.layout.main')
@section('title', 'Result')
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
                        <h2 class="content-header-title float-start mb-0">Kết Quả | Bạn được {{$result}}/10 điểm</h2>
                        <!-- <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Form Elements</a>
                                </li>
                                <li class="breadcrumb-item active">Câu Hỏi
                                </li>
                            </ol>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Radio Button start -->
            <section id="basic-radio">
                <div class="row">

                    <div class="col-12">
                        @php $dem =1;@endphp
                        @foreach($question as $c)
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Câu hỏi {{$dem++}} : {{$c->question}} ({{$c->point_question}} point)</h4>
                            </div>
                            <div class="card-body">
                                <div class="demo--spacing">
                                    @if($c->current_answer==$c->correct_answer)
                                    <div class="form-check form-check-success mb-1">
                                        <input disabled class="form-check-input" type="radio" @if($c->current_answer ==1) checked @endif id="inlineRadio1" value="1" />
                                        <label class="form-check-label" for="inlineRadio1">1.&nbsp&nbsp{{$c->answer_1}}</label>
                                    </div>
                                    @else
                                    @if($c->correct_answer==1)
                                    <div class="form-check form-check-success mb-1">
                                        <input disabled class="form-check-input" type="radio"  checked  id="inlineRadio1" value="1" />
                                        <label class="form-check-label" for="inlineRadio1">1.&nbsp&nbsp{{$c->answer_1}}</label>
                                    </div>
                                    @else
                                    <div class="form-check form-check-danger mb-1">
                                        <input disabled class="form-check-input" type="radio" @if($c->current_answer ==1) checked @endif id="inlineRadio1" value="1" />
                                        <label class="form-check-label" for="inlineRadio1">1.&nbsp&nbsp{{$c->answer_1}}</label>
                                    </div>
                                    @endif
                                    @endif
                                    @if($c->current_answer==$c->correct_answer)
                                    <div class="form-check form-check-success mb-1">
                                        <input disabled class="form-check-input" type="radio" @if($c->current_answer ==2) checked @endif id="inlineRadio1" value="1" />
                                        <label class="form-check-label" for="inlineRadio1">2.&nbsp&nbsp{{$c->answer_2}}</label>
                                    </div>
                                    @else
                                    @if($c->correct_answer==2)
                                    <div class="form-check form-check-success mb-1">
                                        <input disabled class="form-check-input" type="radio"  checked  id="inlineRadio1" value="1" />
                                        <label class="form-check-label" for="inlineRadio1">2.&nbsp&nbsp{{$c->answer_2}}</label>
                                    </div>
                                    @else
                                    <div class="form-check form-check-danger mb-1">
                                        <input disabled class="form-check-input" type="radio" @if($c->current_answer ==2) checked @endif id="inlineRadio1" value="1" />
                                        <label class="form-check-label" for="inlineRadio1">2.&nbsp&nbsp{{$c->answer_2}}</label>
                                    </div>
                                    @endif
                                    @endif
                                    @if($c->current_answer==$c->correct_answer)
                                    <div class="form-check form-check-success mb-1">
                                        <input disabled class="form-check-input" type="radio" @if($c->current_answer ==3) checked @endif id="inlineRadio1" value="1" />
                                        <label class="form-check-label" for="inlineRadio1">3.&nbsp&nbsp{{$c->answer_3}}</label>
                                    </div>
                                    @else
                                    @if($c->correct_answer==3)
                                    <div class="form-check form-check-success mb-1">
                                        <input disabled class="form-check-input" type="radio"  checked  id="inlineRadio1" value="1" />
                                        <label class="form-check-label" for="inlineRadio1">3.&nbsp&nbsp{{$c->answer_3}}</label>
                                    </div>
                                    @else
                                    <div class="form-check form-check-danger mb-1">
                                        <input disabled class="form-check-input" type="radio" @if($c->current_answer ==3) checked @endif id="inlineRadio1" value="1" />
                                        <label class="form-check-label" for="inlineRadio1">3.&nbsp&nbsp{{$c->answer_3}}</label>
                                    </div>
                                    @endif
                                    @endif
                                    @if($c->current_answer==$c->correct_answer)
                                    <div class="form-check form-check-success mb-1">
                                        <input disabled class="form-check-input" type="radio" @if($c->current_answer ==4) checked @endif id="inlineRadio1" value="1" />
                                        <label class="form-check-label" for="inlineRadio1">4.&nbsp&nbsp{{$c->answer_4}}</label>
                                    </div>
                                    @else
                                    @if($c->correct_answer==4)
                                    <div class="form-check form-check-success mb-1">
                                        <input disabled class="form-check-input" type="radio"  checked  id="inlineRadio1" value="1" />
                                        <label class="form-check-label" for="inlineRadio1">4.&nbsp&nbsp{{$c->answer_4}}</label>
                                    </div>
                                    @else
                                    <div class="form-check form-check-danger mb-1">
                                        <input disabled class="form-check-input" type="radio" @if($c->current_answer ==4) checked @endif id="inlineRadio1" value="1" />
                                        <label class="form-check-label" for="inlineRadio1">4.&nbsp&nbsp{{$c->answer_4}}</label>
                                    </div>
                                    @endif
                                    @endif


                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </section>
            <!-- Basic Radio Button end -->

        </div>
    </div>
</div>
@endsection