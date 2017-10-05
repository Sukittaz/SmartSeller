<?php
class langController extends controller {

    public function index() {}

    public function set($lang) {
    	$_SESSION['lang'] = $lang;
    	header("Location: ".BASE);
    }
}