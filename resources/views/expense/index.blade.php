@extends('app')

@section('content')

    @include('partials.flash-messages')

    <div class="row">
        <a href="{{ url('expenses/create') }}" class="btn btn-primary">
            Adicionar Despesa
        </a>
        <hr />
    </div>

    <br />
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
            @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->owner->name }}</td>
                <td>{{ $expense->description }}</td>
                <td>R$  {{ number_format($expense->value, 2, ',', '.') }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection