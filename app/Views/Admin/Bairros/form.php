<div class="form-row">

    

    <div class="form-group col-md-4">
        <label for="nome">Bairro</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Bairro"
            value="<?php echo old('nome', esc($bairro->nome)); ?>">
    </div>

    <div class="form-group col-md-8">
        <label for="valor_entrega">Valor de entrega</label>
        <input maxlength="6" type="text" class="money form-control" id="valor_entrega" name="valor_entrega" placeholder="Valor de entrega"
            value="<?php echo old('valor_entrega', esc(number_format($bairro->valor_entrega, 2))); ?>">
    </div>

    <?php if(!$bairro->id): ?>
        <div class="form-group col-md-4">
        <label for="cep">CEP</label>
        <input type="text" class="form-control cep" name="cep" placeholder="CEP"
            value="<?php echo old('cep', esc($bairro->cep)); ?>">

        <div id="cep"></div>
    </div>

    <?php endif ?>

    <div class="form-group col-md-4">
        <label for="cidade">Cidade</label>
        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade"
            readonly="" value="<?php echo old('cidade', esc($bairro->cidade)); ?>">
    </div>

    <?php if(!$bairro->id): ?>

    <div class="form-group col-md-4">
        <label for="estado">Estado</label>
        <input type="text" class="form-control uf" id="estado" name="estado" placeholder="Estado"
            readonly="" value="">
    </div>

    <?php endif ?>


    

    

</div>

<div class="form-check form-check-flat form-check-primary mb-4">
    <label for="ativo" class="form-check-label">
        <input type="hidden" value="0" name="ativo">
        <input type="checkbox" class="form-check-input" id="ativo" name="ativo" value="1" <?php if(old('ativo', $bairro->ativo)): ?> checked="" <?php endif?>>
        Ativo 
    </label>
</div>



<button id="btn-salvar" type="submit" class="btn btn-primary mr-2">
    <i class="mdi mdi-check btn-icon-prepend"></i>
    Salvar
</button>
