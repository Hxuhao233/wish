<?php
//前台控制器
Class IndexAction extends Action{
	
	//首页试图
	Public function index(){
		$wish = M('wish')->select();
		$this->assign('wish', $wish);
		$this->display();
		
	}
	
	//异步发布处理
	Public function handle(){
		//p(I('post.'));
		if(IS_AJAX)
		{
			$data = array(
				'username' => I('username'),
				'content' => I('content'),
				'time' => time(),
			);
			if($id =M('wish')->data($data)->add())
			{		
				$data['id'] = $id;
				$data['content'] =replace_phiz($data['content']);
				$data['time'] = date('y-m-d H:i', $data['time']);
				$data['status'] = 1;
				$this->ajaxReturn($data, "json");
			}
			else{
				$this->ajaxReturn(array('status' => 0), "json");
			}
			//replace_phiz($data['content']);
			
		}
		else
		{
			halt('页面不存在');
		}
		
		
		
	}
}

?>