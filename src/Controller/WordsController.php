<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Words Controller
 *
 * @property \App\Model\Table\WordsTable $Words
 *
 * @method \App\Model\Entity\Word[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WordsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $words = $this->paginate($this->Words);

        $this->set(compact('words'));
    }

    /**
     * View method
     *
     * @param string|null $id Word id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $word = $this->Words->get($id, [
            'contain' => ['Weightings']
        ]);

        $this->set('word', $word);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $word = $this->Words->newEntity();
        if ($this->request->is('post')) {
            $word = $this->Words->patchEntity($word, $this->request->getData());
            if ($this->Words->save($word)) {
                $this->Flash->success(__('The word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The word could not be saved. Please, try again.'));
        }
        $this->set(compact('word'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Word id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $word = $this->Words->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $word = $this->Words->patchEntity($word, $this->request->getData());
            if ($this->Words->save($word)) {
                $this->Flash->success(__('The word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The word could not be saved. Please, try again.'));
        }
        $this->set(compact('word'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Word id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $word = $this->Words->get($id);
        if ($this->Words->delete($word)) {
            $this->Flash->success(__('The word has been deleted.'));
        } else {
            $this->Flash->error(__('The word could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
