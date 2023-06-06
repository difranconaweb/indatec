<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 02MAR23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 02MAR23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 02MAR23


 
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 13MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 11MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 12MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */


/*###########################################################################*/
/* ###  ARQUIVO DE CALENDÁRIO DO SISTEMA       -   SISTEMA INDATEC       ### */
/*###########################################################################*/

// ### INICIO DE ARQUIVO QUE SOMENTE FAZ A CHAMADA DO ARQUIVO COMISSIONADO DE ACORDO COM O VALOR DA TABELA PONTEIRO ###  //
// ###  ROTINA PARA INICIAR CONEXÃO ### //
require 'inc/conexao.php';
//require 'inc/sentinela.php';


session_start();
$usuario   = $_SESSION['usuario'];
$codigo    = $_SESSION['id'];
$data      = Date('d/m/Y');
$hora      = Date('H:y:s');
$mes       = Date('m');
$ano       = Date('Y');
$dia       = Date('d');


// ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
$sql = mysqli_query($con,"SELECT funPrimNome,funCargo,funFoto FROM funcionarios WHERE funCodigo = '$codigo'");
while($obj = mysqli_fetch_array($sql))
{
    $nome  = $obj['funPrimNome']; // NOME DO USUARIO //
    $cargo = $obj['funCargo'];    // CARGO DO USUARIO //
    $foto  = $obj['funFoto'];    // FOTO DO USUARIO //
}
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //

?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper_2/saas/apps-calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:41:52 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Indafire - Equipamentos de Combate a Incendios</title><!--  Indafire - Equipamentos de Combate a Incendios -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Indafire Equipamentos de Combate a Incendios" name="description" />
    <meta content="Indafire" name="Franco V. Morales" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/logoMenor.png">
    <!-- third party css -->
    <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

     <!-- third party css -->
    <link href="assets/css/vendor/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
  

</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- INICIO DE PÁGINA -->
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

                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title side-nav-item">Navegação</li>
                    <!-- ### VARIÁVEIS OCULTAS DO SISTEMA   ### -->
                      <input type="hidden" name="codigo" id="codigo" value="<?php print $codigo ?>"><!-- ## VARIAVEL OCULTA PARA CARREGAR O CÓDIGO/ID DO CLIENTE ## -->
                      <input type="hidden" name="nome" id="nome" value="<?php print $nome ?>"><!-- ## VARIÁVEL OCULTA PARA CARREGAR O NOME DO CLIENTE ## -->
                    <!-- ###  VARIÁVEIS OCULTAS DO SISTEMA  ### -->

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span> Painel de Controle </span>
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
                                    <a href="cadastros/form-elements.php">Clientes</a><!-- form-elements.html  -->
                                </li>
                                <li>
                                    <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/cadastros/form-equipamentos.php">Equipamentos</a><!-- form-advanced.html  -->
                                </li>
                                <li>
                                    <a href="#">Fornecedores</a><!-- form-validation.html -->
                                </li>
                                <li>
                                    <a href="comercial/form-wizard-orcamento.php">Orçamentos</a><!-- form-wizard.html  -->
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
                <!-- End Sidebar -->


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


                    <!-- INICIO DA BARRA DO TOPO DA PÁGINA -->
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Buscar ..." aria-label="Nome Usuário">
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
                    <div class="app-search dropdown d-none d-lg-block">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control dropdown-toggle"  placeholder="Buscar..." id="top-search">
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
                                        <li class="breadcrumb-item active">Calendario</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Calendario</h4>
                            </div>
                        </div>
                    </div>
                    <!-- FINAL DE TITULO DE PÁGINA -->

                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="d-grid">
                                                <button class="btn btn-lg font-16 btn-danger" id="btn-new-event"><i
                                                        class="mdi mdi-plus-circle-outline"></i> Criar Novo Evento</button>
                                            </div>
                                            <div id="external-events" class="m-t-20">
                                                <br>
                                                <p class="text-muted">Arraste e solte seu evento oU click no calendário
                                                </p>
                                                <div class="external-event bg-success-lighten text-success"
                                                    data-class="bg-success">
                                                    <i
                                                        class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Novo
                                                    Titutlo
                                                </div>
                                                <div class="external-event bg-info-lighten text-info"
                                                    data-class="bg-info">
                                                    <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Meu
                                                    Evento
                                                </div>
                                                <div class="external-event bg-warning-lighten text-warning"
                                                    data-class="bg-warning">
                                                    <i
                                                        class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Gerenciar
                                                </div>
                                                <div class="external-event bg-danger-lighten text-danger"
                                                    data-class="bg-danger">
                                                    <i
                                                        class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Criar Novo tema
                                                </div>
                                            </div>


                                            <div class="mt-5 d-none d-xl-block">
                                                <h5 class="text-center">Como funciona ?</h5>

                                                <ul class="ps-3">
                                                    <li class="text-muted mb-3">
                                                        Rotina para inserir novos eventos, lembretes, informações, alertas.
                                                    </li>
                                                    <li class="text-muted mb-3">
                                                        Clicando  sobre o campo do dia, voce pode criar um novo evento e deixa-lo agendado.
                                                        Também existe o botao CRIAR NOVO EVENTO que abre a janela para o registro
                                                    </li>
                                                    <li class="text-muted mb-3">
                                                        Voce também pode alterar e apagar quando deseja ou ate mesmo mudar o formato do teu calendário.
                                                    </li>
                                                </ul>
                                            </div>

                                        </div> <!-- FINAL COLUNA-->

                                        <div class="col-lg-9">
                                            <div class="mt-4 mt-lg-0">
                                                <div id="calendar"></div>
                                            </div>
                                        </div> <!-- FINAL COLUNA -->

                                    </div> <!-- FINAL LINHA -->
                                </div> <!-- FINAL CORPO CARTAO-->
                            </div> <!-- FINAL CARTÃO -->

                            <!-- ADICIONAR NOVO  EVENTO MODAL -->
                            <div class="modal fade" id="event-modal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                            <div class="modal-header py-3 px-4 border-bottom-0">
                                                <h5 class="modal-title" id="modal-title">Evento</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-4 pb-4 pt-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Nome Evento</label>
                                                            <input class="form-control" placeholder="Inserir novo evento" type="text" name="title" id="event-title" required />
                                                            <div class="invalid-feedback">Favor inserir um nome válido</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Categoria</label>
                                                            <select class="form-select" name="category" id="event-category" required>
                                                                <option value="bg-danger" selected>Lembrete</option>
                                                                <option value="bg-success">Trabalho</option>
                                                                <option value="bg-primary">Alerta</option>
                                                                <option value="bg-info">Informação</option>
                                                                <option value="bg-warning">Aviso</option>
                                                            </select>
                                                            <div class="invalid-feedback">Favor selecionar um evento válido</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <button type="button" class="btn btn-danger" id="btn-delete-event">Apagar</button>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="btn btn-success" id="btn-save-event">Gravar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div> <!-- end modal-content-->
                                </div> <!-- end modal dialog-->
                            </div>
                            <!-- end modal-->
                        </div>
                        <!-- end col-12 -->
                    </div> <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

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


    <!-- Right Sidebar -->
    <div class="end-bar">

        <div class="rightbar-title">
            <a href="javascript:void(0);" class="end-bar-toggle float-end">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Configurações</h5>
        </div>

        <div class="rightbar-content h-100" data-simplebar>

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                </div>

                <!-- Settings -->
                <h5 class="mt-3">Color Scheme</h5>
                <hr class="mt-1" />

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked>
                    <label class="form-check-label" for="light-mode-check">Light Mode</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                    <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                </div>
       

                <!-- Width -->
                <h5 class="mt-4">Width</h5>
                <hr class="mt-1" />
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                    <label class="form-check-label" for="fluid-check">Fluid</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                    <label class="form-check-label" for="boxed-check">Boxed</label>
                </div>
        

                <!-- Left Sidebar-->
                <h5 class="mt-4">Left Sidebar</h5>
                <hr class="mt-1" />
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                    <label class="form-check-label" for="default-check">Default</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                    <label class="form-check-label" for="light-check">Light</label>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                    <label class="form-check-label" for="dark-check">Dark</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                    <label class="form-check-label" for="fixed-check">Fixed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                    <label class="form-check-label" for="condensed-check">Condensed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                    <label class="form-check-label" for="scrollable-check">Scrollable</label>
                </div>

                <div class="d-grid mt-4">
                    <button class="btn btn-primary" id="resetBtn">Voltar Padrão</button>
            
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

    <!-- third party js -->
    <script src="assets/js/vendor/fullcalendar.min.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="assets/js/pages/demo.calendar.js"></script>
    <!-- end demo js-->

</body>


<!-- Mirrored from coderthemes.com/hyper_2/saas/apps-calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:41:53 GMT -->
</html>