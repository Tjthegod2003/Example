<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = $_POST['question'];
    $comment = $_POST['comment'];
    $questionIndex = $_POST['questionIndex'];

    // Create or append to separate files for each question
    $questionFile = fopen("Text.txt", "a");
    fwrite($questionFile, "Question: $question\n");
    fclose($questionFile);

    // Append comments to the respective question file
    $commentFile = fopen("question_$questionIndex.txt", "a");
    fwrite($commentFile, "Comment: $comment\n");
    fclose($commentFile);

    // Respond with a success message or data if needed
    echo json_encode(['message' => 'Data saved successfully']);
} else {
    // Respond with an error message if not a POST request
    echo json_encode(['error' => 'Invalid request method']);
}
?>
