@extends('app')

@section('content')

    <div class="row">
        <a href="{{ url('expense/create') }}" class="btn btn-primary">
            Adicionar Despesa
        </a>
    </div>

@endsection