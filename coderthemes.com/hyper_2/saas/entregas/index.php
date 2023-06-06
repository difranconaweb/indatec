<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 19AGO22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 19AGO22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 19AGO22




   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21AGO22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 22AGO22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23AGO22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24AGO22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23SET22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 11OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 13OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 19OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 20OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 25OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10ABR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



session_start();
$usuario = $_SESSION['usuario']; // NOME DO USUARIO //
$codigo  = $_SESSION['id'];      // CODIGO DO USUARIO //
$data    = Date('d/m/Y'); // DATA  ATUAL //
$hora    = Date('H:i:s'); // HORA ATUAL //

//#########################################################################################//
// ###  ARQUIVO DE CADASTRO DE NUMERO PEDIDOS NA BASE TEMPORÁRIA - SISTEMA DE INDATEC  ### //
//#########################################################################################//

    // BUSCANDO OS REGISTROS DE PEDIDOS QUE FORAM REGISTRADOS NA TABELA TEMPORÁRIA  //
    // DEVOLVENDO A QUANTIDADE E O PEDIDO PARA COLOCAR NA GRID  //

    $sql = mysqli_query($con,"SELECT lisCodigo,lisNumero,lisCondicao,lisData,lisHora,lisFuncionario FROM listaPedidos WHERE lisData = '$data'");
    $sum = mysqli_num_rows($sql); // CARREGANDO A QUANTIDADE DE REGISTROS //


// ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
$_sql = mysqli_query($con,"SELECT funPrimNome,funCargo,funFoto FROM funcionarios WHERE funCodigo = '$codigo'");
while($_obj = mysqli_fetch_array($_sql))
{
    $nome  = $_obj['funPrimNome']; // NOME DO USUARIO //
    $cargo = $_obj['funCargo'];    // CARGO DO USUARIO //
    $foto  = $_obj['funFoto'];     // FOTO DO USUARIO //
}
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //

// ## BUSCANDO OS REGISTROS DE ENTREGA/RETIRADA DO DIA ## //
$rel = mysqli_query($con,"SELECT relPedido,relStatus,relData,relHora,relResponsavel FROM relatorio WHERE relData = '$data'");

?>

<!DOCTYPE html>
    <html lang="en">

    
<!-- Mirrored from coderthemes.com/hyper_2/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:40:28 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Sistema Indatec</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Indafire Equipamentos de Combate a Incendios" name="description" />
        <meta content="Indafire" name="Franco V. Morales" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logoMenor.png">

        <!-- third party css -->
        <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
        <script type="text/javascript">
  
        </script>
  
<style type="text/css">
   #inicio-frame {position:relative;display:block;width:100%;height:35%;border-style:none;border-radius:08px;background-color: #FFFFFF;box-shadow:5px 5px 5px rgba(0,0,0,0.5);padding:5px;overflow:scroll;}
   .frame-interno {position:absolute;width:90%;height:100%;border-style: none;background-color: #D3D3D3; }
</style>
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== INICIO DE BARRA LATERAL ESQUERDA ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="#" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/logo-indafire.jpg" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo_sm.png" alt="" height="16">
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
                        <input type="hidden" name="codigo" id="codigo" value="<?php print $codigo ?>"><!-- ## VARIAVEL OCULTA PARA CARREGAR O CÓDIGO/ID DO CLIENTE ## -->
                        <input type="hidden" name="nome" id="nome" value="<?php print $nome ?>"><!-- ## VARIÁVEL OCULTA PARA CARREGAR O NOME DO CLIENTE ## -->
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
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/controller.php">Voltar</a><!-- ROTINA PARA A TELA PRINCIPAL -->
                                    </li>
                                </ul>
                            </div>

                            <li class="side-nav-title side-nav-item">Menu</li>

                        <li class="side-nav-item">
                            <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/calendario/apps-calendar.php" class="side-nav-link"><!-- apps-calendar.html -->
                                <i class="uil-calender"></i>
                                <span> Calendário </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/chat/apps-chat.php" class="side-nav-link"><!-- apps-chat.html  -->
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
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/form-wizard-orcamento.php">Orçamentos</a>
                                    </li>
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-products.php">Produtos</a>
                                    </li>
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-customers.php">Clientes</a><!-- apps-ecommerce-customers.html -->
                                    </li>
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-orders.php">Pedidos</a>
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
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/cadastros/form-elements.php">Clientes</a><!-- form-elements.html  -->
                                    </li>
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/cadastros/form-advanced.php">Equipamentos</a><!-- form-advanced.html  -->
                                    </li>
                                    <li>
                                        <a href="#">Fornecedores</a><!-- form-validation.html -->
                                    </li>
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/form-wizard-orcamento.php">Orçamentos</a><!-- form-wizard.html  -->
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
                                                <!-- LAERTA MODAL DE AVISO -->
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


                    <!-- INICIO DA BARRA DO TOPO DA PÁGINA -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list d-lg-none">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-search noti-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                    <form class="p-3">
                                        <input type="text" class="form-control" placeholder="Buscar ..." aria-label="Recipient's username">
                                    </form>
                                </div>
                            </li>
                            

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="<?php print $foto; ?>" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name"><?php print $nome; ?></span>
                                        <span class="account-position"><?php print $cargo; ?></span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Seja Bem vindo !</h6>
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
                                        <span>Segurança Tela</span>
                                    </a>

                                    <!-- item-->

                                    <a href="javascript:void(0);" class="dropdown-item notify-item"><!--  -->
                                        <i class="mdi mdi-logout me-1"></i>
                                       
                                        <span onclick="deslogar()">Deslogar</span>
                                     </a>
                                </div>
                            </li>
                        </ul>

                       <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>
                    <!-- end Topbar -->
                    
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <form class="d-flex">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                                <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                                            </div>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Formulário para Registro Pedidos Entrega</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                       <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-cart-plus widget-icon" onclick="adicionar()"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Quantidade Pedidos</h5>
                                                <h3 class="mt-3 mb-3"><?php print $sum; ?></h3>
                                                <form class="d-flex">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-light" name="numero_pedido" id="numero_pedido" placeholder="Digite o Número Pedido">&nbsp;&nbsp;
                                                            <select class="form-control form-control-light" name="condicao_pedido" id="condicao_pedido">
                                                                <option value="SELECIONE">Retirada ou Entrega?</option>
                                                                <option value="ENTREGA">Entrega</option>
                                                                <option value="RETIRADA">Retirada</option>
                                                            </select>&nbsp;&nbsp;
                                                            <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal" onclick="gravar_numero_pedido()">Salvar</button>
                                                            <span id="excessao"></span>
                                                            <!--span class="input-group-text bg-primary border-primary text-white">
                                                                <i class="mdi mdi-calendar-range font-13"></i>
                                                            </span-->
                                                        </div>
                                                </form>
                                            </div> <!-- end card-body-->
                                        </div>
                                    </div> <!-- end card--><!-- inicio-frame  planilha-registros -->

        <!-- ################################################################## -->    
                                        <div class="col-sm-6"> 
                                            <div class="card widget-flat">
                                                <div class="card-body">
                                                    <a href="#" class="btn btn-sm btn-link float-end">Export
                                                        <i class="mdi mdi-download ms-1"></i>
                                                    </a>
                                                        <h4 class="header-title mt-2 mb-3">Lista Pedidos Entrega</h4>
                                                          <div class="table-responsive">
                                                            <div id="inicio-frame" class="frame-interno">
                                                              <table class="table table-centered table-nowrap table-hover mb-0">
                                                                  <tbody>
                                                                  <?php while($obj = mysqli_fetch_array($sql))    
                                                                  { ?>
                                                                      <tr>
                                                                          <td>
                                                                              <h5 class="font-14 my-1 fw-normal">Pedido</h5>
                                                                              <span class="text-muted font-13"><?php print $obj['lisNumero']; ?></span>
                                                                          </td>
                                                                          <td>
                                                                              <h5 class="font-14 my-1 fw-normal">Condição</h5>
                                                                              <span class="text-muted font-13"><?php print $obj['lisCondicao']; ?></span>
                                                                          </td> 
                                                                          <td>
                                                                              <h5 class="font-14 my-1 fw-normal">Data</h5>
                                                                              <span class="text-muted font-13"><?php print $obj['lisData']; ?></span>
                                                                          </td>
                                                                          <td>
                                                                              <h5 class="font-14 my-1 fw-normal">Hora</h5>
                                                                              <span class="text-muted font-13"><?php print $obj['lisHora']; ?></span>
                                                                          </td>
                                                                          <td>
                                                                              <h5 class="font-14 my-1 fw-normal">Responsável</h5>
                                                                              <span class="text-muted font-13"><?php print $obj['lisFuncionario']; ?></span>
                                                                          </td>
                                                                          <td>
                                                                              <h5 class="font-14 my-1 fw-normal">Remover</h5>
                                                                              <span class="text-muted font-13"><a href="apagar_pedido.php?evento=<?php print $obj['lisNumero']; ?>">SIM</span>
                                                                          </td>
                                                                      </tr> <?php  }  ?>
                                                                          <!-- ATENÇÃO - COLOCAR LAÇO REPETIÇÃO AQUI PARA OS BLOCOS <TR> -->
                                                                  </tbody></div>
                                                              </table>
                                                          </div> <!-- end table-responsive-->
                                                </div> <!-- end col-->
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>                       
<!-- ###################################################################################################################################### -->
                        <div class="row">
                           <div class="col-xl-12 col-lg-12">
                                    <div class="table-responsive">
                                       <table class="table table-centered table-nowrap mb-0">
                                          <thead class="table-light">
                                             <tr>
                                                <th style="width: 20px;">
                                                  <div class="form-check">
                                                     <input type="checkbox" class="form-check-input" id="customCheck1">
                                                     <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                  </div>
                                                </th>
                                                    <th>Nº Pedido</th>
                                                    <th>Data</th>
                                                    <th>Status Pagamento</th>
                                                    <th>Total</th>
                                                    <th>Método Pagamento</th>
                                                    <th>Status Pedido</th>
                                                    <th>Responsável</th>
                                                    <th style="width: 125px;">Ação</th>
                                             </tr>
                                          </thead>
                                                <tbody><?php while($_rel = mysqli_fetch_array($rel))   { ?>
                                                    <tr>    
                                                       <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td> 
                                                             <td><a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-orders-details.php?pedido=<?php print $_rel['relPedido']; ?>" class="text-body fw-bold"><?php print $_rel['relPedido']; ?></a> </td>
                                                        <td>
                                                           <?php print $_rel['relData'];  ?>-<small class="text-muted"><?php print $_rel['relHora'] ?></small>
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-success-lighten"><i class="mdi mdi-bitcoin"></i> XXXXXXX</span></h5>
                                                        </td>
                                                        <td>
                                                            0,00
                                                        </td>
                                                        <td>
                                                            XXXXXXXXXXXX
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-info-lighten"> <?php print $_rel['relStatus'];  ?></span></h5>
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-info-lighten"> <?php print $_rel['relResponsavel'];  ?></span></h5>
                                                        </td>
                                                        <td> 
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr><?php }  ?>
                                                </tbody>
                                            </table>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                    </div>
                    <!-- container -->


<!-- ########################################################################################################## -->
<!-- ########################################################################################################## -->
                  

                </div>
                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Indafire - Equipamentos de Combate a Incendios
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">Sobre</a>
                                    <a href="javascript: void(0);">Suporte</a>
                                    <a href="javascript: void(0);">Contato</a>
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

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="assets/js/vendor/apexcharts.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="assets/js/pages/demo.dashboard.js"></script>
        <!-- end demo js-->

        <!-- script para funções de arquivo-->
        <script src="assets/js/script.js"></script>
        <!-- final de script js-->
    </body>

<!-- Mirrored from coderthemes.com/hyper_2/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:41:29 GMT -->
</html>