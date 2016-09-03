<?php

/**
 * Script to send an email containing HTML and TXT data.
 * This alternate is for account validation mails.
 * @author Tristan Dietz
 */


/**
 * Value of the sender identity
 * @var string $from
 */
$from = "Name <account@domain.tld";

/**
 * Value of the recipient of the email
 * @var string $to
 */
$to = "account@domain.tld";

/**
 * Value fo the subject of the email
 * @var string $sujet
 */
$sujet = "Hello World!";

/**
 * Value of the text part
 * @var string $text
 */
$text = file_get_contents("mail.txt"));

/**
 * Value of the HTML part
 * @var string $html
 */
$html = file_get_contents("mail.html"));

/**
 * Value of the border (separator between the pair of parts). It will not appears in the email. Generation is random in this case.
 * @var string $limite
 */
$limite = md5(uniqid (rand()));


/**
 * Adding to $header the sender identity, and the MIME headers.
 * @var string $header
 */
$header = "From: ".$from."\n";
$header .= "MIME-Version: 1.0\n";
$header .= "Content-Type: multipart/alternative; boundary=\"".$limite."\"";

/**
 * Creating message. Adding separator, text header, text, separator, HTML headers, HTML content, separator
 * @var string $message
 */
$message = "--".$limite."\n";
$message .= "Content-Type: text/plain\n";
$message .= $text;

$message .= "\n\n--".$limite."\n";
$message .= "Content-Type: text/html;\n";
$message .= "charset=\"utf-8\";\n";
$message .= $html;
$message .= "\n--".$limite."--";

/**
 * Finally, sending the email
 */
if(mail($to, $sujet, $message, $header))
    echo "OK";
else
    echo "ERROR";

?>
