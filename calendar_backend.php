<?php
    
    include 'include.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $result = $conn->query('SELECT * FROM tasks');
        $events = [];
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
        echo json_encode($events);
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        $id = isset($data['id']) ? intval($data['id']) : null;
        // $idx = isset($data['idx']) ? intval($data['idx']) : null;
        $title = $conn->real_escape_string($data['title']);
        $start = $conn->real_escape_string($data['start']);
        $end = $conn->real_escape_string($data['end']);
        $detail = $conn->real_escape_string($data['detail']);
        $employeeid = $conn->real_escape_string($data['employeeid']);
        $clientid = $conn->real_escape_string($data['clientid']);
        $mode = $conn->real_escape_string($data['mode']);
        $priority = $conn->real_escape_string($data['priority']);
        $projectid = $conn->real_escape_string($data['projectid']);
        $randid=time();
        
        if ($id) {
            // $query = "UPDATE tasks SET title='$title', detail='$detail', employeeid='$employeeid', clientid='$clientid', projectid='$projectid', priority='$priority', mode='$mode', start='$start', end='$end' WHERE id=$id";
            $query = "UPDATE tasks SET start='$start', end='$end' WHERE id=$id";
            $conn->query($query);
        } else {
            $query = "INSERT INTO tasks (title, start, end, detail, employeeid, clientid, projectid, mode, priority, date, tdate )
            VALUES ('$title', '$start', '$end', '$detail', '$employeeid', '$clientid', '$projectid', '$mode', '$priority', '$randid', '$randid')";
            $conn->query($query);
            echo json_encode(['id' => $conn->insert_id]);
        }
        exit;
    }

?>