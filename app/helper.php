<?php

use Carbon\Carbon;

if (!function_exists('formatToDaysAgo')) {
    function formatToDaysAgo(Carbon $createdAt): string
    {
        return $createdAt->diffForHumans();
    }
}

if (!function_exists('formatToEasyToReadShort')) {
    function formatToEasyToReadShort(Carbon $createdAt): string
    {
        return $createdAt->format('jS - M, y');
    }
}
if (!function_exists('formatToEasyToReadLong')) {
    function formatToEasyToReadLong(Carbon $createdAt): string
    {
        return $createdAt->format('jS - M, Y');
    }
}

if (!function_exists('isZero')) {
    function isZero($num): bool
    {
        return $num == 0;
    }
}
