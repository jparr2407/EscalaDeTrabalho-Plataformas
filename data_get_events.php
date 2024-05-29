<?php
include_once 'admin/conectar.php';

// Consulta SQL para obter os eventos do banco de dados
$sql = "SELECT * FROM $table WHERE setor LIKE '%Data%' ORDER BY hora_ent, funcao, nome";

// Execute a consulta SQL
$result = mysql_query($sql);

// Array para armazenar os eventos
$events = array();

// Verifique se a consulta foi bem-sucedida antes de continuar
if ($result) {
    // Loop através dos resultados da consulta e adicione os eventos ao array
    while ($row = mysql_fetch_array($result)) {
        // Formate os dados para o formato esperado pelo FullCalendar

        $start = date('Y-m-d\TH:i:s', strtotime($row['dt_plantao'] . ' ' . $row['hora_ent']));
        $end = date('Y-m-d\TH:i:s', strtotime($row['dt_plantao'] . ' ' . $row['hora_sai']));

        $event = array(
            'title' => $row['nome'],
            'start' => $start, // $row['dt_plantao'] . ' ' . $row['hora_ent'], // Data e hora de entrada
            'end' => $end, // $row['dt_plantao'] . ' ' . $row['hora_sai'], // Data e hora de saída
        );

        // Adicione o evento ao array de eventos
        $events[] = $event;
    }
}

// Converta os eventos para o formato JSON e retorne
header('Content-Type: application/json');
echo json_encode($events);
?>
