<?php

// 1. Aktifkan pelaporan eror mentah ke browser jika terjadi crash fatal
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Jalankan aplikasi Laravel seperti biasa
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 3. Trik Sakti Serverless: Paksa Laravel memakai folder /tmp (folder bawaan Vercel yang bisa ditulis)
// Ini mencegah eror 500 akibat Laravel tidak bisa menulis cache view/session
$app->useStoragePath('/tmp');

// 4. Eksekusi request
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
$response->send();
$kernel->terminate($request, $response);    