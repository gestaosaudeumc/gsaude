<?php
echo ' <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">'.

          //Trata dados usuário
          // Icone Usuario normal fa-user
          // Icone Médico fa-user-md
         '<p>'.$_SESSION["nome"].' </p>
          <i class="fa fa-user-'.($_SESSION["perfil"] ==1 ? 'md' : '').'"></i>'.($_SESSION["perfil"] ==1 ? ' Médico' : ' Colaborador').'</a>
        </div>
      </div>
      <!-- search form 
      
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU PRINCIPAL</li>
        
      <!-- Menu Lateral -->
        <!-- Relatórios -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i>
            <span>Relatórios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="relat_atividades.php"><i class="fa fa-users"></i>Atividades por colaborador</a></li>      
          </ul>
        </li>

       <!-- Dados Cadastrados -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i>
            <span>Dados Cadastrados</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista_colaboradores.php"><i class="fa fa-users"></i>Lista Colaboradores</a></li>
            <li><a href="lista_atividades.php"><i class="fa fa-users"></i>Lista Atividades</a></li>
            <li><a href="lista_campanhas.php"><i class="fa fa-users"></i>Lista Campanhas</a></li>
            <li><a href="lista_questionarios.php"><i class="fa fa-users"></i>Lista Questionários</a></li>

    </ul>
        </li>
    
    
    
        <!-- Novo colaborador-->
        <li>
          <a href="novoColaborador.php">
            <i class="fa fa-user-plus"></i> <span>Novo colaborador</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>

        <!-- Cadastro Atividades-->
        <li>
          <a href="atividades.php">
            <i class="fa fa-trophy"></i> <span>Nova Atividade</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>


        <!-- Criar Campanhas -->
        <li>
          <a href="campanha.php">
            <i class="fa fa-th"></i> <span>Criar Campanha</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>

        <!-- Questionários -->
        <li>
          <a href="questionario.php">
            <i class="fa fa-th"></i> <span>Criar Questionários</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>


        <!-- Desafios -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i>
            <span>Desafios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="relat_atividades.php"><i class="fa fa-users"></i>Cadastro de premiação</a></li>      
            <li><a href="relat_atividades.php"><i class="fa fa-users"></i>Cadastro de metas</a></li>      
            <li><a href="relat_atividades.php"><i class="fa fa-users"></i>Cadastro de Desafios</a></li>      

          </ul>
        </li>





    <!--
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
    -->
    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>' ?>