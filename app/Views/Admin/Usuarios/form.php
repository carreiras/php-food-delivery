<form class="forms-sample">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome"  id="nome" value="<?php echo $usuario->nome; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="cpf">Cpf</label>
            <input type="text" class="form-control" name="cpf"  id="cpf" value="<?php echo $usuario->cpf; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone"  id="telefone" value="<?php echo $usuario->telefone; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email"  id="email" value="<?php echo $usuario->email; ?>">
        </div>

    </div>


    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleInputConfirmPassword1">Confirm Password</label>
        <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
    </div>
    <div class="form-check form-check-flat form-check-primary">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input">
            Remember me
            <i class="input-helper"></i></label>
    </div>
    <button type="submit" class="btn btn-primary me-2">Submit</button>
    <button class="btn btn-light">Cancel</button>
</form>