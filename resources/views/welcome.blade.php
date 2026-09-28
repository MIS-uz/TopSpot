<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Topspot — Boshqaruv & Xizmatlar Ekotizimi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:      #0B0F17;
            --bg2:     #121826;
            --border:  rgba(255, 255, 255, 0.08);
            --accent:  #FF5500;
            --accent2: #FF6A1A;
            --text:    #FFFFFF;
            --muted:   #94A3B8;
            --subtle:  #475569;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
            background: var(--bg);
            color: var(--text);
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
        }

        a { text-decoration: none; color: inherit; }

        /* ── NAV ── */
        .site-header {
            position: sticky; top: 0; z-index: 100;
            background: rgba(11, 15, 23, 0.88);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-bottom: 1px solid var(--border);
        }

        nav {
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 5%;
            height: 64px;
        }

        .nav-brand {
            display: flex; align-items: center; gap: 10px;
            font-size: 1.05rem; font-weight: 800; color: var(--text);
            letter-spacing: 0.04em;
        }

        .nav-brand-icon {
            width: 36px; height: 36px; border-radius: 9px;
            background: #121826;
            border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 14px rgba(255, 85, 0, 0.25);
            flex-shrink: 0;
        }

        .nav-links {
            display: flex; align-items: center; gap: 8px;
        }

        .nav-links a {
            padding: 7px 15px;
            border-radius: 8px;
            font-size: .84rem; font-weight: 600; color: var(--muted);
            transition: color .15s, background .15s;
        }

        .nav-links a:hover { color: var(--text); background: rgba(255,255,255,.05); }

        .nav-links .btn-login {
            background: var(--accent);
            color: #fff;
            padding: 7px 18px;
            font-weight: 700;
            box-shadow: 0 4px 16px rgba(255, 85, 0, 0.35);
            transition: background .15s, transform .15s;
        }

        .nav-links .btn-login:hover { background: var(--accent2); transform: translateY(-1px); }

        /* hamburger button */
        .nav-menu-btn {
            display: none;
            width: 36px; height: 36px;
            background: rgba(255,255,255,.05);
            border: 1px solid var(--border);
            border-radius: 8px;
            cursor: pointer;
            align-items: center; justify-content: center;
            flex-shrink: 0;
            color: var(--muted);
            transition: background .15s, color .15s;
        }

        .nav-menu-btn:hover { background: rgba(255,255,255,.09); color: var(--text); }

        .hbg { display: flex; flex-direction: column; gap: 4px; width: 18px; }
        .hbg span {
            display: block; height: 2px; border-radius: 2px;
            background: currentColor;
            transition: transform .25s ease, opacity .25s ease, width .25s ease;
            transform-origin: center;
        }
        .hbg span:nth-child(1) { width: 18px; }
        .hbg span:nth-child(2) { width: 13px; }
        .hbg span:nth-child(3) { width: 18px; }

        .nav-menu-btn.active .hbg span:nth-child(1) { transform: translateY(6px) rotate(45deg); width: 18px; }
        .nav-menu-btn.active .hbg span:nth-child(2) { opacity: 0; }
        .nav-menu-btn.active .hbg span:nth-child(3) { transform: translateY(-6px) rotate(-45deg); width: 18px; }

        .nav-collapse {
            max-height: 0;
            overflow: hidden;
            transition: max-height .3s cubic-bezier(.4,0,.2,1);
        }

        .nav-collapse.open { max-height: 240px; }

        .nav-collapse-inner {
            padding: 10px 5% 16px;
            display: flex; flex-direction: column; gap: 4px;
            border-top: 1px solid var(--border);
        }

        .nav-collapse-inner a {
            display: block;
            padding: 10px 14px; border-radius: 8px;
            font-size: .88rem; font-weight: 500; color: var(--muted);
            transition: background .15s, color .15s;
        }

        .nav-collapse-inner a:hover { background: rgba(255,255,255,.06); color: var(--text); }

        .nav-collapse-inner .btn-login {
            background: var(--accent); color: #fff;
            font-weight: 700; text-align: center; margin-top: 4px;
        }

        .nav-collapse-inner .btn-login:hover { background: var(--accent2); }

        /* ── HERO ── */
        .hero {
            text-align: center;
            padding: 100px 5% 80px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -120px; left: 50%; transform: translateX(-50%);
            width: 700px; height: 500px;
            background: radial-gradient(ellipse, rgba(255, 85, 0, 0.12), transparent 68%);
            pointer-events: none;
        }

        .hero-badge {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 5px 14px;
            background: rgba(255, 85, 0, 0.1);
            border: 1px solid rgba(255, 85, 0, 0.25);
            border-radius: 999px;
            font-size: .74rem; font-weight: 700; color: #FF5500;
            letter-spacing: .06em; text-transform: uppercase;
            margin-bottom: 24px;
        }

        .hero h1 {
            font-size: clamp(2rem, 6vw, 3.8rem);
            font-weight: 900;
            letter-spacing: -.03em;
            line-height: 1.15;
            color: var(--text);
            margin-bottom: 20px;
        }

        .hero h1 span {
            background: linear-gradient(135deg, #FF5500, #FFA066);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-desc {
            font-size: clamp(.92rem, 2vw, 1.1rem);
            color: var(--muted);
            line-height: 1.7;
            max-width: 600px;
            margin: 0 auto 36px;
        }

        .hero-cta {
            display: flex; align-items: center; justify-content: center;
            gap: 14px; flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 12px 26px;
            background: var(--accent); color: #fff;
            font-size: .9rem; font-weight: 700;
            border-radius: 10px; border: none; cursor: pointer;
            box-shadow: 0 4px 20px rgba(255, 85, 0, 0.35);
            transition: background .15s, transform .15s, box-shadow .15s;
        }

        .btn-primary:hover {
            background: var(--accent2);
            transform: translateY(-2px);
            box-shadow: 0 8px 26px rgba(255, 85, 0, 0.5);
        }

        .btn-secondary {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 12px 26px;
            background: var(--bg2); color: var(--text);
            font-size: .9rem; font-weight: 600;
            border-radius: 10px;
            border: 1px solid var(--border);
            cursor: pointer;
            transition: background .15s, border-color .15s, transform .15s;
        }

        .btn-secondary:hover {
            background: rgba(255,255,255,.07);
            border-color: rgba(255,255,255,.18);
            transform: translateY(-2px);
        }

        /* ── STATS ── */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1px;
            background: var(--border);
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }

        .stat {
            background: var(--bg);
            padding: 28px 20px;
            text-align: center;
        }

        .stat-num {
            font-size: 1.8rem; font-weight: 900;
            color: var(--text); letter-spacing: -.03em;
        }

        .stat-num span { color: var(--accent); }

        .stat-label { font-size: .76rem; color: var(--muted); margin-top: 4px; }

        /* ── SECTION WRAPPER ── */
        .section { padding: 76px 5%; }

        .section-head { text-align: center; margin-bottom: 48px; }

        .section-tag {
            display: inline-block;
            font-size: .7rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase;
            color: var(--accent); margin-bottom: 10px;
        }

        .section-head h2 {
            font-size: clamp(1.4rem, 3vw, 2.2rem);
            font-weight: 800; letter-spacing: -.03em;
            color: var(--text); margin-bottom: 10px;
        }

        .section-head p { font-size: .92rem; color: var(--muted); max-width: 520px; margin: 0 auto; }

        /* ── MODULES GRID ── */
        .modules-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 18px;
            max-width: 1140px;
            margin: 0 auto;
        }

        .module-card {
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 22px;
            transition: border-color .2s, transform .2s, box-shadow .2s;
            cursor: default;
        }

        .module-card:hover {
            border-color: rgba(255, 85, 0, 0.4);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0,0,0,.45);
        }

        .module-icon {
            width: 42px; height: 42px; border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.15rem; margin-bottom: 14px;
        }

        .module-card h3 {
            font-size: .92rem; font-weight: 700; color: var(--text);
            margin-bottom: 6px;
        }

        .module-card p {
            font-size: .78rem; color: var(--muted); line-height: 1.55;
        }

        .module-tags {
            display: flex; flex-wrap: wrap; gap: 5px; margin-top: 12px;
        }

        .module-tag {
            font-size: .66rem; font-weight: 600;
            padding: 2px 8px; border-radius: 4px;
            background: rgba(255, 85, 0, 0.08);
            color: #FF5500;
            border: 1px solid rgba(255, 85, 0, 0.2);
        }

        /* ── WHY SECTION ── */
        .why-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            max-width: 1040px;
            margin: 0 auto;
        }

        .why-card {
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 22px;
        }

        .why-icon {
            font-size: 1.4rem; margin-bottom: 10px;
        }

        .why-card h4 { font-size: .9rem; font-weight: 700; color: var(--text); margin-bottom: 6px; }
        .why-card p  { font-size: .78rem; color: var(--muted); line-height: 1.55; }

        /* ── CTA BANNER ── */
        .cta-banner {
            margin: 0 5% 72px;
            background: linear-gradient(135deg, rgba(255, 85, 0, 0.14), rgba(18, 24, 38, 0.9));
            border: 1px solid rgba(255, 85, 0, 0.25);
            border-radius: 20px;
            padding: 56px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }

        .cta-banner::before {
            content: '';
            position: absolute;
            top: -60px; left: 50%; transform: translateX(-50%);
            width: 440px; height: 320px;
            background: radial-gradient(ellipse, rgba(255, 85, 0, 0.15), transparent 70%);
            pointer-events: none;
        }

        .cta-banner h2 {
            font-size: clamp(1.3rem, 3vw, 2.1rem);
            font-weight: 800; letter-spacing: -.03em;
            color: var(--text); margin-bottom: 12px;
            position: relative;
        }

        .cta-banner p {
            font-size: .9rem; color: var(--muted);
            margin-bottom: 28px; position: relative;
            max-width: 580px; margin-left: auto; margin-right: auto;
        }

        .cta-banner .cta-btns {
            display: flex; justify-content: center; gap: 14px; flex-wrap: wrap;
            position: relative;
        }

        /* ── CONTACT STRIP ── */
        .contact-strip {
            display: flex; align-items: center; justify-content: center; gap: 16px;
            padding: 22px 5%;
            border-top: 1px solid var(--border);
            background: var(--bg2);
            flex-wrap: wrap;
            text-align: center;
        }

        .contact-strip-icon {
            width: 38px; height: 38px; border-radius: 8px;
            background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.25);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0; color: #10B981;
        }

        .contact-strip-label { font-size: .7rem; color: var(--muted); font-weight: 600; letter-spacing: .06em; text-transform: uppercase; }
        .contact-strip-num   { font-size: .95rem; font-weight: 700; color: #10B981; }

        /* ── FOOTER ── */
        footer {
            border-top: 1px solid var(--border);
            padding: 28px 5%;
            display: flex; align-items: center; justify-content: space-between;
            flex-wrap: wrap; gap: 14px;
        }

        .footer-brand {
            display: flex; align-items: center; gap: 10px;
            font-size: .86rem; font-weight: 700; color: var(--text);
        }

        .footer-brand-icon {
            width: 26px; height: 26px; border-radius: 6px;
            background: var(--bg2);
            border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
        }

        .footer-links {
            display: flex; gap: 20px; flex-wrap: wrap;
        }

        .footer-links a {
            font-size: .8rem; color: var(--muted);
            transition: color .14s;
        }

        .footer-links a:hover { color: #FFFFFF; }

        .footer-copy { font-size: .76rem; color: var(--subtle); }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            .stats { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 640px) {
            .nav-links { display: none; }
            .nav-menu-btn { display: flex; }
            .hero { padding: 72px 5% 56px; }
            .stats { grid-template-columns: repeat(2, 1fr); }
            .cta-banner { padding: 36px 24px; }
            footer { flex-direction: column; align-items: flex-start; }
        }

        @media (max-width: 400px) {
            .stats { grid-template-columns: 1fr 1fr; }
            .stat-num { font-size: 1.4rem; }
        }

        /* ── PAGE LOADER ── */
        #page-loader {
            position: fixed; inset: 0; z-index: 9999;
            background: #0B0F17;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            gap: 0;
            transition: opacity .55s ease, transform .55s ease;
        }

        #page-loader.out {
            opacity: 0;
            transform: scale(1.06);
            pointer-events: none;
        }

        .ldr-rings {
            position: absolute;
            width: 180px; height: 180px;
        }

        .ldr-ring {
            position: absolute; inset: 0;
            border-radius: 50%;
            border: 1px solid rgba(255, 85, 0, 0.35);
            animation: ldr-pulse 2.4s ease-out infinite;
        }

        .ldr-ring:nth-child(2) { animation-delay: .8s; }
        .ldr-ring:nth-child(3) { animation-delay: 1.6s; }

        @keyframes ldr-pulse {
            0%   { transform: scale(.55); opacity: .8; }
            100% { transform: scale(1.6);  opacity: 0; }
        }

        .ldr-arc-wrap {
            position: relative;
            width: 84px; height: 84px;
            flex-shrink: 0;
        }

        .ldr-arc {
            position: absolute; inset: 0;
            border-radius: 50%;
            background: conic-gradient(from 0deg, #FF5500 0%, #FFA066 30%, transparent 60%);
            animation: ldr-spin 1.1s linear infinite;
            -webkit-mask: radial-gradient(farthest-side, transparent calc(100% - 3.5px), #000 0);
            mask:         radial-gradient(farthest-side, transparent calc(100% - 3.5px), #000 0);
        }

        @keyframes ldr-spin {
            to { transform: rotate(360deg); }
        }

        .ldr-icon-bg {
            position: absolute; inset: 8px;
            border-radius: 50%;
            background: #121826;
            border: 1px solid rgba(255, 255, 255, 0.1);
            display: flex; align-items: center; justify-content: center;
        }

        .ldr-text {
            margin-top: 28px;
            text-align: center;
            animation: ldr-fadein .6s ease both;
            animation-delay: .2s;
        }

        @keyframes ldr-fadein {
            from { opacity: 0; transform: translateY(8px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .ldr-name {
            font-size: 1.35rem; font-weight: 800;
            color: #FFFFFF; letter-spacing: 0.06em;
            margin-bottom: 8px;
        }

        .ldr-badge {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 5px 12px;
            background: rgba(255, 85, 0, 0.1);
            border: 1px solid rgba(255, 85, 0, 0.25);
            border-radius: 999px;
            font-size: .72rem; font-weight: 600; color: #FF5500;
            letter-spacing: .05em; text-transform: uppercase;
        }

        .ldr-dot {
            width: 6px; height: 6px; border-radius: 50%;
            background: #10B981;
            animation: ldr-blink 1.1s ease-in-out infinite;
            flex-shrink: 0;
        }

        @keyframes ldr-blink {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%       { opacity: .3; transform: scale(.7); }
        }

        .ldr-dots { display: inline-flex; gap: 3px; margin-left: 2px; }
        .ldr-dots span {
            width: 3px; height: 3px; border-radius: 50%;
            background: #FF5500;
            animation: ldr-dot-bounce .9s ease-in-out infinite;
        }
        .ldr-dots span:nth-child(2) { animation-delay: .15s; }
        .ldr-dots span:nth-child(3) { animation-delay: .3s; }

        @keyframes ldr-dot-bounce {
            0%, 80%, 100% { transform: translateY(0); opacity: .4; }
            40%            { transform: translateY(-4px); opacity: 1; }
        }

        .ldr-progress {
            margin-top: 32px;
            width: 160px; height: 2px;
            background: rgba(255,255,255,.08);
            border-radius: 2px;
            overflow: hidden;
        }

        .ldr-progress-bar {
            height: 100%; width: 0%;
            background: linear-gradient(90deg, #FF5500, #FFA066);
            border-radius: 2px;
            animation: ldr-fill 2s cubic-bezier(.4,0,.2,1) forwards;
        }

        @keyframes ldr-fill {
            0%   { width: 0%; }
            60%  { width: 75%; }
            85%  { width: 88%; }
            100% { width: 100%; }
        }

        body.loading { overflow: hidden; }
    </style>
</head>
<body class="loading">

<!-- ══ PAGE LOADER ══ -->
<div id="page-loader" role="status" aria-label="Yuklanmoqda">
    <div class="ldr-rings">
        <div class="ldr-ring"></div>
        <div class="ldr-ring"></div>
        <div class="ldr-ring"></div>
    </div>

    <!-- Topspot master logo in spinning loader -->
    <div class="ldr-arc-wrap">
        <div class="ldr-arc"></div>
        <div class="ldr-icon-bg">
            <svg width="24" height="24" viewBox="0 0 40 40" fill="none">
                <path d="M20 6L34 20L29 25L20 16L11 25L6 20L20 6Z" fill="#FFFFFF"/>
                <circle cx="20" cy="28" r="6.5" fill="#FF5500"/>
            </svg>
        </div>
    </div>

    <div class="ldr-text">
        <div class="ldr-name">Topspot</div>
        <div class="ldr-badge">
            <span class="ldr-dot"></span>
            Kinetik Platforma
            <span class="ldr-dots">
                <span></span><span></span><span></span>
            </span>
        </div>
    </div>

    <div class="ldr-progress">
        <div class="ldr-progress-bar"></div>
    </div>
</div>

<!-- ══ HEADER ══ -->
<header class="site-header">
<nav>
    <div class="nav-brand">
        <div class="nav-brand-icon">
            <svg width="22" height="22" viewBox="0 0 40 40" fill="none">
                <path d="M20 6L34 20L29 25L20 16L11 25L6 20L20 6Z" fill="#FFFFFF"/>
                <circle cx="20" cy="28" r="6.5" fill="#FF5500"/>
            </svg>
        </div>
        Topspot
    </div>

    <div class="nav-links">
        <a href="{{ url('/docs') }}">Hujjatlar</a>
        @auth
            <a href="{{ url('/dashboard') }}" class="btn-login" style="border-radius:8px;">Boshqaruv paneli</a>
        @else
            <a href="{{ route('login') }}" class="btn-login" style="border-radius:8px;">Kirish</a>
        @endauth
    </div>

    <button class="nav-menu-btn" id="nav-toggle" onclick="toggleNav()" aria-label="Menyu" aria-expanded="false">
        <div class="hbg">
            <span></span><span></span><span></span>
        </div>
    </button>
</nav>

<!-- collapsible dropdown -->
<div class="nav-collapse" id="nav-collapse">
    <div class="nav-collapse-inner">
        <a href="{{ url('/docs') }}">Hujjatlar</a>
        @auth
            <a href="{{ url('/dashboard') }}" class="btn-login" style="border-radius:8px;">Boshqaruv paneli</a>
        @else
            <a href="{{ route('login') }}" class="btn-login" style="border-radius:8px;">Kirish</a>
        @endauth
    </div>
</div>
</header>

<!-- ══ HERO ══ -->
<section class="hero">
    <div class="hero-badge">
        <svg width="9" height="9" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="4"/></svg>
        Topspot Ekotizimi
    </div>
    <h1>
        Barcha boshqaruv va xizmatlar,<br>
        <span>yagona platformada.</span>
    </h1>
    <p class="hero-desc">
        Topspot 13 ta kuchli modulni — talabalar va xodimlar boshqaruvidan to'lovlar, dars jadvallari, imtihonlar va real vaqtdagi integratsiyalargacha yagona xavfsiz tizimda birlashtiradi.
    </p>
    <div class="hero-cta">
        @auth
            <a href="{{ url('/dashboard') }}" class="btn-primary">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Boshqaruv paneliga o'tish
            </a>
        @else
            <a href="{{ route('login') }}" class="btn-primary">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"/>
                </svg>
                Tizimga kirish
            </a>
        @endauth
        <a href="{{ url('/docs') }}" class="btn-secondary">
            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Hujjatlarni ko'rish
        </a>
    </div>
</section>

<!-- ══ STATS ══ -->
<div class="stats">
    <div class="stat">
        <div class="stat-num">13<span>+</span></div>
        <div class="stat-label">Asosiy Modullar</div>
    </div>
    <div class="stat">
        <div class="stat-num">100<span>+</span></div>
        <div class="stat-label">Funksional Imkoniyatlar</div>
    </div>
    <div class="stat">
        <div class="stat-num">3</div>
        <div class="stat-label">Tizimli Rollar</div>
    </div>
    <div class="stat">
        <div class="stat-num">∞</div>
        <div class="stat-label">Moslashuvchanlik</div>
    </div>
</div>

<!-- ══ MODULES ══ -->
<section class="section">
    <div class="section-head">
        <div class="section-tag">Asosiy Modullar</div>
        <h2>Barchasi tizim ichida, to'liq integratsiya</h2>
        <p>Barcha 13 modul birgalikda ishlaydi — hech qanday uchinchi tomon dasturlarisiz, to'liq xavfsiz va tezkor.</p>
    </div>

    <div class="modules-grid">

        <div class="module-card">
            <div class="module-icon" style="background:rgba(255,85,0,.1);border:1px solid rgba(255,85,0,.2);">🎓</div>
            <h3>O'quvchilar Boshqaruvi</h3>
            <p>Qabul jarayonlari, shaxsiy profillar, qatnashuv tarixi va akademik natijalar bitta markazlashgan tizimda.</p>
            <div class="module-tags">
                <span class="module-tag">Qabul</span>
                <span class="module-tag">Profil</span>
                <span class="module-tag">Natijalar</span>
            </div>
        </div>

        <div class="module-card">
            <div class="module-icon" style="background:rgba(6,182,212,.08);border:1px solid rgba(6,182,212,.16);">👨‍🏫</div>
            <h3>Xodimlar & O'qituvchilar</h3>
            <p>O'qituvchi va xodimlar ma'lumotlari, kafedralar, ish stavkalari va mehnat ta'tili balansi nazorati.</p>
            <div class="module-tags">
                <span class="module-tag">O'qituvchilar</span>
                <span class="module-tag">Bo'limlar</span>
                <span class="module-tag">Ta'tillar</span>
            </div>
        </div>

        <div class="module-card">
            <div class="module-icon" style="background:rgba(16,185,129,.08);border:1px solid rgba(16,185,129,.16);">🏫</div>
            <h3>Sinf & Guruhlar Nazorati</h3>
            <p>Guruhlar tuzilmasi, sinf rahbarlari biriktiruvi, xonalar va sig'imni qat'iy nazorat qilish tizimi.</p>
            <div class="module-tags">
                <span class="module-tag">Guruhlar</span>
                <span class="module-tag">Sinflar</span>
                <span class="module-tag">Rahbarlar</span>
            </div>
        </div>

        <div class="module-card">
            <div class="module-icon" style="background:rgba(245,158,11,.08);border:1px solid rgba(245,158,11,.16);">📚</div>
            <h3>Fanlar & Dars Rejalari</h3>
            <p>Fanlar ro'yxati, o'quv rejalari, darsliklar va malakali o'qituvchilarni darslarga biriktirish.</p>
            <div class="module-tags">
                <span class="module-tag">Fanlar</span>
                <span class="module-tag">Dastur</span>
                <span class="module-tag">Darsliklar</span>
            </div>
        </div>

        <div class="module-card">
            <div class="module-icon" style="background:rgba(239,68,68,.08);border:1px solid rgba(239,68,68,.16);">📅</div>
            <h3>Dars Jadvallari</h3>
            <p>Xonalar, smenalar va vaqt taqsimoti. Dars almashtirishlar va maxsus tadbirlarni tezkor rejalashtirish.</p>
            <div class="module-tags">
                <span class="module-tag">Vaqt</span>
                <span class="module-tag">Xonalar</span>
                <span class="module-tag">Almashtirish</span>
            </div>
        </div>

        <div class="module-card">
            <div class="module-icon" style="background:rgba(99,102,241,.08);border:1px solid rgba(99,102,241,.16);">📝</div>
            <h3>Imtihon & Baholash</h3>
            <p>Imtihonlar jadvali, ballar tizimi, reyting monitoringi va avtomatik tabel shakllantirish.</p>
            <div class="module-tags">
                <span class="module-tag">Imtihon</span>
                <span class="module-tag">Baholar</span>
                <span class="module-tag">Tabel</span>
            </div>
        </div>

        <div class="module-card">
            <div class="module-icon" style="background:rgba(34,197,94,.08);border:1px solid rgba(34,197,94,.16);">💰</div>
            <h3>Moliya & To'lovlar</h3>
            <p>Shaffof to'lov qabuli, shartnomalar, chegirmalar va to'liq moliyaviy hisobotlar yuritish.</p>
            <div class="module-tags">
                <span class="module-tag">To'lovlar</span>
                <span class="module-tag">Chegirmalar</span>
                <span class="module-tag">Hisobotlar</span>
            </div>
        </div>

        <div class="module-card">
            <div class="module-icon" style="background:rgba(251,146,60,.08);border:1px solid rgba(251,146,60,.16);">✅</div>
            <h3>Davomat Monitoringi</h3>
            <p>Kunlik va smenaviy davomat nazorati, sababli qoldirishlar va tahliliy davomat jurnallari.</p>
            <div class="module-tags">
                <span class="module-tag">Kunlik</span>
                <span class="module-tag">Smenalar</span>
                <span class="module-tag">Tahlil</span>
            </div>
        </div>

        <div class="module-card">
            <div class="module-icon" style="background:rgba(14,165,233,.08);border:1px solid rgba(14,165,233,.16);">💬</div>
            <h3>Tezkor Aloqa & Xabarnomalar</h3>
            <p>E'lonlar, SMS xabarnomalar va ota-onalar bilan tezkor aloqa tizimi orqali uzluksiz xabardorlik.</p>
            <div class="module-tags">
                <span class="module-tag">E'lonlar</span>
                <span class="module-tag">SMS</span>
                <span class="module-tag">Email</span>
            </div>
        </div>

        <div class="module-card">
            <div class="module-icon" style="background:rgba(168,85,247,.08);border:1px solid rgba(168,85,247,.16);">🚌</div>
            <h3>Yotoqxona & Logistika</h3>
            <p>Yotoqxona xonalari, talabalarni joylashtirish, transport marshrutlari va avtopark boshqaruvi.</p>
            <div class="module-tags">
                <span class="module-tag">Yotoqxona</span>
                <span class="module-tag">Marshrutlar</span>
                <span class="module-tag">Transport</span>
            </div>
        </div>

        <div class="module-card">
            <div class="module-icon" style="background:rgba(234,179,8,.08);border:1px solid rgba(234,179,8,.16);">🔐</div>
            <h3>Rollarga Asoslangan Kirish</h3>
            <p>Har bir foydalanuvchi uchun alohida huquqlar, xavfsiz rollar va qat'iy ma'lumotlar himoyasi.</p>
            <div class="module-tags">
                <span class="module-tag">Rollar</span>
                <span class="module-tag">Ruxsatlar</span>
                <span class="module-tag">Xavfsizlik</span>
            </div>
        </div>

        <div class="module-card">
            <div class="module-icon" style="background:rgba(20,184,166,.08);border:1px solid rgba(20,184,166,.16);">🔄</div>
            <h3>Ma'lumotlar Almashinuvi</h3>
            <p>CSV/Excel import va eksport, arxivlash hamda tizimlararo tezkor ma'lumotlar migratsiyasi.</p>
            <div class="module-tags">
                <span class="module-tag">Import</span>
                <span class="module-tag">Eksport</span>
                <span class="module-tag">Migratsiya</span>
            </div>
        </div>

        <div class="module-card">
            <div class="module-icon" style="background:rgba(236,72,153,.08);border:1px solid rgba(236,72,153,.16);">🔗</div>
            <h3>Real Vaqt Webhook Tizimi</h3>
            <p>Har qanday hodisa uchun avtomatik HTTP chaqiruvlar, integratsiya loglari va monitoring.</p>
            <div class="module-tags">
                <span class="module-tag">Real-vaqt</span>
                <span class="module-tag">Loglar</span>
                <span class="module-tag">Hodisalar</span>
            </div>
        </div>

    </div>
</section>

<!-- ══ WHY TOPSPOT ══ -->
<section class="section" style="padding-top:0;">
    <div class="section-head">
        <div class="section-tag">Nega Aynan Topspot</div>
        <h2>Zamonaviy va ishonchli boshqaruv uchun</h2>
        <p>Haqiqiy biznes va ta'lim muassasalari jarayonlariga to'liq moslashtirilgan arxitektura.</p>
    </div>

    <div class="why-grid">
        <div class="why-card">
            <div class="why-icon">⚡</div>
            <h4>Tezkor Ishga Tushirish</h4>
            <p>Murakkab sozlamalarsiz, bir necha daqiqada foydalanishga tayyor holat. Barcha asosiy andozalar mavjud.</p>
        </div>
        <div class="why-card">
            <div class="why-icon">🧩</div>
            <h4>Modulli Arxitektura</h4>
            <p>Topspot imkoniyatlarini yangi modullar bilan kengaytiring. Tizim yangi qismlarni avtomatik ulaydi.</p>
        </div>
        <div class="why-card">
            <div class="why-icon">🔒</div>
            <h4>Xavfsizlik Birinchi O'rinda</h4>
            <p>Barcha yo'llar va ma'lumotlar qat'iy himoyalangan. Rollarga asoslangan xavfsiz boshqaruv.</p>
        </div>
        <div class="why-card">
            <div class="why-icon">📊</div>
            <h4>To'liq Audit Jurnali</h4>
            <p>Tizimdagi har bir amal — to'lovlar, davomat va natijalar vaqt tamg'asi bilan qat'iy qayd etib boriladi.</p>
        </div>
    </div>
</section>

<!-- ══ CTA BANNER ══ -->
<div class="cta-banner">
    <h2>Boshqaruvni soddalashtirishga tayyormisiz?</h2>
    <p>Demo hisob orqali barcha modullarni darhol sinab ko'ring — hech qanday ortiqcha to'lovlarsiz.</p>
    <div class="cta-btns">
        @auth
            <a href="{{ url('/dashboard') }}" class="btn-primary">Boshqaruv paneliga o'tish</a>
        @else
            <a href="{{ route('login') }}" class="btn-primary">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"/>
                </svg>
                Demo tizimga kirish
            </a>
        @endauth
        <a href="{{ url('/docs') }}" class="btn-secondary">Hujjatlarni ko'rish</a>
    </div>
</div>

<!-- ══ CONTACT STRIP ══ -->
<div class="contact-strip">
    <div class="contact-strip-icon">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
        </svg>
    </div>
    <div>
        <div class="contact-strip-label">Savollaringiz bormi?</div>
        <div class="contact-strip-num">+998 71 200 00 00</div>
    </div>
    <div style="font-size:.82rem;color:var(--muted);">Qo'llab-quvvatlash va maslahat uchun bog'laning</div>
</div>

<!-- ══ FOOTER ══ -->
<footer>
    <div class="footer-brand">
        <div class="footer-brand-icon">
            <svg width="16" height="16" viewBox="0 0 40 40" fill="none">
                <path d="M20 6L34 20L29 25L20 16L11 25L6 20L20 6Z" fill="#FFFFFF"/>
                <circle cx="20" cy="28" r="6.5" fill="#FF5500"/>
            </svg>
        </div>
        Topspot
    </div>

    <div class="footer-links">
        <a href="{{ url('/docs') }}">Hujjatlar</a>
        @auth
            <a href="{{ url('/dashboard') }}">Boshqaruv paneli</a>
        @else
            <a href="{{ route('login') }}">Kirish</a>
        @endauth
    </div>

    <div class="footer-copy">&copy; {{ date('Y') }} Topspot. Barcha huquqlar himoyalangan.</div>
</footer>

<script>
/* ── Loader dismiss ── */
(function () {
    function dismissLoader() {
        const loader = document.getElementById('page-loader');
        if (!loader) return;
        loader.classList.add('out');
        loader.addEventListener('transitionend', function () {
            loader.style.display = 'none';
            document.body.classList.remove('loading');
        }, { once: true });
    }

    if (document.readyState === 'complete') {
        setTimeout(dismissLoader, 400);
    } else {
        window.addEventListener('load', function () {
            setTimeout(dismissLoader, 400);
        });
    }
    setTimeout(dismissLoader, 3200);
})();

function toggleNav() {
    const btn      = document.getElementById('nav-toggle');
    const collapse = document.getElementById('nav-collapse');
    const isOpen   = collapse.classList.toggle('open');
    btn.classList.toggle('active', isOpen);
    btn.setAttribute('aria-expanded', isOpen);
}

document.addEventListener('click', function (e) {
    const btn      = document.getElementById('nav-toggle');
    const collapse = document.getElementById('nav-collapse');
    const header   = document.querySelector('.site-header');
    if (header && !header.contains(e.target) && collapse && collapse.classList.contains('open')) {
        collapse.classList.remove('open');
        btn.classList.remove('active');
        btn.setAttribute('aria-expanded', 'false');
    }
});

document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        const btn      = document.getElementById('nav-toggle');
        const collapse = document.getElementById('nav-collapse');
        if (collapse) collapse.classList.remove('open');
        if (btn) {
            btn.classList.remove('active');
            btn.setAttribute('aria-expanded', 'false');
        }
    }
});

window.addEventListener('resize', function () {
    if (window.innerWidth > 640) {
        const btn      = document.getElementById('nav-toggle');
        const collapse = document.getElementById('nav-collapse');
        if (collapse) collapse.classList.remove('open');
        if (btn) {
            btn.classList.remove('active');
            btn.setAttribute('aria-expanded', 'false');
        }
    }
});
</script>

</body>
</html>
