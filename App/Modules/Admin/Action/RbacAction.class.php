<html>
	<meta charset=utf-8>
<html>


<?php 
//Rbac 基于用户的访问控制
Class RbacAction extends CommonAction{
	
	
	//用户列表
	Public function index()
	{
		
		$user = D('UserRelation')->field('password', true)->relation(true)->select();
		//P($result);
		//die();

		$this->assign('user',$user);
		$this->display();
	}
	 
	 //角色列表
	 Public function role(){
		$role = M('role')->select();
		
		$this->assign('role', $role);
		$this->display();
		 
	 }
	 
	 //节点列表
	 Public function node(){
		 $field = array('id', 'name', 'title', 'pid');
		 
		 $node = M('node')->field($field)->order('sort')->select();
		 $node = node_merge($node);
		 //P($node);
		 //die;
		 $this->assign('node',$node);
		 $this->display();
	 }
	 
	 //添加用户
	 Public function addUser(){
		$role = M('role')->select();
		$this->assign('role',$role);
		$this->display();
	 }
	 //添加用户表单处理
	 Public function addUserHandle(){
		//用户设置
		$user = array(
			'username' =>I('username'),
			'password' =>I('password', '', md5),
			'loginTime' =>  time(),
			'loginIp' => get_client_ip()
		 );
		 //角色设置
		 $role = array();
		 if($uid = M('user')->add($user)){
			 foreach($_POST['role_id'] as $v){
				 $role[] = array(
					'role_id' => $v,
					'user_id' => $uid
				 );	 
			 }
			 //P($role);
			 //P($user);

			if(M('role_user')->addAll($role))
			{
				$this->success('添加成功', U('Admin/Rbac/index'));
			}else{
				$this->error('添加失败');
			}	 
			
		}
	 }
	 
	 
	 
	 //添加角色
	 Public function addRole(){
		 $this->display();
		 
	 }
	 //添加角色表单处理
	 Public function addRoleHandle(){

		 if(M('role')->add($_POST)){
			 $this->success("添加成功", U('Admin/Rbac/role'));
		 }else{
			 $this->error('添加失败');
		 }
		 
	 }
	 
	 
	 //添加节点
	 Public function addNode(){
		 $this->pid = I('pid', 0, 'intval');
		 $this->level = I('level', 1, 'intval');

		 switch($this->level){
			 case 1:
				$this->type = '应用';
				break;
				
			 case 2:
				$this->type = '控制器';
				break;
			 case 3:
				$this->type = '动作方法';
				break;
			
		 }
		 $this->display();
		 
		 
	 }
	 //添加节点表单处理
	 Public function addNodeHandle(){
		 //p($_POST);
		 //die;
		 if(M('node')->add($_POST)){
			 $this->success("添加成功",U('Admin/Rbac/node'));
		 }else{
			 $this->error("添加失败");
		 }
	 }
	 
	 //配置权限
	 Public function access(){
		 $rid = I('rid', 0, 'intval');
		 //echo $rid;
		 $field = array('id', 'name', 'title', 'pid');
		 $node = M('node')->order('sort')->field($field)->select();
		 
		 //原有权限
		 $access = M('access')->where(array('role_id' => $rid))->getField('node_id',true);
		 //P($access);
		 
		 $node = node_merge($node,$access);
		 $this->assign('node', $node);
		 $this->assign('rid', $rid);
		 $this->display();
	 }
	 
	 //
	 Public function setAccess(){
		 //P($_POST);
		 $rid = I('rid', 0, 'intval');
		 $db = M('access');
		 //清空原权限
		 $db->where(array('role_id' =>$rid))->delete();
		 
		 
		 
		 $data = array();
		 foreach($_POST['access'] as $v){
			 $tmp = explode('_', $v);

			 $data[] = array(
				'role_id' =>$rid,
				'node_id' =>$tmp[0],
				'level' =>$tmp[1]
			 );
		 }
		 if($db->addAll($data))
		 {
			 $this->success('修改成功', U('Admin/Rbac/role'));
		 }else{
			 $this->error('修改失败');
		 }

	 }
}

?>