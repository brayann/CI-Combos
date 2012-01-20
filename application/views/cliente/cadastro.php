<div class="center" id="status"></div>
<?php if($this->session->flashdata('msg')){ ?><div class="center sucesso"><?php echo $this->session->flashdata('msg'); ?></div><?php } ?>
<h3 id="title_cadastrais">&raquo; Dados Cadastrais</h3>

<div id="dados_cadastrais">
	
	<?php

		echo form_open( current_url(),'id="cadastrais"' ) . PHP_EOL;
			echo '<div class="center msg_cadastrais"></div>';
			echo form_label('Nome Completo','nome') . PHP_EOL;
			echo form_input( 'nome', set_value('nome'), 'id="nome"' ) . PHP_EOL;
		
			echo form_label('Telefone', 'telefone') . PHP_EOL;
			echo form_input( 'telefone', set_value('telefone'), 'id="telefone"' ) . PHP_EOL;
		
			echo form_label('Celular', 'celular') . PHP_EOL;
			echo form_input( 'celular', set_value('celular'), 'id="celular"' )  . PHP_EOL;
		
			echo form_label('E-Mail', 'email') . PHP_EOL;
			echo form_input( 'email', set_value('email'), 'id="email"' )  . PHP_EOL;
		
	?>
</div>

<h3 id="title_pessoais">&raquo; Informa&ccedil;&otilde;es Pessoais</h3>
<div id="dados_pessoais">
<?php
		
			echo form_label('Endere&ccedil;o', 'endereco');
 			echo form_input ('endereco',set_value('endereco'), 'id="endereco" maxlength="100"' );

			$options = array ('' => 'Escolha');
			foreach($estados as $estado)
				$options[$estado->id] = $estado->nome;
			
			echo form_label('Estado','estado');
			echo form_dropdown('estado', $options);
			
			echo form_label('Cidade','cidade');
			echo form_dropdown('cidade', array('' => 'Escolha um Estado'), '','id="cidade"' );
			
			echo form_label('CPF','cpf');
			echo form_input ('cpf',set_value('cpf'), 'id="cpf"' );
			
			echo form_label('RG','rg');
			echo form_input ('rg',set_value('rg'), 'id="rg" maxlength="20"' );
			
			echo form_label('Nascimento','data_nasc');
			echo form_input ('nascimento',set_value('nascimento'), 'id="data_nasc"' );
			
			echo form_label('Observações', 'obs');
			$text = array(
						'name' 	=> 'obs',
						'id'	=> 'obs',
						'rows'	=> 10,
						'cols'	=> 70
					);
			echo form_textarea($text);
			
			echo '<br /><br />' . form_submit('enviar','Enviar','id="pessoais"') . PHP_EOL;
		
		echo form_close();
		
	?>
	
</div>

<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.maskedinput.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/cep.js'; ?>"></script>
<script type="text/javascript">

	var path = '<?php echo site_url() ?>';

	$(function(){

		$("#data_nasc").mask("99/99/9999");
		$("#cpf").mask("999.999.999-99");
		$("#telefone").mask("(99) 9999-9999");
		$("#celular").mask("(99) 9999-9999");
		
		$("#title_cadastrais").click(function(){ //deixa editar os dados ao clicar no titulo
			$("#dados_cadastrais").slideToggle();
		});
		
		$("#title_pessoais").click(function(){ //deixa editar os dados ao clicar no titulo
			$("#dados_pessoais").slideToggle();
		});
		
		var i = 0;

		$("#cadastrais").submit(function(e){ //cadastro inicial
			
			var name 	= $("#nome").val();
			var fone 	= $("#telefone").val();
			var cel 	= $("#celular").val();
			var mail	= $("#email").val();
			var city	= $('#cidade').find('option').filter(':selected').val();
			var cpf		= $('#cpf').val();
			var rg		= $('#rg').val();
			var nasc	= $('#nasc').val();
			var obs		= $('#obs').val();
			//alert (city); //return false;
			
			$.post( path + "/cliente/valida_dados", 
				{ nome : name, telefone : fone, celular : cel, email : mail, cidade : city }, 
				
				function (event){

					resp = event.split('|');
					//alert(resp[1]);
					if ( resp[0] === 'true' ) {	
				
						$("#dados_cadastrais").fadeOut("slow", function(){
						
							$(".msg_cadastrais").html('Dados Cadastrais Ok !').addClass('sucesso').fadeIn("slow");
							if (resp[1] !== 'true')
								$("#dados_pessoais").fadeIn("slow");

						});
					
					}
					else {
						$("#dados_cadastrais").fadeIn("slow");
						$(".msg_cadastrais").hide();
					}
				
					if( resp[0] !== 'true' || resp[1] !== 'true')
						$("#status").html(resp[1]).addClass('erro').fadeIn("slow");
					else {
						$("#status").fadeOut("slow");
						// faz algo do tipo msg cadastrou com sucesso, reseta form.
					}
				}
			);

			e.preventDefault();

		});
		
	});
	
</script>