<aside class="hidden border-r border-chinjufu-line bg-chinjufu-panel/40 lg:flex lg:flex-col lg:justify-between">
  <div>
    <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center gap-3 border-b border-chinjufu-line px-6 py-5">
      <svg width="28" height="28" viewBox="0 0 24 24" fill="none" class="text-chinjufu-gold">
        <path d="M12 2v20M6 8h12M4 14h16a8 8 0 0 1-16 0Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
        <circle cx="12" cy="4.5" r="1.6" fill="currentColor"/>
      </svg>
      <span class="font-serif text-base text-white">Chinjufu Admin</span>
    </a>

    <nav class="flex flex-col gap-1 px-4 py-6">
      <?php
        $currentPath = trim(current_url(true)->getPath(), '/');
        $adminMenu = [
          ['label' => 'Dashboard & Verifikasi', 'url' => 'admin/dashboard',  'match' => 'admin/dashboard',  'icon' => 'M4 4h7v7H4V4Zm9 0h7v7h-7V4ZM4 13h7v7H4v-7Zm9 0h7v7h-7v-7Z'],
          ['label' => 'Roll of Honor',          'url' => 'admin/honor-roll', 'match' => 'admin/honor-roll', 'icon' => 'M12 2v20M6 8h12M4 14h16a8 8 0 0 1-16 0Z'],
        ];
      ?>
      <?php foreach ($adminMenu as $item): ?>
        <a href="<?= base_url($item['url']) ?>"
           class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition
                  <?= str_starts_with($currentPath, $item['match'])
                        ? 'bg-chinjufu-gold/10 text-chinjufu-gold-soft'
                        : 'text-slate-300 hover:bg-white/5 hover:text-white' ?>">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" class="shrink-0">
            <path d="<?= $item['icon'] ?>" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <?= esc($item['label']) ?>
        </a>
      <?php endforeach; ?>
    </nav>
  </div>

  <div class="border-t border-chinjufu-line px-4 py-4">
    <a href="<?= base_url('/') ?>" class="flex items-center gap-2 rounded-lg px-3 py-2 text-xs text-chinjufu-muted hover:text-slate-200">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M11 5 4 12l7 7M4 12h16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
      Lihat Situs Publik
    </a>
  </div>
</aside>