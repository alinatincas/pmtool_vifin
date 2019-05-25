@extends('layouts.app')

@section('content')
    <section class="content">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Employees</h2>    
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#empModal" data-action="Create">Create Employee</button>
                </div>
            </div> 
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Employee Id</th>
                            <th>Employee Name</th>
                            <th>Department</th>
                            <th>Hired date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $emp)
                        <tr>
                            <td>{{ $emp->id }}</td>
                            <td>{{ $emp->first_name }} {{ $emp->lastname_name }}</td>
                            <td>{{ $emp->department }}</td>
                            <td>{{ $emp->doj }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#empModal" data-action="Show">
                                        <i class="fa fa-search" data-toggle="tooltip"></i>
                                    </a>
                                    <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#empModal" data-action="Edit" data-emp="{{$emp}}">
                                        <i class="fa fa-edit" data-toggle="tooltip"></i>
                                    </a>
                                    <form class="form-inline" method="post" action="{{route('employees.destroy',$emp)}}" onsubmit="return confirm('Are you sure you want to delete the employee?')">
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>   
        </div>  

        <!-- New Employees Modal Window -->
        <div class="modal fade" id="empModal" tableindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="employeeForm" role="form">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <input type="hidden" class="form-control" id="actionType" name="actionType">
                            <div class="form-group">
                                <label for="id">Employee Id:</label>
                                <input type="hidden" class="form-control" id="id" name="id">
                                <span class="text-danger"><strong id="empno"></strong></span>
                            </div>
                            <div class="form-group">
                                <label for="lastname_name">Last name:</label>
                                <input type="text" class="form-control" id="lastname_name" name="lastname_name">
                                <span class="text-danger"><strong id="lastname_name-error"></strong></span>
                            </div>
                            <div class="form-group">
                                <label for="department">Department:</label>
                                <input type="text" class="form-control" id="department" name="department">
                                <span class="text-danger"><strong id="department-error"></strong></span>
                            </div>
                            <div class="form-group">
                                <label for="doj">Hired-date:</label>
                                <input type="date" class="form-control" id="doj" name="doj">
                                <span class="text-danger"><strong id="doj-error"></strong></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="submitForm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $('#empModal').on('show.bs.modal',function(e)){
            var actionButton = $(e.relatedTarget)
            var actionType = actionButton.data('action')
            var id = document.getElementById("id")

            var first_name = document.getElementById("first_name")
            var lastname_name = document.getElementById("lastname_name")
            var department = document.getElementById("department")
            var doj = document.getElementById("doj")

            $('#empno').html("");
            $('#first_name-error').html("");
            $('#lastname_name-error').html("");
            $('#department-error').html("");
            $('#doj-error').html("");

            var modal = $(this)
            modal.find('.modal-title').text(actionType + ' Employee')
            submitForm.style.display="block"
            document.getElementById("actionType").value=actionType

            if(actionType == 'Edit' ||actionType =='Show'){
                var emp =actionButton.data('emp')
                id.value = emp.id
                first_name.value = emp.first_name
                lastname_name.value = emp.lastname_name
                department.value = emp.department
                doj.value = emp.doj

                $('#empno').html(emp.id)
            }
            else{
                id.value = null;
                document.getElementById('employeeForm').reset()
            }
            if(actionType =='Show'){
                submitForm.style.display="none"
        }

        $('body').on('click', '#submitForm', function(e){
            e.preventDefault();
            var employeeForm = $("#employeeForm");
            var formData = employeeForm.serialize();
            $('#first_name-error').html("");
            $('#lastname_name-error').html("");
            $('#department-error').html("");
            $('#doj-error').html("");

            $.ajax({
                url:'/employees',
                type:'POST',
                data:formData,
                success: function(data){
                    console.log(data);
                    $('#empModal').modal('hide');
                    window.location.href="/employees";
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR.status);
                    date=jqXHR.responseJSON;
                    if(data.errors){
                        if(data.errors.first_name){
                            $('#first_name-error').html(data.errors.first_name[0]);
                        }
                        if(data.errors.lastname_name){
                            $('#lastname_name-error').html(data.errors.lastname_name[0]);
                        }
                        if(data.errors.department_name){
                            $('#department-error').html(data.errors.department_name[0]);
                        }
                        if(data.errors.doj_name){
                            $('#doj-error').html(data.errors.doj_name[0]);
                        }
                    }
                }
            });
        });

    </script>

@endsection