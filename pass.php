<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // User input
    $userInput = $_POST['user_input'];

    // Generate password hash
    $hashedPassword = password_hash($userInput, PASSWORD_DEFAULT);

    echo "Original Word: $userInput<br>";
    echo "Password Hash: $hashedPassword<br><br>";
    // exit();

    // Check if another word matches the hash
    $checkWord = $_POST['check_word'];
    $isMatch = password_verify($checkWord, $hashedPassword);

    if ($isMatch) {
        echo "The checked word matches the hash!";
    } else {
        echo "The checked word does not match the hash.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Hashing Example</title>
</head>
<body>

<h2>Generate Password Hash</h2>
<form method="post" action="">
    <label for="user_input">Enter a word:</label>
    <input type="text" name="user_input" required>
    <button type="submit">Generate Hash</button>
</form>

<h2>Check if Word Matches Hash</h2>
<form method="post" action="">
    <label for="check_word">Enter a word to check:</label>
    <input type="text" name="check_word" required>
    <button type="submit">Check</button>
</form>

</body>
</html>
