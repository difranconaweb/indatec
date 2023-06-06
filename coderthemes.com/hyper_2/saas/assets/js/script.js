/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 03JUN22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 03JUN22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 03JUN22


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 06JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 16FEV23 - RES000101/13BR  
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


// ## ROTINA PARA DESLOGAR USUARIO ## //
function deslogar()
{
       var codigo = document.getElementById('codigo').value;
       $("#warning-alert-modal").modal("toggle");
}
// ## FINAL DE ROTINA DESLOGAR ## //


// ##  MASCARA PARA VALORES ERM DINHEIRO  ## //
function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode == 13) return true;
    key = String.fromCharCode(whichCode); // Valor para o código da Chave
    if (strCheck.indexOf(key) == -1) return false; // Chave inválida
    len = objTextBox.value.length;
    for(i = 0; i < len; i++)
        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
    aux = '';
    for(; i < len; i++)
        if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) objTextBox.value = '';
    if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
    if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += SeparadorMilesimo;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
        }
        objTextBox.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
        objTextBox.value += aux2.charAt(i);
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
    }
    return false;
}
// ##  FINAL DE MASCARA DE MOEDA  ## //


// ## INICIO DE FUNÇÃO SAIR DO SISTEMA ## //
function sim_sair()
{
    var codigo = document.getElementById('codigo').value;
    var nome   = document.getElementById('nome').value;
    window.location.href="http://www.indafire.ind.br/indatec/login/memoEncerrar.php?id="+escape(codigo)+"&usuario="+escape(nome);
}
// ## FINAL DE FUNÇÃO SAIR DO SISTEMA ## //