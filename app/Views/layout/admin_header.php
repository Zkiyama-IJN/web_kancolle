<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= esc($title ?? 'Panel Admin — Chinjufu Archive') ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="<?= base_url('assets/js/tailwind-config.js') ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>
<body class="bg-chinjufu-dark font-sans text-slate-100 antialiased">

<div class="grid min-h-screen grid-cols-1 lg:grid-cols-[240px_1fr]">

  <?= $this->include('layout/admin_sidebar') ?>

  <div class="flex flex-col">
    <header class="flex items-center justify-between border-b border-chinjufu-line px-6 py-4 lg:px-8">
      <div>
        <p class="text-xs uppercase tracking-[0.2em] text-chinjufu-gold-soft">Panel Administrator</p>
        <h1 class="mt-1 font-serif text-xl text-white"><?= esc($pageTitle ?? 'Dashboard') ?></h1>
      </div>

      <div class="flex items-center gap-4">
        <div class="text-right">
          <p class="text-sm text-white"><?= esc(session()->get('adminUsername')) ?></p>
          <p class="text-[11px] text-chinjufu-muted">Laksamana</p>
        </div>
        <div class="flex h-9 w-9 items-center justify-center rounded-full border border-chinjufu-gold/50 bg-chinjufu-panel text-sm font-semibold text-chinjufu-gold-soft">
          <?= esc(strtoupper(substr((string) session()->get('adminUsername'), 0, 1))) ?>
        </div>
        <a href="<?= base_url('admin/logout') ?>"
           class="rounded-lg border border-chinjufu-line p-2 text-chinjufu-muted transition hover:border-red-500/50 hover:text-red-300"
           title="Logout">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </header>

    <main class="flex-1 px-6 py-8 lg:px-8">

      <?php if (session()->getFlashdata('success')): ?>
        <div class="mb-6 rounded-lg border border-emerald-600/40 bg-emerald-600/10 px-4 py-3 text-sm text-emerald-300">
          <?= esc(session()->getFlashdata('success')) ?>
        </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="mb-6 rounded-lg border border-red-600/40 bg-red-600/10 px-4 py-3 text-sm text-red-300">
          <?= esc(session()->getFlashdata('error')) ?>
        </div>
      <?php endif; ?>