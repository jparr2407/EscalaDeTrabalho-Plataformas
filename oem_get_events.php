<?php
include_once 'admin/conectar.php';

// CONSULTA SQL PARA OBTER OS EVENTOS DO BANCO DE DADOS 
$sql = "SELECT * FROM $table WHERE setor LIKE '%O&m%' ORDER BY hora_ent, funcao, nome";

// EXECUTE A CONSULTA SQL
$result = mysql_query($sql);

// ARRAY PARA ARMAZENAR OS EVENTOS
$events = array();

// VERIFIQUE SE A CONSULTA FOI BEM-SUCEDIDA ANTES DE CONTINUAR
if ($result) {
    // LOOP ATRAVÉS DO RESULTADOS DA CONSULTA E ADICIONA OS EVENTOS AO ARRAY
    while ($row = mysql_fetch_array($result)) {
        // FORMATE OS DADOS PARA O FORMATO ESPERADO PELO FULLCALENDAR

        $start = date('Y-m-d\TH:i:s', strtotime($row['dt_plantao'] . ' ' . $row['hora_ent']));
        $end = date('Y-m-d\TH:i:s', strtotime($row['dt_plantao'] . ' ' . $row['hora_sai']));

        $event = array(
            'title' => $row['nome'],
            'start' => $start, // $row['dt_plantao'] . ' ' . $row['hora_ent'], // Data e hora de entrada
            'end' => $end, // $row['dt_plantao'] . ' ' . $row['hora_sai'], // Data e hora de saída
        );

        // ADICIONE O EVENTO AO ARRAY DE EVENTOS
        $events[] = $event;
    }
}

// CONVERTA OS EVENTOS PARA O FORMATO JSON E RETORNE
header('Content-Type: application/json');
echo json_encode($events);
?>
