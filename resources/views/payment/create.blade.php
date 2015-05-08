@extends('app')

@section('content')

    @include('partials.flash-messages')

    <h1>Adicionar Pagamento</h1>

    <hr />

    {!! Form::open(array('url' => 'payment')) !!}

    @include('partials.errors')

    <div class="form-group">
        {!! Form::label('user', 'Usuário'); !!}
        {!! Form::select('user', $users, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('value', 'Valor'); !!}
        {!! Form::text('value', '0,00', ['class' => 'form-control money']) !!}
    </div>

    {!! Form::submit('Adicionar', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection