@extends('layouts.master')

@section('content')

  @foreach($projects as $project)
    <div class="row">

      <div class="col-md-12">
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
            <div class="row">
              <div class="col-md-6">
                {!! $project->description !!}
              </div>
              <div class="col-md-3">
                {{ $project->client->name }}
              </div>
              <div class="col-md-3 text-right">
                <div class="progress-container">
                  <div class="progress-outter" data-toggle="tooltip" title="Project Progress">
                    <input class="knob" data-displayInput="false" data-fgColor="rgb(127, 255, 0)"
                    data-width="120" data-height="120" data-thickness=".25" value="{{ mt_rand(10, 90) }}">
                    
                  </div>
                  <div class="progress-inner" data-toggle="tooltip" title="Deadline">
                    <input class="knob" data-width="76" data-height="76" data-fgColor="#2d3e63"
                    data-thickness=".35" value="{{ mt_rand(10, 90) }}">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  @endforeach

@endsection


@section('scripts.footer')
<script>
$('.knob').knob({
  readOnly: true,
  bgColor: "#CCC",
  min: 0,
  max: 100
})
</script>
@endsection
