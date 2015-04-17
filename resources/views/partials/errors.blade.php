@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Foram encontrados erros durante o preenchimento<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif