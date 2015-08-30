@extends('layouts.master')

<!-- breadcrumbs -->
@section('breadcrumbs')
  <div class="meta">
    <div class="page">
      Projects
    </div>
    <div class="breadcrumb-links">
      <a href="{{ route('home') }}">Home</a> / 
      <a href="{{ route('projects.index') }}">Projects</a> /
      Create Project
    </div>
  </div>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="widget">
        <div class="widget-header">New Project</div>
        <div class="widget-body">
          @include('partials.errors')

          {!! Form::model($project = (new \App\Project), ['route' => ['projects.store']]) !!}

          @include('projects.form')

          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Create Project</button>
            </div>
          </div>

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

@endsection
