
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
      Create Sprint
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
          <p>Project Name: {{ $backlog->project->name }}</p>
          <p>Backlog Entry: {{ $backlog->title }}</p>
          {!! Form::open(['route' => ['backlogs.sprints.store', $backlog->id]]) !!}
            <div class="form-group">
              {!! Form::label('description', 'Description') !!}
              {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <button type="submit" class="btn btn-primary">create sprint</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

@endsection
