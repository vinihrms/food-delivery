<div class="form-row">
    <div class="form-group col-md-4">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"
            value="<?php echo old('nome', esc($usuario->nome)); ?>">
    </div>

    <div class="form-group col-md-2">
        <label for="cpf">Cpf</label>
        <input type="text" class="form-control cpf" id="cpf" placeholder="Cpf" name="cpf"
            value="<?php echo old('cpf', esc($usuario->cpf)); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control sp_celphones" id="telefone" placeholder="Telefone" name="telefone"
            value="<?php echo old('telefone', esc($usuario->telefone)); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" placeholder="E-mail" name="email"
            value="<?php echo old('email', esc($usuario->email)); ?>">
    </div>

</div>


<div class="form-row">
    <div class="form-group col-md-3">
        <label for="password">Senha</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
    </div>
    <div class="form-group col-md-3">
        <label for="password_confirmation">Confirmação de senha</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
            placeholder="Confirmação de senha">
    </div>
</div>

<?php if($usuario->id != usuario_logado()->id): ?>

<div class="form-check form-check-flat form-check-primary mb-4">
    <label for="ativo" class="form-check-label">
        <input type="hidden" value="0" name="ativo">

        <input type="checkbox" class="form-check-input" id="ativo" name="ativo" value="1" <?php if(old('ativo', $usuario->ativo)): ?> checked="" <?php endif?>>
        Ativo 
    </label>
</div>

<div class="form-check form-check-flat form-check-primary mb-4">
    <label for="is_admin" class="form-check-label">
        <input type="hidden" value="0" name="is_admin">

        <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" value="1" <?php if(old('is_admin', $usuario->is_admin)): ?> checked="" <?php endif?>>
        Administrador 
    </label>
</div>

<?php endif; ?>




<button type="submit" class="btn btn-primary mr-2">
    <i class="mdi mdi-check btn-icon-prepend"></i>
    Salvar
</button>
