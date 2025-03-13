<?php
session_start();

// Expanded list of essential daily life Japanese verbs with their meanings
$verbs = [
    "たべる" => "to eat",
    "のむ" => "to drink",
    "ねる" => "to sleep",
    "おきる" => "to wake up",
    "いく" => "to go",
    "くる" => "to come",
    "かえる" => "to return (home)",
    "する" => "to do",
    "みる" => "to see / watch",
    "きく" => "to listen / ask",
    "はなす" => "to speak",
    "かう" => "to buy",
    "よむ" => "to read",
    "かく" => "to write",
    "あう" => "to meet",
    "あるく" => "to walk",
    "はしる" => "to run",
    "つくる" => "to make",
    "つかう" => "to use",
    "まつ" => "to wait",
    "おしえる" => "to teach / tell",
    "ならう" => "to learn",
    "わかる" => "to understand",
    "あそぶ" => "to play",
    "わすれる" => "to forget",
    "おぼえる" => "to remember",
    "はたらく" => "to work",
    "やすむ" => "to rest / take a break",
    "でる" => "to leave / go out",
    "はいる" => "to enter",
    "すわる" => "to sit",
    "たつ" => "to stand",
    "あける" => "to open",
    "しめる" => "to close",
    "つける" => "to turn on (a light/device)",
    "けす" => "to turn off (a light/device)",
    "もつ" => "to hold / carry",
    "とる" => "to take",
    "おく" => "to put / place",
    "ひく" => "to play (an instrument)",
    "うたう" => "to sing",
    "およぐ" => "to swim",
    "ならぶ" => "to line up",
    "あらう" => "to wash",
    "きる" => "to wear (clothes)",
    "ぬぐ" => "to take off (clothes/shoes)",
    "いれる" => "to put in / insert",
    "だす" => "to take out",
    "かす" => "to lend",
    "かりる" => "to borrow",
    "わらう" => "to laugh",
    "なく" => "to cry",
];

// Select a random verb
if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = array_rand($verbs);
}

$question = $_SESSION['current_question'];
$message = "";

// Check the answer when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userAnswer = trim($_POST["answer"]);

    if ($userAnswer == $question) {
        $message = "<p style='color:green;'>Correct! '$question' means '".$verbs[$question]."'.</p>";
        unset($_SESSION['current_question']); // Reset question for a new round
    } else {
        $message = "<p style='color:red;'>Incorrect! Try again.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Japanese Verb Guessing Game</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 50px; }
        input { padding: 10px; font-size: 16px; }
        button { padding: 10px 15px; font-size: 16px; cursor: pointer; }
    </style>
</head>
<body>

    <h2>Guess the Japanese Verb</h2>
    <p>What is the Japanese verb for "<strong><?php echo $verbs[$question]; ?></strong>"?</p>

    <form method="POST">
        <input type="text" name="answer" placeholder="Type in hiragana" required>
        <button type="submit">Submit</button>
    </form>

    <?php echo $message; ?>

</body>
</html>
