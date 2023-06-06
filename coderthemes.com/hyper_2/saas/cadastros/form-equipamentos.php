<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 26JUL22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 26JUL22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 26JUL22


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 04ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 25ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 26ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 11MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 12MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';
//require 'inc/sentinela.php';


session_start();
$usuario = $_SESSION['usuario'];
$codigo  = $_SESSION['id'];


// ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
$sql = mysqli_query($con,"SELECT funPrimNome,funCargo, funFoto FROM funcionarios WHERE funCodigo = '$codigo'");
while($obj = mysqli_fetch_array($sql))
{
    $nome  = $obj['funPrimNome']; // NOME DO USUARIO //
    $cargo = $obj['funCargo']; // CARGO DO USUARIO //
    $foto  = $obj['funFoto'];    // FOTO DO USUARIO //
}
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //

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
     .tabela{position:relative;display:block;height:250px;width:1500px;border-style: none;border-radius: 02%;background-color:#DCDCDC;box-shadow: 5px 5px 5px rgba(0,0,0,0.5);overflow: scroll;}

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
                                    <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/oficina/form-oficina.php">Oficina</a><!-- form-advanced.html  -->
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
                                <!--a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                    <i class="dripicons-gear noti-icon"></i>
                                </a-->
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Equipamento</a></li>
                                            <li class="breadcrumb-item active">Formulárro</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">CADASTRE O EQUIPAMENTO</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Formulário</h4>
                                        

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
                                                    <div class="mb-6">
                                                        <label class="form-label" for="validationCustom01">Item</label>
                                                        <input type="text" class="form-control" id="validationCustom01" placeholder="Digitar o equipamento">
                                                        <div class="valid-feedback">
                                                            Muito bom!
                                                        </div>
                                                    </div></br>
                                                                
                                                    <!--  ##################################  -->

                                                     
                                                            <div class="row g-2">
                                                                <div class="mb-3 col-md-6">
                                                                       <label class="form-label" for="grupo"> Grupo</label>
                                                                    
                                                                        <select  id="grupo" name="grupo" class="form-control">
                                                                            <option value="0">SELECIONE</option>
                                                                            <option value="1">Mercadoria para revenda</option>
                                                                            <option value="2">Materia-prima</option>
                                                                            <option value="3">Embalagem</option>
                                                                            <option value="4">Produto em Progresso</option>
                                                                            <option value="5">Produto acabado</option>
                                                                            <option value="6">Subproduto</option>
                                                                            <option value="7">Produto Intermediário</option>
                                                                            <option value="8">Material de uso ou consumo</option>
                                                                        </select>
                                                                        
                                                                </div>
                                                                <div class="col-md-6">
                                                                       <label class="form-label" for="Codigo"> Unidade</label>
                                                                    
                                                                        <select id="codigo" name="codigo" class="form-control">
                                                                            <option value="selecione">SELECIONE</option>
                                                                            <option value="un">unidade</option>
                                                                            <option value="kg">kilograma</option>
                                                                            <option value="lts">litros</option>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                 

                                                      <!--  ##################################  --> 
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-3">
                                                                <label for="ncm" class="form-label">Class Fiscal NCM</label>
                                                                <input type="text" class="form-control" id="ncm" placeholder="ncm">
                                                            </div>

                                                            <div class="mb-3 col-md-4">
                                                                <label for="cest" class="form-label">Código CEST</label>
                                                                <input type="text" id="cest" class="form-control" placeholder='codigo CEST'>
                                                                <span class="help-block"><small>CEST.</small></span>
                                                                <span id="cest"></span>
                                                            </div>

                                                            <div class="mb-3 col-md-5">
                                                                <label for="fiscal" class="form-label">Código Benef. Fiscal</label>
                                                                <input type="text" id="fiscal" class="form-control" placeholder='Fiscal'>
                                                                <span class="help-block"><small>Cod Beneficio Fiscal.</small></span>
                                                                <span id="fiscal"></span>
                                                            </div>
                                                      </div>
                                                      <!--  ##################################  --> 
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-12">
                                                                <label for="origem" class="form-label">Origem da Mercadoria</label>
                                                                <select id="mercadoria" class="form-control">
                                                                    <option value="selecione">SELECIONE</option>
                                                                    <option value="0">0 - Nacional: exceto as indicadas nos codigos 3,4,5 e 8</option>
                                                                    <option value="1">1 - Estrangeira: importação direta, exceto a indicada no código 6</option>
                                                                    <option value="2">2 - Estrangeira: adquirida no mercado interno, excetoa indicada no código 7</option>
                                                                    <option value="3">3 - Nacional: mercadoria ou bem com conteúdo de importação superior a 40%</option>
                                                                    <option value="4">4 - Nacional: cuja produção tenha sido feita em conformidade com os processos</option>
                                                                    <option value="5">5 - Nacional: mercadoria ou bem com conteúdo de importação inferior ou igual</option>
                                                                    <option value="6">6 - Estrangeria: importação direta, sem similar nacional, constante em lista</option>
                                                                    <option value="7">7 - Estrangeira: adquirida no mercado interno, sem similar nacional, constante</option>
                                                                    <option value="8">8 - Nacional: mercadoria ou bem com Conteúdo de importação superior a 70%</option>
                                                                </select>
                                                            </div>
                                                      </div>
                                                      <!--  ##################################  --> 
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-12">
                                                                <label for="grupo" class="form-label">Grupo</label>
                                                                <select id="grupo" class="form-control">
                                                                <option value="selecione">SELECIONE</option>
                                                                </select>
                                                            </div>
                                                      </div> 
                                                      <!--  ##################################  -->
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-12">
                                                                <label for="sub-grupo" class="form-label">Sub-Grupo</label>
                                                                <select id="sub-grupo" class="form-control">
                                                                <option value="selecione">SELECIONE</option>
                                                                </select>
                                                            </div>
                                                      </div> 
                                                      <!--  ##################################  -->
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-12">
                                                                <label for="familia" class="form-label">Familia</label>
                                                                <select id="familia" class="form-control">
                                                                <option value="selecione">SELECIONE</option>
                                                                </select>
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
                                        <h4 class="header-title">OUTRAS INFORMAÇÕES</h4>
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#tooltips-validation-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Geral
                                                </a>
                                                <li class="nav-item">
                                                <a href="#custom-styles-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Observação
                                                </a>
                                            </li>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="tooltips-validation-preview">
                                                <form class="needs-validation" novalidate>
                                                    <div class="row g-2">
                                                            <div class="mb-3 col-md-6">
                                                                   <label class="form-label" for="grupo"> Marca</label>
                                                                
                                                                    <select  id="grupo" name="grupo" class="form-control">
                                                                        <option value="0">SELECIONE</option>
                                                                    </select>
                                                                    
                                                            </div>
                                                            <div class="col-md-6">
                                                                   <label class="form-label" for="Codigo"> Embalagem</label>
                                                                
                                                                    <select id="codigo" name="codigo" class="form-control">
                                                                        <option value="selecione">SELECIONE</option>
                                                                    </select>
                                                            </div>
                                                    </div>

                                                    <!--  ##################################  --> 
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-3">
                                                                <label for="minCompra" class="form-label">Estoq. Minimo p/ Compra</label>
                                                                <input type="text" class="form-control" id="minCompra" placeholder="Minimo Compra">
                                                            </div>

                                                            <div class="mb-3 col-md-3">
                                                                <label for="maxCompra" class="form-label">Estoq. Max p/ Compra</label>
                                                                <input type="text" id="maxCompra" class="form-control" placeholder='Maximo Compra'>
                                                                <span id="maxCompra"></span>
                                                            </div>

                                                            <div class="mb-3 col-md-3">
                                                                <label for="quantidade" class="form-label">Quantidade</label>
                                                                <input type="text" id="quantidade" class="form-control" placeholder='Quantidade'>
                                                                <span id="quantidade"></span>
                                                            </div>
                                                            <div class="mb-3 col-md-3">
                                                                <label for="minVenda" class="form-label">Qtd. Min. Venda</label>
                                                                <input type="text" id="minVenda" class="form-control" placeholder='Minimo Venda'>
                                                                <span id="minVenda"></span>
                                                            </div>
                                                      </div>
                                                      <!--  ##################################  -->

                                                      <!--  ##################################  --> 
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-3">
                                                                <label for="peso bruto" class="form-label">Peso Bruto</label>
                                                                <input type="text" class="form-control" id="pBruto" placeholder="Peso Bruto">
                                                                <span id="peBruto"></span>
                                                            </div>

                                                            <div class="mb-3 col-md-3">
                                                                <label for="peso liquido" class="form-label">Estoq. Max p/ Compra</label>
                                                                <input type="text" id="pLiquido" class="form-control" placeholder='Peso Liquido'>
                                                                <span id="peLiquido"></span>
                                                            </div>
                                                      </div>
                                                      <!--  ##################################  --> 

                                                      <!--  ##################################  --> 
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-3">
                                                                <label for="barras EAN13" class="form-label">Cód. Barras EAN13</label>
                                                                <input type="text" class="form-control" id="ean13" placeholder="EAN13">
                                                                <span id="ean13"></span>
                                                            </div>

                                                            <div class="mb-3 col-md-3">
                                                                <label for="barras EAN14" class="form-label">Cód Barras EAN14</label>
                                                                <input type="text" id="ean14" class="form-control" placeholder='EAN14'>
                                                                <span id="ean14"></span>
                                                            </div>
                                                      </div>
                                                      <!--  ##################################  --> 

                                                      <!--  ##################################  --> 
                                                      <div class="row g-2">
                                                            <div class="mb-3 col-md-5">
                                                                <label for="rua" class="form-label">Rua</label>
                                                                <input type="text" class="form-control" id="rua" placeholder="rua">
                                                                <span id="rua"></span>
                                                            </div>

                                                            <div class="mb-3 col-md-4">
                                                                <label for="posicao" class="form-label">Posição</label>
                                                                <input type="text" id="posicao" class="form-control" placeholder='posicao'>
                                                                <span id="posicao"></span>
                                                            </div>

                                                            <div class="mb-3 col-md-2">
                                                                <label for="comissao" class="form-label">Comissão</label>
                                                                <input type="text" id="comissao" class="form-control" placeholder='comissao'>
                                                                <span id="comissao"></span>
                                                            </div>
                                                      </div>
                                                      <!--  ##################################  --> 

                                                      <!--  ##################################  -->
                                                      <div class="row g-2">
                                                        <hr>
                                                        <p><strong>IMPOSTOS FEDERAL / MUNICIPAL</strong></p>
                                                        <hr>
                                                            <div class="mb-3 col-md-2">
                                                                <label for="rateiocompra" class="form-label">Tributos aprox.</label>
                                                                <input type="text" id="tributo" class="form-control">
                                                            </div>

                                                            <div class="mb-3 col-md-2">
                                                                <label for="ipi" class="form-label">IPI</label>
                                                                <input type="text" id="ipi" class="form-control">
                                                            </div>

                                                            <div class="mb-3 col-md-4">
                                                                <label for="situacao ipi" class="form-label">Sit. Trib IPI</label>
                                                                <select name="sitipi" id="sitipi" class="form-control">
                                                                    <option value="selecione">SELECIONE</option>
                                                                    <option value="50">50 - SAIDA TRIBUTADA</option>
                                                                    <option value="51">51 - SAIDA TRIBUTADA COM ALIQ ZERO</option>
                                                                    <option value="52">52 - SAIDA ISENTA</option>
                                                                    <option value="53">53 - SAIDA NAO TRIBUTADA</option>
                                                                    <option value="54">54 - SAIDA IMUNE</option>
                                                                    <option value="55">55 - SAIDA COM SUSPENÇÃO</option>
                                                                    <option value="99">99 - OUTRAS SAIDAS</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3 col-md-4">
                                                                <label for="alICMSST" class="form-label">Aliq. ICMS ST</label>
                                                                <input type="text" name="alicmsst" id="alicmsst" class="form-control">
                                                            </div>
                                                      </div> 
                                                      <!--  ##################################  -->

                                                      <div class="row g-2">
                                                        <hr>
                                                        <p><strong>IMPOSTOS PARA ITENS SERVIÇOS</strong></p>
                                                        <hr>
                                                            <div class="mb-3 col-md-2">
                                                                <label for="IRRF" class="form-label">IRRF</label>
                                                                <input type="text" id="irrf" class="form-control">
                                                            </div>

                                                            <div class="mb-3 col-md-2">
                                                                <label for="inss" class="form-label">INSS</label>
                                                                <input type="text" id="inss" class="form-control">
                                                            </div>

                                                            <div class="mb-3 col-md-2">
                                                                <label for="csll" class="form-label">CSLL</label>
                                                                <input type="text" name="csll" id="csll" class="form-control">
                                                            </div>

                                                            <div class="mb-3 col-md-2">
                                                                <label for="pis" class="form-label">Red. PIS</label>
                                                                <input type="text" name="pis" id="pis" class="form-control">
                                                            </div>

                                                            <div class="mb-3 col-md-2">
                                                                <label for="cofins" class="form-label">Red. COFINS</label>
                                                                <input type="text" name="cofins" id="cofins" class="form-control">
                                                            </div>

                                                            <div class="mb-3 col-md-2">
                                                                <label for="limite" class="form-label">Limite</label>
                                                                <input type="text" name="limite" id="limite" class="form-control">
                                                            </div>
                                                      </div> 
                                                      <!--  ##################################  -->

                                                    <button class="btn btn-primary" type="button">Salvar</button>
                                               
                                            </div> <!-- end preview-->
                                            
                                            <div class="tab-pane" id="custom-styles-code">
                                                <pre class="row g-2">
                                                    <!--span class="html escape"-->
                                                   
                                                        <div class="mb-3">
                                                            <label class="form-label" for="Geral Produto">Descrição Geral do Produto</label>
                                                            <textarea class="form-control" id="validationTooltip01" id="geral" rows="5" cols="33">
                                                                
                                                            </textarea>
                                                                
                                                            </div>
                                                        </div>
                                                </form>       
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