@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="widget">
        <div class="widget-header">New Project</div>
        <div class="widget-body">
          @include('partials.errors')

          {!! Form::open(['route' => ['projects.store']]) !!}

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('name', 'Project Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                {!! Form::label('duration', 'Duration') !!}
                {!! Form::text('duration', null, ['class' => 'form-control', 'required']) !!}
              </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('client_id', 'Client') !!}
                    {!! Form::select('client_id', $clients, null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                {!! Form::label('Description', 'Description') !!}
                {!! Form::textarea('Description', null, ['class' => 'form-control']) !!}
              </div>


              <div class="form-group">
                {!! Form::label('memo', 'Memo') !!}
                {!! Form::textarea('memo', null, ['class' => 'form-control']) !!}
              </div>

              <button type="submit" class="btn btn-primary">Create Project</button>
            </div>
          </div>

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

@endsection
