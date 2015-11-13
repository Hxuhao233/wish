<?php

//登录页面控制器

Class  LoginAction extends Action{

	Public function Index(){
		
		$this->display();
	}
	
	//验证码
	Public function verify(){
		//位数，类型，图像格式，宽度，高度
		import('ORG.Util.Image'); 		//读取thinkPHP框架下的Image类
		Image::buildImageVerify(1,1,'png',60,25);
		
	}
	
	Public function login(){
		if(!IS_POST)
		{
			_404('页面不存在');
		}
		
		/*if(I('code', '', 'md5') != session('verify')){
			$this->error('验证码错误');
		}*/
		
		$username = I('username');
		$pwd = I('password', '', 'md5');
		$user = M('user')->where(array('username' => $username))->find();
		if(!$user || $user['password'] != $pwd){
			$this->error('账号或密码错误');
		}else if($user['lock'])
		{
			$this->error('用户被锁定');
		}
		
		
		
		//更新数据库
		$data = array(
			'id' => $user['id'],
			'loginTime' => time(),
			'loginIp' => get_client_ip(),
		);
		
		M('user')->save($data);
		//读取权限
		session(C('USER_AUTH_KEY'), $user['id']);
		session('username', $user['username']);
		session('loginTime', date('y-m-d H:i:s'), $user['loginTime']);
		session('loginIp', $user['loginIp']);
		if($user['username'] == C('RBAC_SUPERADMIN')){
			session(C('ADMIN_AUTH_KEY'), true);
		}
		
		
		import('ORG.Util.RBAC');
		RBAC::saveAccessList();
		//P($_SESSION);
		
		//die();
	
		$this->redirect('Admin/Index/index');
	}
}
?>