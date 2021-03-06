@include('layouts.head')

<body class="auth">
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      
      <div class="panel panel-default">
        <div class="panel-heading">Login</div>
        <div class="panel-body">

          @include('partials.errors')

          <form method="POST" action="{{ url('auth/login') }}">
            {!! csrf_field() !!}

            <div class="form-group">
              {!! Form::label('email', 'Email') !!}
              {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
              {!! Form::label('password', 'Password') !!}
              {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="checkbox">
              <label>
                {!! Form::checkbox('remember') !!} Remember me
              </label>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>

          </form>
        </div>
      </div>

    </div>
  </div>
</div>
</body>
</html>
