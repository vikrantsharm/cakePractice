<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\FrozenTime;
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
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        if($this->Auth->user('Type')=='マネージャー') {
            $users = $this->paginate($this->Users);

            $this->set(compact('users'));
        } else {
            $this->Flash->error('You are not authorized.');

            return $this->redirect(['controller' => 'Notice']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user('Type')=='マネージャー') {
            $user = $this->Users->get($id, [
                'contain' => [],
            ]);

            $this->set('user', $user);
        } else {
            $this->Flash->error('You are not authorized.');

            return $this->redirect(['controller' => 'Notice']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->Auth->user('Type')=='マネージャー')  {
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
        } else {
            $this->Flash->error('You are not authorized.');

            return $this->redirect(['controller' => 'Notice']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('Type')=='マネージャー') {
            $user = $this->Users->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->Update_Date = FrozenTime::parse('now')->i18nFormat('yyyy-MM-dd HH:mm:ss', 'Asia/Tokyo');
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has bee updated.'));

                    return $this->redirect(['controller' => 'users']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            $this->set(compact('user'));
        } else {
            $this->Flash->error('You are not authorized.');

            return $this->redirect(['controller' => 'Notice']);
        }
    }
    public function profile($id = null)
    {

            $user = $this->Users->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->Update_Date = FrozenTime::parse('now')->i18nFormat('yyyy-MM-dd HH:mm:ss', 'Asia/Tokyo');
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The profile has been updated.'));

                    return $this->redirect(['controller' => 'Notice']);
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
        if($this->Auth->user('Type')=='マネージャー') {
            $this->request->allowMethod(['post', 'delete']);
            $user = $this->Users->get($id);
            if ($this->Users->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error('You are not authorized.');

            return $this->redirect(['controller' => 'Notice']);
        }
    }

    //Login
    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                return $this->redirect(['controller'=>'Notice']);
            }
            $this->Flash->error('Incorrect Username or Password');
        }
    }
    public function logout()
    {
        $this->Flash->success('You are logged out');
        return $this->redirect($this->Auth->logout());
    }
    public function register()
    {
        $user = $this->Users->newEntity();
        if($this->request->is('post')){
           $user = $this->Users->patchEntity($user,$this->request->data);
            $user->Update_Date = FrozenTime::parse('now')->i18nFormat('yyyy-MM-dd HH:mm:ss','Asia/Tokyo');
            $user->Creation_Date = FrozenTime::parse('now')->i18nFormat('yyyy-MM-dd HH:mm:ss','Asia/Tokyo');
           if($this->Users->save($user)){
               $this->Flash->success('You are successfully registered');
               return $this->redirect(['action'=>'login']);
           } else {
               $this->Flash->error('Something went wrong');
           }
        }
        $this->set(compact('user'));
        $this->set('_serialize',['user']);
    }
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['register']);
       // return parent::beforeFilter($event); // TODO: Change the autogenerated stub
    }
}
