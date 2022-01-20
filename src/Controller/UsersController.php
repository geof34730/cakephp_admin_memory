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
        $this->loadModel('Centreculturel');

        $this->set('centreCulturelListe', $this->Centreculturel
            ->find('list',
                [
                    'keyField' => 'centreculturel_panonceau',
                    'valueField' => 'centreculturel_valuefield'
                ]
            )
            ->order(
                ['centreculturel_valuefield' => 'ASC']
            )
        );

        $this->loadModel('Departement');
        /*création varialble departement liste et mise en cache*/
        $this->set('departementListe', $this->Departement
            ->find('list',
                [
                    'keyField' => 'departement_id',
                    'valueField' => 'departement_nom'
                ]
            )
            ->order(
                ['departement_slug' => 'ASC']
            )
        );



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

        /////////////////////BEGIN SUPRESSION DEMANDE DE TEST D'UN UTILISATEUR/////////////////
        $this->loadModel('Demandedetest');
        $this->loadModel('Tas');
        $this->loadModel('Produits');

        $queryDemandeDeTest=$this->Demandedetest->find('all')->where(['idUser'=>$id]);
        foreach ($queryDemandeDeTest as $queryDemandeDeTestQ ) {
            $queryProduit=$this->Produits->find('all')->where(['id'=>$queryDemandeDeTestQ->idProduit])->first();
            $queryTas=$this->Tas->find()->where(['idtas'=>$queryDemandeDeTestQ->idtas])->first();

            $currentTime = Time::now();
            $timeEnd = new Time($queryTas->dateEndDemande, 'Europe/Paris');
            $queryDemandeDeTestQ->supprimable=$timeEnd>$currentTime;
            $queryDemandeDeTestQ->titleProduit=$queryProduit->title;
        }
        $this->set(compact('queryDemandeDeTest'));
        $this->set('_serialize', ['queryDemandeDeTest']);
        /////////////////////END SUPRESSION DEMANDE DE TEST D'UN UTILISATEUR/////////////////
    }

    public function deleteDemandeDeTest($id = null){

        $idDemande=$this->request->getParam('pass')[0];
        $idUser=$this->request->getParam('pass')[1];
        $this->loadModel('Demandedetest');
        $this->Demandedetest->query()->delete()->where(['iddemande'=>$idDemande])->execute();
        return $this->redirect(['controller' => 'Users','action' => 'edit',$idUser]);

    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        ///DELETE AVIS DE L'UTILISATEUR
        if ($this->Users->delete($user)) {
            $this->loadModel('Avis');
            $this->loadModel('Bazaarvoice');
            //////////////////UPADTE BAZARVOICE MONITORING//////////////////
            $querybv = $this->Bazaarvoice->query();
            $querybv->update()
                ->set([
                    'deleteinbv' => true,
                ])
                ->where(['iduser' => $id])
                ->execute();
            ////////////////////////////////////////////////////////////////

               $allAvisUsers=$this->Avis->find('all')->where(['iduser'=> $id]);
                foreach ($allAvisUsers as $allAvisUsersQ ) {
                    //////////////////UPADTE BAZARVOICE MONITORING//////////////////
                    $query = $this->Bazaarvoice->query();
                    $query->insert(['idavis','idproduit','type','iduser','note','phraseresenti1','phraseresenti2','phraseresenti3','commentaire','typeAction','createdcommunaute','typeactioncode'])
                        ->values([
                            'idavis' => $allAvisUsersQ->idavis,
                            'idproduit' => $allAvisUsersQ->idproduit,
                            'type' => 'DELETE',
                            'iduser' => $allAvisUsersQ->iduser,
                            'note' => $allAvisUsersQ->note,
                            'phraseresenti1' => $allAvisUsersQ->phraseresenti1,
                            'phraseresenti2' => $allAvisUsersQ->phraseresenti2,
                            'phraseresenti3' => $allAvisUsersQ->phraseresenti3,
                            'commentaire' => $allAvisUsersQ->commentaire,
                            'typeAction' => 'Supression du compte utilisateur par l\'admin',
                            'createdcommunaute' => $allAvisUsersQ->created,
                            'typeactioncode' => 2
                        ])
                        ->execute();
                    $result = $this->Avis->delete($allAvisUsersQ);
                    ////////////////////////////////////////////////////////////////
                }

                $this->loadModel('Messagerie');
                $this->Messagerie->query()->delete()->where(['idUserDestinateire'=>$user->id])->execute();
                $this->Messagerie->query()->delete()->where(['idUserExpediteur'=>$user->id])->execute();
                $this->loadModel('Test');
                $this->Test->query()->delete()->where(['iduser'=>$user->id])->execute();
                $this->loadModel('Demandedetest');
                $this->Demandedetest->query()->delete()->where(['idUser'=>$user->id])->execute();
                $this->loadModel('likeravis');
                $this->likeravis->query()->delete()->where(['idUser'=>$user->id])->execute();
                $this->loadModel('Signalementavis');
                $this->Signalementavis->query()->delete()->where(['idUser'=>$user->id])->execute();
                $this->loadModel('Utileavis');
                $this->Utileavis->query()->delete()->where(['idUser'=>$user->id])->execute();


                $this->Flash->success(__('The user has been deleted.'));
                return $this->redirect(['controller' => 'produits','action' => 'indexAraAndDisableCacheDeleteUser']);


        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);

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
                   $historiqueconnectTable = TableRegistry::get('historiqueconnect');
                   $historiqueconnect = $historiqueconnectTable->newEntity();
                   $historiqueconnect->codeconnect = '8';
                   $historiqueconnect->iduserconnect = $user['id'];
                   $historiqueconnectTable->save($historiqueconnect);

                   $session = $this->request->session();
                   $session->write('idrefA', true);
               }
               else
               {
                   $historiqueconnectTable = TableRegistry::get('historiqueconnect');
                   $historiqueconnect = $historiqueconnectTable->newEntity();
                   $historiqueconnect->codeconnect = '9';
                   $historiqueconnect->iduserconnect = $queryGetuser->toArray()[0]['id'];
                   $historiqueconnectTable->save($historiqueconnect);
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

    public function export()
    {
        $this->loadModel('Users');
        $users = $this->Users;
        $this->set(compact('users'));
        $this->loadModel('Avis');
        $this->loadModel('Produits');
        $this->set('_serialize', ['users']);










        $data = $this->Users->find('all')->toArray();
            $this->response->download('export_user_leclerc-culture-by-espace-culturel.csv');
            $i = 0;
            foreach ($data as &$value) {
                $departementSelect = $this->Departement->find('all')->where(['departement_id =' => $value->departement])->first();
                $value->departement='';
                $value->departement = $departementSelect->departement_nom;

                $espaceCulturelSelect = $this->Centreculturel->find('all')->where(['centreculturel_panonceau =' => $value->espaceculturel])->first();
                $value->espaceculturellibelle='';
                $value->espaceculturellibelle=$espaceCulturelSelect->centreculturel_valuefield;

                $value->avislivre=0;
                $value->avisCd=0;
                $value->avisDvd=0;
                $avisUser=$this->Avis->find('all')->where(['iduser'=> $value->id]);
                foreach ($avisUser as $avisUserQ) {
                     $avisProduit=$this->Produits->find('all')->where(['id'=> $avisUserQ->idproduit])->first();
                     if($avisProduit->categorie1=='E01'){
                         $value->avislivre++;
                     }
                     if($avisProduit->categorie1=='E02'){
                         $value->avisCd++;
                     }
                     if($avisProduit->categorie1=='E04'){
                         $value->avisDvd++;
                     }
                }
                $data[$i] = $value;
                $i++;
            }
          //  debug($data);


            $_serialize = 'data';
            $_csvEncoding = 'UTF8';
            $_dataEncoding = 'UTF8';
            $_delimiter = ';'; //tab
            $_enclosure = '"';
            $_newline = '\n';
            $_eol = '~';
            $_bom = true;
            $_header = ['NOM', 'PRENOM', 'EMAIL', 'PSEUDONYME','AVIS LIVRE','AVIS CD','AVIS DVD', 'N° CARTE FIDE ','PROFIL', 'OPT-IN 1', 'OPT-IN 2', 'OPT-IN 3', 'ADRESSE', 'COMPLEMENT ADRESSE', 'VILLE', 'CODE POSTAL', 'DEPARTEMENT', 'ESPACE CULTUREL', 'ESPACE CULTUREL PANONCEAU','DATE INSCRIPTION'];
            $_extract = ['nom', 'prenom', 'username', 'pseudo','avislivre','avisCd','avisDvd','numerosCarteLeclerc' ,'role', 'optim1', 'optim2', 'optim3', 'adresse', 'complementAdresse', 'ville', 'codePostal', 'departement', 'espaceculturellibelle', 'espaceculturel','created' ];

            $this->set(compact('data', '_serialize', '_header', '_extract', '_delimiter', '_csvEncoding', '_dataEncoding', '_bom'));
            $this->viewBuilder()->className('CsvView.Csv');
            return;

        }

    public function supprimerAccent($cc)
    {

        $cc = str_replace(	array(
            'À', 'Â', 'Ä', 'Á', 'Ã', 'Å',
            'Î', 'Ï', 'Ì', 'Í',
            'Ô', 'Ö', 'Ò', 'Ó', 'Õ', 'Ø',
            'Ù', 'Û', 'Ü', 'Ú',
            'É', 'È', 'Ê', 'Ë',
            'Ç', 'Ÿ', 'Ñ', 'Ý',',','\'','È','è','é','ê','-','.'
        ),
            array(
                'A', 'A', 'A', 'A', 'A', 'A',
                'I', 'I', 'I', 'I',
                'O', 'O', 'O', 'O', 'O', 'O',
                'U', 'U', 'U', 'U',
                'E', 'E', 'E', 'E',
                'C', 'Y', 'N', 'Y','#','#','#','#','#','#','#','#'
            ),
            $cc
        );

        return $cc;
    }

    public function exportdoublon()
    {
        $this->loadModel('Users');
        $users = $this->Users;
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);

        $arrayWhereId=[];
        $dataBegin = $this->Users->find('all')->toArray();
        $mychaineSelect='';
        foreach ($dataBegin as &$dataDoubleQ) {
            $chaineAdresse=$this->supprimerAccent(strtoupper(str_replace(' ','',$dataDoubleQ->adresse.''.$dataDoubleQ->complementAdresse.''.$dataDoubleQ->codePostal.''.$dataDoubleQ->ville)));
           $mychaineSelect=$mychaineSelect.'-'.$chaineAdresse.'-'.$dataDoubleQ->numerosCarteLeclerc;
        }

        foreach ($dataBegin as &$dataDoubleQ2) {
            $chaineAdresse=$this->supprimerAccent(strtoupper(str_replace(' ','',$dataDoubleQ2->adresse.''.$dataDoubleQ2->complementAdresse.''.$dataDoubleQ2->codePostal.''.$dataDoubleQ2->ville)));
                if($dataDoubleQ2->numerosCarteLeclerc!='') {
                    if (mb_substr_count($mychaineSelect, $chaineAdresse) > 1 || mb_substr_count($mychaineSelect, $dataDoubleQ2->numerosCarteLeclerc) > 1) {
                        array_push($arrayWhereId, ['id ' =>$dataDoubleQ2->id]);
                    }
                }
        }


        $data = $this->Users->find('all')->where([ 'OR' => $arrayWhereId])->toArray();

        $this->response->download('export_user_leclerc-culture-by-espace-culturel.csv');
        $i = 0;
        foreach ($data as &$value) {
            $departementSelect = $this->Departement->find('all')->where(['departement_id =' => $value->departement]);
            $value->departement='';
            foreach ($departementSelect as $departementSelectCheck) {
                $value->departement = $departementSelectCheck->departement_nom;
            }
            $espaceCulturelSelect = $this->Centreculturel->find('all')->where(['centreculturel_panonceau =' => $value->espaceculturel]);
            $value->espaceculturellibelle='';
            foreach ($espaceCulturelSelect as $espaceCulturelSelectCheck) {
                $value->espaceculturellibelle = $espaceCulturelSelectCheck->centreculturel_valuefield;
            }


            if (mb_substr_count($mychaineSelect, $value->numerosCarteLeclerc) > 1) {
                $value->doubloncarte=$value->numerosCarteLeclerc;
            }
            else{
                $value->doubloncarte='';
            }

            $chaineAdresse=$this->supprimerAccent(strtoupper(str_replace(' ','',$value->adresse.''.$value->complementAdresse.''.$value->codePostal.''.$value->ville)));

            if (mb_substr_count($mychaineSelect,$chaineAdresse) > 1) {
                $value->doublonadresse=$chaineAdresse;
            }
            else{
                $value->doublonadresse='';
            }


            $data[$i] = $value;
            $i++;
        }
         // debug($data);


        $_serialize = 'data';
        $_csvEncoding = 'UTF8';
        $_dataEncoding = 'UTF8';
        $_delimiter = ';'; //tab
        $_enclosure = '"';
        $_newline = '\n';
        $_eol = '~';
        $_bom = true;
        $_header = ['NOM', 'PRENOM', 'EMAIL', 'PSEUDONYME', 'N° CARTE FIDE ','PROFIL', 'OPT-IN 1', 'OPT-IN 2', 'OPT-IN 3', 'ADRESSE', 'COMPLEMENT ADRESSE', 'VILLE', 'CODE POSTAL', 'DEPARTEMENT', 'ESPACE CULTUREL', 'ESPACE CULTUREL PANONCEAU','DATE INSCRIPTION','DOUBLONS CARTE LELCERC','DOUBLON ADRESSE'];
        $_extract = ['nom', 'prenom', 'username', 'pseudo','numerosCarteLeclerc' ,'role', 'optim1', 'optim2', 'optim3', 'adresse', 'complementAdresse', 'ville', 'codePostal', 'departement', 'espaceculturellibelle', 'espaceculturel','created','doubloncarte','doublonadresse' ];

        $this->set(compact('data', '_serialize', '_header', '_extract', '_delimiter', '_csvEncoding', '_dataEncoding', '_bom'));
        $this->viewBuilder()->className('CsvView.Csv');
        return;


    }

    public function add()
    {
        $this->loadModel('Usersinvitation');
        $userinvitation = $this->Usersinvitation->newEntity();
        $myArrayListeInvite=[];
        if ($this->request->is('post')) {
            $userinvitation = $this->Usersinvitation->patchEntity($userinvitation, $this->request->getData());
            $uuidInvitation=Text::uuid();
            $userinvitation->UUID=$uuidInvitation;

            if ($this->Usersinvitation->save($userinvitation)) {
                $http = new Client();
                array_push($myArrayListeInvite, $uuidInvitation);
                $response = $http->get(URL_API.'/sendmailinviteusegroupe/', ['listeuserinvitation' => $myArrayListeInvite]);
                //debug($response->body());
                $this->Flash->success(__('The user has been invited.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('userinvitation'));
        $this->set('_serialize', ['userinvitation']);
    }

    public function import(){
        if ($this->request->is(['post'])) {
            $this->loadModel('Usersinvitation');
            $uploadFilesForm = !empty($this->request->getData('csv_file_import_user.tmp_name'));
                if ($uploadFilesForm) {
                    $extension = pathinfo($this->request->getData('csv_file_import_user.name'))['extension'];
                    if($extension!='csv') {
                        $this->Flash->error("Vous devez uploader un fichier CSV valide, télécharger le modèle initial si besoin");
                    }
                    else{
                        move_uploaded_file($this->request->getData('csv_file_import_user.tmp_name'), WWW_ROOT . 'upload/users' . DS . 'import_invitationuser.csv');
                        $URL_IMPORT_USER= WWW_ROOT . 'upload/users' . DS . 'import_invitationuser.csv';
                        if (($handle = fopen($URL_IMPORT_USER, "r")) !== FALSE) {
                            $row = 1;
                            $myArrayListeInvite=[];
                            $query = $this->Usersinvitation->query();
                            while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
                                $data = array_map("utf8_encode", $data);
                                //debug($row);
                                if($row!=1){
                                    $uuidInvitation=Text::uuid();
                                    $userinvitation = $this->Usersinvitation->newEntity();
                                    $userinvitation->nom=$data[0];
                                    $userinvitation->prenom=$data[1];
                                    $userinvitation->username=$data[2];
                                    $userinvitation->role=$this->request->getData('role');
                                    $userinvitation->UUID=$uuidInvitation;

                                    $this->Usersinvitation->save($userinvitation);

                                   // if ($this->Usersinvitation->save($userinvitation)) {
                                        //array_push($myArrayListeInvite, $uuidInvitation);
                                   // }
                                }
                                $row++;
                            }


                           // debug($myArrayListeInvite);
                           // $http = new Client();
                           // $response = $http->get(URL_API.'/sendmailinviteusegroupe/', ['listeuserinvitation' => $myArrayListeInvite]);

                           // debug($response->body());
                            $this->Flash->success("Import réussi avec succès");
                           // $this->reinviteallLastImport();
                           // return $this->redirect(['action' => 'import']);
                        }
                    }

                }


        }

    }

    public function reinviteallLastImport($id = null){
        $this->loadModel('Usersinvitation');
        $lstInvitationNon=$this->Usersinvitation->find('all')->where(['mailsend'=> false]);

        foreach($lstInvitationNon as $lstInvitationNonQ) {
            $myArrayListeInvite=[];
            array_push($myArrayListeInvite, $lstInvitationNonQ->UUID);
            $http = new Client();
            $response = $http->get(URL_API.'/sendmailinviteusegroupe/', ['listeuserinvitation' => $myArrayListeInvite]);

        }
    }

    public function reinviteallnosend($id = null){
        $this->loadModel('Usersinvitation');
        $lstInvitationNon=$this->Usersinvitation->find('all')->where(['mailsend'=> false]);

        foreach($lstInvitationNon as $lstInvitationNonQ) {
            $myArrayListeInvite=[];
            array_push($myArrayListeInvite, $lstInvitationNonQ->UUID);
            $http = new Client();

           // debug($myArrayListeInvite);
            $response = $http->get(URL_API.'/sendmailinviteusegroupe/', ['listeuserinvitation' => $myArrayListeInvite]);

        }

        return $this->redirect(['controller' => 'Usersinvitation','action' => 'index']);


    }
}
