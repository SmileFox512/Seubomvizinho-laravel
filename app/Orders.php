<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Orders
{
    public static function getAll()
    {
        $userid = Auth::user()->id;
        return DB::select("SELECT orders.id, orders.updated_at, orders.total, ordersdetails.food, orderstatuses.status
            FROM orders
            LEFT JOIN ordersdetails ON ordersdetails.order=orders.id
            LEFT JOIN orderstatuses ON orderstatuses.id=orders.status
            WHERE orders.user=$userid AND orders.send=1
            GROUP BY orders.id ORDER BY orders.updated_at DESC
        ");
    }
}
