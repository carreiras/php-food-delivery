<form class="forms-sample">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $usuario->nome; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="cpf">Cpf</label>
            <input type="text" class="form-control cpf" name="cpf" id="cpf" value="<?php echo $usuario->cpf; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control sp_celphones" name="telefone" id="telefone"
                   value="<?php echo $usuario->telefone; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email" id="email" value="<?php echo $usuario->email; ?>">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="password">Senha</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group col-md-6">
            <label for="confirmation_password">Confirmação de senha</label>
            <input type="password" class="form-control" name="confirmation_password" id="confirmation_password">
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-sm mr-2">Salvar</button>
    <a href="<?php echo site_url("admin/usuarios/show/$usuario->id"); ?>" class="btn btn-light text-dark btn-sm mr-2">
        Voltar
    </a>
</form>