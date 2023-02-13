<?php

class Form 
{
    public $controller;

    public function __construct($controller)
    {
        $this->controller = $controller;
        
    }

    public function input($name, $label, $options = [])
    {
        $html = '<div class="clearfix">
                <label for="input'.$name.'">'.$label.'</label>
                    <div class="input"> '; 

        $attr = ' ';

        // Pour parcourir le tableaux des options
        foreach($options as $k => $v)
        {
            if($k != 'type')
            {
              $attr .= "$k=\"$v\"";  
            }
        }

        // input simple
        if(!isset($options['type'])) 
        {
            $html .= ' <input type="text" name="'.$name.'" value="'.$this->controller->request->data->$name.'" id="input'.$name.'" '.$attr.'>';
        }      
        // text area
        elseif($options['type'] = 'textarea')
        {
            $html .= ' <textarea type="" name="'.$name.'" id="input'.$name.'" '.$attr.'>'.$this->controller->request->data->$name.'</textarea>';
        } 
        elseif($options['type'] = 'checkbox')
            {
                $html .= '<input type="hidden" name="'.$name.'" value="0">';
            }    
        $html .= '  </div>
                    </div>';   
                    
        return $html;
    }
}