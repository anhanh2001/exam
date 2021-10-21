@extends('admin.layout.main')
@section('title', 'History')
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
        </div>
        <div class="content-body">
            <!-- Basic Radio Button start -->
            <section id="basic-radio">
                <div class="row">
                        <div class="col-12">
                            @foreach($model as $c)
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ngày Làm Bài : {{$c->created_at}}</h4>
                                </div>
                                <div class="card-body">
                                    @if($c->point < 5)
                                    <h4 class="card-title text-danger">Điểm : {{$c->point}}</h4>
                                    @else
                                    <h4 class="card-title text-success">Điểm : {{$c->point}}</h4>
                                    @endif
                                    <a href="{{route('history.detail',$c->id)}}" class="card-span btn btn-primary">Xem Chi Tiết</a>
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