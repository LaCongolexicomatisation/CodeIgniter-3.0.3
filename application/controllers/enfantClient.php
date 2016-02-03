<?php

/**
 * Created by PhpStorm.
 * User: labai
 * Date: 03/02/2016
 * Time: 17:28
 */
class enfantClient extends CI_Controller
{
    public function index(){
        $this->load->view('informationsEnfant');
    }
}