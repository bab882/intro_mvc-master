<?php

class MainController extends Controller
{
    public function view($id)
    {
        $this->loadModel('Post');
        $Post = $this->Post->findFirst(array(
            'conditions' => array('id' => $id)
            )
        );

        if(empty($Post)) {
            $this->e404('Error');
        }

        $this->set('Post', $Post);
    }
}