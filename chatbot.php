<?php 
include 'koneksi/koneksi.php';
?>
<?php
// Sample predefined questions and answers
$query = mysqli_query($conn,"select * from bot");
    while($data = mysqli_fetch_array($query)){ 
    $botResponses[$data["keyword"]] = $data["response"];
    }

// $botResponses = [
//     "hello" => "Hello! How can I assist you today?",
//     "how are you" => "I'm just a bot, but I'm functioning perfectly!",
//     "what is your name" => "I'm your friendly chatbot, here to help.",
//     "bye" => "Goodbye! Have a great day!"
// ];

// Function to find the closest match using Levenshtein distance

function getFuzzyResponse($userMessage, $botResponses) {
    $shortestDistance = -1;
    $bestMatch = null;

    foreach ($botResponses as $question => $response) {
        // Calculate the Levenshtein distance between the user input and predefined questions
        $distance = levenshtein(strtolower($userMessage), strtolower($question));

        // If it's an exact match, return the response immediately
        if ($distance == 0) {
            return $response;
        }

        // Find the smallest distance
        if ($shortestDistance == -1 || $distance < $shortestDistance) {
            $shortestDistance = $distance;
            $bestMatch = $response;
        }
    }

    // If the distance is reasonable (i.e., not too far off), return the best match
    if ($shortestDistance <= 5) {
        return $bestMatch;
    } else {
        return "I'm sorry, I didn't understand that.";
    }
}

// Get the user message from the POST request
if (isset($_POST['message'])) {
    $userMessage = $_POST['message'];

    // Get the closest response based on fuzzy matching
    $botResponse = getFuzzyResponse($userMessage, $botResponses);

    // Return the response
    echo $botResponse;
}



?>