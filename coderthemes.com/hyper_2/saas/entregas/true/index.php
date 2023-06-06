<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 19AGO22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 19AGO22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 19AGO22




   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21AGO22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 22AGO22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23AGO22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24AGO22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23SET22 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



session_start();
$usuario = $_SESSION['usuario'];
$codigo  = $_SESSION['id'];
$data    = Date('d/m/Y');
$hora    = Date('H:i:s');

//#########################################################################################//
// ###  ARQUIVO DE CADASTRO DE NUMERO PEDIDOS NA BASE TEMPORÁRIA - SISTEMA DE INDATEC  ### //
//#########################################################################################//

    // BUSCANDO OS REGISTROS DE PEDIDOS QUE FORAM REGISTRADOS NA TABELA TEMPORÁRIA  //
    // DEVOLVENDO A QUANTIDADE E O PEDIDO PARA COLOCAR NA GRID  //

    $sql = mysqli_query($con,"SELECT lisCodigo,lisNumero,lisCondicao,lisData,lisHora,lisFuncionario FROM listaPedidos WHERE lisData = '$data'");
    $sum = mysqli_num_rows($sql); // CARREGANDO A QUANTIDADE DE REGISTROS //


// ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
$_sql = mysqli_query($con,"SELECT funPrimNome,funCargo FROM funcionarios WHERE funCodigo = '$codigo'");
while($_obj = mysqli_fetch_array($_sql))
{
    $nome  = $_obj['funPrimNome']; // NOME DO USUARIO //
    $cargo = $_obj['funCargo'];    // CARGO DO USUARIO //
}
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //


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
       //  ########    FUNÇÃO PARA REQUISIÇÃO ASSINCRONA   #####  //
       function createRequest()
       {
         try{
              request =  new XMLHttpRequest();  //Esta linha tenta criar um novo objeto de solicitação
            }
            catch(trymicrosoft)
            {          //Estas duas linhas tentam criar objeto de solicitação, porém que funcione no explorer
                try
                {
                  request = new ActiveXObject("Msxml2.XMLHTTP");
                }
                 catch(othermicrosoft)
                 {
                   try
                   {
                     request = new ActiveXObject("Microsoft.XMLHTTP");
                   }
                   catch(failed)
                   {   // SE NÃO FUNCIONAR ESTA INSTRUÇÃO ASSEGURA QUE A VARIÁVEL CONTINUA SENDO 'NULA' //
                     request = null;
                   }
                 }
            }
            if(request == null)     // SE ALGO SAIR ERRADO, MENSAGEM DE ALERTA "NÃO FOI POSSÍVEL CRIAR O OBJETO REQUEST //
            {
              alert("Erro ao criar o objeto de pedido");
            }
       }
    //  ###   FIM DE AJAX  #### //


          function gravar_numero_pedido()
          {
              var numero   = document.getElementById('numero_pedido').value;
              var condicao = document.getElementById('condicao_pedido').value;

              if(numero == "")
              {
                  document.getElementById("excessao").innerHTML = "<div class='alert alert-danger'>ATENÇÃO.: O CAMPO NUMERO DO PEDIDO DEVERÁ SER PREENCHIDO!</div>";
                  setTimeout(function(){document.getElementById("excessao").innerHTML = "";}, 2500);
              }

              else if(condicao == 'SELECIONE')
              {
                   document.getElementById("excessao").innerHTML = "<div class='alert alert-danger'>ATENÇÃO.: O CAMPO RETIRADA OU ENTREGA DEVERÁ SER SELECIONADO!</div>";
                  setTimeout(function(){document.getElementById("excessao").innerHTML = "";}, 2500);
              }

              else
              {
                   createRequest();  // FAZ A REQUISIÇÃO AO SERVIDOR  //
                   var url = "salvar_numero_pedido.php?numero="+escape(numero)+"&condicao="+escape(condicao);
                   request.open("GET", url, true);
                   // ATRIBUI UMA FUNÇÃO PARA SER EXECUTADA SEMPRE QUE HOUVER UMA MUDANÇA //
                   request.onreadystatechange = function(){ // VERIFICA SE FOI CONCLUIDO COM SUCESSO E A CONEXÃO FECHADA (readyState=4)
                   if (request.readyState == 4)
                   { // VERIFICA SE O ARQUIVO FOI ENCONTRADO COM SUCESSO //
                       if (request.status == 200)
                       {  
                            if(request.responseText == 0)
                            {
                                 document.getElementById("excessao").innerHTML = "<div class='alert alert-danger excessao-erro'>ATENÇÃO.: ERRO AO SALVAR O REGISTRO - INFORME A GERENCIA!</div>";
                                 setTimeout(function(){document.getElementById("excessao").innerHTML = "";}, 2000);
                           }

                           else if(request.response == 1)
                           {
                                // CARREGA O VALOR DE QUANTOS PEDIDOS CONSTA NA BASE DE DADOS //
                                 location.reload();
                           }

                           else
                           {
                                 document.getElementById("excessao").innerHTML = "<div class='alert alert-danger excessao-erro'>ATENÇÃO.: ESTE PEDIDO JÁ CONSTA EM NOSSA BASE DE DADOS!</div>";
                                 setTimeout(function(){document.getElementById("excessao").innerHTML = "";}, 2000);
                           }
                  
             }
             else
             { 
                document.getElementById("excessao").innerHTML = "ERRO: " + request.statusText;
             }
         }};
        request.send(null);   
     }
              
          }  
        </script>
<style type="text/css">
  <style>
   
  </style>
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
                            
                           

                            <li class="dropdown notification-list d-none d-sm-inline-block">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-view-apps noti-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                                    <div class="p-2">
                                        <div class="row g-0">
                                            <!--div class="col">
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
                                            </div-->
                                        </div> <!-- FINAL DE LINHA -->
                                    </div>

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
                            <div class="col-xl-5 col-lg-6">

                                <div class="row">
                                    

                                    <div class="col-sm-12">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
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
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->
                            </div> <!-- end col -->

                           

                           

                        <div class="row">
                            <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="#" class="btn btn-sm btn-link float-end">Export
                                            <i class="mdi mdi-download ms-1"></i>
                                        </a>
                                        <h4 class="header-title mt-2 mb-3">Lista Pedidos Entrega</h4>

                                        <div class="table-responsive">
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
                                                            <h5 class="font-14 my-1 fw-normal">Responsavel</h5>
                                                            <span class="text-muted font-13"><?php print $obj['lisFuncionario']; ?></span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Remover</h5>
                                                            <span class="text-muted font-13"><a href="apagar_pedido.php?evento=<?php print $obj['lisNumero']; ?>">SIM</span>
                                                        </td>
                                                    </tr> <?php  }  ?>
                                                    <!-- ATENÇÃO - COLOCAR LAÇO REPETIÇÃO AQUI PARA OS BLOCOS <TR> -->
                                                        

                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            
                            

                        </div>
                        <!-- end row -->

                    </div>
                    <!-- container -->

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
                        <strong>Personalizar </strong> Esquema de cores, menu barra lateral, etc.
                    </div>

                    <!-- Settings -->
                    <h5 class="mt-3">Coleção Cores</h5>
                    <hr class="mt-1" />

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked>
                        <label class="form-check-label" for="light-mode-check">Modo Claro</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                        <label class="form-check-label" for="dark-mode-check">Modo Escuro</label>
                    </div>
       

                    <!-- Width -->
                    <h5 class="mt-4">Largura</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                        <label class="form-check-label" for="fluid-check">Fluido</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                        <label class="form-check-label" for="boxed-check">Caixa</label>
                    </div>
        

                    <!-- Left Sidebar-->
                    <h5 class="mt-4">Barra Lateral Esquerda</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                        <label class="form-check-label" for="default-check">Padrão</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                        <label class="form-check-label" for="light-check">Claro</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                        <label class="form-check-label" for="dark-check">Escuro</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                        <label class="form-check-label" for="fixed-check">Fixo</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                        <label class="form-check-label" for="condensed-check">Condensado</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                        <label class="form-check-label" for="scrollable-check">Rolável</label>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reiniciar Padrão</button>
            
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                            class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Comprar Agora</a>
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
        <script src="assets/js/vendor/apexcharts.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="assets/js/pages/demo.dashboard.js"></script>
        <!-- end demo js-->

        <!-- script para funções de arquivo-->
        <script src="assets/js/script.js"></script>
        <script src="js/scripts.js"></script>
        <!-- final de script js-->
    </body>

<!-- Mirrored from coderthemes.com/hyper_2/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:41:29 GMT -->
</html>