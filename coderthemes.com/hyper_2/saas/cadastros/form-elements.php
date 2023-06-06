<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 06JUN22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 06JUN22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 06JUN22


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 07JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 08JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 09JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 08JUL22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 26JUL22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 31OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 02FEV23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 29MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 30MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 31MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 28ABR23
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
$num     = $_REQUEST['num']; // RECEBE O NÚMERO DO CLIENTE //
$tabela  = $usuario.$codigo;


// ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
$sql = mysqli_query($con,"SELECT funPrimNome,funCargo, funEmail FROM funcionarios WHERE funCodigo = '$codigo'");
while($obj = mysqli_fetch_array($sql))
{
    $nome  = $obj['funPrimNome']; // NOME DO USUARIO //
    $cargo = $obj['funCargo'];    // CARGO DO USUARIO //
    $mail  = $obj['funEmail'];    // EMAIL DO FUNCIONÁRIO //
}
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //


// ##  VERIFICANDO NA TABELA DE USUARIO SE HÁ CARGA ## //
if(empty($num))
{
    $pon = mysqli_query($con,"SELECT coringa01 FROM $tabela");
    while($_pon = mysqli_fetch_array($pon))
    {
         $num = $_pon['coringa01']; // ESTE NUMERO VEM DA TABELA DE USUARIO QUANDO O REQUEST ESTIVER VÁZIO //
    }
}

else
{// ESTANDO CARREGANDO APENAS DEIXA A VARIÁVEL CARREGADA //
    $num = $num;
}


// ## CARREGANDO O CLIENTE NA TELA ## //
$cli = mysqli_query($con,"SELECT * FROM t0013 WHERE CLI_COD_CLI = '$num'");
while($_cli = mysqli_fetch_array($cli))
{
    $numero    = $_cli['CLI_COD_CLI'];
    $cnpj      = $_cli['CLI_CNPJ_CLI'];
    $inscricao = $_cli['CLI_INSC_EST_CLI'];
    $municipal = $_cli['CLI_INSC_MUN_CLI'];
    $razao     = $_cli['CLI_RAZ_SOC_CLI'];
    $fantasia  = $_cli['CLI_NON_FANT_CLI'];
    $cep       = $_cli['CLI_CEP_CLI'];
    $endereco  = $_cli['CLI_END_CLI'];
    $numero    = $_cli['CLI_NUM_END_CLI'];
    $bairro    = $_cli['CLI_BAI_CLI'];
    $cidade    = $_cli['CLI_CID_CLI'];
    $uf        = $_cli['CLI_UF_CLI'];
    $telefone  = $_cli['CLI_FONE_CLI'];
    $celular   = $_cli['CLI_FONE1_CLI'];
    $whatsapp  = $_cli['CLI_FONE_WHATS_CLI'];
    $contato   = $_cli['CLI_NOM_CONT_CLI'];
    $email     = $_cli['CLI_EMAIL_CONT_CLI'];
    $obs       = $_cli['CLI_OBS_GERAL_CLI'];
    $site      = $_cli['CLI_SITE_CLI'];
}
// ## FINAL DE CARGA NA TELA ## //

/*###########################################################################*/
/* ###  ARQUIVO DE CADASTRO DE CLIENTE DASHBOARD   - SISTEMA DE INDATEC  ### */
/*###########################################################################*/
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper_2/saas/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:42:41 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Indafire - Equipamentos de Combate a Incendios</title><!--  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Indafire Equipamentos de Combate a Incendios" name="description"/>
        <meta content="Indafire" name="Franco V Morales" />
        <!-- APP FAVICON -->
        <link rel="shortcut icon" href="assets/images/logoMenor.png">

        <!-- APP CSS -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
        <!-- IMPORTANTO SCRIPT JQUERY PARA CEP -->
       <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!--  ###   ROTINA PARA CEP E ENDEREÇO DINAMICO  ###  -->
<script>
//   https://sweetalert.js.org/guides/
// ## FUNÇÃO PARA CARREGAR O ENDEREÇO PARTINDO DO CEP  ## //
 function simples(){var cep = $("#cep").val().replace(/\D/g, '');if (cep != ""){/*Expressão regular para validar o CEP.*/var validacep = /^[0-9]{8}$/;if(validacep.test(cep)){$("#endereco").val("...");$("#bairro").val("...");$("#cidade").val("...");$("#estado").val("...");$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados){if (!("erro" in dados)){$("#endereco").val(dados.logradouro);$("#bairro").val(dados.bairro);$("#cidade").val(dados.localidade);$("#estado").val(dados.uf);}else{/*CEP pesquisado não foi encontrado.*/limpa_formulário_cep();alert("CEP NÃO ENCONTRADO!");}});}}else{/*cep é inválido.*/limpa_formulário_cep();alert("FORMATO DE CEP INVÁLIDO!");}}



</script>


    </head>

    <body onload="load_tela()" class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- INICIO DE PÁGINA -->
        <div class="wrapper">
            <!-- ========== INICIO DE BARRA LATERAL ESQUERDA ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-light">
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
                        <input type="hidden" name="numCliente" id="numCliente" value="<?php print $num ?>"><!-- ## VARIÁVEL OCULTA PARA CARREGAR O NUMERO DO CLIENTE ## -->
                        <!-- ###  VARIÁVEIS OCULTAS DO SISTEMA  ### -->

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <!--span class="badge bg-success float-end">4</span-->
                                <span> Painel de Controle </span>
                            </a>
                            <div class="collapse" id="sidebarDashboards">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/controller.php">Voltar</a><!-- ROTINA PARA A TELA PRINCIPAL -->
                                    </li>
                                </ul>
                            </div> <!--   -->
<!-- ######################################################################################  -->

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
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-orcamento.php">Orçamentos</a>
                                    </li>
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-products.php">Produtos</a>
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
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/cadastros/form-equipamentos.php">Equipamentos</a><!-- form-advanced.html  -->
                                    </li>
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/cadastros/form-oficina.php">Oficina</a><!-- form-advanced.html  -->
                                    </li>
                                    <li>
                                        <a href="#">Fornecedores</a><!-- form-validation.html -->
                                    </li>
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-orcamento.php">Orçamentos</a><!-- form-wizard.html  -->
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

                     


                   
                    <!-- FINAL DE BARRA LATERAL -->

                    <div class="clearfix"></div>

                </div>
                <!-- BARRA LATERAL ESQUERDA -->

            </div>
            <!-- FINAL DE BARRA LATERAL ESQUERDA -->

            <!-- ============================================================== -->
            <!-- INICIANDO CONTEÚDO DE PÁGINA AQUI                              -->
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


                   <span id="excessao"></span> <!-- SAIDA DE EXCEÇÃO - INDAIATUBA 10JUN22 - 15:58  -->
<!--  ##############################################################################################################################################################################################  -->


<!--  ##############################################################################################################################################################################################  -->
                <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE APAGAR CLIENTE ##### -->
                <!-- ALERTA MODAL DE AVISO -->
                <div id="delete-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-warning h1 text-warning"></i>
                                    <h4 class="mt-2">Deseja apagar este cliente?</h4>
                                    
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="sim_apagar()">Sim</button>
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Não</button>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
<!--  ##############################################################################################################################################################################################  -->

<!--  ##############################################################################################################################################################################################  -->
                <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE SALVAR CLIENTE ##### -->
                <!-- ALERTA MODAL DE AVISO -->
                <div id="budget-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-warning h1 text-warning"></i>
                                    <h4 class="mt-2">Deseja salvar este cliente?</h4>
                                    
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="gravar()">Sim</button>
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Não</button>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
<!--  ##############################################################################################################################################################################################  -->

                    <!-- INICIO DA BARRA DO TOPO -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list d-lg-none">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-search noti-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                    <form class="p-3">
                                        <input type="text" class="form-control" placeholder="Digite aqui ..." aria-label="Recipient's username">
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
                                        <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name"><?php print $nome; ?></span>
                                        <span class="account-position"><?php print $cargo; ?></span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Seja Bem Vindo !</h6>
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
                                        <span>Segurança de tela</span>
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
                                    <input type="text" class="form-control dropdown-toggle"  placeholder="Digite aqui..." id="top-search">
                                    <span class="mdi mdi-magnify search-icon"></span>
                                    <button class="input-group-text btn-primary" type="submit">Busca</button>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Cadastro</a></li>
                                            <li class="breadcrumb-item active">Cliente</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">CADASTRO CLIENTES</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Olá <?php  print $usuario; ?></h4>
                                        <p class="text-muted font-14">
                                            Por favor, selecione primeiro  se se o cliente é pessoa FISICA ou JURIDICA.
                                        </p>

                                        <!--ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#input-types-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#input-types-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul--> <!-- FINAL DE NAV-->

                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="input-types-preview">
                                                <div class="row">
                                                     <div class="mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input type="checkbox" class="form-check-input" id="fisico" onclick="pessoa_fisica_juridica()">
                                                            <label class="form-check-label" for="customCheck5">Cliente Fisico</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="checkbox" class="form-check-input" id="juridico" onclick="pessoa_fisica_juridica()">
                                                            <label class="form-check-label" for="customCheck6">Cliente Juridico</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <form>
                                                            <div class="mb-3 col-md-12">
                                                                    <label for="cnpj" class="form-label">CNPJ/CPF</label>
                                                                    <input type="text" id="cnpj" class="form-control" value="<?php print $cnpj; ?>" placeholder='00.000.000/0000-00' onchange="busca_endereco_automatico()">
                                                                    <span class="help-block"><small>Inserir o CNPJ ou CPF do cliente.</small></span>
                                                                    <span id="cn"></span>
                                                                </div>
                                                            <div class="row g-2">
                                                                <div class="mb-3 col-md-3">
                                                                    <label for="indicador-inscr" class="form-label">Indicador IE</label>
                                                                    <select class="form-select" id="indicadorIE" aria-label="Floating label select example" onchange="indicador()">
                                                                        <option value="selecione">Selecione</option>
                                                                        <option value="Contribuinte">Contribuinte</option>
                                                                        <option value="Não Contribuinte">Não Contribuinte</option>
                                                                        <option value="Contribuinte Isento">Contribuinte Isento</option>
                                                                    </select>
                                                                </div>

                                                                <div class="mb-3 col-md-4">
                                                                    <label for="inscricao" class="form-label">Inscr Estatudal</label>
                                                                    <input type="text" id="inscricao" class="form-control" value="<?php print $inscricao; ?>" placeholder='000.000.000-00'>
                                                                    <span class="help-block"><small>Inserir a inscrição estadual.</small></span>
                                                                    <span id="insc"></span>
                                                                </div>

                                                                <div class="mb-3 col-md-4">
                                                                    <label for="municipal" class="form-label">Inscr Municipal</label>
                                                                    <input type="text" id="municipal" class="form-control" value="<?php print $municipal; ?>" placeholder='000.000.00'>
                                                                    <span class="help-block"><small>Inserir a inscrição municipal.</small></span>
                                                                    <span id="mun"></span>
                                                                </div>

                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="razao" class="form-label">Razão Social</label>
                                                                <input type="text" id="razao" class="form-control" value="<?php print $razao; ?>" placeholder="Razão Social ou Nome Pessoal">
                                                                <span id="raz"></span>
                                                            </div> 

                                                            <div class="mb-3">
                                                                <label for="fantasia" class="form-label">Nome Fantasia</label>
                                                                <input type="text" id="fantasia" class="form-control"value="<?php print $fantasia; ?>" placeholder='nome fantasia'>
                                                                <span id="fant"></span>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="tipoCliente" class="form-label">Tipo Cliente</label>
                                                                <select class="form-select" id="tipoCliente">
                                                                    <option value="selecione">Selecione</option>
                                                                    <option value="1">Consumidor Final</option>
                                                                    <option value="2">Revenda</option>
                                                                    <option value="3">Industrialização</option>
                                                                    <option value="4">Propect</option>
                                                                </select>
                                                                <span id="tipCli"></span>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="tipoServico" class="form-label">Tipo Cliente Serviço</label>
                                                                <select class="form-select" id="tipoServico">
                                                                    <option value="selecione">Selecione</option>
                                                                    <option value="1">SUS</option>
                                                                    <option value="2">Órgão do Poder Executivo</option>
                                                                    <option value="3">Bancos</option>
                                                                    <option value="4">Comércio / Indústria</option>
                                                                    <option value="5">Outro</option>
                                                                    <option value="5">Produtor Rural</option>
                                                                </select>
                                                                <span id="tipServ"></span>
                                                                <span id="exception"></span>
                                                            </div>
                                                            

                                                           
                                                            <!--div class="mb-3">
                                                                <label for="example-readonly" class="form-label">Readonly</label>
                                                                <input type="text" id="example-readonly" class="form-control" readonly="" value="Readonly value">
                                                            </div>
        
                                                            <div class="mb-3">
                                                                <label for="example-disable" class="form-label">Disabled</label>
                                                                <input type="text" class="form-control" id="example-disable" disabled="" value="Disabled value">
                                                            </div>
            
                                                            <div class="mb-3">
                                                                <label for="example-static" class="form-label">Static control</label>
                                                                <input type="text" readonly class="form-control-plaintext" id="example-static" value="email@example.com">
                                                            </div-->
        
                                                        </form>
                                                    </div> <!-- FINAL DE COLUNA -->
        
                                                    <div class="col-lg-6">
                                                        <form>
                                                            <!--  ### INICIANDO CIDADE  ### -->
                                                            <div class="row g-2">
                                                                <div class="mb-3 col-md-2">
                                                                    <label for="cep" class="form-label">Cep</label>
                                                                    <input type="text" class="form-control" id="cep" value="<?php print $cep; ?>" onBlur="simples()" placeholder='00000-000'>
                                                                    <span id="cep"></span>
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="cidade" class="form-label">Cidade</label>
                                                                    <input type="text" class="form-control" id="cidade" value="<?php print $cidade; ?>" placeholder='nome da cidade'>
                                                                    <span id="cid"></span>
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label for="estado" class="form-label">Estado</label>
                                                                    <input type="text" class="form-control" id="estado" value="<?php print $uf; ?>" placeholder='UF'>
                                                                    <span id="uf"></span>
                                                                </div>
                                                            </div>
                                                            <div class="row g-2">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="endereco" class="form-label">Endereço</label>
                                                                    <input type="text" class="form-control" id="endereco" value="<?php print $endereco; ?>" placeholder='logradouro'>
                                                                    <span id="end"></span>
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label for="bairro" class="form-label">Bairro</label>
                                                                    <input type="text" class="form-control" id="bairro" value="<?php print $bairro; ?>" placeholder='bairro'>
                                                                    <span id="bai"></span>
                                                                </div>
                                                                <div class="mb-3 col-md-2">
                                                                    <label for="numero" class="form-label">Número</label>
                                                                    <input type="text" class="form-control" id="numero" value="<?php print $numero; ?>" placeholder='nº'>
                                                                    <span id="num"></span>
                                                                </div>
                                                            </div>
                                                            <div class="row g-2">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="email" id="email" class="form-control" value="<?php print $email; ?>" placeholder='nome@email.com.br'>
                                                                    <span id="mail"></span>
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="contato" class="form-label">Contato</label>
                                                                    <input type="text" id="contato" class="form-control" value="<?php print utf8_encode($contato); ?>" placeholder='nome do cliente'>
                                                                    <span id="cont"></span>
                                                                </div>
                                                            </div>

                                                             <!-- CAMPOS PARA TELEFONES  -->
                                                            <div class="row g-2">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="telefone" class="form-label">Telefone</label>
                                                                    <input type="text" id="telefone" class="form-control" onkeypress="mascaraTelefone(this,'(##)####-####')" placeholder="(xx) xxxx-xxxx" value="<?php print $telefone; ?>">
                                                                    <span id="tel"></span>
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="celular" class="form-label">Celular</label>
                                                                    <input type="text" id="celular" class="form-control" onkeypress="mascaraCelular(this,'(##)#####-####')" placeholder="(xx) xxxxx-xxxx" value="<?php print $celular; ?>">
                                                                    <span id="cel"></span>
                                                                </div>
                                                            </div>
                                                            <!--  FINAL CAMPOS PARA TELEFONES  -->

                                                            <div class="mb-3 col-md-6">
                                                                    <label for="whatsapp" class="form-label">Celular Whatsapp</label>
                                                                    <input type="text" id="whatsapp" class="form-control" onkeypress="mascaraCelular(this,'(##)#####-####')" placeholder="cel para whatsapp" value="<?php print $whatsapp; ?>">
                                                                    <span class="help-block"><small>Telefone para whats app.</small></span>
                                                                    <span id="whats"></span>
                                                                </div>

                                                            <div class="mb-3 col-md-12">
                                                                    <label for="site" class="form-label">Site</label>
                                                                    <input type="text" id="site" class="form-control" value="<?php print $site; ?>" placeholder='www.indafire.com.br'>
                                                                    <span id="sit"></span>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="comentarios" class="form-label">Comentários</label>
                                                                <textarea class="form-control" id="comentarios" rows="5"><?php print $obs; ?></textarea>
                                                            </div>
        
                                                            <!--div class="mb-3">
                                                                <label for="example-multiselect" class="form-label">Multiple Select</label>
                                                                <select id="example-multiselect" multiple class="form-control">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </div>
                
                                                            <div class="mb-3">
                                                                <label for="example-fileinput" class="form-label">Default file input</label>
                                                                <input type="file" id="example-fileinput" class="form-control">
                                                            </div>
                
                                                            <div class="mb-3">
                                                                <label for="example-date" class="form-label">Date</label>
                                                                <input class="form-control" id="example-date" type="date" name="date">
                                                            </div>
                
                                                            <div class="mb-3">
                                                                <label for="example-month" class="form-label">Month</label>
                                                                <input class="form-control" id="example-month" type="month" name="month">
                                                            </div>
                
                                                            <div class="mb-3">
                                                                <label for="example-time" class="form-label">Time</label>
                                                                <input class="form-control" id="example-time" type="time" name="time">
                                                            </div>
                
                                                            <div class="mb-3">
                                                                <label for="example-week" class="form-label">Week</label>
                                                                <input class="form-control" id="example-week" type="week" name="week">
                                                            </div>
                
                                                            <div class="mb-3">
                                                                <label for="example-number" class="form-label">Number</label>
                                                                <input class="form-control" id="example-number" type="number" name="number">
                                                            </div>
                
                                                            <div class="mb-3">
                                                                <label for="example-color" class="form-label">Color</label>
                                                                <input class="form-control" id="example-color" type="color" name="color" value="#727cf5">
                                                            </div>
                
                                                            <div class="mb-0">
                                                                <label for="example-range" class="form-label">Range</label>
                                                                <input class="form-range" id="example-range" type="range" name="range" min="0" max="100">
                                                            </div-->
                                                            <div class="justify-content-end row">
                                                                <div class="col-12">
                                                                    <button type="button" id="salvar" class="btn btn-info" onclick="salvar_cliente()">Salvar</button>
                                                                    <button type="button" id="editar" class="btn btn-warning" onclick="editar_cliente()">Editar</button>
                                                                    <button type="button" id="apagar" class="btn btn-danger" onclick="apagar_cliente()">Apagar</button>
                                                                    <button type="button" id="novo" class="btn btn-info" onclick="novo_cliente()">Novo</button>
                                                                    <button type="button" id="cancelar" class="btn btn-danger" onclick="cancelar_cliente()">Cancelar</button>
                                                                </div>
                                                            </div>
                
                                                        </form>
                                                    </div> <!-- FINAL DE COLUNA -->
                                                </div>
                                                <!-- FINAL DE LINHA -->                      
                                            </div> <!-- FINAL PREVIEW -->
                                        
                                            <!--div class="tab-pane" id="input-types-code">
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;simpleinput&quot; class=&quot;form-label&quot;&gt;Text&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;simpleinput&quot; class=&quot;form-control&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-email&quot; class=&quot;form-label&quot;&gt;Email&lt;/label&gt;
                                                            &lt;input type=&quot;email&quot; id=&quot;example-email&quot; name=&quot;example-email&quot; class=&quot;form-control&quot; placeholder=&quot;Email&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-password&quot; class=&quot;form-label&quot;&gt;Password&lt;/label&gt;
                                                            &lt;input type=&quot;password&quot; id=&quot;example-password&quot; class=&quot;form-control&quot; value=&quot;password&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;password&quot; class=&quot;form-label&quot;&gt;Show/Hide Password&lt;/label&gt;
                                                            &lt;div class=&quot;input-group input-group-merge&quot;&gt;
                                                                &lt;input type=&quot;password&quot; id=&quot;password&quot; class=&quot;form-control&quot; placeholder=&quot;Enter your password&quot;&gt;
                                                                &lt;div class=&quot;input-group-text&quot; data-password=&quot;false&quot;&gt;
                                                                    &lt;span class=&quot;password-eye&quot;&gt;&lt;/span&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-palaceholder&quot; class=&quot;form-label&quot;&gt;Placeholder&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;example-palaceholder&quot; class=&quot;form-control&quot; placeholder=&quot;placeholder&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-textarea&quot; class=&quot;form-label&quot;&gt;Text area&lt;/label&gt;
                                                            &lt;textarea class=&quot;form-control&quot; id=&quot;example-textarea&quot; rows=&quot;5&quot;&gt;&lt;/textarea&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-readonly&quot; class=&quot;form-label&quot;&gt;Readonly&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;example-readonly&quot; class=&quot;form-control&quot; readonly=&quot;&quot; value=&quot;Readonly value&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-disable&quot; class=&quot;form-label&quot;&gt;Disabled&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;example-disable&quot; disabled=&quot;&quot; value=&quot;Disabled value&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-static&quot; class=&quot;form-label&quot;&gt;Static control&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; readonly class=&quot;form-control-plaintext&quot; id=&quot;example-static&quot; value=&quot;email@example.com&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-helping&quot; class=&quot;form-label&quot;&gt;Helping text&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;example-helping&quot; class=&quot;form-control&quot; placeholder=&quot;Helping text&quot;&gt;
                                                            &lt;span class=&quot;help-block&quot;&gt;&lt;small&gt;A block of help text that breaks onto a new line and may extend beyond one line.&lt;/small&gt;&lt;/span&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-select&quot; class=&quot;form-label&quot;&gt;Input Select&lt;/label&gt;
                                                            &lt;select class=&quot;form-select&quot; id=&quot;example-select&quot;&gt;
                                                                &lt;option&gt;1&lt;/option&gt;
                                                                &lt;option&gt;2&lt;/option&gt;
                                                                &lt;option&gt;3&lt;/option&gt;
                                                                &lt;option&gt;4&lt;/option&gt;
                                                                &lt;option&gt;5&lt;/option&gt;
                                                            &lt;/select&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-multiselect&quot; class=&quot;form-label&quot;&gt;Multiple Select&lt;/label&gt;
                                                            &lt;select id=&quot;example-multiselect&quot; multiple class=&quot;form-control&quot;&gt;
                                                                &lt;option&gt;1&lt;/option&gt;
                                                                &lt;option&gt;2&lt;/option&gt;
                                                                &lt;option&gt;3&lt;/option&gt;
                                                                &lt;option&gt;4&lt;/option&gt;
                                                                &lt;option&gt;5&lt;/option&gt;
                                                            &lt;/select&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-fileinput&quot; class=&quot;form-label&quot;&gt;Default file input&lt;/label&gt;
                                                            &lt;input type=&quot;file&quot; id=&quot;example-fileinput&quot; class=&quot;form-control&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-date&quot; class=&quot;form-label&quot;&gt;Date&lt;/label&gt;
                                                            &lt;input class=&quot;form-control&quot; id=&quot;example-date&quot; type=&quot;date&quot; name=&quot;date&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-month&quot; class=&quot;form-label&quot;&gt;Month&lt;/label&gt;
                                                            &lt;input class=&quot;form-control&quot; id=&quot;example-month&quot; type=&quot;month&quot; name=&quot;month&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-time&quot; class=&quot;form-label&quot;&gt;Time&lt;/label&gt;
                                                            &lt;input class=&quot;form-control&quot; id=&quot;example-time&quot; type=&quot;time&quot; name=&quot;time&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-week&quot; class=&quot;form-label&quot;&gt;Week&lt;/label&gt;
                                                            &lt;input class=&quot;form-control&quot; id=&quot;example-week&quot; type=&quot;week&quot; name=&quot;week&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-number&quot; class=&quot;form-label&quot;&gt;Number&lt;/label&gt;
                                                            &lt;input class=&quot;form-control&quot; id=&quot;example-number&quot; type=&quot;number&quot; name=&quot;number&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-color&quot; class=&quot;form-label&quot;&gt;Color&lt;/label&gt;
                                                            &lt;input class=&quot;form-control&quot; id=&quot;example-color&quot; type=&quot;color&quot; name=&quot;color&quot; value=&quot;#727cf5&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-0&quot;&gt;
                                                            &lt;label for=&quot;example-range&quot; class=&quot;form-label&quot;&gt;Range&lt;/label&gt;
                                                            &lt;input class=&quot;form-range&quot; id=&quot;example-range&quot; type=&quot;range&quot; name=&quot;range&quot; min=&quot;0&quot; max=&quot;100&quot;&gt;
                                                        &lt;/div&gt;
                                                    </span-->
                                                <!--/pre> <!-- FINAL HIGHLIGHT-->
                                            <!--/div> <!-- FINAL CODIGO PREVIEW-->
                                        </div> <!-- FINAL DE CONTEUDO TAB -->
                                    </div> <!-- FINAL DE CORPO CARTÃO -->
                                </div> <!-- FINAL CARTÃO -->
                            </div><!-- FINAL COLUNA -->
                        </div><!-- FINAL DE LINHA -->

                        <!--div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Floating labels</h4>
                                        <p class="text-muted font-14">
                                            Wrap a pair of <code>&lt;input class="form-control"&gt;</code> and <code>&lt;label&gt;</code> elements in <code>.form-floating</code> to enable floating labels with Bootstrap’s textual form fields. A <code>placeholder</code> is required on each <code>&lt;input&gt;</code> as our method of CSS-only floating labels uses the <code>:placeholder-shown</code> pseudo-element. Also note that the <code>&lt;input&gt;</code> must come first so we can utilize a sibling selector (e.g., <code>~</code>).
                                        </p>
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#floating-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#floating-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->

                                        <!--div class="tab-content">
                                            <div class="tab-pane show active" id="floating-preview">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h5 class="mb-3">Example</h5>
                                                        <div class="form-floating mb-3">
                                                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                                            <label for="floatingInput">Email address</label>
                                                        </div>
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                                            <label for="floatingPassword">Password</label>
                                                        </div>
                                                
                                                        <h5 class="mb-3 mt-4">Textareas</h5>
                                                        <div class="form-floating">
                                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                                                style="height: 100px"></textarea>
                                                            <label for="floatingTextarea">Comments</label>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-lg-6">
                                                        <h5 class="mb-3">Selects</h5>
                                                        <div class="form-floating">
                                                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                                <option selected>Open this select menu</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                            <label for="floatingSelect">Works with selects</label>
                                                        </div>
                                                
                                                        <h5 class="mb-3 mt-4">Layout</h5>
                                                        <div class="row g-2">
                                                            <div class="col-md">
                                                                <div class="form-floating">
                                                                    <input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com"
                                                                        value="mdo@example.com">
                                                                    <label for="floatingInputGrid">Email address</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="form-floating">
                                                                    <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                                                        <option selected>Open this select menu</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                    <label for="floatingSelectGrid">Works with selects</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="floating-code">
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                              
                                                    &lt;div class=&quot;form-floating mb-3&quot;&gt;
                                                            &lt;input type=&quot;email&quot; class=&quot;form-control&quot; id=&quot;floatingInput&quot; placeholder=&quot;name@example.com&quot; /&gt;
                                                            &lt;label for=&quot;floatingInput&quot;&gt;Email address&lt;/label&gt;
                                                    &lt;/div&gt;

                                                    &lt;div class=&quot;form-floating&quot;&gt;
                                                        &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;floatingPassword&quot; placeholder=&quot;Password&quot; /&gt;
                                                        &lt;label for=&quot;floatingPassword&quot;&gt;Password&lt;/label&gt;
                                                    &lt;/div&gt;

                                                    &lt;div class=&quot;form-floating&quot;&gt;
                                                        &lt;textarea class=&quot;form-control&quot; placeholder=&quot;Leave a comment here&quot; id=&quot;floatingTextarea&quot; style=&quot;height: 100px;&quot;&gt;&lt;/textarea&gt;
                                                        &lt;label for=&quot;floatingTextarea&quot;&gt;Comments&lt;/label&gt;
                                                    &lt;/div&gt;

                                                    &lt;div class=&quot;form-floating&quot;&gt;
                                                        &lt;select class=&quot;form-select&quot; id=&quot;floatingSelect&quot; aria-label=&quot;Floating label select example&quot;&gt;
                                                            &lt;option selected&gt;Open this select menu&lt;/option&gt;
                                                            &lt;option value=&quot;1&quot;&gt;One&lt;/option&gt;
                                                            &lt;option value=&quot;2&quot;&gt;Two&lt;/option&gt;
                                                            &lt;option value=&quot;3&quot;&gt;Three&lt;/option&gt;
                                                        &lt;/select&gt;
                                                        &lt;label for=&quot;floatingSelect&quot;&gt;Works with selects&lt;/label&gt;
                                                    &lt;/div&gt;

                                                    &lt;div class=&quot;row g-2&quot;&gt;
                                                        &lt;div class=&quot;col-md&quot;&gt;
                                                            &lt;div class=&quot;form-floating&quot;&gt;
                                                                &lt;input type=&quot;email&quot; class=&quot;form-control&quot; id=&quot;floatingInputGrid&quot; placeholder=&quot;name@example.com&quot; value=&quot;mdo@example.com&quot; /&gt;
                                                                &lt;label for=&quot;floatingInputGrid&quot;&gt;Email address&lt;/label&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;
                                                        &lt;div class=&quot;col-md&quot;&gt;
                                                            &lt;div class=&quot;form-floating&quot;&gt;
                                                                &lt;select class=&quot;form-select&quot; id=&quot;floatingSelectGrid&quot; aria-label=&quot;Floating label select example&quot;&gt;
                                                                    &lt;option selected&gt;Open this select menu&lt;/option&gt;
                                                                    &lt;option value=&quot;1&quot;&gt;One&lt;/option&gt;
                                                                    &lt;option value=&quot;2&quot;&gt;Two&lt;/option&gt;
                                                                    &lt;option value=&quot;3&quot;&gt;Three&lt;/option&gt;
                                                                &lt;/select&gt;
                                                                &lt;label for=&quot;floatingSelectGrid&quot;&gt;Works with selects&lt;/label&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;
                                                    &lt;/div&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            <!--/div> <!-- end preview code-->
                                        <!--/div> <!-- end tab-content-->
                                    <!--/div> <!-- end card-body -->
                                <!--/div> <!-- end card -->
                            <!--/div><!-- end col -->
                        <!--/div><!-- end row -->

                        <!--div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h4 class="header-title">Select</h4>
                                                <p class="text-muted font-14">
                                                    <code>&lt;select&gt;</code> menus need only a custom class, <code>.form-select</code> to trigger the custom styles.
                                                </p>

                                                <ul class="nav nav-tabs nav-bordered mb-3">
                                                    <li class="nav-item">
                                                        <a href="#form-select-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                            Preview
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#form-select-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                            Code
                                                        </a>
                                                    </li>
                                                </ul> <!-- end nav-->
                                                <!--div class="tab-content">
                                                    <div class="tab-pane show active" id="form-select-preview">
                                                        <select class="form-select mb-3">
                                                            <option selected>Open this select menu</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>     
                                                        <select class="form-select form-select-lg mb-3">
                                                            <option selected>Open this select menu</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                        <select class="form-select form-select-sm mb-3">
                                                            <option selected>Open this select menu</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select> 
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                            <select class="form-select" id="inputGroupSelect01">
                                                              <option selected>Choose...</option>
                                                              <option value="1">One</option>
                                                              <option value="2">Two</option>
                                                              <option value="3">Three</option>
                                                            </select>
                                                        </div>   
                                                        <div class="input-group">
                                                            <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                                              <option selected>Choose...</option>
                                                              <option value="1">One</option>
                                                              <option value="2">Two</option>
                                                              <option value="3">Three</option>
                                                            </select>
                                                            <button class="btn btn-outline-secondary" type="button">Button</button>
                                                        </div>                                
                                                    </div> <!-- end preview-->
                                                
                                                    <!--div class="tab-pane" id="form-select-code">
                                                        <pre class="mb-0">
                                                            <span class="html escape">
                                                                &lt;select class=&quot;form-select mb-3&quot;&gt;
                                                                    &lt;option selected&gt;Open this select menu&lt;/option&gt;
                                                                    &lt;option value=&quot;1&quot;&gt;One&lt;/option&gt;
                                                                    &lt;option value=&quot;2&quot;&gt;Two&lt;/option&gt;
                                                                    &lt;option value=&quot;3&quot;&gt;Three&lt;/option&gt;
                                                                &lt;/select&gt;     
                                                                &lt;select class=&quot;form-select form-select-lg mb-3&quot;&gt;
                                                                    &lt;option selected&gt;Open this select menu&lt;/option&gt;
                                                                    &lt;option value=&quot;1&quot;&gt;One&lt;/option&gt;
                                                                    &lt;option value=&quot;2&quot;&gt;Two&lt;/option&gt;
                                                                    &lt;option value=&quot;3&quot;&gt;Three&lt;/option&gt;
                                                                &lt;/select&gt;
                                                                &lt;select class=&quot;form-select form-select-sm mb-3&quot;&gt;
                                                                    &lt;option selected&gt;Open this select menu&lt;/option&gt;
                                                                    &lt;option value=&quot;1&quot;&gt;One&lt;/option&gt;
                                                                    &lt;option value=&quot;2&quot;&gt;Two&lt;/option&gt;
                                                                    &lt;option value=&quot;3&quot;&gt;Three&lt;/option&gt;
                                                                &lt;/select&gt; 
                                                                &lt;div class=&quot;input-group mb-3&quot;&gt;
                                                                    &lt;label class=&quot;input-group-text&quot; for=&quot;inputGroupSelect01&quot;&gt;Options&lt;/label&gt;
                                                                    &lt;select class=&quot;form-select&quot; id=&quot;inputGroupSelect01&quot;&gt;
                                                                    &lt;option selected&gt;Choose...&lt;/option&gt;
                                                                    &lt;option value=&quot;1&quot;&gt;One&lt;/option&gt;
                                                                    &lt;option value=&quot;2&quot;&gt;Two&lt;/option&gt;
                                                                    &lt;option value=&quot;3&quot;&gt;Three&lt;/option&gt;
                                                                    &lt;/select&gt;
                                                                &lt;/div&gt;   
                                                                &lt;div class=&quot;input-group&quot;&gt;
                                                                    &lt;select class=&quot;form-select&quot; id=&quot;inputGroupSelect04&quot; aria-label=&quot;Example select with button addon&quot;&gt;
                                                                    &lt;option selected&gt;Choose...&lt;/option&gt;
                                                                    &lt;option value=&quot;1&quot;&gt;One&lt;/option&gt;
                                                                    &lt;option value=&quot;2&quot;&gt;Two&lt;/option&gt;
                                                                    &lt;option value=&quot;3&quot;&gt;Three&lt;/option&gt;
                                                                    &lt;/select&gt;
                                                                    &lt;button class=&quot;btn btn-outline-secondary&quot; type=&quot;button&quot;&gt;Button&lt;/button&gt;
                                                                &lt;/div&gt;  
                                                            </span>
                                                        </pre> <!-- end highlight-->
                                                    <!--/div> <!-- end preview code-->
                                                <!--/div> <!-- end tab-content-->

                                            <!--/div> <!-- end col -->
    
                                            <!--div class="col-lg-6">
                                                <h4 class="header-title mt-5 mt-lg-0">Switches</h4>
                                                <p class="text-muted font-14">
                                                    A switch has the markup of a custom checkbox but uses the <code>.form-switch</code> class to render a toggle switch. Switches also support the <code>disabled</code> attribute.
                                                </p>

                                                <ul class="nav nav-tabs nav-bordered mb-3">
                                                    <li class="nav-item">
                                                        <a href="#custom-switch-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                            Preview
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#custom-switch-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                            Code
                                                        </a>
                                                    </li>
                                                </ul> <!-- end nav-->
                                                <!--div class="tab-content">
                                                    <div class="tab-pane show active" id="custom-switch-preview">
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" id="customSwitch1">
                                                            <label class="form-check-label" for="customSwitch1">Toggle this switch element</label>
                                                        </div>
                                                        <div class="form-check form-switch mt-1">
                                                            <input type="checkbox" class="form-check-input" disabled id="customSwitch2">
                                                            <label class="form-check-label" for="customSwitch2">Disabled switch element</label>
                                                        </div>                                           
                                                    </div> <!-- end preview-->
                                                
                                                    <!--div class="tab-pane" id="custom-switch-code">
                                                        <pre class="mb-0">
                                                            <span class="html escape">
                                                                &lt;!-- Custom Switch --&gt;
                                                                &lt;div class=&quot;form-check form-switch&quot;&gt;
                                                                    &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customSwitch1&quot;&gt;
                                                                    &lt;label class=&quot;form-check-label&quot; for=&quot;customSwitch1&quot;&gt;Toggle this switch element&lt;/label&gt;
                                                                &lt;/div&gt;
                                                                
                                                                &lt;!-- Custom Switch Disabled --&gt;
                                                                &lt;div class=&quot;form-check form-switch&quot;&gt;
                                                                    &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; disabled id=&quot;customSwitch2&quot;&gt;
                                                                    &lt;label class=&quot;form-check-label&quot; for=&quot;customSwitch2&quot;&gt;Disabled switch element&lt;/label&gt;
                                                                &lt;/div&gt; 
                                                            </span>
                                                        </pre> <!-- end highlight-->
                                                    <!--/div> <!-- end preview code-->
                                                <!--/div> <!-- end tab-content-->
                                            <!--/div> <!-- end col -->
                                        <!--/div> <!-- end row -->

                                    <!--/div> <!-- end card-body-->
                                <!--/div> <!-- end card -->
                            <!--/div> <!-- end col -->
                        <!--/div>
                        <!-- end row -->

                        <!--div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mt-5 mt-lg-0">Checkboxes </h4>
                                        <p class="text-muted font-14">
                                            Each checkbox and radio <code>&lt;input&gt;</code> and <code>&lt;label&gt;</code> pairing is wrapped in a <code>&lt;div&gt;</code> to create our custom control. Structurally, this is the same approach as our default <code>.form-check</code>.
                                        </p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#checkbox-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#checkbox-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <!--div class="tab-content">
                                            <div class="tab-pane show active" id="checkbox-preview">
                                                <h6 class="font-15">Checkboxes</h6>
                                                <div class="mt-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                                        <label class="form-check-label" for="customCheck1">Check this custom checkbox</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                                        <label class="form-check-label" for="customCheck2">Check this custom checkbox</label>
                                                    </div>
                                                </div>

                                                <h6 class="font-15 mt-3">Inline</h6>

                                                <div class="mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="customCheck3">
                                                        <label class="form-check-label" for="customCheck3">Check this custom checkbox</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="customCheck4">
                                                        <label class="form-check-label" for="customCheck4">Check this custom checkbox</label>
                                                    </div>
                                                </div>

                                                <h6 class="font-15 mt-3">Disabled</h6>

                                                <div class="mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="customCheck5" checked disabled>
                                                        <label class="form-check-label" for="customCheck5">Check this custom checkbox</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="customCheck6" disabled>
                                                        <label class="form-check-label" for="customCheck6">Check this custom checkbox</label>
                                                    </div>
                                                </div>

                                                <h6 class="font-15 mt-3">Colors</h6>

                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" id="customCheckcolor1" checked>
                                                    <label class="form-check-label" for="customCheckcolor1">Default Checkbox</label>
                                                </div>
                                                <div class="form-check form-checkbox-success mb-2">
                                                    <input type="checkbox" class="form-check-input" id="customCheckcolor2" checked>
                                                    <label class="form-check-label" for="customCheckcolor2">Success Checkbox</label>
                                                </div>
                                                <div class="form-check form-checkbox-info mb-2">
                                                    <input type="checkbox" class="form-check-input" id="customCheckcolor3" checked>
                                                    <label class="form-check-label" for="customCheckcolor3">Info Checkbox</label>
                                                </div>
                                                <div class="form-check form-checkbox-secondary mb-2">
                                                    <input type="checkbox" class="form-check-input" id="customCheckcolor6" checked>
                                                    <label class="form-check-label" for="customCheckcolor6">Secondary Checkbox</label>
                                                </div>
                                                <div class="form-check  form-checkbox-warning mb-2">
                                                    <input type="checkbox" class="form-check-input" id="customCheckcolor4" checked>
                                                    <label class="form-check-label" for="customCheckcolor4">Warning Checkbox</label>
                                                </div>
                                                <div class="form-check form-checkbox-danger mb-2">
                                                    <input type="checkbox" class="form-check-input" id="customCheckcolor5" checked>
                                                    <label class="form-check-label" for="customCheckcolor5">Danger Checkbox</label>
                                                </div>
                                                <div class="form-check form-checkbox-dark">
                                                    <input type="checkbox" class="form-check-input" id="customCheckcolor7" checked>
                                                    <label class="form-check-label" for="customCheckcolor7">Dark Checkbox</label>
                                                </div>

                                            </div> <!-- end preview-->
                                        
                                            <!--div class="tab-pane" id="checkbox-code">
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;!-- Checkboxes--&gt; 
                                                        &lt;div class=&quot;mt-3&quot;&gt;
                                                            &lt;div class=&quot;form-check&quot;&gt;
                                                                &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheck1&quot;&gt;
                                                                &lt;label class=&quot;form-check-label&quot; for=&quot;customCheck1&quot;&gt;Check this custom checkbox&lt;/label&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;form-check&quot;&gt;
                                                                &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheck2&quot;&gt;
                                                                &lt;label class=&quot;form-check-label&quot; for=&quot;customCheck2&quot;&gt;Check this custom checkbox&lt;/label&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;

                                                        &lt;!-- Inline--&gt; 

                                                        &lt;div class=&quot;mt-2&quot;&gt;
                                                            &lt;div class=&quot;form-check form-check-inline&quot;&gt;
                                                                &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheck3&quot;&gt;
                                                                &lt;label class=&quot;form-check-label&quot; for=&quot;customCheck3&quot;&gt;Check this custom checkbox&lt;/label&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;form-check form-check-inline&quot;&gt;
                                                                &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheck4&quot;&gt;
                                                                &lt;label class=&quot;form-check-label&quot; for=&quot;customCheck4&quot;&gt;Check this custom checkbox&lt;/label&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;

                                                        &lt;!-- Disabled--&gt;

                                                        &lt;div class=&quot;mt-2&quot;&gt;
                                                            &lt;div class=&quot;form-check form-check-inline&quot;&gt;
                                                                &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheck5&quot; checked disabled&gt;
                                                                &lt;label class=&quot;form-check-label&quot; for=&quot;customCheck5&quot;&gt;Check this custom checkbox&lt;/label&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;form-check form-check-inline&quot;&gt;
                                                                &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheck6&quot; disabled&gt;
                                                                &lt;label class=&quot;form-check-label&quot; for=&quot;customCheck6&quot;&gt;Check this custom checkbox&lt;/label&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;

                                                        &lt;!-- Colors--&gt;

                                                        &lt;div class=&quot;form-check mb-2&quot;&gt;
                                                            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheckcolor1&quot; checked&gt;
                                                            &lt;label class=&quot;form-check-label&quot; for=&quot;customCheckcolor1&quot;&gt;Default Checkbox&lt;/label&gt;
                                                        &lt;/div&gt;
                                                        &lt;div class=&quot;form-check form-checkbox-success mb-2&quot;&gt;
                                                            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheckcolor2&quot; checked&gt;
                                                            &lt;label class=&quot;form-check-label&quot; for=&quot;customCheckcolor2&quot;&gt;Success Checkbox&lt;/label&gt;
                                                        &lt;/div&gt;
                                                        &lt;div class=&quot;form-check form-checkbox-info mb-2&quot;&gt;
                                                            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheckcolor3&quot; checked&gt;
                                                            &lt;label class=&quot;form-check-label&quot; for=&quot;customCheckcolor3&quot;&gt;Info Checkbox&lt;/label&gt;
                                                        &lt;/div&gt;
                                                        &lt;div class=&quot;form-check form-checkbox-secondary mb-2&quot;&gt;
                                                            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheckcolor6&quot; checked&gt;
                                                            &lt;label class=&quot;form-check-label&quot; for=&quot;customCheckcolor6&quot;&gt;Secondary Checkbox&lt;/label&gt;
                                                        &lt;/div&gt;
                                                        &lt;div class=&quot;form-check form-checkbox-warning mb-2&quot;&gt;
                                                            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheckcolor4&quot; checked&gt;
                                                            &lt;label class=&quot;form-check-label&quot; for=&quot;customCheckcolor4&quot;&gt;Warning Checkbox&lt;/label&gt;
                                                        &lt;/div&gt;
                                                        &lt;div class=&quot;form-check form-checkbox-danger mb-2&quot;&gt;
                                                            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheckcolor5&quot; checked&gt;
                                                            &lt;label class=&quot;form-check-label&quot; for=&quot;customCheckcolor5&quot;&gt;Danger Checkbox&lt;/label&gt;
                                                        &lt;/div&gt;
                                                        &lt;div class=&quot;form-check form-checkbox-dark&quot;&gt;
                                                            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheckcolor7&quot; checked&gt;
                                                            &lt;label class=&quot;form-check-label&quot; for=&quot;customCheckcolor7&quot;&gt;Dark Checkbox&lt;/label&gt;
                                                        &lt;/div&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            <!--/div> <!-- end preview code-->
                                        <!--/div> <!-- end tab-content-->

                                    <!--/div> <!-- end card-body -->
                                <!--/div> <!-- end card -->
                            <!--/div> <!-- end col -->

                            <!--div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-5 mt-lg-0">radios</h4>
                                        <p class="text-muted font-14">
                                            Each checkbox and radio <code>&lt;input&gt;</code> and <code>&lt;label&gt;</code> pairing is wrapped in a <code>&lt;div&gt;</code> to create our custom control. Structurally, this is the same approach as our default <code>.form-check</code>.
                                        </p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#radio-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#radio-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <!--div class="tab-content">
                                            <div class="tab-pane show active" id="radio-preview">
                                                
                                                <h6 class="font-15 mt-3">Radios</h6>

                                                <div class="mt-3">
                                                    <div class="form-check">
                                                        <input type="radio" id="customRadio1" name="customRadio" class="form-check-input">
                                                        <label class="form-check-label" for="customRadio1">Toggle this custom radio</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                                        <label class="form-check-label" for="customRadio2">Or toggle this other custom radio</label>
                                                    </div>
                                                </div> 
                                                
                                                <h6 class="font-15 mt-3">Inline</h6>

                                                <div class="mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="customRadio3" name="customRadio1" class="form-check-input">
                                                        <label class="form-check-label" for="customRadio3">Toggle this custom radio</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="customRadio4" name="customRadio1" class="form-check-input">
                                                        <label class="form-check-label" for="customRadio4">Or toggle this other custom radio</label>
                                                    </div>
                                                </div>

                                                <h6 class="font-15 mt-3">Disabled</h6>

                                                <div class="mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="customRadio5" name="customRadio2" class="form-check-input" disabled>
                                                        <label class="form-check-label" for="customRadio5">Toggle this custom radio</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="customRadio6" name="customRadio2" class="form-check-input" checked disabled>
                                                        <label class="form-check-label" for="customRadio6">Or toggle this other custom radio</label>
                                                    </div>
                                                </div>

                                                <h6 class="font-15 mt-3">Colors</h6>

                                                <div class="form-check mb-2">
                                                    <input type="radio" id="customRadiocolor1" name="customRadiocolor1" class="form-check-input" checked>
                                                    <label class="form-check-label" for="customRadiocolor1">Default Radio</label>
                                                </div>
                                                <div class="form-check form-radio-success mb-2">
                                                    <input type="radio" id="customRadiocolor2" name="customRadiocolor2" class="form-check-input" checked>
                                                    <label class="form-check-label" for="customRadiocolor2">Success Radio</label>
                                                </div>
                                                <div class="form-check form-radio-info mb-2">
                                                    <input type="radio" id="customRadiocolor3" name="customRadiocolor3" class="form-check-input" checked>
                                                    <label class="form-check-label" for="customRadiocolor3">Info Radio</label>
                                                </div>
                                                <div class="form-check form-radio-secondary mb-2">
                                                    <input type="radio" id="customRadiocolor6" name="customRadiocolor6" class="form-check-input" checked>
                                                    <label class="form-check-label" for="customRadiocolor6">Secondary Radio</label>
                                                </div>
                                                <div class="form-check form-radio-warning mb-2">
                                                    <input type="radio" id="customRadiocolor4" name="customRadiocolor4" class="form-check-input" checked>
                                                    <label class="form-check-label" for="customRadiocolor4">Warning Radio</label>
                                                </div>
                                                <div class="form-check form-radio-danger mb-2">
                                                    <input type="radio" id="customRadiocolor5" name="customRadiocolor5" class="form-check-input" checked>
                                                    <label class="form-check-label" for="customRadiocolor5">Danger Radio</label>
                                                </div>
                                                <div class="form-check form-radio-dark">
                                                    <input type="radio" id="customRadiocolor7" name="customRadiocolor7" class="form-check-input" checked>
                                                    <label class="form-check-label" for="customRadiocolor7">Dark Radio</label>
                                                </div>

                                            </div> <!-- end preview-->
                                        
                                            <!--div class="tab-pane" id="radio-code">
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;!-- Radios--&gt; 

                                                        &lt;div class=&quot;mt-3&quot;&gt;
                                                            &lt;div class=&quot;form-check&quot;&gt;
                                                                &lt;input type=&quot;radio&quot; id=&quot;customRadio1&quot; name=&quot;customRadio&quot; class=&quot;form-check-input&quot;&gt;
                                                                &lt;label class=&quot;form-check-label&quot; for=&quot;customRadio1&quot;&gt;Toggle this custom radio&lt;/label&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;form-check&quot;&gt;
                                                                &lt;input type=&quot;radio&quot; id=&quot;customRadio2&quot; name=&quot;customRadio&quot; class=&quot;form-check-input&quot;&gt;
                                                                &lt;label class=&quot;form-check-label&quot; for=&quot;customRadio2&quot;&gt;Or toggle this other custom radio&lt;/label&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt; 

                                                        &lt;!-- Inline--&gt;

                                                        &lt;div class=&quot;mt-2&quot;&gt;
                                                            &lt;div class=&quot;form-check form-check-inline&quot;&gt;
                                                                &lt;input type=&quot;radio&quot; id=&quot;customRadio3&quot; name=&quot;customRadio1&quot; class=&quot;form-check-input&quot;&gt;
                                                                &lt;label class=&quot;form-check-label&quot; for=&quot;customRadio3&quot;&gt;Toggle this custom radio&lt;/label&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;form-check form-check-inline&quot;&gt;
                                                                &lt;input type=&quot;radio&quot; id=&quot;customRadio4&quot; name=&quot;customRadio1&quot; class=&quot;form-check-input&quot;&gt;
                                                                &lt;label class=&quot;form-check-label&quot; for=&quot;customRadio4&quot;&gt;Or toggle this other custom radio&lt;/label&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;

                                                        &lt;!-- Disabled--&gt; 

                                                        &lt;div class=&quot;mt-2&quot;&gt;
                                                            &lt;div class=&quot;form-check form-check-inline&quot;&gt;
                                                                &lt;input type=&quot;radio&quot; id=&quot;customRadio5&quot; name=&quot;customRadio2&quot; class=&quot;form-check-input&quot; disabled&gt;
                                                                &lt;label class=&quot;form-check-label&quot; for=&quot;customRadio5&quot;&gt;Toggle this custom radio&lt;/label&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;form-check form-check-inline&quot;&gt;
                                                                &lt;input type=&quot;radio&quot; id=&quot;customRadio6&quot; name=&quot;customRadio2&quot; class=&quot;form-check-input&quot; checked disabled&gt;
                                                                &lt;label class=&quot;form-check-label&quot; for=&quot;customRadio6&quot;&gt;Or toggle this other custom radio&lt;/label&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;

                                                        &lt;!-- Colors --&gt; 

                                                        &lt;div class=&quot;form-check mb-2&quot;&gt;
                                                            &lt;input type=&quot;radio&quot; id=&quot;customRadiocolor1&quot; name=&quot;customRadiocolor1&quot; class=&quot;form-check-input&quot; checked&gt;
                                                            &lt;label class=&quot;form-check-label&quot; for=&quot;customRadiocolor1&quot;&gt;Default Radio&lt;/label&gt;
                                                        &lt;/div&gt;
                                                        &lt;div class=&quot;form-check form-radio-success mb-2&quot;&gt;
                                                            &lt;input type=&quot;radio&quot; id=&quot;customRadiocolor2&quot; name=&quot;customRadiocolor2&quot; class=&quot;form-check-input&quot; checked&gt;
                                                            &lt;label class=&quot;form-check-label&quot; for=&quot;customRadiocolor2&quot;&gt;Success Radio&lt;/label&gt;
                                                        &lt;/div&gt;
                                                        &lt;div class=&quot;form-check form-radio-info mb-2&quot;&gt;
                                                            &lt;input type=&quot;radio&quot; id=&quot;customRadiocolor3&quot; name=&quot;customRadiocolor3&quot; class=&quot;form-check-input&quot; checked&gt;
                                                            &lt;label class=&quot;form-check-label&quot; for=&quot;customRadiocolor3&quot;&gt;Info Radio&lt;/label&gt;
                                                        &lt;/div&gt;
                                                        &lt;div class=&quot;form-check form-radio-secondary mb-2&quot;&gt;
                                                            &lt;input type=&quot;radio&quot; id=&quot;customRadiocolor6&quot; name=&quot;customRadiocolor6&quot; class=&quot;form-check-input&quot; checked&gt;
                                                            &lt;label class=&quot;form-check-label&quot; for=&quot;customRadiocolor6&quot;&gt;Secondary Radio&lt;/label&gt;
                                                        &lt;/div&gt;
                                                        &lt;div class=&quot;form-check form-radio-warning mb-2&quot;&gt;
                                                            &lt;input type=&quot;radio&quot; id=&quot;customRadiocolor4&quot; name=&quot;customRadiocolor4&quot; class=&quot;form-check-input&quot; checked&gt;
                                                            &lt;label class=&quot;form-check-label&quot; for=&quot;customRadiocolor4&quot;&gt;Warning Radio&lt;/label&gt;
                                                        &lt;/div&gt;
                                                        &lt;div class=&quot;form-check form-radio-danger mb-2&quot;&gt;
                                                            &lt;input type=&quot;radio&quot; id=&quot;customRadiocolor5&quot; name=&quot;customRadiocolor5&quot; class=&quot;form-check-input&quot; checked&gt;
                                                            &lt;label class=&quot;form-check-label&quot; for=&quot;customRadiocolor5&quot;&gt;Danger Radio&lt;/label&gt;
                                                        &lt;/div&gt;
                                                        &lt;div class=&quot;form-check form-radio-dark&quot;&gt;
                                                            &lt;input type=&quot;radio&quot; id=&quot;customRadiocolor7&quot; name=&quot;customRadiocolor7&quot; class=&quot;form-check-input&quot; checked&gt;
                                                            &lt;label class=&quot;form-check-label&quot; for=&quot;customRadiocolor7&quot;&gt;Dark Radio&lt;/label&gt;
                                                        &lt;/div&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            <!--/div> <!-- end preview code-->
                                        <!--/div> <!-- end tab-content-->

                                    <!--/div> <!-- end card-body -->
                                <!--/div> <!-- end card -->
                            <!--/div> <!-- end col -->
                        <!--/div>
                        <!-- end row -->

                        <!--div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title">Input Sizes</h4>
                                        <p class="text-muted font-14">
                                            Set heights using classes like <code>.input-lg</code>, and set widths using grid column classes like <code>.col-lg-*</code>.
                                        </p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#input-sizes-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#input-sizes-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <!--div class="tab-content">
                                            <div class="tab-pane show active" id="input-sizes-preview">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="example-input-small" class="form-label">Small</label>
                                                        <input type="text" id="example-input-small" name="example-input-small" class="form-control form-control-sm" placeholder=".input-sm">
                                                    </div>
        
                                                    <div class="mb-3">
                                                        <label for="example-input-normal" class="form-label">Normal</label>
                                                        <input type="text" id="example-input-normal" name="example-input-normal" class="form-control" placeholder="Normal">
                                                    </div>
        
                                                    <div class="mb-3">
                                                        <label for="example-input-large" class="form-label">Large</label>
                                                        <input type="text" id="example-input-large" name="example-input-large" class="form-control form-control-lg" placeholder=".input-lg">
                                                    </div>
        
                                                    <div class="mb-2">
                                                        <label for="example-gridsize" class="form-label">Grid Sizes</label>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <input type="text" id="example-gridsize" class="form-control" placeholder=".col-sm-4">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>                                           
                                            </div> <!-- end preview-->
                                        
                                            <!--div class="tab-pane" id="input-sizes-code">
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-input-small&quot; class=&quot;form-label&quot;&gt;Small&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;example-input-small&quot; name=&quot;example-input-small&quot; class=&quot;form-control form-control-sm&quot; placeholder=&quot;.input-sm&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-input-normal&quot; class=&quot;form-label&quot;&gt;Normal&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;example-input-normal&quot; name=&quot;example-input-normal&quot; class=&quot;form-control&quot; placeholder=&quot;Normal&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label for=&quot;example-input-large&quot; class=&quot;form-label&quot;&gt;Large&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;example-input-large&quot; name=&quot;example-input-large&quot; class=&quot;form-control form-control-lg&quot; placeholder=&quot;.input-lg&quot;&gt;
                                                        &lt;/div&gt;
                                                        
                                                        &lt;div class=&quot;mb-2&quot;&gt;
                                                            &lt;label for=&quot;example-gridsize&quot; class=&quot;form-label&quot;&gt;Grid Sizes&lt;/label&gt;
                                                            &lt;div class=&quot;row&quot;&gt;
                                                                &lt;div class=&quot;col-sm-4&quot;&gt;
                                                                    &lt;input type=&quot;text&quot; id=&quot;example-gridsize&quot; class=&quot;form-control&quot; placeholder=&quot;.col-sm-4&quot;&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            <!--/div> <!-- end preview code-->
                                        <!--/div> <!-- end tab-content-->

                                    <!--/div> <!-- end card-body -->
                                <!--/div> <!-- end card -->
                            <!--/div> <!-- end col -->

                            <!--div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title">Input Group</h4>
                                        <p class="text-muted font-14">
                                            Easily extend form controls by adding text, buttons, or button groups on either side of textual inputs, custom selects, and custom file inputs
                                        </p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#input-group-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#input-group-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <!--div class="tab-content">
                                            <div class="tab-pane show active" id="input-group-preview">
                                                <form>
                                                    <div class="mb-3">
                                                        <label class="form-label">Static</label>
                                                        <div class="input-group flex-nowrap">
                                                            <span class="input-group-text" id="basic-addon1">@</span>
                                                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
        
                                                    <div class="mb-3">
                                                        <label class="form-label">Dropdowns</label>
                                                        <div class="input-group">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <a class="dropdown-item" href="#">Something else here</a>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
        
                                                    <div class="mb-3">
                                                        <label class="form-label">Buttons</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username">
                                                            <button class="btn btn-dark" type="button">Button</button>
                                                        </div>
                                                    </div>
        
                                                    <div class="row g-2">
                                                        <div class="col-sm-6">
                                                            <label class="form-label">File input</label>
                                                            <input class="form-control" type="file" id="inputGroupFile04">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="formFileMultiple01" class="form-label">Multiple files input</label>
                                                            <input class="form-control" type="file" id="formFileMultiple01" multiple>
                                                        </div>
                                                    </div>
                                                </form>                                           
                                            </div> <!-- end preview-->
                                        
                                            <!--div class="tab-pane" id="input-group-code">
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;form&gt;
                                                            &lt;div class=&quot;mb-3&quot;&gt;
                                                                &lt;label class=&quot;form-label&quot;&gt;Static&lt;/label&gt;
                                                                &lt;div class=&quot;input-group flex-nowrap&quot;&gt;
                                                                    &lt;span class=&quot;input-group-text&quot; id=&quot;basic-addon1&quot;&gt;@&lt;/span&gt;
                                                                    &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Username&quot; aria-label=&quot;Username&quot; aria-describedby=&quot;basic-addon1&quot;&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                
                                                            &lt;div class=&quot;mb-3&quot;&gt;
                                                                &lt;label class=&quot;form-label&quot;&gt;Dropdowns&lt;/label&gt;
                                                                &lt;div class=&quot;input-group&quot;&gt;
                                                                    &lt;button class=&quot;btn btn-primary dropdown-toggle&quot; type=&quot;button&quot; data-bs-toggle=&quot;dropdown&quot; aria-haspopup=&quot;true&quot; aria-expanded=&quot;false&quot;&gt;Dropdown&lt;/button&gt;
                                                                    &lt;div class=&quot;dropdown-menu&quot;&gt;
                                                                        &lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Action&lt;/a&gt;
                                                                        &lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Another action&lt;/a&gt;
                                                                        &lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Something else here&lt;/a&gt;
                                                                    &lt;/div&gt;
                                                                    &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;&quot; aria-label=&quot;&quot; aria-describedby=&quot;basic-addon1&quot;&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                
                                                            &lt;div class=&quot;mb-3&quot;&gt;
                                                                &lt;label class=&quot;form-label&quot;&gt;Buttons&lt;/label&gt;
                                                                &lt;div class=&quot;input-group&quot;&gt;
                                                                    &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Recipient's username&quot; aria-label=&quot;Recipient's username&quot;&gt;
                                                                    &lt;button class=&quot;btn btn-dark&quot; type=&quot;button&quot;&gt;Button&lt;/button&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                
                                                            &lt;div class=&quot;row g-2&quot;&gt;
                                                                &lt;div class=&quot;col-sm-6&quot;&gt;
                                                                    &lt;label class=&quot;form-label&quot;&gt;File input&lt;/label&gt;
                                                                    &lt;input class=&quot;form-control&quot; type=&quot;file&quot; id=&quot;inputGroupFile04&quot;&gt;
                                                                &lt;/div&gt;
                                                                &lt;div class=&quot;col-sm-6&quot;&gt;
                                                                    &lt;label for=&quot;formFileMultiple&quot; class=&quot;form-label&quot;&gt;Multiple files input&lt;/label&gt;
                                                                    &lt;input class=&quot;form-control&quot; type=&quot;file&quot; id=&quot;formFileMultiple&quot; multiple&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                        &lt;/form&gt; 
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            <!--/div> <!-- end preview code-->
                                        <!--/div> <!-- end tab-content-->

                                    <!--/div> <!-- end card-body -->
                                <!--/div> <!-- end card -->
                            <!--/div> <!-- end col -->
                        <!--/div>
                        <!-- end row -->


                        <!--div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Basic Example</h4>
                                        <p class="text-muted font-14">Here’s a quick example to demonstrate Bootstrap’s form styles. Keep reading for documentation on required classes, form layout, and more.</p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#basic-form-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#basic-form-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <!--div class="tab-content">
                                            <div class="tab-pane show active" id="basic-form-preview">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                    </div>
                                                    <div class=" mb-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="checkmeout0">
                                                            <label class="form-check-label" for="checkmeout0">Check me out !</label>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>                                      
                                            </div> <!-- end preview-->
                                        
                                            <!--div class="tab-pane" id="basic-form-code">
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;form&gt;
                                                            &lt;div class=&quot;mb-3&quot;&gt;
                                                                &lt;label for=&quot;exampleInputEmail1&quot; class=&quot;form-label&quot;&gt;Email address&lt;/label&gt;
                                                                &lt;input type=&quot;email&quot; class=&quot;form-control&quot; id=&quot;exampleInputEmail1&quot; aria-describedby=&quot;emailHelp&quot; placeholder=&quot;Enter email&quot;&gt;
                                                                &lt;small id=&quot;emailHelp&quot; class=&quot;form-text text-muted&quot;&gt;We'll never share your email with anyone else.&lt;/small&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;mb-3&quot;&gt;
                                                                &lt;label for=&quot;exampleInputPassword1&quot; class=&quot;form-label&quot;&gt;Password&lt;/label&gt;
                                                                &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;exampleInputPassword1&quot; placeholder=&quot;Password&quot;&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;mb-3&quot;&gt;
                                                                &lt;div class=&quot;form-check&quot;&gt;
                                                                    &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;checkmeout0&quot;&gt;
                                                                    &lt;label class=&quot;form-check-label&quot; for=&quot;checkmeout0&quot;&gt;Check me out !&lt;/label&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary&quot;&gt;Submit&lt;/button&gt;
                                                        &lt;/form&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            <!--/div> <!-- end preview code-->
                                        <!--/div> <!-- end tab-content-->

                                    <!--/div> <!-- end card-body-->
                                <!--/div> <!-- end card-->
                            <!--/div>
                            <!-- end col -->

                            <!--div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Horizontal form</h4>
                                        <p class="text-muted font-14">Create horizontal forms with the grid by adding the <code>.row</code> class to form groups and using the <code>.col-*-*</code> classes to specify the width of your labels and controls. Be sure to add <code>.col-form-label</code> to your <code>&lt;label&gt;</code>s as well so they’re vertically centered with their associated form controls.</p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#horizontal-form-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#horizontal-form-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <!--div class="tab-content">
                                            <div class="tab-pane show active" id="horizontal-form-preview">
                                                <form class="form-horizontal">
                                                    <div class="row mb-3">
                                                        <label for="inputEmail3" class="col-3 col-form-label">Email</label>
                                                        <div class="col-9">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputPassword3" class="col-3 col-form-label">Password</label>
                                                        <div class="col-9">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputPassword5" class="col-3 col-form-label">Re Password</label>
                                                        <div class="col-9">
                                                            <input type="password" class="form-control" id="inputPassword5" placeholder="Retype Password">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 justify-content-end">
                                                        <div class="col-9">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="checkmeout">
                                                                <label class="form-check-label" for="checkmeout">Check me out !</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="justify-content-end row">
                                                        <div class="col-9">
                                                            <button type="submit" class="btn btn-info">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>                                            
                                            </div> <!-- end preview-->
                                        
                                            <!--div class="tab-pane" id="horizontal-form-code">
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;form class=&quot;form-horizontal&quot;&gt;
                                                            &lt;div class=&quot;row mb-3&quot;&gt;
                                                                &lt;label for=&quot;inputEmail3&quot; class=&quot;col-3 col-form-label&quot;&gt;Email&lt;/label&gt;
                                                                &lt;div class=&quot;col-9&quot;&gt;
                                                                    &lt;input type=&quot;email&quot; class=&quot;form-control&quot; id=&quot;inputEmail3&quot; placeholder=&quot;Email&quot;&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;row mb-3&quot;&gt;
                                                                &lt;label for=&quot;inputPassword3&quot; class=&quot;col-3 col-form-label&quot;&gt;Password&lt;/label&gt;
                                                                &lt;div class=&quot;col-9&quot;&gt;
                                                                    &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;inputPassword3&quot; placeholder=&quot;Password&quot;&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;row mb-3&quot;&gt;
                                                                &lt;label for=&quot;inputPassword5&quot; class=&quot;col-3 col-form-label&quot;&gt;Re Password&lt;/label&gt;
                                                                &lt;div class=&quot;col-9&quot;&gt;
                                                                    &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;inputPassword5&quot; placeholder=&quot;Retype Password&quot;&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;row mb-3 justify-content-end&quot;&gt;
                                                                &lt;div class=&quot;col-9&quot;&gt;
                                                                    &lt;div class=&quot;form-check&quot;&gt;
                                                                        &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;checkmeout&quot;&gt;
                                                                        &lt;label class=&quot;form-check-label&quot; for=&quot;checkmeout&quot;&gt;Check me out !&lt;/label&gt;
                                                                    &lt;/div&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;justify-content-end row&quot;&gt;
                                                                &lt;div class=&quot;col-9&quot;&gt;
                                                                    &lt;button type=&quot;submit&quot; class=&quot;btn btn-info&quot;&gt;Sign in&lt;/button&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                        &lt;/form&gt; 
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            <!--/div> <!-- end preview code-->
                                        <!--/div> <!-- end tab-content-->
                                    <!--/div>  <!-- end card-body -->
                                <!--/div>  <!-- end card -->
                            <!--/div>  <!-- end col -->

                        <!--/div>
                        <!-- end row -->


                        <!-- Inline Form -->
                        <!--div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title">Inline Form</h4>
                                        <p class="text-muted font-14">
                                            Use the <code>.row-cols-lg-auto</code>, <code>.g-3</code> & <code>.align-items-center</code> class to display a series of labels, form controls, and buttons on a single horizontal row. Form controls within inline forms vary slightly from their default states. Controls only appear inline in viewports that are at least 576px wide to account for narrow viewports on mobile devices.
                                        </p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#inline-form-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#inline-form-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <!--div class="tab-content">
                                            <div class="tab-pane show active" id="inline-form-preview">
                                                <form class="row row-cols-lg-auto g-3 align-items-center">
                                                    <div class="col-12">
                                                        <label for="staticEmail2" class="visually-hidden">Email</label>
                                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="inputPassword2" class="visually-hidden">Password</label>
                                                        <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary">Confirm identity</button>
                                                    </div>
                                                </form>
            
                                                <h6 class="font-13 mt-3">Auto-sizing</h6>
                                                <form>
                                                    <div class="row gy-2 gx-2 align-items-center">
                                                        <div class="col-auto">
                                                            <label class="visually-hidden" for="inlineFormInput">Name</label>
                                                            <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Jane Doe">
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="visually-hidden" for="inlineFormInputGroup">Username</label>
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-text">@</div>
                                                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="autoSizingCheck">
                                                                <label class="form-check-label" for="autoSizingCheck">Remember me</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>                                            
                                            </div> <!-- end preview-->
                                        
                                            <!--div class="tab-pane" id="inline-form-code">
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;form class=&quot;row row-cols-lg-auto g-3 align-items-center&quot;&gt;
                                                            &lt;div class=&quot;col-12&quot;&gt;
                                                                &lt;label for=&quot;staticEmail2&quot; class=&quot;visually-hidden&quot;&gt;Email&lt;/label&gt;
                                                                &lt;input type=&quot;text&quot; readonly class=&quot;form-control-plaintext&quot; id=&quot;staticEmail2&quot; value=&quot;email@example.com&quot;&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;col-12&quot;&gt;
                                                                &lt;label for=&quot;inputPassword2&quot; class=&quot;visually-hidden&quot;&gt;Password&lt;/label&gt;
                                                                &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;inputPassword2&quot; placeholder=&quot;Password&quot;&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;col-12&quot;&gt;
                                                                &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary&quot;&gt;Confirm identity&lt;/button&gt;
                                                            &lt;/div&gt;
                                                        &lt;/form&gt;
                    
                                                        &lt;h6 class=&quot;font-13 mt-3&quot;&gt;Auto-sizing&lt;/h6&gt;
                                                        &lt;form&gt;
                                                            &lt;div class=&quot;row gy-2 gx-2 align-items-center&quot;&gt;
                                                                &lt;div class=&quot;col-auto&quot;&gt;
                                                                    &lt;label class=&quot;visually-hidden&quot; for=&quot;inlineFormInput&quot;&gt;Name&lt;/label&gt;
                                                                    &lt;input type=&quot;text&quot; class=&quot;form-control mb-2&quot; id=&quot;inlineFormInput&quot; placeholder=&quot;Jane Doe&quot;&gt;
                                                                &lt;/div&gt;
                                                                &lt;div class=&quot;col-auto&quot;&gt;
                                                                    &lt;label class=&quot;visually-hidden&quot; for=&quot;inlineFormInputGroup&quot;&gt;Username&lt;/label&gt;
                                                                    &lt;div class=&quot;input-group mb-2&quot;&gt;
                                                                        &lt;div class=&quot;input-group-text&quot;&gt;@&lt;/div&gt;
                                                                        &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;inlineFormInputGroup&quot; placeholder=&quot;Username&quot;&gt;
                                                                    &lt;/div&gt;
                                                                &lt;/div&gt;
                                                                &lt;div class=&quot;col-auto&quot;&gt;
                                                                    &lt;div class=&quot;form-check mb-2&quot;&gt;
                                                                        &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;autoSizingCheck&quot;&gt;
                                                                        &lt;label class=&quot;form-check-label&quot; for=&quot;autoSizingCheck&quot;&gt;Remember me&lt;/label&gt;
                                                                    &lt;/div&gt;
                                                                &lt;/div&gt;
                                                                &lt;div class=&quot;col-auto&quot;&gt;
                                                                    &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary mb-2&quot;&gt;Submit&lt;/button&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                        &lt;/form&gt;  
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            <!--/div> <!-- end preview code-->
                                        <!--/div> <!-- end tab-content-->

                                    <!--/div> <!-- end card-body -->
                                <!--/div> <!-- end card -->
                            <!--/div> <!-- end col -->
                        <!--/div>
                        <!-- end row -->

                        <!--div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Horizontal form label sizing</h4>
                                        <p class="text-muted font-14">Be sure to use <code>.col-form-label-sm</code> or <code>.col-form-label-lg</code> to your <code>&lt;label&gt;</code>s or <code>&lt;legend&gt;</code>s to correctly follow the size of <code>.form-control-lg</code> and <code>.form-control-sm</code>.</p>
                        
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#label-sizing-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#label-sizing-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <!--div class="tab-content">
                                            <div class="tab-pane show active" id="label-sizing-preview">
                                                <form>
                                                    <div class="mb-2 row">
                                                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                                                        <div class="col-sm-10">
                                                        <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 row">
                                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="colFormLabel" placeholder="col-form-label">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                                                        <div class="col-sm-10">
                                                        <input type="email" class="form-control form-control-lg" id="colFormLabelLg" placeholder="col-form-label-lg">
                                                        </div>
                                                    </div>
                                                </form>                                        
                                            </div> <!-- end preview-->
                                        
                                            <!--div class="tab-pane" id="label-sizing-code">
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;form&gt;
                                                            &lt;div class=&quot;mb-2 row&quot;&gt;
                                                                &lt;label for=&quot;colFormLabelSm&quot; class=&quot;col-sm-2 col-form-label col-form-label-sm&quot;&gt;Email&lt;/label&gt;
                                                                &lt;div class=&quot;col-sm-10&quot;&gt;
                                                                &lt;input type=&quot;email&quot; class=&quot;form-control form-control-sm&quot; id=&quot;colFormLabelSm&quot; placeholder=&quot;col-form-label-sm&quot;&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;mb-2 row&quot;&gt;
                                                                &lt;label for=&quot;colFormLabel&quot; class=&quot;col-sm-2 col-form-label&quot;&gt;Email&lt;/label&gt;
                                                                &lt;div class=&quot;col-sm-10&quot;&gt;
                                                                &lt;input type=&quot;email&quot; class=&quot;form-control&quot; id=&quot;colFormLabel&quot; placeholder=&quot;col-form-label&quot;&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;row&quot;&gt;
                                                                &lt;label for=&quot;colFormLabelLg&quot; class=&quot;col-sm-2 col-form-label col-form-label-lg&quot;&gt;Email&lt;/label&gt;
                                                                &lt;div class=&quot;col-sm-10&quot;&gt;
                                                                &lt;input type=&quot;email&quot; class=&quot;form-control form-control-lg&quot; id=&quot;colFormLabelLg&quot; placeholder=&quot;col-form-label-lg&quot;&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                        &lt;/form&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            <!--/div> <!-- end preview code-->
                                        <!--/div> <!-- end tab-content-->
                                    <!--/div> <!-- end card-body -->
                                <!--/div> <!-- end card-->
                            <!--/div> <!-- end col -->
                        <!--/div>
                        <!-- end row -->

                        <!-- Form row -->
                        <!--div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Form Row</h4>
                                        <p class="text-muted font-14">
                                            By adding <code>.row</code> & <code>.g-2</code>, you can have control over the gutter width in as well the inline as block direction.
                                        </p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#form-row-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#form-row-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <!--div class="tab-content">
                                            <div class="tab-pane show active" id="form-row-preview">
                                                <form>
                                                    <div class="row g-2">
                                                        <div class="mb-3 col-md-6">
                                                            <label for="inputEmail4" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="inputPassword4" class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                                                        </div>
                                                    </div>
        
                                                    <div class="mb-3">
                                                        <label for="inputAddress" class="form-label">Address</label>
                                                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label for="inputAddress2" class="form-label">Address 2</label>
                                                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                                    </div>
        
                                                    <div class="row g-2">
                                                        <div class="mb-3 col-md-6">
                                                            <label for="inputCity" class="form-label">City</label>
                                                            <input type="text" class="form-control" id="inputCity">
                                                        </div>
                                                        <div class="mb-3 col-md-4">
                                                            <label for="inputState" class="form-label">State</label>
                                                            <select id="inputState" class="form-select">
                                                                <option>Choose</option>
                                                                <option>Option 1</option>
                                                                <option>Option 2</option>
                                                                <option>Option 3</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-2">
                                                            <label for="inputZip" class="form-label">Zip</label>
                                                            <input type="text" class="form-control" id="inputZip">
                                                        </div>
                                                    </div>

                                                    <div class="mb-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customCheck11">
                                                            <label class="form-check-label" for="customCheck11">Check this custom checkbox</label>
                                                        </div>
                                                    </div>
        
                                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                                </form>                      
                                            </div> <!-- end preview-->
                                        
                                            <!--div class="tab-pane" id="form-row-code">
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;form&gt;
                                                            &lt;div class=&quot;row g-2&quot;&gt;
                                                                &lt;div class=&quot;mb-3 col-md-6&quot;&gt;
                                                                    &lt;label for=&quot;inputEmail4&quot; class=&quot;form-label&quot;&gt;Email&lt;/label&gt;
                                                                    &lt;input type=&quot;email&quot; class=&quot;form-control&quot; id=&quot;inputEmail4&quot; placeholder=&quot;Email&quot;&gt;
                                                                &lt;/div&gt;
                                                                &lt;div class=&quot;mb-3 col-md-6&quot;&gt;
                                                                    &lt;label for=&quot;inputPassword4&quot; class=&quot;form-label&quot;&gt;Password&lt;/label&gt;
                                                                    &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;inputPassword4&quot; placeholder=&quot;Password&quot;&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                
                                                            &lt;div class=&quot;mb-3&quot;&gt;
                                                                &lt;label for=&quot;inputAddress&quot; class=&quot;form-label&quot;&gt;Address&lt;/label&gt;
                                                                &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;inputAddress&quot; placeholder=&quot;1234 Main St&quot;&gt;
                                                            &lt;/div&gt;
                                                            
                                                            &lt;div class=&quot;mb-3&quot;&gt;
                                                                &lt;label for=&quot;inputAddress2&quot; class=&quot;form-label&quot;&gt;Address 2&lt;/label&gt;
                                                                &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;inputAddress2&quot; placeholder=&quot;Apartment, studio, or floor&quot;&gt;
                                                            &lt;/div&gt;
                
                                                            &lt;div class=&quot;row g-2&quot;&gt;
                                                                &lt;div class=&quot;mb-3 col-md-6&quot;&gt;
                                                                    &lt;label for=&quot;inputCity&quot; class=&quot;form-label&quot;&gt;City&lt;/label&gt;
                                                                    &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;inputCity&quot;&gt;
                                                                &lt;/div&gt;
                                                                &lt;div class=&quot;mb-3 col-md-4&quot;&gt;
                                                                    &lt;label for=&quot;inputState&quot; class=&quot;form-label&quot;&gt;State&lt;/label&gt;
                                                                    &lt;select id=&quot;inputState&quot; class=&quot;form-select&quot;&gt;
                                                                        &lt;option&gt;Choose&lt;/option&gt;
                                                                        &lt;option&gt;Option 1&lt;/option&gt;
                                                                        &lt;option&gt;Option 2&lt;/option&gt;
                                                                        &lt;option&gt;Option 3&lt;/option&gt;
                                                                    &lt;/select&gt;
                                                                &lt;/div&gt;
                                                                &lt;div class=&quot;mb-3 col-md-2&quot;&gt;
                                                                    &lt;label for=&quot;inputZip&quot; class=&quot;form-label&quot;&gt;Zip&lt;/label&gt;
                                                                    &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;inputZip&quot;&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;

                                                            &lt;div class=&quot;mb-2&quot;&gt;
                                                                &lt;div class=&quot;form-check&quot;&gt;
                                                                    &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheck11&quot;&gt;
                                                                    &lt;label class=&quot;form-check-label&quot; for=&quot;customCheck11&quot;&gt;Check this custom checkbox&lt;/label&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                
                                                            &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary&quot;&gt;Sign in&lt;/button&gt;
                                                        &lt;/form&gt;  
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            <!--/div> <!-- end preview code-->
                                        <!--/div> <!-- end tab-content-->

                                    <!--/div> <!-- end card-body -->
                                <!--/div> <!-- end card-->
                            <!--/div> <!-- end col -->
                        <!--/div>
                        <!-- FINAL DE LINHA -->
                        
                    </div> <!-- CONTAINER -->

                </div> <!-- CONTEUDO -->

                <!-- INICIO DE RODAPÉ -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Indafire - Equipamentos de Combate a Incendios
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">Sobre nós</a>
                                    <a href="javascript: void(0);">Suporte</a>
                                    <a href="javascript: void(0);">Contato</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- FINAL DE RODAPÉ -->

            </div>

            <!-- ============================================================== -->
            <!-- FINAL DE PÉGINA DE CONTEUDO                                    -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right Sidebar -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Buscar Cliente</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar>

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Digite o nome do cliente </strong> ou o código do cliente.
                    </div>

                    <!-- Settings -->
                    <h5 class="mt-3">Código Cliente</h5>
                    <hr class="mt-1" />

                    <div class="row mb-9">
                        <div class="col-md-12">
                            <input type="text" id="codigoCli" name="codigoCli" class="form-control" required>
                        </div>
                    </div>

                    <!-- Width -->
                    <h5 class="mt-4">Nome Cliente</h5>
                    <hr class="mt-1" />
                    <div class="row mb-9">
                        <div class="col-md-12">
                            <select id='nomeCli' class="form-control" required>
                               <option id="SELECIONE">SELECIONE</option>
                              <?php  // ## SELECT PARA CARREGAR A LISTA DE CLIENTES ## //
                                     $cli = mysqli_query($con,"SELECT CLI_COD_CLI, CLI_RAZ_SOC_CLI FROM t0013");
                                     while($cli3 = mysqli_fetch_array($cli))
                                     {  
                                                          $codigoCli = $cli3['CLI_COD_CLI'];
                                       ?><option><?php print           utf8_encode($cli3['CLI_RAZ_SOC_CLI']); // AQUI CARREGA O NOME DO CLIENTE //
                                     } ?>
                               </option>
                            </select>
                        </div>
                    </div>

                    <!-- Left Sidebar-->
                    <h5 class="mt-4"></h5>
                    <hr class="mt-1" />

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" target="_blank" onclick="buscarCustomer()">Buscar</button> <!-- id="resetBtn"  -->
            
                        <a class="btn btn-danger mt-3" target="_blank" onclick="limpar()">Limpar</a><!-- href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"  -->
                    </div>
                </div> <!-- end padding-->

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /FINAL DE BARRA -->


        <!-- BUNDLE -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
         <!-- SCRIPT PARA FUNÇÕES DE ARQUIVO -->
        <script src="assets/js/script.js"></script>
        <!-- FINAL DE SCRIPT JS -->
        
    </body>

<!-- Mirrored from coderthemes.com/hyper_2/saas/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:42:41 GMT -->
</html>