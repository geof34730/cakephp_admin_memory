<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Http\Client;
use Cake\Utility\Text;
use Cake\I18n\Time;



/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login']);





    }

    public function index()
    {
        //$users = $this->paginate($this->Users);
        $users = $this->Users->find('all');
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                if($this->request->getData('usernametemp')!=$user->username){
                    //$http = new Client();
                    //$response = $http->get(URL_API.'/sendmailchange/'.$user->id, []);
                }
                /*
                $historiqueconnectTable = TableRegistry::get('historiqueconnect');
                $historiqueconnect = $historiqueconnectTable->newEntity();
                $historiqueconnect->codeconnect = '6';
                $historiqueconnect->iduserconnect = $user->id;
                $historiqueconnectTable->save($historiqueconnect);
                */
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }


        $this->set('usernameTEMP', $user->username);

        $this->set('iduser', $id);
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);


    }

    public function deleteDemandeDeTest($id = null){

        $idDemande=$this->request->getParam('pass')[0];
        $idUser=$this->request->getParam('pass')[1];
        $this->loadModel('Demandedetest');
        $this->Demandedetest->query()->delete()->where(['iddemande'=>$idDemande])->execute();
        return $this->redirect(['controller' => 'Users','action' => 'edit',$idUser]);

    }



    public function login()
    {
        if ($this->request->is('post')) {
            $userName = $this->request->data['username'];
            $Users = TableRegistry::get('Users');
            $queryGetuser = $this->Users->findByUsername($userName);
            if(!$queryGetuser->toArray()==array() && $queryGetuser->toArray()[0]->role=='admin') {
                if(!$queryGetuser->toArray()[0]['passwordupdatergpd']){
                    return $this->Flash->error(__('Votre mot de passe ne respecte les contraintes RGPD, vous devez vous identifier sur le front pour le mettre à jour, vous pourrez ensuite vous identifier sur l\'administration'));
                }


                $user = $this->Auth->identify();
               if($user) {
                   $this->Auth->setUser($user);


                   $session = $this->request->session();
                   $session->write('idrefA', true);
               }
               else
               {

               }
                return $this->redirect($this->Auth->redirectUrl());
            }
            else{
                return $this->Flash->error(__('You are not authorized to access that location.'));
            }
        }
    }

    public function logout(){
        $session = $this->request->session();
        $session->destroy();
        return $this->redirect($this->Auth->logout());
    }



}
