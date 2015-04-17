@extends("app")

@section("content")

    {!! Form::open(array('url' => 'expense/split', 'method' => 'GET')) !!}

    @include('partials.errors')

    <div class="form-group">
        {!! Form::label('owner', 'Quem pagou por essa despesa?'); !!}
        {!! Form::select('owner', $user, null, ['class' => 'form-control']) !!}
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