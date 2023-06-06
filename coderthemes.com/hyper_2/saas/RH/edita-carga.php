<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 25MAI23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 25MAI23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 25MAI23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 26MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 30MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



        session_start();
        $usuario      = $_SESSION['usuario'];
        $codigo       = $_SESSION['id'];
        $data         = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $entrada      = $_REQUEST['entrada'];  // ## CARREGA O HORARIO DA ENTRADA ## //
        $almocoin     = $_REQUEST['almocoin']; // ## CARREGA O HORÁRIO DA ENTRADA ALMOÇO ## //
        $almocoout    = $_REQUEST['almocoout']; // ## CARREGA O HORARIO SAIDA ALMOÇO ## //
        $intervaloin  = $_REQUEST['intervaloin']; // ## CARREGA O HORÁRIO ENTRADA INTERVALO ## //
        $intervaloout = $_REQUEST['intervaloout']; // ## CARREGA O HORÁRIO SAIDA DO INTERVALO ## //
        $saidaedit    = $_REQUEST['saidaedit']; // ## CARREGA O HORÁRIO DA SAIDA ## //
        $editar       = $_REQUEST['editar']; // ## CARREGA O ID DO REGISTRO A SER ALTERADO ## //
        

// ######################################################################################################################## //
// ######################################################################################################################## //      

         $max = 15;
  
        // ## FUNÇÃO PARA CARREGAR A CARGA DA LINHA SELECIONADA ## /
        $lin = mysqli_query($con,"SELECT carEntrada,carAlmocoEntrada,carAlmocoSaida,carIntervaloIn,carIntervaloOut,carSaida,carAtraso,carMinuto FROM carga_horaria WHERE carCodigo = '$editar'");
        while($lin3 = mysqli_fetch_array($lin))
        {
            $carEntrada        = $lin3['carEntrada'];
            $carAlmocoEntrada  = $lin3['carAlmocoEntrada'];
            $carAlmocoSaida    = $lin3['carAlmocoSaida'];
            $carIntervaloEnt   = $lin3['carIntervaloIn'];
            $carIntervaloSai   = $lin3['carIntervaloOut'];
            $carSaida          = $lin3['carSaida'];
            $carAtraso         = $lin3['carAtraso'];
            $carMinuto         = $lin3['carMinuto'];
        }

        // ## VERIFICANDO AS VARIÁVEIS VÁZIAS PARA NÃO TROCAR NA TABELA ## //
        if(empty($entrada))
        {
           $entrada = $carEntrada;
        }

        else{$entrada;}

        if(empty($almocoin))
        {
           $almocoin = $carAlmocoEntrada;
        }

        else{$almocoin;}

        if(empty($almocoout))
        {
           $almocoout = $carAlmocoSaida;
        }

        else{$almocoout;}
        
        if(empty($intervaloin))
        {
           $intervaloin = $carIntervaloEnt;
        }

        else{$intervalorin;}

        if(empty($intervaloout))
        {
           $intervaloout = $carIntervaloSai;
        }

        else{$intervaloout;}

        if(empty($saidaedit))
        {
           $carSaida = $carSaida;
        }

        else{$saidaedit;}


        // ## CALCULANDO O VALOR DO INTERVALO DE ENTRADA ## //        
        function interval_in($intervaloin)
        {
            $hora   = substr($intervaloin,-5,2);
            $minuto = substr($intervaloin,3);
            
            $hora    = ($hora * 60); 
            $entrada = ($hora + $minuto);

            return $entrada;
        }
        // ## FINAL DE INTERVALO ENTRADA ## //


        // ## CALCULANDO VALOR DE INTERVALO DE SAIDA ## //
         function interval_out($intervaloout)
        {
            $hora   = substr($intervaloout,-5,2);
            $minuto = substr($intervaloout,3);
            
            $hora  = ($hora * 60); 
            $saida = ($hora + $minuto);

            return $saida;
        }
        // ## SAIDA DE INTERVALO DE SAIDA ## //

        // ENCONTRA O VALOR QUE FOI GASTO NO INTERVALO //
        $sub_total = (interval_out($intervaloout) - interval_in($intervaloin));
        
        
        // ## SE PASSAR DE 15 MINUTOS ENTAO ENTRA COMO ATRASO ## //
        if($sub_total > $max)
        {
            $diferenca = ($sub_total - $max);
            $carAtraso = ($carAtraso + $diferenca);
            $carMinuto = ($carMinuto - $diferenca);
            $carHora   = ($carHora * 60);
             // ## SALVANDO OS DADOS NA TABELA ## //
            mysqli_query($con,"UPDATE carga_horaria SET carIntervaloIn = '$intervaloin', carIntervaloOut = '$intervaloout', carAtraso = '$carAtraso', carMinuto = '$carMinuto', carHora = '$carHora'  WHERE carCodigo = '$editar'");
        }

        else
        {
            // ## SALVANDO OS DADOS NA TABELA ## //
            mysqli_query($con,"UPDATE carga_horaria SET carIntervaloIn = '$intervaloin', carIntervaloOut = '$intervaloout', carMinuto = '$carMinuto', carHora = '$carHora'  WHERE carCodigo = '$editar'");
        }    
        
// ##################################################################################################### //
// ##################################################################################################### //


        // ## APONTANDO PARA FORM CARGA HORARIA ## //
        header('Location:carga-hora.php');
    
?>