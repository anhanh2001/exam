@extends('admin.layout.main')
@section('title', 'Question')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <!-- users list start -->
            <section class="app-user-list">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">21,459</h3>
                                    <span>Total Users</span>
                                </div>
                                <div class="avatar bg-light-primary p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">4,567</h3>
                                    <span>Paid Users</span>
                                </div>
                                <div class="avatar bg-light-danger p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user-plus" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">19,860</h3>
                                    <span>Active Users</span>
                                </div>
                                <div class="avatar bg-light-success p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user-check" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">237</h3>
                                    <span>Pending Users</span>
                                </div>
                                <div class="avatar bg-light-warning p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user-x" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- list and filter start -->
                <div class="card">
                    <div class="col-md-12 col-12">
                        <div class="card ">
                            <div class="card-header">
                                <h4 class="card-title">Thêm Bộ Câu Hỏi</h4>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" action="{{route('file-import')}}" method="POST" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    <div class="mb-1">
                                        <label class="form-label">Câu Hỏi</label>
                                        <input type="file" name="file" id="basic-addon-name" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" required />
                                        @error('file')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Thêm Bộ Câu Hỏi</button>
                                </form>
                            </div>
                            @if(session()->has('failures'))
                            <table class="user-list-table table" id="">
                                <thead class="table-light">
                                    <tr>

                                        <th>Hàng</th>
                                        <th>Thuộc Tính</th>
                                        <th>Lỗi</th>
                                        <th>Giá Trị</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(session()->get('failures') as $validation)
                                    <tr>
                                        <td class="text-danger">{{$validation->row()}}</td>
                                        <td class="text-danger">{{$validation->attribute()}}</td>
                                        <td class="text-danger">
                                            <ul>
                                                @foreach($validation->errors() as $e)
                                                <li class="text-danger">{{$e}}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td class="text-danger">{{$validation->values()[$validation->attribute()]}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                    <!-- Modal to add new user starts-->

                    <!-- Modal to add new user Ends-->


                </div>
                <!-- list and filter end -->
            </section>
            <!-- users list ends -->

        </div>
    </div>
</div>


@endsection
@section('script')
@endsection