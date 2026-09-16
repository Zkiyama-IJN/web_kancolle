<?= $this->include('layout/header') ?>

<div class="mx-auto max-w-[1600px] lg:grid lg:grid-cols-12">

  <?= $this->include('layout/sidebar_left') ?>

  <main class="col-span-12 flex items-center justify-center px-6 py-16 lg:col-span-10 lg:px-8">

    <div class="max-w-md text-center">
      <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full border border-chinjufu-gold/40 bg-chinjufu-gold/10">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" class="text-chinjufu-gold">
          <path d="M9 11l3 3L22 4M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>

      <h1 class="mt-6 font-serif text-2xl text-white">Pengajuan Terkirim</h1>
      <p class="mt-3 text-sm text-chinjufu-muted">
        <?php if (!empty($namaPengaju)): ?>
          Terima kasih, <span class="text-slate-200"><?= esc($namaPengaju) ?></span>.
        <?php endif; ?>
        Profil kamu berstatus <span class="text-chinjufu-gold-soft">Pending</span> dan akan ditinjau oleh admin
        sebelum tampil di Hall of Fame.
      </p>

      <a href="<?= base_url('/') ?>"
         class="mt-8 inline-flex items-center gap-2 rounded-lg bg-chinjufu-gold px-5 py-2.5 text-sm font-semibold text-chinjufu-dark hover:bg-chinjufu-gold-soft">
        Kembali ke Beranda
      </a>
    </div>

  </main>
</div>

<?= $this->include('layout/footer') ?>