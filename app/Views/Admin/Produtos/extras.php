<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
<link rel="stylesheet" href="<?php echo	site_url('admin/vendors/select2/select2.min.css'); ?>"/>
<style>

    .select2-container .select2-selection--single {
        display: block;
        width: 100%;
        height: 2.875rem;
        padding: 0.875rem 1.375rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #495057;
        background-color: #ffffff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 2px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 18px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        top: 80%;
    }

</style>

<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header bg-primary pb-0 pt-4">
            <h4 class="card-title text-white "><?php echo esc($titulo); ?></h4>
        </div>
        <div class="card-body">

            <?php if(session()->has('errors_model')): ?>
            <ul>
                <?php foreach (session('errors_model') as $error): ?>
                <li class="text-danger"><?php echo $error; ?></li>
                <?php endforeach?>
            </ul>
            <?php endif;?>

            <?php echo form_open("admin/produtos/cadastrarextras/$produto->id"); ?>

            <div class="form-row">
                <div class="form-group col-md-12">

                    <label> Escolha o extra do produto (opcional)</label>
                    <select class="form-control js-example-basic-single" name="extra_id">
                        <option value=""> Escolha...</option>

                        <?php foreach ($extras as $extra): ?>
                        
                            <option value="<?php echo $extra->id ?>"> <?php echo esc($extra->nome); ?> </option>
                            
                        <?php endforeach ?>
                    </select>

                </div>

                
            </div>

            <button type="submit" class="btn btn-primary mr-2">
                <i class="mdi mdi-check btn-icon-prepend"></i>
                Inserir Extra
            </button>

            <a href="<?php echo site_url("admin/produtos/show/$produto->id"); ?>"
                class="btn btn-light btn-sm btn-icon-tex btn-icon-prepend">
                <i class="mdi mdi-keyboard-backspace btn-icon-prepend"></i>
                Voltar
            </a>

            <?php echo form_close()?>

            <hr>

            <div class="form-row mt-5">

            <div class="col-md-12">
                            <?php if(empty($produtoExtras)): ?>
                                
                                <p> Esse produto não possui extras no momento. </p>

                            <?php else: ?>

                                <h4 class="card-title">Extras do produto</h4>
                                <p class="card-description">
                                    <code> Aproveite para gerenciar os extras </code>
                                </p>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th>Extra</th>
                                        <th>Preço</th>
                                        <th>Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($produtoExtras as $extraProduto): ?>

                                            <tr>
                                                <td><?php echo esc($extraProduto->extra); ?></td>
                                                <td>R$&nbsp;<?php echo esc(number_format($extraProduto->preco)); ?></td>
                                                <td>
                                                    
                                                    <?php echo form_open("admin/produtos/excluirextra/$extraProduto->id/$extraProduto->produto_id"); ?>

                                                    <button type="submit" class="btn badge badge-danger"> Remover </button>


                                                    <?php echo form_close(); ?>

                                                </td>
                                            </tr>
                                            
                                        <?php endforeach; ?>
                                    </tbody>
                                    </table>

                                    <div class="mt-3">
                                        <?php echo $pager->links(); ?>
                                    </div>

                            <?php endif; ?>

                </div>
            </div>

        </div>

    </div>
</div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script src="<?php echo site_url('admin/vendors/mask/app.js'); ?>"></script>
<script src="<?php echo site_url('admin/vendors/mask/jquery.mask.min.js'); ?>"></script>


<script src="<?php echo site_url('admin/vendors/select2/select2.min.js'); ?>"></script>
<script>

    $(document).ready(function() {
        $('.js-example-basic-single').select2({

            placeholder: 'Digite o nome do extra...',
            allowClear: false,
            "language":{
                "noResults": function(){
                    return "Extra não encontrado&nbsp;&nbsp;<a class='btn btn-primary btn-sm' href='<?php echo site_url('admin/extras/criar'); ?>'> Cadastrar </a>";
                }
            },
            escapeMarkup: function(markup){
                return markup;  
            }
        });
    });

</script>


<?php echo $this->endSection(); ?>