@extends('admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">About Images</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Image</th>
                        <th>Entry Date</th>
                        <th>Edit Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($allMultiImage as $item)                            
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <img src="{{ asset($item->multi_image) }}" style="width: 60px; height:60px;">
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ isset($item->updated_at)?$item->updated_at:'' }}</td>
                                <td>
                                    <a href="{{ route('edit.about.images', $item->id ) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i> </a>
                                    <a href="{{ route('delete.about.images', $item->id ) }}" class="btn btn-danger btn-sm" id="delete" title="Delete"><i class="fa fa-trash"></i> </a>
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