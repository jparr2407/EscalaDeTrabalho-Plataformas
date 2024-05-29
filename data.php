<?php
date_default_timezone_set ( 'America/Sao_Paulo' );
header ( "Content-Type: text/html; charset=UTF-8", true );
include_once 'admin/conectar.php';

?>
<!DOCTYPE html>
<html lang= 'pt-BR'>
<head>
<title><?php echo  $titulo ?></title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<!-- Preencha o href com o diretório da sua imagem em png -->
<link rel="icon" type="image/png" href="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="refresh" content="60">


<style>
		th {
		//  background-color: blue;
		// color: white;
				background-color: #80ccd4;
		color: white;
		width: 40px;
			padding-left: 5px;
			padding-right: 5px;
		}

		/* Estilos adicionados para o cabeçalho */
		.header {
            background-color: #DCDCDC; /* amarelo */
            color: #000; /* preto */
            padding: 20px 0;
            text-align: center;
        }

        .header h1 {
            margin: 0;
        }

		.panel-body {
			margin-top: 20px; /* Adiciona espaço entre o cabeçalho e os botões */
		}
</style>

</head>

<body>

<div class="header">
    <!-- Adicione sua imagem aqui no src -->
    <img src="" alt="Sua imagem" style="float: left; margin-right: 20px; margin-left: 12px; width: 100px; height: auto;">
	<h1>Escala de Plataformas</h1>
	
</div>

<div id="mask"></div>
	<div class=" container-fluid info">
<?php
$hora_atual = date ( "H:i" );
$hoje = date ( "Y-m-d" );

// Mostrar só o dia de hoje
$strSQL = "SELECT * FROM $table WHERE setor LIKE '%Data%' AND DATE(dt_plantao) >= CURDATE() ORDER BY dt_plantao, hora_ent, funcao, nome";
// Executa a query (o recordset $rs contêm o resultado da query)
$rs = mysql_query ( $strSQL );
?>

<?php
echo "<table class='table table-hover table-bordered espace'>
		 <caption><h3>Escala Data Center (A partir de Hoje)</h3></caption>
		 <thead>
			<tr>
				<th>Nome</th>
				<th>Celular</th>
				<th>Data Plantão</th>
				<th>Hora Entrada</th>
				<th>Hora Saída</th>
			</tr>
		</thead>
		<tbody>
		";

$ontem = date('Y-m-d', strtotime($hoje. ' - 1 days'));

while ( $row = mysql_fetch_array ( $rs ) ) {
		echo "<td>$row[nome]</td>
			<td>$row[cel]</td>
			<td>".date ( 'd/m/Y', strtotime ($row[3]))."</td>
			<td>$row[hora_ent]</td>
			<td>$row[hora_sai]</td>
		</tr>";
	
}

// Encerra a conexão
mysql_close ();

?> 

	<h3>
			Atualizando em <span id='countdown'>10</span> segundos <br />
		</h3>
	</div>

	<a href="index.php" class="btn btn-info " role="button"><i class="icon-arrow-left icon-white"></i> Voltar</a>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script type="text/javascript">
	
	//  	Redirecionamento da página
	var start = new Date();
	start = Date.parse(start)/1000;
	var seconds = 60; // TEMPO EM SEGUNDOS EM QUE HAVERÁ O REDIRECIONAMENTO
	function CountDown(){
	    var now = new Date();
	    now = Date.parse(now)/1000;
	    var counter = parseInt(seconds-(now-start),10);
	    if(counter <= 9){
		    document.getElementById('countdown').innerHTML = ' 0'+counter;
	    }else{
		    document.getElementById('countdown').innerHTML = counter;
	    }
	    if(counter > 0){
	        timerID = setTimeout("CountDown()", 100)
	    }else{
			window.location = "data.php"; //URL DA PAGINA A SER REDIRECIONADA
		}
	}
	window.setTimeout('CountDown()',100);	


	 $(window).load(function(){

		$('#myModal').modal('show');
		 
	    });

	</script>

	<!DOCTYPE html>
<html lang='pt-BR'>
  <head>
    <meta charset='utf-8' />
	<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css' rel='stylesheet' />
	<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js'></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
	<style>
	.title-container {
		text-align: center; /* Centraliza o texto dentro da div */
	}
	</style>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
		  height: 650,
		  events: 'data_get_events.php',
		  locale: 'pt-br',
		  eventTimeFormat: {
			hour: '2-digit',
			minute: '2-digit',
			meridiem: false
		  }
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
	<div class="title-container">
	<h3>Visão Geral Escala Data Center</h3>
	</div>
    <div id='calendar'></div>
  </body>
</html>

</body>
</html>
