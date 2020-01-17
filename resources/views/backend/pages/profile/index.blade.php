@extends('backend.layouts.backend')
@section('content')

            <!-- Including Croppie Upload Modal -->
            @include('backend.components.croppieUploadModal')

            <header class="page-title-header mb-5">
                <h2>{{\Request::route()->getName()}}</h2>
            </header>


        
                <form id="setupPageForm" class="col-10" method="POST" enctype="multipart/form-data" action="/update-user-settings/{{$id}}">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" class="form-control {{ $errors->has('fname') ? 'is-invalid' : ''}}" id="fname" name="fname" value="{{$data->fname}}" >

                        @if ($errors->has('fname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('fname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" class="form-control {{ $errors->has('lname') ? 'is-invalid' : ''}}" id="lname" name="lname" value="{{$data->lname}}" >

                        @if ($errors->has('lname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lname') }}</strong>
                            </span>
                       @endif
                    </div>

                    <div class="logoPreviewContainer">
                        <img id="imageFilePreview" class="img-thumbnail" src='{{$data->profile_image ? asset("storage/logo/logo.png") : asset("imgs/logo.png") }}' style="max-width: 300px;" alt="preview" />
                     </div>
              
                    <div class="form-group">
                        <input type="file" id="uploadedImageFile" name="uploadedImageFile" accept="image/*">
                        <div class="my-3 d-none alert alert-warning error error-profile-image" role="alert"></div>
                    </div>

                    <div class="my-3 d-none alert alert-warning error error-image" role="alert">
                    </div>
                    <div class="form-group">
                        <label for="bio-ckeditor">Bio:</label>
                        <textarea id="bio-ckeditor" class="form-control {{ $errors->has('bio') ? 'is-invalid' : ''}}" name="bio">{{$data->bio}}</textarea>
                        @if ($errors->has('bio'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bio') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone:</label>
                    <input type="tel" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}" id="phone" name="phone" value="{{$data->phone}}" >

                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="{{$data->email}}" >

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                          @endif
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
                <!-- CKEDITOR SCRIPT -->
                <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                <script text="type/javascript">
                    CKEDITOR.replace( 'bio-ckeditor' );
                    CKEDITOR.replace( 'skills-and-offer-ckeditor' );
                </script>
@endsection