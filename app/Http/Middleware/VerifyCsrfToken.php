<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'chi-tiet-tin-ban-o-to',
        'chi-tiet-tin-ban-xe-may',
        'chi-tiet-tin-mua',
        'mua-dich-vu',
        'xem-xet-tin-ban-o-to',
        'xem-xet-tin-ban-xe-may',
        'xem-xet-tin-mua',
        'trangchu',
        'xoa-tin'
    ];
}
