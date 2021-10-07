@extends('admin.layout.main')
@section('title', 'User')
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
                        <h2 class="content-header-title float-start mb-0">Câu Hỏi</h2>
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
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Radio Button start -->
            <section id="basic-radio">
                <div class="row">
                    <div class="col-12">
                        @php $dem =1;@endphp
                        @foreach($model as $c)
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Question {{$dem++}} : {{$c->question}}     (2 point)</h4>
                            </div>
                            <div class="card-body">
                                <div class="demo--spacing">
                                    <div class="form-check form-check-inline mb-1">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked />
                                        <label class="form-check-label" for="inlineRadio1">1.&nbsp&nbsp{{$c->answer_1}}</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-1">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked />
                                        <label class="form-check-label" for="inlineRadio1">2.&nbsp&nbsp{{$c->answer_2}}</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-1">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked />
                                        <label class="form-check-label" for="inlineRadio1">3.&nbsp&nbsp{{$c->answer_3}}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked />
                                        <label class="form-check-label" for="inlineRadio1">4.&nbsp&nbsp{{$c->answer_4}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </section>
            <!-- Basic Radio Button end -->

        </div>
    </div>
</div>
@endsection