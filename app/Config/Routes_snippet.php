<?php
// Tambahkan baris ini ke app/Config/Routes.php yang sudah ada (jangan overwrite file asli)

$routes->get('/', 'Pages::index');

// Placeholder route Fase 2 (belum ada Controller-nya, sengaja disiapkan agar link header/sidebar tidak 404 saat diklik nanti)
// $routes->get('hall-of-fame', 'HallOfFame::index');
// $routes->get('roll-of-honor', 'HonorRoll::index');
