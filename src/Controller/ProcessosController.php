<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Processos Controller
 *
 * @property \App\Model\Table\ProcessosTable $Processos
 *
 * @method \App\Model\Entity\Processo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProcessosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $processos = $this->paginate($this->Processos);

        $this->set(compact('processos'));
    }

    /**
     * View method
     *
     * @param string|null $id Processo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $processo = $this->Processos->get($id, [
            'contain' => [],
        ]);

        $this->set('processo', $processo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $processo = $this->Processos->newEmptyEntity();
        if ($this->request->is('post')) {
            $processo = $this->Processos->patchEntity($processo, $this->request->getData());
            if ($this->Processos->save($processo)) {
                $this->Flash->success(__('O processo foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar o processo. Por favor, tente novamente.'));
        }
        $this->set(compact('processo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Processo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $processo = $this->Processos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $processo = $this->Processos->patchEntity($processo, $this->request->getData());
            if ($this->Processos->save($processo)) {
                $this->Flash->success(__('O processo foi atualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível atualizar o processo. Por favor, tente novamente.'));
        }
        $this->set(compact('processo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Processo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $processo = $this->Processos->get($id);
        if ($this->Processos->delete($processo)) {
            $this->Flash->success(__('O processo foi deletado.'));
        } else {
            $this->Flash->error(__('Não foi possível deletar o processo. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
