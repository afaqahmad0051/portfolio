@extends('admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Contacts List</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Phone</th>
                        <th>Message Time</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($contact as $item)                            
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ isset($item->created_at)?date('d-m-Y', strtotime(trim(str_replace('/','-',$item->created_at)))):'' }}</td>
                                <td>
                                    <a href="{{ route('delete.contact.message', $item->id ) }}" class="btn btn-danger btn-sm" id="delete" title="Delete"><i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection