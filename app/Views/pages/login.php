<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Login Admin — Chinjufu Archive') ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&family=Noto+Serif+JP:wght@500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'chinjufu-dark': '#0B1320',
            'chinjufu-panel': '#111A2C',
            'chinjufu-line': 'rgba(212,175,55,0.14)',
            'chinjufu-gold': '#D4AF37',
            'chinjufu-gold-soft': '#E9CD6B',
            'chinjufu-muted': '#94A3B8',
          },
          fontFamily: {
            serif: ['"Playfair Display"', 'serif'],
            jp: ['"Noto Serif JP"', 'serif'],
            sans: ['Inter', 'sans-serif'],
          },
        }
      }
    }
  </script>
  <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>

<body class="bg-chinjufu-dark font-sans text-slate-100 antialiased">

  <div class="grid min-h-screen grid-cols-1 lg:grid-cols-[1.1fr_1fr]">

    <!-- Panel kiri: identitas / suasana -->
    <div class="relative hidden overflow-hidden border-r border-chinjufu-line lg:block">
      <img src="https://placehold.co/1000x1400/0B1320/15233a?text=Chinjufu+Archive"
        alt="Suasana pangkalan"
        class="h-full w-full object-cover opacity-80">
      <div class="absolute inset-0 bg-gradient-to-t from-chinjufu-dark via-chinjufu-dark/60 to-chinjufu-dark/20"></div>

      <svg width="260" height="260" viewBox="0 0 24 24" fill="none"
        class="pointer-events-none absolute -bottom-10 -left-10 text-chinjufu-gold/5">
        <path d="M12 2v20M6 8h12M4 14h16a8 8 0 0 1-16 0Z" stroke="currentColor" stroke-width="0.7" />
      </svg>

      <div class="absolute inset-x-0 top-10 flex items-center gap-3 px-10">
        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" class="text-chinjufu-gold">
          <path d="M12 2v20M6 8h12M4 14h16a8 8 0 0 1-16 0Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
          <circle cx="12" cy="4.5" r="1.6" fill="currentColor" />
        </svg>
        <div class="leading-tight">
          <p class="font-serif text-lg text-white">Chinjufu Archive</p>
          <p class="font-jp text-[11px] text-chinjufu-muted">艦これ · Community · Museum · Hall of Fame</p>
        </div>
      </div>

      <div class="absolute bottom-14 left-10 right-10">
        <p class="font-jp text-3xl font-bold text-white drop-shadow xl:text-4xl">鎮守府へようこそ</p>
        <p class="mt-3 max-w-sm font-serif text-lg italic leading-relaxed text-slate-200">
          Panel ini menjaga arsip Hall of Fame &amp; Roll of Honor tetap sahih untuk seluruh komunitas.
        </p>
      </div>
    </div>

    <!-- Panel kanan: form login -->
    <div class="flex items-center justify-center px-6 py-12 lg:px-16">
      <div class="w-full max-w-sm">

        <div class="mb-8 flex items-center gap-3 lg:hidden">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" class="text-chinjufu-gold">
            <path d="M12 2v20M6 8h12M4 14h16a8 8 0 0 1-16 0Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
            <circle cx="12" cy="4.5" r="1.6" fill="currentColor" />
          </svg>
          <p class="font-serif text-lg text-white">Chinjufu Archive</p>
        </div>

        <p class="text-xs uppercase tracking-[0.2em] text-chinjufu-gold-soft">Panel Administrator</p>
        <h1 class="mt-2 font-serif text-3xl text-white">Masuk ke Laksamana Panel</h1>
        <p class="mt-2 text-sm text-chinjufu-muted">
          Khusus admin dan moderator untuk verifikasi profil Teitoku dan pengelolaan arsip.
        </p>

        <?php if (session()->getFlashdata('error')): ?>
          <div class="mt-6 rounded-lg border border-red-600/40 bg-red-600/10 px-4 py-3 text-sm text-red-300">
            <?= esc(session()->getFlashdata('error')) ?>
          </div>
        <?php endif; ?>

        <!--
        TODO Fase 2: arahkan action ke route Auth::attemptLogin (POST),
        validasi via \CodeIgniter\Validation\Validation, cek hash password,
        lindungi dengan CSRF token bawaan CI4 (csrf_field()).
      -->
        <form action="#" method="post" class="mt-8 flex flex-col gap-5">

          <form action="<?= base_url('admin/login') ?>" method="post" class="mt-8 flex flex-col gap-5">
            <?= csrf_field() ?>

            <div>
              <label for="username" class="mb-1.5 block text-xs font-medium text-slate-300">Username</label>
              <div class="flex items-center gap-2 rounded-lg border border-chinjufu-line bg-chinjufu-panel/60 px-3.5 py-2.5 focus-within:border-chinjufu-gold/60">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="shrink-0 text-chinjufu-muted">
                  <circle cx="12" cy="8" r="3.2" stroke="currentColor" stroke-width="1.5" />
                  <path d="M5 20c1.2-3.6 4-5.5 7-5.5s5.8 1.9 7 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                </svg>
                <input id="username" name="username" type="text" autocomplete="username" placeholder="admin.laksamana"
                  value="<?= esc(old('username')) ?>"
                  class="w-full bg-transparent text-sm text-slate-100 placeholder:text-chinjufu-muted focus:outline-none">
              </div>
            </div>

            <div>
              <label for="password" class="mb-1.5 block text-xs font-medium text-slate-300">Password</label>
              <div class="flex items-center gap-2 rounded-lg border border-chinjufu-line bg-chinjufu-panel/60 px-3.5 py-2.5 focus-within:border-chinjufu-gold/60">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="shrink-0 text-chinjufu-muted">
                  <rect x="5" y="10" width="14" height="10" rx="2" stroke="currentColor" stroke-width="1.5" />
                  <path d="M8 10V7a4 4 0 0 1 8 0v3" stroke="currentColor" stroke-width="1.5" />
                </svg>
                <input id="password" name="password" type="password" autocomplete="current-password" placeholder="••••••••"
                  class="w-full bg-transparent text-sm text-slate-100 placeholder:text-chinjufu-muted focus:outline-none">
                <button type="button"
                  onclick="const p=document.getElementById('password'); p.type = p.type==='password' ? 'text' : 'password';"
                  class="shrink-0 text-chinjufu-muted hover:text-chinjufu-gold-soft" aria-label="Tampilkan password">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z" stroke="currentColor" stroke-width="1.5" />
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" />
                  </svg>
                </button>
              </div>
            </div>

            <div class="flex items-center justify-between text-xs">
              <label class="flex items-center gap-2 text-chinjufu-muted">
                <input type="checkbox" name="remember" class="h-3.5 w-3.5 rounded border-chinjufu-line bg-chinjufu-panel text-chinjufu-gold focus:ring-chinjufu-gold/40">
                Ingat saya
              </label>
              <a href="#" class="text-chinjufu-gold-soft hover:text-chinjufu-gold">Lupa password?</a>
            </div>

            <button type="submit"
              class="mt-2 rounded-lg bg-chinjufu-gold px-4 py-2.5 text-sm font-semibold text-chinjufu-dark transition hover:bg-chinjufu-gold-soft">
              Masuk
            </button>
          </form>

          <a href="<?= base_url('/') ?>" class="mt-8 flex items-center gap-2 text-xs text-chinjufu-muted hover:text-slate-200">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
              <path d="M11 5 4 12l7 7M4 12h16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Kembali ke Beranda
          </a>
      </div>
    </div>

  </div>
</body>

</html>