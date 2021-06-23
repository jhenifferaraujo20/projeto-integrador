<?php include "cabecalho.php" ?>

    <div class="container">
        <div class="row mt-5">
            <section class="menu-atendimento col-md-4">
                <h2 class="text-uppercase fs-5 mb-4">Atendimento</h2>
                <p><a href="contato.php" class="active">Fale conosco</a></p>
                <p><a href="#">Política de troca</a></p>
                <p><a href="#">Política de privacidade</a></p>
                <p><a href="duvidas.php">Dúvidas frequentes</a></p>
            </section>

            <section class="col-md-7 col-lg-8">
                <h2 class="fs-4">Fale Conosco</h2>
                <form method="POST" action="">
                    <div class="row mb-4">
                        <div class="col-md-5 col-lg-8">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" id="email" name="email" class="form-control" maxlength="50" required>
                            <span class="error"></span>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-5 col-lg-8">
                            <label for="nome" class="form-label">Nome Completo*</label>
                            <input type="text" id="nome" name="nome" class="form-control" required>
                            <span class="error"></span>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-5 col-lg-8">
                            <label for="telefone" class="form-label">Telefone</label><br>
                            <input type="tel" id="telefone" name="telefone" class="form-control" required>
                            <span class="error"></span>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-5 col-lg-8">
                            <label for="motivo" class="form-label">Motivo do Contato*</label><br>
                            <select id="motivo" name="motivo" class="form-select">
                                <option value="">Selecione</option>
                                <option value="elogio">Elogio</option>
                                <option value="reclamação">Reclamação</option>
                                <option value="sugestão">Sugestão</option>
                                <option value="dúvida">Dúvida</option>
                                <option value="troca">Troca</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-5 col-lg-8">
                            <label for="mensagem" class="form-label">Mensagem*</label><br>
                            <textarea id="mensagem" name="mensagem" rows="4" class="form-control" required></textarea>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-4 col-lg-6">
                            <button type="submit" class="btn btn-dark text-uppercase">Enviar</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>

<?php include "rodape.php" ?>