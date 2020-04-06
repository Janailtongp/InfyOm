<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cidade->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cidade->updated_at }}</p>
</div>

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{{ $cidade->nome }}</p>
</div>

<!-- Uf Field -->
<div class="form-group">
    {!! Form::label('uf', 'Uf:') !!}
    <p>{{ $cidade->uf }}</p>
</div>

<!-- N Habitantes Field -->
<div class="form-group">
    {!! Form::label('n_habitantes', 'N Habitantes:') !!}
    <p>{{ $cidade->n_habitantes }}</p>
</div>

