<?php include "cabecalho.php" ?>

    <div class="contato">
        <section class="menu-atendimento">
            <h2 class="atendimento">Atendimento</h2>
            <p><a href="contato.php" class="active">Fale conosco</a></p>
            <p><a href="#">Política de troca</a></p>
            <p><a href="#">Política de privacidade</a></p>
            <p><a href="duvidas.php">Dúvidas frequentes</a></p>
        </section>

        <section class="formulario-contato">
            <strong>Fale Conosco</strong>
            <form method="POST" action="">
                <p>
                    <label for="email">Email*</label><br>
                    <input type="email" id="email" name="email" required>
                    <span class="error"></span>
                </p>
                <p>
                    <label for="nome">Nome Completo*</label><br>
                    <input type="text" id="nome" name="nome" required>
                    <span class="error"></span>
                </p>
                <p>
                    <label for="telefone">Telefone</label><br>
                    <input type="tel" id="telefone" name="telefone" required>
                    <span class="error"></span>
                </p>
                <p>
                    <label for="motivo">Motivo do Contato*</label><br>
                    <select id="motivo" name="motivo">
                        <option value="">Selecione</option>
                        <option value="elogio">Elogio</option>
                        <option value="reclamação">Reclamação</option>
                        <option value="sugestão">Sugestão</option>
                        <option value="dúvida">Dúvida</option>
                        <option value="troca">Troca</option>
                    </select>
                </p>
                <p>
                    <label for="mensagem">Mensagem*</label><br>
                    <textarea id="mensagem" name="mensagem" rows="6" cols="68" required></textarea>
                    <span class="error"></span>
                </p>
                <button type="submit">Enviar</button>
            </form>
        </section>
    </div>

<?php include "rodape.php" ?>