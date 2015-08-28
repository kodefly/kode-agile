@extends('layouts.master')

@section('content')

  @foreach($projects->chunk(3) as $set)
    <div class="row">

    @foreach($set as $project)
      <div class="col-md-4">
        <div class="widget">
          <div class="widget-header">
            <div class="dropdown pull-right">
              <a class="dropdown-toggle"  id="dropdownMenu{{ $project->id }}"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fa fa-ellipsis-v"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu{{ $project->id }}">
                <li><a href="{{ route('projects.edit', $project->id) }}">edit</a></li>
              </ul>
            </div>
            {{ $project->name }}
          </div>
          <div class="widget-body">
            {!! $project->description !!}
          </div>
        </div>
      </div>
    @endforeach

    </div>
  @endforeach

@endsection
