/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 03JUN22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 03JUN22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 03JUN22


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 06JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 11OUT22 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */


/*###########################################################################*/
/* ###  ARQUIVO JAVASCRIPT PARA CONTROLE     -        SISTEMA INDATEC    ### */
/*###########################################################################*/
 /*  ########    FUNÇÃO PARA REQUISIÇÃO ASSINCRONA   #####  */
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
/*  ###   FIM DE AJAX  #### */

// ## ADICIONANDO ENDEREÇO DE ENTREGA ## //
function adicionar()
  {
      let text;
      let person = prompt("FAVOR DIGITAR O ENDEREÇO ENTREGA");
      if (person == null || person == "") {
         // MENSAGEM DE CONFIRMAÇÃO= //
            document.getElementById('excessao').innerHTML = "<div class='alert alert-danger'>CAMPO VÁZIO</div>";
            setTimeout(function(){document.getElementById("excessao").innerHTML = ""},3000);
      } else { 
           createRequest(); 
             // INICIA A REQUISIÇÃO //
              var url = "adicionar_endereco.php?endereco="+escape(person);
              request.open("GET", url, true);
               request.onreadystatechange = function(){ // VERIFICA SE FOI CONCLUIDO COM SUCESSO E A CONEXÃO FECHADA (readyState=4)
                      if (request.readyState == 4)
                      {                      // VERIFICA SE O ARQUIVO FOI ENCONTRADO COM SUCESSO //
                         if (request.status == 200)
                         { 
                                var obj = request.responseText;
                                if(obj == 0)
                                { 
                                    alert("ATENÇÃO: ERRO AO SALVAR O ENDEREÇO... CHAME O SUPORTE!!");
                                }

                                else
                                {
                                    // MENSAGEM DE CONFIRMAÇÃO= //
                                    document.getElementById('excessao').innerHTML = "<div class='alert alert-success'>ENDEREÇO FOI ADICIONADO AO PEDIDO</div>";
                                    setTimeout(function(){document.getElementById("excessao").innerHTML = ""},3000);
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
  // ##  FINAL DE ROTINA ADICIONAR ENDEREÇO DE ENTREGA ## //


 // ## ROTINA PARA DESLOGAR USUARIO ## //
    function deslogar()
    {
           var codigo = document.getElementById('codigo').value;
           $("#warning-alert-modal").modal("toggle");
    }
    // ## FINAL DE ROTINA DESLOGAR ## //

// ## ROTINA PARA SALVAR O NUMERO DO PEDIDO NA FILA ## //
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
// ##  FINAL DE ROTINA ## //


    // ## INICIO DE FUNÇÃO SAIR DO SISTEMA ## //
    function sim_sair()
    {
        var codigo = document.getElementById('codigo').value;
        var nome   = document.getElementById('nome').value;
        window.location.href="http://www.indafire.ind.br/indatec/login/memoEncerrar.php?id="+escape(codigo)+"usuario="+escape(nome);
    }
    // ## FINAL DE FUNÇÃO SAIR DO SISTEMA ## //