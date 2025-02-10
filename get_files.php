<?php
$uploadDirectory = 'uploads/'; // Specify the directory where uploaded PDFs are stored

$files = [];

// Read the contents of the upload directory
$directory = opendir($uploadDirectory);
while (($file = readdir($directory)) !== false) {
    if ($file != '.' && $file != '..') {
        // Add file information to the array
        $files[] = [
            'name' => $file,
            // Add other file information as needed (e.g., size, date, etc.)
        ];
    }
}

// Return the list of files as JSON
header('Content-Type: application/json');
echo json_encode($files);

closedir($directory);
?>
