<?php
echo $this->Html->script('jquery-3.6.0.min.js');
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar os processos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="processos form content">
            <?= $this->Form->create($processo) ?>
            <fieldset>
                <legend><?= __('Incluir processo') ?></legend>
                <?php
                    echo $this->Form->control('tipo', [
                        'label' => 'Tipo',
                        'options' => [
                            'E' => 'Exportação',
                            'I' => 'Importação'
                        ],
                        'default' => 'E'
                    ]);
                    echo $this->Form->control('identificador',[
                        'placeholder' => 'E-1234-BRASIL',
                        'pattern' => '[a-zA-Z0-9-]*',
                        'oninvalid' => 'setCustomValidity("Informe um identificador utilizando letras e/ou números.")',
                        'oninput' => 'this.value = this.value.toUpperCase()',
                        'required' => true
                    ]);
                    echo $this->Form->label('pais_destino', 'País de destino final', ['id' => 'label_pais_destino']);
                    echo $this->Form->control('pais_destino', [
                        'label' => '',
                        'placeholder' => 'Exemplo: Brasil',
                        'type' => 'text',
                        'pattern' => '[A-Za-z]+',
                        'oninvalid' => 'setCustomValidity("Insira o nome de um país utilizando apenas letras.")',
                        'id' => 'pais_destino',
                        'required' => 'true'
                    ]);
                    echo $this->Form->label('Valor Total', null, ['id' => 'label_valor_total']);
                    echo $this->Form->control('valor_total', [
                        'label' => '',
                        'placeholder' => 'Exemplo: 25,99',
                        'id' => 'valor_total',
                        'required' => 'true'
                    ]);
                    echo $this->Form->label('Via de Transporte', null, ['id' => 'label_via_transporte', 'style' => 'display: none;']);
                    echo $this->Form->control('via_transporte', [
                        'label' => '',
                        'options' => [
                            'A' => 'Aéreo',
                            'M' => 'Marítimo',
                            'T' => 'Terrestre'
                        ],
                        'id' => 'via_transporte',
                        'style' => 'display: none;'
                    ]);
                    echo $this->Form->label('Peso Bruto', null, ['id' => 'label_peso_bruto', 'style' => 'display: none;']);
                    echo $this->Form->control('peso_bruto', [
                        'label' => '',
                        'type' => 'number',
                        'min' => '0',
                        'step' => '.00001',
                        'id' => 'peso_bruto',
                        'placeholder' => 'Insira o peso bruto',
                        'style' => 'display: none;'
                    ]);
                ?>
                
                <button type="submit" class="float-right">Adicionar</button>
            </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // controle dos campos de exportação/importação
        $('#tipo').on('change', function() {
            switch($(this).val()) {
                case 'E':
                    // exibir os campos da exportação
                    $('#label_pais_destino').show();
                    $('#pais_destino').attr('required', true);
                    $('#pais_destino').show();
                    $('#label_valor_total').show();
                    $('#valor_total').attr('required', true);
                    $('#valor_total').show();

                    // ocultar e limpar os campos da importação
                    $('#label_via_transporte').hide();
                    $('#via_transporte').attr('required', false);
                    $('#via_transporte').val('');
                    $('#via_transporte').hide();
                    $('#label_peso_bruto').hide();
                    $('#peso_bruto').attr('required', false);
                    $('#peso_bruto').val('');
                    $('#peso_bruto').hide();

                    break;
                case 'I':
                    // exibir os campos da importação
                    $('#label_via_transporte').show();
                    $('#via_transporte').attr('required', true);
                    $('#via_transporte').show();
                    $('#label_peso_bruto').show();
                    $('#peso_bruto').attr('required', true);
                    $('#peso_bruto').show();

                    // ocultar e lmpar os campos da exportação
                    $('#label_pais_destino').hide();
                    $('#pais_destino').attr('required', false);
                    $('#pais_destino').val('');
                    $('#pais_destino').hide();
                    $('#label_valor_total').hide();
                    $('#valor_total').attr('required', false);
                    $('#valor_total').val('');
                    $('#valor_total').hide();
                    
                    break;
                default:
                    break;
            }
        });
    });
</script>