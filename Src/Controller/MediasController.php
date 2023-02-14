<?php

class MediasController extends Controller
{
    function admin_index()
    {
        // On a besoin de charger notre méthode
        $this->loadModel('Media');
        if($this->request->data && !empty($_FILES['file']['name']))
        {
            // On ajoute un layout = modal.php
        }
        $this->layout = 'modal';
        //debug($this->request);
    }
}