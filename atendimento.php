<?php include "cabecalho.php"; ?>

<div class="container mt-5">
    <h1 class="mb-4 fs-4 text-uppercase">Atendimento</h1>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Fale Conosco</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Política de Troca</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Política de Privacidade</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="duvidas-tab" data-bs-toggle="tab" data-bs-target="#duvidas" type="button" role="tab" aria-controls="duvidas" aria-selected="false">Dúvidas Frequentes</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane ms-3 fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <form method="POST" action="">
                <div class="row mt-5 mb-2">
                    <div class="col-md-5 col-lg-6">
                        <h2 class="fs-4">Fale Conosco</h2>
                    </div>
                </div>
                
                <div class="row  mb-4">
                    <div class="col-md-5 col-lg-6">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" id="email" name="email" class="form-control" maxlength="50" required>
                        <span class="error"></span>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-5 col-lg-6">
                        <label for="nome" class="form-label">Nome Completo*</label>
                        <input type="text" id="nome" name="nome" class="form-control" required>
                        <span class="error"></span>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-5 col-lg-6">
                        <label for="telefone" class="form-label">Telefone</label><br>
                        <input type="tel" id="telefone" name="telefone" class="form-control" required>
                        <span class="error"></span>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-5 col-lg-6">
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
                    <div class="col-md-5 col-lg-6">
                        <label for="mensagem" class="form-label">Mensagem*</label><br>
                        <textarea id="mensagem" name="mensagem" rows="4" class="form-control" required></textarea>
                        <span class="error"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-lg-6 text-end">
                        <button type="submit" class="btn btn-dark text-uppercase">Enviar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            ...

        </div>

        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            ...
        </div>

        <div class="tab-pane ms-3 fade" id="duvidas" role="tabpanel" aria-labelledby="duvidas-tab">
            <h2 class="fs-4 mt-5">Dúvidas Frequentes</h2>
            <div class="accordion accordion-flush" id="accordionFlushExample">

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Quais são as formas de pagamento aceitas?
                    </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body lh-lg">
                            Você pode realizar a compra através de cartão de crédito e utilizando as seguintes bandeiras: *MasterCard, Visa, Amex, Diners Club e Hipercard.<br>
                            Lembrando que somente aceitamos cartões emitidos no Brasil. É possível também parcelar em até 6x sem juros.<br>
                            *As formas de pagamento aqui descritas estão sujeitas a mudanças sem comunicação prévia.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Qual é o prazo de entrega?
                    </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body lh-lg">
                            Após a finalização da sua compra realizamos a pré-captura do valor e iniciamos a separação do produto, o prazo de entrega começa a contar a após a finalização da separação.<br>
                            O prazo pode variar da forma escolhida na finalização da compra e de sua região.<br>
                            Lembrando que nas compras acima de R$600,00 (somente via PAC) ou, eventualmente, durante ações comerciais específicas, o frete é grátis.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Como rastrear o meu pedido?
                    </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body lh-lg">
                            Nós sempre enviamos e-mails informando sobre o status do seu pedido. No entanto, você também pode acompanhá-lo a qualquer instante, utilizando o link “Minha Conta” > “Meus Pedidos”,
                            na aba superior do site.
                            De qualquer forma, você pode entrar em contato também por telefone, tendo em mão o número de seu CPF ou pedido.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        Posso alterar meu pedido?
                    </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body lh-lg">
                            Você não poderá incluir ou excluir itens de pedido uma vez que ele foi concluído.<br>
                            Já o cancelamento você pode solicitá-lo apenas se a mercadoria não tiver sido faturada, caso a mesma já tenha sito faturada orientamos que faça a recusa do produto no ato da entrega ou após o recebimento entre em contato com nossa central solicitando a devolução do item
                            (atenção o prazo de devolução é de 7 dias corrido após o recebimento).<br>
                            Para saber se a mercadoria foi faturada, entre na seção "Minha Conta". Digite seu e-mail e senha e consulte o pedido. Se o pedido estiver com o status "Transporte", quer dizer que já foi faturado
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                        Posso cancelar o meu pedido?
                    </button>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body lh-lg">
                        Para solicitar o cancelamento do pedido, pedimos que entre em contato com  nossa equipe de atendimento através do Fale Conosco, no rodapé da nossa página o mais rápido possível após a finalização do mesmo, 
                        pois como nosso processo de faturamento e expedição é rápido, pode ser que o mesmo já tenha sido faturado.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                    Posso alterar o endereço de entrega?
                    </button>
                    </h2>
                    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body lh-lg">
                            Se você ainda não finalizou a compra no site, no processo de fechamento do pedido, você poderá alterar o seu endereço clicando em “alterar opções de entrega ”, logo abaixo ao endereço já cadastrado.<br> 
                            Caso já tenha finalizado seu pedido, entre em contato com nosso SAC, o quanto antes, para que possamos te ajudar. 
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include "rodape.php";?>