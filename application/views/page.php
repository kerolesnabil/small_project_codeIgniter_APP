<?php



$this->load->view('header');
$this->load->view('sidebar');

$arr['content']=$content;

$this->load->view('content',$arr);
$this->load->view('footer');