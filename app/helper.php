<?php

use Carbon\Carbon;

if (!function_exists('formatTime')) {
    function formatTime($dateString): string
    {
        $timestampCarbon = Carbon::parse($dateString);
        $hoursAgo = $timestampCarbon->diffInHours();
        $minutesAgo = $timestampCarbon->diffInMinutes();

        if ($hoursAgo > 0) {
            return "$hoursAgo " . ($hoursAgo === 1 ? 'hour' : 'hours') . ' ago';
        } elseif ($minutesAgo > 0) {
            return "$minutesAgo " . ($minutesAgo === 1 ? 'minute' : 'minutes') . ' ago';
        } else {
            return 'just now';
        }
    }
}
