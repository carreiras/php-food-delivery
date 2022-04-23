<?= $this->extend('Admin/layout/principal'); ?>

<?= $this->section('titulo'); ?>
<?= $titulo; ?>
<?= $this->endSection(); ?>

<?= $this->section('estilos'); ?>
<link rel="stylesheet" href="<?= site_url(); ?>admin/vendors/auto-complete/jquery-ui.css">
<?= $this->endSection(); ?>

<?= $this->section('conteudo'); ?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $titulo; ?></h4>
                <div class="ui-widget">
                    <input id="query" name="query" placeholder="Pesquise por um usuário" class="form-control bg-light" mb-5>
                </div>

                <br/>

                <a href="<?= site_url("admin/usuarios/criar"); ?>" class="btn btn-success btn-sm mb-2">Cadastrar</a>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Cpf</th>
                                <th>Ativo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario) : ?>
                                <tr>
                                    <td><a href='<?= site_url("admin/usuarios/show/$usuario->id"); ?>'><?= $usuario->nome; ?></a></td>
                                    <td><?= $usuario->email; ?></td>
                                    <td><?= $usuario->cpf; ?></td>
                                    <td><?= ($usuario->ativo) ? '<span class="badge badge-primary">Sim</span>' : '<span class="badge badge-danger">Não</span>'; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script src="<?= site_url(); ?>admin/vendors/auto-complete/jquery-ui.js"></script>
<script>
    $(function() {
        $("#query").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "<?= site_url('/admin/usuarios/procurar'); ?>",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        if (data.length < 1) {
                            var data = [{
                                label: 'Usuário não encontrado',
                                value: -1
                            }];
                        }
                        response(data); // Aqui temos valor no data
                    },
                }) // Fim ajax
            },
            minLength: 1,
            select: function(event, ui) {
                if (ui.item.value == -1) {
                    $(this).val("");
                    return false;
                } else {
                    window.location.href = "<?= site_url('admin/usuarios/show/'); ?>" + ui.item.id;
                }
            }
        }); // Fim auto-complete
    });
</script>
<?= $this->endSection(); ?>