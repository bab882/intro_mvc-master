<?php
//envoyer notre page admin vers un template html de notre layout


if($this->request->prefix == 'admin')
{
    // Pour la connexion et la deconnexion
    $this->layout = 'admin';
    if(!$this->Session->isLogged() || $this->Session->user('role') != 'admin')
    {
        $this->redirect('users/login');
    }
}