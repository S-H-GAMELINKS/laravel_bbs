@extends('layout')
@section('header')
<div class="page-header">
        <h1>Tweets / Show #{{$tweet->id}}</h1>
        <form action="{{ route('tweets.destroy', $tweet->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('tweets.edit', $tweet->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="title">TITLE</label>
                     <p class="form-control-static">{{$tweet->title}}</p>
                </div>
                    <div class="form-group">
                     <label for="body">BODY</label>
                     <p class="form-control-static">{{$tweet->body}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('tweets.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

    @foreach($comments as $comment)
        <p>{{ $comment->content }}</p>
    @endforeach

    <div class="row">
        <div class="col-md-12">

            <form action="/tweets/{{ $tweet->id }}/comments" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group @if($errors->has('content')) has-error @endif">
                       <label for="content-field">Coment</label>
                    <textarea class="form-control" id="content-field" rows="3" name="content">{{ old("content") }}</textarea>
                       @if($errors->has("content"))
                        <span class="help-block">{{ $errors->first("content") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>

        </div>
    </div>

@endsection