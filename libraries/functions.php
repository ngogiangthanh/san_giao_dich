<?php

include_once 'resizeimg.php';

/**
 * Chuyển hướng đến trang báo lỗi 404
 */
function show_404() {
    header('HTTP/1.1 Not Found 404', true, 404);
    require('./404.php');
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
    $prevlabel = "&lsaquo; ".PAGING_PREVIOUS;
    $nextlabel = PAGING_NEXT." &rsaquo;";
    $out = '<ul class="pagination">';

    //first
    if ($page == 1) {
        $out.= '<li class="disabled"><span>'.PAGING_FIRST.'</span></li>';
    } else {
        $out.='<li><a href="' . $url . '">'.PAGING_FIRST.'</a></li>';
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
        $out.= '<li><a href="' . $url . '&amp;page=' . $total . '">'.PAGING_END.'</a></li>';
    } else {
        $out.= '<li class="disabled"><span>'.PAGING_END.'</span></li>';
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
    $file_path = $options['upload_path'] . $name;
    $file_path_thumb = $options['upload_path'] . "thumb_" . $name;

    if ($options['type'] == 'image') { //neu up dang hinh thi up them anh thumb
        //nếu cho phép ghi đè
        if ($options['overwrite'] && file_exists($file_path)) {
            unlink($file_path);
        }
        //upload file và trả về tên file
        move_uploaded_file($file["tmp_name"], $file_path);
        // *** 1) Initialize / load image
        $resizeObj = new resizeimg($file_path);
        // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
        $resizeObj->resizeImage(200, 200);
        // *** 3) Save image
        $resizeObj->saveImage($file_path_thumb, 100);
        return array("img" => $file_path, "thumb" => $file_path_thumb);
    } else { //up FILE PDF
          if ($options['overwrite'] && file_exists($file_path)) {
                    unlink($file_path);
                }
                move_uploaded_file($file["tmp_name"], $file_path);
                return $file_path;
//        $finfo = finfo_open(FILEINFO_MIME_TYPE);
//        $mime = finfo_file($finfo, $file["tmp_name"]);
//        switch ($mime) {
//            case 'image/jpeg':
//            case 'application/pdf':
//                //nếu cho phép ghi đè
//              
//            default:
//                return FALSE; //kiem tra khong hop le dinh dang
//        }
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
