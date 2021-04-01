<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Processo $processo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Deletar o processo'),
                ['action' => 'delete', $processo->id],
                ['confirm' => __('Você deseja deletar o processo {0}?', $processo->identificador), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar os processos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="processos form content">
            <?= $this->Form->create($processo) ?>
            <fieldset>
                <legend><?= __('Editar o processo') ?></legend>
                <?php
                    echo $this->Form->control('identificador',[
                        'placeholder' => 'E-1234-BRASIL',
                        'pattern' => '[a-zA-Z0-9-]*',
                        'oninvalid' => 'setCustomValidity("Informe um identificador utilizando letras e/ou números.")',
                        'oninput' => 'this.value = this.value.toUpperCase()',
                        'required' => true
                    ]);                    
                    
                    if ($processo->tipo === 'E') {
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
                    } else {
                        echo $this->Form->label('Via de Transporte', null, ['id' => 'label_via_transporte']);
                        echo $this->Form->control('via_transporte', [
                            'label' => '',
                            'options' => [
                                'A' => 'Aéreo',
                                'M' => 'Marítimo',
                                'T' => 'Terrestre'
                            ],
                            'id' => 'via_transporte',
                            'required' => 'true'
                        ]);
                        echo $this->Form->label('Peso Bruto', null, ['id' => 'label_peso_bruto']);
                        echo $this->Form->control('peso_bruto', [
                            'label' => '',
                            'type' => 'number',
                            'min' => '0',
                            'step' => '.00001',
                            'id' => 'peso_bruto',
                            'placeholder' => 'Insira o peso bruto',
                            'required' => 'true',
                            'value' => $this->Number->format($processo->peso_bruto, [
                                'precision' => 5,
                                'places' => 5
                            ])
                        ]);
                    }
                ?>
                <button type="submit" class="float-right">Atualizar</button>
            </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
