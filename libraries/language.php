<?php

/*
 * Lớp set và include file languages.
 * @author Chuột
 * @modified date 04/07/2014
 */

class language {

    private $language = "vi";

    /**
     * Hàm xây dựng
     * @return void
     */
    function __construct() {
        //
    }

    /**
     * Khởi tạo session ngôn ngữ
     * @return void
     */
    public function CreateNewSessionLang() {
        $_SESSION['language'] = $this->language;
    }

    /**
     * Set ngôn ngữ
     * @param string
     * @return void
     */
    public function SetLang($lang) {
        $this->language = ($lang != 'vi' && $lang != 'en') ? 'vi' : $lang;
    }

    /**
     * Include ngôn ngữ đã thiết lập trong giao diện người dùng
     * @param string
     * @return void
     */
    public function IncludeLangUserUI() {
        switch ($this->language) {
            case 'vi': include_once ('./languages/vi-user.php');
                break;
            case 'en': include_once ('./languages/en-user.php');
                break;
        }
    }

    /**
     * Include ngôn ngữ đã thiết lập ttong giao diện admin
     * @param string
     * @return void
     */
    public function IncludeLangAdminUI() {
        switch ($this->language) {
            case 'vi': include_once ('./languages/vi-admin.php');
                break;
            case 'en': include_once ('./languages/en-admin.php');
                break;
        }
    }
    
    public function checkSESSIONLanguage($get_lang){
        if (isset($get_lang)) {//Chọn lại
            $this->SetLang($get_lang);
        } else {//Mặc định
            $this->SetLang((isset($_SESSION['language'])) ? $_SESSION['language'] : 'vi');
        }
    }

}
