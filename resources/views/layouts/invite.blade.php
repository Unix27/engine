<?php
$rawFullUrl = url(\Illuminate\Support\Facades\Request::getRequestUri());
$fullUrl = rawurldecode($rawFullUrl);
$plugins = array_keys((array)config('plugins'));
$publicDisk = \Storage::disk(config('filesystems.default'));
?>

@yield('content')
