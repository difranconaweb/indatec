/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 03JUN22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 03JUN22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 03JUN22


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 06JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 16OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 17OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 04NOV22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 07NOV22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 07MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 28MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 29MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 19ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 20ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 28ABR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */


/*###########################################################################*/
/* ###  ARQUIVO JAVASCRIPT PARA CONTROLE     -        SISTEMA INDATEC    ### */
/*###########################################################################*/
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

    // ## ROTINA PARA ADICIONAR EQUIPAMENTO AO ORÇAMENTO  ## //
    function adicionar_mercadorias()
    { 
        var equipamento     = document.getElementById('equipamento').value;
        var codeEquipamento = document.getElementById('codigoEquipamento').value;
        var quantidade      = document.getElementById('quantidade').value;
        var numero          = document.getElementById('numero').value;

        // ## VALIDANDO CAMPOS ## 
        if(equipamento == "SELECIONE")
        {
              // MENSAGEM PARA INFORMAR O ERRO //
              document.getElementById('excessao').innerHTML = "<div class='alert alert-danger excessao-entrar'>ATENÇÃO: CAMPO EQUIPAMENTO ESTÁ EM BRANCO!!</div>";
              setTimeout(function(){document.getElementById("excessao").innerHTML = ""},2000);
        }

        else if(quantidade == "")
        {
               // MENSAGEM PARA INFORMAR O ERRO //
              document.getElementById('excessao').innerHTML = "<div class='alert alert-danger excessao-entrar'>ATENÇÃO: CAMPO QUANTIDADE ESTÁ EM BRANCO!!</div>";
              setTimeout(function(){document.getElementById("excessao").innerHTML = ""},2000);
        }

        else
        {

               createRequest();
               var url = "adicionar.php?numero="+escape(numero)+"&quantidade="+escape(quantidade)+"&codeEquipamento="+escape(codeEquipamento)+"&equipamento="+escape(equipamento);
               request.open("GET",url,true);
               request.onreadystatechange = function(){
                if(request.readyState == 4)
                {
                    if(request.status == 200)
                    {
                        if(request.responseText == 0)
                        {
                             // MENSAGEM PARA INFORMAR O ERRO //
                             document.getElementById('excessao').innerHTML = "<div class='alert alert-warning excessao-entrar'>ATENÇÃO: ERRO AO ADICIONAR REGISTRO!!</div>";
                             setTimeout(function(){document.getElementById("excessao").innerHTML = ""},1000);
                        }
                        else
                        {   
                            // REGISTRO REMOVIDO //
                            document.getElementById('excessao').innerHTML = "<div class='alert alert-success excessao-entrar'>REGISTRO ADICIONADO</div>";
                            setTimeout(function(){location.reload();},1000);
                        }
                    }
                }};
                request.send(null);
        }
    }
    // ################################################# //

    // ## ROTINA PARA APAGAR O ORÇAMENTO ## //
    function apagar_orcamento()
    {
         var numero = document.getElementById('numero').value;
         createRequest();
         var url = "apagar_orcamento.php?orc="+escape(numero);
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
                       setTimeout(function(){document.getElementById("excessao").innerHTML = ""},1000);
                  }
                  else
                  {   
                      //  REGISTRO REMOVIDO  //
                      document.getElementById('excessao').innerHTML = "<div class='alert alert-success excessao-entrar'>ATENÇÃO: REGISTRO REMOVIDO COM SUCESSO!!</div>";
                       setTimeout(function(){location.reload();},1000);
                  }
              }
          }};
          request.send(null);
    }

    function apagar()
    {
         $("#delete-alert-modal").modal("toggle");
    }
    // ## FINAL DE ROTINA ## //




    // ## BUSCAR CLIENTE PARA O ORCAMENTO ## //
    function buscarCli()
    {
        var email  = document.getElementById('email').value;
        var nome   = document.getElementById('nomeCli').value;
        var codigo = document.getElementById('codigoCli').value;
        window.location.href = "pesquisa-cliente.php?pesquisa="+escape(nome)+"&codigo="+escape(codigo)+"&email="+escape(email);
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


    // ## ROTINA PARA CAPTURA DE NOME DE EQUIPAMENTO E RETORNO DE CODIGO DE EQUIPAMENTO  ## //
    function capturaCodigo()
    {
         var equipamento = document.getElementById("equipamento").value;
         createRequest();
         var url = "filtro.php?equipamento="+escape(equipamento);
         request.open("GET",url,true);
         request.onreadystatechange = function(){
          if(request.readyState == 4)
          {
              if(request.status == 200)
              {
                  if(request.responseText == 0)
                  {
                      document.getElementById('codigoEquipamento').value = request.responseText;
                  }
                  else
                  {
                      document.getElementById('codigoEquipamento').value = request.responseText;
                  }
              }
          }};

          request.send(null);
  }


  // ## ROTINA PARA DESLOGAR USUARIO ## //
  function deslogar()
  {
         var codigo = document.getElementById('codigo').value;
         $("#warning-alert-modal").modal("toggle");
  }
  // ## FINAL DE ROTINA DESLOGAR ## //

 // ## LIMPAR CAMPOS DE FORM DE PESQUISA  ## //
  function limpar()
  {
      document.getElementById("nomeCli").value = "";
      document.getElementById("codigoCli").value = "";
  }


  // ## FROTINA PARA LOAD DE TELA  ## //
  function load()
  {
      document.getElementById('codex').disabled         = true;
      document.getElementById('razao').disabled         = false;
      document.getElementById('fantasia').disabled      = true;
      document.getElementById('cnpj').disabled          = true;
      document.getElementById('estadual').disabled      = true;
      document.getElementById('logradouro').disabled    = true;
      document.getElementById('numero').disabled        = true;
      document.getElementById('bairro').disabled        = true;
      document.getElementById('cidade').disabled        = true;
      document.getElementById('contato').disabled       = true;
      document.getElementById('email').disabled         = true;
      document.getElementById('telefone').disabled      = true;
      document.getElementById('celular').disabled       = true;
      document.getElementById('transportador').disabled = true;
      document.getElementById('representante').disabled = true;
      document.getElementById('telefone').disabled      = true;
      document.getElementById('celular').disabled       = true;
      document.getElementById('data').disabled          = true;
  }



  // ## FUNÇÃO PARA ABRIR NOVO PEDIDO ## //
  function novo_pedido()
  {
     var codigo = document.getElementById('codigo').value;
     var nome   = document.getElementById('nome').value;
     window.location.href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/comercial/novo-pedido.php?id="+escape(codigo)+"&usuario="+escape(nome);
  }
  // ## FINAL DE FUNÇÃO ## //


  // ## INICIO DE FUNÇÃO SAIR DO SISTEMA ## //
  function sim_sair()
  {
     var codigo = document.getElementById('codigo').value;
     var nome   = document.getElementById('nome').value;
     window.location.href="http://www.indafire.ind.br/indatec/login/memoEncerrar.php?id="+escape(codigo)+"&usuario="+escape(nome);
  }
  // ## FINAL DE FUNÇÃO SAIR DO SISTEMA ## //