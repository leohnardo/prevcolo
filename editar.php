<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html class="supernova"><head>

<title>PREVCOLO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<link rel="alternate" type="application/json+oembed" href="https://www.jotform.com/oembed/?format=json&amp;url=http%3A%2F%2Fwww.jotform.com%2Fform%2F72202893033652" title="oEmbed Form"><link rel="alternate" type="text/xml+oembed" href="https://www.jotform.com/oembed/?format=xml&amp;url=http%3A%2F%2Fwww.jotform.com%2Fform%2F72202893033652" title="oEmbed Form">
<meta property="og:title" content="Cadastro de Paciente" >
<meta property="og:url" content="http://www.jotformz.com/form/72202893033652" >
<meta property="og:description" content="Please click the link to complete this form.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>Prontuário do Paciente</title>
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.1461" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.1461" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.1461" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?"/>

<?php
error_reporting(1);
session_start();

     $conexao = new mysqli( "localhost", "u226274981_dbleo", "leo666", "u226274981_dbleo" );  
if ( $conexao->connect_error == true ) {
  
  echo "Erro ao Conectar";

}

// Obter ID via GET
$prev_id = $_GET["prev_id"];


// Verifica se o ID não foi passado via GET
if ( $prev_id == NULL ) {

  echo "A identificação não foi encontrada!";
  exit;

}


$sqlconsulta = "SELECT * 
        FROM preventivo 
        WHERE prev_id = $prev_id";

$retorno = $conexao->query( $sqlconsulta );

// Deu erro?
if ( $retorno == false ) {
  echo $conexao->error;
}

$registro = $retorno->fetch_array();

// obtem os campos do registro
$prev_id = $registro["prev_id"]; 
$cns = $registro["cns"];
$nome_paciente = $registro["nome_paciente"];
$data_nasc = implode("-", array_reverse(explode("/", $registro['data_nasc'])));
$telefone = $registro["telefone"];
$motivo_anamnese = $registro["motivo_anamnese"];
$exame_citopatologico = $registro["exame_citopatologico"];
$data_citopatologico = $registro["data_citopatologico"];
$data_ultima_mens = $registro["data_ultima_mens"];
$com_sangramento = $registro["com_sangramento"];
$sangue_apos_menopausa = $registro["sangue_apos_menopausa"];
$inspecao = $registro["inspecao"];
$sinais_infec = $registro["sinais_infec"];
$limite_material = $registro["limite_material"];
$alteracoes_celulares = $registro["alteracoes_celulares"];
$celulas_atipicas = $registro["celulas_atipicas"];
$atipias_esca = $registro["atipias_esca"];
$atipias_gland = $registro["atipias_gland"];
$outrasinfo = $registro["outrasinfo"];
$acompanhamento = $registro["acompanhamento"];
$mesretorno = $registro["mesretorno"];


if ($_POST != NULL) {
  
$cns = $_POST["cns"];
$nome_paciente = $_POST["nome_paciente"];
$data_nasc = implode("-", array_reverse(explode("/", $_POST['data_nasc'])));
$telefone = $_POST["telefone"];
$motivo_anamnese = $_POST["motivo_anamnese"];
$exame_citopatologico = $_POST["exame_citopatologico"];
$data_citopatologico = $_POST["data_citopatologico"];
$data_ultima_mens = $_POST["data_ultima_mens"];
$com_sangramento = $_POST["com_sangramento"];
$sangue_apos_menopausa = $_POST["sangue_apos_menopausa"];
$inspecao = $_POST["inspecao"];
$sinais_infec = $_POST["sinais_infec"];
$limite_material = $_POST["limite_material"];
$alteracoes_celulares = $_POST["alteracoes_celulares"];
$celulas_atipicas = $_POST["celulas_atipicas"];
$atipias_esca = $_POST["atipias_esca"];
$atipias_gland = $_POST["atipias_gland"];
$outrasinfo = $_POST["outrasinfo"];
$acompanhamento = $_POST["acompanhamento"];
$mesretorno = $_POST["mesretorno"];

$sql = "UPDATE preventivo SET cns = '$cns', 
                              nome_paciente = '$nome_paciente', 
                              data_nasc ='$data_nasc', 
                              telefone ='$telefone',
                              motivo_anamnese ='$motivo_anamnese',
                              exame_citopatologico ='$exame_citopatologico',
                              data_citopatologico ='$data_citopatologico', 
                              data_ultima_mens ='$data_ultima_mens',
                              com_sangramento ='$com_sangramento', 
                              sangue_apos_menopausa ='$sangue_apos_menopausa', 
                              inspecao ='$inspecao', 
                              sinais_infec ='$sinais_infec', 
                              limite_material ='$limite_material', 
                              alteracoes_celulares ='$alteracoes_celulares', 
                              celulas_atipicas ='$celulas_atipicas', 
                              atipias_esca ='$atipias_esca', 
                              atipias_gland ='$atipias_gland', 
                              outrasinfo ='$outrasinfo', 
                              acompanhamento ='$acompanhamento',
                              mesretorno ='$mesretorno'
                              WHERE (prev_id = $prev_id)";


  $retorno = $conexao->query( $sql );
 
  // Executou?
  if ( $retorno == true ) {
    
    echo "<script>
        alert('Registro atualizado com sucesso!');
        location.href='main.php';
        </script>";
    
  // Deu erro..
  } else {

    echo "<script>
        alert('Erro ao atualizar!');
        </script>";
    
    echo $conexao->error;
    
  }
  
}

?>

<style type="text/css">
    .form-label-left{
        width:50px !important;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:50px !important;
    }
    body, html{
        margin:0;
        padding:0;
        background:#fff;
    }

    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:800px;
        color:rgba(0,0,0,0.57) !important;
        font-family:'Verdana';
        font-size:14px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color: #555;
    }

</style>

<style type="text/css" id="form-designer-style">
    /* Injected CSS Code */
.form-label.form-label-auto {
        
      display: block;
      float: none;
      text-align: left;
      width: 100%;
    
      }.form-all {
       font-family: "Verdana", sans-serif;
       
}
.form-all {
  width: 800px;
  width: 100%;
  max-width: 800px;
}
.form-label-left,
.form-label-right {
  width: 50px;
}
.form-label {
  white-space: normal;
}

.form-label-left {
  display: inline-block;
  white-space: normal;
  float: left;
  text-align: left;
}
.form-label-right {
  display: inline-block;
  white-space: normal;
  float: left;
  text-align: right;
}
.form-label-top {
  white-space: normal;
  display: block;
  float: none;
  text-align: left;
}
.form-all {
  font-size: 14px;
}
.form-label {
  font-weight: normal;
  font-size: 0.95em;
}

.supernova body {
  background-color: transparent;
}
/*
@width30: (unit(@formWidth, px) + 60px);
@width60: (unit(@formWidth, px)+ 120px);
@width90: (unit(@formWidth, px)+ 180px);
*/
/* | */
@media screen and (min-width: 480px) {
  .supernova .form-all {
    border: 1px solid #dcdcdc;
    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.1);
    box-shadow: 0 3px 9px rgba(0, 0, 0, 0.1);
  }
}
/* | */
/* | */
@media screen and (max-width: 480px) {
  .jotform-form {
    padding: 10px 0;
  }
}
/* | */
/* | */
@media screen and (min-width: 480px) and (max-width: 768px) {
  .jotform-form {
    padding: 30px 0;
  }
}
/* | */
/* | */
@media screen and (min-width: 480px) and (max-width: 799px) {
  .jotform-form {
    padding: 30px 0;
  }
}
/* | */
/* | */
@media screen and (min-width: 768px) {
  .jotform-form {
    padding: 60px 0;
  }
}
/* | */
/* | */
@media screen and (max-width: 799px) {
  .jotform-form {
    padding: 0;
  }
}
/* | */
.supernova .form-all,
.form-all {
  background-color: #ffffff;
  border: 1px solid transparent;
}
.form-header-group {
  border-color: #e6e6e6;
}
.form-matrix-table tr {
  border-color: #e6e6e6;
}
.form-matrix-table tr:nth-child(2n) {
  background-color: #f2f2f2;
}
.form-all {
  color: #555555;
}
.form-header-group .form-header {
  color: #555555;
}
.form-header-group .form-subHeader {
  color: #6f6f6f;
}
.form-sub-label {
  color: #6f6f6f;
}
.form-label-top,
.form-label-left,
.form-label-right,
.form-html {
  color: #6f6f6f;
}
.form-checkbox-item label,
.form-radio-item label {
  color: #555555;
}
.form-line.form-line-active {
  -webkit-transition-property: all;
  -moz-transition-property: all;
  -ms-transition-property: all;
  -o-transition-property: all;
  transition-property: all;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  -ms-transition-duration: 0.3s;
  -o-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-timing-function: ease;
  -moz-transition-timing-function: ease;
  -ms-transition-timing-function: ease;
  -o-transition-timing-function: ease;
  transition-timing-function: ease;
  background-color: #ffffe0;
}
/* ömer */
.form-radio-item,
.form-checkbox-item {
  padding-bottom: 0px !important;
}
.form-radio-item:last-child,
.form-checkbox-item:last-child {
  padding-bottom: 0;
}
/* ömer */
[data-type="control_radio"] .form-input,
[data-type="control_checkbox"] .form-input,
[data-type="control_radio"] .form-input-wide,
[data-type="control_checkbox"] .form-input-wide {
  width: 100%;
  max-width: 800px;
}
.form-radio-item,
.form-checkbox-item {
  width: 100%;
  max-width: 800px;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.form-textbox.form-radio-other-input,
.form-textbox.form-checkbox-other-input {
  width: 80%;
  margin-left: 3%;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.form-multiple-column {
  width: 100%;
}
.form-multiple-column .form-radio-item,
.form-multiple-column .form-checkbox-item {
  width: 10%;
}
.form-multiple-column[data-columncount="1"] .form-radio-item,
.form-multiple-column[data-columncount="1"] .form-checkbox-item {
  width: 100%;
}
.form-multiple-column[data-columncount="2"] .form-radio-item,
.form-multiple-column[data-columncount="2"] .form-checkbox-item {
  width: 50%;
}
.form-multiple-column[data-columncount="3"] .form-radio-item,
.form-multiple-column[data-columncount="3"] .form-checkbox-item {
  width: 33.33333333%;
}
.form-multiple-column[data-columncount="4"] .form-radio-item,
.form-multiple-column[data-columncount="4"] .form-checkbox-item {
  width: 25%;
}
.form-multiple-column[data-columncount="5"] .form-radio-item,
.form-multiple-column[data-columncount="5"] .form-checkbox-item {
  width: 20%;
}
.form-multiple-column[data-columncount="6"] .form-radio-item,
.form-multiple-column[data-columncount="6"] .form-checkbox-item {
  width: 16.66666667%;
}
.form-multiple-column[data-columncount="7"] .form-radio-item,
.form-multiple-column[data-columncount="7"] .form-checkbox-item {
  width: 14.28571429%;
}
.form-multiple-column[data-columncount="8"] .form-radio-item,
.form-multiple-column[data-columncount="8"] .form-checkbox-item {
  width: 12.5%;
}
.form-multiple-column[data-columncount="9"] .form-radio-item,
.form-multiple-column[data-columncount="9"] .form-checkbox-item {
  width: 11.11111111%;
}
.form-single-column .form-checkbox-item,
.form-single-column .form-radio-item {
  width: 100%;
}
.supernova {
  height: 100%;
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-position: center top;
  background-repeat: repeat;
}
.supernova {
  background-image: none;
}
#stage {
  background-image: none;
}
/* | */
.form-all {
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-position: center top;
  background-repeat: repeat;
}
.form-header-group {
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-position: center top;
}
.form-line {
  margin-top: 0px;
  margin-bottom: 0px;
}
.form-line {
  padding: 0px 12px;
}
.form-all .form-textbox,
.form-all .form-radio-other-input,
.form-all .form-checkbox-other-input,
.form-all .form-captcha input,
.form-all .form-spinner input,
.form-all .form-pagebreak-back,
.form-all .form-pagebreak-next,
.form-all .qq-upload-button,
.form-all .form-error-message {
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
}
.form-all .form-sub-label {
  margin-left: 3px;
}
.form-all .form-textarea {
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
}
.form-all {
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0px;
}
.form-section:first-child {
  -webkit-border-radius: 0px 0px 0 0;
  -moz-border-radius: 0px 0px 0 0;
  border-radius: 0px 0px 0 0;
}
.form-section:last-child {
  -webkit-border-radius: 0 0 0px 0px;
  -moz-border-radius: 0 0 0px 0px;
  border-radius: 0 0 0px 0px;
}
.form-all .qq-upload-button,
.form-all .form-submit-button,
.form-all .form-submit-reset,
.form-all .form-submit-print {
  font-size: 1em;
  padding: 9px 15px;
  font-family: "Verdana", sans-serif;
  font-size: 10px;
  font-weight: normal;
}
.form-all .form-pagebreak-back,
.form-all .form-pagebreak-next {
  font-size: 1em;
  padding: 9px 15px;
  font-family: "Verdana", sans-serif;
  font-size: 10px;
  font-weight: normal;
}
/*
& when ( @buttonFontType = google ) {
  @import (css) "@{buttonFontLink}";
}
*/
h2.form-header {
  line-height: 1.618em;
  font-size: 1.714em;
}
h2 ~ .form-subHeader {
  line-height: 1.5em;
  font-size: 1.071em;
}
.form-header-group {
  text-align: left;
}
.form-line {
  zoom: 1;
}
.form-line:before,
.form-line:after {
  display: table;
  content: '';
  line-height: 0;
}
.form-line:after {
  clear: both;
}
.form-sub-label-container {
  margin-right: 0;
  float: left;
  white-space: nowrap;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.form-sub-label-container .date-separate {
  visibility: hidden;
}
.form-captcha input,
.form-spinner input {
  width: 800px;
}
.form-textbox,
.form-textarea {
  width: 100%;
  max-width: 800px;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.form-input,
.form-address-table,
.form-matrix-table {
  width: 100%;
  max-width: 800px;
}
.form-radio-item,
.form-checkbox-item {
  width: 100%;
  max-width: 800px;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.form-textbox.form-radio-other-input,
.form-textbox.form-checkbox-other-input {
  width: 80%;
  margin-left: 3%;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.form-multiple-column {
  width: 100%;
}
.form-multiple-column .form-radio-item,
.form-multiple-column .form-checkbox-item {
  width: 10%;
}
.form-multiple-column[data-columncount="1"] .form-radio-item,
.form-multiple-column[data-columncount="1"] .form-checkbox-item {
  width: 100%;
}
.form-multiple-column[data-columncount="2"] .form-radio-item,
.form-multiple-column[data-columncount="2"] .form-checkbox-item {
  width: 50%;
}
.form-multiple-column[data-columncount="3"] .form-radio-item,
.form-multiple-column[data-columncount="3"] .form-checkbox-item {
  width: 33.33333333%;
}
.form-multiple-column[data-columncount="4"] .form-radio-item,
.form-multiple-column[data-columncount="4"] .form-checkbox-item {
  width: 25%;
}
.form-multiple-column[data-columncount="5"] .form-radio-item,
.form-multiple-column[data-columncount="5"] .form-checkbox-item {
  width: 20%;
}
.form-multiple-column[data-columncount="6"] .form-radio-item,
.form-multiple-column[data-columncount="6"] .form-checkbox-item {
  width: 16.66666667%;
}
.form-multiple-column[data-columncount="7"] .form-radio-item,
.form-multiple-column[data-columncount="7"] .form-checkbox-item {
  width: 14.28571429%;
}
.form-multiple-column[data-columncount="8"] .form-radio-item,
.form-multiple-column[data-columncount="8"] .form-checkbox-item {
  width: 12.5%;
}
.form-multiple-column[data-columncount="9"] .form-radio-item,
.form-multiple-column[data-columncount="9"] .form-checkbox-item {
  width: 11.11111111%;
}
[data-type="control_dropdown"] .form-dropdown {
  width: 100% !important;
  max-width: 800px;
}
[data-type="control_fullname"] .form-sub-label-container {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  width: 48%;
}
[data-type="control_fullname"] .form-sub-label-container:first-child {
  margin-right: 4%;
}
[data-type="control_phone"] .form-sub-label-container {
  width: 65%;
}
[data-type="control_phone"] .form-sub-label-container:first-child {
  width: 32.5%;
  margin-right: 2.5%;
}
[data-type="control_birthdate"] .form-sub-label-container {
  width: 22%;
  margin-right: 3%;
}
[data-type="control_birthdate"] .form-sub-label-container:first-child {
  width: 50%;
}
[data-type="control_birthdate"] .form-sub-label-container:last-child {
  margin-right: 0;
}
[data-type="control_birthdate"] .form-sub-label-container .form-dropdown {
  width: 100%;
}
[data-type="control_time"] .form-sub-label-container {
  width: 37%;
  margin-right: 3%;
}
[data-type="control_time"] .form-sub-label-container:last-child {
  width: 20%;
  margin-right: 0;
}
[data-type="control_time"] .form-sub-label-container .form-dropdown {
  width: 100%;
}
[data-type="control_datetime"] .form-sub-label-container {
  width: 28%;
  margin-right: 4%;
}
[data-type="control_datetime"] .form-sub-label-container:last-child {
  width: 4%;
  margin-right: 0;
}
[data-type="control_datetime"].allowTime .form-sub-label-container {
  width: 12%;
  margin-right: 3%;
}
[data-type="control_datetime"].allowTime .form-sub-label-container:last-child {
  width: 4%;
  margin-right: 0;
}
[data-type="control_datetime"].allowTime .allowTime-container {
  float: right;
  width: 51%;
}
[data-type="control_datetime"].allowTime .allowTime-container .form-sub-label-container {
  width: 27%;
  margin-right: 4%;
}
[data-type="control_datetime"].allowTime .allowTime-container .form-sub-label-container:first-child {
  width: 4%;
  margin-left: 3%;
}
[data-type="control_datetime"].allowTime .allowTime-container .form-sub-label-container:last-child {
  width: 27%;
  margin-right: 0;
}
[data-type="control_datetime"].allowTime .form-dropdown {
  width: 100%;
}
[data-type="control_payment"] .form-sub-label-container {
  width: auto;
}
[data-type="control_payment"] .form-sub-label-container .form-dropdown {
  width: 100%;
}
.form-address-table td .form-dropdown {
  width: 100%;
}
.form-address-table td .form-sub-label-container {
  width: 96%;
}
.form-address-table td:last-child .form-sub-label-container {
  margin-left: 4%;
}
.form-address-table td[colspan="2"] .form-sub-label-container {
  width: 100%;
  margin: 0;
}
.form-line,
.form-input,
.form-input-wide,
.form-dropdown,
.form-sub-label-container,
.form-address-table,
.form-matrix-table {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  width: 100%;
  max-width: none;
}
.form-textbox,
.form-textarea,
.form-radio-item,
.form-checkbox-item,
.form-captcha input,
.form-spinner input,
.form-error-message {
  width: 100%;
  max-width: none;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
/*.form-dropdown,
.form-radio-item,
.form-checkbox-item,
.form-radio-other-input,
.form-checkbox-other-input,*/
.form-captcha input,
.form-spinner input,
.form-error-message {
  padding: 4px 3px 2px 3px;
}
.form-header-group {
  font-family: "Verdana", sans-serif;
}
.form-section {
  padding: 0px 0px 0px 0px;
}
.form-header-group {
  margin: 12px 36px 12px 36px;
}
.form-header-group {
  padding: 24px 0px 24px 0px;
}
.form-textbox,
.form-textarea {
  border-width: 1px;
  padding: 11px 0px 9px 0px;
}
.form-textbox,
.form-textarea,
.form-radio-other-input,
.form-checkbox-other-input,
.form-captcha input,
.form-spinner input {
  background-color: #ffffff;
}
.form-textbox {
  height: 20px;
}
.form-textarea {
  height: 80px;
}
.form-textbox,
.form-textarea {
  width: 100%;
  max-width: 800px;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
[data-type="control_textbox"] .form-input,
[data-type="control_textarea"] .form-input,
[data-type="control_fullname"] .form-input,
[data-type="control_phone"] .form-input,
[data-type="control_datetime"] .form-input,
[data-type="control_address"] .form-input,
[data-type="control_email"] .form-input,
[data-type="control_passwordbox"] .form-input,
[data-type="control_autocomp"] .form-input,
[data-type="control_textbox"] .form-input-wide,
[data-type="control_textarea"] .form-input-wide,
[data-type="control_fullname"] .form-input-wide,
[data-type="control_phone"] .form-input-wide,
[data-type="control_datetime"] .form-input-wide,
[data-type="control_address"] .form-input-wide,
[data-type="control_email"] .form-input-wide,
[data-type="control_passwordbox"] .form-input-wide,
[data-type="control_autocomp"] .form-input-wide {
  width: 100%;
  max-width: 800px;
}
[data-type="control_fullname"] .form-sub-label-container {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  width: 48%;
}
[data-type="control_fullname"] .form-sub-label-container:first-child {
  margin-right: 4%;
}
[data-type="control_phone"] .form-sub-label-container {
  width: 65%;
}
[data-type="control_phone"] .form-sub-label-container:first-child {
  width: 32.5%;
  margin-right: 2.5%;
}
[data-type="control_phone"] .form-sub-label-container .date-separate {
  visibility: hidden;
}
[data-type="control_datetime"] .form-sub-label-container {
  width: 28%;
  margin-right: 4%;
}
[data-type="control_datetime"] .form-sub-label-container:last-child {
  width: 4%;
  margin-right: 0;
}
[data-type="control_datetime"] .form-sub-label-container .date-separate {
  visibility: hidden;
}
[data-type="control_datetime"].allowTime .form-sub-label-container {
  width: 12%;
  margin-right: 3%;
}
[data-type="control_datetime"].allowTime .form-sub-label-container:last-child {
  width: 4%;
  margin-right: 0;
}
[data-type="control_datetime"].allowTime .allowTime-container {
  float: right;
  width: 51%;
}
[data-type="control_datetime"].allowTime .allowTime-container .form-sub-label-container {
  width: 27%;
  margin-right: 4%;
}
[data-type="control_datetime"].allowTime .allowTime-container .form-sub-label-container:first-child {
  width: 4%;
  margin-left: 3%;
}
[data-type="control_datetime"].allowTime .allowTime-container .form-sub-label-container:last-child {
  width: 27%;
  margin-right: 0;
}
[data-type="control_datetime"].allowTime .form-dropdown {
  width: 100%;
}
.form-matrix-table {
  width: 100%;
  max-width: 800px;
}
.form-address-table {
  width: 100%;
  max-width: 800px;
}
.form-address-table td .form-dropdown {
  width: 100%;
}
.form-address-table td .form-sub-label-container {
  width: 96%;
}
.form-address-table td:last-child .form-sub-label-container {
  margin-left: 4%;
}
.form-address-table td[colspan="2"] .form-sub-label-container {
  width: 100%;
  margin: 0;
}
[data-type="control_dropdown"] .form-input,
[data-type="control_birthdate"] .form-input,
[data-type="control_time"] .form-input,
[data-type="control_dropdown"] .form-input-wide,
[data-type="control_birthdate"] .form-input-wide,
[data-type="control_time"] .form-input-wide {
  width: 100%;
  max-width: 800px;
}
[data-type="control_dropdown"] .form-dropdown {
  width: 100% !important;
  max-width: 800px;
}
[data-type="control_birthdate"] .form-sub-label-container {
  width: 22%;
  margin-right: 3%;
}
[data-type="control_birthdate"] .form-sub-label-container:first-child {
  width: 50%;
}
[data-type="control_birthdate"] .form-sub-label-container:last-child {
  margin-right: 0;
}
[data-type="control_birthdate"] .form-sub-label-container .form-dropdown {
  width: 100%;
}
[data-type="control_time"] .form-sub-label-container {
  width: 37%;
  margin-right: 3%;
}
[data-type="control_time"] .form-sub-label-container:last-child {
  width: 20%;
  margin-right: 0;
}
[data-type="control_time"] .form-sub-label-container .form-dropdown {
  width: 100%;
}
.form-label {
  margin-right: 4px;
  margin-bottom: 0;
}
.form-label {
  font-family: "Verdana", sans-serif;
}
li[data-type="control_image"] div {
  text-align: left;
}
li[data-type="control_image"] img {
  border: none;
  border-width: 0px !important;
  border-style: solid !important;
  border-color: false !important;
}
.form-line-column {
  width: auto;
}
.form-line-error {
  overflow: hidden;
  -webkit-transition-property: none;
  -moz-transition-property: none;
  -ms-transition-property: none;
  -o-transition-property: none;
  transition-property: none;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  -ms-transition-duration: 0.3s;
  -o-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-timing-function: ease;
  -moz-transition-timing-function: ease;
  -ms-transition-timing-function: ease;
  -o-transition-timing-function: ease;
  transition-timing-function: ease;
  background-color: #fff4f4;
}
.form-line-error .form-error-message {
  background-color: #ff3200;
  clear: both;
  float: none;
}
.form-line-error .form-error-message .form-error-arrow {
  border-bottom-color: #ff3200;
}
.form-line-error input:not(#coupon-input),
.form-line-error textarea,
.form-line-error .form-validation-error {
  border: 1px solid #ff3200;
  -webkit-box-shadow: 0 0 3px #ff3200;
  -moz-box-shadow: 0 0 3px #ff3200;
  box-shadow: 0 0 3px #ff3200;
}
.form-collapse-table {
  padding-left: 20px;
  padding-right: 20px;
  padding-top: 10px;
  padding-bottom: 10px;
  height: auto;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  max-height: 60px;
  overflow: hidden;
  margin-top: 10px;
  margin-bottom: 10px;
  margin-left: 30px;
  margin-right: 30px;
}
.form-collapse-table .form-collapse-mid {
  margin-right: 0;
  margin-left: 0;
}
.form-collapse-table .form-collapse-mid {
  margin-top: 0;
  margin-bottom: 0;
}
.form-collapse-table .form-collapse-right {
  height: 24px;
  top: 50%;
}
.form-collapse-table .form-collapse-right-show {
  margin-top: -15px;
}
.form-collapse-table .form-collapse-right-hide {
  margin-top: -12px;
}
.ie-8 .form-all {
  margin-top: auto;
  margin-top: initial;
}
.ie-8 .form-all:before {
  display: none;
}
/* | */
@media screen and (max-width: 480px), screen and (max-device-width: 768px) and (orientation: portrait), screen and (max-device-width: 415px) and (orientation: landscape) {
  .jotform-form {
    padding: 0;
  }
  .form-all {
    border: 0;
    width: 100% !important;
    max-width: initial;
  }
  .form-sub-label-container {
    width: 100%;
    margin: 0;
  }
  .form-input {
    width: 100%;
  }
  .form-label {
    width: 100%!important;
  }
  .form-line {
    padding: 2% 5%;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
  }
  input[type=text],
  input[type=email],
  input[type=tel],
  textarea {
    width: 100%;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    max-width: initial !important;
  }
  .form-input,
  .form-input-wide,
  .form-textarea,
  .form-textbox,
  .form-dropdown {
    max-width: initial !important;
  }
  div.form-header-group {
    padding: 24px 0px !important;
    margin: 0 12px 2% !important;
    margin-left: 5% !important;
    margin-right: 5% !important;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
  }
  [data-type="control_button"] {
    margin-bottom: 0 !important;
  }
  .form-buttons-wrapper {
    margin: 0!important;
  }
  .form-buttons-wrapper button {
    width: 100%;
  }
  table {
    width: 100%!important;
    max-width: initial !important;
  }
  table td + td {
    padding-left: 3%;
  }
  .form-checkbox-item input,
  .form-radio-item input {
    width: auto;
  }
  .form-collapse-table {
    margin: 0 5%;
  }
}

  
  /*PREFERENCES STYLE*//*__INSPECT_SEPERATOR__*/
    /* Injected CSS Code */
</style>

<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/buttons/form-submit-button-simple_black.css?3.3.1461"/>

</script>
</head>
<body>

<!-- header top section -->
<style type="text/css">

#menu {
  width: 50%;
  background: #eee;
  float: right;
  border-radius: 2px;
}

#menu ul {
  margin: 0;
  padding: 0;
  list-style: none;
  width: 99%;
  float: right;

}

#menu ul li {
  float: left;
  font: 14px Verdana;
}

#menu ul li a {
  color: #888;
  text-decoration: none;
  padding: 11px;
  display: block;
  float: left;
}

#menu ul li:hover {
  background: #efee;
}


.paragrafo, .home:hover {         
  color: #00ccff;       
}


</style>

</style>
  <div id="menu">


<style type="text/css">
  
  .wm-tooltip{
    position:relative;
}

.wm-tooltip:after
{
    font-size: 10px;
    background-color:rgba(0, 0, 0, .6);
    color: white;
    box-sizing:border-box;
    content: attr(data-tooltip);
    display:none;
    padding:5px;
    position:absolute;
    right: -150px;
    bottom: -70px;
    z-index:3;
    box-shadow: 0 0 3px #fff;
    border-radius: 0px 10px 10px 10px;
}

.wm-tooltip:hover:after {
    display:block;
}
</style>
      <ul>
        
        <li> 
        <a href="main.php" class="wm-tooltip" data-tooltip="Tela Inicial da Tecnologia">Principal</a>
        </li>
        <li> 
        <a href="cadastrar.php" class="wm-tooltip" data-tooltip="Acesso ao prontuário do paciente para coleta de exames e acrescentar o resultado dos exames.">Cadastrar</a>
        </li>

        <li> 
        <a href="lista.php" class="wm-tooltip" data-tooltip="Está disponível a lista de mulheres elegíveis para coleta do exame citopatológico por Agente Comunitário de Saúde.">Lista Elegíveis</a>
        </li>

        <li> 
        <a href="list-prev.php" class="wm-tooltip" data-tooltip="Acesso ao prazo de retorno das mulheres atendidas obtido pelo resultado do exame" >Base de Dados </a>
        </li>
        
        <li> 
        <a href="https://auth-db100.hostinger.com.br/" class="wm-tooltip" data-tooltip="Acesso ao banco de dados no módulo administrador" > Admin </a>
        </li>

        <li> <span class="print"> </span>
        <a class="wm-tooltip" data-tooltip="Impressão da tela ativa" onclick='window.print()'> Imprimir </a>
        </li>
        <li> <span class="sair"> </span>
        <a class="wm-tooltip" href="index.php"> Finalizar </a>
        </li>
    </ul>
</div>
</style> 

<link rel="stylesheet" type="text/css" href="css\style.css">
<section class="banner" role="banner">
  <header id="header">
    <div class="header-content clearfix"> <a class="logo" href="index.php"><img src="img/logonovo.png" alt=""></a>
      <nav class="navigation" role="navigation">
      </nav>
      </div>
  </header>
</section>

<form class="jotform-form"  method="post" name="Cadastrar" id="72202893033652" accept-charset="utf-8">
  <input type="hidden" name="formID" value="72202893033652" />
  <div class="form-all">
    <link type="text/css" rel="stylesheet" media="all" href="https://cdn.jotfor.ms/wizards/languageWizard/custom-dropdown/css/lang-dd.css?3.3.1461" />
    <div class="cont">
      <input type="text" id="input_language" name="input_language" style="display:none" />
      <div class="language-dd" id="langDd" style="display:none">
        <div class="dd-placeholder lang-emp">
          Language
        </div>
        <ul class="lang-list dn" id="langList">
          <li data-lang="pt-BR" class="pt-BR">
            Portuguese (Brazil)
          </li>
        </ul>
      </div>
    </div>
    <script type="text/javascript" src="https://cdn.jotfor.ms/js/formTranslation.v2.js?3.3.1461"></script>
    <ul class="form-section page-section">
      <li id="cid_87" class="form-input-wide" data-type="control_head">
        <div class="form-header-group ">
          <div class="header-text httac htvam">
            <h1 id="header_87" class="form-header" data-component="header">
              - PRONTUÁRIO -
            </h1>
            <div id="subHeader_87" class="form-subHeader">
                - Exames Citopatológicos de Colo de Útero -
            </div>
          </div>
        </div>
          <hr style="height: 4px; background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);  border:none" width="90%">
      </li>
<br/>
      <li class="form-line" data-type="control_text" id="id_107">
        <div id="cid_107" class="form-input-wide">
          <div id="text_107" class="form-html" data-component="text">
            <p><strong><span style="color: #000000; font-size: 12pt;">Dados</span></strong></p>
            <p> </p>
            <p> </p>
          </div>
        </div>
      </li>
      <li class="form-line" data-type="control_textbox" id="id_232">
                    <label class="form-label form-label-top" for="input_232" style="min-height:13px;"><b>Nome</b></label>

        <div id="cid_232" class="form-input-wide jf-required">

          <span class="form-sub-label-container" style="vertical-align:top; width:75%;">
            <input type="text" id="input_232" name="nome_paciente" data-type="input-textbox" class="form-textbox" size="20" value="<?php echo $nome_paciente; ?>" data-component="textbox" />

          </span>
        </div>
      </li>

      <li class="form-line" data-type="control_textbox" id="id_239">
            <label class="form-label form-label-top" for="input_239" style="min-height:13px;"><b> CNS </b></label>
        <div id="cid_239" class="form-input-wide jf-required">
          <span class="form-sub-label-container" style="vertical-align:top; width:75%;">
            <input type="text" id="input_239" name="cns" data-type="input-textbox" class="form-textbox" size="20" value="<?php echo $cns; ?>" data-component="textbox" />
          </span>
        </div>
      </li>

      <li class="form-line form-line form-col-3" data-type="control_datetime" id="id_206">
        <div id="cid_206" class="form-input-wide jf-required">
          <div data-wrapper-react="true">
                   <label class="form-label form-label-top" id="label_206" for="lite_mode_206"><b> Data de Nascimento </label>

            <span class="form-sub-label-container" style="vertical-align:top; width:75%;">
              <input name="data_nasc" class="form-date validate[limitDate, validateLiteDate]" id="lite_mode_206" style="font-size: 12px" type="date" size="15" data-maxlength="15"  value="<?php echo $data_nasc; ?>"  data-format="ddmmyyyy" data-seperator="/" placeholder="dd/mm/yyyy" />
              <label class="form-sub-label" for="lite_mode_206" id="sublabel_litemode" style="min-height:13px;">  </label>
            </span>
            <span class="form-sub-label-container" style="vertical-align:top; width:15%;">
            </span>
          </div>
        </div>
      </li>



      <li class="form-line form-line-column form-col-1" data-type="control_textbox" id="id_240">
          <label class="form-label form-label-top" for="input_240" style="min-height:13px;"> <b>Telefone</b> </label>
        <div id="cid_240" class="form-input-wide jf-required">
          <span class="form-sub-label-container" style="vertical-align:top; width:75%;">
            <input type="text" id="input_240" name="telefone" data-type="input-textbox" class="form-textbox" size="20" value="<?php echo $telefone; ?>" data-component="textbox" placeholder="(xx) xxxx-xxxx" />
          </span>
        </div>
      </li>
  
  
      <li class="form-line" data-type="control_text" id="id_107">
        <div id="cid_107" class="form-input-wide">
          <div id="text_107" class="form-html" data-component="text">
              <hr style="height: 4px; background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);  border:none" width="90%">
            <p><strong><span style="color: #000000; font-size: 12pt;">Anamnese</span></strong></p>
            
            <p> </p>
          </div>
        </div>
      </li>


<li class="form-line form-line-column form-col-1 form-line-column-clear" data-type="control_dropdown" id="id_999">
        <label class="form-label form-label-top"  style="position:center font-size:" id="label_999" for="input_999"><strong>  1. Motivo do Exame </strong></label>
        <div " id="cid_999" class="form-input-wide jf-required">
          <select class="form-dropdown" id="input_999" name="motivo_anamnese" style="width:150px;" data-component="dropdown">
           <option value=""> Selecione </option>
           <option <?php if ($motivo_anamnese == "Rastreamento") echo "selected"; ?> value="Rastreamento"> Rastreamento </option>
           <option <?php if ($motivo_anamnese == "Repeticao") echo "selected"; ?> value="Repetição"> Repetição </option>
           <option <?php if ($motivo_anamnese == "Seguimento") echo "selected"; ?> value="Seguimento"> Seguimento </option>
          </select> <br/><br/>
        </div>

  <li class="form-line form-line-column form-col-1 form-line-column-clear" data-type="control_dropdown" id="id_998">
        <label class="form-label form-label-top"  style="position:center font-size:" id="label_294" for="input_998"> <br/><strong> 2. Já fez o exame Citopatológico </strong></label>
        <div " id="cid_998" class="form-input-wide jf-required">
      <li class="form-line" data-type="control_radio" id="id_998">
        <div id="cid_998" class="form-input-wide jf-required">
          
          <div class="form-single-column" data-component="radio">
            <span class="form-radio-item" style="clear:left;">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_998_0" name="exame_citopatologico" <?php if ($exame_citopatologico == "Sim") echo "checked"; ?>  value="Sim" />
              <label id="label_input_998_0" style="font-size: 12px" for="input_998_0"> Sim </label>
            </span>
            <span class="form-radio-item" style="clear:left;">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_998_1" name="exame_citopatologico"  <?php if ($exame_citopatologico == "Nao") echo "checked"; ?> value="Nao" />
              <label id="label_input_998_1" style="font-size: 12px" for="input_998_1"> Não </label>
            </span>
          </div>
        </div>
      </li>
      <li class="form-line form-line-column form-col-1" data-type="control_datetime" id="id_989">
        <div id="cid_989" class="form-input-wide jf-required">
          <div data-wrapper-react="true">
                    <label class="form-label form-label-top"  style="position:center font-size:" id="label_989" for="lite_mode_989"><strong> Data do Exame: </strong></label>
           <span class="form-sub-label-container" style="vertical-align:top; width:90%;">
              <input name="data_citopatologico" class="form-date validate[limitDate, validateLiteDate]" id="lite_mode_989" type="date" style="font-size: 12px" size="15" data-maxlength="15" value="<?php echo $data_citopatologico; ?>" data-format="ddmmyyyy" data-seperator="/" placeholder="dd/mm/yyyy" />

              <label class="form-sub-label" for="lite_mode_989" id="sublabel_litemode" style="min-height:13px;">  </label>
            </span>
            <span class="form-sub-label-container" style="vertical-align:top; width:15%;">
            </span>
          </div>
        </div>
      </li>

<li class="form-line form-line-column form-col-1 form-line-column-clear" data-type="control_dropdown" id="id_295">
        <label class="form-label form-label-top"  style="position:center font-size:" id="label_295" for="input_295"> <strong>  3. Data da Ultima Menstruação </strong></label>
        <div " id="cid_295" class="form-input-wide jf-required">
 <input class="form-date validate[limitDate, validateLiteDate]" name="data_ultima_mens" id="lite_mode_295" type="date" style="font-size: 12px" size="15" data-maxlength="15" value="<?php echo $data_ultima_mens; ?>" data-format="ddmmyyyy" data-separator="/" placeholder="dd/mm/yyyy" />

      <li class="form-line" data-type="control_radio" id="id_294">
        <label class="form-label form-label-top" id="label_294" for="input_294_11"><br/><b>4. Sangramento após a relação Sexual </label>
        <div id="cid_294" class="form-input-wide jf-required">
          
          <div class="form-single-column" data-component="radio">
            <span class="form-radio-item" style="clear:left;">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_294_12" name="com_sangramento" <?php if ($com_sangramento == "Sim") echo "checked"; ?> value="Sim" /> 
              <label id="label_input_294_0" style="font-size: 12px" for="input_294_0"> Sim </label>
            </span>
            <span class="form-radio-item" style="clear:left;">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_167_1" name="com_sangramento" <?php if ($com_sangramento == "Nao") echo "checked"; ?> value="Nao" /> 
              <label id="label_input_294_1" style="font-size: 12px" for="input_294_1"> Não </label>
            </span>
          </div>
        </div>
      </li> 

            <li class="form-line" data-type="control_radio" id="id_293">
        <label class="form-label form-label-top" id="label_293" for="input_293_2"><b> 5. Sangramento após a menopausa </label>
        <div id="cid_293" class="form-input-wide jf-required">
          
          <div class="form-single-column" data-component="radio">
            <span class="form-radio-item" style="clear:left;">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_293_0" name="sangue_apos_menopausa" <?php if ($sangue_apos_menopausa == "Sim") echo "checked"; ?> value="Sim" /> 
              <label id="label_input_293_0" style="font-size: 12px" for="input_293_0"> Sim </label>
            </span>
            <span class="form-radio-item" style="clear:left;">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_293_1" name="sangue_apos_menopausa" <?php if ($sangue_apos_menopausa == "Nao") echo "checked"; ?> value="Nao" /> 
              <label id="label_input_293_1" style="font-size: 12px" for="input_293_1"> Não </label>
            </span>
          </div>
        </div>
      </li> 
  
      <li class="form-line" data-type="control_text" id="id_292">
        <div id="cid_292" class="form-input-wide">
          <div id="text_292" class="form-html" data-component="text">
              <hr style="height: 4px; background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);  border:none" width="90%">
            <p><strong><span style="color: #000000; font-size: 12pt;">Exame Clínico</span></strong></p>
            <p> </p>
            
          </div>
        </div>
      </li>

      <li class="form-line form-line-column form-col-2" data-type="control_dropdown" id="id_291">
        <label class="form-label form-label-top" id="label_291" for="input_291"> <b> 1. Inspeção do Colo</b>  </label>
        <div id="cid_291" class="form-input-wide jf-required">
          <span class="form-sub-label-container" style="vertical-align:top; width:100%;">
            <select class="form-dropdown" id="input_291" name="inspecao" style="width:150px;" data-component="dropdown">
                <option value=""> Selecione </option>
                <option <?php if ($inspecao == "Normal") echo "selected"; ?> value="Normal"> Normal </option>
                <option <?php if ($inspecao == "Ausente") echo "selected"; ?> value="Ausente"> Ausente </option>
                <option <?php if ($inspecao == "Alterado") echo "selected"; ?> value="Alterado"> Alterado </option>
            </select>
            <label class="form-label form-label-top" for="input_291" style="min-height:13px;"></label>
          </span>
        </div>
      </li>  

  <li class="form-line" data-type="control_radio" id="id_290">
        <label class="form-label form-label-top" id="label_290" for="input_290"><b> 2. Sinais sugestivos de infecção sexualmente transmissiveis  </b> </label>
        <div id="cid_290" class="form-input-wide jf-required">
          
          <div class="form-single-column" data-component="radio">
            <span class="form-radio-item" style="clear:left;">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_290_0" name="sinais_infec" <?php if ($sinais_infec == "Sim") echo "checked"; ?> value="Sim" /> 
              <label id="label_input_290_0" style="font-size: 12px" for="input_167_0"> Sim </label>
            </span>
            <span class="form-radio-item" style="clear:left;">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_290_1" name="sinais_infec" <?php if ($sinais_infec == "Nao") echo "checked"; ?> value="Nao" />
              <label id="label_input_290_1" style="font-size: 12px" for="input_167_1"> Não </label>
            </span>
          </div>
        </div>
      </li>
  
      <li class="form-line" data-type="control_text" id="id_289">
        <div id="cid_289" class="form-input-wide">
          <div id="text_289" class="form-html" data-component="text">
              <hr style="height: 4px; background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);  border:none" width="90%">
            <p><strong><span style="color: #000000; font-size: 12pt;">Resultado</span></strong></p> 
            <p> </p>
          </div>
        </div>
      </li>

                 <li class="form-line" data-type="control_radio" id="id_288">
        <label class="form-label form-label-top" id="label_1288" for="input_288"> <b>1. Dentro do Limite da normalidade no material examinado </label>
        <div id="cid_288" class="form-input-wide jf-required"> 
          
          <div class="form-single-column" data-component="radio">
            <span class="form-radio-item" style="clear:left;">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_288_0" name="limite_material" <?php if ($limite_material == "Sim") echo "checked"; ?> value="Sim" />
              <label id="label_input_288_0" style="font-size: 12px" for="input_288_0"> Sim </label>
            </span>
            <span class="form-radio-item" style="clear:left;">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_288_1" name="limite_material" <?php if ($limite_material == "Nao") echo "checked"; ?> value="Nao" />
              <label id="label_input_288_1" style="font-size: 12px" for="input_288_1"> Não </label>
            </span>
          </div>
        </div>
      </li>

      <li class="form-line form-line-column form-col-1 form-line-column-clear" data-type="control_dropdown" id="id_786">
        <label class="form-label form-label-top"  style="position:center" id="label_786" for="input_786"><br/><strong>2. Alterações celulares benignas reativas ou reparativas:<br/></strong></label>
        <div "id="cid_787" class="form-input-wide jf-required">
          <select class="form-dropdown" id="input_787" name="alteracoes_celulares" style="width:150px;" data-component="dropdown">
            <option value=""> <b>Selecione </b></option>

          <option <?php if ($alteracoes_celulares == "Inflamacao") echo "selected"; ?> value="Inflamacao"> Inflamação </option>

          <option <?php if ($alteracoes_celulares == "Metaplasia escamose imatura") echo "selected"; ?> value="Metaplasia escamose imatura"> Metaplasia escamose imatura </option>
          <option <?php if ($alteracoes_celulares == "Reparacao") echo "selected"; ?> value="Reparacao"> Reparação </option>
          <option <?php if ($alteracoes_celulares == "Atrofia com inflamacao") echo "selected"; ?> value="Atrofia com inflamacao"> Atrofia com inflamação </option>
          <option <?php if ($alteracoes_celulares == "Radiacao") echo "selected"; ?> value="Radiacao"> Radiação </option>
          <option <?php if ($alteracoes_celulares == "Outros") echo "selected"; ?> value="Outros"> Outros </option>
          </select>
        </div>


      <li class="form-line form-line-column form-col-1 form-line-column-clear" data-type="control_dropdown" id="id_486">
        <label class="form-label form-label-top"  style="position:center" id="label_486" for="input_486"><br/><strong>3. Celulas atípicas de significado indeterminado:<br/></strong></label>
        <div " id="cid_486" class="form-input-wide jf-required">
          <select class="form-dropdown" id="input_486" name="celulas_atipicas" style="width:150px;" data-component="dropdown">
            <option value=""> <b>Selecione </b></option>
            <option <?php if ($celulas_atipicas == "Escamosas") echo "selected"; ?> value="Escamosas"> Escamosas </option>
            <option <?php if ($celulas_atipicas == "Glandulares") echo "selected"; ?> value="Glandulares"> Glandulares </option>
            <option <?php if ($celulas_atipicas == "De origem indefinida") echo "selected"; ?> value="De origem indefinida"> De origem indefinida </option>
          </select>
        </div>

<li class="form-line form-line-column form-col-1 form-line-column-clear" data-type="control_dropdown" id="id_285">
        <label class="form-label form-label-top"  style="position:center" id="label_285" for="input_285"> <br/><strong>4. Atipias em celulas escamosas <br/></strong></label>
        <div " id="cid_285" class="form-input-wide jf-required">
          <select class="form-dropdown" id="input_285" name="atipias_esca" style="width:150px;" data-component="dropdown">
            <option value=""> <b>Selecione </b></option>
 <option <?php if ($atipias_esca == "Lesao intra-eptelial de baixo grau") echo "selected"; ?> value="Lesao intra-eptelial de baixo grau">Lesão intra-eptelial de baixo grau </option>
<option <?php if ($atipias_esca == "Lesao intra-eptelial de alto grau") echo "selected"; ?> value="Lesão intra-eptelial de alto grau"> Lesão intra-eptelial de alto grau </option>
 <option <?php if ($atipias_esca == "Lesao intra-eptelial de alto grau, nao podendo excluir micro-invasao") echo "selected"; ?> value="Lesao intra-eptelial de alto grau, nao podendo excluir micro-invasao"> Lesão intra-eptelial de alto grau, não podendo excluir micro-invasão </option>
<option <?php if ($atipias_esca == "Carcinoma epidermoide invasor") echo "selected"; ?> value="Carcinoma epidermoide invasor"> Carcinoma epidermoide invasor </option>
          </select>
        </div>

<li class="form-line form-line-column form-col-1 form-line-column-clear" data-type="control_dropdown" id="id_284">
        <label class="form-label form-label-top"  style="position:center font-size:" id="label_284" for="input_284"> <br/><strong> 5.Atipias em celulas glandulares<br/></strong></label>
        <div id="cid_284" class="form-input-wide jf-required">
          <select class="form-dropdown" id="input_284" name="atipias_gland" style="width:150px;" data-component="dropdown">
            <option value=""> <b>Selecione </b></option>
            <option <?php if ($atipias_gland == "Adenocarcinoma In situ") echo "selected"; ?> value="Adenocarcinoma In situ"> Adenocarcinoma 'In situ' </option>
            <option <?php if ($atipias_gland == "Adenocarcinoma Invasor") echo "selected"; ?> value="Adenocarcinoma Invasor"> Adenocarcinoma Invasor </option>
            <option <?php if ($atipias_gland == "Cervical") echo "selected"; ?> value="Cervical"> Cervical </option>
            <option <?php if ($atipias_gland == "Endometrial") echo "selected"; ?> value="Endometrial"> Endometrial </option>
            <option <?php if ($atipias_gland == "Em outras especificacoes") echo "selected"; ?> value="Em outras especificacoes"> Em outras especificações </option>
          </select>
        </div>
<br/>
 <li class="form-line form-line-column form-col-1 form-line-column-clear" data-type="control_textarea" id="id_903">
        <label class="form-label form-label-top" id="label_903" for="input_903"> <strong> Outras Observações </strong> </label>
        <div id="cid_903" class="form-input-wide">
          <textarea id="input_903" class="form-textarea" name="outrasinfo" cols="40" rows="5" data-component="textarea"> <?php echo $outrasinfo; ?></textarea>
        </div> <br/><br/>
      </li>

           <li class="form-line form-line-column form-col-2" data-type="control_dropdown" id="id_991">
        <label class="form-label form-label-top" id="label_991" for="input_991"> <b> Acompanhamento </b>  </label>
        <div id="cid_991" class="form-input-wide jf-required">
          <span class="form-sub-label-container" style="vertical-align:top; width:100%;">
            <select class="form-dropdown" id="input_991" name="acompanhamento" style="width:150px;" data-component="dropdown">
                <option value=""> Selecione </option>
                
            <option <?php if ($acompanhamento == "Preventivo Concluido") echo "selected"; ?> value="Preventivo Concluido"> Preventivo Concluido </option>
            <option <?php if ($acompanhamento == "Aguardando Retorno") echo "selected"; ?> value="Aguardando Retorno">Aguardando Retorno </option>
          <option <?php if ($acompanhamento == "Obito") echo "selected"; ?> value="Obito"> Óbito </option>
          <option <?php if ($acompanhamento == "Em Andamento") echo "selected"; ?> value="Em Andamento"> Em Andamento  </option>
          <option <?php if ($acompanhamento == "Em outras especificacoes") echo "selected"; ?> value="Em outras especificacoes"> Em outras especificacoes </option>
            </select>
            <label class="form-label form-label-top" for="input_991" style="min-height:13px;"></label>
          </span>
        </div>
      </li>  
      
      
<br/>
  <li class="form-line form-line-column form-col-2" data-type="control_dropdown" id="id_992">
        <label class="form-label form-label-top" id="label_992" for="input_992"> <b> Mês Retorno </b>  </label>
        <div id="cid_992" class="form-input-wide jf-required">
          <span class="form-sub-label-container" style="vertical-align:top; width:100%;">
            <select class="form-dropdown" id="input_992" name="mesretorno" style="width:150px;" data-component="dropdown">
                <option value=""> Selecione </option>
                
            <option <?php if ($mesretorno == "Janeiro") echo "selected"; ?> value="Janeiro"> Janeiro </option>
            <option <?php if ($mesretorno == "Fevereiro") echo "selected"; ?> value="Fevereiro"> Fevereiro </option>
          <option <?php if ($mesretorno == "Marco") echo "selected"; ?> value="Marco"> Março </option>
          <option <?php if ($mesretorno == "Abril") echo "selected"; ?> value="Abril"> Abril  </option>
          <option <?php if ($mesretorno == "Maio") echo "selected"; ?> value="Maio"> Maio </option>
          <option <?php if ($mesretorno == "Junho") echo "selected"; ?> value="Junho"> Junho </option>
          <option <?php if ($mesretorno == "Julho") echo "selected"; ?> value="Julho"> Julho </option>
          <option <?php if ($mesretorno == "Agosto") echo "selected"; ?> value="Agosto"> Agosto </option>
          <option <?php if ($mesretorno == "Setembro ") echo "selected"; ?> value="Setembro"> Setembro </option>
          <option <?php if ($mesretorno == "Outubro") echo "selected"; ?> value="Outubro"> Outubro </option>
          <option <?php if ($mesretorno == "Novembro") echo "selected"; ?> value="Novembro"> Novembro </option>
          <option <?php if ($mesretorno == "Dezembro") echo "selected"; ?> value="Dezembro"> Dezembro </option>
            </select>
            <label class="form-label form-label-top" for="input_991" style="min-height:13px;"></label>
          </span>
        </div>
      </li>  
      
      
<br/>


<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

      <li class="form-line" data-type="control_button" id="id_282">
        <div id="cid_282" class="form-input-wide">
          <div style="text-align:center;" class="form-buttons-wrapper">
          <div class="login-block">
            <button type="submit" class="submit" data-component="button">
              Atualizar Prontuário
            </button>
            <span>
               
            </span>
            <button id="input_reset_281" type="reset" class="submit" data-component="button">
              Limpar Formulário
            </button>
          </div>
          <div class="login-block"> </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>
  <script>
  JotForm.showJotFormPowered = "new_footer";
  </script>
  <input type="hidden" id="simple_spc" name="simple_spc" value="72202893033652" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "72202893033652-72202893033652";
  </script>
  <div class="formFooter-heightMask">
  </div>
 
</form>

</body>
</html>
<script type="text/javascript">JotForm.ownerView=true;</script>