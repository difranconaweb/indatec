<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 15MAI23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 15MAI23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 15MAI23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 16MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 17MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 19MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 22MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 25MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 26MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 29MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 30MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 31MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



session_start();
$usuario = $_SESSION['usuario']; // NOME DO USUARIO //
$codigo  = $_SESSION['id'];      // CODIGO DO USUARIO //
$data    = Date('d/m/Y'); // DATA  ATUAL //
$hora    = Date('H:i:s'); // HORA ATUAL //
$tabela  = $usuario.$codigo; // CRIANDO VARIÁVEL COM NOME DE TABELA DE USUARIO //

//#########################################################################################//
// ###  ARQUIVO DE CADASTRO E CONTAGEM DE HORAS FUNCIONARIOS     - SISTEMA DE INDATEC  ### //
//#########################################################################################//


// ## CONVERTENDO A DATA EM LITERAL ## //
 $mes = substr($data,3,-5);


  // ## ROTINA DE SWITCH PARA CARREGAR A DATA DO MES EM LITERAL ## //
         switch($mes)
         {
              case "01":
                $mes = 'JAN';
              break;

              case "02":
                $mes = 'FEV';
              break;

              case "03":
                $mes = 'MAR';
              break;

              case "04":
                $mes = 'ABR';
              break;

              case "05":
                $mes = 'MAI';
              break;

              case "06":
                $mes = 'JUN';
              break;

              case "07":
                $mes = 'JUL';
              break;

              case "08":
                $mes = 'AGO';
              break;

              case "09":
                $mes = 'SET';
              break;

              case "10":
                $mes = 'OUT';
              break;

              case "11":
                $mes = 'NOV';
              break;

              case "12":
                $mes = 'DEZ';
              break;
              default:
              print "Não consta mês : erro ";
         }
        // ## FINAL DE SWITCH ## //
;



// ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
$_sql = mysqli_query($con,"SELECT funPrimNome,funCargo,funFoto FROM funcionarios WHERE funCodigo = '$codigo'");
while($_obj = mysqli_fetch_array($_sql))
{
    $nome  = $_obj['funPrimNome']; // NOME DO USUARIO //
    $cargo = $_obj['funCargo'];    // CARGO DO USUARIO //
    $foto  = $_obj['funFoto'];     // FOTO DO USUARIO //
}
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //

// ## BUSCANDO NA TABELA DE USUARIO SE CONSTA O FUNCIONARIO PESQUISADO ## ///
$fu = mysqli_query($con,"SELECT coringa01 FROM $tabela");
while($fu3 = mysqli_fetch_array($fu))
{
    $coringa01 = $fu3['coringa01'];
}
// ## FINAL DE BUSCA E VALOR PESQUISADO ## //

// ## BUSCANDO O NOME DO FUNCIONARIO PARA CARREGAR NO FRONT ## //
$fu_ = mysqli_query($con,"SELECT funCodigo,funNome FROM funcionarios WHERE funCodigo = '$coringa01'");
while($fu4 = mysqli_fetch_array($fu_))
{
    $matricula   = $fu4['funCodigo'];
    $funcionario = $fu4['funNome']; 
}

// ## ROTINA PARA CARREGAR A LISTA DOS REGISTROS- GRID LATERAL ## //
$list = mysqli_query($con,"SELECT * FROM carga_horaria WHERE carFuncionario = '$funcionario' ORDER BY carCodigo DESC");
// ##       FINAL DE GRID LATERAL LISTA DE REGISTROS         ## //

$ref = mysqli_query($con,"SELECT carEmpregado,carMes,carAno,carExtras,carFinalExtras,carAtrasos,carFinalAtrasos,carResponsavel FROM carga_referencia WHERE carMes = '$mes'");


// ## VERIIFICA SE CONSTA CARGA NA TABELA DE NOMES DO MES ## //
// ## SE HÁ CARGA, ENTAO NÃO CARREGA, MAS SE ESTIVER EM BRANCO, CARREGA TODOS OS NOMES ## //
 $nom = mysqli_query($con,"SELECT nome,mes FROM nome_do_mes");
 while($nom3 = mysqli_fetch_array($nom))
 {
     $nName = $nom3['nome'];
     $nMes  = $nom3['mes'];
 }

 // ## VERIFICA SE A TABELA ESTÁ VÁZIA ... SE ESTIVER VÁZIA CARREGA TODOS OS FUNCIONARIOS ## //
 if(empty($nName))
 {
    // ## LIMPA A TABELA CASO HAJA ALGUM REGISTRO E DEPOIS RECARREGA ## //
    mysqli_query($con,"TRUNCATE nome_do_mes");

    // ## BUSCANDO NOME PARA FAZER A RECARGA ## //
    $fun = mysqli_query($con,"SELECT funNome FROM funcionarios");
    while($_fun = mysqli_fetch_array($fun))
    {
        $nNome = $_fun['funNome'];

        // ## INSERINDO OS NOMES NA TABELA DE NOMES DO MES ## //
        mysqli_query($con,"INSERT INTO nome_do_mes (nome,mes) VALUES ('$nNome','$mes')");
    }
 }

 else
 {// ## SE ESTIVER CARREGADO NÃO TEM AÇAO ## //
     $nName = $nName;
 }

?>

<!DOCTYPE html>
    <html lang="en">

    
<!-- Mirrored from coderthemes.com/hyper_2/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:40:28 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Sistema Indatec<?php print $franco ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta content="Indafire Equipamentos de Combate a Incendios" name="description" />
        <meta content="Indafire" name="Franco V. Morales" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logoMenor.png"/>

        <!-- third party css -->
        <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
        <script type="text/javascript">
            // ## APAGANDO REGISTRO QUE FOI INSERIDO NA GRID MAIOR ## //
            function apagarRegistro()
            {
                 let id = document.getElementById('apagar').value;
                 window.location.href = "apagar-registro.php?numero="+escape(id);   
            }
            // ## FINAL DE ROTINA  ## //

            // ROTINA PARA APAGAR O RELATORIO COMPLETO DO EMPREGADO //
            function apagarRelatCompleto()
            { 
                 let empregado = document.getElementById('employeer').value;
                 let mes       = document.getElementById('month').value;
                 window.location.href = "apagar-relatorio.php?empregado="+escape(empregado)+"&mes="+escape(mes);   
            }
            // FINAL DE ROTINA APAGAR RELATORIO COMPLETO //


            // ## BUSCAR FUNCIONÁRIO ## //
            function buscarFuncionario()
            {
                let nome   = document.getElementById('nomeFun').value;
                window.location.href = "pesquisa-funcionario.php?nome="+escape(nome);
            }
            // # FINAL BUSCA FUNCIONARIO ## //

            // ## FUNÇÃO PARA SELECIONAR O MÊS E CARREGAR OS FECHAMENTOS COM O MES SELECIONADO ## //
            function buscarPeloMes()
            {
                alert("ROTINA EM CONSTRUÇÃO");
            }
            // ## FINAL DE FUNÇÃO DE SELECIONAR MES E BUSCAR FECHAMENTO DE PONTOS ## //

            // ## INICIO DE ROTINA PARA APAGAR REGISTRO ## //
            function del(v)
            {
                $("#delete-alert-modal").modal("toggle");
                document.getElementById('apagar').value = v;
            }

            // ## ROTINA PARA REMOVER O RELATORIO COMPLETO DA TABELA DE REFERENCIA ## //
            function delRelatorio(c,m)
            {
                $("#delRelatorio-alert-modal").modal("toggle");
                let empregado = document.getElementById('employeer').value = c;
                let mes       = document.getElementById('month').value = m;
              ///  window.location.href = "apagar-relatorio.php?empregado="+escape(empregado)+"&mes="+escape(mes);
            }
            // ## FINAL DE ROTINA DELETE RELATORIO DA TABELA REFERENCIA ## //



            // ## ROTINA PARA DESLOGAR USUARIO ## //
            function deslogar()
            {
                $("#sair-alert-modal").modal("toggle");
            }
            // ## FINAL DE ROTINA DESLOGAR ## //

            // ## FUNÇÃO PARA EDITAR REGISTRO DA GRID ## //
            function edit(e)
            {
                $("#editar-alert-modal").modal("toggle");
                document.getElementById('editar').value = e;
                
            }
            // ## FINAL DE FUNÇÃO EDITAR REGISTRO GRID ## //
            function editarForm()
            {
        
            }
            // ## FUNÇÃO PARA CARREGAR A GRID DOS REGISTROS DE PONTO ## //


            // ## FINAL DE FUNÇÃO QUE CARREGA OS REGISTROS DE PONTO ## //


            // ## FUNÇÃO PARA EDITAR RELATÓRIO DO COLABORADOR ## //
            function editRelatorio(nr,mr)
            {
                $("#editRelatorio-alert-modal").modal("toggle");
                var empregado = document.getElementById('employeer').value = nr;
                var mes = document.getElementById('month').value = mr;
                window.location.href = "editar-relatorio.php?empregado="+escape(empregado)+"&mes="+escape(mes);
            }
            // ## FINAL DE ROTINA PARA EDITAR RELATORIO ## //

            // ## ROTINA PARA MENSAGEM DE ALERTA ENCERRAR ## //
            function encerrar()
            {   
                $("#finalizar-alert-modal").modal("toggle");
            }
            // ## FINAL DE ROTINA PARA MENSAGEM DE FINALIZAR ## //


            // ## ENCERRANDO COLEÇAO REGISTRO FUNCIONARIO ## //
            function finalizar()
            {
                let empregado = document.getElementById('empregado').value;
                let matricula = document.getElementById('matricula').value;
                let data      = document.getElementById('data').value;
                window.location.href = "encerrar-registro.php?empregado="+escape(empregado)+"&matricula="+escape(matricula);

            }
            // ## FINAL DE ROTINA PARA ENCERRAR REGISTROS ## //

            // ## ROTINA PARA SALVAR O REGISTRO  - LINHA ## //
             function gravar()
             {
                    let entrada   = document.getElementById('entrada').value;
                    let entradain = document.getElementById('alEntrada').value;
                    let saidain   = document.getElementById('alSaida').value;
                    let saida     = document.getElementById('saida').value;
                    let empregado = document.getElementById('empregado').value;
                    let matricula = document.getElementById('matricula').value;
                    let data      = document.getElementById('data').value;
                   
                    // COLEÇÃO DE VALIDAÇÕES //
                    if(entrada == '')
                    {
                        document.getElementById('excessao').innerHTML = "<div class='alert alert-danger excessao-funcionario'>ATENÇÃO: O CAMPO DE HORÁRIO ENTRADA DEVE SER PREENCHIDO </div>";
                        setTimeout(function(){document.getElementById('excessao').innerHTML = "";},2000);
                    }

                    else if(entradain == '')
                    {
                        document.getElementById('excessao').innerHTML = "<div class='alert alert-danger excessao-funcionario'>ATENÇÃO: O CAMPO DE HORÁRIO ENTR ALMOÇO DEVE SER PREENCHIDO </div>";
                        setTimeout(function(){document.getElementById('excessao').innerHTML = "";},2000);
                    }

                    else if(saidain == '')
                    {
                        document.getElementById('excessao').innerHTML = "<div class='alert alert-danger excessao-funcionario'>ATENÇÃO: O CAMPO DE HORÁRIO SAIDA ALMOÇO DEVE SER PREENCHIDO </div>";
                        setTimeout(function(){document.getElementById('excessao').innerHTML = "";},2000);
                    }

                    else if(saida == '')
                    {
                        document.getElementById('excessao').innerHTML = "<div class='alert alert-danger excessao-funcionario'>ATENÇÃO: O CAMPO DE HORÁRIO DA SAIDA DEVE SER PREENCHIDO </div>";
                        setTimeout(function(){document.getElementById('excessao').innerHTML = "";},2000);
                    }

                    else
                    {
                        // ## ENVIANDO OS CAMPOS CARREGADOR PARA SALVAR NA TABELA ## //
                        window.location.href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/RH/salva-carga.php?entrada="+escape(entrada)+"&entradain="+escape(entradain)+"&saidain="+escape(saidain)+"&saida="+escape(saida)+"&empregado="+escape(empregado)+"&matricula="+escape(matricula)+"&data="+escape(data);
                    }
             }
            // ## FINAL DE ROTINA SALVAR LINHA //

             // ## ROTINA PARA SALVAR O REGISTRO ALTERADO ## //
             function gravar_editar()
             { 
                    let entrada      = document.getElementById('entradaedit').value;
                    let almocoin     = document.getElementById('almocoinn').value;
                    let almocoout    = document.getElementById('almocooutt').value;
                    let intervaloin  = document.getElementById('intervaloin').value;
                    let intervaloout = document.getElementById('intervaloout').value;
                    let saidaedit    = document.getElementById('saidaedit').value;
                    let editar       = document.getElementById('editar').value;


                    // ## ENVIANDO OS CAMPOS CARREGADOR PARA EDITAR O REGISTRO NA TABELA ## //
                   window.location.href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/RH/edita-carga.php?entrada="+escape(entrada)+"&almocoin="+escape(almocoin)+"&almocoout="+escape(almocoout)+"&intervaloin="+escape(intervaloin)+"&intervaloout="+escape(intervaloout)+"&saidaedit="+escape(saidaedit)+"&editar="+escape(editar);
             }
            // ## FINAL DE ROTINA EDITAR REGISTRO //

            // ## MASCARA PARA O HORARIO DIGITADO ## //
            function mascaraHora(campoPassado, mascara)
            {
                var campo = campoPassado.value.length;
                var saida = mascara.substring(0,1);
                var texto = mascara.substring(campo);
                if(texto.substring(0,1) != saida)
                {
                   campoPassado.value += texto.substring(0,1);
                }
            }


            // ## INICIO DE FUNÇÃO SAIR DO SISTEMA ## //
            function sim_sair()
            {
                var codigo = document.getElementById('codigo').value;
                var nome   = document.getElementById('nome').value;
                window.location.href="http://www.indafire.ind.br/indatec/login/memoEncerrar.php?id="+escape(codigo)+"&usuario="+escape(nome);
            }
            // ## FINAL DE FUNÇÃO SAIR DO SISTEMA ## //

        </script>
  
<style type="text/css">
   #inicio-frame {position:relative;display:block;width:100%;height:95%;border-style:none;border-radius:08px;background-color: #FFFFFF;box-shadow:5px 5px 5px rgba(0,0,0,0.5);padding:5px;overflow-y:none;overflow-x:none;}
   #inicio-historico {position:absolute;display:block;width:96%;height:75%;border-style:none;background-color: #FFFFFF;box-shadow:5px 5px 5px rgba(0,0,0,0.5);padding:5px;overflow-y:scroll;overflow-x:scroll;}
   .frame-interno { position: sticky; top:0;} /*position:absolute;width:90%;height:20%;border-style: none;background-color: #D3D3D3; */

   .tableFixHead   {overflow: auto;height: 50px;}
   .tableFixHead thead th {position:sticky;top:0; z-index: 1; color:#FFFFFF; background-color: #0000FF;}
   
   table {border-collapse: collapse;width: 100%}
   th,td {padding:8px 16px;}
   th {background:#eee;}

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
                    <!-- ALERTA MODAL DE AVISO -->
                    <div id="sair-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE SAIR DO SISTEMA ##### -->
                    <!-- ALERTA MODAL DE AVISO -->
                    <div id="finalizar-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1 text-warning"></i>
                                        <h4 class="mt-2">Atenção - Deseja finalizar o mês para este colaborador ?</h4>
                                        
                                        <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="finalizar()">Sim</button>
                                        <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Não</button>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
<!--  ##############################################################################################################################################################################################  -->


<!--  ##############################################################################################################################################################################################  -->
                    <!-- ATENÇÃO - ATENÇÃO - AQUI É O ALERTA PARA INFORMAR SE O EMPREGADO FOI SELECIONADO ##### -->
                    <!-- ALERTA MODAL DE AVISO -->
                    <div id="alerta-finalizar-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1 text-warning"></i>
                                        <h4 class="mt-2">Atenção - Não foi selecionado o colaborador !!!</h4>
                                        
                                        <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Ok</button>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
<!--  ##############################################################################################################################################################################################  -->



<!--  ##############################################################################################################################################################################################  -->
                    <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE APAGAR O REGISTRO DA GRID ##### -->
                    <!-- ALERTA MODAL DE AVISO -->
                    <div id="delete-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1 text-warning"></i>
                                        <h4 class="mt-2">Atenção - Deseja apagar este registro ?</h4>
                                        
                                        <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="apagarRegistro()">Sim</button>
                                        <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Não</button>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
<!--  ##############################################################################################################################################################################################  -->


<!--  ##############################################################################################################################################################################################  -->
                    <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE APAGAR O RELATORIO COMPLETO ##### -->
                    <!-- ALERTA MODAL DE AVISO -->
                    <div id="delRelatorio-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1 text-warning"></i>
                                        <h4 class="mt-2">Atenção - Deseja apagar o relatório deste empregado ?</h4>
                                        <!--input type="hidden" name="empregado" id="empregado">
                                        <input type="hidden" name="mes" id="mes"-->
                                        
                                        <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="apagarRelatCompleto()">Sim</button>
                                        <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Não</button>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
<!--  ##############################################################################################################################################################################################  -->


<!--  ##############################################################################################################################################################################################  -->
                    <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE APAGAR O REGISTRO DA GRID ##### -->
                    <!-- ALERTA MODAL DE AVISO -->
                    <div id="editar-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1 text-warning"></i>
                                        <h4 class="mt-2">Entrada</h4>
                                        <input type="tex" name="entradaedit" id="entradaedit" onkeypress="mascaraHora(this,'##:##')" placeholder="hora entrada">
                                        <input type="hidden" name="editar" id="editar">

                                        <h4 class="mt-2">Almoço</h4>
                                        <input type="tex" name="almocoinn" id="almocoinn" onkeypress="mascaraHora(this,'##:##')" placeholder="entrada almoço">

                                        <h4 class="mt-2">Almoço</h4>
                                        <input type="tex" name="almocooutt" id="almocooutt" onkeypress="mascaraHora(this,'##:##')" placeholder="saida almoço">

                                        <h4 class="mt-2">Intervalo</h4>
                                        <input type="tex" name="intervaloin" id="intervaloin" onkeypress="mascaraHora(this,'##:##')" placeholder="entrada intervalo">

                                        <h4 class="mt-2">Intervalo</h4>
                                        <input type="tex" name="intervaloout" id="intervaloout" onkeypress="mascaraHora(this,'##:##')" placeholder="saida intervalo">

                                         <h4 class="mt-2">Saida</h4>
                                        <input type="tex" name="saidaedit" id="saidaedit" onkeypress="mascaraHora(this,'##:##')" placeholder="hora saida">
                                        
                                        <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="gravar_editar()">Gravar</button>
                                        <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
<!--  ##############################################################################################################################################################################################  -->


<!--  ##############################################################################################################################################################################################  -->
                    <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE EDITAR O RELATORIO COMPLETO DO FUNCIONÁRIO ##### -->
                    <!-- ALERTA MODAL DE AVISO -->
                    <div id="editRelatorio-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1 text-warning"></i>
                                        <h4 class="mt-2">Atenção - Ao continuar com esta opção voce vai apagar o relatorio feito e carregará um novo com os registros que foram inseridos na grid abaixo.. continuar??</h4>
                                        <!--input type="hidden" name="empregado" id="empregado">
                                        <input type="hidden" name="mes" id="mes"-->
                                        
                                        <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="editarForm()">Sim</button>
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
                                        <span id="codigo" class="account-user-name"><?php print $nome; ?></span>
                                        <span id="nome" class="account-position"><?php print $cargo; ?></span>
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
                                    <h4 class="page-title">Formulário para Registro Carga Horária</h4>
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
                                                <div class="mb-6 row col-sm-6">
                                                        <select class="form-select form-select-sm " id='nomeFun' name="nomeFun" onchange="buscarFuncionario()">
                                                           <option id="SELECIONE">SELECIONE O FUNCIONARIO</option>
                                                           <?php 
                                                                // ## SELECT PARA CARREGAR A LISTA DE FUNCIONÁRIO ## //
                                                                 $cli = mysqli_query($con,"SELECT nome FROM nome_do_mes");
                                                                 while($cli3 = mysqli_fetch_array($cli))
                                                                 {  
                                                                   ?><option><?php print utf8_encode($cli3['nome']); // AQUI CARREGA O NOME DO FUNCIONÁRIO //
                                                                 } ?>
                                                           </option>
                                                        </select></br></br>
                                                        <label for="funcionario" class="form-label" style="color:#0000FF;"><strong>Funcionário..:</strong><?php print " ".$funcionario ?><label><!-- text-muted fw-normal mt-0 -->
                                                </div></br>
                                                <input type="hidden" id="empregado" name="empregado" value="<?php print $funcionario ?>">
                                                <input type="hidden" id="matricula" name="matricula" value="<?php print $matricula ?>">
                                                <input type="hidden" id="employeer" name="employeer">
                                                <input type="hidden" id="month" name="month">
                                                <input type="hidden" id="apagar" name="apagar">
                                               
                                                <form class="d-flex">
                                                    <div class="input-group">
                                                        <div class="row g-2"> 
                                                            <div class="mb-3 col-md-4">
                                                                <label for="data" class="form-label">Data.</label>
                                                                <input type="date" id="data" class="form-control form-control-light">
                                                            </div>                                                                
                                                            <div class="mb-3 col-md-4">
                                                                <label for="entrada" class="form-label">Entrada</label>
                                                                <input type="text" id="entrada" class="form-control form-control-light" onkeypress="mascaraHora(this,'##:##')" placeholder='00:00'>
                                                            </div>

                                                            <div class="mb-3 col-md-4">
                                                                <label for="almoco entrada" class="form-label">Almoço Entr.</label>
                                                                <input type="text" id="alEntrada" class="form-control form-control-light" onkeypress="mascaraHora(this,'##:##')" placeholder='00:00'>
                                                            </div>
                                                        </div>

                                                        <div class="row g-2">                                                                 
                                                            <div class="mb-3 col-md-6">
                                                                <label for="almoco saida" class="form-label">Almoço Saida</label>
                                                                <input type="text" id="alSaida" class="form-control form-control-light" onkeypress="mascaraHora(this,'##:##')" placeholder='00:00'>
                                                            </div>

                                                            <div class="mb-3 col-md-6">
                                                                <label for="saida" class="form-label">Saida</label>
                                                                <input type="text" id="saida" class="form-control form-control-light" onkeypress="mascaraHora(this,'##:##')" placeholder='00:00'>
                                                            </div>
                                                        </div>
                                                        &nbsp;&nbsp;
                                                        <button type="button" class="btn btn-success my-2" data-bs-dismiss="modal" onclick="gravar()">Inserir</button>&nbsp;&nbsp;
                                                        <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal" onclick="encerrar()">Finalizar</button>
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
                                            <div id="inicio-frame" class="card widget-flat">
                                                <div class="card-body">
                                                    <a class="btn btn-sm btn-link float-end"><select name="buscarMes" id="buscarMes" onchange="buscarPeloMes()"><option id="SELECIONE">Selecione</option>
                                                           <?php 
                                                                // ## SELECT PARA CARREGAR A LISTA DE FUNCIONÁRIO ## //
                                                                 $m3s = mysqli_query($con,"SELECT distinct carMes FROM carga_referencia");
                                                                 while($_m3s = mysqli_fetch_array($m3s))
                                                                 {  
                                                                   ?><option><?php print utf8_encode($_m3s['carMes']); // AQUI CARREGA O NOME DO FUNCIONÁRIO //
                                                                 } ?>
                                                           </option></select></a><!--<i class="mdi mdi-download ms-1"></i> -->
                                                    
                                                        <h4 class="header-title mt-2 mb-3">Lista dos Registros</h4>
                                                          <div id="inicio-historico"><!--- class="tableFixHead" -->
                                                              <table  class="table tableFixHead table-centered  table-nowrap table-bordered table-responsive table-hover table-striped mb-0"><!--  table-nowrap table-bordered -->
                                                                  <thead class="thead-dark">
                                                                    <tr>
                                                                        <th>
                                                                           <h5 class="font-14 my-1 fw-normal"><strong>Colaborador</strong></h5>
                                                                        </th>
                                                                        <th>
                                                                           <h5 class="font-14 my-1 fw-normal"><strong>Mês</strong></h5>
                                                                        </th>
                                                                        <th>
                                                                           <h5 class="font-14 my-1 fw-normal"><strong>Ano</strong></h5>
                                                                        </th>
                                                                        <th>
                                                                            <h5 class="font-14 my-1 fw-normal"><strong>Total Extras</strong></h5>
                                                                        </th> 
                                                                        <th>
                                                                            <h5 class="font-14 my-1 fw-normal"><strong>Final Extras</strong></h5>
                                                                        </th>
                                                                        <th>
                                                                            <h5 class="font-14 my-1 fw-normal"><strong>Total Atrasos</strong></h5>
                                                                        </th>
                                                                        <th>
                                                                            <h5 class="font-14 my-1 fw-normal"><strong>Final Atrasos</strong></h5>
                                                                        </th>
                                                                        <th>
                                                                            <h5 class="font-14 my-1 fw-normal"><strong>Responsável</strong></h5>
                                                                        </th>
                                                                        <th> 
                                                                            <h5 class="font-14 my-1 fw-normal"><strong>Ação</strong></h5>
                                                                        </th>
                                                                    </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                  <?php while($ref3 = mysqli_fetch_array($ref))    
                                                                  { ?>
                                                                      <tr>
                                                                          <td>
                                                                            <span class="text-muted font-13"><?php print $ref3['carEmpregado']; ?></span>
                                                                          </td>
                                                                          <td>
                                                                            <span class="text-muted font-13"><?php print $ref3['carMes']; ?></span>
                                                                          </td>
                                                                          <td>
                                                                              <span class="text-muted font-13"><?php print $ref3['carAno']; ?></span>
                                                                          </td>
                                                                          <td>
                                                                              <span class="text-muted font-13"><?php print $ref3['carExtras']."'"; ?></span>
                                                                          </td> 
                                                                          <td>
                                                                              <span class="text-muted font-13"><?php print $ref3['carFinalExtras']; ?></span>
                                                                          </td>
                                                                          <td>
                                                                              <span class="text-muted font-13"><?php print $ref3['carAtrasos']."'"; ?></span>
                                                                          </td>
                                                                          <td>
                                                                              <span class="text-muted font-13"><?php print $ref3['carFinalAtrasos']; ?></span>
                                                                          </td>
                                                                          <td>
                                                                              <span class="text-muted font-13"><?php print $ref3['carResponsavel']; ?></span>
                                                                          </td>
                                                                          <td>
                                                                              <!--a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a-->
                                                                              <a href="javascript:void(0);" class="action-icon" onclick="editRelatorio(nr = '<?php print $ref3['carEmpregado']; ?>',mr = '<?php print $ref3['carMes']; ?>')"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                                              <a href="javascript:void(0);" class="action-icon" onclick="delRelatorio(c = '<?php print $ref3['carEmpregado']; ?>',m = '<?php print $ref3['carMes']; ?>')"> <i class="mdi mdi-delete"></i></a>
                                                                          </td>
                                                                      </tr> <?php  }  ?>
                                                                          <!-- ATENÇÃO - COLOCAR LAÇO REPETIÇÃO AQUI PARA OS BLOCOS <TR> -->
                                                                  </tbody>
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
                                                    <th>Codigo</th>
                                                    <th>Data</th>
                                                    <th>Entrada</th>
                                                    <th>Almoço Ent</th>
                                                    <th>Almoço Sai</th>
                                                    <th>Intervalo Ent</th>
                                                    <th>Intervalo Sai</th>
                                                    <th>Saida</th>
                                                    <th>Minutos</th>
                                                    <th>Atraso</th>
                                                    <th>Extra</th>
                                                    <th>Total Hr.</th>
                                                    <th style="width: 125px;">Ação</th>
                                             </tr>
                                          </thead>
                                                <tbody><?php while($obj = mysqli_fetch_array($list))   { ?>
                                                    <tr>    
                                                       <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td> 
                                                             <td><a href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/apps-ecommerce-orders-details.php?pedido=<?php print $obj['carCodigo']; $obj['carCodigo']; ?>" class="text-body fw-bold"><?php print $obj['carCodigo']; ?></a> </td>
                                                        <td>
                                                           <?php print $obj['carData']; ?>
                                                        </td>
                                                        <td>
                                                            <?php print $obj['carEntrada'];  ?>
                                                        </td>
                                                        <td>
                                                            <?php print $obj['carAlmocoEntrada'];  ?>
                                                        </td>
                                                        <td>
                                                            <?php print $obj['carAlmocoSaida'];  ?>
                                                        </td>
                                                         <td>
                                                            <?php print $obj['carIntervaloIn'];  ?>
                                                        </td>
                                                         <td>
                                                            <?php print $obj['carIntervaloOut'];  ?>
                                                        </td>
                                                        <td>
                                                             <?php print $obj['carSaida']; ?>
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-info-lighten"> <?php print $obj['carMinuto']."'"  ?></span></h5>
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-info-lighten"> <?php print $obj['carAtraso']."'"  ?></span></h5>
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-info-lighten"> <?php print $obj['carExtra']."'"  ?></span></h5>
                                                        </td>
                                                         <td>
                                                            <h5><span class="badge badge-info-lighten"> <?php print $obj['carHora']  ?></span></h5>
                                                        </td>
                                                        <td> 
                                                            <a href="javascript:void(0);" class="action-icon" onclick="edit(e = '<?php print $obj['carCodigo']; ?>')"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon" onclick="del(v = '<?php print $obj['carCodigo']; ?>')"> <i class="mdi mdi-delete"></i></a>
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
            <!-- FINAL DE CONTEÚDO DE PÁGINA -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

     <!-- BARRA DA DIREITA -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Divirgências</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar>

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Aba lateral para registro da divirgência do funcionário </strong> faltas, férias e no registro de ponto.
                    </div>

                    <!-- CAMPOS A SEREM PREENCHIDOS -->
                    <h5 class="mt-3">Seleciona a divirgência</h5>
                    <hr class="mt-1" />

                    <div class="row mb-9">
                        <div class="col-md-12">
                            <select id="divirgencia" name="divirgencia" class="form-control" required>
                                <option value="selecione">SELECIONE</option>
                                <option value="Falta Justificada">Falta Justificada</option>
                                <option value="Falta Injustificada">Falta Injustificada</option>
                                <option value="Ferias">Férias</option>
                                <option value="Suspensao">Suspensão</option>
                                <option value="Falha registro ponto">Falha registro de ponto</option>
                            </select>
                        </div>
                    </div>
<script type="text/javascript">
    function inserir()
    {
        let divirgencia = document.getElementById('divirgencia').value;
        let inicial     = document.getElementById('dtInicial').value;
        let final       = document.getElementById('dtFinal').value;
        let empregado   = document.getElementById('empregado').value;
        let matricula   = document.getElementById('matricula').value;
       
       
        // COLEÇÃO DE VALIDAÇÕES //
        if(divirgencia == 'selecione')
        {
            document.getElementById('excessao').innerHTML = "<div class='alert alert-danger excessao-funcionario'>ATENÇÃO: SELECIONA UMA OPÇÃO VÁLIDA </div>";
            setTimeout(function(){document.getElementById('excessao').innerHTML = "";},2000);
        }

        else if(inicial == '')
        {
            document.getElementById('excessao').innerHTML = "<div class='alert alert-danger excessao-funcionario'>ATENÇÃO: O CAMPO DE DATA INICIAL ESTÁ VÁZIO </div>";
            setTimeout(function(){document.getElementById('excessao').innerHTML = "";},2000);
        }

        else
        {
            // ## ENVIANDO OS CAMPOS CARREGADOR PARA SALVAR NA TABELA ## //
            window.location.href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/RH/salva-carga-divirgencia.php?inicial="+escape(inicial)+"&final="+escape(final)+"&divirgencia="+escape(divirgencia)+"&empregado="+escape(empregado)+"&matricula="+escape(matricula);
        }
    }
</script>
                    <!-- Width -->
                    <h5 class="mt-4">Data Inicio ao fim</h5>
                    <hr class="mt-1" />
                    <div class="row mb-9">
                        <div class="col-md-12">
                            <input type="date" name="dtInicial" id="dtInicial" class="form-control form-control-light"></br>
                            <input type="date" name="dtFinal" id="dtFinal" class="form-control form-control-light">
                        </div>
                    </div>

                    <!-- Left Sidebar-->
                    <h5 class="mt-4"></h5>
                    <hr class="mt-1" />

                    <div class="d-grid mt-4">
                        <button class="btn btn-success" target="_blank" onclick="inserir()">Inserir</button> <!-- id="resetBtn"  -->
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
        <!-- final de script js-->
    </body>

<!-- Mirrored from coderthemes.com/hyper_2/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:41:29 GMT -->
</html>