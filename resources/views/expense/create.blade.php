@extends("app")

@section("content")

    {!! Form::open(array('url' => 'expense')) !!}

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
        {!! Form::label('owner', 'Quem pagou por essa despesa?'); !!}
        {!! Form::text('owner', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('value', 'Quanto custou?'); !!}
        {!! Form::text('value', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('reference', 'A que se refere?'); !!}
        {!! Form::text('reference', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Adicionar', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection