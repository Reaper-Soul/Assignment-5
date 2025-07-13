<?php

class Reports extends Controller {

    public function index(){
      $_SESSION['current_page'] = 'reports';
      $this->view('reports/index');
      die;
    }

}