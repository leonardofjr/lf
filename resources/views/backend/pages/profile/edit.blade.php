@extends('backend.layouts.backend')
@section('content')

            <!-- Including Croppie Upload Modal -->
            @include('backend.components.croppieUploadModal')

            <header class="page-title-header mb-5">
                <h2>{{\Request::route()->getName()}}</h2>
            </header>

            <div class="row">
                <div class="col-md-3">
                    <div class="logoPreviewContainer">
                        <img id="imageFilePreview" class="img-thumbnail" src='{{$data->profile_image ? asset("storage/$data->profile_image") : asset("imgs/logo.png") }}' style="max-width: 300px;" alt="preview" />
                     </div>
              
                    <div class="form-group">
                        <input class="form-control-file" type="file" id="uploadedImageFile" name="uploadedImageFile" accept="image/*">
                        <div class="my-3 d-none alert alert-warning error error-profile-image" role="alert"></div>
                    </div>

                    <div class="my-3 d-none alert alert-warning error error-image" role="alert">
                    </div>
                </div>

                <form class="col-md-9" method="POST" enctype="multipart/form-data" action="/api/user/update/{{$id}}">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}
                
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="fname">First Name:</label>
                            <input type="text" class="form-control {{ $errors->has('fname') ? 'is-invalid' : ''}}" id="fname" name="fname" value="{{$data->fname}}" >

                            @if ($errors->has('fname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fname') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="lname">Last Name:</label>
                            <input type="text" class="form-control {{ $errors->has('lname') ? 'is-invalid' : ''}}" id="lname" name="lname" value="{{$data->lname}}" >

                            @if ($errors->has('lname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lname') }}</strong>
                                </span>
                        @endif
                        </div>
                  </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="city">City:</label>
                            <input type="text" class="form-control {{ $errors->has('city') ? 'is-invalid' : ''}}" id="city" name="city" value="{{$data->city}}" >

                            @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                        @endif
                        </div>
                        <div class="col-md-6">
                            <label for="province">Province:</label>
                                <select class="form-control {{ $errors->has('province') ? 'is-invalid' : ''}}" id="province" name="province" >
                                    <option value="">--Select--</option>
                                    @foreach ($ca_provinces as $ca_province)
                                        <option {{$ca_province->iso == $data->province ? "selected" : ""}} value="{{$ca_province->iso}}">{{$ca_province->name}}</option>
                                    @endforeach
                                </select> 
                            @if ($errors->has('province'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('province') }}</strong>
                                </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="postal_code">Postal Code:</label>
                            <input type="text" class="form-control {{ $errors->has('postal_code') ? 'is-invalid' : ''}}" id="postal_code" name="postal_code" value="{{$data->postal_code}}" >

                            @if ($errors->has('postal_code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('postal_code') }}</strong>
                                </span>
                        @endif
                        </div>
                        

                        <div class="col-md-6">
                            <label for="country">Country:</label>
                            <select class="form-control {{ $errors->has('country') ? 'is-invalid' : ''}}" id="country" name="country" >
                                <option selected value="canada">Canada</option>
                            </select> 
                            @if ($errors->has('country'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="phone">Phone:</label>
                        <input type="tel" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}" id="phone" name="phone" value="{{$data->phone}}" >

                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="{{$data->email}}" >

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="article-ckeditor">Bio:</label>
                        <textarea id="article-ckeditor" class="form-control {{ $errors->has('bio') ? 'is-invalid' : ''}}" name="bio">{{$data->bio}}</textarea>
                        @if ($errors->has('bio'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bio') }}</strong>
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
            </div>
@endsection