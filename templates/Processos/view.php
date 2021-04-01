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
            <?= $this->Html->link(__('Editar o processo'), ['action' => 'edit', $processo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Deletar o processo'), ['action' => 'delete', $processo->id], ['confirm' => __('Você deseja deletar o processo {0}?', $processo->identificador), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar os processos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Incluir processo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="processos view content">
            <h3><?= h($processo->identificador) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tipo') ?></th>
                    <td><?= h($processo->tipo === 'E') ? 'Exportação' : 'Importação' ?></td>
                </tr>
                <?php if ($processo->tipo === 'E') { ?>
                    <tr>
                        <th><?= __('Pais de Destino Final') ?></th>
                        <td><?= h($processo->pais_destino) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Valor Total') ?></th>
                        <td>R$ <?= $this->Number->format($processo->valor_total, [
                            'precision' => 2,
                            'places' => 2
                        ]) ?></td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><?= __('Via de Transporte') ?></th>
                        <td><?php switch($processo->via_transporte) {
                            case 'A': 
                                echo 'Aéreo';
                                break;
                            case 'M': 
                                echo 'Marítimo';
                                break;
                            case 'T':
                                echo 'Terrestre';
                                break;
                            default:
                                break;
                        } ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Peso Bruto') ?></th>
                        <td><?= $this->Number->format($processo->peso_bruto, [
                            'precision' => 5,
                            'places' => 5
                        ]) ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
