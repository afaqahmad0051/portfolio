@extends('admin.admin_master')
@section('admin')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">                            
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        <div class="col-6">
                        </div>
                    </div><hr>
                    @if (count($errors))
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                        @endforeach
                    @endif
                    <form action="{{ route('update.password') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Current Password:<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="password" name="oldpassword" id="oldpassword">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">New Password:<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="password" name="newpassword" id="newpassword">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Confirm Password:<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="password" name="confirm_password" id="confirm_password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <!-- end row -->
                            </div><hr>
                            <div class="col-md-6">                                
                            </div>
                            <div class="col-md-6">                                
                                <input type="submit" value="Update" class="btn btn-rounded btn-info waves-effect waves-light" style="float: right;">                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection