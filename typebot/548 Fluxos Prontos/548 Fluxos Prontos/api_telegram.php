<!-- 
╔═══╗╔═══╗╔═══╗╔╗╔═╗    ╔════╗╔╗  ╔╗╔═══╗╔═══╗╔══╗ ╔═══╗╔════╗    
║╔═╗║║╔═╗║║╔═╗║║║║╔╝    ║╔╗╔╗║║╚╗╔╝║║╔═╗║║╔══╝║╔╗║ ║╔═╗║║╔╗╔╗║    
║╚═╝║║║ ║║║║ ╚╝║╚╝╝     ╚╝║║╚╝╚╗╚╝╔╝║╚═╝║║╚══╗║╚╝╚╗║║ ║║╚╝║║╚╝    
║╔══╝║╚═╝║║║ ╔╗║╔╗║       ║║   ╚╗╔╝ ║╔══╝║╔══╝║╔═╗║║║ ║║  ║║      
║║   ║╔═╗║║╚═╝║║║║╚╗     ╔╝╚╗   ║║  ║║   ║╚══╗║╚═╝║║╚═╝║ ╔╝╚╗     
╚╝   ╚╝ ╚╝╚═══╝╚╝╚═╝     ╚══╝   ╚╝  ╚╝   ╚═══╝╚═══╝╚═══╝ ╚══╝      
-->
<!-- 
✩░▒▓▆▅▃▂▁ Licenciado para uso comercial - Venda proibido ▁▂▃▅▆▓▒░✩ 
-->

<?php
// Set your bot API token and the chat ID of the group
$botToken = 'seu_token_access';
$chatID = 'seu_chat_id';

// Check if the 'enviar' query parameter is set
if (isset($_GET['enviar'])) {
    // Get the message from the 'enviar' query parameter
    $message = $_GET['enviar'];
    
    // Format the message using Markdown (for example, adding line breaks)
    $formattedMessage = "Mensagem:\n\n$message";

    // URL to the Telegram Bot API
    $url = "https://api.telegram.org/bot$botToken/sendMessage";

    // Prepare the POST data
    $postData = [
        'chat_id' => $chatID,
        'text' => $formattedMessage,
        'parse_mode' => 'Markdown', // Set the parse_mode to Markdown
    ];

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session and close it
    $response = curl_exec($ch);
    curl_close($ch);

    // Check the response from Telegram (you can handle errors here)
    if ($response === false) {
        echo 'Error sending message';
    } else {
        echo 'Message sent successfully';
    }
} else {
    // If the 'enviar' parameter is not set, display an error message
    echo 'Error: "enviar" parameter not provided';
}
