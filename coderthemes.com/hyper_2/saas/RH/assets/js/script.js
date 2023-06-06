/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 15MAI23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 15MAI23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 15MAI23


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */


// ########################################################################### //
// ###  ARQUIVO JAVASCRIPT PARA CONTROLE     -        SISTEMA INDATEC      ### //
// ############################################################################ //
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


// ## ROTINA PARA LOAD DE TELA ## //
function loadTela()
{
    document.getElementById('numero').disabled = true;
}
// ## FINAL DE ROTINA DE LOAD DE TELA ## //

