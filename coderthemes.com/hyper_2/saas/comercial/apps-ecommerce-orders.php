<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 15SET22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 15SET22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 15SET22



   
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 16SET22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 16OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 17OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 31OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 26JAN23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 07FEV23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 08FEV23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 13MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 28MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 20ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 11MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 12MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';


session_start();
$usuario  = $_SESSION['usuario'];
$codigo   = $_SESSION['id'];
$dia      = Date('d');
$mes      = Date('m');
$ano      = Date('Y');
$data     = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
$pesquisa = $_REQUEST['pesquisa'];  // CARREGA O VALOR DA PESQUISA PARA A CARGA DA TABELA  //
$dataCompleta = $ano.'-'.$mes.'-'.$dia;


// ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
$sql = mysqli_query($con,"SELECT funPrimNome,funCargo,funFoto FROM funcionarios WHERE funCodigo = '$codigo'");
while($obj = mysqli_fetch_array($sql))
{
    $nome  = $obj['funPrimNome']; // NOME DO USUARIO //
    $cargo = $obj['funCargo'];    // CARGO DO USUARIO //
    $foto  = $obj['funFoto'];    // FOTOO DO USUARIO //
}
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //

// ## BUSCANDO OS REGISTROS DE ENTREGA/RETIRADA DO DIA OU DA PESQUISA ## //
if($pesquisa == 'aberto')
{
    $rel = mysqli_query($con,"SELECT relPedido,relStatus,relData,relHora,relResponsavel FROM relatorio WHERE relData = '$dataCompleta'");
}

else if($pesquisa == 'embarque')
{
    $rel = mysqli_query($con,"SELECT relPedido,relStatus,relData,relHora,relResponsavel FROM relatorio WHERE relEmbarque = 1 AND relStatus = 'ENTREGUE'");
}

else if($pesquisa == 'caminho')
{
    $rel = mysqli_query($con,"SELECT relPedido,relStatus,relData,relHora,relResponsavel FROM relatorio WHERE relHoraSaida != '' AND relEntrega = 0");
}

else if($pesquisa == 'entregue')
{
    $rel = mysqli_query($con,"SELECT relPedido,relStatus,relData,relHora,relResponsavel FROM relatorio WHERE relEntrega = 1 AND relStatus = 'ENTREGUE'");
}

else if($pesquisa == 'retirado')
{
    $rel = mysqli_query($con,"SELECT relPedido,relStatus,relData,relHora,relResponsavel FROM relatorio WHERE relEntrega = 1 AND relStatus = 'RETIRADO'");
}

else
{
    $rel = mysqli_query($con,"SELECT relPedido,relStatus,relData,relHora,relResponsavel FROM relatorio");
}


/*###########################################################################*/
/* ###  ARQUIVO DE PEDIDO COM GRID DE PEDIDOS  -     SISTEMA DE INDATEC  ### */
/*###########################################################################*/
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper_2/saas/apps-ecommerce-orders.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:42:02 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Indafire - Equipamentos de Combate a Incendios</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="indafire combate a incendios e treinamentos" name="description" />
        <meta content="indafire" name="Franco V. Morales" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logoMenor.png">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
        <script type="text/javascript">
            // ## INICIO DE ROTINA PARA APAGAR TODO O ORÇAMENTO ## //
            function delfile(v)
            { 
                $("#delete-alert-modal").modal("toggle");
                var numero = v;
                 createRequest();
                 var url = "memo_apagar.php?numero="+escape(numero);
                 request.open("GET",url,true);
                 request.onreadystatechange = function(){
                  if(request.readyState == 4)
                  {
                      if(request.status == 200)
                      {
                          if(request.responseText == 0)
                          {
                               // MENSAGEM PARA INFORMAR O ERRO //
                               document.getElementById('excessao').innerHTML = "<div class='alert alert-success excessao-entrar'>ATENÇÃO: ERRO AO SALVAR PARAMETRO NA MEMORIA!!</div>";
                               setTimeout(function(){document.getElementById("excessao").innerHTML = ""},3000);
                          }
                          else
                          {   
                              valor = valor;
                          }
                      }
                  }};
                  request.send(null);
            }


             // ## INICIO DE ROTINA PARA EDITAR PEDIDO ## //
            function editfile(e)
            {
                var pedido = e;
                 createRequest();
                 var url = "memo_editar.php?pedido="+escape(pedido);
                 request.open("GET",url,true);
                 request.onreadystatechange = function(){
                  if(request.readyState == 4)
                  {
                      if(request.status == 200)
                      {
                          if(request.responseText == 0)
                          {
                               // MENSAGEM PARA INFORMAR O ERRO //
                               document.getElementById('excessao').innerHTML = "<div class='alert alert-success excessao-entrar'>ATENÇÃO: ERRO AO SALVAR PARAMETRO NA MEMORIA!!</div>";
                               setTimeout(function(){document.getElementById("excessao").innerHTML = ""},3000);
                          }
                          else
                          {   
                              window.location.href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/form-wizard-pedido.php";
                          }
                      }
                  }};
                  request.send(null);
            }


            // ## CONFIRMAÇÃO PARA APAGAR ORÇAMENTO ## //
            function apagar_ped()
            {   
                 createRequest();
                 var url = "apagar_pedido.php?ped="+escape('X');
                 request.open("GET",url,true);
                 request.onreadystatechange = function(){
                  if(request.readyState == 4)
                  {
                      if(request.status == 200)
                      {
                          if(request.responseText == 0)
                          {
                               // MENSAGEM PARA INFORMAR O ERRO //
                               document.getElementById('excessao').innerHTML = "<div class='alert alert-success excessao-entrar'>ATENÇÃO: ERRO AO APAGAR PEDIDO!!</div>";
                               setTimeout(function(){document.getElementById("excessao").innerHTML = ""},3000);
                          }

                          else
                          {   
                              //  REGISTRO REMOVIDO  //
                              document.getElementById('excessao').innerHTML = "<div class='alert alert-success excessao-entrar'>ATENÇÃO: PEDIDO REMOVIDO COM SUCESSO!!</div>";
                              setTimeout(function(){location.reload();},3000);
                          }
                      }
                  }};
                  request.send(null);
            }

             // ## ROTINA PARA CRIAR NOVO PEDIDO  ## //
            function pedido() // CHAMADA DE ALERT NA TELA
            {
                $("#budget-alert-modal").modal("toggle");
            }


            // ## FUNÇÃO PARA ABRIR NOVO PEDIDO ## //
            function novoPedido()
            {
                var codigo = document.getElementById('codigo').value;
                var nome   = document.getElementById('nome').value;
                window.location.href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/novo-pedido.php?id="+escape(codigo)+"&usuario="+escape(nome);
            }
            // ## FINAL DE FUNÇÃO ## //

            // ## FUNÇÃO PARA CARGA DE TELA DE ACORDO COM O SELECIONADO ## //
            function pesquisa()
            {
                 var  status = document.getElementById('status-select').value;
                 window.location.href = "apps-ecommerce-orders.php?pesquisa="+escape(status);
            }
            // ## FINAL DE FUNÇÃO DE PESQUISA ## //

        </script>
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/controller.php" class="logo text-center logo-light">
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
                        <input type="hidden" name="codigo" id="codigo" value="<?php print $codigo ?>"><!-- ## VARIAVEL OCULTA PARA CARREGAR O CÓDIGO/ID DO USUARIO ## -->
                        <input type="hidden" name="nome" id="nome" value="<?php print $nome ?>"><!-- ## VARIÁVEL OCULTA PARA CARREGAR O NOME DO USUARI ## -->
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
                                        <a href="apps-ecommerce-orcamento.php">Orçamentos</a><!-- form-wizard-orcamento.php -->
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-products.php">Produtos</a>
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-customers.php">Clientes</a><!-- apps-ecommerce-customers.html -->
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
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/cadastros/form-oficina.php">Oficina</a><!-- form-advanced.html  -->
                                    </li>
                                    <li>
                                        <a href="#">Fornecedores</a><!-- form-validation.html -->
                                    </li>
                                    <li>
                                        <a href="comercial/apps-ecommerce-orcamento.php">Orçamentos</a><!-- form-wizard.html  -->
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
                    <!-- End Sidebar -->
                        <!-- ##  ATENÇÃO / ATENÇÃO / ATENÇÃO  -  AQUI ESTÁ O BOTAO ENGRENAGEM NO FRONT QUE FOI APAGADO ## -->
                        <!--li class="side-nav-item">
                            <a href="apps-file-manager.html" class="side-nav-link">
                                <i class="uil-folder-plus"></i>
                                <span> Gerenciador Arquivos </span>
                            </a>
                        </li-->
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
                <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE NOVO ORÇAMENTO ##### -->
                <!-- ALERTA MODAL DE AVISO -->
                <div id="budget-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-warning h1 text-warning"></i>
                                    <h4 class="mt-2">Deseja abrir um novo pedido?</h4>
                                    
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="novoPedido()">Sim</button>
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Não</button>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
<!--  ##############################################################################################################################################################################################  -->


<!--  ##############################################################################################################################################################################################  -->
                <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE APAGAR ORÇAMENTO ##### -->
                <!-- ALERTA MODAL DE AVISO -->
                <div id="delete-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-warning h1 text-warning"></i>
                                    <h4 class="mt-2">Deseja apagar este pedido?</h4>
                                    
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="apagar_ped()">Sim</button>
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Não</button>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
<!--  ##############################################################################################################################################################################################  -->



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
                           

                            

                            <!--li class="notification-list">
                                <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                    <i class="dripicons-gear noti-icon"></i>
                                </a>
                            </li-->

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
                                        <h6 class="text-overflow m-0">Seja bem vindo !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>Minha conta</span>
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
                                        <span>Bloqueio Tela</span>
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


                     <!--li class="side-nav-item">
                            <a href="apps-file-manager.html" class="side-nav-link">
                                <i class="uil-folder-plus"></i>
                                <span> Gerenciador Arquivos </span>
                            </a>
                        </li-->

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
                                            <li class="breadcrumb-item active">Pedidos</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Pedidos</h4>
                                    <span id="excessao"></span>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-xl-8">
                                                <form class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                                    <div class="col-auto">
                                                        <div class="d-flex align-items-center">
                                                            <label for="status-select" class="me-2">Status</label>
                                                            <select class="form-select" id="status-select" onChange="pesquisa()">
                                                                <option selected>Selecione...</option>
                                                                <option value="aberto">Aberto</option>
                                                                <option value="embarque">Embarque</option>
                                                                <option value="caminho">A caminho</option>
                                                                <option value="entregue/retirado">Entregue/Retirado</option>
                                                                <option value="entregue">Entregue</option>
                                                                <option value="retirado">Retirado</option>
                                                                <option value="data">Pesquisa Data</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>                            
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="text-xl-end mt-xl-0 mt-2">
                                                    <button type="button" class="btn btn-danger mb-2 me-2" onclick="pedido()"><i class="mdi mdi-basket me-1"></i> Adicionar Novo Pedido</button>
                                                    <button type="button" class="btn btn-light mb-2">Exportar</button>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                
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
                                                        <td><a href="apps-ecommerce-orders-details.php?pedido=<?php print $_rel['relPedido']; ?>" class="text-body fw-bold"><?php print $_rel['relPedido']; ?></a> </td>
                                                        <td>
                                                            <?php print $_rel['relData'];  ?>- <small class="text-muted"><?php print $_rel['relHora'] ?></small>
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-success-lighten"><i class="mdi mdi-bitcoin"></i> Exemplo</span></h5>
                                                        </td>
                                                        <td>
                                                            $0.00
                                                        </td>
                                                        <td>
                                                            Modelo/Exemplo
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-info-lighten"><?php print $_rel['relStatus'];  ?></span></h5>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon" onclick="editfile(e = '<?php print $_rel['relPedido']; ?>')"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon" onclick="delfile(v = '<?php print $_rel['relPedido']; ?>')"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr><?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
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
                                <script>document.write(new Date().getFullYear())</script> © Indafire - Equipamentos Combate a Incendios
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
                    <h5 class="mt-3">Esquema de cores</h5>
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
                    <h5 class="mt-4">Largura</h5>
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
                    <h5 class="mt-4">Barra esquerda</h5>
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
                        <button class="btn btn-primary" id="resetBtn">Reset padrao</button>
            
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                            class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Compre agora</a>
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

<!-- Mirrored from coderthemes.com/hyper_2/saas/apps-ecommerce-orders.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:42:02 GMT -->
</html>
s