  <footer class="border-t border-chinjufu-line">
    <div class="mx-auto grid max-w-[1600px] grid-cols-1 items-center gap-6 px-6 py-8 lg:grid-cols-3 lg:px-10">

      <div class="flex items-center gap-3 text-chinjufu-muted">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" class="shrink-0">
          <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.2"/>
          <path d="M12 4v16M4 12h16M6.5 6.5l11 11M17.5 6.5l-11 11" stroke="currentColor" stroke-width="1" opacity="0.6"/>
        </svg>
        <span class="text-xs">Pangkalan digital untuk armada dan Teitoku Indonesia.</span>
      </div>

      <nav class="flex flex-wrap items-center justify-center gap-x-5 gap-y-2 text-xs text-slate-300">
        <a href="<?= base_url('/hall-of-fame') ?>" class="hover:text-white">Hall of Fame</a>
        <a href="<?= base_url('/roll-of-honor') ?>" class="hover:text-white">Roll of Honor</a>
        <a href="<?= base_url('/museum') ?>" class="hover:text-white">Museum</a>
        <a href="<?= base_url('/komunitas') ?>" class="hover:text-white">Komunitas</a>
        <a href="<?= base_url('/tentang') ?>" class="hover:text-white">Tentang</a>
      </nav>

      <div class="flex items-center justify-start gap-4 lg:justify-end">
        <?php
          $socials = [
            'Discord' => 'M7 8c3.3-1 6.7-1 10 0M8 15.5c2.6.8 5.4.8 8 0M9 11c0 .8-.6 1.5-1.3 1.5S6.3 11.8 6.3 11 7 9.5 7.7 9.5 9 10.2 9 11Zm8 0c0 .8-.6 1.5-1.3 1.5S14.3 11.8 14.3 11s.7-1.5 1.4-1.5 1.3.7 1.3 1.5Z',
            'YouTube' => 'M4 8a3 3 0 0 1 3-3h10a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V8Zm7 1.5 4 2.5-4 2.5v-5Z',
            'X'       => 'M5 5l14 14M19 5 5 19',
            'Facebook'=> 'M14 22v-8h3l.5-3.5H14V8.2c0-1 .3-1.7 1.8-1.7H18V3.3C17.6 3.2 16.4 3 15 3c-2.9 0-4.9 1.8-4.9 5.1v2.4H7V14h3v8h4Z',
          ];
        ?>
        <?php foreach ($socials as $name => $path): ?>
          <a href="#" aria-label="<?= esc($name) ?>" class="rounded-full border border-chinjufu-line p-2 text-chinjufu-muted transition hover:border-chinjufu-gold/50 hover:text-chinjufu-gold">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none">
              <path d="<?= $path ?>" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="border-t border-chinjufu-line px-6 py-4 text-center text-[11px] text-chinjufu-muted lg:px-10">
      © <?= date('Y') ?> Chinjufu Archive — Dibuat oleh dan untuk komunitas Kantai Collection Indonesia.
    </div>
  </footer>

</body>
</html>
