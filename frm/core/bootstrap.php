<?php

class HowdyEngine {
    
    public 
            $uri,//curren URL 
            $app,//curren app 
            $settings;//settings
    public function __construct($settings) {
        $this->settings = $settings;
        $this->uri = urldecode(preg_replace('/\?.*/iu','', $_SERVER['REQUEST_URI']));
        $this->app = false;
        $this->process_path();
        $this->process_controllers();
    }
    public function process_path ()
    {
        foreach ($this->settings['apps'] as $iterab_app)
        {
            $iterable_urls = require (BASE_DIR . '/apps/'.$iterab_app.'/urls.php');
            foreach ($iterable_urls as $pattern=>$metoth)
            {
                $matches = array();
                if(preg_match($pattern, $this->uri,$matches))
                {
                    $this->app =array ($iterab_app, 
                                    array(
                                        'pattern'=>$pattern,
                                        'metoth'=>$metoth,
                                        'args'=>$matches,
                            ));
                
                    break(2);
                }
                        
            }
        }
        if($this->app === 'false')
        {
            exit('App not fount');
        }
    }
    public function process_controllers ()
    {
        if ($this->app || is_array($this->app))
        {
            require (BASE_DIR.'/apps/'.$this->app[0].'/controller.php');
            $controller_name = $this->app['0'].'_Controller';
            $this->app_controller = new $controller_name(); 
            $this->app_controller->{$this->app['1']['metoth']}($this->app['1']['args']);
            
        }
        
    }
}