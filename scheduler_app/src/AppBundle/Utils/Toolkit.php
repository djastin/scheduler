<?php

namespace AppBundle\Utils;

class Toolkit
{
    private $request;
    
    private function isMobile()
    {
        $state = false;
        
        if(preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|
                    iemobile|iphone|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|
                    philips|phone|playbook|sagem|sharp|sie-|silk|smartphone|sony|symbian|t-mobile|telus|up\.browser|
                    up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $this->request->headers->get('user-agent')
                        )
                    )
        {
            $state = true;
        }
        
        return $state;
    }
    
    public function setRequest($request)
    {
        $this->request = $request;
    }
    
    public function getView($urlName)
    {
        $view = $urlName;
        
        if($this->isMobile())
        {
            $list = explode("/", $urlName);
            $view = "mobile/" . $list[1];
        }
        
        return $view;
    }
}