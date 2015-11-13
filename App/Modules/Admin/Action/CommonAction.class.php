<?php
//判断是否登录

Class CommonAction extends Action{
	
	//自动运行的方法
	Public function _initialize(){
			if(!isset($_SESSION[C('USER_AUTH_KEY')]))
				$this->redirect('Admin/Login/index');
			
			
			$notAuth = in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE'))) ||
				in_array(ACTION_NAME,explode(',',C('NOT_AUTH_ACTION')));
			
			if(C('USER_AUTH_ON' ) && !$notAuth){
				import('ORG.Util.RBAC');
				RBAC::AccessDecision(GROUP_NAME) || $this->error('无权限');
			}
	}
}
?>