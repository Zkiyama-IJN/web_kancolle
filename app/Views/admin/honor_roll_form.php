<?= $this->include('layout/admin_header') ?>

<?php $errors = session()->getFlashdata('validation') ?? []; ?>

<div class="max-w-xl">
  <form action="<?= isset($item) ? base_url('admin/honor-roll/' . $item['id']) : base_url('admin/honor-roll') ?>"
        method="post" class="flex flex-col gap-5 rounded-xl border border-chinjufu-line bg-chinjufu-panel/40 p-6">
    <?= csrf_field() ?>

    <div>
      <label for="nama_kontributor" class="mb-1.5 block text-xs font-medium text-slate-300">Nama Kontributor</label>
      <input id="nama_kontributor" name="nama_kontributor" type="text"
             value="<?= esc(old('nama_kontributor', $item['nama_kontributor'] ?? '')) ?>"
             class="w-full rounded-lg border border-chinjufu-line bg-chinjufu-dark/60 px-3.5 py-2.5 text-sm text-slate-100 focus:border-chinjufu-gold/60 focus:outline-none">
      <?php if (!empty($errors['nama_kontributor'])): ?>
        <p class="mt-1 text-xs text-red-400"><?= esc($errors['nama_kontributor']) ?></p>
      <?php endif; ?>
    </div>

    <div>
      <label for="kategori_kontribusi" class="mb-1.5 block text-xs font-medium text-slate-300">Kategori Kontribusi</label>
      <select id="kategori_kontribusi" name="kategori_kontribusi"
              class="w-full rounded-lg border border-chinjufu-line bg-chinjufu-dark/60 px-3.5 py-2.5 text-sm text-slate-100 focus:border-chinjufu-gold/60 focus:outline-none">
        <?php
          $kategoriList = ['Penerjemah', 'Guide Creator', 'Artist', 'Event Organizer', 'Lainnya'];
          $selected     = old('kategori_kontribusi', $item['kategori_kontribusi'] ?? '');
        ?>
        <?php foreach ($kategoriList as $kategori): ?>
          <option value="<?= esc($kategori) ?>" <?= $selected === $kategori ? 'selected' : '' ?>><?= esc($kategori) ?></option>
        <?php endforeach; ?>
      </select>
      <?php if (!empty($errors['kategori_kontribusi'])): ?>
        <p class="mt-1 text-xs text-red-400"><?= esc($errors['kategori_kontribusi']) ?></p>
      <?php endif; ?>
    </div>

    <div>
      <label for="deskripsi" class="mb-1.5 block text-xs font-medium text-slate-300">Deskripsi (opsional)</label>
      <textarea id="deskripsi" name="deskripsi" rows="3"
                class="w-full rounded-lg border border-chinjufu-line bg-chinjufu-dark/60 px-3.5 py-2.5 text-sm text-slate-100 focus:border-chinjufu-gold/60 focus:outline-none"><?= esc(old('deskripsi', $item['deskripsi'] ?? '')) ?></textarea>
    </div>

    <div>
      <label for="link_referensi" class="mb-1.5 block text-xs font-medium text-slate-300">Link Referensi (opsional)</label>
      <input id="link_referensi" name="link_referensi" type="url" placeholder="https://..."
             value="<?= esc(old('link_referensi', $item['link_referensi'] ?? '')) ?>"
             class="w-full rounded-lg border border-chinjufu-line bg-chinjufu-dark/60 px-3.5 py-2.5 text-sm text-slate-100 focus:border-chinjufu-gold/60 focus:outline-none">
    </div>

    <div class="flex gap-3 pt-2">
      <button type="submit"
              class="rounded-lg bg-chinjufu-gold px-4 py-2.5 text-sm font-semibold text-chinjufu-dark hover:bg-chinjufu-gold-soft">
        <?= isset($item) ? 'Simpan Perubahan' : 'Tambah Kontributor' ?>
      </button>
      <a href="<?= base_url('admin/honor-roll') ?>"
         class="rounded-lg border border-chinjufu-line px-4 py-2.5 text-sm text-slate-300 hover:text-white">
        Batal
      </a>
    </div>
  </form>
</div>

<?= $this->include('layout/admin_footer') ?>