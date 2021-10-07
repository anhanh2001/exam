@extends('admin.layout.main')
@section('title', 'User')
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sửa Nguời Dùng</h4>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" action="{{route('user.edit',$model->id)}}" method="POST" novalidate>
                                    @csrf
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-addon-name">Name</label>

                                        <input type="text" name="name" value="{{$model->name}}" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your name.</div>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-default-email1">Email</label>
                                        <input type="email" name="email" value="{{$model->email}}" id="basic-default-email1" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe@email.com" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid email</div>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-default-password1">Password</label>
                                        <input type="password" name="password" id="basic-default-password1" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your password.</div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Update User</button>
                                </form>
                            </div>
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