@extends('layouts.backend')
@section('content')
<div class="row">
          <div class="offset-10">
              <a class="btn-primary btn" href="{{route('Add Portfolio Entry')}}">Add Portfolio Entry</a>
          </div>
          <div class="col-12">
              @foreach($data as $item)

                <div class="row">
                        @foreach($item['files'] as $file)
                        <div class="col-md-3">
                            <img src="{{asset('storage/' . $file['filename_1']) }}" class="img-fluid">
                        </div>
                        @endforeach

                        <div class="col-md-9">
                            <h2>{{$item['title']}}</h2>
                            <p><strong>Project Description: </strong>{!!$item['description']!!}</p>
                            <p><strong>Website: </strong><a href="{{$item['website_url']}}">{{$item['website_url']}}</a></p>
                            @if($item['technologies'] && $skill_set !== null) 
                            <span><strong>Technologies:</strong></span>
                                <ul class="list-unstyled d-inline-block"> 
                                @foreach($item['technologies'] as $technology_item)
                                    @foreach($skill_set as $skill_set_item)
                                        @if($skill_set_item->name === $technology_item)
                                <li  class="d-inline-block"><a href="{{$skill_set_item->website}}">{{$technology_item}}</a>,</li>
                                        @endif
                                    @endforeach
                                 @endforeach
                                </ul>
                            
                            @endif
                            </p>
                        </div>
                </div>

                <div class="offset-11">
                <a href="/admin/portfolio/edit/{{$item['id']}}" class="fas fa-edit"></a>
                <form id="deleteWorkForm" class="d-inline-block" action="/api/delete-portfolio-entry/{{$item['id']}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                      <button type="submit" class="fas fa-trash"></button>
                </form>
                   
                </div>
              @endforeach
          </div>

</div>
@endsection

@section('after-body-scripts')
<script src="../../../dist/scripts/scripts.js"></script>
@endsection