<?php

//if form submit 
if (!empty($_POST)) {
    $statusorderbefore = $_POST['statusorder'];  //trạng thái đơn trước đó
    $points = intval($_POST['points']); //point tăng lên
    $totalpoints = intval($_POST['totalpoints']); //tổng điểm trước đó
    $oid = intval($_POST['oid']); //order id
    $uid = intval($_POST['uid']); //user id
    if ($_POST['typeprocess'] == 'sucess') {//truong hop xu ly
        $order = array(
            'id' => $oid,
            'status_order' => 1,
            'time_process' => date("Y-m-d H:i:s", time()),
            'id_admin' => $_SESSION['login'][0]);
        //cap nhat lai thong tin diem khach hàng 
        if ($statusorderbefore != 1) {//chua xu ly mới cộng lên
            $order['current_points'] = $totalpoints;
            save('user', array(
                'id' => $uid,
                'point' => $totalpoints + $points));
        }
        //cap nhat lai bang orders
        save('orders', $order);
    } else {//truong hop huy bo
        //cap nhat lai bang orders
        $order = array(
            'id' => $oid,
            'status_order' => 2,
            'time_process' => date("Y-m-d H:i:s", time()),
            'current_points' => 0,
            'id_admin' => $_SESSION['login'][0]);
        save('orders', $order);
        //cap nhat lai thong tin diem khach hàng 
        if ($statusorderbefore == 1) {//đã xử lý thì trừ lại
            save('user', array(
                'id' => $uid,
                'point' => $totalpoints - $points));
        }
    }
    header('location:admin.php?controller=order&action=view&oid=' . $oid . '&statusupdate=true');
} else {
    header('location:admin.php?controller=order');
}
