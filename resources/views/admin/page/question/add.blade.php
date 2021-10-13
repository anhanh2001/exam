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
                                <h4 class="card-title">Thêm Câu Hỏi</h4>
                                <a  class="btn btn-primary " href="{{route('file-import-export')}}">Thêm Bộ Câu Hỏi</a>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" action="{{route('question.add')}}" method="POST" novalidate>
                                    @csrf
                                    <div class="mb-1">
                                        <label class="form-label" >Câu Hỏi</label>

                                        <input type="text" value="{{old('question')}}" name="question" id="basic-addon-name" class="form-control" placeholder="Câu Hỏi" aria-label="Name" aria-describedby="basic-addon-name" required />
                                        @error('question')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" >Đáp Án 1</label>

                                        <input type="text" value="{{old('answer_1')}}" name="answer_1" id="basic-addon-name" class="form-control" placeholder="Đáp Án 1" aria-label="Name" aria-describedby="basic-addon-name" required />
                                        @error('answer_1')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" >Đáp án 2</label>

                                        <input type="text" value="{{old('answer_2')}}" name="answer_2" id="basic-addon-name" class="form-control" placeholder="Đáp Án 2" aria-label="Name" aria-describedby="basic-addon-name" required />
                                        @error('answer_2')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" >Đáp án 3</label>

                                        <input type="text" value="{{old('answer_3')}}" name="answer_3" id="basic-addon-name" class="form-control" placeholder="Đáp Án 3" aria-label="Name" aria-describedby="basic-addon-name" required />
                                        @error('answer_3')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" >Đáp Án 4</label>

                                        <input type="text" value="{{old('answer_4')}}" name="answer_4" id="basic-addon-name" class="form-control" placeholder="Đáp Án 4" aria-label="Name" aria-describedby="basic-addon-name" required />
                                        @error('answer_4')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <h4 class="mt-2 pt-50">Đáp Án Đúng</h4>
                                        <div class="table-responsive">
                                            <table class="table table-flush-spacing">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Đáp án 1</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" value="1" name="correct_answer" type="radio" id="userManagementRead" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Đáp án 2</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" value="2" name="correct_answer" type="radio" id="userManagementRead" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Đáp án 3</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" value="3" name="correct_answer" type="radio" id="userManagementRead" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Đáp án 4</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" value="4" name="correct_answer" type="radio" id="userManagementRead" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @error('correct_answer')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" >Điểm Câu Hỏi</label>
                                        <input type="number" value="{{old('point_question')}}" name="point_question" id="basic-addon-name" class="form-control" placeholder="2 điểm" aria-label="Name" aria-describedby="basic-addon-name" required />
                                        @error('point_question')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Thêm Câu Hỏi</button>
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