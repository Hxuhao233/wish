<html>
	<meta charset=utf-8>
<html>
<?php
//后台函数
//递归重组节点信息为多维数组
//(要处理的节点数组，父级ID)
function node_merge($node,$access = null ,$pid = 0){
	$arr = array();
	
	foreach($node as $v){
		//读取原权限
		if(is_array($access)){
			/*if(in_array($v['ID'],$access)){
				$v['access'] = 1;
			}
			else{
				$v['access'] = 0;
				
			}*/
			
			$v['access'] = in_array($v['id'],$access)? 1 : 0;
			
		}
		if($v{'pid'} == $pid){
			$v['child'] = node_merge($node,$access,$v['id']);
			$arr[] = $v;
		}
	}
	return $arr;
}

?>