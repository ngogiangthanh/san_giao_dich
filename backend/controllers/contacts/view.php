<?php
// Load model===================================================================
require_once('backend/models/contacts.php');

//Title ========================================================================
$title = "Trang trả lời các liên hệ";

//load view ====================================================================
if(isset($_GET['id'])){
    $contact = contactSelectbyId($_GET['id'], $conn->app);
    
    $users_chat = explode("[]", $contact->ID_PHAN_HOI);
    $user_data = array();
    foreach($users_chat as $user_chat){
        $el = explode("_", $user_chat);
        $user_data[$el[0]]  = $el[1] ;
    }
    
   
    $chat_content = explode("\n", file_get_contents($contact->DU_LIEU_LIEN_HE));
    
    $chat_length = count($chat_content);
}
require('./backend/views/contacts/view.php');