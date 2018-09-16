<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Counters Controller
 *
 * @property \App\Model\Table\CountersTable $Counters
 *
 * @method \App\Model\Entity\Counter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CountersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $counters = $this->paginate($this->Counters);

        $this->set(compact('counters'));
    }

    /**
     * View method
     *
     * @param string|null $id Counter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $counter = $this->Counters->get($id, [
            'contain' => ['Users', 'UserCounters']
        ]);

        $this->set('counter', $counter);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('auth');
        if ($this->request->is('post')) {
            $counterId = $this->checkExistingCounter($this->request->getData('name'));
            $unitId = $this->checkExistingUnits($this->request->getData('unit_name'));
            $quantity = $this->request->getData('quantity');
            $savedUserCounter = $this->saveUserCounter($counterId, $unitId, $quantity);
            if($savedUserCounter) {
                $this->Flash->success(__('The counter has been saved.'));
            }
            else {
                $this->Flash->error(__('The counter could not be saved. Please, try again.'));
            }
        }
        $myCounters = $this->Counters->UserCounters->find('all', array(
            'conditions' => array(
                'UserCounters.user_id' => $this->Auth->user('id')
                ),
            'fields' => array('Counters.name', 'Units.name', 'UserCounters.quantity', 'UserCounters.modified', 'UserCounters.id'),
            'contain' => array('Units','Counters'),
            'order' => array('UserCounters.modified DESC')
            )
        )->toArray();
        $this->set(compact('myCounters'));
        // pr($myCounters);
    }


    public function checkExistingCounter($name) {
        $counter = $this->Counters->find('all', array(
            'conditions' => array(
                'name' => $name
                )
            )
        )->first(); 
        if(empty($counter)) {
            $counter = $this->Counters->newEntity();
            $counterData['name'] = $name;
            $counterData['user_id'] = $this->Auth->user('id');
            $counter = $this->Counters->patchEntity($counter, $counterData);
            $counterSave = $this->Counters->save($counter);
            return $counterSave->id;
        }
        return $counter->id;
    }


    public function checkExistingUnits($name) {
        $unit = $this->Counters->UserCounters->Units->find('all', array(
            'conditions' => array(
                'name' => $name
                )
            )
        )->first();
        if(empty($unit)) {
            $unit = $this->Counters->UserCounters->Units->newEntity();
            $unitData['name'] = $name;
            $unitData['is_custom'] = 1;
            $unitData['user_id'] = $this->Auth->user('id');
            $unit = $this->Counters->UserCounters->Units->patchEntity($unit, $unitData);
            $unitSave = $this->Counters->UserCounters->Units->save($unit);
            return $unitSave->id;
        }
        return $unit->id;        
    }

    public function saveUserCounter($counterId, $unitId, $quantity) {
        $userCounter = $this->Counters->UserCounters->newEntity();
        $userCounterData['user_id'] = $this->Auth->user('id');
        $userCounterData['counter_id'] = $counterId;
        $userCounterData['unit_id'] = $unitId;
        $userCounterData['quantity'] = $quantity;
        $userCounter = $this->Counters->UserCounters->patchEntity($userCounter, $userCounterData);
        $userCounterSave = $this->Counters->UserCounters->save($userCounter);
        return $userCounterSave->id;

    }

    /**
     * Edit method
     *
     * @param string|null $id Counter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $counter = $this->Counters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $counter = $this->Counters->patchEntity($counter, $this->request->getData());
            if ($this->Counters->save($counter)) {
                $this->Flash->success(__('The counter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The counter could not be saved. Please, try again.'));
        }
        $users = $this->Counters->Users->find('list', ['limit' => 200]);
        $this->set(compact('counter', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Counter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $counter = $this->Counters->get($id);
        if ($this->Counters->delete($counter)) {
            $this->Flash->success(__('The counter has been deleted.'));
        } else {
            $this->Flash->error(__('The counter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getCounters() {
        $processedCounters = [];
        $counters = $this->Counters->find('list')->toArray();
        foreach ($counters as $key => $counter) {
            $processedCounters[$counter] = "https://placehold.it/25x/25";
        }
        echo json_encode($processedCounters); exit;
    }
}
