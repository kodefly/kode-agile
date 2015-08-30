@extends('layouts.master')


<!-- breadcrumbs -->
@section('breadcrumbs')
  <div class="meta">
    <div class="page">
      Project Backlogs
    </div>
    <div class="breadcrumb-links">
      <a href="{{ route('home') }}">Home</a> / 
      <a href="{{ route('projects.index') }}">Projects</a> /
      Backlog
    </div>
  </div>
@endsection


<!-- content -->
@section('content')

  <!-- backlogs -->
  <div class="row">
    <div class="col-md-12">
      <div class="widget">

        <div class="widget-header">
          <div class="pull-right">
            <small>
              <a href="#" class="backlogsAddBtn">
                <span class="glyphicon glyphicon-plus icon icon-add" aria-hidden="true"></span>
                <span class="glyphicon glyphicon-minus no-show icon icon-minus" aria-hidden="true"></span>
                <span class="no-show icon icon-progress" aria-hidden="true">
                  <img src="/img/loading.gif" alt="loading"> adding...
                </span>
              </a>
            </small>
          </div>
          Project Backlog
        </div>

        <div class="widget-body row backlogsAddForm no-show">
            {!! Form::open(['route' => ['backlogs.store']]) !!}
              {!! Form::hidden('project_id', $project->id) !!}
            <div class="form-group col-md-8">
              {!! Form::label('title', 'Title') !!}
              {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group col-md-3">
              {!! Form::label('user_id', 'Assign to') !!}
              {!! Form::select('user_id', $developers, '', ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="col-md-1 inline-form-submit">
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="widget-body backlogsList">
          <div class="row">
            <div class="col-md-1">id</div>
            <div class="col-md-8">title</div>
            <div class="col-md-2">Assigned</div>
            <div class="col-md-1"></div>
          </div>

          @foreach($project->backlogs as $backlog)
            <div class="row">
              <div class="col-md-1">{{ $backlog->id }}</div>
              <div class="col-md-8">{{ $backlog->title }}</div>
              <div class="col-md-2">{{ $backlog->user->name or '' }}</div>
              <div class="col-md-1">
                @if($backlog->sprint)
                <a class="btn btn-default btn-xs" href="{{ 
                  route('backlogs.sprints.show', [$backlog->id, $backlog->sprint->id]) }}">
                  view sprint
                </a>
                @else
                <a class="btn btn-success btn-xs" href="{{ route('backlogs.sprints.create', $backlog->id) }}">
                  new sprint
                </a>
                @endif
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </div>
  </div>

@endsection
