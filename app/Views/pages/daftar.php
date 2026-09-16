<?= $this->include('layout/header') ?>

<?php $errors = session()->getFlashdata('validation') ?? []; ?>

<div class="mx-auto max-w-[1600px] lg:grid lg:grid-cols-12">

  <?= $this->include('layout/sidebar_left') ?>

  <main class="col-span-12 px-6 py-8 lg:col-span-10 lg:px-8">

    <div class="mx-auto max-w-2xl">

      <div class="mb-8">
        <p class="text-xs uppercase tracking-[0.2em] text-chinjufu-gold-soft">Sistem Pendaftaran Teitoku</p>
        <h1 class="mt-2 font-serif text-2xl text-white">Ajukan Profil ke Hall of Fame</h1>
        <p class="mt-2 text-sm text-chinjufu-muted">
          Lengkapi data diri in-game dan unggah bukti screenshot. Pengajuan akan berstatus
          <span class="text-chinjufu-gold-soft">Pending</span> sampai diverifikasi admin.
        </p>
      </div>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="mb-6 rounded-lg border border-red-600/40 bg-red-600/10 px-4 py-3 text-sm text-red-300">
          <?= esc(session()->getFlashdata('error')) ?>
        </div>
      <?php endif; ?>

      <form action="<?= base_url('daftar') ?>" method="post" enctype="multipart/form-data"
            class="flex flex-col gap-5 rounded-xl border border-chinjufu-line bg-chinjufu-panel/40 p-6">
        <?= csrf_field() ?>

        <div>
          <label for="nama_ingame" class="mb-1.5 block text-xs font-medium text-slate-300">Nama Teitoku (in-game) *</label>
          <input id="nama_ingame" name="nama_ingame" type="text" value="<?= esc(old('nama_ingame')) ?>"
                 class="w-full rounded-lg border border-chinjufu-line bg-chinjufu-dark/60 px-3.5 py-2.5 text-sm text-slate-100 focus:border-chinjufu-gold/60 focus:outline-none">
          <?php if (!empty($errors['nama_ingame'])): ?><p class="mt-1 text-xs text-red-400"><?= esc($errors['nama_ingame']) ?></p><?php endif; ?>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="server_id" class="mb-1.5 block text-xs font-medium text-slate-300">Server Pangkalan *</label>
            <select id="server_id" name="server_id"
                    class="w-full rounded-lg border border-chinjufu-line bg-chinjufu-dark/60 px-3.5 py-2.5 text-sm text-slate-100 focus:border-chinjufu-gold/60 focus:outline-none">
              <option value="">Pilih server</option>
              <?php foreach ($serverList as $s): ?>
                <option value="<?= $s['id'] ?>" <?= (string) old('server_id') === (string) $s['id'] ? 'selected' : '' ?>>
                  <?= esc($s['nama_server']) ?>
                </option>
              <?php endforeach; ?>
            </select>
            <?php if (!empty($errors['server_id'])): ?><p class="mt-1 text-xs text-red-400"><?= esc($errors['server_id']) ?></p><?php endif; ?>
          </div>

          <div>
            <label for="hq_level" class="mb-1.5 block text-xs font-medium text-slate-300">HQ Level</label>
            <input id="hq_level" name="hq_level" type="number" min="1" value="<?= esc(old('hq_level')) ?>"
                   class="w-full rounded-lg border border-chinjufu-line bg-chinjufu-dark/60 px-3.5 py-2.5 text-sm text-slate-100 focus:border-chinjufu-gold/60 focus:outline-none">
            <?php if (!empty($errors['hq_level'])): ?><p class="mt-1 text-xs text-red-400"><?= esc($errors['hq_level']) ?></p><?php endif; ?>
          </div>
        </div>

        <div>
          <label for="waifu_id" class="mb-1.5 block text-xs font-medium text-slate-300">Kapal Favorit</label>
          <input id="waifu_id" name="waifu_id" type="text" placeholder="mis. Kashima" value="<?= esc(old('waifu_id')) ?>"
                 class="w-full rounded-lg border border-chinjufu-line bg-chinjufu-dark/60 px-3.5 py-2.5 text-sm text-slate-100 focus:border-chinjufu-gold/60 focus:outline-none">
        </div>

        <div>
          <label for="pesan_profil" class="mb-1.5 block text-xs font-medium text-slate-300">Pesan Singkat (opsional)</label>
          <textarea id="pesan_profil" name="pesan_profil" rows="3"
                    class="w-full rounded-lg border border-chinjufu-line bg-chinjufu-dark/60 px-3.5 py-2.5 text-sm text-slate-100 focus:border-chinjufu-gold/60 focus:outline-none"><?= esc(old('pesan_profil')) ?></textarea>
        </div>

        <div class="border-t border-chinjufu-line pt-5">
          <p class="mb-3 text-xs uppercase tracking-wide text-chinjufu-gold-soft">Bukti Pencapaian</p>

          <div class="grid grid-cols-2 gap-4">
            <div>
              <label for="jumlah_fcm" class="mb-1.5 block text-xs font-medium text-slate-300">Jumlah First Class Medal</label>
              <input id="jumlah_fcm" name="jumlah_fcm" type="number" min="0" value="<?= esc(old('jumlah_fcm')) ?>"
                     class="w-full rounded-lg border border-chinjufu-line bg-chinjufu-dark/60 px-3.5 py-2.5 text-sm text-slate-100 focus:border-chinjufu-gold/60 focus:outline-none">
            </div>
            <div>
              <label for="event_terakhir_hard" class="mb-1.5 block text-xs font-medium text-slate-300">Event Hard Clear Terakhir</label>
              <input id="event_terakhir_hard" name="event_terakhir_hard" type="text" value="<?= esc(old('event_terakhir_hard')) ?>"
                     class="w-full rounded-lg border border-chinjufu-line bg-chinjufu-dark/60 px-3.5 py-2.5 text-sm text-slate-100 focus:border-chinjufu-gold/60 focus:outline-none">
            </div>
          </div>

          <div class="mt-4">
            <label for="screenshot" class="mb-1.5 block text-xs font-medium text-slate-300">Screenshot Bukti *</label>
            <input id="screenshot" name="screenshot" type="file" accept="image/jpeg,image/png"
                   class="w-full rounded-lg border border-dashed border-chinjufu-line bg-chinjufu-dark/60 px-3.5 py-2.5 text-sm text-slate-300 file:mr-3 file:rounded-md file:border-0 file:bg-chinjufu-gold/10 file:px-3 file:py-1.5 file:text-xs file:text-chinjufu-gold-soft">
            <p class="mt-1 text-[11px] text-chinjufu-muted">Format JPG/PNG, maksimal 2MB.</p>
            <?php if (!empty($errors['screenshot'])): ?><p class="mt-1 text-xs text-red-400"><?= esc($errors['screenshot']) ?></p><?php endif; ?>
          </div>
        </div>

        <button type="submit"
                class="mt-2 rounded-lg bg-chinjufu-gold px-4 py-2.5 text-sm font-semibold text-chinjufu-dark hover:bg-chinjufu-gold-soft">
          Kirim Pengajuan
        </button>
      </form>
    </div>

  </main>
</div>

<?= $this->include('layout/footer') ?>