<?= $this->include('layout/admin_header') ?>

<div class="mb-6 flex items-center justify-between">
  <p class="text-sm text-chinjufu-muted">Kelola kontributor komunitas secara manual.</p>
  <a href="<?= base_url('admin/honor-roll/create') ?>"
     class="rounded-lg bg-chinjufu-gold px-4 py-2 text-sm font-semibold text-chinjufu-dark hover:bg-chinjufu-gold-soft">
    + Tambah Kontributor
  </a>
</div>

<?php if (empty($honorRollList)): ?>
  <div class="rounded-xl border border-chinjufu-line bg-chinjufu-panel/30 px-5 py-8 text-center text-sm text-chinjufu-muted">
    Belum ada data Roll of Honor.
  </div>
<?php else: ?>
  <div class="overflow-x-auto rounded-xl border border-chinjufu-line">
    <table class="w-full min-w-[720px] text-left text-sm">
      <thead class="bg-white/5 text-xs uppercase tracking-wide text-chinjufu-muted">
        <tr>
          <th class="px-4 py-3">Nama Kontributor</th>
          <th class="px-4 py-3">Kategori</th>
          <th class="px-4 py-3">Link Referensi</th>
          <th class="px-4 py-3">Ditambahkan</th>
          <th class="px-4 py-3 text-right">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-chinjufu-line">
        <?php foreach ($honorRollList as $r): ?>
          <tr class="hover:bg-white/[0.03]">
            <td class="px-4 py-3 font-medium text-white"><?= esc($r['nama_kontributor']) ?></td>
            <td class="px-4 py-3 text-slate-300"><?= esc($r['kategori_kontribusi']) ?></td>
            <td class="px-4 py-3">
              <?php if (!empty($r['link_referensi'])): ?>
                <a href="<?= esc($r['link_referensi'], 'attr') ?>" target="_blank" rel="noopener"
                   class="text-chinjufu-gold-soft hover:text-chinjufu-gold">Buka tautan</a>
              <?php else: ?>
                <span class="text-chinjufu-muted">—</span>
              <?php endif; ?>
            </td>
            <td class="px-4 py-3 text-chinjufu-muted"><?= esc(date('d M Y', strtotime($r['created_at']))) ?></td>
            <td class="px-4 py-3">
              <div class="flex justify-end gap-2">
                <a href="<?= base_url('admin/honor-roll/' . $r['id'] . '/edit') ?>"
                   class="rounded-lg border border-chinjufu-line px-3 py-1.5 text-xs text-slate-300 hover:text-white">
                  Edit
                </a>
                <form action="<?= base_url('admin/honor-roll/' . $r['id'] . '/delete') ?>" method="post"
                      onsubmit="return confirm('Hapus <?= esc($r['nama_kontributor'], 'js') ?> dari Roll of Honor?');">
                  <?= csrf_field() ?>
                  <button type="submit"
                          class="rounded-lg bg-red-600/15 px-3 py-1.5 text-xs font-medium text-red-300 hover:bg-red-600/25">
                    Hapus
                  </button>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>

<?= $this->include('layout/admin_footer') ?>