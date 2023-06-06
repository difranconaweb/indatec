/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 03JUN22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 03JUN22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 03JUN22


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 06JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10JUN22 - RES000101/13BR  
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


// ## ROTINA PARA DESLOGAR USUARIO ## //
function deslogar()
{
       var codigo = document.getElementById('codigo').value;
       $("#warning-alert-modal").modal("toggle");
}
// ## FINAL DE ROTINA DESLOGAR ## //


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


// ## FUNÇÃO PARA LOAD DE TELA  ## //
function load_tela()
{
     var fisico      = document.getElementById('fisico').checked       = false;
     var juridico    = document.getElementById('juridico').checked     = false;
     var razao       = document.getElementById("razao").disabled       = true;
     var fantasia    = document.getElementById("fantasia").disabled    = true;
     var indicador   = document.getElementById("indicadorIE").disabled = true;
     var tipoCliente = document.getElementById("tipoCliente").disabled = true;
     var tipoServico = document.getElementById("tipoServico").disabled = true;
     var cep         = document.getElementById("cep").disabled         = true;
     var cidade      = document.getElementById("cidade").disabled      = true;
     var estado      = document.getElementById("estado").disabled      = true;
     var endereco    = document.getElementById("endereco").disabled    = true;
     var bairro      = document.getElementById("bairro").disabled      = true;
     var numero      = document.getElementById("numero").disabled      = true;
     var email       = document.getElementById("email").disabled       = true;
     var contato     = document.getElementById("contato").disabled     = true;
     var telefone    = document.getElementById("telefone").disabled    = true;
     var celular     = document.getElementById("celular").disabled     = true;
     var whatsapp    = document.getElementById("whatsapp").disabled    = true;
     var cnpj        = document.getElementById("cnpj").disabled        = true;
     var inscricao   = document.getElementById("inscricao").disabled   = true;
     var municipal   = document.getElementById("municipal").disabled   = true;
     var site        = document.getElementById("site").disabled        = true;
     var comentarios = document.getElementById("comentarios").disabled = true;
     document.getElementById("salvar").disabled = true;
     document.getElementById("editar").disabled = true;
     document.getElementById("apagar").disabled = true;
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
            document.getElementById("editar").disabled      = false;
            document.getElementById("apagar").disabled      = false;
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
            document.getElementById("editar").disabled      = false;
            document.getElementById("apagar").disabled      = false;
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
            var b = document.getElementById('cnpj');  //  COLOCA O CAMPO DENTRO DA VARIÁVEL 'B' //
            b.setAttribute("maxlength", "14");       //  A VARIÁVEL 'B' AGORA SENDO OBJETO, COLOCA O VALOR NO ATRIBUTO INDICADO //
            var frase = document.getElementById('cnpj');  //  COLOCA O CAMPO DENTRO DA VARIÁVEL 'FRASE' //
            frase.setAttribute("placeholder", "DIGITE O CNPJ SEM PONTOS");//  A VARIÁVEL 'FRASE' AGORA SENDO OBJETO, COLOCA O VALOR NO ATRIBUTO INDICADO //
    }
}
// ## FINAL DE FUNÇÃO HABILITAR PÁGINA   ## //



// ## FUNÇÃO PARA CARREGAR O ENDEREÇO PARTINDO DO CEP  ## //
 function simples(){var cep = $("#cep").val().replace(/\D/g, '');if (cep != ""){/*Expressão regular para validar o CEP.*/var validacep = /^[0-9]{8}$/;if(validacep.test(cep)){$("#endereco").val("...");$("#bairro").val("...");$("#cidade").val("...");$("#estado").val("...");$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados){if (!("erro" in dados)){$("#endereco").val(dados.logradouro);$("#bairro").val(dados.bairro);$("#cidade").val(dados.localidade);$("#estado").val(dados.uf);}else{/*CEP pesquisado não foi encontrado.*/limpa_formulário_cep();alert("CEP NÃO ENCONTRADO!");}});}}else{/*cep é inválido.*/limpa_formulário_cep();alert("FORMATO DE CEP INVÁLIDO!");}}


 // ### ROTINA PARA SALVAR CLIENTE ### //
function salva_cliente()
{
     var fisico      = document.getElementById("fisico").checked;
     var juridico    = document.getElementById("juridico").checked;
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
                 {

                 }

     }

     else if(municipal == "")
     {
          document.getElementById("raz").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> Atenção: O campo Inscrição Municipal não pode ficar vázio</strong> </div>";
          setTimeout(function(){document.getElementById("raz").innerHTML = "";}, 2000);
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
     {alert();
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
                                    document.getElementById("exception").innerHTML = "<div class='alert alert-danger' role='alert'><i class='dripicons-wrong me-2'></i><strong> ATENÇÃO : O campo site não pode estar vázio vázio  </strong></div>";
                                   setTimeout(function(){document.getElementById("exception").innerHTML = "";}, 3000);
                                }
                                
                                if(obj == 1)
                                { 
                                    // ENCAMINHA PARA O ARQUIVO DE VALIDAÇÃO DE EMAILS //
                                    alert(obj);
                                   /* document.getElementById('excessao').innerHTML = "<div class='alert alert-success excessao-entrar'>AGUARDE PELA VALIDAÇÃO DO SEU USUÁRIO!</div>";
                                    setTimeout(function(){window.location.href = "http://www.indafire.ind.br/indatec/login/memoUser.php"},3000);*/
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

// ###  FINAL DE ROTINA SALVAR CLIENTE ### //