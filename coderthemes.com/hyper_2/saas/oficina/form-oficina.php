<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 03MAI23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 03MAI23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 03MAI23


 
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 04MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 05MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 09MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 11MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 12MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';
//require 'inc/sentinela.php';


session_start();
$usuario  = $_SESSION['usuario'];
$codigo   = $_SESSION['id'];
$pedido   = $_REQUEST['numero'];

// CRIANDO O NOME DA TABELA //
$tabela = $usuario.$codigo;



// ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
$sql = mysqli_query($con,"SELECT funPrimNome,funCargo, funFoto FROM funcionarios WHERE funCodigo = '$codigo'");
while($obj = mysqli_fetch_array($sql))
{
    $nome  = $obj['funPrimNome']; // NOME DO USUARIO //
    $cargo = $obj['funCargo']; // CARGO DO USUARIO //
    $foto  = $obj['funFoto'];    // FOTO DO USUARIO //
}
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //

// ##  BUSCANDO O NUMERO DA ORDEM DE SERVIÇO E NUMERO DO CLIENTE ## //
  $ord =  mysqli_query($con,"SELECT coringa01, coringa02 FROM $tabela");
   while($_ord = mysqli_fetch_array($ord))
   {
       $ordem    = $_ord['coringa01'];
       $nCliente = $_ord['coringa02'];
   }
   
   // ## BUSCANDO O NOME DO CLIENTE ## //
   $cli = mysqli_query($con,"SELECT CLI_NON_FANT_CLI, CLI_END_CLI, CLI_NUM_END_CLI, CLI_BAI_CLI, CLI_CID_CLI FROM t0013 WHERE CLI_COD_CLI = '$nCliente'");
   while($_cli = mysqli_fetch_array($cli))
   {
       $fantasia = $_cli['CLI_NON_FANT_CLI'];
       $endereco = $_cli['CLI_END_CLI']; 
       $bairro   = $_cli['CLI_BAI_CLI'];
       $cidade   = $_cli['CLI_CID_CLI'];
   }

   // ## BUSCANDO OS DADOS DO PEDIDO ## //
   $ped = mysqli_query($con,"SELECT PED_DAT_ABER_PED FROM t0019 WHERE PED_NUM_PED = '$ordem'");
   while($_ped = mysqli_fetch_array($ped))
   {
       $dtAbertura = $_ped['PED_DAT_ABER_PED'];
   }


/*###########################################################################*/
/* ###  ARQUIVO DE CADASTRO DE CLIENTE DASHBOARD   - SISTEMA DE INDATEC  ### */
/*###########################################################################*/
?>
<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/hyper_2/saas/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:42:43 GMT -->
<head>
        <meta charset="utf-8" />
        <meta charset="utf-8" />
        <title>Indafire - Equipamentos de Combate a Incendios</title><!--  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="indafire combate a incendios e treinamentos" name="description" />
        <meta content="Indafire" name="Franco V. Morales" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logoMenor.png">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

 <style type="text/css">
   

    .size{width: 100%;height: 100%;}
    

 </style>
        <script type="text/javascript">
        

        </script>


    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== INICIO DA BARRA LATERAL ESQUERDA ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/logo-indafire.jpg" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo-indafire.jpg" alt="" height="16">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container" data-simplebar>

                   <!--- MENU LATERAL -->
                    <ul class="side-nav">

                       <li class="side-nav-title side-nav-item">Navegação</li>
                        <!-- ### VARIÁVEIS OCULTAS DO SISTEMA   ### -->
                        <input type="hidden" name="codigo" id="codigo" value="<?php print $codigo ?>"><!-- ## VARIAVEL OCULTA PARA CARREGAR O CÓDIGO/ID DO USUARIO ## -->
                        <input type="hidden" name="nome" id="nome" value="<?php print $funNome ?>"><!-- ## VARIÁVEL OCULTA PARA CARREGAR O NOME DO USUARIO ## -->
                        <input type="hidden" name="email" id="email" value="<?php print $funEmail ?>"><!-- ## VARIÁVEL OCULTA PARA CARREGAR O EMAIL DO USUARIO ## -->
                        <input type="hidden" name="numero" id="numero" value="<?php print $orcamento ?>"><!-- ## VARIÁVEL OCULTA PARA CARREGAR O NUMERO DO ORÇAMENTO ## -->
                        <!-- ###  VARIÁVEIS OCULTAS DO SISTEMA  ### -->


                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <!--span class="badge bg-success float-end">4</span-->
                                <span> Painel Controle </span>
                            </a>
                            <div class="collapse" id="sidebarDashboards">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/controller.php">Voltar</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-title side-nav-item">Menu</li>
                        <li class="side-nav-item">
                            <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/calendario/apps-calendar.php" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Calendario </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/chat/apps-chat.php" class="side-nav-link"><!-- apps-chat.html -->
                                <i class="uil-comments-alt"></i>
                                <span> Chat </span>
                            </a>
                       </li>

                    
                      <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-store"></i>
                            <span> Comercial </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce">
                             <ul class="side-nav-second-level">
                                <li>
                                    <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-orcamento.php">Orçamentos</a>
                                 </li>
                                <li>
                                    <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-products.php">Produtos</a><!-- apps-ecommerce-products.html -->
                                </li>
                                <li>
                                    <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-orders.php">Pedidos</a><!-- apps-ecommerce-orders.html  -->
                                </li>
                                <li>
                                    <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-customers.php">Clientes</a><!-- apps-ecommerce-customers.html -->
                                </li>
                                <li>
                                    <a href="#">Compras</a><!-- apps-ecommerce-shopping-cart.html  -->
                                </li>
                                <li>
                                    <a href="#">Verificação</a><!-- apps-ecommerce-checkout.html  -->
                                </li>
                                <li>
                                    <a href="#">Vendedores</a><!-- apps-ecommerce-sellers.html  -->
                                </li>
                             </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">
                            <i class="uil-document-layout-center"></i>
                            <span> Cadastros </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarForms">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="form-elements.php">Clientes</a><!-- form-elements.html  -->
                                </li>
                                <li>
                                    <a href="form-equipamentos.php">Equipamentos</a><!-- form-advanced.html  -->
                                </li>
                                <li>
                                    <a href="#">Fornecedores</a><!-- form-validation.html -->
                                </li>
                                <li>
                                    <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/form-wizard-pedido.php">Pedidos</a><!-- form-wizard.html  -->
                                </li>
                                <li>
                                    <a href="#">Arquivos Carregados</a><!-- form-fileuploads.html -->
                                </li>
                                <li>
                                    <a href="#">Reclamações</a><!-- form-editors.html -->
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="side-nav-item">
                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-oficina.php" class="side-nav-link">
                            <i class="uil-wrench"></i>
                            <span> Oficina </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                            <i class="uil-envelope"></i>
                            <span> Email </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEmail">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="#">Entrada</a><!-- apps-email-inbox.html -->
                                </li>
                                <li>
                                    <a href="#">Ler Email</a><!-- apps-email-read.html -->
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                            <i class="uil-briefcase"></i>
                            <span> Projetos </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarProjects">
                            <ul class="side-nav-second-level">
                                <li>
                                   <a href="#">Lista</a><!-- apps-projects-list.html -->
                                </li>
                                <li>
                                   <a href="#">Detalhes</a><!-- apps-projects-details.html  -->
                                </li>
                                <li>
                                   <a href="#">Projetos Criados <span class="badge rounded-pill badge-success-lighten font-10 float-end">Novo</span></a><!-- apps-projects-add.html -->
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a href="#" class="side-nav-link"><!-- apps-social-feed.html -->
                            <i class="uil-rss"></i>
                            <span> Feed Notícias </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                            <i class="uil-clipboard-alt"></i>
                            <span> Tarefas </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarTasks">
                            <ul class="side-nav-second-level">
                                <li>
                                  <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/entregas/index.php">Entregar Pedidos</a><!-- ROTINA PARA CADASTRAR PEDIDOS PARA A ENTREGA -->
                                </li>
                                <li>
                                  <a href="#">Lista</a><!-- apps-tasks.html -->
                                </li>
                                <li>
                                  <a href="#">Detalhes</a><!--  apps-tasks-details.html -->
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                    <a href="#" class="side-nav-link"><!-- apps-file-manager.html  -->
                       <i class="uil-folder-plus"></i>
                       <span> Gerenciador Arquivos </span>
                    </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
             </div>
                <!-- Sidebar -left -->
          </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- INICIA O CONTEÚDO DA PÁGINA AQUI                               -->
            <!-- ============================================================== -->
            <div class="content-page">
                <div class="content">

<!--  ##############################################################################################################################################################################################  -->
                <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE SAIR DO SISTEMA ##### -->
                <!-- ALERTA MODAL DE AVISO -->
                <div id="warning-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-warning h1 text-warning"></i>
                                    <h4 class="mt-2">Deseja sair do sistema?</h4>
                                    
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="sim_sair()">Sim</button>
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Não</button>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
<!--  ##############################################################################################################################################################################################  -->


                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list d-lg-none">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-search noti-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                    <form class="p-3">
                                        <input type="text" class="form-control" placeholder="Buscar..." aria-label="Recipient's username">
                                    </form>
                                </div>
                            </li>
                           
                        
                            <li class="notification-list">
                                <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                    <i class="dripicons-gear noti-icon"></i>
                                </a>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="<?php print $foto ?>" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name"><?php print $nome; ?></span>
                                        <span class="account-position"><?php print $cargo; ?></span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Bem vindo !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>Minha Conta</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-edit me-1"></i>
                                        <span>Configurações</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-lifebuoy me-1"></i>
                                        <span>Suporte</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-lock-outline me-1"></i>
                                        <span>Chave de Tela</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span onclick="deslogar()">Deslogar</span>
                                    </a>
                                </div>
                            </li>

                        </ul>
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <div class="app-search dropdown d-none d-lg-block">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control dropdown-toggle"  placeholder="Search..." id="top-search">
                                    <span class="mdi mdi-magnify search-icon"></span>
                                    <button class="input-group-text btn-primary" type="submit">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Indafire</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Oficina</a></li>
                                            <li class="breadcrumb-item active">Formulárro</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">CADASTRO OFICINA</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Ordem Serviço</h4>
                                        

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#custom-styles-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Geral
                                                </a>
                                            </li>
                                            <!--li class="nav-item">
                                                <a href="#custom-styles-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Serviços - Dados para emissão NFe-m
                                                </a>
                                            </li-->
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="custom-styles-preview"><!-- show active -->
                                                
                                                <form class="needs-validation" novalidate>
                                                    <div class="row g-2">
                                                            <div class="mb-3 col-md-3">
                                                                <label class="form-label" for="validationCustom01">Número da OS</label>
                                                                <input type="text" class="form-control" id="validationCustom01" value="<?php  print $ordem;  ?>">
                                                                <div class="valid-feedback">
                                                                    Muito bom!
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 col-md-3">
                                                                <label class="form-label" for="Pedido Venda"> Pedido Venda</label>
                                                                <input type="text" id="pedVenda" name="pedVenda" class="form-control">
                                                            </div>
                                                            <div class="mb-3 col-md-3">
                                                                <label class="form-label" for="Data Abertura"> Data Abertura</label>
                                                                <input type="text" id="dtAbertura" name="dtAbertura" class="form-control" value="<?php  print $dtAbertura;  ?>">
                                                            </div>
                                                            <div class="mb-3 col-md-3">
                                                                <label class="form-label" for="Data Previsao Entrega"> Dt Prev Entrega</label>
                                                                <input type="date" id="dtEntrega" name="dtEntrega" class="form-control">
                                                            </div>
                                                    </div>       
                                                                
                                                    <!--  ##################################  -->
                                                    <?php      ?>                                                     
                                                            <div class="row g-2">
                                                                <div class="mb-3 col-md-2">
                                                                   <label class="form-label" for="grupo">Cliente</label>
                                                                   <input type="text" name="cliente" id="cliente" class="form-control" value="<?php  print $nCliente;  ?>">
                                                                </div>
                                                                <div class="col-md-6">
                                                                   <label class="form-label" for="Nome Cliente"> Nome Cliente</label>
                                                                   <input class="form-control" id="nome" name="nome" value="<?php  print $fantasia;  ?>">
                                                                </div>
                                                                <div class="col-md-2">
                                                                   <label class="form-label" for="Nota Fiscal Eletronica"> NF-e</label>
                                                                   <input type="text" id="nfiscal" name="nfiscal" class="form-control">
                                                                </div>
                                                                <div class="col-md-2">
                                                                   <label class="form-label" for="Encerramento"> Encerramento</label>
                                                                   <input type="text" id="encerramento" name="encerramento" class="form-control"placeholder="00/00/0000">
                                                                </div>
                                                            </div>
                                                 

                                                      <!--  ##################################  --> 
                                                      <div class="row g-2">
                                                            <div class="mb-6 col-md-6">
                                                                <label for="Entrega" class="form-label">End. Entrega</label>
                                                                <input type="text" class="form-control" id="entrega" value="<?php  print $endereco.'-'.$bairro.'-'.$cidade;  ?>">
                                                            </div>

                                                            <div class="mb-3 col-md-6">
                                                                <label for="vendedor" class="form-label">Vendedor</label>
                                                                <input type="text" id="vendedor" class="form-control">
                                                            </div>
                                                      </div>
                                                      <!--  ##################################  --> 
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-1">
                                                                <label for="Fabricante" class="form-label">Código</label>
                                                                <input type="text" id="codFabricante" class="form-control">
                                                            </div>

                                                            <div class="mb-3 col-md-6">
                                                                <label for="Nome fabricante" class="form-label">Fabricante</label>
                                                                <input type="text" id="nomFabricante" class="form-control">
                                                            </div>

                                                            <div class="mb-3 col-md-2">
                                                                <label for="Numero cilindro" class="form-label">Nº Cilindro</label>
                                                                <input type="text" id="nCilindro" class="form-control">
                                                            </div>
                                                            <div class="mb-3 col-md-2">
                                                                <label for="Ano fabricacao" class="form-label">Ano Fabr</label>
                                                                <input type="text" id="anoFabr" class="form-control">
                                                            </div>
                                                            <div class="mb-3 col-md-1">
                                                                <label for="Idade" class="form-label">Idade</label>
                                                                <input type="text" id="idade" class="form-control">
                                                            </div>
                                                      </div>
                                                      <!--  ##################################  --> 
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-1">
                                                                <label for="Tipo" class="form-label">Tipo</label>
                                                                <select id="tipo" class="form-control">
                                                                    <option> </option>
                                                                    <option>ampola</option>
                                                                    <option>ap</option>
                                                                    <option>ap-i</option>
                                                                    <option>ar resp</option>
                                                                    <option>c-k</option>
                                                                    <option>cae</option>
                                                                    <option>co2</option>
                                                                    <option>em</option>
                                                                    <option>mb</option>
                                                                    <option>n</option>
                                                                    <option>oxigenio</option>
                                                                    <option>pqs</option>
                                                                    <option>pqs abc p</option>
                                                                    <option>pqs-abc</option>
                                                                    <option>pqs-I</option>
                                                                    <option>pqsI-abc</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3 col-md-2">
                                                                <label for="Capacidade" class="form-label">Capacidade</label>
                                                                <select id="capacidade" class="form-control">
                                                                    <option>Selecione</option>
                                                                    <option>0.5 kg</option>
                                                                    <option>01 kg</option>
                                                                    <option>02 kg</option>
                                                                    <option>2.3 kg</option>
                                                                    <option>04 kg</option>
                                                                    <option>4.5 kg</option>
                                                                    <option>4.5 kg P</option>
                                                                    <option>06 kg</option>
                                                                    <option>7 kg</option>
                                                                    <option>08 kg</option>
                                                                    <option>09 kg</option>
                                                                    <option>10 kg</option>
                                                                    <option>12 kg</option>
                                                                    <option>13.2 kg</option>
                                                                    <option>20.0 kg</option>
                                                                    <option>25.0 kg</option>
                                                                    <option>30 kg</option>
                                                                    <option>34 kg</option>
                                                                    <option>40 kg</option>
                                                                    <option>45 kg</option>
                                                                    <option>50 kg</option>
                                                                    <option>100 kg</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3 col-md-2">
                                                                <label for="Ultimo Reteste" class="form-label">Ult Reteste</label>
                                                                <input type="text" id="uReteste" class="form-control">
                                                            </div>
                                                            <div class="mb-3 col-md-2">
                                                                <label for="Ano fabricacao" class="form-label">Prox Reteste</label>
                                                                <input type="text" id="proReteste" class="form-control">
                                                            </div>
                                                            <div class="mb-3 col-md-2">
                                                                <label for="Prox Recarga" class="form-label">Prox Recarga</label>
                                                                <input type="text" id="proRecarga" class="form-control">
                                                            </div>
                                                            <div class="mb-3 col-md-2">
                                                                <label for="Prox Recarga" class="form-label">P.Trab/PNC</label>
                                                                <input type="text" id="proRecarga" class="form-control">
                                                            </div>
                                                            <div class="mb-3 col-md-1">
                                                                <label for="Press Ensaio" class="form-label">Ensaio</label>
                                                                <input type="text" id="Ensaio" class="form-control">
                                                            </div>
                                                      </div>
                                                      <!--  ##################################  --> 

                                                     
                                                      <!--  ##################################  -->
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-2">
                                                                <label for="Codigo Projeto" class="form-label">Cod. Projeto</label>
                                                                <input type="text" id="codProjeto" class="form-control">
                                                            </div>
                                                            <div class="mb-3 col-md-2">
                                                                <label for="Norma fabricao" class="form-label">Norma Fabr</label>
                                                                <select id="nFabricao" class="form-control">
                                                                    <option>Selecione</option>
                                                                    <option>10715</option>
                                                                    <option>10721</option>
                                                                    <option>11715</option>
                                                                    <option>11716</option>
                                                                    <option>11751 esm</option>
                                                                    <option>11762</option>
                                                                    <option>12275</option>
                                                                    <option>12630</option>
                                                                    <option>12639</option>
                                                                    <option>12790</option>
                                                                    <option>12791</option>
                                                                    <option>12962</option>
                                                                    <option>149</option>
                                                                    <option>1541</option>
                                                                    <option>15808</option>
                                                                    <option>15809</option>
                                                                    <option>16357</option>
                                                                    <option>4705</option>
                                                                    <option>926</option>
                                                                    <option>DOT 3AA</option>
                                                                    <option>DOT-10915</option>
                                                                    <option>EB1199</option>
                                                                    <option>EB1002</option>
                                                                    <option>EB148</option>
                                                                    <option>EB149</option>
                                                                    <option>EB150</option>
                                                                    <option>EB160</option>
                                                                    <option>ISO 11119-2</option>
                                                                    <option>ISO 13341</option>
                                                                    <option>ISO 4507</option>
                                                                    <option>ISO 9809-1</option>
                                                                    <option>ISO 9809-3</option>
                                                                    <option>TC-3ALM</option>
                                                                    <option>FN1964-1</option>
                                                                    <option>EN1964-1</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3 col-md-2">
                                                                <label for="Selo" class="form-label">Selo</label>
                                                                <input id="selo" class="form-control">
                                                            </div>

                                                            <div class="mb-3 col-md-2">
                                                                <label for="Numero Patrimonio" class="form-label">N. Patrimonio</label>
                                                                <input id="patrimonio" class="form-control">
                                                            </div>

                                                            <div class="mb-3 col-md-2">
                                                                <label for="Deposito Pavilhao" class="form-label">Dep/Pav/Galpao</label>
                                                                <input id="pavilhao" class="form-control">
                                                            </div>

                                                            <div class="mb-3 col-md-2">
                                                                <label for="Local Pavilhao" class="form-label">Local Pavilhao</label>
                                                                <input id="locPavilhao" class="form-control">
                                                            </div>
                                                      </div> 
                                                      <!--  ##################################  -->
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-4">
                                                                <label for="nivel 1" class="form-label"><strong>Nivel 1</strong></label><br>
                                                                <input type="checkbox" name="nSelo" value="inspecao nao selo">
                                                                <label for="naoSelo"> Inspeção não consta selo</label><br>
                                                                <input type="checkbox" name="nSelo" value="inspecao nao selo">
                                                                <label for="naoSelo"> Passagem CO2 Semestral</label><br>
                                                                <input type="checkbox" name="nSelo" value="inspecao nao selo">
                                                                <label for="naoSelo"> Garantia</label><br>
                                                                
                                                            </div>

                                                            <div class="mb-3 col-md-4">
                                                                <label for="nivel 1" class="form-label"><strong>Nivel 2</strong></label><br>
                                                                <input type="checkbox" name="manutencao" value="manutencao">
                                                                <label for="manutencao"> Manutenção</label><br>
                                                                <input type="checkbox" name="recarga" value="recarga">
                                                                <label for="recarga"> Recarga</label><br>
                                                                
                                                            </div>

                                                            <div class="mb-3 col-md-4">
                                                                <label for="nivel 1" class="form-label"><strong>Nivel 3</strong></label><br>
                                                                <input type="checkbox" name="manutencao" value="manutencao">
                                                                <label for="manutencao"> Manutenção com reteste</label><br>
                                                                <input type="checkbox" name="recarga" value="recarga">
                                                                <label for="recarga"> Recarga com reteste</label><br>
                                                                
                                                            </div>
                                                      </div> 
                                                      <!--  ##################################  -->
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-12">
                                                                <label for="rateiovenda" class="form-label">Grupo Rateio (venda)</label>
                                                                <select id="rateiovenda" class="form-control">
                                                                <option value="selecione">SELECIONE</option>
                                                                </select>
                                                            </div>
                                                      </div> 
                                                      <!--  ##################################  -->
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-12">
                                                                <label for="rateiocompra" class="form-label">Grupo Rateio (compra)</label>
                                                                <select id="rateiocompra" class="form-control">
                                                                <option value="selecione">SELECIONE</option>
                                                                </select>
                                                            </div>
                                                      </div> 
                                                      <!--  ##################################  -->
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-6">
                                                                <label for="rateiocompra" class="form-label">Situação</label>
                                                                <select id="rateiocompra" class="form-control">
                                                                <option value="selecione">SELECIONE</option>
                                                                <option value="ativo">Ativo</option>
                                                                <option value="inativo">Inativo</option> 
                                                                </select>
                                                            </div>
                                                      </div> 
                                                      <!--  ##################################  -->
                                                      
                                                       <div class="row g-2">
                                                            <div class="mb-3 col-md-2">
                                                                <input type="button" name="salvar" id="salvar" class="btn btn-info" value="Novo">
                                                            </div>
                                                            <div class="mb-3 col-md-2">
                                                                <input type="button" name="alterar" id="alterar" class="btn btn-warning" value="Alterar">
                                                            </div>
                                                            <div class="mb-3 col-md-2">
                                                                <input type="button" name="excluir" id="excluir" class="btn btn-danger" value="Excluir">
                                                            </div>
                                                            <div class="mb-3 col-md-2">
                                                                <input type="button" name="adicionar" id="adicionar" class="btn btn-info" value="Adicionar">
                                                            </div>
                                                        </div> 

                                                </form>
                                            </div> <!-- end preview-->
                                        
                                            <!--div class="tab-pane" id="custom-styles-code">
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;form class=&quot;needs-validation&quot; novalidate&gt;
                                                            &lt;div class=&quot;mb-3&quot;&gt;
                                                                &lt;label class=&quot;form-label&quot; for=&quot;validationCustom01&quot;&gt;First name&lt;/label&gt;
                                                                &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationCustom01&quot; placeholder=&quot;First name&quot; value=&quot;Mark&quot; required&gt;
                                                                &lt;div class=&quot;valid-feedback&quot;&gt;
                                                                    Looks good!
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;mb-3&quot;&gt;
                                                                &lt;label class=&quot;form-label&quot; for=&quot;validationCustom02&quot;&gt;Last name&lt;/label&gt;
                                                                &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationCustom02&quot; placeholder=&quot;Last name&quot; value=&quot;Otto&quot; required&gt;
                                                                &lt;div class=&quot;valid-feedback&quot;&gt;
                                                                    Looks good!
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;mb-3&quot;&gt;
                                                                &lt;label class=&quot;form-label&quot; for=&quot;validationCustomUsername&quot;&gt;Username&lt;/label&gt;
                                                                &lt;div class=&quot;input-group&quot;&gt;
                                                                    &lt;span class=&quot;input-group-text&quot; id=&quot;inputGroupPrepend&quot;&gt;@&lt;/span&gt;
                                                                    &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationCustomUsername&quot; placeholder=&quot;Username&quot;
                                                                        aria-describedby=&quot;inputGroupPrepend&quot; required&gt;
                                                                    &lt;div class=&quot;invalid-feedback&quot;&gt;
                                                                        Please choose a username.
                                                                    &lt;/div&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;mb-3&quot;&gt;
                                                                &lt;label class=&quot;form-label&quot; for=&quot;validationCustom03&quot;&gt;City&lt;/label&gt;
                                                                &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationCustom03&quot; placeholder=&quot;City&quot; required&gt;
                                                                &lt;div class=&quot;invalid-feedback&quot;&gt;
                                                                    Please provide a valid city.
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;mb-3&quot;&gt;
                                                                &lt;label class=&quot;form-label&quot; for=&quot;validationCustom04&quot;&gt;State&lt;/label&gt;
                                                                &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationCustom04&quot; placeholder=&quot;State&quot; required&gt;
                                                                &lt;div class=&quot;invalid-feedback&quot;&gt;
                                                                    Please provide a valid state.
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;mb-3&quot;&gt;
                                                                &lt;label class=&quot;form-label&quot; for=&quot;validationCustom05&quot;&gt;Zip&lt;/label&gt;
                                                                &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationCustom05&quot; placeholder=&quot;Zip&quot; required&gt;
                                                                &lt;div class=&quot;invalid-feedback&quot;&gt;
                                                                    Please provide a valid zip.
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;mb-3&quot;&gt;
                                                                &lt;div class=&quot;form-check&quot;&gt;
                                                                    &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;invalidCheck&quot; required&gt;
                                                                    &lt;label class=&quot;form-check-label form-label&quot; for=&quot;invalidCheck&quot;&gt;Agree to terms
                                                                        and conditions&lt;/label&gt;
                                                                    &lt;div class=&quot;invalid-feedback&quot;&gt;
                                                                        You must agree before submitting.
                                                                    &lt;/div&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;button class=&quot;btn btn-primary&quot; type=&quot;submit&quot;&gt;Submit form&lt;/button&gt;
                                                        &lt;/form&gt;
                                                    </span-->
                                                <!--/pre--> <!-- end highlight-->
                                            <!--/div--> <!-- end preview code-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->


                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">PLANILHA DE ITENS</h4>
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#tooltips-validation-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Geral
                                                </a>
                                            </li>
                                            <style type="text/css">
                                                  #tabExternal{position:absolute;display:block;height:600%;width:100%;left:00%;border-style: none;border-radius: 02%;background-color:#DCDCDC;overflow-x: scroll;}
                                                  #tabela{display:block;height:100%;width:190%;border-style: none;}
                                                  table {border-collapse: collapse; width: 190%; display: block;}
                                                  thead {background-color: #EFEFEF;}
                                                  thead {display: block;}
                                                  tbody {overflow-y: scroll; overflow-x: hidden; height: 100px;}
                                                  td    {min-width: 100px; height: 75px; border: dashed 1px lightblue;}
                                                  th    {min-width: 100px; height: 75px; border: dashed 1px lightblue;}

                                            </style>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="tooltips-validation-preview">
                                                <div id="tabExternal">
                                                    <table id="tabela" class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Total Cil</th>
                                                                <th>Seq Inc</th>
                                                                <th>Selo Inmetro</th>
                                                                <th>Cilindro</th>
                                                                <th>Ano Fabric</th>
                                                                <th>Tipo Ext</th>
                                                                <th>Capacidade</th>
                                                                <th>Nivel Manut</th>
                                                                <th>Lote</th>
                                                                <th>Fabricação</th>
                                                                <th>Nr Patrimonio</th>
                                                                <th>Uso Interno</th>
                                                                <th>Ult Reteste</th>
                                                                <th>Prox Recarga</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                </table>

                                                </div>


                                                        <!--&lt;form class=&quot;needs-validation&quot; novalidate&gt;
                                                            &lt;div class=&quot;position-relative mb-3&quot;&gt;
                                                                &lt;label class=&quot;form-label&quot; for=&quot;validationTooltip01&quot;&gt;First name&lt;/label&gt;
                                                                &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationTooltip01&quot; placeholder=&quot;First name&quot; value=&quot;Mark&quot; required&gt;
                                                                &lt;div class=&quot;valid-tooltip&quot;&gt;
                                                                    Looks good!
                                                                &lt;/div&gt;
                                                                &lt;div class=&quot;invalid-tooltip&quot;&gt;
                                                                    Please enter first name.
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;position-relative mb-3&quot;&gt;
                                                                &lt;label class=&quot;form-label&quot; for=&quot;validationTooltip02&quot;&gt;Last name&lt;/label&gt;
                                                                &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationTooltip02&quot; placeholder=&quot;Last name&quot; value=&quot;Otto&quot; required&gt;
                                                                &lt;div class=&quot;valid-tooltip&quot;&gt;
                                                                    Looks good!
                                                                &lt;/div&gt;
                                                                &lt;div class=&quot;invalid-tooltip&quot;&gt;
                                                                    Please enter last name.
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;position-relative mb-3&quot;&gt;
                                                                &lt;label class=&quot;form-label&quot; for=&quot;validationTooltipUsername&quot;&gt;Username&lt;/label&gt;
                                                                &lt;div class=&quot;input-group&quot;&gt;
                                                                    &lt;span class=&quot;input-group-text&quot; id=&quot;validationTooltipUsernamePrepend&quot;&gt;@&lt;/span&gt;
                                                                    &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationTooltipUsername&quot; placeholder=&quot;Username&quot;
                                                                        aria-describedby=&quot;validationTooltipUsernamePrepend&quot; required&gt;
                                                                    &lt;div class=&quot;invalid-tooltip&quot;&gt;
                                                                        Please choose a unique and valid username.
                                                                    &lt;/div&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;position-relative mb-3&quot;&gt;
                                                                &lt;label class=&quot;form-label&quot; for=&quot;validationTooltip03&quot;&gt;City&lt;/label&gt;
                                                                &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationTooltip03&quot; placeholder=&quot;City&quot; required&gt;
                                                                &lt;div class=&quot;invalid-tooltip&quot;&gt;
                                                                    Please provide a valid city.
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;position-relative mb-3&quot;&gt;
                                                                &lt;label class=&quot;form-label&quot; for=&quot;validationTooltip04&quot;&gt;State&lt;/label&gt;
                                                                &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationTooltip04&quot; placeholder=&quot;State&quot; required&gt;
                                                                &lt;div class=&quot;invalid-tooltip&quot;&gt;
                                                                    Please provide a valid state.
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;position-relative mb-3&quot;&gt;
                                                                &lt;label class=&quot;form-label&quot; for=&quot;validationTooltip05&quot;&gt;Zip&lt;/label&gt;
                                                                &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationTooltip05&quot; placeholder=&quot;Zip&quot; required&gt;
                                                                &lt;div class=&quot;invalid-tooltip&quot;&gt;
                                                                    Please provide a valid zip.
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;button class=&quot;btn btn-primary&quot; type=&quot;submit&quot;&gt;Submit form&lt;/button&gt;
                                                        &lt;/form&gt; -->
                                                    <!--/span-->
                                                </pre> <!-- end highlight-->
                                            </div> <!-- end preview code-->
                                        </div> <!-- end tab-content-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Indafire - Equipamentos Combate a Incendio
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right Sidebar -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Controle Serviço</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar>

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Controle serviço </strong> Este é o painel de botões para carregar as funções para sua área de trabalho.
                    </div>

                    <!-- Settings -->
                    <h5 class="mt-3">Color Scheme</h5>
                    <hr class="mt-1" />

                    <div class="form-check form-switch mb-1">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                    </div>
       

                    <!-- Width -->
                    <h5 class="mt-4">Width</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                    </div>
        

                    <!-- Left Sidebar-->
                    <h5 class="mt-4">Left Sidebar</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                       <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                    </div>

                    <div class="form-check form-switch mb-1">
                       <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                    </div>

                    <div class="form-check form-switch mb-1">
                       <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
            
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                            class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                    </div>
                </div> <!-- end padding-->

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->


        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

         <!-- arquivo externo javascript -->
        <script src="assets/js/script.js"></script>

    </body>


<!-- Mirrored from coderthemes.com/hyper_2/saas/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:42:43 GMT -->
</html>