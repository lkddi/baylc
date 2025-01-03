<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\Examples;
use App\Http\Controllers\Controller;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->header('POS')
            ->description('微信红包销售登记系统')
            ->body(function (Row $row) {
                $row->column(6, function (Column $column) {
                    $column->row(Dashboard::title());
                    $column->row(new Examples\Tickets());
                });

                $row->column(6, function (Column $column) {
                    $column->row(function (Row $row) {
                        $row->column(6, new Examples\NewSales());
                        $row->column(6, new Examples\NewDevices());
                    });

                    $column->row(new Examples\Sessions());
                    $column->row(new Examples\ProductOrders());
                });
            });
    }
}
