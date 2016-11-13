<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined("BASEPATH") OR exit("No Access");
class Email extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $data=$this->data;
        $input=array();
        $to="linh.pham@point.com.vn";
        $header="Test";
        $content="Pham Van Linh";
       $this->sendMail($to,$header,$content);
    
    }
}