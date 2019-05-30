@extends('layouts.app')

@section('content')
<div class="employees-vifin">
    <div class="row top-head-vifin-col p-3 {{ Request::segment(1) === 'employees' ? 'active' : null  }}">
        <div class="col-1 top-head-text-col">
            <a href="/employees">
                <i class="fas fa-users icon-home-vifin-head"></i>
            </a>
        </div>
        <div class="col-11">
            <a href="/employees">
                <h4>EMPLOYEES</h>
            </a>
        </div>
    </div>
    <div class="content">
    
        @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif


        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Employees</h2>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#empModal" data-action="Create" >Create Employee</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Employee Id</th>
                            <th>Employee Name</th>
                            <th>Department</th>
                            <th>Hired Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $emp)
                        <tr>
                            <td>{{ $emp->id }}</td>
                            <td>{{ $emp->first_name }} {{ $emp->lastname_name }}</td>
                            <td>{{ $emp->department }}</td>
                            <td>{{ $emp->doj }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#empModal" data-action="Show" data-emp="{{$emp}}">
                                        <i class="fas fa-search" data-toggle="tooltip"></i>
                                    </a>
                                    <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#empModal" data-action="Edit" data-emp="{{$emp}}">
                                        <i class="fas fa-edit" data-toggle="tooltip"></i>
                                    </a>
                                    <form class="form-inline" method="post" action="{{route('employees.destroy',$emp) }}" 
                                    onsubmit="return confirm('Are You Sure to Delete the Employee?')">
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
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

        <!--New Employee Modal Window -->
        <div class="modal fade" id="empModal" tableindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                     <form id="employeeForm" role="form"> {{-- form needs to be replaced --}}
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            <input type="hidden" class="form-control" id="actionType" name="actionType">
                            <div class="form-group">
                                <label for="id">Employee Id: </label>
                                <input type="hidden" class="form-control" id="id" name="id">
                                <span class="text-danger"><strong id="empno"></strong></span>
                            </div> 
                            <div class="form-group">
                                <label for="first_name">First Name: </label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                                <span class="text-danger"><strong id="first_name-error"></strong></span>
                            </div>
                            <div class="form-group">
                                <label for="lastname_name">Last Name: </label>
                                <input type="text" class="form-control" id="lastname_name" name="lastname_name">
                                <span class="text-danger"><strong id="lastname_name-error"></strong></span>
                            </div>
                            <div class="form-group">
                                <label for="department">department: </label>
                                <input type="text" class="form-control" id="department" name="department">
                                <span class="text-danger"><strong id="department-error"></strong></span>
                            </div>
                            <div class="form-group">
                                <label for="doj">Hired Date: </label>
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
    </div>
</div> 

@endsection

@section('script')

    $('#empModal').on('show.bs.modal',function(e){
        var actionButton = $(e.relatedTarget)
        var actionType = actionButton.data('action')
        var id = document.getElementById("id")
        var first_name =  document.getElementById("first_name")      
        var lastname_name=  document.getElementById("lastname_name")
        var department=  document.getElementById("department")
        var doj=  document.getElementById("doj")

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
            var emp = actionButton.data('emp')
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

    })

    $('body').on('click','#submitForm', function(e){
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
                data=jqXHR.responseJSON;
                if(data.errors){
                    if(data.errors.first_name){
                        $('#first_name-error').html(data.errors.first_name[0]);
                    }
                    if(data.errors.lastname_name){
                        $('#lastname_name-error').html(data.errors.lastname_name[0]);
                    }
                    if(data.errors.department){
                        $('#department-error').html(data.errors.department[0]);
                    }
                    if(data.errors.doj){
                        $('#doj-error').html(data.errors.doj[0]);
                    }
                }
            }

        });
    });

@endsection