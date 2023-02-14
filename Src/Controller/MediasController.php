<?php

class MediasController extends Controller
{
    function admin_index($id)
    {
        // On a besoin de charger notre méthode
        $this->loadModel('Media');
        if($this->request->data && !empty($_FILES['file']['name']))
        {
            if(strpos($_FILES['file']['type'], 'image' !== false))
            {
                $dir = __WEBROOT__ . __DS__ . 'img' . __DS__ . date('Y-m');

                if(!file_exists($dir))
                {
                    // Création d'un dossier, de modifier un fichier ou effacer( RW++)
                    mkdir($dir,  0777);
                }
                move_uploaded_file($_FILES['file']['tmp_name'], $dir . __DS__ . $_FILES['file']['name']);
                $this->Media->save(array(
                    // On va avoir 4 champs obligatoire
                    'name' => $this->request->data->name,
                    'file'  =>dat('Y-m') . '/' . $_FILES['file']['name'],
                    'post_id' => $id,
                    'type' => 'img'
                ));
                $this->Session->setFlash('L\'image à bien été upbloader');
            }
            else
            {
                $this->Form->errors['file'] = 'Le fichier n\'est pas une image';
            }
        }
        // On ajoute un layout = modal.php
        $this->layout = 'modal';
        
        $d['images'] = $this->Media->find(array(
            'conditions' => array(
                'post_id' => $id
            )
            ));
        $d['post_id'] = $id;
        
        // On envoie les données à la vue
        $this->set($d);
    }
}