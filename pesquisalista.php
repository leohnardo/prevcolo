<!doctype html>
<html class="no-js" lang="">
<head>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />

<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:100,500" rel="stylesheet">
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PREVCOLO</title><link rel="stylesheet" type="text/css" href="css\style.css">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/jquery.fancybox.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/font-icon.css">
</head>
<body>

<!-- header top section -->

<!-- header top section -->
<section class="banner" role="banner">

  <header id="header">
    
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
    <div class="header-content "> <a class="logo" href="index.php"><img src="img/logonovo.png" alt=""></a>
  </header>
</section>
<!-- header top section --> 
<!-- header content section -->
<section id="hero" class="section ">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-sm-6 hero">
        <div class="hero-content">
        </div>
        <!-- hero --> 
      </div>
        <!-- hero --> 
      </div>
    </div>
  </div>
</section>
<!-- header content section --> 
<!-- portfolio grid section -->
<section id="portfolio">
  <div class="container">
        
<p>
  <style type="text/css">
  .tabvercliente, .apresenta {
        margin:3px auto;
        padding-top:6px;

        width:790px;
        color:#000 !important;
        font-family: 'Verdana', sans-serif;
        font-size:14px;
        border-color: #000 ;
        border: transparent;  
  }
</style>

<h4 align="center">Lista de Pessoas - Registro de Preventivos </h4> <br/><br/>

<!-- função java script -->


    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script type="text/javascript" src="busca.js"></script>
<!-- sistema de busca --> 
<?php
  $servidor = "localhost";
  $usuario = "u226274981_dbleo";
  $senha = "leo666";
  $dbname = "u226274981_dbleo";
  //Criar a conexao
  $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
  
  $pesquisar = $_POST['pesquisar'];

  $result_cursos = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisar%' LIMIT 10";
  $resultado_cursos = mysqli_query($conn, $result_cursos);
?>




    <form align="center" style="color:black" method="POST" action="pesquisalista.php"  >
          
<input type="text" name="pesquisar" id="" placeholder="Digite o Nome">
          <input  style='font-family: verdana; font-size: 12px; background-color: #ad75ad;  border-radius: 2px;
 color: #fff; border:0;' align="right" type="submit" value="  BUSCAR   ">  <br/><br/><br/>

</form>


    </form>
  
<!-- final de sistema de busca --> 


    
    <table class="table table-borderred table-hover tabvercliente" id="listagem" border="1">
      <thead>
      <tr class="apresenta">
      <tr>
        <th> ID </th>
        <th> Nome </th>
        <th> Endereco </th>
        <th> Data de Nascimento </th>
        <th> Telefone </th>
        <th> Sexo </th>
        <tr>
      </tr>
      </thead>
      <tbody class='form-label form-label-top'>

      	<?php
	while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
		 echo "<tr class='form-label form-label-top' >
        	 <td> ".$rows_cursos['id']."</td>
           	 <td> ".$rows_cursos['nome']."</td>
           	 <td> ".$rows_cursos['endereco']."</td>
           	 <td> ".implode("/", array_reverse(explode("-", $rows_cursos['data_nasc'])))."</td>
           	 <td> ".$rows_cursos['telefone']."</td>
           	 <td> ".$rows_cursos['sexo']."</td>
          </tr>"; 

      }


      ?>

            </tbody>
    </table>
<br>

     <div class="login-block">
  </span>
  <script>
function goBack() {
    window.history.back()
}
       </script>
      <button onclick="goBack()" class="submit" data-component="button"> Voltar </button>
       </div>

        <br/><br/>
<footer class="footer">

