<?= $this->include('layout/header') ?>

<div class="mx-auto max-w-[1600px] lg:grid lg:grid-cols-12">

  <?= $this->include('layout/sidebar_left') ?>

  <main class="col-span-12 px-6 py-8 lg:col-span-10 lg:px-8">

    <a href="<?= base_url('hall-of-fame') ?>" class="mb-6 inline-flex items-center gap-2 text-sm text-chinjufu-muted hover:text-white">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M11 5 4 12l7 7M4 12h16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
      Kembali ke Hall of Fame
    </a>

    <div class="grid grid-cols-1 gap-8 lg:grid-cols-[320px_1fr]">

      <div class="overflow-hidden rounded-2xl border border-chinjufu-line">
        <div class="flex aspect-[3/4] items-center justify-center bg-gradient-to-br from-chinjufu-panel to-chinjufu-dark">
          <span class="font-serif text-7xl text-chinjufu-gold/30">
            <?= esc(strtoupper(substr($teitoku['nama_ingame'], 0, 1))) ?>
          </span>
        </div>
        <?php if (!empty($teitoku['jumlah_fcm'])): ?>
          <div class="flex items-center justify-center gap-2 border-t border-chinjufu-line bg-chinjufu-panel/60 py-3">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="text-chinjufu-gold"><path d="M12 2 9 8l-6 .9 4.4 4.2L6.2 19 12 15.9 17.8 19l-1.2-5.9 4.4-4.2L15 8Z" fill="currentColor"/></svg>
            <span class="text-sm font-semibold text-chinjufu-gold-soft"><?= (int) $teitoku['jumlah_fcm'] ?> First Class Medal</span>
          </div>
        <?php endif; ?>
      </div>

      <div>
        <p class="text-xs uppercase tracking-[0.2em] text-chinjufu-gold-soft">Profil Teitoku</p>
        <h1 class="mt-2 font-serif text-3xl text-white"><?= esc($teitoku['nama_ingame']) ?></h1>

        <div class="mt-4 flex flex-wrap gap-2">
          <span class="rounded-full border border-chinjufu-line px-3 py-1 text-xs text-slate-300">
            Server: <?= esc($teitoku['nama_server'] ?? '—') ?>
          </span>
          <?php if (!empty($teitoku['hq_level'])): ?>
            <span class="rounded-full border border-chinjufu-line px-3 py-1 text-xs text-slate-300">
              HQ Level <?= (int) $teitoku['hq_level'] ?>
            </span>
          <?php endif; ?>
          <?php if (!empty($teitoku['waifu_id'])): ?>
            <span class="rounded-full border border-chinjufu-line px-3 py-1 text-xs text-slate-300">
              Kapal Favorit: <?= esc($teitoku['waifu_id']) ?>
            </span>
          <?php endif; ?>
        </div>

        <?php if (!empty($teitoku['pesan_profil'])): ?>
          <div class="mt-6 rounded-xl border border-chinjufu-line bg-chinjufu-panel/40 p-5">
            <p class="font-serif text-base italic leading-relaxed text-slate-200">
              "<?= nl2br(esc($teitoku['pesan_profil'])) ?>"
            </p>
          </div>
        <?php endif; ?>

        <?php if (!empty($teitoku['event_terakhir_hard'])): ?>
          <div class="mt-6">
            <p class="mb-2 text-xs uppercase tracking-wide text-chinjufu-muted">Event Hard Clear Terakhir</p>
            <p class="text-sm text-slate-200"><?= esc($teitoku['event_terakhir_hard']) ?></p>
          </div>
        <?php endif; ?>

        <?php if (!empty($teitoku['tanggal_verifikasi'])): ?>
          <p class="mt-6 text-xs text-chinjufu-muted">
            Terverifikasi pada <?= esc(date('d M Y', strtotime($teitoku['tanggal_verifikasi']))) ?>
          </p>
        <?php endif; ?>
      </div>

    </div>

  </main>
</div>

<?= $this->include('layout/footer') ?>