@extends('admin.layout.main')
@section('title','Dashboard')
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
                        <h2 class="content-header-title float-start mb-0">Trang Chủ</h2>
                        <div class="breadcrumb-wrapper">

                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">

            </div>
        </div>
        <div class="content-body">
            <!-- search header -->

            <!-- frequently asked questions tabs pills -->
            <section id="faq-tabs">
                <!-- vertical tab pill -->
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="faq-navigation d-flex justify-content-between flex-column mb-2 mb-md-0">
                            <!-- pill tabs navigation -->


                            <!-- FAQ image -->
                            <img src="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/illustration/faq-illustrations.svg" class="img-fluid d-none d-md-block" alt="demand img" />
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <!-- pill tabs tab content -->
                        @if(Auth::check())
                        <div class="tab-content">
                            <!-- payment panel -->

                            <div class="col-12 text-center mt-4">
                                <h2>Xin Chào {{Auth::user()->name}}, bạn là {{Auth::user()->getRoleNames()->first()}} !</a></h2>
                                <p class="mb-3">
                                    Chào mừng bạn quay trở lại !
                                </p>
                                @error('msg')
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <!-- delivery panel -->
                        </div>
                        @else
                        <div class="tab-content">
                            <!-- payment panel -->

                            <div class="col-12 text-center mt-4">
                                <h2>Bạn chưa <a href="{{route('login')}}">đăng nhập</a></h2>
                                <p class="mb-3">
                                    Bạn cần đăng nhập để có thể sử dụng hệ thống của chúng tôi !
                                </p>
                            </div>
                            <!-- delivery panel -->
                        </div>
                        @endif
                    </div>
                </div>
            </section>
            <!-- / frequently asked questions tabs pills -->

            <!-- contact us -->

            <!--/ contact us -->

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection