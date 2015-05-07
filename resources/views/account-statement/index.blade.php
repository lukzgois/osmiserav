@extends('app')

@section('content')

    <h1>Meu extrato</h1>

    <hr />

    {!! Form::open(['url' => 'account-statement', 'method' => 'GET', 'class' => 'form-inline' ]) !!}

    @include('partials.errors')

    <div class="form-group">
        {!! Form::label('start', 'Data Inicial'); !!}
        {!! Form::text('start', $start, ['class' => 'form-control datepicker']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('end', 'Data Final'); !!}
        {!! Form::text('end', $end, ['class' => 'form-control datepicker']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('user', 'Usuário'); !!}
        {!! Form::select('user', $users, $user, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Filtrar', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    <hr />

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Descrição</th>
                <th>Operação</th>
                <th>Data</th>
                <th>Valor</th>
            </tr>
        </thead>

    @foreach($statements as $statement)
        <tr>
            <td>{{ $statement->id }}</td>
            <td>{{ $statement->description }}</td>
            <td>{{ $statement->operation == 'd' ? 'Débito' : 'Crédito' }}</td>
            <td>{{ $statement->created_at->format('d/m/Y') }}</td>
            <td>R$ {{ number_format($statement->value, 2, ',', '.') }}</td>
        </tr>
    @endforeach
    </table>
@endsection