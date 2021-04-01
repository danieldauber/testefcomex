<div class="processos index content">
    <?= $this->Html->link(__('Incluir processo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Processos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width: 40%;"><?= $this->Paginator->sort('identificador') ?></th>
                    <th style="width: 30%;"><?= $this->Paginator->sort('tipo') ?></th>
                    <th class="actions" style="width: 30%;"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($processos as $processo): ?>
                <tr>
                    <td><?= h($processo->identificador) ?></td>
                    <td><?= h($processo->tipo) === 'E' ? 'Exportação' : 'Importação' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Consultar'), ['action' => 'view', $processo->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $processo->id]) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $processo->id], ['confirm' => __('Você deseja deletar o processo {0}?', $processo->identificador)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination" style="margin-top: 2vh;">
            <?= $this->Paginator->first('<< ' . __('Primeira página')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próxima') . ' >') ?>
            <?= $this->Paginator->last(__('Última página') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}}/{{pages}} - {{current}} processo(s) listado(s) - Total de {{count}} cadastrado(s)')) ?></p>
    </div>
</div>
