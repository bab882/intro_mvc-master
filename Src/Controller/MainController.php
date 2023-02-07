<?php

class MainController extends Controller
{
    public function view()
    {
        // $this->set(array(
        //     'phrase' => 'Bonjour',
        //     'nom' => 'John Doe'
        // ));

        // $this->render('index');
        
        $this->loadModel('Post');
        
        $Post = $this->Post->find(array(
            'conditions' => 'id = 1'
        ));
        print_r($Post);

        
        


    }
    
}