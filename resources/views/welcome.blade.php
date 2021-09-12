@extends('layouts.main')

@section('content')
<div class="container mt-4">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Laravel 8 - Search webinars
        </div>
        <div class="card-body">
            <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('getWebinars')}}">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="datetime">Months</label>
                            @foreach($months as $id => $name)
                                <div class="row">
                                    <div class="col-md-1">
                                        <input type="checkbox" name="data[months][]" value="{{$id}}" class="">
                                    </div>
                                    <div class="col-md-11">
                                        {{$name}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="theme">Themes</label>
                            @foreach($themes as $key => $theme)
                                <div class="row">
                                    <div class="col-md-1">
                                        <input type="checkbox" name="data[themes][]" value="{{$theme->id}}" class="">
                                    </div>
                                    <div class="col-md-11">
                                        {{$theme->theme}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection