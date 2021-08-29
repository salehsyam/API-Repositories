<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface OrderInterface
{
    /**
     * @param Request $request
     */
    public function getinsertOrder(Request $request);


    /**
     * @return mixed
     */

    public function getAllOrder();

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getmyOrders();

}
