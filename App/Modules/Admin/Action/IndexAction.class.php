<?php

//后台首页控制器

Class IndexAction extends CommonAction{
	
	//首页试图
	Public function index(){
		$this->display();
	}
	
	//退出
	Public function logout(){
		session_unset();
		session_destroy();
		$this->redirect('Admin/Login/index');
		
	}
}
?>