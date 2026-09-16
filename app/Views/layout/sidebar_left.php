<aside class="relative col-span-12 flex flex-col justify-between border-chinjufu-line bg-chinjufu-panel/40 py-8 lg:col-span-2 lg:border-r lg:px-5">

  <nav class="flex flex-col gap-1">
    <?php
      $sideMenu = [
        ['label' => 'Beranda',         'url' => '/',              'icon' => 'M4 4h7v7H4V4Zm9 0h7v7h-7V4ZM4 13h7v7H4v-7Zm9 0h7v7h-7v-7Z', 'active' => true],
        ['label' => 'Museum Kapal',    'url' => '/museum/kapal',  'icon' => 'M3 18l2-7h14l2 7M6 11V6h12v5M9 21v-3h6v3'],
        ['label' => 'Museum Perwira',  'url' => '/museum/perwira','icon' => 'M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm7-3a7 7 0 0 0-.14-1.4l2-1.56-2-3.46-2.36.96a7 7 0 0 0-2.4-1.4L13.6 2h-3.2l-.5 2.14a7 7 0 0 0-2.4 1.4l-2.36-.96-2 3.46 2 1.56A7 7 0 0 0 5 12c0 .48.05.94.14 1.4l-2 1.56 2 3.46 2.36-.96c.7.6 1.52 1.08 2.4 1.4l.5 2.14h3.2l.5-2.14a7 7 0 0 0 2.4-1.4l2.36.96 2-3.46-2-1.56c.09-.46.14-.92.14-1.4Z'],
        ['label' => 'Hall of Fame',    'url' => '/hall-of-fame',  'icon' => 'M6 3h12v4a6 6 0 0 1-12 0V3ZM4 5h2M18 5h2M9 17h6v4H9v-4Z'],
        ['label' => 'Roll of Honor',   'url' => '/roll-of-honor', 'icon' => 'M12 2v20M6 8h12M4 14h16a8 8 0 0 1-16 0Z'],
        ['label' => 'Arsip Sejarah',   'url' => '/arsip',         'icon' => 'M4 5h16v15H4V5Zm0 5h16M8 3v4M16 3v4'],
        ['label' => 'Komunitas',       'url' => '/komunitas',     'icon' => 'M16 14a4 4 0 1 0-8 0M12 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm7 9a7 7 0 0 0-14 0'],
      ];
    ?>
    <?php foreach ($sideMenu as $item): ?>
      <a href="<?= base_url($item['url']) ?>"
         class="group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition
                <?= !empty($item['active'])
                      ? 'bg-chinjufu-gold/10 text-chinjufu-gold-soft'
                      : 'text-slate-300 hover:bg-white/5 hover:text-white' ?>">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="shrink-0">
          <path d="<?= $item['icon'] ?>" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span><?= esc($item['label']) ?></span>
      </a>
    <?php endforeach; ?>
  </nav>

  <div class="relative mt-10 overflow-hidden rounded-xl border border-chinjufu-line px-4 py-5">
    <svg width="90" height="90" viewBox="0 0 24 24" fill="none" class="pointer-events-none absolute -bottom-4 -right-4 text-chinjufu-gold/5">
      <path d="M12 2v20M6 8h12M4 14h16a8 8 0 0 1-16 0Z" stroke="currentColor" stroke-width="1"/>
    </svg>
    <p class="relative font-serif text-[15px] italic leading-relaxed text-slate-300">
      "Kita bukan hanya memainkan game ini, kita mencatat sejarah armada bersama."
    </p>
  </div>
</aside>