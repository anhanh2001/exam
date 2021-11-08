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
        <div class="content-body">
            <!-- Basic Radio Button start -->
            <section id="basic-radio">
                <div class="row">
                    <form action="{{route('link')}}" method="post">
                        @csrf
                        <div class="col-12" id="1234">
                            <!-- list question in js below -->
                            <input type="hidden" id="totalPoint" name="totalPoint" value="">
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
<script src="{{asset('js/app.js')}}"></script>
<script>
    Echo.channel('question')
        .listen('GetQuestionEvent', (e) => {
            console.log(e);
            var dem =0;
            var totalPoint = 0;
            var table = '';
                e.question.map(function(x){
                    totalPoint += x.point_question;
                    table += `<div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Câu hỏi ${++dem} : ${x.question} (${x.point_question} point)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="demo--spacing">
                                        <div class="form-check form-check-inline mb-1">
                                            <input class="form-check-input" type="radio" name="question[${x.id}]" id="" value="1" />
                                            <label class="form-check-label" for="">1.&nbsp&nbsp${x.answer_1}</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-1">
                                            <input class="form-check-input" type="radio" name="question[${x.id}]" id="" value="2" />
                                            <label class="form-check-label" for="">2.&nbsp&nbsp${x.answer_2}</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-1">
                                            <input class="form-check-input" type="radio" name="question[${x.id}]" id="" value="3" />
                                            <label class="form-check-label" for="">3.&nbsp&nbsp${x.answer_3}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="question[${x.id}]" id="" value="4" />
                                            <label class="form-check-label" for="">4.&nbsp&nbsp${x.answer_4}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>`
                })
            $('#1234').append(table);
            $('#totalPoint').attr('value',totalPoint)
        })
</script>
@endsection