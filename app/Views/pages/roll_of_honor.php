<?= $this->include('layout/header') ?>

<div class="mx-auto max-w-[1600px] lg:grid lg:grid-cols-12">

  <?= $this->include('layout/sidebar_left') ?>

  <main class="col-span-12 px-6 py-8 lg:col-span-10 lg:px-8">

    <div class="mb-8 flex items-center gap-3">
      <svg width="26" height="26" viewBox="0 0 24 24" fill="none" class="text-chinjufu-gold">
        <path d="M12 2v20M6 8h12M4 14h16a8 8 0 0 1-16 0Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
      </svg>
      <div>
        <h1 class="font-serif text-2xl text-white">Roll of Honor</h1>
        <p class="text-sm text-chinjufu-muted">Mengabadikan kontributor yang berjasa bagi ekosistem komunitas.</p>
      </div>
    </div>

    <!-- Filter kategori -->
    <div class="mb-8 flex flex-wrap gap-2">
      <a href="<?= base_url('roll-of-honor') ?>"
         class="rounded-full border px-4 py-1.5 text-xs transition
                <?= empty($kategoriAktif) ? 'border-chinjufu-gold bg-chinjufu-gold/10 text-chinjufu-gold-soft' : 'border-chinjufu-line text-slate-300 hover:text-white' ?>">
        Semua
      </a>
      <?php foreach ($kategoriList as $kategori): ?>
        <a href="<?= base_url('roll-of-honor') . '?kategori=' . urlencode($kategori) ?>"
           class="rounded-full border px-4 py-1.5 text-xs transition
                  <?= $kategoriAktif === $kategori ? 'border-chinjufu-gold bg-chinjufu-gold/10 text-chinjufu-gold-soft' : 'border-chinjufu-line text-slate-300 hover:text-white' ?>">
          <?= esc($kategori) ?>
        </a>
      <?php endforeach; ?>
    </div>

    <?php if (empty($honorRollList)): ?>
      <div class="rounded-xl border border-chinjufu-line bg-chinjufu-panel/30 px-5 py-16 text-center">
        <p class="text-sm text-chinjufu-muted">Belum ada kontributor di kategori ini.</p>
      </div>
    <?php else: ?>
      <div class="flex flex-col divide-y divide-chinjufu-line rounded-xl border border-chinjufu-line bg-chinjufu-panel/20">
        <?php foreach ($honorRollList as $r): ?>
          <div class="flex flex-col gap-3 p-5 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-start gap-4">
              <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-chinjufu-gold/40 bg-chinjufu-panel font-serif text-lg text-chinjufu-gold-soft">
                <?= esc(strtoupper(substr($r['nama_kontributor'], 0, 1))) ?>
              </div>
              <div>
                <p class="font-serif text-base text-white"><?= esc($r['nama_kontributor']) ?></p>
                <p class="mt-0.5 flex items-center gap-1.5 text-xs text-chinjufu-gold-soft">
                  <svg width="11" height="11" viewBox="0 0 24 24" fill="none"><path d="M12 2 9 8l-6 .9 4.4 4.2L6.2 19 12 15.9 17.8 19l-1.2-5.9 4.4-4.2L15 8Z" fill="currentColor"/></svg>
                  <?= esc($r['kategori_kontribusi']) ?>
                </p>
                <?php if (!empty($r['deskripsi'])): ?>
                  <p class="mt-2 max-w-xl text-sm text-slate-300"><?= esc($r['deskripsi']) ?></p>
                <?php endif; ?>
              </div>
            </div>

            <div class="flex items-center gap-4 pl-15 sm:pl-0">
              <?php if (!empty($r['link_referensi'])): ?>
                <a href="<?= esc($r['link_referensi'], 'attr') ?>" target="_blank" rel="noopener"
                   class="flex items-center gap-1 text-xs text-chinjufu-gold-soft hover:text-chinjufu-gold">
                  Lihat Karya
                  <svg width="11" height="11" viewBox="0 0 24 24" fill="none"><path d="M7 17 17 7M8 7h9v9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
              <?php endif; ?>
              <span class="text-xs text-chinjufu-muted"><?= esc(date('d M Y', strtotime($r['created_at']))) ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </main>
</div>

<?= $this->include('layout/footer') ?>