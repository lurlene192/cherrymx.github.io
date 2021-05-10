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
			
			
	
			
			
			
			
			
			
			
			
			
			
			
if(isset($_GET['add']))
{	



	if (isset($_POST['submit']) )
		{
			
			
			$log = check($_POST['log']);
			$pass = check($_POST['pass']);
			$pass2 = md5($pass);
				mysql_query("INSERT INTO `admins` (login,pass) values('".$log."','".$pass2."')");
				header('location: /admin/admin');
			
		}







echo '					<div class="panel panel-default form-horizontal">
                    <div class="panel-heading"><h6 class="panel-title">Добавить админа</h6></div>
                    <div class="panel-body">


<form action="?add" method="post" accept-charset="utf-8" enctype="multipart/form-data">


							<div class="form-group">
                            <label class="col-sm-2 control-label">Логин: </label>
                            <div class="col-sm-10">
                               
								<input type="text" name="log" value="" class="form-control">                            </div>
                        </div>

						
						<div class="form-group">
                            <label class="col-sm-2 control-label">Пароль: </label>
                            <div class="col-sm-10">
                               
								<input type="text" name="pass" value="" class="form-control">                            </div>
                        </div>

										
														
							
		
			
			
		
	
						
<div class="form-actions text-right">
                            <a href="/admin/"><span class="btn btn-danger">Отмена</span></a>
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
                <div class="panel-heading"><h6 class="panel-title">Администрация</h6></div>
                <div class="table-responsive">
<table class="table table-striped table-bordered">
				
					
                        <thead>
							
                            <tr>
                                <th>ID</th>
                                <th>Логин</th>
								<th>Процент</th>
                                <th>Бабосики</th>
								<th>Вывести</th>
								
								<? if ($admin['login'] == 'ADMIN')	echo '<th>Редактировать</th>';?>
								
                            </tr>
                        </thead>
                        <tbody>
						
						
						<?
						
						$q = mysql_query("SELECT * FROM `admins`");
						while ($post = mysql_fetch_assoc($q))
						{
							echo '  <tr>
							<td class="text-center">'.$post['id'].'</td>
                            <td class="text-center">
                           '.$post['login'].'
                            </td>
														 <td class="text-center">
                           '.$post['procent'].'%
                            </td>
							 <td class="text-center">
                           '.$post['money'].' ₽
                            </td>';

							
							
                             if ($post['login'] == $admin['login'] || $post['id'] == 4 )
							 { 
							 echo '<td>
							<center><a href="?vivod" class="btn btn-default btn-icon btn-xs tip" title="" data-original-title="Вывести"><img style="width: 16px;" src="/admin/diz/+.png"></a></center>
							 </td>';
							 }else
							 {
								 echo '<td> </td>';
							 }
							
							
							if ($admin['login'] == 'ADMIN') {echo '<td>
							<center><a href="?vivod" class="btn btn-default btn-icon btn-xs tip" title="" data-original-title="Редактировать"><img style="width: 16px;" src="/admin/diz/12.png"></a></center>
                            </td> ';}
							
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