@extends('admin.admin_master')
@section('admin')
    <div class="row">
        <div class="col-lg-6">
            <div class="card"><br><br>
                <center>
                    <img class="rounded-circle avatar-xl" src="{{asset('backend/assets/images/small/img-5.jpg')}}" alt="Card image cap">
                </center>
                <div class="card-body">
                    <h4 class="card-title">Username: {{ $adminData->username }}</h4>                    
                    <hr>
                    <h4 class="card-title">Name: {{ $adminData->name }}</h4>                    
                    <hr>
                    <h4 class="card-title">Email: {{ $adminData->email }}</h4>                   
                    <hr>
                    <a href="{{ route('edit.profile') }}" class="btn btn-rounded btn-info waves-effect waves-light">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection