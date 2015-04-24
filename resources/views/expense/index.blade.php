@extends('app')

@section('content')

    @include('partials.flash-messages')

    <div class="row">
        <a href="{{ url('expenses/create') }}" class="btn btn-primary">
            Adicionar Despesa
        </a>
    </div>

@endsection