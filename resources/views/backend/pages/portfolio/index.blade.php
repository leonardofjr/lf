@extends('backend.layouts.backend')
@section('content')
          <header class="page-title-header mb-5">
               <h2>{{\Request::route()->getName()}}<a class="btn-primary btn mx-4" href="{{route('Add Project')}}">Add Project</a></h2>
          </header>
          <div class="d-none d-md-block col-md-10">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Type</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
            <tbody>
              @foreach($data as $item)
                <tr>
                    <td>{{$item['title']}}</td>
                    <td>{{$item['author']}}</td>
                    <td>{{ucwords(str_replace('_', ' ',$item['type']))}}</td>
                    <td>{{$item['created_at']}}</td>
                    <td><a href="/admin/portfolio/edit/{{$item['id']}}" class="">Edit</a></td>
                    <td>
                        <form id="deleteWorkForm" class="d-inline-block" action="/api/portfolio/destroy/{{$item['id']}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                                <button type="submit" class="">Trash</button>
                        </form>
                    </td>
                </tr>
              @endforeach
            <tbody>
        </table>
      </div>
      <div class="d-md-none col-md-10">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Title</th>

                </tr>
                </thead>
            <tbody>
              @foreach($data as $item)
                <tr>
                    <td>{{$item['title']}}<br>
                      <div class="text-right">
                        <a href="/admin/portfolio/edit/{{$item['id']}}" class="">Edit</a>
                        <form id="deleteWorkForm" class="d-inline-block" action="/api/portfolio/destroy/{{$item['id']}}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                              <button type="submit" class="">Trash</button>
                        </form>
                    </div>
                    </td>
                </tr>
              @endforeach
            <tbody>
        </table>
      </div>
@endsection