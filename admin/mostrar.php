<?php
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
$cont = 0;
header("Content-Type: text/html; charset=UTF-8", true);
include_once 'conectar.php';
include_once 'restrito.php';
?>
<!DOCTYPE html>
<html>
<head>
    <!-- BOOTSTRAP -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Preencha o href com o diretório da sua imagem em png -->
	<link rel="icon" type="image/png" href="">
    <meta name="viewport" content="width=device-width,initial-scale=1">

	<title><?php echo  $titulo ?></title>

</head>
<body>
<?php include 'topo.php'; ?>

<div class="container">
    <div class="text-center" style="margin-top: 20px;">
        <!-- TÍTULO ESCALA GERAL -->
        <h1>Escala Geral</h1>
    </div>

    <!-- BARRA DE PESQUISA (POSICIONADA À DIREITA) -->
    <div class="text-right" style="margin-top: 20px;">
        <div class="form-group">
            <input type="text" class="form-control" id="searchInput" placeholder="Pesquisar...">
        </div>
    </div>
</div>

<?php

$hoje = date("Y-m-d");
$hora_atual = date("H:i");

//QUERY PARA MOSTRAR SOMENTE OS REGISTROS A PARTIR DO DIA DE HOJE
$strSQL = "SELECT * FROM $table where dt_plantao >= '$hoje' order by dt_plantao, hora_ent, nome ASC";

//MOSTRAS REGISTROS DE TODOS OS DIAS
// $strSQL = "SELECT * FROM $table order by dt_plantao DESC";

// EXECUTA A QUERY E ARMAZENA EM UMA VARIÁVEL
$rs = mysql_query ( $strSQL );

echo "<table class='table table-hover table-bordered'>
		 <thead>
			<tr>
				<th>Nome</th>
				<th>Celular</th>
				<th>Data</th>
				<th>Horário Entrada</th>
				<th>Horário Saída</th>
				<th>Setor</th>
				<th>Função</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
		";
// Loop pelo recordset $rs
// Cada linha vai para um array ($row) usando mysql_fetch_array
			while ( $row = mysql_fetch_array ( $rs ) ) {
				$id1=$row['id'];
				if ($hoje == $row[3] && $hora_atual <= $row[5] && $hora_atual >= $row[4] ) {
					echo "<tr class='alert-danger some'>";
				}else{
					echo "<tr class='some'>";
				}
					echo "<td>$row[nome]</td>
					<td>$row[cel]</td>
					<td>".date ( 'd/m/Y', strtotime ($row[3]))."</td>
					<td>$row[hora_ent]</td>
					<td>$row[hora_sai]</td>
					<td>$row[setor]</td>
					<td>$row[funcao]</td>
					<td>";			
					?>
					<td>
					<!-- Botão para Deletar -->
					<span class="action name">
						<a href="#" id="<?php echo $id1; ?>" class="btn btn-danger delete-btn" title="Deletar">
							<i class="glyphicon glyphicon-trash"></i> Deletar
						</a>
					</span>
				
					<!-- Botão para Editar -->
					<a class="btn btn-primary" title="Editar" href="javascript:SubmitForm(<?php echo $row['id']; ?>)">
						<i class="glyphicon glyphicon-pencil"></i> Editar
					</a>
					</td>

				   	<form id="form1" action="editar.php" method="post">
						  <input type="hidden" id="id" name="id">
					</form>
					</tbody>
					</tr>
				<?php
			} ?>
			</tbody>
		</table>
<?php

$total = mysql_num_rows($rs);

echo $total;

// Encerra a conex�o
mysql_close ();

?>


</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function() {
    $(".delete-btn").click(function(){
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        if(confirm("Deseja excluir o Registro?"))
        {
            $.ajax({
                type: "POST",
                url: "deletar.php",
                data: info,
                success: function(){
                    // Atualize a tabela ou faça qualquer ação necessária após a exclusão
                }
            });
            $(this).parents(".some").animate({backgroundColor: "#003"},"slow")
            .animate({ opacity: "hide"}, "slow");
        }
        return false;
    });
});

// Manda para tela de editar
function SubmitForm(id) {
      document.getElementById("id").value = id;
      document.getElementById("form1").submit();
}

// Função para filtrar a tabela com base no texto inserido na barra de pesquisa
$(document).ready(function () {
        $("#searchInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });




</script>
</body>
</html>
