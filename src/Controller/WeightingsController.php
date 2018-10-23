<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Weightings Controller
 *
 * @property \App\Model\Table\WeightingsTable $Weightings
 *
 * @method \App\Model\Entity\Weighting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WeightingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Words', 'Books']
        ];
        $weightings = $this->paginate($this->Weightings);

        $this->set(compact('weightings'));
    }

    /**
     * View method
     *
     * @param string|null $id Weighting id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $weighting = $this->Weightings->get($id, [
            'contain' => ['Words', 'Books']
        ]);

        $this->set('weighting', $weighting);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $weighting = $this->Weightings->newEntity();
        if ($this->request->is('post')) {
            $weighting = $this->Weightings->patchEntity($weighting, $this->request->getData());
            if ($this->Weightings->save($weighting)) {
                $this->Flash->success(__('The weighting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weighting could not be saved. Please, try again.'));
        }
        $words = $this->Weightings->Words->find('list', ['limit' => 200]);
        $books = $this->Weightings->Books->find('list', ['limit' => 200]);
        $this->set(compact('weighting', 'words', 'books'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Weighting id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $weighting = $this->Weightings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $weighting = $this->Weightings->patchEntity($weighting, $this->request->getData());
            if ($this->Weightings->save($weighting)) {
                $this->Flash->success(__('The weighting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weighting could not be saved. Please, try again.'));
        }
        $words = $this->Weightings->Words->find('list', ['limit' => 200]);
        $books = $this->Weightings->Books->find('list', ['limit' => 200]);
        $this->set(compact('weighting', 'words', 'books'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Weighting id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $weighting = $this->Weightings->get($id);
        if ($this->Weightings->delete($weighting)) {
            $this->Flash->success(__('The weighting has been deleted.'));
        } else {
            $this->Flash->error(__('The weighting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
