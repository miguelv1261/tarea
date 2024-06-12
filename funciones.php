<?php
include "connect.php";

// Obtener el número total de tareas
function getTotalTasks($conn) {
    $sql = "SELECT COUNT(*) AS total_tasks FROM Tasks";
    $result = $conn->query($sql);
    $total_tasks = 0;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_tasks = $row["total_tasks"];
    }
    return $total_tasks;
}

// Obtener el número total de usuarios
function getTotalUsers($conn) {
    $sql = "SELECT COUNT(*) AS total_users FROM Users";
    $result = $conn->query($sql);
    $total_users = 0;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_users = $row["total_users"];
    }
    return $total_users;
}

// Obtener detalles de una tarea
function getTaskDetails($conn, $task_id) {
    $sql = "SELECT title, description, price, status, created_at, updated_at FROM Tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $task_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $task = null;

    if ($result->num_rows > 0) {
        $task = $result->fetch_assoc();
    }
    return $task;
}

// Obtener todas las tareas
function getAllTasks($conn) {
    $sql = "SELECT id, title, description FROM Tasks";
    $result = $conn->query($sql);
    $tasks = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
    }
    return $tasks;
}
//insertar sugerencia
function insertSuggestion($conn, $task_id, $agent_id, $suggested_price, $suggested_time) {
    $sql = "INSERT INTO Suggestions (task_id, agent_id, suggested_price, suggested_time) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iids", $task_id, $agent_id, $suggested_price, $suggested_time);
    return $stmt->execute();
}
//insertar sug

// Obtener las sugerencias para una tarea
function getSuggestions($conn, $task_id) {
    $sql = "SELECT agent_id, suggested_price, suggested_time, created_at FROM Suggestions WHERE task_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $task_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $suggestions = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $suggestions[] = $row;
        }
    }
    return $suggestions;
}
?>