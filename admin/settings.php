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
			


	if (isset($_POST['submit']) )
		{
			
			
			$lenta = check($_POST['lenta']);
			$zamorozen = check($_POST['zamorozen']);
			$version = check($_POST['version']);
			
					mysql_query("UPDATE `settings` SET `lenta` = '".$lenta."' , `zamorozen` = '".$zamorozen."', `version` = '".$version."' WHERE `id` = '1' ");	
					header('location: /admin/settings.php');
			
		}



$kategory = mysql_fetch_assoc(mysql_query("SELECT * FROM `settings` WHERE `id` = '1'  LIMIT 1"));
echo '					<div class="panel panel-default form-horizontal">
                    <div class="panel-heading"><h6 class="panel-title">Настройки лаунчера</h6></div>
                    <div class="panel-body">


<form action="/admin/settings.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">


						
						
						<div class="form-group">
                            <label class="col-sm-2 control-label">Лента: </label>
                            <div class="col-sm-10">
                                 
								<textarea name="lenta"  cols="40" rows="10" class="form-control">'.$kategory['lenta'] .'</textarea>      
								                      </div>
                        </div>
						
						
						
									<div class="form-group">
                            <label class="col-sm-2 control-label">Версия: </label>
                            <div class="col-sm-10">
                               
								<input type="text" name="version" value="'.$kategory['version'].'" class="form-control">                        </div>
                        </div>

						
						
								                      
<div class="form-group">
                            <label class="col-sm-2 control-label">Заморозка чита: </label>
                            <div class="col-sm-10">
						
                 ';


if ($kategory['zamorozen'] == 1 ) { $select1 = 'selected="selected"'; }
if ($kategory['zamorozen'] == 2 ) { $select2 = 'selected="selected"'; }


echo '				 
                                
<select name="zamorozen" class="form-control">
<option value="1" '.$select1.'>Нет</option>
<option value="2" '.$select2.'>Да</option>

</select>
                                
                            </div>
                        </div>
						
						
						
													
						
							
		
			
			
		
	
						
<div class="form-actions text-right">
                            <a href="/admin/settings.php"><span class="btn btn-danger">Отмена</span></a>
                         <input type="submit" name="submit" value="Сохранить" class="btn btn-primary">                        </div>
	

</form></div></div>	
        </div>
    </div>





    
    <script src="/admin/diz/bootstrap.min.js"></script>

  
    <script src="/admin/diz/respond.js"></script>
  
</body></html>	';
	
	
   ?>