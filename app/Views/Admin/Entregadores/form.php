<div class="form-row">
    <div class="form-group col-md-4">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"
            value="<?php echo old('nome', esc($entregador->nome)); ?>">
    </div>
    <div class="form-group col-md-2">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control cpf" id="cpf" placeholder="CPF" name="cpf"
            value="<?php echo old('cpf', esc($entregador->cpf)); ?>">
    </div>
    <div class="form-group col-md-2">
        <label for="cnh">CNH</label>
        <input type="text" class="form-control cnh" id="cnh" placeholder="CNH" name="cnh"
            value="<?php echo old('cpf', esc($entregador->cnh)); ?>">
    </div>
    <div class="form-group col-md-4">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control sp_celphones" id="telefone" placeholder="Telefone" name="telefone"
            value="<?php echo old('telefone', esc($entregador->telefone)); ?>">
    </div>
    <div class="form-group col-md-4">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" placeholder="E-mail" name="email"
            value="<?php echo old('email', esc($entregador->email)); ?>">
    </div>
    <div class="form-group col-md-4">
        <label for="veiculo">Veículo</label>
        <input type="text" class="form-control" id="veiculo" placeholder="Veículo" name="veiculo"
            value="<?php echo old('veiculo', esc($entregador->veiculo)); ?>">
    </div>
    <div class="form-group col-md-4">
        <label for="placa">Placa</label>
        <input type="text" class="form-control placa" id="placa" placeholder="Placa" name="placa"
            value="<?php echo old('placa', esc($entregador->placa)); ?>">
    </div>
    <div class="form-group col-md-12">
        <label for="endereco">Endereço</label>
        <input type="text" class="form-control" id="endereco" placeholder="Endereço" name="endereco"
            value="<?php echo old('endereco', esc($entregador->endereco)); ?>">
    </div>
    

</div>



<div class="form-check form-check-flat form-check-primary mb-4">
    <label for="ativo" class="form-check-label">
        <input type="hidden" value="0" name="ativo">
        <input type="checkbox" class="form-check-input" id="ativo" name="ativo" value="1" <?php if(old('ativo', $entregador->ativo)): ?> checked="" <?php endif?>>
        Ativo 
    </label>
</div>




<button type="submit" class="btn btn-primary mr-2">
    <i class="mdi mdi-check btn-icon-prepend"></i>
    Salvar
</button>
