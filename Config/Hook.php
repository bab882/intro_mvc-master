<?php

// pour envoyer notre page admin vers un template html vers un layout

if($this->request->prefix == 'admin')
{
    $this->layout = 'admin';
}