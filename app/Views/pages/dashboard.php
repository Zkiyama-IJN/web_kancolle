<?= $this->include('layout/header') ?>

<div class="mx-auto max-w-[1600px] lg:grid lg:grid-cols-12">

  <?= $this->include('layout/sidebar_left') ?>

  <main class="col-span-12 px-6 py-8 lg:col-span-7 lg:px-8">
    <div class="flex flex-col gap-12">

      <!-- Hero Banner -->
      <section class="relative overflow-hidden rounded-2xl border border-chinjufu-line">
        <img src="https://placehold.co/1200x520/0B1320/15233a?text=Kanmusu+Hero"
             alt="Kanmusu unggulan pangkalan"
             class="h-[320px] w-full object-cover lg:h-[420px]">
        <div class="absolute inset-0 bg-gradient-to-t from-chinjufu-dark via-chinjufu-dark/30 to-transparent"></div>

        <div class="absolute bottom-6 left-6 right-6 lg:bottom-10 lg:left-10">
          <p class="font-jp text-3xl font-bold text-white drop-shadow lg:text-5xl">提督、お帰りなさい</p>
          <p class="mt-2 max-w-md font-serif text-lg italic text-slate-200 lg:text-xl">
            Selamat datang kembali, Teitoku.
          </p>
        </div>

        <div class="absolute bottom-6 right-6 rounded-full border border-chinjufu-line bg-chinjufu-dark/70 px-3 py-1.5 text-[11px] text-chinjufu-muted backdrop-blur">
          Chinjufu Archive
        </div>
      </section>

      <!-- Grid Kategori -->
      <section>
        <h2 class="mb-4 font-serif text-2xl text-white">Jelajahi Pangkalan</h2>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
          <?php
            $categories = [
              ['title' => 'Museum Kapal',    'sub' => 'Riwayat & spesifikasi kanmusu', 'img' => 'https://placehold.co/400x480/13203a/D4AF37?text=%E8%89%A6', 'url' => '/museum/kapal'],
              ['title' => 'Museum Perwira',  'sub' => 'Profil para Teitoku pangkalan', 'img' => 'https://placehold.co/400x480/13203a/D4AF37?text=%E6%8F%90%E7%9D%A3', 'url' => '/museum/perwira'],
              ['title' => 'Galeri',          'sub' => 'Karya visual dari komunitas',  'img' => 'https://placehold.co/400x480/13203a/D4AF37?text=%E7%B5%B5', 'url' => '/galeri'],
              ['title' => 'Arsip Sejarah',   'sub' => 'Catatan event yang telah usai', 'img' => 'https://placehold.co/400x480/13203a/D4AF37?text=%E5%8F%B2', 'url' => '/arsip'],
            ];
          ?>
          <?php foreach ($categories as $c): ?>
            <a href="<?= base_url($c['url']) ?>" class="group relative overflow-hidden rounded-xl border border-chinjufu-line">
              <img src="<?= esc($c['img']) ?>" alt="" class="aspect-[3/4] w-full object-cover transition duration-300 group-hover:scale-105">
              <div class="absolute inset-0 bg-gradient-to-t from-chinjufu-dark via-chinjufu-dark/50 to-transparent"></div>
              <div class="absolute inset-x-0 bottom-0 flex items-end justify-between gap-2 p-4">
                <div>
                  <p class="font-serif text-base text-white"><?= esc($c['title']) ?></p>
                  <p class="mt-0.5 text-[11px] text-chinjufu-muted"><?= esc($c['sub']) ?></p>
                </div>
                <span class="shrink-0 rounded-full border border-chinjufu-gold/40 p-1.5 text-chinjufu-gold transition group-hover:bg-chinjufu-gold group-hover:text-chinjufu-dark">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- Split: Berita vs Statistik -->
      <section class="grid grid-cols-1 gap-8 xl:grid-cols-[1.3fr_1fr]">

        <div>
          <h2 class="mb-4 font-serif text-2xl text-white">Berita & Pengumuman</h2>
          <div class="flex flex-col divide-y divide-chinjufu-line rounded-xl border border-chinjufu-line">
            <?php
              $badgeColor = ['Pengumuman' => 'bg-blue-600', 'Event' => 'bg-red-600', 'Informasi' => 'bg-sky-600'];
              $news = [
                ['badge' => 'Pengumuman', 'title' => 'Pendaftaran Hall of Fame Fase 2 Dibuka', 'desc' => 'Teitoku kini bisa mengajukan profil secara mandiri melalui formulir publik.', 'date' => '12 Sep 2026', 'img' => 'https://placehold.co/160x120/111A2C/94A3B8?text=News'],
                ['badge' => 'Event',       'title' => 'Event Musim Gugur: Hard Clear Rekap',    'desc' => 'Kumpulan capaian komunitas dalam menyelesaikan map tersulit musim ini.',       'date' => '05 Sep 2026', 'img' => 'https://placehold.co/160x120/111A2C/94A3B8?text=Event'],
                ['badge' => 'Informasi',  'title' => 'Panduan Upload Bukti Screenshot',        'desc' => 'Format JPG/PNG maksimal 2MB agar verifikasi admin berjalan lancar.',           'date' => '28 Agu 2026', 'img' => 'https://placehold.co/160x120/111A2C/94A3B8?text=Info'],
              ];
            ?>
            <?php foreach ($news as $n): ?>
              <a href="#" class="flex gap-4 p-4 transition hover:bg-white/[0.03]">
                <img src="<?= esc($n['img']) ?>" alt="" class="h-20 w-28 shrink-0 rounded-lg object-cover">
                <div class="min-w-0">
                  <span class="inline-block rounded-full <?= $badgeColor[$n['badge']] ?> px-2.5 py-0.5 text-[10px] font-medium text-white">
                    <?= esc($n['badge']) ?>
                  </span>
                  <p class="mt-1.5 truncate font-serif text-base text-white"><?= esc($n['title']) ?></p>
                  <p class="mt-1 line-clamp-2 text-xs text-chinjufu-muted"><?= esc($n['desc']) ?></p>
                  <p class="mt-1.5 text-[11px] text-chinjufu-muted"><?= esc($n['date']) ?></p>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>

        <div>
          <h2 class="mb-4 font-serif text-2xl text-white">Statistik Komunitas</h2>
          <div class="grid grid-cols-2 gap-3">
            <?php
              $stats = [
                ['label' => 'Total Anggota',    'value' => '1.284', 'icon' => 'M16 14a4 4 0 1 0-8 0M12 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm7 9a7 7 0 0 0-14 0'],
                ['label' => 'Total Post',       'value' => '9.512', 'icon' => 'M4 5h16v11H8l-4 4V5Z'],
                ['label' => 'Kapal Terdaftar',  'value' => '412',   'icon' => 'M3 18l2-7h14l2 7M6 11V6h12v5M9 21v-3h6v3'],
                ['label' => 'Event Selesai',    'value' => '37',    'icon' => 'M4 5h16v15H4V5Zm0 5h16M8 3v4M16 3v4'],
              ];
            ?>
            <?php foreach ($stats as $s): ?>
              <div class="rounded-xl border border-chinjufu-line p-4">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="text-chinjufu-gold">
                  <path d="<?= $s['icon'] ?>" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p class="mt-3 font-serif text-2xl text-white"><?= esc($s['value']) ?></p>
                <p class="text-[11px] text-chinjufu-muted"><?= esc($s['label']) ?></p>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="mt-3 rounded-xl border border-chinjufu-line px-4 py-5">
            <p class="font-serif text-sm italic leading-relaxed text-slate-300">
              "Setiap medali yang tercatat di sini adalah malam-malam begadang yang terbayar."
            </p>
          </div>
        </div>

      </section>

    </div>
  </main>

  <?= $this->include('layout/sidebar_right') ?>

</div>

<?= $this->include('layout/footer') ?>
