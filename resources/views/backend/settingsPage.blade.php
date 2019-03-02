@extends('layouts.backend')
@section('content')
            <section class="container"> 
            <h2>{{\Request::route()->getName()}}</h2>
                <form id="setupPageForm" method="POST" enctype="multipart/form-data" action="/api/update-user-settings/{{$id}}">
                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" class="form-control" id="fname" name="fname" value="{{$data->fname}}" >
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" class="form-control" id="lname" name="lname" value="{{$data->lname}}" >
                    </div>
                    <script type="text/javascript" src="/js/imagePreview.js"></script>
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}
                    @if(!is_file(public_path('/storage\\' . $data->profile_image)))             <p>Avatar Image:</p>
                        <img id="avatarPreview" class="img-fluid" src="https://via.placeholder.com/300" alt="image preview">
                    @else 
                      <p>Avatar Image:</p>
                      <img id="avatarPreview" class="img-fluid" src="/storage/{{$data->profile_image}}" alt="image preview">
                    @endif
                    <div class="form-group">
                        <label for="profile_image">Change Image:</label>
                        <input type="file" id="profile_image" name="profile_image" accept="image/*" onchange='previewImageToUpload("profile_image")'>
                        <div class="my-3 d-none alert alert-warning error error-profile-image" role="alert"></div>
                    </div>
                    <div class="my-3 d-none alert alert-warning error error-image" role="alert">
                    </div>
                    <div class="form-group">
                        <label for="article-ckeditor">Bio:</label>
                        <textarea id="article-ckeditor" class="form-control" name="bio">{{$data->bio}}</textarea>
                        <div class="my-3 d-none alert alert-warning error error-bio" role="alert"></div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{$data->phone}}" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}" >
                    </div>

                    <div class="form-group">
                        <label for="facebook_url">Facebook Url:</label>
                        <input type="text" class="form-control" id="facebook_url" name="facebook_url" value="{{$data->facebook_url}}" >
                    </div>
                    <div class="form-group">
                        <label for="linkedin_url">Linkedin Url:</label>
                        <input type="text" class="form-control" id="linkedin_url" name="linkedin_url" value="{{$data->linkedin_url}}" >
                    </div>
                    <div class="form-group">
                        <label for="twitter_url">Twitter Url:</label>
                        <input type="text" class="form-control" id="twitter_url" name="twitter_url" value="{{$data->twitter_url}}" >
                    </div>
                    <div class="form-group">
                        <label for="github_url">Github Url:</label>
                        <input type="text" class="form-control" id="github_url" name="github_url" value="{{$data->github_url}}" >
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </section>
@endsection