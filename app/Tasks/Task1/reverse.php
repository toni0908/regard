<?php
if (!function_exists('reverse')) {
    function reverse(\App\Tasks\Task1\Test $test): \App\Tasks\Task1\Test
    {
        if (!$test->next) return $test;
        $prev = null;

        $current = $test;

        while ($current) {
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }

        return $prev;
    }
}

