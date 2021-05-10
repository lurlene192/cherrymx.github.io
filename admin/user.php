<?
define('ROOT' , $_SERVER['DOCUMENT_ROOT']);
include ROOT.'/core/zefox.php';
require_once ROOT.'/admin/adm_head.php';
require_once ROOT.'/admin/adm_menu.php';
require_once ROOT.'/admin/adm_left_panel.php';

?>


  
          
    
        <!-- Page content -->
        <div class="page-content">

            <!-- Page title -->
        	<div class="page-title">
                <h5><img style="margin: -6px 7px 0px  0px;width: 16px;" src='/admin/diz/11.png'>  <?echo $_SERVER['SERVER_NAME'];?>  <small>Добро пожаловать <? echo $admin['login']; ?> !</small></h5>
                
            </div>
            <!-- /page title -->

			
			<?
			
			
	
			
			
			
			
					if(isset($_GET['dell']) && $_GET['dell'])
{		
$id = abs($_GET['dell']);

mysql_query("DELETE FROM `users` WHERE `id` = '".$id."' LIMIT 1");
header('location: /admin/user.php');

}	
			
			
	
					if(isset($_GET['red']) && $_GET['red'])
{		
$id = abs($_GET['red']);






	if (isset($_POST['submit']) )
		{
			
			
			$kod = check($_POST['kod']);
			$time = check($_POST['time']);

			$logtime = time();
			$text= 'Отредактирован код '.$kod.' ';
				mysql_query("INSERT INTO `log` (`time`,`text`,`who`) values('".$logtime."','".$text."','".$admin['id']."')");
					mysql_query("UPDATE `users` SET `kod` = '".$kod."' , `End Time` = '".$time."' WHERE `id` = '".$id."'");	
					header('location: /admin/user.php');
			
		}




$kategory = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."'  LIMIT 1"));
echo '					<div class="panel panel-default form-horizontal">
                    <div class="panel-heading"><h6 class="panel-title">Редактировать пользователя</h6></div>
                    <div class="panel-body">


<form action="?red='.$id.'" method="post" accept-charset="utf-8" enctype="multipart/form-data">


						
						
						<div class="form-group">
                            <label class="col-sm-2 control-label">код: </label>
                            <div class="col-sm-10">
                               
								<input type="text" name="kod" value="'.$kategory['kod'].'" class="form-control">                        </div>
                        </div>

													
								<div class="form-group">
                            <label class="col-sm-2 control-label">Изображение: </label>
                            <div class="col-sm-10">
                               
								<input type="text" name="time" value="'.$kategory['End Time'].'" class="form-control">                        </div>
                        </div>
						
							
		
			
			
		
	
						
<div class="form-actions text-right">
                            <a href="/admin/user.php"><span class="btn btn-danger">Отмена</span></a>
                         <input type="submit" name="submit" value="Сохранить" class="btn btn-primary">                        </div>
	

</form></div></div>	
        </div>
    </div>





    
    <script src="/admin/diz/bootstrap.min.js"></script>

  
    <script src="/admin/diz/respond.js"></script>
  
</body></html>	';
exit();
}		
			
			
			
if(isset($_GET['add']))
{	



	if (isset($_POST['submit']) )
		{
			
			
			$kod = check($_POST['kod']);
			$time = check($_POST['time']);
			
			
			
			
			if($time == 1)
		{ $times = date('d.m.Y H:i:s', time() + 604800);
	}else 
		if ($time == 2)
		{ $times = date('d.m.Y H:i:s', time() + 2629743);
	}else 
		if ($time == 3)
		{ $times = date('d.m.Y H:i:s', time() * 5);
	}
			
			$logtime = time();
			$text= 'Добавлен код '.$kod.' ';
				mysql_query("INSERT INTO `log` (`time`,`text`,`who`) values('".$logtime."','".$text."','".$admin['id']."')");
				mysql_query("INSERT INTO `users` (`kod`,`End Time`) values('".$kod."','".$times."')");
				header('location: /admin/user.php');
			
		}







echo '					<div class="panel panel-default form-horizontal">
                    <div class="panel-heading"><h6 class="panel-title">Добавить пользователя</h6></div>
                    <div class="panel-body">


<form action="?add" method="post" accept-charset="utf-8" enctype="multipart/form-data">


							<div class="form-group">
                            <label class="col-sm-2 control-label">Код: </label>
                            <div class="col-sm-10">
                               
								<input type="text" name="kod" value="" class="form-control">                            </div>
                        </div>

						
						
						<div class="form-group">
                            <label class="col-sm-2 control-label">Время: </label>
                            <div class="col-sm-10">   
<select name="time" class="form-control">
<option value="1" selected="selected">Неделя</option>
<option value="2" >Месяц</option>
<option value="3" >Навсегда</option>

</select>
                                
                            </div>
                        </div>
						
						
										
														
							
		
			
			
		
	
						
<div class="form-actions text-right">
                            <a href="/admin/user.php"><span class="btn btn-danger">Отмена</span></a>
                         <input type="submit" name="submit" value="Сохранить" class="btn btn-primary">                        </div>
	

</form></div></div>	
        </div>
    </div>





    
    <script src="/admin/diz/bootstrap.min.js"></script>

  
    <script src="/admin/diz/respond.js"></script>
  
</body></html>	';
exit();
}
			?>
            
         
			
			

					<div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title">Пользователи</h6></div>
                <div class="table-responsive">
<table class="table table-striped table-bordered">
				
					
                        <thead>
							
                            <tr>
                                <th>ID</th>
                                <th>Код</th>
								<th>Действителен до</th>
								<th>Редактировать</th>
                                <th>Удалить</th>
						
								
								
								
                            </tr>
                        </thead>
                        <tbody>
						
						
						<?
						
						$q = mysql_query("SELECT * FROM `users`");
						while ($post = mysql_fetch_assoc($q))
						{
							echo '  <tr>
							<td class="text-center">'.$post['id'].'</td>
                            <td class="text-center">
                           '.$post['kod'].'
                            </td>
													
							 <td class="text-center">
                           '.$post['End Time'].'
                            </td>

							
							  <td>
							<center><a href="?red='.$post['id'].'" class="btn btn-default btn-icon btn-xs tip" title="" data-original-title="Редактировать"><img style="width: 16px;" src="/admin/diz/12.png"></a></center>
                            </td> 
                            <td>
							<center><a href="?dell='.$post['id'].'" class="btn btn-default btn-icon btn-xs tip" title="" data-original-title="Удалить"><img style="width: 16px;" src="/admin/diz/13.png"></a></center>
                            </td> 
							
							';
							
						
							
							echo '
							
							</tr>';
							
						}
						?>
						               
	                      
	                     
	                                                    </tbody>
						
						

                    </table>
					
					
					
					   </div>
            </div>
										                    
             
			
			
			
           

   <?
require_once ROOT.'/admin/admin_foot.php';
   ?>