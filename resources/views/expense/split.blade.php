@extends('app')

@section('content')

    <h1>Dividir Despesa</h1>

    {!! Form::open(array('url' => 'expenses')) !!}


    {!! Form::hidden('owner', $owner_id) !!}
    {!! Form::hidden('description', $description) !!}

    <h3>R$ {{ number_format($value, 2, ',', '.') }}</h3>
    <hr />

    @foreach($users as $user)

        <div class="form-group">
            {!! Form::label($user->id, $user->name) !!}
            <div class="input-group">
                <div class="input-group-addon">R$</div>
                {!! Form::text("user[{$user->id}]", $perUser, ['class' => 'form-control money']) !!}
            </div>
        </div>

    @endforeach

    {!! Form::submit('Dividir Despesas', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection