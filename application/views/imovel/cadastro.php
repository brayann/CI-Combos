
<?php echo form_open( site_url() . '/imovel/post' ) ?>
<div id="cadastrais">
    <?php echo validation_errors(); ?>
    <table class="tbl_cadastro">
    <tbody>
        <tr>
            <td colspan="3">
                <label>Nome</label>
                <input type="text" size="50" name="nome" value="<?php echo set_value('nome') ?>" />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                 <label>Endereço</label>
                 <input type="text" size="50" name="endereco" value="<?php echo set_value('endereco') ?>" />
            </td>
            <td>
                <label>Bairro</label>
                <input type="text" name="bairro" size="30" value="<?php echo $this->input->post('bairro') ?>" />
            </td>
        </tr>
        <tr>
            <td>
                <label>Número</label>
                <input type="text" size="8" name="numero" maxlenght="6" value="<?php echo set_value('numero') ?>" />
            </td>
            <td>
                <label>Complemento</label>
                <input type="text" size="8" name="complemento" value="<?php echo set_value('complemento') ?>" />
            </td>
        </tr>
        <tr>
            <td>
                <label>Estado</label>
                <?php
                    $options = array ('' => 'Escolha');
                    foreach($estados as $estado)
                        $options[$estado->id] = $estado->nome;
                    echo form_dropdown('estado', $options);
                ?>
            </td>
            <td>
                <label>Cidade</label>
                <?php echo form_dropdown('cidade', array('' => 'Escolha um Estado'), '','id="cidade"' ); ?>
            </td>
        </tr>


        <tr>
            <?php if (count($edificios->num_rows()) > 0) { ?>
                <td>
                    <label>Edifício</label>
                    <?php
                        foreach($edificios->result() as $edificio)
                            $option[$edificio->id] = $edificio->nome;

                        echo form_dropdown('edificio',$option);
                    ?>
                </td>
            <?php } ?>
                <td>
                        <label>Condomínio</label>
                        <select name="condominio" id="">
                                <option value="">Selecione um Condomínio</option>
                        </select>
                </td>
        </tr>
        <?php if (count($clientes->num_rows()) > 0) { ?>
            <tr>
                <td>
                    <label>Cliente</label>
                    <?php
                        foreach($clientes->result() as $cliente)
                            $option[$cliente->id] = $cliente->nome;

                        echo form_dropdown('cliente',$option);
                    ?>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td>
                <label>Preço Aluguel</label>
                <input type="text" name="preco_aluguel" class="preco" value="<?php echo set_value('preco_aluguel'); ?>" />
            </td>
            <td>
                <label>Preço Venda</label>
                <input type="text" name="preco_venda" class="preco" value="<?php echo set_value('preco_venda'); ?>" />
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <label for="descricao">Descrição do Imóvel</label>
                <textarea name="descricao" id="descricao" cols="60" rows="10"><?php echo set_value('descricao'); ?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center" class="enviar">
                <input type="submit" name="enviar" value="Cadastrar" class="enviar" />
            </td>
        </tr>
    </tbody>
</table>

<?php echo form_close(); ?>

<script type="text/javascript" src="<?php echo base_url() . 'assets/js/cep.js'; ?>"></script>
<script type="text/javascript">
    var path = '<?php echo site_url(); ?>'
</script>