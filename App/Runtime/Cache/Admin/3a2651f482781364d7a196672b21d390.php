<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
<!--<link rel="stylesheet" href="__PUBLIC__/Css/Public.css"/>-->
</head>
<body>
	<table>
    	<tr>
        	<th>ID</th>
            <th>发布者</th>
            <th>内容</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>
   
    <?php if(is_array($wish)): foreach($wish as $key=>$v): ?><tr>
        	<td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["username"]); ?></td>
            <td><?php echo (replace_phiz($v["content"])); ?></td>
            <td><?php echo (date('y-m-d H:i', $v["time"])); ?></td>
            <td>
            	<a href="<?php echo U('Admin/MsgManage/delete',array( 'id' => $v['id']));?>">删除</a>
            </td>
        </tr><?php endforeach; endif; ?>  
    
    <tr>
    	<td colspan='5' align='center'><?php echo ($page); ?></td>
    </tr>
    </table>  
</body>
</body>
</html>