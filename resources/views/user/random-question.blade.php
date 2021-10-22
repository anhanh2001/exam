@extends('admin.layout.main')
@section('title', 'Question')
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
                        <h2 class="content-header-title float-start mb-0">Tùy Chọn Số Lượng Câu Hỏi</h2>
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Số Lượng Câu Hỏi (Tối đa {{$model}} câu)</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <form action="" method="post">
                                        @csrf
                                        <div class="mb-1">
                                            <input type="number" name="number" class="form-control">
                                        </div>
                                        @error('number')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="mb-1">
                                            <button type="submit" class="btn btn-primary">Làm Bài Thi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Radio Button end -->

        </div>
    </div>
</div>
@endsection