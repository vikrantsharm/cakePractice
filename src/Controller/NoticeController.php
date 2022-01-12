<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\I18n\FrozenTime;

/**
 * Notice Controller
 *
 * @property \App\Model\Table\NoticeTable $Notice
 *
 * @method \App\Model\Entity\Notice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
//public function __construct(ServerRequest $request = null, Response $response = null, $name = null, $eventManager = null, $components = null)
//{
//    if($this->request->getSession()){
//        $this->set('loggedIn',true);
//        $this->set('userId', $this->Auth->user('Id'));
//        $this->set('Type', $this->Auth->user('Type'));
//    } else {
//        $this->set('loggedIn',false);
//    }
//}
class NoticeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function index()
    {
        $notice = $this->paginate($this->Notice->find('all')->select(['id','Subject','Content','Author','Creation_Date','Update_Date','Users.Name'])->contain('Users'
        )->where(['IsDeleted !='=>true]));


        $this->set(compact('notice'));
    }

    /**
     * View method
     *
     * @param string|null $id Notice id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notice = $this->Notice->get($id, [
            'contain' => 'Users',
        ]);

        $this->set('notice', $notice);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notice = $this->Notice->newEntity();
        if ($this->request->is('post')) {
            $notice = $this->Notice->patchEntity($notice, $this->request->getData());
            $notice->Author=$this->Auth->user('Id');
            $notice->Creation_Date=FrozenTime::parse('now')->i18nFormat('yyyy-MM-dd HH:mm:ss','Asia/Tokyo');
            $notice->Update_Date=FrozenTime::parse('now')->i18nFormat('yyyy-MM-dd HH:mm:ss','Asia/Tokyo');
            $notice->IsDeleted=false;
            if ($this->Notice->save($notice)) {
                $this->Flash->success(__('The notice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notice could not be saved. Please, try again.'));
        }
        $this->set(compact('notice'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Notice id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('Id')==$this->Notice->get($id)->Author || $this->Auth->user('Type')=='マネージャー') {
        $notice = $this->Notice->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $notice = $this->Notice->patchEntity($notice, $this->request->getData());

               $notice->Update_Date = FrozenTime::parse('now')->i18nFormat('yyyy-MM-dd HH:mm:ss', 'Asia/Tokyo');
               if ($this->Notice->save($notice)) {
                   $this->Flash->success(__('The notice has been saved.'));

                   return $this->redirect(['action' => 'index']);
               }
               $this->Flash->error(__('The notice could not be saved. Please, try again.'));


           }
            $this->set(compact('notice'));
        } else {
//            $this->Flash->error('You are not authorized.');
//
//            return $this->redirect(['action' => 'index']);
            throw new ForbiddenException();
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Notice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if($this->Auth->user('Id')==$this->Notice->get($id)->Author||$this->Auth->user('Type')=='マネージャー')  {
            $this->request->allowMethod(['post', 'delete']);
            $notice = $this->Notice->get($id);
            $notice->IsDeleted = true;
            if ($this->Notice->save($notice)) {
                $this->Flash->success(__('The notice has been deleted.'));
            } else {
                $this->Flash->error(__('The notice could not be deleted. Please, try again.'));
            }

        } else {
//            $this->Flash->error('You are not authorized.');
            throw new ForbiddenException();

        }
        return $this->redirect(['action' => 'index']);
    }
    public function beforeFilter(Event $event)
    {
        // return parent::beforeFilter($event); // TODO: Change the autogenerated stub
        if($this->request->session()->read('Auth.User')){
            $this->set('loggedIn',true);
            $this->set('userId', $this->Auth->user('Id'));
            $this->set('Type', $this->Auth->user('Type'));
        } else {
            $this->set('loggedIn',false);
        }
    }
}
