<?php
namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;
use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('auth');
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Counters', 'UserCounters']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        $this->viewBuilder()->setLayout('non_auth');
        if(!empty($this->Auth->user('id'))) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $user = $this->Auth->identify();
                if ($user) {
                    $this->Auth->setUser($user);
                    $this->Flash->success('You are successfuly logged in.');
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error('Your username or password is incorrect.');
                }
            } else {
                $this->Flash->error('Invalid email address. Please check.');
            }
        }
    }

    public function register() {
        $this->viewBuilder()->setLayout('non_auth');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Successfuly Registerd. Please login to continue.'));
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('Please check the form for errors.'));
            }
        }
        $this->set(compact('user'));
    }

    public function logout() {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function dashboard() {
        $this->viewBuilder()->setLayout('auth');
        $query = "SELECT c.name as counter_name, un.name as unit_name, sum(uc.quantity) as quantity, max(uc.created) as last_updated from user_counters as uc
                    JOIN counters as c ON uc.counter_id = c.id
                    JOIN units as un ON uc.unit_id = un.id
                    GROUP by counter_name, unit_name
                    ORDER by last_updated DESC ";
        $connection = ConnectionManager::get('default');
        $dashboardStats = $connection->execute($query)->fetchAll('assoc');
        $this->set(compact('dashboardStats'));
    }

}
