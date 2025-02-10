<?php
$uploadDirectory = 'uploads/'; // Specify the directory where uploaded PDFs are stored

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdfFile'])) {
    $file = $_FILES['pdfFile'];

    // Check if the file is a PDF
    $fileType = pathinfo($file['name'], PATHINFO_EXTENSION);
    if (strtolower($fileType) !== 'pdf') {
        http_response_code(400); // Bad Request
        echo 'Invalid file format. Please upload a PDF file.';
        exit;
    }

    // Move the uploaded file to the specified directory
    $targetPath = $uploadDirectory . $file['name'];
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        // File was successfully uploaded
        echo 'File uploaded successfully.';
    } else {
        // Handle the case where the file could not be moved
        http_response_code(500); // Internal Server Error
        echo 'An error occurred while uploading the file.';
    }
} else {
    http_response_code(400); // Bad Request
    echo 'No file uploaded or invalid request.';
}
?>
