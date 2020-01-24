@extends('backend.layouts.backend')
@section('content')
          <header class="page-title-header mb-5">
               <h2>{{\Request::route()->getName()}}<a class="btn-primary btn mx-4" href="{{route('Add Project')}}">Add Project</a></h2>
          </header>
          <div class="d-none d-md-block col-md-10">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
            <tbody>
              @foreach($users as $i => $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->fname}}</td>
                    <td>{{$user->lname}}</td>
                    @foreach($user->roles as $role) 
                       <td>{{ucfirst($role->name)}}</td>
                    @endforeach
                    <td><a href="/admin/users/edit/{{$user['id']}}" class="">Edit</a></td>
                    <td>
                        <form id="deleteWorkForm" class="d-inline-block" action="/api/users/destroy/{{$user->id}}" method="post">
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
              @foreach($users as $user)
                <tr>
                    <td>{{$user->title}}<br>
                      <div class="text-right">
                        <a href="/admin/portfolio/edit/{{$user->id}}" class="">Edit</a>
                        <form id="deleteWorkForm" class="d-inline-block" action="/api/portfolio/destroy/{{$user->id}}" method="post">
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