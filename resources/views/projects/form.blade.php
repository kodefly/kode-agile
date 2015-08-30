
<div class="row">
  <div class="col-md-4 form-group">
    {!! Form::label('name', 'Project Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
  </div>
  <div class="col-md-3 form-group">
    {!! Form::label('client_id', 'Client') !!}
    {!! Form::select('client_id', $clients, null, ['class' => 'form-control', 'required']) !!}
  </div>
  <div class="col-md-3 form-group">
    {!! Form::label('start_date', 'Date') !!}
    {!! Form::date('start_date', $project->start_date, ['class' => 'form-control', 'required']) !!}
  </div>
  <div class="col-md-2 form-group">
    {!! Form::label('duration', 'Duration') !!}
    {!! Form::text('duration', null, ['class' => 'form-control', 'required']) !!}
  </div>

</div>


<div class="row">
  <div class="col-md-7 form-group">
    {!! Form::label('Description', 'Description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
  </div>

  <div class="col-md-5 form-group">
    {!! Form::label('memo', 'Memo') !!}
    {!! Form::textarea('memo', null, ['class' => 'form-control']) !!}
  </div>
</div>
