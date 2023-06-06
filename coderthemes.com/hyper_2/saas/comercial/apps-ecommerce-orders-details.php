<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 16SET22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 16SET22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 16SET22



   
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 19SET22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 20SET22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21SET22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 25OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 26OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 31OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 13MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 16MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 20ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 12MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';
require 'inc/conexao02.php';


session_start();
$usuario = $_SESSION['usuario'];
$codigo  = $_SESSION['id'];
$pedido  = $_REQUEST['pedido'];


// ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
$sql = mysqli_query($con,"SELECT funPrimNome,funCargo,funFoto FROM funcionarios WHERE funCodigo = '$codigo'");
while($obj = mysqli_fetch_array($sql))
{
    $nome  = $obj['funPrimNome']; // NOME DO USUARIO //
    $cargo = $obj['funCargo'];    // CARGO DO USUARIO //
    $foto  = $obj['funFoto'];    // FOTO DO USUARIO //
}
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //


// ## ROTINA PARA CARREGAR PEDIDO NA TELA ## //
$sql = mysqli_query($con,"SELECT relPedido,relCliente,relEndereco,relNumero,relCidade,relTelefone,relData,relHora,relHoraEmbarque,relHoraSaida,relHoraEntrega,relResponsavel,relStatus1  FROM  relatorio WHERE relPedido = '$pedido'");
while($obj = mysqli_fetch_array($sql))
{
     $pedido        = $obj['relPedido'];  // CARREGA O NUMERO DO PEDIDO //
     $cliente       = $obj['relCliente']; // NOME DO CLIENTE //
     $endereco      = $obj['relEndereco'];  // CARREGA O ENDEREÇO //
     $numero        = $obj['relNumero'];  // CARREGA O NUMERO DO ENDERECO //
     $cidade        = $obj['relCidade'];  // CARREGA A CIDADE //
     $telefone      = $obj['relTelefone'];  // CARREGA O TELEFONE //
     $data          = $obj['relData']; // CARREGA A DATA DA ABERTURA PEDIDO //
     $hora          = $obj['relHora']; // CARREGA A HORA DO PEDIDO //
     $responsavel   = $obj['relResponsavel']; // CARREGA O NOME DO RESPONSÁVEL //
     $hora_aberto   = $obj['relHora']; // HORARIO QUE ABRIU O PEDIDO //
     $hora_embarque = $obj['relHoraEmbarque']; // HORARIO DO EMBARQUE //
     $hora_saida    = $obj['relHoraSaida']; // HORA DA SAIDA DOS EQUIPAMENTOS //
     $hora_entrega  = $obj['relHoraEntrega']; // HORARIO DA ENTREGA //
     $status        = $obj['relStatus1']; // STATUS DA ENTREGA //
}

// ## INSERINDO A PORCENTAGEM AO NUMERO DO STATUS ## //
$status = $status.'%';

// ## FINAL DE BUSCA DE PEDIDO ## //
/*###########################################################################*/
/* ###  ARQUIVO PARA VERIFICAR PEDIDO COM DETALHES - SISTEMA DE INDATEC  ### */
/*###########################################################################*/
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper_2/saas/apps-ecommerce-orders-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:42:02 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Indafire - Equipamentos de Combate a Incendios</title><!-- Indafire - Equipamentos de Combate a Incendios -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Indafire - Equipamentos de Combate a Incendios" name="description" />
        <meta content="Indafire" name="Franco V.  Morales" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logoMenor.png">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="index.php" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/logo-indafire.jpg" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo_sm.png" alt="" height="16">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="index.php" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container" data-simplebar>

                   <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">NAVEGAÇÃO</li>
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
                        </li>

                        <li class="side-nav-item">
                            <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/calendario/apps-calendar.php" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Calendário </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/chat/apps-chat.php" class="side-nav-link">
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
                                        <a href="apps-ecommerce-orders.php">Voltar Lista</a>
                                    </li>
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-orcamento.php">Orçamentos</a>
                                    </li>
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-products.php">Produtos</a>
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-products-details.html">Detalhes Produtos</a>
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-orders.php">Pedidos</a>
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-customers.html">Clientes</a>
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-shopping-cart.html">Compra</a>
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-checkout.html">Verificação</a>
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-sellers.html">Vendedores</a>
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
                                                        <a href="cadastros/form-elements.php">Clientes</a><!-- form-elements.html  -->
                                                    </li>
                                                    <li>
                                                        <a href="cadastros/form-advanced.php">Equipamentos</a><!-- form-advanced.html  -->
                                                    </li>
                                                    <li>
                                                        <a href="form-validation.html">Fornecedores</a><!-- form-validation.html -->
                                                    </li>
                                                    <li>
                                                        <a href="form-wizard.html">Orçamentos</a><!-- form-wizard.html  -->
                                                    </li>
                                                    <li>
                                                        <a href="form-fileuploads.html">Arquivos Carregados</a><!-- form-fileuploads.html -->
                                                    </li>
                                                    <li>
                                                        <a href="form-editors.html">Reclamações</a><!-- form-editors.html -->
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
                                            <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link">
                                                <i class="uil-table"></i>
                                                <span> Tabelas </span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarTables">
                                                <ul class="side-nav-second-level">
                                                    <li>
                                                        <a href="tables-basic.html">Tabelas Basicas</a>
                                                    </li>
                                                    <li>
                                                        <a href="tables-datatable.html">Tabela Dados</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="side-nav-item">
                                            <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps" class="side-nav-link">
                                                <i class="uil-location-point"></i>
                                                <span> Mapas </span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarMaps">
                                                <ul class="side-nav-second-level">
                                                    <li>
                                                        <a href="maps-google.html">Google Maps</a>
                                                    </li>
                                                    <li>
                                                        <a href="maps-vector.html">Vetor Mapa</a>
                                                    </li>
                                                </ul>
                                            </div>
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
                                        <a href="apps-email-inbox.html">Entrada</a>
                                    </li>
                                    <li>
                                        <a href="apps-email-read.html">Ler Email</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a href="apps-social-feed.html" class="side-nav-link">
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
                                        <a href="apps-tasks.html">Lista</a>
                                    </li>
                                    <li>
                                        <a href="apps-tasks-details.html">Detalhes</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!--li class="side-nav-item">
                            <a href="apps-file-manager.html" class="side-nav-link">
                                <i class="uil-folder-plus"></i>
                                <span> Gerenciador Arquivos </span>
                            </a>
                        </li-->

                        <li class="side-nav-title side-nav-item">Clientes</li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                                <i class="uil-copy-alt"></i>
                                <span> Páginas </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPages">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="pages-profile.html">Perfil</a>
                                    </li>
                                    <li>
                                        <a href="pages-profile-2.html">Perfil 2</a>
                                    </li>
                                    <li>
                                        <a href="pages-invoice.html">Nota Fiscal</a>
                                    </li>
                                    <li>
                                        <a href="pages-faq.html">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="pages-pricing.html">Preços</a>
                                    </li>
                                    <li>
                                        <a href="pages-maintenance.html">Manutenção</a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth">
                                            <span> Autenticação </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarPagesAuth">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="pages-login.html">Login</a>
                                                </li>
                                                <li>
                                                    <a href="pages-login-2.html">Login 2</a>
                                                </li>
                                                <li>
                                                    <a href="pages-register.html">Registro</a>
                                                </li>
                                                <li>
                                                    <a href="pages-register-2.html">Registro 2</a>
                                                </li>
                                                <li>
                                                    <a href="pages-logout.html">Logout</a>
                                                </li>
                                                <li>
                                                    <a href="pages-logout-2.html">Logout 2</a>
                                                </li>
                                                <li>
                                                    <a href="pages-recoverpw.html">Redefir Senha</a>
                                                </li>
                                                <li>
                                                    <a href="pages-recoverpw-2.html">Redefinir Senha 2</a>
                                                </li>
                                                <li>
                                                    <a href="pages-lock-screen.html">Segurança Tela</a>
                                                </li>
                                                <li>
                                                    <a href="pages-lock-screen-2.html">Segurança Tela 2</a>
                                                </li>
                                                <li>
                                                    <a href="pages-confirm-mail.html">Confirmar Email</a>
                                                </li>
                                                <li>
                                                    <a href="pages-confirm-mail-2.html">Confirmar Email 2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarPagesError" aria-expanded="false" aria-controls="sidebarPagesError">
                                            <span> Error </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarPagesError">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                <a href="pages-404.html">Erro 404</a>
                                            </li>
                                            <li>
                                                <a href="pages-404-alt.html">Erro 404-alt</a>
                                            </li>
                                            <li>
                                                <a href="pages-500.html">Erro 500</a>
                                            </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="pages-starter.html">Iniciar Página</a>
                                    </li>
                                    <li>
                                        <a href="pages-preloader.html">Pré Carregamento</a>
                                    </li>
                                    <li>
                                        <a href="pages-timeline.html">Linha do Tempo</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
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


                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list d-lg-none">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-search noti-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                    <form class="p-3">
                                        <input type="text" class="form-control" placeholder="Pesquisar ..." aria-label="Recipient's username">
                                    </form>
                                </div>
                            </li>
                            <!--li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-bell noti-icon"></i>
                                    <span class="noti-icon-badge"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                                    <!-- item-->
                                    <!--div class="dropdown-item noti-title">
                                        <h5 class="m-0">
                                            <span class="float-end">
                                                <a href="javascript: void(0);" class="text-dark">
                                                    <small>Limpar tudo</small>
                                                </a>
                                            </span>Notificação
                                        </h5>
                                    </div>

                                    <div style="max-height: 230px;" data-simplebar>
                                        <!-- item-->
                                        <!--a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin
                                                <small class="text-muted">1 min ago</small>
                                            </p>
                                        </a-->

                                        <!-- item-->
                                        <!--a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info">
                                                <i class="mdi mdi-account-plus"></i>
                                            </div>
                                            <p class="notify-details">New user registered.
                                                <small class="text-muted">5 hours ago</small>
                                            </p>
                                        </a-->

                                        <!-- item-->
                                        <!--a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon">
                                                <img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Cristina Pride</p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>Hi, How are you? What about our next meeting</small>
                                            </p>
                                        </a-->

                                        <!-- item-->
                                        <!--a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin
                                                <small class="text-muted">4 days ago</small>
                                            </p>
                                        </a-->

                                        <!-- item-->
                                        <!--a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon">
                                                <img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Karen Robinson</p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>Wow ! this admin looks good and awesome design</small>
                                            </p>
                                        </a-->

                                        <!-- item-->
                                        <!--a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info">
                                                <i class="mdi mdi-heart"></i>
                                            </div>
                                            <p class="notify-details">Carlos Crouch liked
                                                <b>Admin</b>
                                                <small class="text-muted">13 dias atrás</small>
                                            </p>
                                        </a>
                                    </div-->

                                    <!-- All-->
                                    <!--a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        Ver Tudo
                                    </a>

                                </div>
                            </li->

                            <!--li class="dropdown notification-list d-none d-sm-inline-block">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-view-apps noti-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                                    <div class="p-2">
                                        <div class="row g-0">
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/slack.png" alt="slack">
                                                    <span>Slack</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/github.png" alt="Github">
                                                    <span>GitHub</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                                    <span>Dribbble</span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row g-0">
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                                    <span>Bitbucket</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                                    <span>Dropbox</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/g-suite.png" alt="G Suite">
                                                    <span>G Suite</span>
                                                </a>
                                            </div>
                                        <!--/div> <!-- end row-->
                                    <!--/div>

                                </div>
                            </li-->

                            <li class="notification-list">
                                <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                    <i class="dripicons-gear noti-icon"></i>
                                </a>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="<?php print $foto;  ?>" alt="user-image" class="rounded-circle">
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
                                        <span>Boqueio Tela</span>
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
                                    <input type="text" class="form-control dropdown-toggle"  placeholder="Pesquisar..." id="top-search">
                                    <span class="mdi mdi-magnify search-icon"></span>
                                    <button class="input-group-text btn-primary" type="submit">Pesquisar</button>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Comercial</a></li>
                                            <li class="breadcrumb-item active">Detalhes Pedido</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Detalhes Pedido</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row justify-content-center">
                            <div class="col-lg-7 col-md-10 col-sm-11">
        
                                <div class="horizontal-steps mt-4 mb-4 pb-5" id="tooltip-container">
                                    <div class="horizontal-steps-content">
                                        <div class="step-item">
                                        <!-- INSERINDO VALORES DINAMICOS PARA MOVER A BARRA DE STATUS NO FRONT END  -->
                                        <?php //$barra_status = 'data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom"';
                                              //$accurate = "title=".$data." ".$hora_aberto;  ?>
                                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php print $data.'-'.$hora;  ?>">Pedido Aberto</span>
                                        </div>
                                        <div class="step-item">
                                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php print $hora_embarque;  ?>">Embarcado</span>
                                        </div>
                                        <div class="step-item">
                                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php print $hora_saida;  ?>">À Caminho...</span>
                                        </div>
                                        <div class="step-item current">
                                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php print $hora_entrega;  ?>">Entregue</span>
                                        </div>
                                    </div>
                                    <div class="process-line" style="width: <?php print $status ?>"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->    
                        
                        
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Itens do Pedido</h4>
            
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead class="table-light">
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Quantidade</th>
                                                    <th>Preço</th>
                                                    <th>Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $_sql = mysqli_query($conn02,"SELECT PED_ITEM_DESC_ITEM_PED, PED_ITEM_QTD_ITEM, PED_ITEM_VAL_UN_ITEM_IMP, PED_ITEM_TOTAL_ITEM FROM t0020 WHERE PED_ITEM_NUM_PED = '$pedido'");
                                                 while($_obj = mysqli_fetch_array($_sql))
                                                 {?>
                                                <tr>
                                                        <th>
                                                           <?php print utf8_encode($_obj['PED_ITEM_DESC_ITEM_PED']);  ?> 
                                                        </th>
                                                        <th>
                                                           <?php print $_obj['PED_ITEM_QTD_ITEM'];  ?> 
                                                        </th>
                                                        <th>
                                                           <?php print $_obj['PED_ITEM_VAL_UN_ITEM_IMP'];  ?> 
                                                        </th>
                                                        <th>
                                                           <?php print $_obj['PED_ITEM_TOTAL_ITEM'];  ?>
                                                       </th>
                                                </tr> <?php  }  ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
            
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Pedido Nº..: <?php print $pedido;  ?><h4>
                                        <?php 
                                                $val = mysqli_query($conn02,"SELECT  sum(PED_ITEM_TOTAL_ITEM) AS TOTAL FROM t0020 WHERE PED_ITEM_NUM_PED = '$pedido'");
                                                while($_val = mysqli_fetch_array($val)){
                                                     $total = $_val['TOTAL'];
                                                } ?>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead class="table-light">
                                                <tr>
                                                    <th>Descrição</th>
                                                    <th>Valor</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Valor total :</td>
                                                    <td><?php print $total; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Taxa entrega :</td>
                                                    <td>$0,00</td>
                                                </tr>
                                                <tr>
                                                    <td>Custo Estimado : </td>
                                                    <td>$0.00</td>
                                                </tr>
                                                <thead class="table-light">
                                                <tr>
                                                    <th>Total :</th>
                                                    <th><?php print $total;  ?></th>
                                                </tr>
                                                </thead>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
            
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
        
        
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Informação Embarque</h4>

                                        <h5>Indafire</h5>

                                        
                                        <address class="mb-0 font-14 address-lg">
                                            <?php print utf8_encode($endereco); ?><br>
                                            <?php print utf8_encode($cidade); ?><br>
                                            <abbr title="Phone">Tel:</abbr> <?php print $telefone; ?> <br/>
                                            <abbr title="Mobile">Cel:</abbr> <?php print $celular; ?>
                                        </address>
            
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Informação Pagamento</h4>

                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <p class="mb-2"><span class="fw-bold me-2">Tipo pagamento:</span> Cartão Crédito</p>
                                                <p class="mb-2"><span class="fw-bold me-2">Bandeira:</span> Visa </p>
                                                <p class="mb-2"><span class="fw-bold me-2">Data Vencimento:</span> 02/2020</p>
                                                <p class="mb-0"><span class="fw-bold me-2">CVV:</span> xxx</p>
                                            </li>
                                        </ul>
            
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Info Entrega</h4>
            
                                        <div class="text-center">
                                            <i class="mdi mdi-truck-fast h2 text-muted"></i>
                                            <h5><b>Indafire</b></h5>
                                            <p class="mb-1"><b>Pedido :</b><?php print ' '.$pedido;  ?></p>
                                            <p class="mb-0"><b>Cliente:</b><?php print ' '.utf8_encode($cliente);  ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
        
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Indafire - Equipamentos Combate à Incendios
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


        <!-- Right Sidebar -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">INDAFIRE</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar>

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Pedido Numero </strong>..: <?php print $pedido;  ?>
                    </div>

                    <!-- Settings -->
                    <h5 class="mt-3"> Assinatura</h5>
                    <hr class="mt-1" />
                    <img class="d-block w-100" src="<?php print 'assinatura/assinaImg'.'/'.$pedido.'/'.$pedido.'.png'; ?>" alt="equipamento">


                     <!-- Settings -->
                    <h5 class="mt-3"> Responsável.: <?php print " ".$responsavel; ?></h5>
                    <hr class="mt-1" />
                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Ok</button>
                    </div>
                </div> <!-- end padding-->

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->


        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <!-- script para funções de arquivo-->
        <script src="assets/js/script.js"></script>
        <!-- final de script js-->
    </body>

<!-- Mirrored from coderthemes.com/hyper_2/saas/apps-ecommerce-orders-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:42:03 GMT -->
</html>

