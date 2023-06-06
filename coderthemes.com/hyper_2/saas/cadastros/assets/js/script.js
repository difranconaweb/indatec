/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 03JUN22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 03JUN22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 03JUN22


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 06JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 30MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 31MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03ABR23 - RES000101/13BR  
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

// ##  ROTINA PARA APAGAR O CLIENTE  ## //
function apagar_cliente()
{
   var numero = document.getElementById('numCliente').value;
   $("#delete-alert-modal").modal("toggle");
}
// ## FINAL DE ROTINA APAGAR CLIENTE ## //


// ## BUSCAR CLIENTE PARA O CADASTRO ## //
function buscarCustomer()
{
    var nome      = document.getElementById('nomeCli').value;
    var ccli      = document.getElementById('codigoCli').value;
   
    window.location.href = "pesquisa-cliente.php?pesquisa="+escape(nome)+"&ccli="+escape(ccli);
}


// ## BUSCA ENDEREÇO DE CLIENTE PELO CNPJ/CPF ## //
function busca_endereco_automatico()
{

   var cnpj = document.getElementById('cnpj').value; 
    createRequest();
    var url = "busca_endereco.php?cnpj="+escape(cnpj);

    request.open("GET", url, true);
    request.onreadystatechange = function(){ // VERIFICA SE FOI CONCLUIDO COM SUCESSO E A CONEXÃO FECHADA (readyState=4)
              if (request.readyState == 4)
              {                      // VERIFICA SE O ARQUIVO FOI ENCONTRADO COM SUCESSO //
                 if (request.status == 200)
                 { 
                      // VERIFICA QUAL O RETORNO DO ARQUIVO DE BUSCA //
                      if(request.responseText == 0)
                      {
                             document.getElementById("exception").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O cliente já está cadastrado em nossa base  </strong></div>";
                             setTimeout(function(){document.getElementById("exception").innerHTML = "";}, 3000);
                      }

                      else
                      {
                            const dados = JSON.parse(request.responseText);
                            if(dados.status == 'ERROR')
                            { 
                                document.getElementById("exception").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O Erro ao carregar registro do cliente  </strong></div>";
                                setTimeout(function(){document.getElementById("exception").innerHTML = "";}, 1000);
                            }
                            
                            else
                            { 
                                document.getElementById('razao').value    = dados.nome;
                                document.getElementById('fantasia').value = dados.nome;
                                document.getElementById('razao').value    = dados.nome;
                                document.getElementById('cep').value      = dados.cep;
                                document.getElementById('cidade').value   = dados.municipio;
                                document.getElementById('estado').value   = dados.uf;
                                document.getElementById('endereco').value = dados.logradouro;
                                document.getElementById('bairro').value   = dados.bairro;
                                document.getElementById('numero').value   = dados.numero;
                                document.getElementById('email').value    = dados.email;
                                document.getElementById('contato').value  = dados.contato;
                                document.getElementById('telefone').value = dados.telefone;
                            }
                      }
                 }
        
              }};
            request.send(null);
}
// ## FINAL DE BUSCA DE ENDERECO AUTOMATICO ## //


// ## ROTINA PARA CANCELAR AÇÃO ## //
function cancelar_cliente()
{
     window.location.href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/cadastros/form-elements.php";
}
// ## FINAL DE ROTINA CANCELAR AÇÃO ## //

// ## ROTINA PARA DESLOGAR USUARIO ## //
function deslogar()
{
       var codigo = document.getElementById('codigo').value;
       $("#warning-alert-modal").modal("toggle");
}
// ## FINAL DE ROTINA DESLOGAR ## //


// ## ROTINA PARA EDITAR CLIENTE ## //
function editar_cliente()
{
     document.getElementById("fisico").style.visibility   = 'visible';
     document.getElementById("juridico").style.visibility = 'visible';
     document.getElementById("salvar").disabled           = false;
     document.getElementById("editar").disabled           = true;
     document.getElementById("apagar").disabled           = true;
     document.getElementById("novo").disabled             = true;
}
// # FINAL DE ROTINA PARA EDITAR CLIENTE ## //


// ### ROTINA PARA GRAVAR O CLIENTE APÓS A VALIDAÇÃO ### //
function gravar()
{

         var fisico      = document.getElementById("fisico").checked;
         var juridico    = document.getElementById("juridico").checked;
         var cnpj        = document.getElementById("cnpj").value;
         var razao       = document.getElementById("razao").value;
         var fantasia    = document.getElementById("fantasia").value;
         var tipoCliente = document.getElementById("tipoCliente").value;
         var tipoServico = document.getElementById("tipoServico").value;
         var cep         = document.getElementById("cep").value;
         var cidade      = document.getElementById("cidade").value;
         var estado      = document.getElementById("estado").value;
         var endereco    = document.getElementById("endereco").value;
         var bairro      = document.getElementById("bairro").value;
         var numero      = document.getElementById("numero").value;
         var email       = document.getElementById("email").value;
         var contato     = document.getElementById("contato").value;
         var telefone    = document.getElementById("telefone").value;
         var celular     = document.getElementById("celular").value;
         var whatsapp    = document.getElementById("whatsapp").value;
         var cnpj        = document.getElementById("cnpj").value;
         var inscricao   = document.getElementById("inscricao").value;
         var municipal   = document.getElementById("municipal").value;
         var site        = document.getElementById("site").value;
         var comentarios = document.getElementById("comentarios").value;


      createRequest(); 
     // INICIA A REQUISIÇÃO //
      var url = "salvar_cliente.php?razao="+escape(razao)+"&fantasia="+escape(fantasia)+"&tipoCliente="+escape(tipoCliente)+"&tipoServico="+escape(tipoServico)+"&cep="+escape(cep)+"&cidade="+escape(cidade)+"&estado="+escape(estado)+"&endereco="+escape(endereco)+"&bairro="+escape(bairro)+"&numero="+escape(numero)+"&email="+escape(email)+"&contato="+escape(contato)+"&telefone="+escape(telefone)+"&celular="+escape(celular)+"&whatsapp="+escape(whatsapp)+"&cnpj="+escape(cnpj)+"&inscricao="+escape(inscricao)+"&municipal="+escape(municipal)+"&site="+escape(site)+"&comentarios="+escape(comentarios);
      request.open("GET", url, true);
       request.onreadystatechange = function(){ // VERIFICA SE FOI CONCLUIDO COM SUCESSO E A CONEXÃO FECHADA (readyState=4)
              if (request.readyState == 4)
              {                      // VERIFICA SE O ARQUIVO FOI ENCONTRADO COM SUCESSO //
                 if (request.status == 200)
                 { 
                        var obj = request.responseText;
                        if(obj == 0)
                        { 
                            document.getElementById("exception").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O Erro ao cadastrar cliente  </strong></div>";
                           setTimeout(function(){document.getElementById("exception").innerHTML = "";}, 3000);
                        }
                        
                        if(obj == 1)
                        { 
                            // ENCAMINHA PARA O ARQUIVO DE VALIDAÇÃO DE EMAILS //
                            document.getElementById("exception").innerHTML = "<div class='alert alert-success' role='alert'><i class='dripicons-disc me-2'></i><strong> Salvando cliente...  </strong></div>";
                            setTimeout(function(){document.getElementById("exception").innerHTML = "";}, 3000);
                            document.getElementById("fisico").style.visibility   = 'hidden';
                            document.getElementById("juridico").style.visibility = 'hidden';
                            document.getElementById("razao").disabled            = true;
                            document.getElementById("fantasia").disabled         = true;
                            document.getElementById("indicadorIE").disabled      = true;
                            document.getElementById("tipoCliente").disabled      = true;
                            document.getElementById("tipoServico").disabled      = true;
                            document.getElementById("cep").disabled              = true;
                            document.getElementById("cidade").disabled           = true;
                            document.getElementById("estado").disabled           = true;
                            document.getElementById("endereco").disabled         = true;
                            document.getElementById("bairro").disabled           = true;
                            document.getElementById("numero").disabled           = true;
                            document.getElementById("email").disabled            = true;
                            document.getElementById("contato").disabled          = true;
                            document.getElementById("telefone").disabled         = true;
                            document.getElementById("celular").disabled          = true;
                            document.getElementById("whatsapp").disabled         = true;
                            document.getElementById("cnpj").disabled             = true;
                            document.getElementById("inscricao").disabled        = true;
                            document.getElementById("municipal").disabled        = true;
                            document.getElementById("site").disabled             = true;
                            document.getElementById("comentarios").disabled      = true;
                            document.getElementById("salvar").disabled           = true;
                            document.getElementById("editar").disabled           = false;
                            document.getElementById("apagar").disabled           = false;
                            document.getElementById("novo").disabled             = false;
                        }
                 }
                 else
                 { 
                       document.getElementById("exception").innerHTML = "ERRO: " + request.statusText;
                 }
              }};
            request.send(null); 
}
// ###  FINAL DE ROTINA SALVAR CLIENTE ### //



// ## FUNÇÃO JOGAR VALOR DO CAMPO DE INDICADOR PARA A INSCRIÇÃO ESTADUAL ## //
function indicador()
{
    var indicadorIE = document.getElementById("indicadorIE").value;
    document.getElementById("inscricao").value = indicadorIE;

    if(indicadorIE == "selecione")
    {
        document.getElementById("inscricao").value = ""; 
        document.getElementById("inscricao").disabled = true;
    }

    else if(indicadorIE == "Contribuinte")
    {
         var b = document.getElementById('inscricao');  //  COLOCA O CAMPO DENTRO DA VARIÁVEL 'B' //
         b.setAttribute("maxlength", "30")    //  A VARIÁVEL 'B' AGORA SENDO OBJETO, COLOCA O VALOR NO ATRIBUTO INDICADO //
            var frase = document.getElementById('inscricao');  //  COLOCA O CAMPO DENTRO DA VARIÁVEL 'FRASE' //
            frase.setAttribute("placeholder", "DIGITE O INSCRIÇÃO AQUI SEM PONTUAÇÃO");//  A VARIÁVEL 'FRASE' AGORA SENDO OBJETO, COLOCA O VALOR NO ATRIBUTO INDICADO //
       document.getElementById("inscricao").value = ""; 
       document.getElementById("inscricao").disabled = false;
    }

    else
    {
       document.getElementById("inscricao").value = indicadorIE;
       document.getElementById("inscricao").disabled = true; 
    }
    
}
// ## FINAL DE FUNÇÃO INDICADOR INSCRIÇÃO ESTADUAL   ## //



// ## LIMPAR CAMPOS DE FORM DE PESQUISA  ## //
function limpar()
{
    document.getElementById("nomeCli").value   = "";
    document.getElementById("codigoCli").value = "";
}


// ## FUNÇÃO PARA LOAD DE TELA  ## //
function load_tela()
{
     document.getElementById("fisico").style.visibility   = 'hidden';
     document.getElementById("juridico").style.visibility = 'hidden';
     document.getElementById("razao").disabled            = true;
     document.getElementById("fantasia").disabled         = true;
     document.getElementById("indicadorIE").disabled      = true;
     document.getElementById("tipoCliente").disabled      = true;
     document.getElementById("tipoServico").disabled      = true;
     document.getElementById("cep").disabled              = true;
     document.getElementById("cidade").disabled           = true;
     document.getElementById("estado").disabled           = true;
     document.getElementById("endereco").disabled         = true;
     document.getElementById("bairro").disabled           = true;
     document.getElementById("numero").disabled           = true;
     document.getElementById("email").disabled            = true;
     document.getElementById("contato").disabled          = true;
     document.getElementById("telefone").disabled         = true;
     document.getElementById("celular").disabled          = true;
     document.getElementById("whatsapp").disabled         = true;
     document.getElementById("cnpj").disabled             = true;
     document.getElementById("inscricao").disabled        = true;
     document.getElementById("municipal").disabled        = true;
     document.getElementById("site").disabled             = true;
     document.getElementById("comentarios").disabled      = true;
     document.getElementById("salvar").disabled           = true;
     document.getElementById("editar").disabled           = false;
     document.getElementById("apagar").disabled           = false;
     document.getElementById("novo").disabled             = false;
}
// ## FINAL DE FUNÇÃO DE LOAD DE TELA   ## //



// #############################################################################################  //
//  ####   FINAL DE COLEÇAO DE MASCARAS  #### *//* ####   COLEÇÃO DE MASCARAS DO FRONT END  ####  //
 function mascaraCelular(t, mask){
     var i = t.value.length;
     var saida = mask.substring(2,1);
     var texto = mask.substring(i);
     if (texto.substring(0,1) != saida)
     {
         t.value += texto.substring(0,1);
     }
 }


function mascaraData(campoPassado, mascara)
{
    var campo = campoPassado.value.length;
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(campo);
    if(texto.substring(0,1) != saida)
    {
       campoPassado.value += texto.substring(0,1);
    }
}

function mascaraTelefone(t, mask){
     var i = t.value.length;
     var saida = mask.substring(2,1);
     var texto = mask.substring(i);
     if (texto.substring(0,1) != saida)
     {
         t.value += texto.substring(0,1);
     }
 }
/*  ####   FINAL DE COLEÇAO DE MASCARAS  #### */
// #############################################################################################  //


// ## ROTINA PARA ABRIR NOVO CLIENTE ## //
function novo_cliente()
{
     document.getElementById("fisico").style.visibility   = 'visible';
     document.getElementById("juridico").style.visibility = 'visible';
     var razao       = document.getElementById("razao").value    = '';
     var fantasia    = document.getElementById("fantasia").value = '';
   //  var indicador   = document.getElementById("indicadorIE").disabled = false;
    // var tipoCliente = document.getElementById("tipoCliente").disabled = false;
  //   var tipoServico = document.getElementById("tipoServico").disabled = false;
     var cep         = document.getElementById("cep").value            = '';
     var cidade      = document.getElementById("cidade").value         = '';
     var estado      = document.getElementById("estado").value         = '';
     var endereco    = document.getElementById("endereco").value       = '';
     var bairro      = document.getElementById("bairro").value         = '';
     var numero      = document.getElementById("numero").value         = '';
     var email       = document.getElementById("email").value          = '';
     var contato     = document.getElementById("contato").value        = '';
     var telefone    = document.getElementById("telefone").value       = '';
     var celular     = document.getElementById("celular").value        = '';
     var whatsapp    = document.getElementById("whatsapp").value       = '';
     var cnpj        = document.getElementById("cnpj").value           = '';
     var inscricao   = document.getElementById("inscricao").value      = '';
     var municipal   = document.getElementById("municipal").value      = '';
     var site        = document.getElementById("site").value           = '';
     var comentarios = document.getElementById("comentarios").value    = '';
     document.getElementById("salvar").disabled = false;
     document.getElementById("editar").disabled = true;
     document.getElementById("apagar").disabled = true;
     document.getElementById("novo").disabled   = true;
}
// ## FINAL DE ROTINA DE NOVO REGISTRO ## //


// ## FUNÇÃO PARA HABILITAR A PÁGINA TODA ## //
function pessoa_fisica_juridica()
{   
    var fisico   = document.getElementById("fisico").checked; 
    var juridico = document.getElementById("juridico").checked;

    if(fisico == true)
    {
            document.getElementById("juridico").checked     = false; // CAMPO JURIDICO RECEBENDO FALSO PARA DESMARCA-LO //
            document.getElementById("fisico").checked       = true; // CAMPO FISICO RECEBENDO VERDADEIRO PARA MARCA-LO //
            document.getElementById("razao").disabled       = false;
            document.getElementById("indicadorIE").disabled = true;
            document.getElementById("fantasia").disabled    = true;
            document.getElementById("tipoCliente").disabled = false;
            document.getElementById("tipoServico").disabled = false;
            document.getElementById("cep").disabled         = false;
            document.getElementById("cidade").disabled      = false;
            document.getElementById("estado").disabled      = false;
            document.getElementById("endereco").disabled    = false;
            document.getElementById("bairro").disabled      = false;
            document.getElementById("numero").disabled      = false;
            document.getElementById("email").disabled       = false;
            document.getElementById("contato").disabled     = false;
            document.getElementById("telefone").disabled    = false;
            document.getElementById("celular").disabled     = false;
            document.getElementById("whatsapp").disabled    = false;
            document.getElementById("cnpj").disabled        = false;
            document.getElementById("inscricao").disabled   = true;
            document.getElementById("municipal").disabled   = true;
            document.getElementById("site").disabled        = false;
            document.getElementById("comentarios").disabled = false;
            document.getElementById("salvar").disabled      = false;
            document.getElementById("editar").disabled      = true;
            document.getElementById("apagar").disabled      = true;
            var b = document.getElementById('cnpj');  //  COLOCA O CAMPO DENTRO DA VARIÁVEL 'B' //
            b.setAttribute("maxlength", "14");       //  A VARIÁVEL 'B' AGORA SENDO OBJETO, COLOCA O VALOR NO ATRIBUTO INDICADO //
            var frase = document.getElementById('cnpj');  //  COLOCA O CAMPO DENTRO DA VARIÁVEL 'FRASE' //
            frase.setAttribute("placeholder", "DIGITE O CPF SEM PONTOS");//  A VARIÁVEL 'FRASE' AGORA SENDO OBJETO, COLOCA O VALOR NO ATRIBUTO INDICADO //
    }

    else if(juridico == true)
    {
            document.getElementById("fisico").checked       = false; // CAMPO FISICO RECEBE FALSO PARA SEGUIR MARCADO //
            document.getElementById("juridico").checked     = true; // CAMPO JURIDICO RECEBE VERDADEIRO PARA SEGUIR MARCA-LO //
            document.getElementById("razao").disabled       = false;
            document.getElementById("fantasia").disabled    = false;
            document.getElementById("indicadorIE").disabled = false;
            document.getElementById("tipoCliente").disabled = false;
            document.getElementById("tipoServico").disabled = false;
            document.getElementById("cep").disabled         = false;
            document.getElementById("cidade").disabled      = false;
            document.getElementById("estado").disabled      = false;
            document.getElementById("endereco").disabled    = false;
            document.getElementById("bairro").disabled      = false;
            document.getElementById("numero").disabled      = false;
            document.getElementById("email").disabled       = false;
            document.getElementById("contato").disabled     = false;
            document.getElementById("telefone").disabled    = false;
            document.getElementById("celular").disabled     = false;
            document.getElementById("whatsapp").disabled    = false;
            document.getElementById("cnpj").disabled        = false;
            document.getElementById("inscricao").disabled   = true;
            document.getElementById("municipal").disabled   = false;
            document.getElementById("site").disabled        = false;
            document.getElementById("comentarios").disabled = false;
            document.getElementById("salvar").disabled      = false;
            document.getElementById("editar").disabled      = true;
            document.getElementById("apagar").disabled      = true;
            var b = document.getElementById('cnpj');  //  COLOCA O CAMPO DENTRO DA VARIÁVEL 'B' //
            b.setAttribute("maxlength", "14");       //  A VARIÁVEL 'B' AGORA SENDO OBJETO, COLOCA O VALOR NO ATRIBUTO INDICADO //
            var frase = document.getElementById('cnpj');  //  COLOCA O CAMPO DENTRO DA VARIÁVEL 'FRASE' //
            frase.setAttribute("placeholder", "DIGITE O CNPJ SEM PONTOS");//  A VARIÁVEL 'FRASE' AGORA SENDO OBJETO, COLOCA O VALOR NO ATRIBUTO INDICADO //
    }

    else
    {
            document.getElementById("fisico").checked       = false; 
            document.getElementById("juridico").checked     = false; 
            document.getElementById("razao").disabled       = true;
            document.getElementById("fantasia").disabled    = true;
            document.getElementById("indicadorIE").disabled = true;
            document.getElementById("tipoCliente").disabled = true;
            document.getElementById("tipoServico").disabled = true;
            document.getElementById("cep").disabled         = true;
            document.getElementById("cidade").disabled      = true;
            document.getElementById("estado").disabled      = true;
            document.getElementById("endereco").disabled    = true;
            document.getElementById("bairro").disabled      = true;
            document.getElementById("numero").disabled      = true;
            document.getElementById("email").disabled       = true;
            document.getElementById("contato").disabled     = true;
            document.getElementById("telefone").disabled    = true;
            document.getElementById("celular").disabled     = true;
            document.getElementById("whatsapp").disabled    = true;
            document.getElementById("cnpj").disabled        = true;
            document.getElementById("inscricao").disabled   = true;
            document.getElementById("municipal").disabled   = true;
            document.getElementById("site").disabled        = true;
            document.getElementById("comentarios").disabled = true;
            document.getElementById("salvar").disabled      = true;
            document.getElementById("editar").disabled      = true;
            document.getElementById("apagar").disabled      = true;
            document.getElementById("novo").disabled        = false;
            var b = document.getElementById('cnpj');  //  COLOCA O CAMPO DENTRO DA VARIÁVEL 'B' //
            b.setAttribute("maxlength", "14");       //  A VARIÁVEL 'B' AGORA SENDO OBJETO, COLOCA O VALOR NO ATRIBUTO INDICADO //
            var frase = document.getElementById('cnpj');  //  COLOCA O CAMPO DENTRO DA VARIÁVEL 'FRASE' //
            frase.setAttribute("placeholder", "DIGITE O CNPJ SEM PONTOS");//  A VARIÁVEL 'FRASE' AGORA SENDO OBJETO, COLOCA O VALOR NO ATRIBUTO INDICADO //
    }
}
// ## FINAL DE FUNÇÃO HABILITAR PÁGINA   ## //



// ## ROTINA PARA MENSAGEM DE SALVAR CLIENTE ## //
function salvar_cliente()
{
   
         var fisico      = document.getElementById("fisico").checked;
         var juridico    = document.getElementById("juridico").checked;
         var cnpj        = document.getElementById("cnpj").value;
         var razao       = document.getElementById("razao").value;
         var fantasia    = document.getElementById("fantasia").value;
         var tipoCliente = document.getElementById("tipoCliente").value;
         var tipoServico = document.getElementById("tipoServico").value;
         var cep         = document.getElementById("cep").value;
         var cidade      = document.getElementById("cidade").value;
         var estado      = document.getElementById("estado").value;
         var endereco    = document.getElementById("endereco").value;
         var bairro      = document.getElementById("bairro").value;
         var numero      = document.getElementById("numero").value;
         var email       = document.getElementById("email").value;
         var contato     = document.getElementById("contato").value;
         var telefone    = document.getElementById("telefone").value;
         var celular     = document.getElementById("celular").value;
         var whatsapp    = document.getElementById("whatsapp").value;
         var cnpj        = document.getElementById("cnpj").value;
         var inscricao   = document.getElementById("inscricao").value;
         var municipal   = document.getElementById("municipal").value;
         var site        = document.getElementById("site").value;
         var comentarios = document.getElementById("comentarios").value;



     if(cnpj == "")
     {
        document.getElementById("cn").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo para documento não pode estar vázio  </strong></div>";
        setTimeout(function(){document.getElementById("cn").innerHTML = "";}, 2000);
     }

     else if(inscricao == "")
     {
                 if(fisico == false)
                 {
                     document.getElementById("insc").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo inscr estadual nao  pode estar vázio  </strong></div>";
                     setTimeout(function(){document.getElementById("insc").innerHTML = "";}, 2000);
                 }

                 else if(razao == "")
                 {
                     document.getElementById("raz").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> Atenção: O campo RAZÃO SOCIAL não pode ficar vázio</strong> </div>";
                     setTimeout(function(){document.getElementById("raz").innerHTML = "";}, 2000);
                 }

                 else if(tipoCliente == "selecione")
                 {
                    document.getElementById("tipCli").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O Tipo do Cliente deverá ser selecionado </strong></div>";
                    setTimeout(function(){document.getElementById("tipCli").innerHTML = "";}, 2000);
                 }

                 else if(tipoServico == "selecione")
                 {
                    document.getElementById("tipServ").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O Tipo do Serviço deverá ser selecionado </strong></div>";
                    setTimeout(function(){document.getElementById("tipServ").innerHTML = "";}, 2000);
                 }

                 else if(cidade == "")
                 {
                    document.getElementById("cid").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo cidade não pode estar vázio </strong></div>";
                    setTimeout(function(){document.getElementById("cid").innerHTML = "";}, 2000);
                 }

                 else if(estado == "")
                 {
                    document.getElementById("uf").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O deve inserir o estado  </strong></div>";
                    setTimeout(function(){document.getElementById("uf").innerHTML = "";}, 2000);
                 }

                 else if(endereco == "")
                 {
                    document.getElementById("end").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo endereço não pode ficar vázio </strong></div>";
                    setTimeout(function(){document.getElementById("end").innerHTML = "";}, 2000);
                 }

                 else if(numero == "")
                 {
                    document.getElementById("num").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo numero não pode estar vázio  </strong></div>";
                    setTimeout(function(){document.getElementById("num").innerHTML = "";}, 2000);
                 }

                 else if(email == "")
                 {
                    document.getElementById("mail").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo email não pode estar vázio  </strong></div>";
                    setTimeout(function(){document.getElementById("mail").innerHTML = "";}, 2000);
                 }

                 else if(contato == "")
                 {
                    document.getElementById("cont").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo contato não pode estar vázio  </strong></div>";
                    setTimeout(function(){document.getElementById("cont").innerHTML = "";}, 2000);
                 }

                 else if(telefone == "")
                 {
                    document.getElementById("tel").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo telefone não pode estar vázio  </strong></div>";
                    setTimeout(function(){document.getElementById("tel").innerHTML = "";}, 2000);
                 }

                 else if(telefone.length > 13)
                 {
                      document.getElementById("tel").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O formato deste telefone está incorrerto  </strong></div>";
                      setTimeout(function(){document.getElementById("tel").innerHTML = "";}, 2000);
                 }

                 else if(telefone.length < 13)
                 {
                      document.getElementById("tel").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O formato deste telefone está incorrerto  </strong></div>";
                      setTimeout(function(){document.getElementById("tel").innerHTML = "";}, 2000);
                 }

                 else if(celular == "")
                 {
                    document.getElementById("cel").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo celular não pode estar vázio  </strong></div>";
                    setTimeout(function(){document.getElementById("cel").innerHTML = "";}, 2000);
                 }

                 else if(celular.length > 14)
                 {
                    document.getElementById("cel").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O formato deste celular está incorreto  </strong></div>";
                    setTimeout(function(){document.getElementById("cel").innerHTML = "";}, 2000);
                 }

                 else if(celular.length < 14)
                 {
                    document.getElementById("cel").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O formato deste celular está incorreto  </strong></div>";
                    setTimeout(function(){document.getElementById("cel").innerHTML = "";}, 2000);
                 }

                 else if(whatsapp == "")
                 {
                    document.getElementById("whats").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo celular para whatsapp não pode estar vázio  </strong></div>";
                    setTimeout(function(){document.getElementById("whats").innerHTML = "";}, 2000);
                 }

                 else if(whatsapp.length < 14)
                 {
                    document.getElementById("whats").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O formato do telefone para whatsapp está incorreto <strong></div>";
                    setTimeout(function(){document.getElementById("whats").innerHTML = "";}, 2000);
                 }

                 else if(whatsapp.length > 14)
                 {
                    document.getElementById("whats").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O formato do telefone para whatsapp está incorreto <strong></div>";
                    setTimeout(function(){document.getElementById("whats").innerHTML = "";}, 2000);
                 }

                 else if(site == "")
                 {
                    document.getElementById("sit").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo site não pode estar vázio vázio  </strong></div>";
                    setTimeout(function(){document.getElementById("sit").innerHTML = "";}, 2000);
                 }

                 else
                 {// ## SALVANDO REGISTRO NA TABELA T0013 DE CLIENTES  ## //
                    $("#budget-alert-modal").modal("toggle");
                 }

     }

     else if(municipal == "")
     {
          document.getElementById("mun").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> Atenção: O campo Inscrição Municipal não pode ficar vázio</strong> </div>";
          setTimeout(function(){document.getElementById("mun").innerHTML = "";}, 2000);
     }

     else if(razao == "")
     {
         document.getElementById("raz").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> Atenção: O campo RAZÃO SOCIAL não pode ficar vázio</strong> </div>";
         setTimeout(function(){document.getElementById("raz").innerHTML = "";}, 2000);
     }

     else if(fantasia == "")
     {
        document.getElementById("fant").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo NOME FANTASIA não pode ficar vázio </strong></div>";
        setTimeout(function(){document.getElementById("fant").innerHTML = "";}, 2000);
     }

     else if(tipoCliente == "selecione")
     {
        document.getElementById("tipCli").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O Tipo do Cliente deverá ser selecionado </strong></div>";
        setTimeout(function(){document.getElementById("tipCli").innerHTML = "";}, 2000);
     }

     else if(tipoServico == "selecione")
     {
        document.getElementById("tipServ").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O Tipo do Serviço deverá ser selecionado </strong></div>";
        setTimeout(function(){document.getElementById("tipServ").innerHTML = "";}, 2000);
     }

     else if(cidade == "")
     {
        document.getElementById("cid").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo cidade não pode estar vázio </strong></div>";
        setTimeout(function(){document.getElementById("cid").innerHTML = "";}, 2000);
     }

     else if(estado == "")
     {
        document.getElementById("uf").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O deve inserir o estado  </strong></div>";
        setTimeout(function(){document.getElementById("uf").innerHTML = "";}, 2000);
     }

     else if(endereco == "")
     {
        document.getElementById("end").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo endereço não pode ficar vázio </strong></div>";
        setTimeout(function(){document.getElementById("end").innerHTML = "";}, 2000);
     }

     else if(numero == "")
     {
        document.getElementById("num").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo numero não pode estar vázio  </strong></div>";
        setTimeout(function(){document.getElementById("num").innerHTML = "";}, 2000);
     }

     else if(email == "")
     {
        document.getElementById("mail").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo email não pode estar vázio  </strong></div>";
        setTimeout(function(){document.getElementById("mail").innerHTML = "";}, 2000);
     }

     else if(contato == "")
     {
        document.getElementById("cont").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo contato não pode estar vázio  </strong></div>";
        setTimeout(function(){document.getElementById("cont").innerHTML = "";}, 2000);
     }

     else if(telefone == "")
     {
        document.getElementById("tel").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo telefone não pode estar vázio  </strong></div>";
        setTimeout(function(){document.getElementById("tel").innerHTML = "";}, 2000);
     }

     else if(telefone.length > 13)
     {
          document.getElementById("tel").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O formato deste telefone está incorrerto  </strong></div>";
          setTimeout(function(){document.getElementById("tel").innerHTML = "";}, 2000);
     }

     else if(telefone.length < 13)
     {
          document.getElementById("tel").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O formato deste telefone está incorrerto  </strong></div>";
          setTimeout(function(){document.getElementById("tel").innerHTML = "";}, 2000);
     }

     else if(celular == "")
     {
        document.getElementById("cel").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo celular não pode estar vázio  </strong></div>";
        setTimeout(function(){document.getElementById("cel").innerHTML = "";}, 2000);
     }

     else if(celular.length > 14)
     {
        document.getElementById("cel").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O formato deste celular está incorreto  </strong></div>";
        setTimeout(function(){document.getElementById("cel").innerHTML = "";}, 2000);
     }

     else if(celular.length < 14)
     {
        document.getElementById("cel").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O formato deste celular está incorreto  </strong></div>";
        setTimeout(function(){document.getElementById("cel").innerHTML = "";}, 2000);
     }

     else if(whatsapp == "")
     {
        document.getElementById("whats").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo celular para whatsapp não pode estar vázio  </strong></div>";
        setTimeout(function(){document.getElementById("whats").innerHTML = "";}, 2000);
     }

     else if(whatsapp.length < 14)
     {
        document.getElementById("whats").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O formato do telefone para whatsapp está incorreto <strong></div>";
        setTimeout(function(){document.getElementById("whats").innerHTML = "";}, 2000);
     }

     else if(whatsapp.length > 14)
     {
        document.getElementById("whats").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O formato do telefone para whatsapp está incorreto <strong></div>";
        setTimeout(function(){document.getElementById("whats").innerHTML = "";}, 2000);
     }

     else if(site == "")
     {
        document.getElementById("sit").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo site não pode estar vázio vázio  </strong></div>";
        setTimeout(function(){document.getElementById("sit").innerHTML = "";}, 2000);
     }

     else 
     {
        $("#budget-alert-modal").modal("toggle");
     }
             
}
         
// ## FINAL DE ROTINA MENSAGEM SALVAR CLIENTE ## //



// ## FUNÇÃO PARA CARREGAR O ENDEREÇO PARTINDO DO CEP  ## //
 function simples(){var cep = $("#cep").val().replace(/\D/g, '');if (cep != ""){/*Expressão regular para validar o CEP.*/var validacep = /^[0-9]{8}$/;if(validacep.test(cep)){$("#endereco").val("...");$("#bairro").val("...");$("#cidade").val("...");$("#estado").val("...");$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados){if (!("erro" in dados)){$("#endereco").val(dados.logradouro);$("#bairro").val(dados.bairro);$("#cidade").val(dados.localidade);$("#estado").val(dados.uf);}else{/*CEP pesquisado não foi encontrado.*/limpa_formulário_cep();alert("CEP NÃO ENCONTRADO!");}});}}else{/*cep é inválido.*/limpa_formulário_cep();alert("FORMATO DE CEP INVÁLIDO!");}}

// ## ROTINA PARA APAGAR CLIENTE ## //
function sim_apagar()
{
    var numero   = document.getElementById('numCliente').value;
    window.location.href="http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/cadastros/apagar_cliente.php?numero="+escape(numero);
}
// ## FINAL DE ROTINA APAGAR CLIENTE ## //



// ## INICIO DE FUNÇÃO SAIR DO SISTEMA ## //
function sim_sair()
{
 var codigo = document.getElementById('codigo').value;
 var nome   = document.getElementById('nome').value;
 window.location.href="http://www.indafire.ind.br/indatec/login/memoEncerrar.php?id="+escape(codigo)+"&usuario="+escape(nome);
}
// ## FINAL DE FUNÇÃO SAIR DO SISTEMA ## //
