<?php
class notFoundController extends controller {

    public function index() {
        $data = array();
        
        $this->loadView('404', $data, 'error');
    }

}