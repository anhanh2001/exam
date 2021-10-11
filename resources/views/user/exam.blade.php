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
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Radio Button start -->
            <section id="basic-radio">
                <div class="row">
                    <form action="{{route('multi',$id)}}" method="post">
                        @csrf
                        <div class="col-12">
                            @php $dem =1;@endphp
                            @foreach($model as $c)
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Câu hỏi {{$dem++}} : {{$c->question}} ({{$c->point_question}} point)</h4>
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
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary">Submit</button>
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
    $('form').on('submit', function() {
        var emptyCount = 0;
        $('.card').each(function() {
            var found = false;
            $(this).find('input[type=radio]').each(function() {
                if ($(this).prop('checked')) {
                    found = true;
                }
            });
            if (!found) {
                emptyCount++;
            }
        });
        if (emptyCount > 0) {
            toastr.error('Bạn Chưa Làm Đủ');
            return false;
        }
        return true;
    });
</script>
@endsection