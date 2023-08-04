<?php


namespace App\Utilities;

class Constant {


    // Order

    const order_status_ReceiveOrder = 1;
    const order_status_Unconfirmed = 2;
    const order_status_Confirmed = 3;
    const order_status_Paid = 4;
    const order_status_Processing = 5;
    const order_status_Shipping = 6;
    const order_status_Finish = 7;
    const order_status_Cancel = 0;  

    public static $order_status = [
        self::order_status_Cancel => 'Cancel',
        self::order_status_ReceiveOrder => 'Receive Order',
        self::order_status_Unconfirmed => 'Unconfirmed',
        self::order_status_Confirmed => 'Confirmed',
        self::order_status_Paid => 'Paid',
        self::order_status_Processing => 'Processing',
        self::order_status_Shipping => 'Shipping',
        self::order_status_Finish => 'Finish',
    ];


    // USER
    const user_level_host = 0;
    const user_level_admin = 1;
    const user_level_client = 2;

    public static $user_level = [
        self::user_level_admin => 'admin',
        self::user_level_client => 'client',
        self::user_level_host => 'host',
    ];


}