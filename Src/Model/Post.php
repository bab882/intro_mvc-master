<?php
class Post extends Model{

    // On va mettre tout notre systeme de validation
    
    var $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'Vous devez préciser un titre'
        ),
        'slug' => array(
            'rule' => '([a-z0-9\-]+)',
            'message' => 'L\'url n\'est pas valide !'
        )
    );

}