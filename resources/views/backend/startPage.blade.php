@extends('layouts.admin')
@section('content')
            <section class="container"> 
                <h2>Start Page</h2>
               <h3>Set your skills</h2>
                <form id="profileSettingsForm" method="POST" enctype="multipart/form-data" action="/api/post-user-settings">
                    {{ csrf_field() }}
                    @foreach($skills as $skill)
                        <div class="form-group">
                            <label for="title">{{$skill['name']}}</label>
                        <input type="range" class="form-control" id="{{$skill['value']}}}" name="{{$skill['value']}}" value="0" onchange='evalSlider(this.id)'>
                        <output></output>
                    </div>
                    @endforeach
               
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </section>
@endsection