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

			

            
         
			

					<div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title">Детали</h6></div>
                <div class="table-responsive">
<table class="table table-striped table-bordered">
				
					
                        <thead>
							
                            <tr>
                                <th>ID</th>
                                <th>когда</th>
                                
								<th>что</th>
								<th>кто</th>
								
                            </tr>
                        </thead>
                        <tbody>
						
						
						<?
						
						$q = mysql_query("SELECT * FROM `log`");
						while ($post = mysql_fetch_assoc($q))
						{
							
							$who = mysql_fetch_assoc(mysql_query("SELECT * FROM `admins` WHERE `id` = '".$post['who']."'  LIMIT 1"));
							echo '  <tr>
							<td class="text-center">'.$post['id'].'</td>
                            <td class="text-center">
                           '.times($post['time']).'
                            </td>
							 <td class="text-center">
                           '.$post['text'].'
                            </td>
							<td class="text-center">
                            ';

							if ($who['login'] != null){echo  ''.$who['login'].'';}
							else {echo  'Merchant';}
							
							echo '
                            </td>
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