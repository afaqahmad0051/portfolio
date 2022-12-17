@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">                            
                            <h4 class="card-title">About</h4>
                        </div>
                        <div class="col-6">
                        </div>
                    </div><hr>
                    <form action="{{ route('update.about',$about->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" name="id" value="{{ $about->id }}"> --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Title: <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="title" value="{{ $about->title }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Short Title: <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text"  name="short_title" value="{{ $about->short_title }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Short Description <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea name="short_description" class="form-control" id="" cols="20" rows="7">{{ $about->short_description }}</textarea>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Image: <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <img class="rounded avatar-lg" id="showImg" src="{{(!empty($about->about_image))? url($about->about_image):url('upload/blank.jpg')}}" style="float: right;">
                                        <input class="form-control" type="file" name="about_image" id="image" readonly style="margin-top: 7rem">
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <div class="col-md-12">                                
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">About Description <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea id="elm1" name="about_description">{{ $about->about_description }}</textarea>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Skills Description <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea id="elm2" name="skills_description">{{ $about->skills_description }}</textarea>
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