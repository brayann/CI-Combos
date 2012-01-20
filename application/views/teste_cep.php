<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
            <label>Estado</label>
            <?php
                $options = array ('' => 'Escolha');
                foreach($estados as $estado)
                    $options[$estado->id] = $estado->nome;
                echo form_dropdown('estado', $options);
            ?>
            <label>Cidade</label>
            <?php echo form_dropdown('cidade', array('' => 'Escolha um Estado'), '','id="cidade"' ); ?>

			<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js'; ?>"></script>
			<script type="text/javascript" src="<?php echo base_url() . 'assets/js/cep.js'; ?>"></script>
			<script type="text/javascript">
			    var path = '<?php echo site_url(); ?>'
			</script>
			
	</body>
</html>