<?= $this->include('layout/header') ?>

<div class="mx-auto max-w-[1600px] lg:grid lg:grid-cols-12">

  <?= $this->include('layout/sidebar_left') ?>

  <main class="col-span-12 px-6 py-8 lg:col-span-10 lg:px-8">

    <div class="mb-8 flex items-center gap-3">
      <svg width="26" height="26" viewBox="0 0 24 24" fill="none" class="text-chinjufu-gold">
        <path d="M6 3h12v4a6 6 0 0 1-12 0V3ZM4 5h2M18 5h2M9 17h6v4H9v-4Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
      </svg>
      <div>
        <h1 class="font-serif text-2xl text-white">Hall of Fame</h1>
        <p class="text-sm text-chinjufu-muted">Galeri Teitoku berprestasi yang telah diverifikasi admin.</p>
      </div>
    </div>

    <!-- Filter -->
    <form method="get" class="mb-8 flex flex-wrap items-end gap-4 rounded-xl border border-chinjufu-line bg-chinjufu-panel/40 p-4">
      <div class="flex-1 min-w-[160px]">
        <label class="mb-1 block text-xs text-chinjufu-muted">Nama Teitoku</label>
        <input type="text" name="nama" value="<?= esc($filters['nama'] ?? '') ?>" placeholder="Cari nama..."
               class="w-full rounded-lg border border-chinjufu-line bg-chinjufu-dark/60 px-3 py-2 text-sm text-slate-100 focus:border-chinjufu-gold/60 focus:outline-none">
      </div>

      <div class="min-w-[160px]">
        <label class="mb-1 block text-xs text-chinjufu-muted">Server Pangkalan</label>
        <select name="server_id"
                class="w-full rounded-lg border border-chinjufu-line bg-chinjufu-dark/60 px-3 py-2 text-sm text-slate-100 focus:border-chinjufu-gold/60 focus:outline-none">
          <option value="">Semua Server</option>
          <?php foreach ($serverList as $s): ?>
            <option value="<?= $s['id'] ?>" <?= (string) ($filters['server_id'] ?? '') === (string) $s['id'] ? 'selected' : '' ?>>
              <?= esc($s['nama_server']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="min-w-[140px]">
        <label class="mb-1 block text-xs text-chinjufu-muted">Minimal FCM</label>
        <input type="number" name="min_fcm" min="0" value="<?= esc($filters['min_fcm'] ?? '') ?>" placeholder="0"
               class="w-full rounded-lg border border-chinjufu-line bg-chinjufu-dark/60 px-3 py-2 text-sm text-slate-100 focus:border-chinjufu-gold/60 focus:outline-none">
      </div>

      <button type="submit"
              class="rounded-lg bg-chinjufu-gold px-5 py-2 text-sm font-semibold text-chinjufu-dark hover:bg-chinjufu-gold-soft">
        Terapkan
      </button>
      <?php if (!empty(array_filter($filters))): ?>
        <a href="<?= base_url('hall-of-fame') ?>" class="text-sm text-chinjufu-muted hover:text-white">Reset</a>
      <?php endif; ?>
    </form>

    <?php if (empty($teitokuList)): ?>
      <div class="rounded-xl border border-chinjufu-line bg-chinjufu-panel/30 px-5 py-16 text-center">
        <p class="text-sm text-chinjufu-muted">Belum ada profil yang cocok dengan filter ini.</p>
      </div>
    <?php else: ?>
      <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">
        <?php foreach ($teitokuList as $t): ?>
          <a href="<?= base_url('hall-of-fame/' . $t['id']) ?>"
             class="group overflow-hidden rounded-xl border border-chinjufu-line bg-chinjufu-panel/30 transition hover:border-chinjufu-gold/50">
            <div class="relative flex aspect-[3/4] items-center justify-center bg-gradient-to-br from-chinjufu-panel to-chinjufu-dark">
              <span class="font-serif text-5xl text-chinjufu-gold/30">
                <?= esc(strtoupper(substr($t['nama_ingame'], 0, 1))) ?>
              </span>
              <?php if (!empty($t['jumlah_fcm'])): ?>
                <span class="absolute right-2 top-2 flex items-center gap-1 rounded-full bg-chinjufu-dark/80 px-2 py-1 text-[10px] text-chinjufu-gold-soft">
                  <svg width="10" height="10" viewBox="0 0 24 24" fill="none"><path d="M12 2 9 8l-6 .9 4.4 4.2L6.2 19 12 15.9 17.8 19l-1.2-5.9 4.4-4.2L15 8Z" fill="currentColor"/></svg>
                  <?= (int) $t['jumlah_fcm'] ?> FCM
                </span>
              <?php endif; ?>
            </div>
            <div class="p-3">
              <p class="truncate font-serif text-sm text-white"><?= esc($t['nama_ingame']) ?></p>
              <p class="mt-0.5 truncate text-[11px] text-chinjufu-muted">
                <?= esc($t['nama_server'] ?? '—') ?><?= !empty($t['hq_level']) ? ' · HQ ' . (int) $t['hq_level'] : '' ?>
              </p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </main>
</div>

<?= $this->include('layout/footer') ?>