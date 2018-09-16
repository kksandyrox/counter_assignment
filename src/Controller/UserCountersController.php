<?php
namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use App\Controller\AppController;

/**
 * UserCounters Controller
 *
 * @property \App\Model\Table\UserCountersTable $UserCounters
 *
 * @method \App\Model\Entity\UserCounter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserCountersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Counters', 'Units']
        ];
        $userCounters = $this->paginate($this->UserCounters);

        $this->set(compact('userCounters'));
    }

    /**
     * View method
     *
     * @param string|null $id User Counter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userCounter = $this->UserCounters->get($id, [
            'contain' => ['Users', 'Counters', 'Units']
        ]);

        $this->set('userCounter', $userCounter);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userCounter = $this->UserCounters->newEntity();
        if ($this->request->is('post')) {
            $userCounter = $this->UserCounters->patchEntity($userCounter, $this->request->getData());
            if ($this->UserCounters->save($userCounter)) {
                $this->Flash->success(__('The user counter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user counter could not be saved. Please, try again.'));
        }
        $users = $this->UserCounters->Users->find('list', ['limit' => 200]);
        $counters = $this->UserCounters->Counters->find('list', ['limit' => 200]);
        $units = $this->UserCounters->Units->find('list', ['limit' => 200]);
        $this->set(compact('userCounter', 'users', 'counters', 'units'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Counter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {   
        $userCounterId = $this->request->getData('user_counter_id');
        $quantity = $this->request->getData('quantity');
        $updateQuery = "UPDATE user_counters as uc set uc.quantity = " . $quantity . ", uc.modified = NOW() WHERE uc.id = " . $userCounterId;
        $connection = ConnectionManager::get('default');
        $counterStats = $connection->execute($updateQuery);
        $this->Flash->success("Updated quantity successfuly.");
        return $this->redirect(array('action' => 'add', 'controller' => 'counters'));

    }

    function getUserCounterData() {
        $userCounterId = $this->request->getData('id');
        $userCounterData = $this->UserCounters->find('all', array('conditions' => array('UserCounters.id' => $userCounterId)))->first()->toArray();
        $counterName = $this->UserCounters->Counters->find('all', array('conditions' => array('Counters.id' => $userCounterData['counter_id'])))->first()->toArray()['name'];
        $unitName =  $this->UserCounters->Units->find('all', array('conditions' => array('Units.id' => $userCounterData['unit_id'])))->first()->toArray()['name'];
        $data['counter_name'] = $counterName;
        $data['unit_name'] = $unitName;
        $data['quantity'] = $userCounterData['quantity'];
        $data['user_counter_id'] = $userCounterId;
        echo json_encode($data); exit;
    }

    /**
     * Delete method
     *
     * @param string|null $id User Counter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userCounter = $this->UserCounters->get($id);
        if ($this->UserCounters->delete($userCounter)) {
            $this->Flash->success(__('The user counter has been deleted.'));
        } else {
            $this->Flash->error(__('The user counter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'add', 'controller' => 'counters']);
    }

    public function statistics() {
        $this->viewBuilder()->setLayout('auth');
        if($this->request->is('post')) {

            $startDate = $this->request->getData('start_date');
            $endDate = $this->request->getData('end_date');
            $counterName = $this->request->getData('name');
            $unitName = $this->request->getData('unit_name');

            $diff = date_diff(date_create($startDate), date_create($endDate));
            $daysDifference = $diff->days;    


            if($daysDifference <= 30) {
                $query = "SELECT u.id, c.name, un.name, sum(uc.quantity) as quantity, CONCAT(day(uc.created), '/', monthname(uc.created)) as created from users as u ".
                         "JOIN user_counters as uc on uc.user_id = u.id ".
                         "JOIN counters as c on c.id = uc.counter_id ".
                         "JOIN units as un on un.id = uc.unit_id ".
                         "WHERE c.name = '" . $counterName . "' and un.name = '" . $unitName . "' ".
                         "group by day(uc.created)";



                $connection = ConnectionManager::get('default');
                $counterStats = $connection->execute($query)->fetchAll('assoc');

                $startDay = date('j', strtotime($startDate));
                $endDay = date('j', strtotime($endDate));
                $createdClause = "CONCAT(day(uc.created), '/', monthname(uc.created)) as created";

                $labels = [];
                $chartValue = [];

                $startDateN = strtotime($startDate);
                $endDateN = strtotime($endDate);

                for($i = $startDateN; $i <= $endDateN; $i+=86400) {
                    array_push($labels, date("j/F", $i));
                }
                foreach ($labels as $key => $label) {
                    foreach ($counterStats as $stats) {
                        if($label == $stats['created']) {
                            $chartValue[$key] = $stats['quantity'];
                        }
                    }
                }

                for($i = 0 ; $i <= $daysDifference  ;$i ++) {
                    if(empty($chartValue[$i])) {
                        $chartValue[$i] = 0;
                    }
                }
                ksort($chartValue);
                $labels = json_encode($labels);
                $chartValue = json_encode($chartValue);
            }
            else {
                $query = "SELECT u.id, c.name, un.name, sum(uc.quantity) as quantity, monthname(uc.created) as created from users as u ".
                         "JOIN user_counters as uc on uc.user_id = u.id ".
                         "JOIN counters as c on c.id = uc.counter_id ".
                         "JOIN units as un on un.id = uc.unit_id ".
                         "WHERE c.name = '" . $counterName . "' and un.name = '" . $unitName . "' ".
                         "group by monthname(uc.created)";



                $connection = ConnectionManager::get('default');
                $counterStats = $connection->execute($query)->fetchAll('assoc');                
                $chartValue = [];
                $labels = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                foreach ($labels as $key => $label) {
                    foreach ($counterStats as $stats) {
                        if($label == $stats['created']) {
                            $chartValue[$key] = $stats['quantity'];
                        }
                    }
                }
                for($i = 0 ; $i < 12 ;$i ++) {
                    if(empty($chartValue[$i])) {
                        $chartValue[$i] = 0;
                    }
                }
                ksort($chartValue);
                $labels = json_encode($labels);
                $chartValue = json_encode($chartValue);
            }            
            $zzz = $unitName;
            $this->set(compact('chartValue', 'labels', 'zzz', 'counterName', 'unitName', 'startDate', 'endDate'));
        }
    }

}
