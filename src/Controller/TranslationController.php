<?php
namespace App\Controller;
use App\Controller\AppController;


class TranslationController extends AppController
{
    public function index()
    {
        $translation = $this->paginate($this->Translation);

        $this->set(compact('translation'));
        $this->set('_serialize', ['translation']);
    }

    public function download()
    {

    }

}
