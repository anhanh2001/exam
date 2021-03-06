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
                                <h4 class="card-title">Th??m B??? C??u H???i</h4>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" action="{{route('file-import')}}" method="POST" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    <div class="mb-1">
                                        <label class="form-label">C??u H???i</label>
                                        <input type="file" name="file" id="docpicker" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" required />
                                        @error('file')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        @error('format')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Th??m B??? C??u H???i</button>
                                </form>
                            </div>
                            @if(session()->has('failures'))
                            <div class="card-body">
                                <h4 class="card-title">L???i khi th??m</h4>
                                <table class="user-list-table table" id="">
                                    <thead class="table-light">
                                        <tr>

                                            <th>H??ng</th>
                                            <th>Thu???c T??nh</th>
                                            <th>L???i</th>
                                            <th>Gi?? Tr???</th>
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
                            </div>
                            @endif
                            <div class="card-body" id="excel-data"></div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.3/xlsx.full.min.js"></script>
<script>
    var file = document.getElementById('docpicker')
    file.addEventListener('change', importFile);

    function importFile(evt) {
        var f = evt.target.files[0];

        if (f) {
            var r = new FileReader();
            r.onload = e => {
                var contents = processExcel(e.target.result);
                var obj = JSON.parse(contents);
                console.log(obj);
                var objj = obj.Sheet1;
                //display excel file
                var table_output = '<h4 class="card-tittle">D??? li???u s??? th??m :</h4><table class="table table-stripped table-bordered">'
                for (var row = 0; row < objj.length; row++) {
                    table_output += '<tr>';
                    for (var cell = 0; cell < objj[row].length; cell++) {
                        table_output += '<td>' + objj[row][cell] + '</td>';
                    }
                }
                table_output += '</table>';
                document.getElementById('excel-data').innerHTML = table_output;
            }
            r.readAsBinaryString(f);
        } else {
            console.log("Failed to load file");
        }
    }

    function processExcel(data) {
        var workbook = XLSX.read(data, {
            type: 'binary'
        });

        var firstSheet = workbook.SheetNames[0];
        var data = to_json(workbook);
        return data
    };

    function to_json(workbook) {
        var result = {};
        workbook.SheetNames.forEach(function(sheetName) {
            var roa = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName], {
                header: 1
            });
            if (roa.length) result[sheetName] = roa;
        });
        return JSON.stringify(result, 2, 2);
    };
</script>
@endsection