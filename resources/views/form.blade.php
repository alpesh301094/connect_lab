@extends('layouts.master')
@section('content')
    <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Employee List</h4>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <!-- table responsive -->
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-info m-r-30 float-right" id="addModel">Add</button>
                                <div class="table-responsive m-t-40">
                                    <table id="employee-table" class="table display table-bordered table-striped no-wrap">
                                        <thead>
                                            <tr>
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>Email</th>
                                                <th>Mobile Number</th>
                                                <th>Profile</th>
                                                <th>DOB</th>
                                                <th>Company Name</th>
                                                <th>Company Site</th>
                                                <th>Company Description</th>
                                                <th>Designation</th>
                                                <th>Interview Date</th>
                                                <th>Interview Type</th>
                                                <th>Skill</th>
                                                <th>Created Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
            </div>
            <div class="modal bs-example-modal-lg" id="employeeModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Add Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="row" id="validation">
                                <div class="col-12">
                                    <div class="card wizard-content">
                                        <div class="card-body">
                                            <form action="#" class="validation-wizard wizard-circle" id="employee-form" enctype="multipart/form-data">
                                                <!-- Step 1 -->
                                                @csrf
                                                <h6>Step 1</h6>
                                                <section>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="first_name"> First Name : <span class="danger">*</span> </label>
                                                                <input type="text" class="form-control required" id="first_name" name="first_name"> </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="last_name"> Last Name : <span class="danger">*</span> </label>
                                                                <input type="text" class="form-control required" id="last_name" name="last_name"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email"> Email Address : <span class="danger">*</span> </label>
                                                                <input type="email" class="form-control required" id="email" name="email"> </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="mobile_number">Mobile Number :</label>
                                                                <input type="tel" class="form-control" id="mobile_number" name="mobile_number"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="profile"> Profile : </label>
                                                                <input type="file" class="form-control" id="profile" name="profile" accept="image/*">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="dob">Date of Birth :</label>
                                                                <input type="date" class="form-control" id="dob" name="dob"> </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <!-- Step 2 -->
                                                <h6>Step 2</h6>
                                                <section>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="company_name">Company Name :</label>
                                                                <input type="text" class="form-control required" id="company_name" name="company_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="company_site">Company URL :</label>
                                                                <input type="url" class="form-control required" id="company_site" name="company_site"> </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="company_description">Short Description :</label>
                                                                <textarea name="company_description" id="company_description" rows="6" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <!-- Step 3 -->
                                                <h6>Step 3</h6>
                                                <section>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="designation">Interview For :</label>
                                                                <input type="text" class="form-control required" id="designation" name="designation"> </div>
                                                            <div class="form-group">
                                                                <label for="interview_type">Interview Type :</label>
                                                                <select class="custom-select form-control required" id="interview_type" data-placeholder="Type to search cities" name="interview_type">
                                                                    <option value="Normal">Normal</option>
                                                                    <option value="Difficult">Difficult</option>
                                                                    <option value="Hard">Hard</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="interview_date">Interview Date :</label>
                                                                <input type="date" class="form-control required" id="interview_date" name="interview_date">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Skills :</label>
                                                                <br>
                                                                @foreach ($skills as $key => $skill)
                                                                    <input type="checkbox" name="skill[]" value="{{$skill}}"> {{$skill}} <br>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#dob').attr('max', maxDate);
            $('#interview_date').attr('min', maxDate);
        })
        $('#employee-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{route('home')}}",
            order: [[14, 'desc']],
            columns: [
                {
                    target: 0, 
                    data: 'first_name'
                },
                {
                    target: 1, 
                    data: 'last_name'
                },
                {
                    target: 2, 
                    data: 'email'
                },
                {
                    target: 3, 
                    data: 'mobile_number'
                },
                {
                    target: 4, 
                    data: 'profile',
                    orderable : false,
                    searchable : false,
                    render:function(data, type, row){
                        if(row.profile){
                            return '<image src="'+row.profile_path+'" alt="Profile" class="img-circle" width="100">';
                        }else{
                            return "";
                        }
                    }
                },
                {
                    target: 5, 
                    data: 'dob'
                },
                {
                    target: 6, 
                    data: 'company_name'
                },
                {
                    target: 7, 
                    data: 'company_site'
                },
                {
                    target: 8, 
                    data: 'company_description'
                },
                {
                    target: 9, 
                    data: 'designation'
                },
                {
                    target: 10, 
                    data: 'interview_date'
                },
                {
                    target: 11, 
                    data: 'interview_type'
                },
                {
                    target: 12, 
                    data: 'skill'
                },
                {
                    target: 13, 
                    data: 'created_at'
                },
                {
                    target: 14, 
                    data: 'id',
                    orderable:true,
                    searchable:false,
                    visible:false
                },
            ]
        });
        //Custom design form example
        var form = $(".validation-wizard").show();

        $(".validation-wizard").steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Submit"
            },
            onStepChanging: function (event, currentIndex, newIndex) {
                return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
            },
            onFinishing: function (event, currentIndex) {
                return form.validate().settings.ignore = ":disabled", form.valid()
            },
            onFinished: function (event, currentIndex) {
                var data = new FormData( $( '#employee-form' )[ 0 ] );
                $.ajax({
                    type : "POST",
                    url : "{{route('add-employee')}}",
                    data : data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType : "JSON",
                    success:function(res){
                        console.log(res);
                        if(res.status == true){
                            $("#employeeModel").modal('hide');
                            Swal.fire("Success!", res.message, "success");
                            $('#employee-form')[0].reset();
                            $('#employee-table').DataTable().ajax.reload();
                        }else{
                            Swal.fire("Failed!", res.message, "error");
                        }
                    }
                })
                // Swal.fire("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
            }
        }), $(".validation-wizard").validate({
            ignore: "input[type=hidden]",
            errorClass: "text-danger",
            successClass: "text-success",
            highlight: function (element, errorClass) {
                $(element).removeClass(errorClass)
            },
            unhighlight: function (element, errorClass) {
                $(element).removeClass(errorClass)
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element)
            },
            rules: {
                email: {
                    email: !0
                }
            }
        })

        $(document).on('click','#addModel',function(){
            $("#employee-form").validate().resetForm();
            $("#employeeModel").modal('show');
        })
    </script>
@endsection