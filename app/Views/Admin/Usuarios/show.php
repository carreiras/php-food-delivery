<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-header bg-primary pb-0 pt-4">
                <h4 class="card-title text-white"><?php echo esc($titulo); ?></h4>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <span class="font-weight-bold">Nome: </span>
                    <?php echo esc($usuario->nome); ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">E-mail: </span>
                    <?php echo esc($usuario->email); ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Ativo: </span>
                    <?php echo ($usuario->ativo) ? 'Sim' : 'Não'; ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Perfil: </span>
                    <?php echo ($usuario->is_admin) ? 'Administrador' : 'Cliente'; ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Criado em: </span>
                    <?php echo $usuario->criado_em; ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Atualizado em: </span>
                    <?php echo $usuario->atualizado_em; ?>
                </p>

            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<?php echo $this->endSection(); ?>
