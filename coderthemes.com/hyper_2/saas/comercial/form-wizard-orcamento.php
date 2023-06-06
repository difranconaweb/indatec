<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 31OUT22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 31OUT22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 31OUT22



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 01NOV22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 02NOV22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03NOV22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 04NOV22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 07NOV22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 08NOV22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 02FEV23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 07FEV23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 02MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 06MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 07MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 08MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 13MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 16MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 17MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 20MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 22MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 28MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 29MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 25ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 28ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 12MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';
require 'inc/conexao02.php';


        session_start();
        $usuario   = $_SESSION['usuario'];
        $code      = $_SESSION['id'];
        $data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $orcamento = $_REQUEST['orcamento']; // NUMERO DO ORÇAMENTO // 
   

        // ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
        $sql = mysqli_query($con,"SELECT funPrimNome,funCargo,funEmail,funFoto FROM funcionarios WHERE funCodigo = '$code'");
        while($obj = mysqli_fetch_array($sql))
        {
            $funNome  = $obj['funPrimNome']; // NOME DO USUARIO  //
            $funCargo = $obj['funCargo'];    // CARGO DO USUARIO //
            $funEmail = $obj['funEmail'];    // EMAIL DO USUARIO //
            $foto     = $obj['funFoto'];    // FOTO DO USUARIO //
        }
        // ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //


          // ## SE A VARIÁVEL PESQUISA VIER CARREGADA, ENTAO CARREGA ORÇAMENTO DA PESQUISA ## //
         if(empty($orcamento))
         {
                $sql = mysqli_query($con,"SELECT PED_NUM_PED,PED_COD_CLI FROM t0019");
                while($obj = mysqli_fetch_array($sql))
                {
                    $orcamento = $obj['PED_NUM_PED'];
                    $codigo    = $obj['PED_COD_CLI'];
                }
         }

         else
         {
              // ## BUSCANDO AS INFORMAÇÕES DO ORÇAMENTO ##  //
               $sql = mysqli_query($con,"SELECT PED_NUM_PED,PED_COD_CLI FROM t0019 WHERE PED_NUM_PED = '$orcamento'");
                while($obj = mysqli_fetch_array($sql))
                {
                    $orcamento = $obj['PED_NUM_PED'];
                    $codigo    = $obj['PED_COD_CLI'];
                } 

               // ## BUSCANDO O NOME DO CLIENTE ## //
               $cli = mysqli_query($con,"SELECT CLI_RAZ_SOC_CLI FROM t0013 WHERE CLI_COD_CLI = '$codigo'");
               while($cli3 = mysqli_fetch_array($cli))
               {
                   $nome = $cli3['CLI_RAZ_SOC_CLI']; // AQUI CARREGA O NOME DO CLIENTE //
               }
         }       
        
               // ## CARREGANDO O CLIENTE E SUAS INFORMAÇÕES NA TELA  ## //
                $cli = mysqli_query($con,"SELECT CLI_COD_CLI, CLI_RAZ_SOC_CLI, CLI_NON_FANT_CLI, CLI_END_CLI, CLI_NUM_END_CLI, CLI_BAI_CLI, CLI_CID_CLI, CLI_FONE_CLI, CLI_FONE2_CLI, CLI_CNPJ_CLI, CLI_INSC_EST_CLI, CLI_NOM_CONT_CLI, CLI_EMAIL_CONT_CLI FROM t0013 WHERE CLI_COD_CLI = '$codigo' OR CLI_RAZ_SOC_CLI = '$nome'");
                while($_cli = mysqli_fetch_array($cli))
                {
                      $codigo    = $_cli['CLI_COD_CLI'];
                      $razao     = $_cli['CLI_RAZ_SOC_CLI'];
                      $fantasia  = $_cli['CLI_NON_FANT_CLI'];
                      $endereco  = $_cli['CLI_END_CLI'];
                      $numero    = $_cli['CLI_NUM_END_CLI'];
                      $bairro    = $_cli['CLI_BAI_CLI'];
                      $cidade    = $_cli['CLI_CID_CLI'];
                      $fone      = $_cli['CLI_FONE_CLI'];
                      $cel       = $_cli['CLI_FONE2_CLI'];
                      $cnpj      = $_cli['CLI_CNPJ_CLI'];
                      $inscricao = $_cli['CLI_INSC_EST_CLI'];
                      $contato   = $_cli['CLI_NOM_CONT_CLI'];
                      $email     = $_cli['CLI_EMAIL_CONT_CLI'];
                }
       

        // ## BUSCANDO A CIDADE DO CLIENTE  ## //
        $cid = mysqli_query($con,"SELECT MUN_NOME_MUN FROM `t0027` WHERE MUN_COD_MUN = '$cidade'");
        while($_cid = mysqli_fetch_array($cid))
        {
             $cidade = $_cid['MUN_NOME_MUN'];
        }

        // ## QUERY PARA CARREGAR GRID ## //
        $tab = mysqli_query($con,"SELECT PED_ITEM_NUM_PED, PED_ITEM_COD_ITEM, PED_ITEM_DESC_ITEM_PED, PED_ITEM_QTD_ITEM, PED_ITEM_TOTAL_ITEM FROM t0020 WHERE PED_ITEM_NUM_PED = '$orcamento'");



        // ## FUNÇÃO PARA CARREGAR O VALOR TOTAL DO ORÇAMENTO NA TELA ## //
        function total($orcamento)
        {
             require 'inc/conexao.php';

             // ## QUERY PARA CARREGAR GRID ## //
             $tab = mysqli_query($con,"SELECT sum(PED_ITEM_TOTAL_ITEM) AS TOTAL FROM t0020 WHERE PED_ITEM_NUM_PED = '$orcamento'");
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
            // ## ROTINA PARA APAGAR ITEM DE ORÇAMENTO ## //
            function apagar_item_orcamento()
            { 
                 var orcamento = document.getElementById('numero').value;
 
                 createRequest();
                 var url = "apagar_item_orcamento.php?orcamento="+escape(orcamento);
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
                               setTimeout(function(){document.getElementById("excessao").innerHTML = ""},2000);
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

          
           

            // ## FUNÇÃO PARA APAGAR ITEM DO ORÇAMENTO ## //
            function apagar_item(v)
            {    var descricao = v; // RECEBENDO O VALOR QUE VEM DO PARAMETRO PARA CARREGAR NA FUNÇÃO APÓS A JANELA ALERTA //
                 var numero    = document.getElementById('numero').value;
                 $("#delete-item-alert-modal").modal("toggle");
                 createRequest();
                 var url = "memo_apagar.php?descricao="+escape(descricao)+"&numero="+escape(numero);
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
            // ## FINAL DE ROTINA ## //


            // ## BUSCAR CLIENTE PARA O ORCAMENTO ## //
            function buscarCustomer()
            {
                var email     = document.getElementById('email').value;
                var nome      = document.getElementById('nomeCli').value;
                var ccli      = document.getElementById('codigoCli').value;
                var codigo    = document.getElementById('codigo').value;
                var numero    = document.getElementById('numero').value;
                var param     = 1;
                window.location.href = "pesquisa-cliente.php?pesquisa="+escape(nome)+"&codigo="+escape(codigo)+"&ccli="+escape(ccli)+"&numero="+escape(numero)+"&email="+escape(email)+"&param="+escape(param);
            }


            // ## ROTINA PARA BUSCAR NUMERO DE ORÇAMENTO ## //
            function buscarOrc()
            {
                var numero = document.getElementById('top-search').value;
                var email  = document.getElementById('email').value;

                // VALIDAÇÃO DE CAMPO //
                if(numero == "")
                {
                    alert("ATENÇÃO..: O CAMPO COM O NUMERO DO ORÇAMENTO ESTÁ VÁZIO");
                }
                // ## PONTEIRO PARA O ARQUIVO QUE SALVA O NUMERO DO ORÇAMENTO NA TABELA PARA A PESQUISA AO CARREGAR A TELA ## //
                window.location.href="pesquisa-orcamento.php?pesquisa="+escape(numero)+"&email="+escape(email);

            }

            // ## LIMPAR CAMPOS DE FORM DE PESQUISA  ## //
            function limpar()
            {
                document.getElementById("nomeCli").value   = "";
                document.getElementById("codigoCli").value = "";
            }


            // ## COLEÇÃO DE ROTINAS PARA CRIAR NOVO ORÇAMENTO  ## //
            function novo_orcamento() // CHAMADA DE ALERT NA TELA
            {
                $("#budget-alert-modal").modal("toggle");
            }

           
            function novo_orc()
            {
                window.location.href="novo-orcamento.php?orcamento="+escape(1);
            }
            // ## FINAL DE COLEÇÃO ROTINAS NOVO ORÇAMENTO ## //
  
        </script>
        
    </head>

    <body onload="load()" class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":true,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== INICIO DA BARRA LATERAL ESQUERDA ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="index.php" class="logo text-center logo-light">
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
                                    <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-orcamento.php">Voltar lista</a>
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
                                    <a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/cadastros/form-advanced.php">Equipamentos</a><!-- form-advanced.html  -->
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

<!--  ##############################################################################################################################################################################################  -->
                <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE NOVO ORÇAMENTO ##### -->
                <!-- ALERTA MODAL DE AVISO -->
                <div id="budget-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-warning h1 text-warning"></i>
                                    <h4 class="mt-2">Deseja abrir um novo orçamento?</h4>
                                    
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="novo_orc()">Sim</button>
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
                                    <h4 class="mt-2">Deseja apagar este orçamento?</h4>
                                    
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="apagar_orcamento()">Sim</button>
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Não</button>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
<!--  ##############################################################################################################################################################################################  -->


<!--  ##############################################################################################################################################################################################  -->
                <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE APAGAR ITEM DE ORÇAMENTO ##### -->
                <!-- ALERTA MODAL DE AVISO -->
                <div id="delete-item-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-warning h1 text-warning"></i>
                                    <h4 class="mt-2">Deseja apagar este item?</h4>
                                    
                                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="apagar_item_orcamento()">Sim</button>
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
                                        <input type="text" class="form-control" placeholder="Pesquisar..." aria-label="Nome de usuário">
                                    </form>
                                </div>
                            </li>
                            

                           
                         
                            <li class="notification-list">
                            </br>
                                <button class="input-group-text end-bar-toggle btn-primary" type="button">Buscar Cliente</button>
                                <!--a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                    <i class="dripicons-gear noti-icon"></i>
                                </a-->
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="<?php  print $foto; ?>" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name"><?php print $funNome; ?></span>
                                        <span class="account-position"><?php print $funCargo; ?></span>
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
                                    <input type="text" class="form-control dropdown-toggle"  placeholder="Pesquisar orçamento..." id="top-search">&emsp;
                                    <span class="mdi mdi-magnify search-icon"></span>
                                    <button class="input-group-text btn-primary" type="submit" onclick="buscarOrc()">Pesquisar</button>&emsp;
                                </div>
                            </form>
                        </div> 
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- INICIO DE TITULO DE PAGINA -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Indafire</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Comercial</a></li>
                                            <li class="breadcrumb-item active">Orçamento</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Formulário Orçamento nº <?php print $orcamento; ?></h4><span id="excessao"></span>
                                </div>
                            </div>
                        </div>     
                        <!-- FINAL DE TITULO DE PAGINA --> 

                       

<!-- ########################################################################################################################################## -->
                       <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mb-3">Cadastro Basico</h4>

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


                                                                <!--div style="height: 165px;" class="card">
                                                                <div class="card-body table-responsive p-0">
                                                                <table border="1" id="table" class="table table-head-fixed text-nowrap"-->
                                                                        <div class="row mb-3">
                                                                            <label class="col-md-3 col-form-label" for="Razao">Razao Social</label>
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
                                                                                <input type="text" id="fantasia" name="fantasia" class="form-control" value="<?php print utf8_encode($fantasia); ?>">
                                                                            </div>
                                                                            <label class="col-md-1 col-form-label" for="Codigo"> Cód.</label>
                                                                            <div class="col-md-2">
                                                                                <input type="text" id="codex" name="codex" class="form-control" value="<?php print $codigo ?>">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="row mb-3">
                                                                            <label class="col-md-3 col-form-label" for="cnpj">CNPJ</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" id="cnpj" name="cnpj" class="form-control" value="<?php print $cnpj ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label class="col-md-3 col-form-label" for="estadual">Estadual</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" id="estadual" name="estadual" class="form-control" value="<?php print $inscricao ?>">
                                                                            </div>
                                                                        </div>
                                                                </table>
                                                                    <!--/div></div--> 
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="tab-pane" id="basictab2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="logradouro"> Logradouro</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="logradouro" name="logradouro" class="form-control" value="<?php print utf8_encode($endereco); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="numero"> Numero</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="numero" name="numero" class="form-control" value="<?php print $numero ?>">
                                                                    </div>
                                                                </div>
                                        
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="bairro">Bairro</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="bairro" name="bairro" class="form-control" value="<?php print utf8_encode($bairro); ?>">
                                                                    </div>
                                                                </div>
                                                                 <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="cidade">Cidade</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="cidade" name="cidade" class="form-control" value="<?php print utf8_encode($cidade); ?>">
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
                                                                        <input type="text" id="contato" name="contato" class="form-control" value="<?php print utf8_encode($contato); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="mail"> Email</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="email" name="email" class="form-control" value="<?php print $email ?>">
                                                                    </div>
                                                                </div>
                                        
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="telefone">Telefone</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="telefone" name="telefone" class="form-control" value="<?php print $fone ?>">
                                                                    </div>
                                                                </div>
                                                                 <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="celular">Celular</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="celular" name="Celular" class="form-control" value="<?php print $cel ?>">
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <!--ul class="list-inline wizard mb-0">
                                                        <li class="previous list-inline-item">
                                                            <a href="#" class="btn btn-info">Buscar Cliente</a>
                                                        </li>
                                                        <li class="next list-inline-item float-end">
                                                            <a href="#" class="btn btn-info">Próximo</a>
                                                        </li>
                                                    </ul-->
                                                </div> <!-- tab-content -->
                                            </div> <!-- end #basicwizard-->
                                        </form>                         
                                    </div>            
                                </div>                              
                            </div>
                       
<!-- ########################################################################################################################################## -->
                       <div class="col-xl-6">
                          <div class="card">
                             <div class="card-body">
                                <h4 class="header-title mb-3">Progresso de Orçamento</h4>

                                   <form>
                                       <div id="progressbarwizard">
                                       <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                          <li class="nav-item">
                                             <a href="#account-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                  <span class="d-none d-sm-inline">Equipamento</span>
                                             </a>
                                          </li>
                                       </ul>


                                       <div class="tab-content b-0 mb-0">
                                                 <script>

                                                         
                                                 </script>
                                                    <!--div id="bar" class="progress mb-3" style="height: 7px;">
                                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                                                    </div-->
                                           
                                                    <!--div class="tab-pane" id="account-2"-->
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="codigo">Codigo</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" id="codigoEquipamento" name="codigoEquipamento">
                                                                    </div>
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
                                                                    </div> <!-- end col -->








                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="quantidade">Quantidade</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="quantidade" name="quantidade" class="form-control" value="" placeholder="-----">
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    <!--/div-->



                                                    <ul class="list-inline mb-0 wizard">
                                                        <li class="list-inline-item">
                                                            <a href="#" class="btn btn-success" onclick="adicionar_mercadorias()">Adicionar</a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#" class="btn btn-dark" onclick="gerar()">Gerar Pedido</a>
                                                        </li>
                                                        <li class="list-inline-item float-end">
                                                            <a href="#" class="btn btn-success" onclick="novo_orcamento()">Novo</a>
                                                        </li>
                                                        <li class="list-inline-item float-end">
                                                            <a href="#" class="btn btn-danger" onclick="apagar()">Apagar</a>
                                                        </li><span> </span>
                                                    </ul>
                                                   <br/><span><strong>TOTAL DESTE ORÇAMENTO -</strong>  R$ <?php total($orcamento);  ?></span>
                                                </div> <!-- tab-content -->
                                            </div> <!-- end #progressbarwizard-->
                                        </form>
                                       </div>
                       </div>

<!-- ########################################################################################################################################## -->

                       <div class="row">
                             <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                              
                                                        <div class="tab-content b-0 mb-0">

                                                                  <div class="tabela">
                                                                     <div class="table-responsive">
                                                                        <table class="table table-centered table-nowrap mb-0"><!--  table-nowrap mb-0 -->
                                                                            <thead class="table-light">
                                                                                <tr>
                                                                                    <th>Quantidade</th>
                                                                                    <th>Código</th>
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
                                                                                        <a><?php print $_tab['PED_ITEM_COD_ITEM']; ?></a>
                                                                                    </td>
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
                                                        </div>



                                         
                                    </div>
                                </div>   
                             </div>
                       </div>
<!-- ########################################################################################################################################## -->






                             </div>
                          </div>
                       </div>
                       </div><!-- CONTAINER -->
                    </div><!-- CONTENT -->



<!-- ########################################################################################################################################## -->
                <!-- INICIO DE RODAPÉ -->
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
                <!-- FINAL DE RODAPÉ -->
            </div>

            <!-- ============================================================== -->
            <!-- FINAL DE CONTEÚDO DE PÁGINA -->
            <!-- ============================================================== -->


        </div>
        <!-- FINAL wrapper -->


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