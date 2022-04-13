<div class="form-group {{ $errors->has('descricao') ? 'has-error' : ''}}">
    <label for="descricao" class="control-label">{{ 'Descricao' }}</label>
    <input class="form-control" name="descricao" type="text" id="descricao" value="{{ isset($movimentosfinanceiro->descricao) ? $movimentosfinanceiro->descricao : ''}}" required>
    {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('valor') ? 'has-error' : ''}}">
    <label for="valor" class="control-label">{{ 'Valor' }}</label>
    <input class="form-control" name="valor" type="number" id="valor" value="{{ isset($movimentosfinanceiro->valor) ? $movimentosfinanceiro->valor : ''}}" >
    {!! $errors->first('valor', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('data') ? 'has-error' : ''}}">
    <label for="data" class="control-label">{{ 'Data' }}</label>
    <input class="form-control" name="data" type="date" id="data" value="{{ isset($movimentosfinanceiro->data) ? $movimentosfinanceiro->data : ''}}" required>
    {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
    <label for="tipo" class="control-label">{{ 'Tipo' }}</label>
    <select name="tipo" class="form-control" id="tipo" required>
    @foreach (json_decode('{"entrada":"Entrada","saida":"Sa\u00edda"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($movimentosfinanceiro->tipo) && $movimentosfinanceiro->tipo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('empresa_id') ? 'has-error' : ''}}">
    <label for="empresa_id" class="control-label">{{ 'Empresa Id' }}</label>
    <input class="form-control" name="empresa_id" type="number" id="empresa_id" value="{{ isset($movimentosfinanceiro->empresa_id) ? $movimentosfinanceiro->empresa_id : ''}}" required>
    {!! $errors->first('empresa_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
