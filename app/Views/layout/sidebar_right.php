<aside class="col-span-12 flex flex-col gap-8 border-chinjufu-line py-8 lg:col-span-3 lg:border-l lg:pl-6">

  <!-- Widget Hall of Fame -->
  <section>
    <div class="mb-4 flex items-center justify-between">
      <div class="flex items-center gap-2">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="text-chinjufu-gold">
          <path d="M6 3h12v4a6 6 0 0 1-12 0V3ZM4 5h2M18 5h2M9 17h6v4H9v-4Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
        </svg>
        <h3 class="font-serif text-base text-white">Hall of Fame</h3>
      </div>
      <a href="<?= base_url('/hall-of-fame') ?>" class="text-xs text-chinjufu-gold-soft hover:text-chinjufu-gold">Lihat Semua</a>
    </div>

    <div class="grid grid-cols-4 gap-2 lg:grid-cols-2">
      <?php foreach (($hofHighlights ?? []) as $t): ?>
        <a href="<?= base_url('/hall-of-fame/' . $t['id']) ?>"
           class="group relative overflow-hidden rounded-lg border border-chinjufu-line">
          <img src="<?= esc($t['photo']) ?>" alt="<?= esc($t['nama']) ?>"
               class="aspect-[3/4] w-full object-cover transition duration-300 group-hover:scale-105">
          <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-chinjufu-dark via-chinjufu-dark/70 to-transparent p-2">
            <p class="truncate text-[11px] font-semibold text-white"><?= esc($t['nama']) ?></p>
            <p class="truncate text-[10px] text-chinjufu-muted"><?= esc($t['role']) ?> · <?= esc($t['tahun']) ?></p>
          </div>
          <span class="absolute right-1.5 top-1.5 rounded-full bg-chinjufu-dark/70 p-1">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" class="text-chinjufu-gold">
              <path d="M12 2 9 8l-6 .9 4.4 4.2L6.2 19 12 15.9 17.8 19l-1.2-5.9 4.4-4.2L15 8Z" fill="currentColor"/>
            </svg>
          </span>
        </a>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Widget Roll of Honor -->
  <section>
    <div class="mb-4 flex items-center justify-between">
      <div class="flex items-center gap-2">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="text-chinjufu-gold">
          <path d="M12 2v20M6 8h12M4 14h16a8 8 0 0 1-16 0Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <h3 class="font-serif text-base text-white">Roll of Honor</h3>
      </div>
      <a href="<?= base_url('/roll-of-honor') ?>" class="text-xs text-chinjufu-gold-soft hover:text-chinjufu-gold">Lihat Semua</a>
    </div>

    <div class="overflow-hidden rounded-lg border border-chinjufu-line">
      <div class="grid grid-cols-[1.6fr_1fr_0.8fr] bg-white/5 px-3 py-2 text-[11px] text-chinjufu-muted">
        <span>Nama</span><span>Kategori</span><span class="text-right">Tanggal</span>
      </div>
      <?php foreach (($rohHighlights ?? []) as $i => $r): ?>
        <div class="grid grid-cols-[1.6fr_1fr_0.8fr] items-center gap-2 px-3 py-2.5 text-[12px]
                    <?= $i % 2 === 0 ? 'bg-transparent' : 'bg-white/[0.02]' ?>">
          <div class="flex items-center gap-2 overflow-hidden">
            <img src="<?= esc($r['avatar']) ?>" alt="" class="h-6 w-6 shrink-0 rounded-full border border-chinjufu-line object-cover">
            <span class="truncate text-slate-200"><?= esc($r['nama']) ?></span>
          </div>
          <div class="flex items-center gap-1 text-chinjufu-muted">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" class="shrink-0 text-chinjufu-gold">
              <path d="M12 2 9 8l-6 .9 4.4 4.2L6.2 19 12 15.9 17.8 19l-1.2-5.9 4.4-4.2L15 8Z" fill="currentColor"/>
            </svg>
            <span class="truncate"><?= esc($r['kategori']) ?></span>
          </div>
          <span class="text-right text-chinjufu-muted"><?= esc($r['tanggal']) ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Grafis penutup -->
  <div class="relative mt-2 overflow-hidden rounded-xl border border-chinjufu-line">
    <img src="https://placehold.co/480x220/0B1320/1a2740?text=" alt="" class="h-28 w-full object-cover opacity-70">
    <div class="absolute inset-0 flex items-end bg-gradient-to-t from-chinjufu-dark via-chinjufu-dark/40 to-transparent p-4">
      <p class="font-serif text-sm italic text-slate-200">"Sampai jumpa di laut, sekali lagi."</p>
    </div>
  </div>
</aside>
