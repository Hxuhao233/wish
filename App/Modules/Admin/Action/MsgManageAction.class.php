<?php
//查看所有帖子管理器名字真长= =
Class MsgManageAction extends CommonAction{
	
	Public function index(){
		
		//引入thinkphp中的page类
		import('ORG.Util.Page');
		
		$count = M('wish')->count();
		//(总条数,每页显示的条数)
		$page = new Page($count,5);
		$limit = $page->firstRow . ',' . $page->listRows;
		
		//从数据库中读取 order排序 limit分页
		$wish = M('wish')->order('time DESC')->limit($limit)->select();
		
		//分配
		$this->wish = $wish;
		$this->page = $page->show();
		$this->display();
	}
	
	Public function delete(){
		$id = I('id', '', 'intval');
		
		if(M('wish')->delete($id)){
			$this->success('删除成功', U('Admin/MsgManage/index'));
		}else{
			$this->error('删除失败');
		}
	}
}
?>