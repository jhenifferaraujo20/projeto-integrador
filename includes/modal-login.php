<div class="modal-login pt-0">
    <div class="row justify-content-end">
        <div class="col-md-2">
            <button class="btn fechar-login"><i class="bi bi-x"></i></button>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="text-uppercase">Login</h2>
        </div>
    </div>

    <?php
    if(isset($_GET['mensagem'])){
        if($_GET['mensagem'] == 'invalido'){
            echo "<div class='alert alert-danger' role='alert'>
                    ERRO: Usuário ou senha inválidos.
                </div>";
        }else if($_GET['mensagem'] == 'login'){
            echo "<div class='alert alert-warning' role='alert'>
                    ERRO: Efetue login para continuar.
                </div>";
        }
    }
    ?>
    
    <form action="login.php" method="POST">
        <div class="row mb-3 justify-content-center">
            <div class="col-11">
                <input id="emailLogin" type="email" name="email" placeholder="E-mail" class="form-control" maxlength="50" required>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-11">
                <input id="senhaLogin" type="password" name="senha" placeholder="Senha" class="form-control" maxlength="8" required>
            </div>
        </div>

        <div class="row justify-content-end">
            <div class="col-6">
                <button type="button" class="btn esqueci-senha">Esqueci minha senha</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-11">
                <button type="submit" class="btn btn-dark mt-3 text-uppercase btn-login">Entrar</button>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-12">
                <button type="button" class="btn cadastro" id="botao-cadastro">Ainda não tem conta? Cadastre-se</button>
            </div>
        </div>
    </form>
</div>