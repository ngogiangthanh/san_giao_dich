<?php

include_once 'resizeimg.php';

/**
 * Chuyển hướng đến trang báo lỗi 404
 */
function show_404() {
    header('HTTP/1.1 Not Found 404', true, 404);
    require('./backend/views/404.php');
    exit();
}

/**
 * Chống SQL Inject
 * @param  string
 * @return string
 */
function escape($str) {
    return mysql_real_escape_string($str);
}

/**
 * Phân trang
 * @param string
 * @param int
 * @param int
 * @return string
 */
function pagination($url, $page, $total) {
    $adjacents = 2;
    $prevlabel = "&lsaquo; " . PAGING_PREVIOUS;
    $nextlabel = PAGING_NEXT . " &rsaquo;";
    $out = '<ul class="pagination pagination-sm no-margin pull-right">';

    //first
    if ($page == 1) {
        $out.= '<li class="disabled"><span>' . PAGING_FIRST . '</span></li>';
    } else {
        $out.='<li><a href="' . $url . '">' . PAGING_FIRST . '</a></li>';
    }

    // previous
    if ($page == 1) {
        $out.= '<li class="disabled"><span>&Lt;</span></li>';
    } elseif ($page == 2) {
        $out.='<li><a href="' . $url . '">&Lt;</a></li>';
    } else {
        $out.='<li><a href="' . $url . '&amp;page=' . ($page - 1) . '">&Lt;</a></li>';
    }

    $pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
    $pmax = ($page < ($total - $adjacents)) ? ($page + $adjacents) : $total;
    for ($i = $pmin; $i <= $pmax; $i++) {
        if ($i == $page) {
            $out.= '<li class="active"><span>' . $i . '</span></li>';
        } elseif ($i == 1) {
            $out.= '<li><a href="' . $url . '">' . $i . '</a></li>';
        } else {
            $out.= '<li><a href="' . $url . "&amp;page=" . $i . '">' . $i . '</a></li>';
        }
    }

    // next
    if ($page < $total) {
        $out.= '<li><a href="' . $url . '&amp;page=' . ($page + 1) . '">&Gt;</a></li>';
    } else {
        $out.= '<li class="disabled"><span>&Gt;</span></li>';
    }

    //last
    if ($page < $total) {
        $out.= '<li><a href="' . $url . '&amp;page=' . $total . '">' . PAGING_END . '</a></li>';
    } else {
        $out.= '<li class="disabled"><span>' . PAGING_END . '</span></li>';
    }

    $out.= '</ul>';
    return $out;
}

/**
 * Upload file
 * @param  string
 * @param  array
 * @return mixed
 */
function upload($field, $config = array()) {
    //cấu hình upload
    $options = array(
        'name' => '',
        'upload_path' => './',
        'allowed_exts' => '*',
        'overwrite' => TRUE,
        'max_size' => 0,
        'type' => 'image'
    );
    $options = array_merge($options, $config);

    //nếu chưa upload? kết thúc
    if (!isset($_FILES[$field])) {
        return FALSE;
    }

    //file upload
    $file = $_FILES[$field];

    //lỗi upload? kết thúc
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return FALSE;
    }

    //phần mở rộng của file
    $temp = explode(".", $file["name"]);
    $ext = end($temp);

    //phần mở rộng không phù hợp? kết thúc
    if ($options['allowed_exts'] != '*') {
        $allowedExts = explode('|', $options['allowed_exts']);
        if (!in_array($ext, $allowedExts)) {
            return FALSE;
        }
    }

    //kích thước quá lớn? kết thúc
    $size = $file['size'] / 1024 / 1024; //MB
    if (($options['max_size'] > 0) && ($size > $options['max_size'])) {
        return FALSE;
    }

    $name = empty($options['name']) ? $file["name"] : $options['name'] . '.' . $ext;
    $file_path = $options['upload_path'] . "org_" . $name;
    $file_path_thumb = $options['upload_path'] . $name;

    if ($options['type'] == 'image') { //neu up dang hinh thi up them anh thumb
        //nếu cho phép ghi đè
        if ($options['overwrite'] && file_exists($file_path)) {
            unlink($file_path);
        }
        //upload file và trả về tên file
        move_uploaded_file($file["tmp_name"], $file_path);
        if ($options['allowed_exts'] != 'ico') {
            // *** 1) Initialize / load image
            $resizeObj = new resizeimg($file_path);
            // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
            $resizeObj->resizeImage(300, 300, 'crop');
            // *** 3) Save image
            $resizeObj->saveImage($file_path_thumb, 100);
        } else {
            move_uploaded_file($file["tmp_name"], $file_path_thumb);
        }

        return array("img" => $file_path, "thumb" => $file_path_thumb);
    } else { //up FILE PDF
        if ($options['overwrite'] && file_exists($file_path)) {
            unlink($file_path);
        }
        move_uploaded_file($file["tmp_name"], $file_path);
        return $file_path;
    }
}

/**
 * chuyển về chuỗi tiếng việt không dấu
 * @param  string
 * @return string
 */
function strU($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace("/[^A-Za-z0-9 ]/", '', $str);
    $str = preg_replace("/\s+/", ' ', $str);
    $str = trim($str);
    return $str;
}

/**
 * Chuyển về chuỗi alias
 * @param  string
 * @return string
 */
function alias($str) {
    $str = strU($str);
    $str = strtolower($str);
    $str = str_replace(' ', '-', $str);
    return $str;
}

function get_day_name($timestamp) {

    $date = date_format(date_create($timestamp), 'd/m/Y');
    $yesterday = mktime(0, 0, 0, date("m"), date("d") - 1, date("Y"));

    if ($date == date('d/m/Y')) {
        $date = 'Hôm nay';
    } else if ($date == date('d/m/Y', $yesterday)) {
        $date = 'Hôm qua';
    }

    return $date;
}

function show_message($type) {
    $message = NULL;
    switch ($type) {
        case "error":
            if (isset($_SESSION['message']['error'])) {
                $message = $_SESSION['message']['error'];
                unset($_SESSION['message']['error']);
            }
            break;
        case "success":
            if (isset($_SESSION['message']['success'])) {
                $message = $_SESSION['message']['success'];
                unset($_SESSION['message']['success']);
            }
            break;
        case "warning":
            if (isset($_SESSION['message']['warning'])) {
                $message = $_SESSION['message']['warning'];
                unset($_SESSION['message']['warning']);
            }
            break;
        case "info":
            if (isset($_SESSION['message']['info'])) {
                $message = $_SESSION['message']['info'];
                unset($_SESSION['message']['info']);
            }
            break;
    }
    return $message;
}

function get_time_zones_list() {
    $time_zones = array(
        'Pacific/Midway' => "(GMT-11:00) Midway Island",
        'US/Samoa' => "(GMT-11:00) Samoa",
        'US/Hawaii' => "(GMT-10:00) Hawaii",
        'US/Alaska' => "(GMT-09:00) Alaska",
        'US/Pacific' => "(GMT-08:00) Pacific Time (US &amp; Canada)",
        'America/Tijuana' => "(GMT-08:00) Tijuana",
        'US/Arizona' => "(GMT-07:00) Arizona",
        'US/Mountain' => "(GMT-07:00) Mountain Time (US &amp; Canada)",
        'America/Chihuahua' => "(GMT-07:00) Chihuahua",
        'America/Mazatlan' => "(GMT-07:00) Mazatlan",
        'America/Mexico_City' => "(GMT-06:00) Mexico City",
        'America/Monterrey' => "(GMT-06:00) Monterrey",
        'Canada/Saskatchewan' => "(GMT-06:00) Saskatchewan",
        'US/Central' => "(GMT-06:00) Central Time (US &amp; Canada)",
        'US/Eastern' => "(GMT-05:00) Eastern Time (US &amp; Canada)",
        'US/East-Indiana' => "(GMT-05:00) Indiana (East)",
        'America/Bogota' => "(GMT-05:00) Bogota",
        'America/Lima' => "(GMT-05:00) Lima",
        'America/Caracas' => "(GMT-04:30) Caracas",
        'Canada/Atlantic' => "(GMT-04:00) Atlantic Time (Canada)",
        'America/La_Paz' => "(GMT-04:00) La Paz",
        'America/Santiago' => "(GMT-04:00) Santiago",
        'Canada/Newfoundland' => "(GMT-03:30) Newfoundland",
        'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
        'Greenland' => "(GMT-03:00) Greenland",
        'Atlantic/Stanley' => "(GMT-02:00) Stanley",
        'Atlantic/Azores' => "(GMT-01:00) Azores",
        'Atlantic/Cape_Verde' => "(GMT-01:00) Cape Verde Is.",
        'Africa/Casablanca' => "(GMT) Casablanca",
        'Europe/Dublin' => "(GMT) Dublin",
        'Europe/Lisbon' => "(GMT) Lisbon",
        'Europe/London' => "(GMT) London",
        'Africa/Monrovia' => "(GMT) Monrovia",
        'Europe/Amsterdam' => "(GMT+01:00) Amsterdam",
        'Europe/Belgrade' => "(GMT+01:00) Belgrade",
        'Europe/Berlin' => "(GMT+01:00) Berlin",
        'Europe/Bratislava' => "(GMT+01:00) Bratislava",
        'Europe/Brussels' => "(GMT+01:00) Brussels",
        'Europe/Budapest' => "(GMT+01:00) Budapest",
        'Europe/Copenhagen' => "(GMT+01:00) Copenhagen",
        'Europe/Ljubljana' => "(GMT+01:00) Ljubljana",
        'Europe/Madrid' => "(GMT+01:00) Madrid",
        'Europe/Paris' => "(GMT+01:00) Paris",
        'Europe/Prague' => "(GMT+01:00) Prague",
        'Europe/Rome' => "(GMT+01:00) Rome",
        'Europe/Sarajevo' => "(GMT+01:00) Sarajevo",
        'Europe/Skopje' => "(GMT+01:00) Skopje",
        'Europe/Stockholm' => "(GMT+01:00) Stockholm",
        'Europe/Vienna' => "(GMT+01:00) Vienna",
        'Europe/Warsaw' => "(GMT+01:00) Warsaw",
        'Europe/Zagreb' => "(GMT+01:00) Zagreb",
        'Europe/Athens' => "(GMT+02:00) Athens",
        'Europe/Bucharest' => "(GMT+02:00) Bucharest",
        'Africa/Cairo' => "(GMT+02:00) Cairo",
        'Africa/Harare' => "(GMT+02:00) Harare",
        'Europe/Helsinki' => "(GMT+02:00) Helsinki",
        'Europe/Istanbul' => "(GMT+02:00) Istanbul",
        'Asia/Jerusalem' => "(GMT+02:00) Jerusalem",
        'Europe/Kiev' => "(GMT+02:00) Kyiv",
        'Europe/Minsk' => "(GMT+02:00) Minsk",
        'Europe/Riga' => "(GMT+02:00) Riga",
        'Europe/Sofia' => "(GMT+02:00) Sofia",
        'Europe/Tallinn' => "(GMT+02:00) Tallinn",
        'Europe/Vilnius' => "(GMT+02:00) Vilnius",
        'Asia/Baghdad' => "(GMT+03:00) Baghdad",
        'Asia/Kuwait' => "(GMT+03:00) Kuwait",
        'Africa/Nairobi' => "(GMT+03:00) Nairobi",
        'Asia/Riyadh' => "(GMT+03:00) Riyadh",
        'Europe/Moscow' => "(GMT+03:00) Moscow",
        'Asia/Tehran' => "(GMT+03:30) Tehran",
        'Asia/Baku' => "(GMT+04:00) Baku",
        'Europe/Volgograd' => "(GMT+04:00) Volgograd",
        'Asia/Muscat' => "(GMT+04:00) Muscat",
        'Asia/Tbilisi' => "(GMT+04:00) Tbilisi",
        'Asia/Yerevan' => "(GMT+04:00) Yerevan",
        'Asia/Kabul' => "(GMT+04:30) Kabul",
        'Asia/Karachi' => "(GMT+05:00) Karachi",
        'Asia/Tashkent' => "(GMT+05:00) Tashkent",
        'Asia/Kolkata' => "(GMT+05:30) Kolkata",
        'Asia/Kathmandu' => "(GMT+05:45) Kathmandu",
        'Asia/Yekaterinburg' => "(GMT+06:00) Ekaterinburg",
        'Asia/Almaty' => "(GMT+06:00) Almaty",
        'Asia/Dhaka' => "(GMT+06:00) Dhaka",
        'Asia/Novosibirsk' => "(GMT+07:00) Novosibirsk",
        'Asia/Bangkok' => "(GMT+07:00) Bangkok",
        'Asia/Jakarta' => "(GMT+07:00) Jakarta",
        'Asia/Krasnoyarsk' => "(GMT+08:00) Krasnoyarsk",
        'Asia/Chongqing' => "(GMT+08:00) Chongqing",
        'Asia/Hong_Kong' => "(GMT+08:00) Hong Kong",
        'Asia/Kuala_Lumpur' => "(GMT+08:00) Kuala Lumpur",
        'Australia/Perth' => "(GMT+08:00) Perth",
        'Asia/Singapore' => "(GMT+08:00) Singapore",
        'Asia/Taipei' => "(GMT+08:00) Taipei",
        'Asia/Ulaanbaatar' => "(GMT+08:00) Ulaan Bataar",
        'Asia/Urumqi' => "(GMT+08:00) Urumqi",
        'Asia/Irkutsk' => "(GMT+09:00) Irkutsk",
        'Asia/Seoul' => "(GMT+09:00) Seoul",
        'Asia/Tokyo' => "(GMT+09:00) Tokyo",
        'Australia/Adelaide' => "(GMT+09:30) Adelaide",
        'Australia/Darwin' => "(GMT+09:30) Darwin",
        'Asia/Yakutsk' => "(GMT+10:00) Yakutsk",
        'Australia/Brisbane' => "(GMT+10:00) Brisbane",
        'Australia/Canberra' => "(GMT+10:00) Canberra",
        'Pacific/Guam' => "(GMT+10:00) Guam",
        'Australia/Hobart' => "(GMT+10:00) Hobart",
        'Australia/Melbourne' => "(GMT+10:00) Melbourne",
        'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
        'Australia/Sydney' => "(GMT+10:00) Sydney",
        'Asia/Vladivostok' => "(GMT+11:00) Vladivostok",
        'Asia/Magadan' => "(GMT+12:00) Magadan",
        'Pacific/Auckland' => "(GMT+12:00) Auckland",
        'Pacific/Fiji' => "(GMT+12:00) Fiji",
    );
    return $time_zones;
}

function read_configuration_info() {
    $str = file_get_contents("libraries/configuration.php");
    $str = substr($str, 7, strlen($str));
    $str = substr($str, 0, strlen($str) - 5);
    return explode("#@#", $str);
}
