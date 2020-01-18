@extends('backend.layouts.backend')
@section('content')
            <header class="page-title-header mb-5">
                <h2>{{\Request::route()->getName()}}</h2>
            </header>
            
            <!-- Including Croppie Upload Modal -->
            @include('backend.components.croppieUploadModal')

            <form class="col-10" method="POST" enctype="multipart/form-data" action="store">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" name="title" value="{{ old('title') }}">
            
                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" class="form-control {{ $errors->has('slug') ? 'is-invalid' : ''}}" name="slug" value="{{ old('slug') }}">
            
                    @if ($errors->has('slug'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                    @endif
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
                    <label for="content">Content:</label>
                    <textarea  id="article-ckeditor" type="text" class="form-control {{ $errors->has('content') ? 'is-invalid' : ''}}"  name="content" value="{{ old('content') }}"></textarea>
                   
                    @if ($errors->has('content'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('content') }}</strong>
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
