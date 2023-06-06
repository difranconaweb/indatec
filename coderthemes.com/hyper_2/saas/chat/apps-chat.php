<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 02MAR23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 02MAR23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 02MAR23


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 13MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 11ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 12ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 13ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 14ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 19ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 11MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 12MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

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
$sql = mysqli_query($con,"SELECT funPrimNome,funCargo,funFoto,funEmail,funTelefone,funCidade,funUF FROM funcionarios WHERE funCodigo = '$codigo'");
while($obj = mysqli_fetch_array($sql))
{
    $nome     = $obj['funPrimNome']; // NOME DO USUARIO //
    $cargo    = $obj['funCargo'];    // CARGO DO USUARIO //
    $foto     = $obj['funFoto'];    // FOTO DO USUARIO //
    $email    = $obj['funEmail'];
    $telefone = $obj['funTelefone'];
    $cidade   = $obj['funCidade'];
    $uf       = $obj['funUF'];
}
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //

?>
<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/hyper_2/saas/apps-chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:41:54 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Indafire - Equipamentos de Combate a Incendios</title>
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


        <style type="text/css">
            #users{font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; width:100%;}
            #users td, #users th {border:1px solid #ddd;padding:8px;}
            #users tr:nth-child(even){background-color: #f2f2f2;}
            #users tr:hover {background-color: #ddd;}
            #users th {padding-top:12px;padding-bottom:12px;text-align: left;background-color: #04aa6d;color: white;}
        </style>

    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
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
                                    <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/cadastros/form-elements.php">Clientes</a><!-- form-elements.html  -->
                                </li>
                                <li>
                                    <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/cadastros/form-equipamentos.php">Equipamentos</a><!-- form-advanced.html  -->
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
                            <a href="apps-social-feed.html" class="side-nav-link">
                                <i class="uil-rss"></i>
                                <span> Feed Noticias </span>
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
                            <a href="#" class="side-nav-link"><!-- apps-file-manager.html --apps-->
                                <i class="uil-folder-plus"></i>
                                <span> Gerenciador Arquivos </span>
                            </a>
                        </li>
                    </ul>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Indafire - Equipamentos Combate a incendios</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                            <li class="breadcrumb-item active">Chat</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Chat</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <!-- start chat users-->
                            <div class="col-xxl-3 col-xl-6 order-xl-1">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <ul class="nav nav-tabs nav-bordered">
                                            <li class="nav-item">
                                                <a href="#allUsers" data-bs-toggle="tab" aria-expanded="false" class="nav-link active py-2">
                                                    Todos
                                                </a>
                                            </li>
                                            <!--li class="nav-item">
                                                <a href="#favUsers" data-bs-toggle="tab" aria-expanded="true" class="nav-link py-2">
                                                    Favoritos
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#friendUsers" data-bs-toggle="tab" aria-expanded="true" class="nav-link py-2">
                                                    Amigos
                                                </a>
                                            </li-->
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active p-3" id="newpost">

                                                <!-- start search box -->
                                                <div class="app-search">
                                                    <form>
                                                        <div class="mb-2 position-relative">
                                                            <input type="text" class="form-control"
                                                                placeholder="Procurar Contato..." />
                                                            <span class="mdi mdi-magnify search-icon"></span>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- end search box -->
<script type="text/javascript">

function conversation(c)
{
    var utilisateur = c;
    var codigo = document.getElementById('codigo').value;// CARREGA AQUI O CODIGO DO USUÁRIO //
    var nome   = document.getElementById('nome').value;// CARREGA AQUI O NOME DO USUÁRIO DO SISTEMA //
    createRequest();
    var url = "buscar-chat.php?convidado="+escape(utilisateur)+"&nome="+escape(nome)+"&codigo="+escape(codigo);
    request.open("GET", url, true);
    // ATRIBUI UMA FUNÇÃO PARA SER EXECUTADA SEMPRE QUE HOUVER UMA MUDANÇA //
    request.onreadystatechange = function(){ // VERIFICA SE FOI CONCLUIDO COM SUCESSO E A CONEXÃO FECHADA (readyState=4)
    if (request.readyState == 4)
    {                                        // VERIFICA SE O ARQUIVO FOI ENCONTRADO COM SUCESSO //
       if (request.status == 200)
       {           
           if(request.responseText == 0)
           {
                alert("ATENÇÃO: erro ao carregar chat");
           }

           else
           {
               document.getElementById('saida').innerHTML = request.responseText;
           }
       }
       else
       { 
           document.getElementById("excessao").innerHTML = "Erro: " + request.statusText;
           setTimeout(function(){document.getElementById("excessao").innerHTML = "";}, 2000);
       }
   }};
   request.send(null);
}


// ## FUNCAO PARA ENVIAR MENSAGEM ## //
function enviar()
{
    var nome  = document.getElementById('nome').value;
    var texte = document.getElementById('message').value;
    document.getElementById('message').value = "";
    createRequest();
    var url = "enviar-chat.php?texte="+escape(texte)+"&nome="+escape(nome);
    request.open("GET", url, true);
    // ATRIBUI UMA FUNÇÃO PARA SER EXECUTADA SEMPRE QUE HOUVER UMA MUDANÇA //
    request.onreadystatechange = function(){ // VERIFICA SE FOI CONCLUIDO COM SUCESSO E A CONEXÃO FECHADA (readyState=4)
    if (request.readyState == 4)
    {                                        // VERIFICA SE O ARQUIVO FOI ENCONTRADO COM SUCESSO //
       if (request.status == 200)
       {           
           if(request.responseText == 0)
           {
                alert("ATENÇÃO: erro ao carregar chat");
           }

           else
           {
               document.getElementById('saida').innerHTML = request.responseText;
           }
       }
       else
       { 
           document.getElementById("excessao").innerHTML = "Erro: " + request.statusText;
           setTimeout(function(){document.getElementById("excessao").innerHTML = "";}, 2000);
       }
   }};
   request.send(null);
}
</script>
                                                <!-- users -->
                                                <div class="row">
                                                    <div class="col">
                                                        <div data-simplebar style="max-height: 550px">
                                                            <!-- CRIANDO ROTINA PARA CARREGAR OS USUÁRIOS  -->
                                                            <?php  $user = mysqli_query($con,"SELECT funNome, funFoto FROM funcionarios WHERE funNome != '$nome'"); 
                                                                   while($use = mysqli_fetch_array($user))
                                                                    {   ?>

                                                                    <a href="javascript:void(0);" class="text-body">
                                                                        <div class="d-flex align-items-start mt-1 p-2">
                                                                            <img src="<?php print $use['funFoto']; ?>" class="me-2 rounded-circle" height="48" />
                                                                            <div class="w-100 overflow-hidden">
                                                                                <h5 class="mt-0 mb-0 font-14" onclick="conversation(c = '<?php print $use['funNome']; ?>')">                                                                            
                                                                                    <?php print $use['funNome']; ?>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </a><?php  } ?>

                                                            <!--a href="javascript:void(0);" class="text-body">
                                                                <div class="d-flex align-items-start bg-light p-2">
                                                                    <img src="assets/images/users/avatar-5.jpg" class="me-2 rounded-circle" height="48" alt="Shreyu N" />
                                                                    <div class="w-100 overflow-hidden">
                                                                        <h5 class="mt-0 mb-0 font-14">
                                                                            <span class="float-end text-muted font-12">5:30am</span>
                                                                            Shreyu N
                                                                        </h5>
                                                                        <p class="mt-1 mb-0 text-muted font-14">
                                                                            <span class="w-75">Hey! a reminder for tomorrow's meeting...</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </a>

                                                            <a href="javascript:void(0);" class="text-body">
                                                                <div class="d-flex align-items-start mt-1 p-2">
                                                                    <img src="assets/images/users/avatar-7.jpg" class="me-2 rounded-circle" height="48" alt="Maria C" />
                                                                    <div class="w-100 overflow-hidden">
                                                                        <h5 class="mt-0 mb-0 font-14">
                                                                            <span class="float-end text-muted font-12">Thu</span>
                                                                            Maria C
                                                                        </h5>
                                                                        <p class="mt-1 mb-0 text-muted font-14">
                                                                            <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">2</span></span>
                                                                            <span class="w-75">Are we going to have this week's planning meeting today?</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </a>

                                                            <a href="javascript:void(0);" class="text-body">
                                                                <div class="d-flex align-items-start mt-1 p-2">
                                                                    <img src="assets/images/users/avatar-10.jpg"
                                                                        class="me-2 rounded-circle" height="48" alt="Rhonda D" />
                                                                    <div class="w-100 overflow-hidden">
                                                                        <h5 class="mt-0 mb-0 font-14">
                                                                            <span class="float-end text-muted font-12">Wed</span>
                                                                            Rhonda D
                                                                        </h5>
                                                                        <p class="mt-1 mb-0 text-muted font-14">
                                                                            <span class="w-75">Please check these design assets...</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </a>

                                                            <a href="javascript:void(0);" class="text-body">
                                                                <div class="d-flex align-items-start mt-1 p-2">
                                                                    <img src="assets/images/users/avatar-3.jpg"
                                                                        class="me-2 rounded-circle" height="48" alt="Michael H" />
                                                                    <div class="w-100 overflow-hidden">
                                                                        <h5 class="mt-0 mb-0 font-14">
                                                                            <span class="float-end text-muted font-12">Tue</span>
                                                                            Michael H
                                                                        </h5>
                                                                        <p class="mt-1 mb-0 text-muted font-14">
                                                                            <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">6</span></span>
                                                                            <span class="w-75">Are you free for 15 min? I would like to discuss something...</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </a>

                                                            <a href="javascript:void(0);" class="text-body">
                                                                <div class="d-flex align-items-start mt-1 p-2">
                                                                    <img src="assets/images/users/avatar-6.jpg"
                                                                        class="me-2 rounded-circle" height="48" alt="Thomas R" />
                                                                    <div class="w-100 overflow-hidden">
                                                                        <h5 class="mt-0 mb-0 font-14">
                                                                            <span class="float-end text-muted font-12">Tue</span>
                                                                            Thomas R
                                                                        </h5>
                                                                        <p class="mt-1 mb-0 text-muted font-14">
                                                                            <span class="w-75">Let's have meeting today between me, you and Tony...</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </a>

                                                            <a href="javascript:void(0);" class="text-body">
                                                                <div class="d-flex align-items-start mt-1 p-2">
                                                                    <img src="assets/images/users/avatar-8.jpg"
                                                                        class="me-2 rounded-circle" height="48" alt="Thomas J" />
                                                                    <div class="w-100 overflow-hidden">
                                                                        <h5 class="mt-0 mb-0 font-14">
                                                                            <span class="float-end text-muted font-12">Tue</span>
                                                                            Thomas J
                                                                        </h5>
                                                                        <p class="mt-1 mb-0 text-muted font-14">
                                                                            <span class="w-75">Howdy?</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </a>

                                                            <a href="javascript:void(0);" class="text-body">
                                                                <div class="d-flex align-items-start mt-1 p-2">
                                                                    <img src="assets/images/users/avatar-1.jpg"
                                                                        class="me-2 rounded-circle" height="48" alt="Ricky J" />
                                                                    <div class="w-100 overflow-hidden">
                                                                        <h5 class="mt-0 mb-0 font-14">
                                                                            <span
                                                                                class="float-end text-muted font-12">Mon</span>
                                                                                Ricky J
                                                                        </h5>
                                                                        <p class="mt-1 mb-0 text-muted font-14">
                                                                            <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">28</span></span>
                                                                            <span class="w-75">Are you interested in learning?</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </a-->

                                                        </div> <!-- end slimscroll-->
                                                    </div> <!-- End col -->
                                                </div>
                                                <!-- end users -->
                                            </div> <!-- end Tab Pane-->
                                        </div> <!-- end tab content-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                            <!-- end chat users-->

                            <!-- chat area -->
                            <div class="col-xxl-6 col-xl-12 order-xl-2">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="conversation-list" data-simplebar style="max-height: 537px">
                                            <span id="saida"></span>                                           
                                        </ul>

                                        <div class="row">
                                            <div class="col">
                                                <div class="mt-2 bg-light p-3 rounded">
                                                    <form class="needs-validation" novalidate="" name="chat-form"
                                                        id="chat-form">
                                                        <div class="row">
                                                            <div class="col mb-2 mb-sm-0">
                                                                <input type="text" name="message" id="message" class="form-control border-0" placeholder="Digite aqui" required="">
                                                                <div class="invalid-feedback">
                                                                    Digite aqui
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-auto">
                                                                <div class="btn-group">
                                                                    <a href="#" class="btn btn-light"><i class="uil uil-paperclip"></i></a>
                                                                    <a href="#" class="btn btn-light"> <i class='uil uil-smile'></i> </a>
                                                                    <div class="d-grid">
                                                                        <button type="button" class="btn btn-success chat-send"><i class='uil uil-message' onclick="enviar()"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row-->
                                                    </form>
                                                </div> 
                                            </div> <!-- end col-->
                                        </div>
                                        <!-- end row -->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div>
                            <!-- end chat area-->

                            <!-- start user detail -->
                            <div class="col-xxl-3 col-xl-6 order-xl-1 order-xxl-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Ver todos</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Editar Contato</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Remover</a>
                                            </div>
                                        </div>

                                        <div class="mt-3 text-center">
                                            <img src="<?php print $foto; ?>" alt="shreyu"
                                                class="img-thumbnail avatar-lg rounded-circle" />
                                            <h4><?php print $nome; ?></h4>
                                            <button class="btn btn-primary btn-sm mt-1"><i class='uil uil-envelope-add me-1'></i>Enviar Email</button>
                                            <!--p class="text-muted mt-2 font-14">Última mensagem: <strong>Poucas horas atrás</strong></p-->
                                        </div>

                                        <div class="mt-3">
                                            <hr class="" />

                                            <p class="mt-4 mb-1"><strong><i class='uil uil-at'></i> Email:</strong></p>
                                            <p><?php print $email;  ?></p>

                                            <p class="mt-3 mb-1"><strong><i class='uil uil-phone'></i> Numero Tel:</strong></p>
                                            <p><?php print $telefone;  ?></p>

                                            <p class="mt-3 mb-1"><strong><i class='uil uil-location'></i> Local:</strong></p>
                                            <p><?php print $cidade;  ?></p>

                                            <p class="mt-3 mb-2"><strong><i class='uil uil-users-alt'></i> Grupos:</strong></p>
                                            <p>
                                                <span class="badge badge-success-lighten p-1 font-14">Trabalho</span>
                                                <span class="badge badge-primary-lighten p-1 font-14">Amigos</span>
                                            </p>
                                        </div>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                            <!-- end user detail -->
                        </div> <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script>  © Indafire - Equipamentos de Combate a Incendios
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
        <!-- script para funções de arquivo-->
        <script src="assets/js/script.js"></script>
        <!-- final de script js-->

    </body>


<!-- Mirrored from coderthemes.com/hyper_2/saas/apps-chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:41:56 GMT -->
</html>
