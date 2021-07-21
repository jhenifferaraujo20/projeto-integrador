<div class="modal-cadastro pt-0">
    <div class="row justify-content-end">
        <div class="col-2">
            <button class="btn fechar-login"><i class="bi bi-x"></i></button>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-8">
            <h2 class="text-uppercase">Cadastre-se</h2>
        </div>
    </div>

    <?php
    if(isset($_GET['mensagem'])){
        if($_GET['mensagem'] == 'email_existe'){
            echo "<div class='alert alert-danger' role='alert'>
                    ERRO: O email informado já existe.
                </div>";
        }else if($_GET['mensagem'] == 'cadastro_efetuado'){
            echo "<div class='alert alert-success' role='alert'>
                    Cadastro efetuado com sucesso. <span class='btn voltarlogin'>Clique aqui</span> e faça login.
                </div>";
        }
    }
    ?>
            
    <form action="cadastro.php" method="POST">
        <div class="row mb-3 justify-content-center">
            <div class="col-11">
                <input type="text" name="nome_completo" id="nome" placeholder="Nome completo" class="form-control" maxlength="50" required>
            </div>
        </div>

        <div class="row mb-3 justify-content-center">
            <div class="col-11">
                <input type="text" name="cpf" id="cpf" placeholder="CPF" class="form-control" maxlength="11" required>
            </div>
        </div>

        <div class="row mb-3 justify-content-center">
            <div class="col-11">
                <input type="text" name="telefone" id="telefone" placeholder="Telefone" class="form-control" maxlength="20" required>
            </div>
        </div>

        <div class="row mb-3 justify-content-center">
            <div class="col-11">
                <input type="email" name="email" id="email" placeholder="E-mail" class="form-control" maxlength="50" required>
            </div>
        </div>
                    
        <div class="row justify-content-center">
            <div class="col-11">
                <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control" maxlength="8" required>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-11">
                <button type="submit" class="btn btn-dark mt-4 text-uppercase btn-cadastro">Cadastrar</button>
            </div>
        </div>
                    
        <div class="row text-center">
            <div class="col-12">
                <button type="button" class="btn voltarlogin">Já tenho uma conta</button>
            </div>
        </div>
    </form>
</div>