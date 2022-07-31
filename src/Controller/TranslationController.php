<?php
namespace App\Controller;
use App\Controller\AppController;
use Google\Cloud\Translate\V2\TranslateClient;
use Google\Cloud\Translate\V3\TranslationServiceClient;
use Cake\Event\Event;
use Cake\Filesystem\File;
class TranslationController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

    }


    public function index()
    {
        $uploadJsonTranSlation = $this->Translation->newEntity();
        $this->set(compact('uploadJsonTranSlation'));
        if ($this->request->is(['patch', 'post', 'file'])){
            //upload json
            move_uploaded_file($this->request->getData('jsonFile.tmp_name'), WWW_ROOT_FRONT . '/upload/localisation.json');
            //read json
            $file = new File(WWW_ROOT_FRONT . '/upload/localisation.json');
            $json = $file->read(true, 'r');
            $jsonarray = json_decode($json);



            $translate = new TranslateClient([
                'key' => TRANSLATE_KEY
            ]);

            $array_product = array();



            foreach($jsonarray[0]->fr  as $key => $value) {
                $resultTrad = $translate->translate($value, [
                    'target' => 'chi'
                ]);
                $array_product['chi'][$key]=$resultTrad['text'];
            }

            foreach($jsonarray[0]->fr  as $key => $value) {
                $resultTrad = $translate->translate($value, [
                    'target' => 'en'
                ]);
                $array_product['en'][$key]=$resultTrad['text'];
            }

            foreach($jsonarray[0]->fr  as $key => $value) {
                $resultTrad = $translate->translate($value, [
                    'target' => 'es'
                ]);
                $array_product['es'][$key]=$resultTrad['text'];
            }

            foreach($jsonarray[0]->fr  as $key => $value) {
                $array_product['fr'][$key]=$value;
            }

            foreach($jsonarray[0]->fr  as $key => $value) {
                $resultTrad = $translate->translate($value, [
                    'target' => 'ru'
                ]);
                $array_product['ru'][$key]=$resultTrad['text'];
            }









            $json_product =  json_encode($array_product);
            debug($json_product);

            $pathSavejson=WWW_ROOT_FRONT . '/upload/localisationSave.json';
            file_put_contents($pathSavejson, [$json_product]);


        }
/*
       $translate = new TranslateClient([
            'key' => 'AIzaSyBonjJuWksSee6wtBvTaPq8NMnR3ez1e5A'
        ]);

        $texFr='qui est-ce ?';
        $resultUk = $translate->translate($texFr, [
            'target' => 'en'
        ]);

        debug($resultUk['text']);
*/



    }

  }
