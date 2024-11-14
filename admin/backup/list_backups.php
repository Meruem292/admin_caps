<?php
$backupDir = 'file/';

if (is_dir($backupDir)) {
    $files = array_diff(scandir($backupDir), array('.', '..')); 
    $sqlFiles = [];

    foreach ($files as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'sql') {
            $sqlFiles[] = $file;
        }
    }

    echo json_encode($sqlFiles);
} else {
    echo json_encode([]);
}
?>
