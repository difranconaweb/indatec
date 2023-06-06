<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 15OUT22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 15OUT22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 15OUT22



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 16OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 01NOV22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 22MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 28MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 29MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 04ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 25ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 28ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 11MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 12MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';


    session_start();
    $usuario  = $_SESSION['usuario'];
    $codigo   = $_SESSION['id'];
    $data     = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
    $pesquisa = $_REQUEST['pesquisa'];  // CARREGA O VALOR DA PESQUISA PARA A CARGA DA TABELA  //
    $tabela   = $usuario.$codigo;

    // ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
    $sql = mysqli_query($con,"SELECT funPrimNome,funCargo, funFoto FROM funcionarios WHERE funCodigo = '$codigo'");
    while($obj = mysqli_fetch_array($sql))
    {
        $nome  = $obj['funPrimNome']; // NOME DO USUARIO //
        $cargo = $obj['funCargo'];    // CARGO DO USUARIO //
        $foto  = $obj['funFoto'];    // FOTO DO USUARIO //
    }
    // ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //

    // ## BUSCANDO O NUMERO DO PEDIDO NA TABELA  ## //
    $sql = mysqli_query($con,"SELECT coringa01, relCodigoCliente, relCliente, relEmail, relEndereco, relNumero, relBairro, relCidade, relTelefone, relContato FROM $tabela INNER JOIN relatorio ON $tabela.coringa01 = relatorio.relPedido");
    while($obj = mysqli_fetch_array($sql))
    {
        $pedido           = $obj['coringa01'];
        $codigo_cliente   = $obj['relCodigoCliente'];
        $nome_cliente     = $obj['relCliente'];
        $email_cliente    = $obj['relEmail'];
        $end_cliente      = $obj['relEndereco'];
        $numero_cliente   = $obj['relNumero'];
        $bairro_cliente   = $obj['relBairro'];
        $cidade_cliente   = $obj['relCidade'];
        $telefone_cliente = $obj['relTelefone'];
        $contato_cliente  = $obj['relContato'];
    }

    
    // ## QUERY PARA CARREGAR GRID ## //
    $tab = mysqli_query($con,"SELECT PED_ITEM_NUM_PED, PED_ITEM_DESC_ITEM_PED, PED_ITEM_QTD_ITEM, PED_ITEM_TOTAL_ITEM FROM t0020 WHERE PED_ITEM_NUM_PED = '$pedido'");

      // ## FUNÇÃO PARA CARREGAR O VALOR TOTAL DO ORÇAMENTO NA TELA ## //
        function total($pedido)
        {
             require 'inc/conexao.php';

             // ## QUERY PARA CARREGAR GRID ## //
             $tab = mysqli_query($con,"SELECT sum(PED_ITEM_TOTAL_ITEM) AS TOTAL FROM t0020 WHERE PED_ITEM_NUM_PED = '$pedido'");
             while($vl = mysqli_fetch_array($tab))
             {
                 $valor = $vl['TOTAL'];
             }
             
             print $valor;
        }
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper_2/saas/form-wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:42:43 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Indafire - Equipamentos de Combate a Incendios</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="indafire combate a incendios e treinamentos" name="description" />
        <meta content="Indafire" name="Franco V. Morales" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logoMenor.png">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
        <script type="text/javascript">
        // ## ROTINA PARA DESLOGAR USUARIO ## //
        function deslogar()
        {
               var codigo = document.getElementById('codigo').value;
               $("#warning-alert-modal").modal("toggle");
        }
        // ## FINAL DE ROTINA DESLOGAR ## //

        // ## ROTINA PARA CRIAR NOVO PEDIDO  ## //
        function novo_ped() // CHAMADA DE ALERT NA TELA
        {
            $("#budget-alert-modal").modal("toggle");
        }
         
   
        // ## FUNÇÃO PARA O LOAD DA TELA ## //
        function pedido()
        {// razao fantasia codex cnpj estadual logradouro numero bairro  cidade //
            document.getElementById('razao').disabled      = false;
            document.getElementById('fantasia').disabled   = true;
            document.getElementById('codex').disabled      = true;
            document.getElementById('cnpj').disabled       = true;
            document.getElementById('estadual').disabled   = true;
            document.getElementById('logradouro').disabled = true;
            document.getElementById('numero').disabled     = true;
            document.getElementById('bairro').disabled     = true;
            document.getElementById('cidade').disabled     = true;
            document.getElementById('contato').disabled    = true;
            document.getElementById('email').disabled      = true;
            document.getElementById('telefone').disabled   = true;
            document.getElementById('celular').disabled    = true;
            document.getElementById('codigoEquipamento').disabled = true;
        }

        // ## ROTINA PARA APAGAR O PEDIDO ## //
        function apagar_pedido()
        {
             var pedido = document.getElementById('numero').value;
             createRequest();
             var url = "apagar_pedido.php?pedido="+escape(pedido);
             request.open("GET",url,true);
             request.onreadystatechange = function(){
              if(request.readyState == 4)
              {
                  if(request.status == 200)
                  {
                      if(request.responseText == 0)
                      {
                           // MENSAGEM PARA INFORMAR O ERRO //
                           document.getElementById('excessao').innerHTML = "<div class='alert alert-success excessao-entrar'>ATENÇÃO: ERRO AO APAGAR REGISTRO!!</div>";
                           setTimeout(function(){document.getElementById("excessao").innerHTML = ""},3000);
                      }
                      else
                      {   
                          //  REGISTRO REMOVIDO  //
                          document.getElementById('excessao').innerHTML = "<div class='alert alert-success excessao-entrar'>ATENÇÃO: REGISTRO REMOVIDO COM SUCESSO!!</div>";
                          setTimeout(function(){location.reload();},2000);
                      }
                  }
              }};
              request.send(null);
        }

       // ## FUNÇÃO PARA APAGAR ITEM DO PEDIDO ## //
        function apagar_item(v)
        {    var descricao = v; // RECEBENDO O VALOR QUE VEM DO PARAMETRO PARA CARREGAR NA FUNÇÃO APÓS A JANELA ALERTA //
             var pedido = document.getElementById('numero').value;
             $("#delete-item-alert-modal").modal("toggle");
             createRequest();
             var url = "memo_apagar.php?descricao="+escape(descricao)+"&numero="+escape(pedido);
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
                           setTimeout(function(){document.getElementById("excessao").innerHTML = ""},1000);
                      }
                      else
                      {   
                          descricao;
                      }
                  }
              }};
              request.send(null);
        }
        // ## FINAL DE ROTINA ## //

        // ## ROTINA PARA APAGAR ITEM DE PEDIDO ## //
        function apagar_item_pedido()
        { 
             var numero = document.getElementById('numero').value;

             createRequest();
             var url = "apagar_item.php?numero="+escape(numero);
             request.open("GET",url,true);
             request.onreadystatechange = function(){
              if(request.readyState == 4)
              {
                  if(request.status == 200)
                  {
                      if(request.responseText == 0)
                      {
                           // MENSAGEM PARA INFORMAR O ERRO //
                           document.getElementById('excessao').innerHTML = "<div class='alert alert-success excessao-entrar'>ATENÇÃO: ERRO AO APAGAR ITEM!!</div>";
                           setTimeout(function(){document.getElementById("excessao").innerHTML = ""},1000);
                      }
                      else
                      {   
                           //  REGISTRO REMOVIDO  //
                           document.getElementById('excessao').innerHTML = "<div class='alert alert-success excessao-entrar'>ITEM FOI REMOVIDO!!</div>";
                           setTimeout(function(){location.reload();},1000);
                      }
                 } }
              };
              request.send(null);
        }

         // ## BUSCAR CLIENTE PARA O PEDIDO ## //
        function buscarCustomer()
        {
            var email     = document.getElementById('email').value;
            var nome      = document.getElementById('nomeCli').value;
            var ccli      = document.getElementById('codigoCli').value;
            var codigo    = document.getElementById('codigo').value;
            var numero    = document.getElementById('numero').value;
            var param     = 2;
            window.location.href = "pesquisa-cliente.php?pesquisa="+escape(nome)+"&codigo="+escape(codigo)+"&ccli="+escape(ccli)+"&numero="+escape(numero)+"&email="+escape(email)+"&param="+escape(param);
        }

        </script>
    </head>

    <body onload="pedido()" class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
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
                        <input type="hidden" name="nome" id="nome" value="<?php print $nome ?>"><!-- ## VARIÁVEL OCULTA PARA CARREGAR O NOME DO USUARI ## -->
                        <input type="hidden" name="numero" id="numero" value="<?php print $pedido ?>"><!-- ## VARIÁVEL OCULTA PARA CARREGAR O NUMERO DO ORÇAMENTO ## -->
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
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-orders.php">Voltar lista</a>
                                    </li>
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-orcamento.php">Orçamentos</a>
                                    </li>
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-products.php">Equipamentos</a>
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
                                        <a href="#">Fornecedores</a><!-- form-validation.html -->
                                    </li>
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/form-wizard-orcamento.php">Orçamentos</a><!-- form-wizard.html  -->
                                    </li>
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/cadastros/form-equipamentos.php">Equipamentos</a>
                                    </li>
                                    <li>
                                        <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/cadastros/form-oficina.php">Oficina</a>
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


 <!--  ##############################################################################################################################################################################################  -->
                <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE APAGAR PEDIDO ##### -->
                <!-- ALERTA MODAL DE AVISO -->
                <div id="delete-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-warning h1 text-warning"></i>
                                    <h4 class="mt-2">Deseja apagar este pedido?</h4>
                                    
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="apagar_pedido()">Sim</button>
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Não</button>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
<!--  ##############################################################################################################################################################################################  -->

<!--  ##############################################################################################################################################################################################  -->
                <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE APAGAR ITEM DE PEDIDO ##### -->
                <!-- ALERTA MODAL DE AVISO -->
                <div id="delete-item-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-warning h1 text-warning"></i>
                                    <h4 class="mt-2">Deseja apagar este item?</h4>
                                    
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="apagar_item_pedido()">Sim</button>
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Não</button>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
<!--  ##############################################################################################################################################################################################  -->

<!--  ##############################################################################################################################################################################################  -->
                <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE NOVO PEDIDO ##### -->
                <!-- ALERTA MODAL DE AVISO -->
                <div id="budget-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-warning h1 text-warning"></i>
                                    <h4 class="mt-2">Deseja abrir um novo pedido?</h4>
                                    
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="novo_pedido()">Sim</button>
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
                                        <input type="text" class="form-control" placeholder="Pesquisar ..." aria-label="Nome de usuário">
                                    </form>
                                </div>
                            </li>

                            <li class="notification-list">
                                </br>
                                <button class="input-group-text end-bar-toggle btn-primary" type="button">Buscar Cliente</button>
                                <!--a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                    <i class="dripicons-gear noti-icon"></i-->
                                </a>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="<?php  print $foto; ?>" alt="user-image" class="rounded-circle">
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
                                        <span  onclick="deslogar()">Deslogar</span>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Formulário</a></li>
                                            <li class="breadcrumb-item active">Formulário Pedido</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Formulário Pedido nº <?php print $pedido; ?></h4><span id="excessao"></span>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mb-3"> FORMULÁRIO</h4>

                                        <form>
                                            <div id="basicwizard">

                                                <ul class="nav nav-pills nav-justified form-wizard-header mb-4">
                                                    <li class="nav-item">
                                                        <a href="#basictab1" data-bs-toggle="tab" data-toggle="tab"  class="nav-link rounded-0 pt-2 pb-2"> 
                                                            <i class="mdi mdi-account-circle me-1"></i>
                                                            <span class="d-none d-sm-inline">Dados</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#basictab2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                            <i class="mdi mdi-face-profile me-1"></i>
                                                            <span class="d-none d-sm-inline">Endereço</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#basictab3" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                            <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                                            <span class="d-none d-sm-inline">Contato</span>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content b-0 mb-0">
                                                    <div class="tab-pane" id="basictab1">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="razao">Razão</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control select2" id="razao" name="razao" data-toggle="select2">
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
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="fantasia"> Fantasia</label>
                                                                    <div class="col-md-6">
                                                                        <input type="text" id="fantasia" name="fantasia" class="form-control" value="<?php print utf8_encode($nome_cliente) ?>">
                                                                    </div>
                                                                    <label class="col-md-1 col-form-label" for="Codigo"> Cód.</label>
                                                                    <div class="col-md-2">
                                                                        <input type="text" id="codex" name="codex" class="form-control" value="<?php print $codigo_cliente ?>">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="cnpj">CNPJ</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="cnpj" name="cnpj" class="form-control" value="<?php print $cnpj_cliente ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="estadual">Estadual</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="estadual" name="estadual" class="form-control" value="<?php print $inscricao_cliente ?>">
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="tab-pane" id="basictab2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="logradouro"> Logradouro</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="logradouro" name="logradouro" class="form-control" value="<?php print utf8_encode($end_cliente) ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="numero"> Numero</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="numero" name="numero" class="form-control" value="<?php print $numero_cliente ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="bairro"> Bairro</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="bairro" name="bairro" class="form-control" value="<?php print utf8_encode($bairro_cliente) ?>">
                                                                    </div>
                                                                </div>
                                        
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="cidade">Cidade</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="cidade" name="cidade" class="form-control" value="<?php print utf8_encode($cidade_cliente) ?>">
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="tab-pane" id="basictab3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="contato"> Contato</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="contato" name="contato" class="form-control" value="<?php print utf8_encode($contato_cliente) ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="mail"> Email</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="email" name="email" class="form-control" value="<?php print $email_cliente ?>">
                                                                    </div>
                                                                </div>
                                        
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="telefone">Telefone</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="telefone" name="telefone" class="form-control" value="<?php print $telefone_cliente ?>">
                                                                    </div>
                                                                </div>
                                                                 <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="celular">Celular</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="celular" name="Celular" class="form-control" value="<?php print $telefone_cliente ?>">
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>
                                                </div> <!-- tab-content -->
                                            </div> <!-- end #basicwizard-->
                                        </form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->

                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mb-3"> Progresso do Pedido</h4>
                                        <form>
                                                <div id="btnwizard">
                                                    <ul class="nav nav-pills nav-justified form-wizard-header mb-4">
                                                        <li class="nav-item">
                                                            <a href="#tab12" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                                <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                                                <span class="d-none d-sm-inline">Equipamento</span>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content mb-0 b-0">
                                                        <div class="tab-pane fade" id="tab12">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row mb-3">
                                                                        <label class="col-md-3 col-form-label" for="codigo">Código</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" id="codigoEquipamento" name="codigoEquipamento" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-md-3 col-form-label" for="equipamento">Equipamento</label>
                                                                        <div class="col-md-9">                                    
                                                                            <select class="form-control select2" id="equipamento" name="equipamento" data-toggle="select2" onchange="capturaCodigo()">
                                                                                 <?php $cod = mysqli_query($con,"SELECT 'SELECIONE' FROM t0005 UNION SELECT ITEM_DESC_ITEM AS 'SELECIONE' FROM t0005"); 
                                                                                  while($_cod = mysqli_fetch_array($cod)){?>
                                                                                        <option><?php print utf8_encode($_cod['SELECIONE']); ?></option>
                                                                                  <?php } ?>
                                                                                  <option></option>
                                                                            </select>
                                                                        </div>  
                                                                    </div>
                                                                    
                                                                    <div class="row mb-3">
                                                                        <label class="col-md-3 col-form-label" for="quantidade">Quantidade</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" id="quantidade" name="quantidade" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end col -->
                                                            </div> <!-- end row -->
                                                        </div>

                                                        
                                                        <ul class="list-inline mb-0 wizard">
                                                        <li class="list-inline-item">
                                                            <a href="#" class="btn btn-success" onclick="adicionar_mercadorias()">Adicionar</a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#" class="btn btn-dark" onclick="fechar_pedido()">Fechar</a>
                                                        </li>
                                                        
                                                        <li class="list-inline-item float-end">
                                                            <a href="#" class="btn btn-success" onclick="novo_ped()">Novo</a>
                                                        </li>
                                                        <li class="list-inline-item float-end">
                                                            <a href="#" class="btn btn-danger" onclick="apagar()">Apagar</a>
                                                        </li>
                                                        <li class="list-inline-item float-end">
                                                            <a href="#" class="btn btn-info" onclick="imprimir_ped()">Imprimir</a>
                                                        </li><span> </span>
                                                    </ul>
                                    
                                                        <!--div class="float-end">
                                                            <input type='button' class='btn btn-success' name='next' value='Adicionar' />
                                                        </div>
                                                        <div class="float-start">
                                                            <input type='button' class='btn btn-danger' name='apagar' value='Apagar' />
                                                            <input type='button' class='btn btn-success' name='novo' value='Novo' />
                                                        </div-->
                                                        <br/><span><strong>TOTAL DESTE PEDIDO -</strong>  R$ <?php total($pedido);  ?></span>
                                                        <div class="clearfix"></div>

                                                    </div> <!-- tab-content -->
                                                </div> <!-- end #btnwizard-->
                                        </form>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div> 
                        <!-- end row -->


                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mb-3">Itens de pedido</h4>

                                        <form>
                                            <div id="progressbarwizard">

                                                <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                                    <li class="nav-item">
                                                        <a href="#finish-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                            <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                                            <span class="d-none d-sm-inline">Lista</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            
                                                <div class="tab-content b-0 mb-0">
                                                    <div class="tab-pane" id="finish-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="tabela">
                                                                             <div class="table-responsive">
                                                                                <table class="table table-centered table-nowrap mb-0"><!--  table-nowrap mb-0 -->
                                                                                    <thead class="table-light">
                                                                                        <tr>
                                                                                            <th>Quantidade</th>
                                                                                            <th>Descrição</th>
                                                                                            <th>Total</th>
                                                                                            <th style="width: 125px;">Ação</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                      <?php        while($_tab = mysqli_fetch_array($tab))
                                                                                                   {?>
                                                                                        <tr>
                                                                                            <td><a href="apps-ecommerce-orders-details.php; ?>" class="text-body fw-bold"><?php print $_tab['PED_ITEM_QTD_ITEM']; ?></a> </td>
                                                                                            <td>
                                                                                                <a><?php print utf8_encode($_tab['PED_ITEM_DESC_ITEM_PED']); ?></a>
                                                                                            </td>
                                                                                            <td>
                                                                                                <a><?php print $_tab['PED_ITEM_TOTAL_ITEM']; ?></a>
                                                                                            </td>
                                                                                            <td>
                                                                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                                                                <a href="javascript:void(0);" class="action-icon" onclick="apagar_item(v = '<?php print $_tab['PED_ITEM_DESC_ITEM_PED']; ?>')"> <i class="mdi mdi-delete"></i></a>
                                                                                            </td>
                                                                                        </tr><?php  }  ?>
                                                                                    </tbody>
                                                                                </table>
                                                                             </div>
                                                                          </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>
                                                </div> <!-- tab-content -->
                                            </div> <!-- end #progressbarwizard-->
                                        </form>

                                    </div> <!-- end card-body -->
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
                                <script>document.write(new Date().getFullYear())</script> © Indafire - Equipamentos Combate a Incendio
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


       <!-- BARRA DA DIREITA -->
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
        <!-- /End-bar -->


        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
         <script src="assets/js/script.js"></script>
        <script src="assets/js/micoxAjax.js"></script>

        <!-- demo app -->
        <script src="assets/js/pages/demo.form-wizard.js"></script>
        <!-- end demo js-->
        
    </body>

<!-- Mirrored from coderthemes.com/hyper_2/saas/form-wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:42:44 GMT -->
</html>
