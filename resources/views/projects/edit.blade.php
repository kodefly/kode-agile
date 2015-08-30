@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="widget">
        <div class="widget-header">New Project</div>
        <div class="widget-body">
          @include('partials.errors')

          {!! Form::model($project, ['route' => ['projects.update', $project->id], 'method' => 'PATCH']) !!}

          @include('projects.form')

          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Update Project</button>
            </div>
          </div>

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

@endsection
