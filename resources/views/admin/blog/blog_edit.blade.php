@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: black;
        font-weight: bolder;
        background: gray;
        border-radius: 5px;
    } 
</style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">                            
                            <h4 class="card-title">Blog</h4>
                        </div>
                        <div class="col-6">
                        </div>
                    </div><hr>
                    <form action="{{ route('update.blog',$blog->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Category: <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="blog_category_id" class="form-select" aria-label="Default select example">
                                            <option selected="">Select Category</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}" {{ ($item->id == $blog->blog_category_id)?'selected':'' }} >{{ $item->blog_category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Blog Title: <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{ $blog->blog_title }}" name="blog_title">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Blog Tags: <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" data-role="tagsinput" name="blog_tags" value="{{ $blog->blog_tags }}">
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Image: <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <img class="rounded avatar-lg" id="showImg" src="{{ $blog->blog_image?asset($blog->blog_image):url('upload/blank.jpg')}}" style="float: right;">
                                        <input class="form-control" type="file" name="blog_image" id="image" readonly style="margin-top: 7rem">
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Blog Description <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                    <textarea id="elm1" name="blog_description">{!! $blog->blog_description !!}</textarea>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div><hr>
                            <div class="col-md-6">                                
                            </div>
                            <div class="col-md-6">                                
                                <input type="submit" value="Save" class="btn btn-rounded btn-info waves-effect waves-light" style="float: right;">                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

    <script>
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImg').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection