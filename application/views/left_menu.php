  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('recursos/img/avatar5.png')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $sesion['name']?></p>
        </div>
      </div>

      <!-- search form (Optional)
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      /.search form -->

      <!-- Sidebar Menu -->
   	<div id="menu" class="sidebar-menu" style"width:200px;">
      <ulclass="sidebar-menu">
        <li class="header" style="color:#FFFF00">MENÚ</li>
      </ul>
        <!-- Optionally, you can add icons to the links -->
    
    <div class="container">
  <div class="panel-group"style="width:230px; background-color:transparent;position:relative;right:2em;">
    <div class="panel panel-default">
      <?php $i=0; $sections=$secciones; 
        
      foreach($sections as $fila){ ?>
      	<div class="panel-heading">
      	<h4 class="panel-title">
      	<a href="#<?php echo $fila['seccion']?>" data-toggle="collapse"  aria-expanded="false"><?php echo $fila['seccion']?></a>
      	</h4>
      	</div>
      	<div id="<?php echo $fila['seccion']?>" class="panel-collapse collapse">
        <ul class="list-group">
        <?php  for($i=0;$i<count($fila)-1;$i++){ ?>
	        <li class="list-group-item">
	        <a href="<?php echo $fila[$i]['url']?>"><i class="fa fa-link"></i>
	         <span><?php echo $fila[$i]['label']?></span></a>
	        </li>
	        <?php } ?>
	         </ul>
        <div class="panel-footer">---</div>
      </div>
      <?php }?>
      
      
      
          
        
      </div>
    </div>
  </div>
</div> <!-- cierra el menu -->
    
  </div>
</div>
     
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>