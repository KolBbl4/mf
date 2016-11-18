<?php
class Simple_Pages_Controller extends Howdy_Controller {
    
    public function MainPage ($args){
        echo 'Hello uglu';
        
    }
    public function ViewPage ($args)
    {
        echo '<pre>';
        print_r($args);
        echo '</pre>';
    }
    
}