  <ul class="middle-nav">
			              
                <li><a href="?" class="btn btn-default"><img style="margin: -4px 7px 0px  0px;" src='/admin/diz/15.png'> <span>Статистика</span></a></li>
               
                <li><a href="/admin/stat.php" class="btn btn-default"><img style="margin: -4px 7px 0px  0px;" src='/admin/diz/17.png'> <span>Бухгалтерия</span></a></li>
				 </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Page container -->
    <div class="page-container container-fluid">
    	
    	<!-- Sidebar -->
        <div class="sidebar collapse">
        	<ul class="navigation">
            	<li><a href="/admin"><img style="margin: -4px 7px 0px  0px;" src='/admin/diz/14.png'>Админ панель</a></li>
					<li><a href="/"><img style="margin: -4px 7px 0px  0px;" src='/admin/diz/14.png'>Сайт</a></li>
             
             
				
				    <li>
                    <a href="#" class="expand level-closed"><img style="margin: -4px 7px 0px  0px;" src='/admin/diz/14.png'>Администрация</a>
                    <ul style="display: none;">
                      
                        <li><a href="/admin/admin.php">Администрация</a></li>
						
                       <? if ($admin['login'] == 'ADMIN')echo ' <li><a href="/admin/admin?vivodadm">Вывод средств</a></li>'; ?>
						 
						 
                    </ul>
                </li>
				
				
				
					    <li>
                    <a href="#" class="expand level-closed"><img style="margin: -4px 7px 0px  0px;" src='/admin/diz/14.png'>Пользователи</a>
                    <ul style="display: none;">
                      
                        <li><a href="/admin/user.php">Пользователи</a></li>
						
                       <? echo ' <li><a href="/admin/user.php?add">Добавить пользователя</a></li>'; ?>
						 
						 
                    </ul>
                </li>
				
							    <li>
                    <a href="#" class="expand level-closed"><img style="margin: -4px 7px 0px  0px;" src='/admin/diz/14.png'>Настройки</a>
                    <ul style="display: none;">
                      
                        <li><a href="/admin/settings.php">Настройки лаунчера</a></li>
						
               
                    </ul>
                </li>


		
             
              
			
			
	
			
			
			
        </div>
        <!-- /sidebar -->
		
		
