                </div>
            </div>
        </div>
    </div>

    <!--jQuery-->
    <script src="../js/jquery-3.5.1.js"></script>
    <!-- bootstrap -->
    <script src="../bootstrap/bootstrap.bundle.js"></script>
    <!-- slick-slider-->
    <script src="../slick/slick.js"></script>
    <!--javascript-->
    <script src="../js/funcoes.js"></script>
    <script src="app.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#id_categoria').change(function(){
                if( $(this).val() ) {
                    $('#id_subcategoria').hide();
                    $('.carregando').show();
                    $.getJSON('subcategorias.php?search=',{id_categoria: $(this).val(), ajax: 'true'}, function(j){
                        var options = '<option value="">Escolha a subcategoria</option>';	
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].id + '">' + j[i].subcategoria + '</option>';
                        }	
                        $('#id_subcategoria').html(options).show();
                        $('.carregando').hide();
                    });
                } else {
                    $('#id_subcategoria').html('<option value="">– Escolha a subcategoria –</option>');
                }
            });
        });
    </script>
    <script type="text/javascript">
		$("#cep").focusout(function(){
			//Início do Comando AJAX
			$.ajax({
				//O campo URL diz o caminho de onde virá os dados
				//É importante concatenar o valor digitado no CEP
				url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
				//Aqui você deve preencher o tipo de dados que será lido,
				//no caso, estamos lendo JSON.
				dataType: 'json',
				//SUCESS é referente a função que será executada caso
				//ele consiga ler a fonte de dados com sucesso.
				//O parâmetro dentro da função se refere ao nome da variável
				//que você vai dar para ler esse objeto.
				success: function(resposta){
					//Agora basta definir os valores que você deseja preencher
					//automaticamente nos campos acima.
					$("#rua").val(resposta.logradouro);
					$("#complemento").val(resposta.complemento);
					$("#bairro").val(resposta.bairro);
					$("#cidade").val(resposta.localidade);
					$("#uf").val(resposta.uf);
					//Vamos incluir para que o Número seja focado automaticamente
					//melhorando a experiência do usuário
					$("#numero").focus();
				}
			});
		});
	</script>
</body>
</html>