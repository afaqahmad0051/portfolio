@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">                            
                            <h4 class="card-title">Slider</h4>
                        </div>
                        <div class="col-6">
                        </div>
                    </div><hr>
                    <form action="{{ route('update.slider',$homeSlide->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" name="id" value="{{ $homeSlide->id }}"> --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Title: <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="title" value="{{ $homeSlide->title }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Short Title: <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text"  name="short_title" value="{{ $homeSlide->short_title }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Video URL: <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="video_url" value="{{ $homeSlide->video_url }}">
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Slider Image: <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <img class="rounded avatar-lg" id="showImg" src="{{(!empty($homeSlide->home_slide))? url($homeSlide->home_slide):url('upload/blank.jpg')}}" style="float: right;">
                                        <input class="form-control" type="file" name="home_slide" id="image" readonly style="margin-top: 7rem">
                                    </div>
                                </div>
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