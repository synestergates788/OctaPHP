<?php
use OctaPHP\Controller;

class octaController extends Controller{

    public function index(){
        $this->view('index.html.twig');
    }
}