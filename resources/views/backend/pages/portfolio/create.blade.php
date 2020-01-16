@extends('backend.layouts.backend')
@section('content')
            <header class="page-title-header mb-5">
                <h2>{{\Request::route()->getName()}}</h2>
            </header>
            
            <!-- Including Croppie Upload Modal -->
            @include('backend.components.croppieUploadModal')

            <form class="col-10" method="POST" enctype="multipart/form-data" action="/post-portfolio-entry">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" name="title" >
            
                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="type">Type:</label>
                        <select class="form-control"  name="type" >
                            @foreach($type_dropdown as $type)
                                    <option value="{{str_replace(' ', '_', strtolower($type->name))}}">{{$type->name}}</option>
                      
                            @endforeach
                        </select>

                </div>
                <!-- File Selector -->
                <div class="logoPreviewContainer">
                    <img id="imageFilePreview" class="img-thumbnail" src='https://via.placeholder.com/300x300' style="display:none; max-width: 300px;" alt="preview" />
                </div>
              
                <div class="form-group">
                    <input type="file" id="uploadedImageFile" name="uploadedImageFile" accept="image/*">
                    <div class="my-3 d-none alert alert-warning error error-profile-image" role="alert"></div>
                </div>


                <!-- File Selector END -->      
                                
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea  id="article-ckeditor" type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}"  name="description" ></textarea>
            
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="website_url">Website Url:</label>
                    <input type="text" class="form-control {{ $errors->has('website_url') ? 'is-invalid' : ''}}" name="website_url" >

                    @if ($errors->has('website_url'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('website_url') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            
            <!-- CKEDITOR SCRIPT -->
            <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
            <script text="type/javascript">
                CKEDITOR.replace( 'article-ckeditor' );
            </script>
@endsection
