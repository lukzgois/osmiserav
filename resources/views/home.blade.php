@extends('app')

<div class="container">
@section('content')

    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Meu Saldo com os demais usuários:</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Usuário</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        @foreach($balances as $balance)
                        <tr>
                            <td>{{ $balance->person->name}}</td>
                            <td>R$ {{ number_format($balance->balance, 2, ',', '.')}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Saldo dos outros usuários comigo:</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Saldo</th>
                        </tr>
                        </thead>
                        @foreach($othersBalances as $balance)
                            <tr>
                                <td>{{ $balance->user->name}}</td>
                                <td>R$ {{ number_format($balance->balance, 2, ',', '.')}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
</div>
