<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= esc($title ?? 'Chinjufu Archive - Kantai Collection Community') ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&family=Noto+Serif+JP:wght@500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="<?= base_url('assets/js/tailwind-config.js') ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>
<body class="bg-chinjufu-dark text-slate-100 font-sans antialiased">

<header class="sticky top-0 z-40 w-full border-b border-chinjufu-line bg-chinjufu-dark/95 backdrop-blur">
    <div class="mx-auto flex max-w-[1600px] items-center justify-between gap-4 px-4 py-3 lg:px-6">

    <a href="<?= base_url('/') ?>" class="flex items-center gap-3 shrink-0">
      <svg width="34" height="34" viewBox="0 0 24 24" fill="none" class="text-chinjufu-gold">
        <path d="M12 2v20M6 8h12M4 14h16a8 8 0 0 1-16 0Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
        <circle cx="12" cy="4.5" r="1.6" fill="currentColor"/>
      </svg>
      <div class="leading-tight">
        <p class="font-serif text-lg text-white">Chinjufu Archive</p>
        <p class="font-jp text-[11px] text-chinjufu-muted">艦これ · Community · Museum · Hall of Fame</p>
      </div>
    </a>

    <nav class="hidden flex-1 justify-center gap-5 lg:flex xl:gap-7">
      <?php
        $menu = [
          ['label' => 'Beranda',        'url' => '/',              'active' => true],
          ['label' => 'Kapal & Penghargaan', 'url' => '/kapal'],
          ['label' => 'Museum',         'url' => '/museum'],
          ['label' => 'Hall of Fame',   'url' => '/hall-of-fame'],
          ['label' => 'Roll of Honor',  'url' => '/roll-of-honor'],
          ['label' => 'Komunitas',      'url' => '/komunitas'],
          ['label' => 'Tentang',        'url' => '/tentang'],
        ];
      ?>
      <?php foreach ($menu as $item): ?>
        <a href="<?= base_url($item['url']) ?>"
           class="relative whitespace-nowrap py-1 text-sm text-slate-300 transition hover:text-white <?= !empty($item['active']) ? 'text-white' : '' ?>">
          <?= esc($item['label']) ?>
          <?php if (!empty($item['active'])): ?>
            <span class="absolute -bottom-1 left-0 h-[2px] w-full bg-chinjufu-gold"></span>
          <?php endif; ?>
        </a>
      <?php endforeach; ?>
    </nav>

    <div class="flex shrink-0 items-center gap-2.5">
      <div class="hidden items-center rounded-full border border-chinjufu-line bg-chinjufu-panel/70 px-4 py-2 xl:flex">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="mr-2 text-chinjufu-muted">
          <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.6"/>
          <path d="m20 20-3.2-3.2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
        </svg>
        <input type="text" placeholder="Cari Teitoku, kapal, event..."
               class="w-44 bg-transparent text-sm text-slate-200 placeholder:text-chinjufu-muted focus:outline-none">
      </div>

      <a href="<?= base_url('/daftar') ?>"
         class="hidden items-center gap-1.5 whitespace-nowrap rounded-full bg-chinjufu-gold px-3.5 py-2 text-xs font-semibold text-chinjufu-dark transition hover:bg-chinjufu-gold-soft lg:flex">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
          <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
        Ajukan Profil
      </a>

      <a href="<?= base_url('admin/login') ?>"
         class="hidden items-center gap-1.5 whitespace-nowrap rounded-full border border-chinjufu-gold/40 px-3.5 py-2 text-xs font-medium text-chinjufu-gold-soft transition hover:bg-chinjufu-gold hover:text-chinjufu-dark lg:flex">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
          <path d="M14 4h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Login Admin
      </a>
    </div>
  </div>
</header>