@extends('user.user_master')

@section('user')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div style="padding: 40px">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $editData->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $editData->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">User Iamge</label>
                        <input class="form-control form-control-sm" id="image" type="file" name="profile_photo_path">
                    </div>
                    <div class="mb-3">
                        <img id="showImage" style="width: 100px; height: 100px;" src="{{ !empty($user->profile_photo_path) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg') }}" >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function (e){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#showImage').attr('src', e.target.result)
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
