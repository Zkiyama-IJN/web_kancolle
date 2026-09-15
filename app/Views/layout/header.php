<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= esc($title ?? 'Chinjufu Archive - Kantai Collection Community') ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&family=Noto+Serif+JP:wght@500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          'chinjufu-dark': '#0B1320',
          'chinjufu-panel': '#111A2C',
          'chinjufu-line': 'rgba(212,175,55,0.14)',
          'chinjufu-gold': '#D4AF37',
          'chinjufu-gold-soft': '#E9CD6B',
          'chinjufu-muted': '#94A3B8',
        },
        fontFamily: {
          serif: ['"Playfair Display"', 'serif'],
          jp: ['"Noto Serif JP"', 'serif'],
          sans: ['Inter', 'sans-serif'],
        },
      }
    }
  }
</script>
<link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>
<body class="bg-chinjufu-dark text-slate-100 font-sans antialiased">

<header class="sticky top-0 z-40 w-full border-b border-chinjufu-line bg-chinjufu-dark/95 backdrop-blur">
  <div class="mx-auto flex max-w-[1600px] items-center justify-between gap-6 px-6 py-3 lg:px-10">

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

    <nav class="hidden flex-1 justify-center gap-8 lg:flex">
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
           class="relative py-1 text-sm text-slate-300 transition hover:text-white <?= !empty($item['active']) ? 'text-white' : '' ?>">
          <?= esc($item['label']) ?>
          <?php if (!empty($item['active'])): ?>
            <span class="absolute -bottom-1 left-0 h-[2px] w-full bg-chinjufu-gold"></span>
          <?php endif; ?>
        </a>
      <?php endforeach; ?>
    </nav>

    <div class="flex items-center gap-4">
      <div class="hidden items-center rounded-full border border-chinjufu-line bg-chinjufu-panel/70 px-4 py-2 md:flex">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="mr-2 text-chinjufu-muted">
          <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.6"/>
          <path d="m20 20-3.2-3.2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
        </svg>
        <input type="text" placeholder="Cari Teitoku, kapal, event..."
               class="w-40 bg-transparent text-sm text-slate-200 placeholder:text-chinjufu-muted focus:outline-none lg:w-56">
      </div>

      <button class="relative rounded-full border border-chinjufu-line p-2 text-chinjufu-muted hover:text-white">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
          <path d="M6 8a6 6 0 1 1 12 0c0 5 2 6 2 6H4s2-1 2-6Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
          <path d="M10 20a2 2 0 0 0 4 0" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <span class="absolute right-1 top-1 h-1.5 w-1.5 rounded-full bg-red-500"></span>
      </button>

      <a href="<?= base_url('/profil') ?>" class="flex items-center gap-2">
        <img src="https://placehold.co/64x64/111A2C/D4AF37?text=T" alt="Avatar" class="h-8 w-8 rounded-full border border-chinjufu-gold/60 object-cover">
        <span class="hidden text-sm text-slate-300 xl:inline">Selamat datang, Teitoku</span>
      </a>
    </div>
  </div>
</header>
