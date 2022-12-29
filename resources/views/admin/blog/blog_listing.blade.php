@extends('admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Blog Listing</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Blog Category</th>
                        <th>Blog Title</th>
                        <th>Blog Tags</th>
                        <th>Blog Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($blog as $item)                            
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->category->blog_category }}</td>
                                <td>{{ $item->blog_title }}</td>
                                <td>{{ $item->blog_tags }}</td>
                                <td>
                                    <img src="{{ asset($item->blog_image) }}" style="width: 60px; height:60px;">
                                </td>
                                <td>
                                    <a href="{{ route('edit.blog', $item->id ) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i> </a>
                                    <a href="{{ route('delete.blog', $item->id ) }}" class="btn btn-danger btn-sm" id="delete" title="Delete"><i class="fa fa-trash"></i> </a>
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