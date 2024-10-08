<div class="form-row">
    <div class="form-group col-md-8">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"
            value="<?php echo old('nome', esc($produto->nome)); ?>">
    </div>

    <div class="form-group col-md-4">
        <a href="<?php echo site_url('admin/categorias/criar'); ?>"><label for="categoria_id"> Categoria </label></a>
        <select class="form-control" name="categoria_id"> 
            <option value=""> Escolha a categoria... </option>

            <?php foreach ($categorias as $categoria): ?>

                <?php if($produto->id): ?>
                    <option value="<?php echo $categoria->id; ?>" <?php echo ($categoria->id == $produto->categoria_id ? 'selected' : ''); ?> > <?php echo esc($categoria->nome); ?> </option>
                <?php else: ?> 
                    <option value="<?php echo $categoria->id; ?>"> <?php echo esc($categoria->nome); ?> </option>
                <?php endif; ?> 

            <?php endforeach; ?>

        </select>
    </div>


    <div class="form-group col-md-12">
        <label for="ingredientes">Ingredientes</label>
        <textarea class="form-control" name="ingredientes" rows="2" id="ingredientes"><?php echo old('ingredientes', esc($produto->ingredientes)); ?></textarea>
    </div>
</div>


<div class="form-check form-check-flat form-check-primary mb-4">
    <label for="ativo" class="form-check-label">
        <input type="hidden" value="0" name="ativo">
        <input type="checkbox" class="form-check-input" id="ativo" name="ativo" value="1" <?php if(old('ativo', $produto->ativo)): ?> checked="" <?php endif?>>
        Ativo 
    </label>
</div>


<button type="submit" class="btn btn-primary mr-2">
    <i class="mdi mdi-check btn-icon-prepend"></i>
    Salvar
</button>
