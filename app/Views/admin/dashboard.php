<?= $this->include('layout/admin_header') ?>

<div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
  <div class="rounded-xl border border-chinjufu-line bg-chinjufu-panel/40 p-5">
    <p class="text-xs text-chinjufu-muted">Menunggu Verifikasi</p>
    <p class="mt-2 font-serif text-3xl text-white"><?= (int) $jumlahPending ?></p>
  </div>
  <div class="rounded-xl border border-chinjufu-line bg-chinjufu-panel/40 p-5">
    <p class="text-xs text-chinjufu-muted">Profil Approved</p>
    <p class="mt-2 font-serif text-3xl text-white"><?= (int) $jumlahApproved ?></p>
  </div>
  <div class="rounded-xl border border-chinjufu-line bg-chinjufu-panel/40 p-5">
    <p class="text-xs text-chinjufu-muted">Kontributor Roll of Honor</p>
    <p class="mt-2 font-serif text-3xl text-white"><?= (int) $jumlahHonorRoll ?></p>
  </div>
</div>

<section class="mt-8">
  <h2 class="mb-4 font-serif text-lg text-white">Pengajuan Profil — Menunggu Verifikasi</h2>

  <?php if (empty($pendingList)): ?>
    <div class="rounded-xl border border-chinjufu-line bg-chinjufu-panel/30 px-5 py-8 text-center text-sm text-chinjufu-muted">
      Tidak ada pengajuan yang menunggu verifikasi saat ini.
    </div>
  <?php else: ?>
    <div class="overflow-x-auto rounded-xl border border-chinjufu-line">
      <table class="w-full min-w-[720px] text-left text-sm">
        <thead class="bg-white/5 text-xs uppercase tracking-wide text-chinjufu-muted">
          <tr>
            <th class="px-4 py-3">Nama Teitoku</th>
            <th class="px-4 py-3">Server</th>
            <th class="px-4 py-3">HQ Level</th>
            <th class="px-4 py-3">Kapal Favorit</th>
            <th class="px-4 py-3">Diajukan</th>
            <th class="px-4 py-3 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-chinjufu-line">
          <?php foreach ($pendingList as $t): ?>
            <tr class="hover:bg-white/[0.03]">
              <td class="px-4 py-3 font-medium text-white"><?= esc($t['nama_ingame']) ?></td>
              <td class="px-4 py-3 text-slate-300"><?= esc($t['nama_server'] ?? '—') ?></td>
              <td class="px-4 py-3 text-slate-300"><?= esc($t['hq_level'] ?? '—') ?></td>
              <td class="px-4 py-3 text-slate-300"><?= esc($t['waifu_id'] ?? '—') ?></td>
              <td class="px-4 py-3 text-chinjufu-muted"><?= esc(date('d M Y', strtotime($t['created_at']))) ?></td>
              <td class="px-4 py-3">
                <div class="flex justify-end gap-2">
                  <form action="<?= base_url('admin/teitoku/' . $t['id'] . '/approve') ?>" method="post">
                    <?= csrf_field() ?>
                    <button type="submit"
                            class="rounded-lg bg-emerald-600/15 px-3 py-1.5 text-xs font-medium text-emerald-300 hover:bg-emerald-600/25">
                      Approve
                    </button>
                  </form>
                  <form action="<?= base_url('admin/teitoku/' . $t['id'] . '/reject') ?>" method="post"
                        onsubmit="return confirm('Yakin tolak pengajuan <?= esc($t['nama_ingame'], 'js') ?>?');">
                    <?= csrf_field() ?>
                    <button type="submit"
                            class="rounded-lg bg-red-600/15 px-3 py-1.5 text-xs font-medium text-red-300 hover:bg-red-600/25">
                      Reject
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
</section>

<?= $this->include('layout/admin_footer') ?>