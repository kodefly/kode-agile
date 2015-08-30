
@extends('layouts.master')

<!-- breadcrumbs -->
@section('breadcrumbs')
  <div class="meta">
    <div class="page">
      Sprint
    </div>
    <div class="breadcrumb-links">
      <a href="{{ route('home') }}">Home</a> / 
      <a href="{{ route('projects.index') }}">Projects</a> /
      <a href="{{ route('projects.backlogs.index', $backlog->project->id) }}">Backlogs</a> /
      Sprint
    </div>
  </div>
@endsection

<!-- content -->
@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="widget">
        <div class="widget-header">Create Sprint</div>
        <div class="widget-body">
          <p>{{ $backlog->title }}</p>          
          <p>{{ $backlog->sprint->description }}</p>
          <hr>

          @foreach($backlog->sprint->comments as $comment)
            <p>{{ $comment->content }}</p>
            <hr>
          @endforeach

          {!! Form::open(['route' => ['comments.store']]) !!}
          {!! Form::hidden('sprint_id', $backlog->sprint->id) !!}
            <div class="form-group">
              {!! Form::label('content', 'Content') !!}
              {!! Form::text('content', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <button type="submit" class="btn btn-primary">Add Comment</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

@endsection
