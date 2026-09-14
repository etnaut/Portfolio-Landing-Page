<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daryl Tuante Dagpin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap"
        rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --bg: #0a0a0f;
            --bg2: #111118;
            --accent: #e8ff47;
            --accent2: #a8ff78;
            --text: #f0f0f0;
            --muted: #7a7a8c;
            --border: rgba(255, 255, 255, 0.07);
            --card: #13131c;
        }

        html {
            scroll-behavior: smooth;
        }

        section[id] {
            scroll-margin-top: 5.5rem;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 16px;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* ── NAV ── */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 6vw;
            background: rgba(10, 10, 15, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .nav-logo {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.1rem;
            letter-spacing: -0.02em;
            color: var(--text);
            text-decoration: none;
        }

        .nav-logo span {
            color: var(--accent);
        }

        nav a {
            text-decoration: none;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 2rem;
        }

        .nav-toggle {
            display: none;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.12);
            cursor: pointer;
            color: var(--text);
            width: 42px;
            height: 42px;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            transition: background 0.2s, border-color 0.2s, transform 0.2s;
        }

        .nav-toggle.open span {
            background: transparent;
        }

        .nav-toggle.open span::before {
            top: 0;
            transform: rotate(45deg);
        }

        .nav-toggle.open span::after {
            top: 0;
            transform: rotate(-45deg);
        }

        .nav-toggle:hover,
        .nav-toggle:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(232, 255, 71, 0.2);
            outline: none;
        }

        .nav-toggle span,
        .nav-toggle span::before,
        .nav-toggle span::after {
            display: block;
            width: 26px;
            height: 2px;
            background: currentColor;
            border-radius: 999px;
            position: relative;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        .nav-toggle span::before,
        .nav-toggle span::after {
            content: '';
            position: absolute;
            left: 0;
        }

        .nav-toggle span::before {
            top: -8px;
        }

        .nav-toggle span::after {
            top: 8px;
        }

        @media (max-width: 768px) {
            .nav-mobile {
                position: relative;
                display: inline-flex;
                align-items: flex-start;
                justify-content: center;
                width: auto;
            }

            .nav-toggle {
                display: inline-flex;
                position: relative;
                z-index: 3;
            }

            .nav-links {
                position: absolute;
                top: calc(100% + 0.75rem);
                right: 0;
                display: flex;
                flex-direction: column;
                gap: 1rem;
                width: 220px;
                padding: 0.75rem 1rem;
                background: rgba(19, 19, 28, 0.97);
                border: 1px solid rgba(255, 255, 255, 0.08);
                border-radius: 18px;
                box-shadow: 0 30px 60px rgba(0, 0, 0, 0.35);
                overflow: hidden;
                max-height: 0;
                opacity: 0;
                visibility: hidden;
                transform: translateY(-10px) scale(0.95);
                transform-origin: top right;
                transition: max-height 0.35s ease, opacity 0.35s ease, transform 0.35s ease, visibility 0.35s ease, padding 0.35s ease;
                z-index: 50;
            }

            .nav-links.open {
                max-height: 420px;
                opacity: 1;
                visibility: visible;
                transform: translateY(0) scale(1);
            }

            .nav-links li {
                width: 100%;
            }

            .nav-links li+li {
                border-top: 1px solid rgba(255, 255, 255, 0.08);
                padding-top: 0.75rem;
            }

            .nav-links a {
                display: inline-flex;
                width: 100%;
                justify-content: center;
                color: var(--muted);
                font-size: 1rem;
                opacity: 1;
                transform: none;
                transition: color 0.2s;
            }

            .nav-links a:hover {
                color: var(--text);
            }

            .hero-stats {
                gap: 1.5rem;
                flex-wrap: wrap;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        .nav ul a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            letter-spacing: 0.02em;
            transition: color 0.2s;
        }

        nav ul a:hover {
            color: var(--text);
        }

        .nav-cta {
            background: var(--accent);
            color: #0a0a0f !important;
            padding: 0.5rem 1.25rem;
            border-radius: 100px;
            font-weight: 600 !important;
            transition: opacity 0.2s !important;
        }

        .nav-cta:hover {
            opacity: 0.85;
            color: #0a0a0f !important;
        }

        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 8rem 6vw 5rem;
            position: relative;
            overflow: clip;
        }

        .hero-inner {
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) minmax(260px, 0.9fr);
            gap: 3.5rem;
            align-items: center;
            width: min(100%, 1200px);
            margin-top: 1rem;
            overflow: visible;

        }

        .hero-copy {
            max-width: 720px;
        }

        .hero-image {
            display: flex;
            justify-content: flex-end;
            overflow: visible;
        }



        @media (max-width: 900px) {
            .hero-inner {
                grid-template-columns: 1fr;
            }

            .hero-image {
                justify-content: center;
                margin-top: 2rem;
            }
        }

        @media (max-width: 768px) {
            .hero-inner {
                grid-template-columns: 1fr;
            }

            .hero-image {
                order: -1;
                justify-content: center;
                margin: 0 0 2rem;
            }

            .hero-copy {
                text-align: center;
            }

            .hero-actions {
                justify-content: center;
            }
        }

        .hero-grid-bg {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(232, 255, 71, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(232, 255, 71, 0.04) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
        }

        .hero-glow {
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(232, 255, 71, 0.08) 0%, transparent 70%);
            top: -100px;
            right: -100px;
            pointer-events: none;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(232, 255, 71, 0.08);
            border: 1px solid rgba(232, 255, 71, 0.2);
            color: var(--accent);
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0.4rem 1rem;
            border-radius: 100px;
            margin-bottom: 2rem;
            width: fit-content;
            animation: fadeUp 0.6s ease both;
        }

        .hero-tag::before {
            content: '';
            width: 6px;
            height: 6px;
            background: var(--accent);
            border-radius: 50%;
        }

        .hero h1 {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: clamp(3rem, 7vw, 6rem);
            line-height: 1.0;
            letter-spacing: -0.03em;
            margin-bottom: 1.5rem;
            animation: fadeUp 0.6s 0.1s ease both;
        }

        .hero h1 em {
            font-style: normal;
            color: var(--accent);
            position: relative;
            display: inline-block;
        }

        .hero-sub {
            font-size: clamp(1rem, 1.5vw, 1.2rem);
            color: var(--muted);
            max-width: 520px;
            font-weight: 300;
            margin-bottom: 2.5rem;
            animation: fadeUp 0.6s 0.2s ease both;
        }

        .hero-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            animation: fadeUp 0.6s 0.3s ease both;
        }

        .btn-primary {
            background: var(--accent);
            color: #0a0a0f;
            padding: 0.85rem 2rem;
            border-radius: 100px;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            transition: transform 0.2s, opacity 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .btn-secondary {
            border: 1px solid var(--border);
            color: var(--text);
            padding: 0.85rem 2rem;
            border-radius: 100px;
            font-weight: 500;
            font-size: 0.95rem;
            text-decoration: none;
            transition: border-color 0.2s, background 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-secondary:hover {
            border-color: rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.04);
        }

        .hero-stats {
            display: flex;
            gap: 3rem;
            margin-top: 4rem;
            padding-top: 3rem;
            border-top: 1px solid var(--border);
            animation: fadeUp 0.6s 0.4s ease both;
        }

        .stat-num {
            font-family: 'Syne', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--text);
            line-height: 1;
        }

        .stat-num span {
            color: var(--accent);
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--muted);
            margin-top: 0.3rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        /* ── SERVICES ── */
        .services {
            padding: 7rem 6vw;
            background: var(--bg2);
        }

        .section-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 4rem;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .section-label {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 0.75rem;
        }

        .section-title {
            font-family: 'Syne', sans-serif;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 1.1;
        }

        .section-desc {
            color: var(--muted);
            max-width: 380px;
            font-size: 0.95rem;
            line-height: 1.7;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5px;
            background: var(--border);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
        }

        .service-card {
            background: var(--card);
            padding: 2.5rem;
            position: relative;
            transition: background 0.3s;
            cursor: default;
        }

        .service-card:hover {
            background: #1a1a26;
        }

        .service-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: rgba(232, 255, 71, 0.1);
            border: 1px solid rgba(232, 255, 71, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 1.4rem;
        }

        .service-card h3 {
            font-family: 'Syne', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            letter-spacing: -0.01em;
        }

        .service-card p {
            color: var(--muted);
            font-size: 0.9rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        .service-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .tag {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.3rem 0.75rem;
            border-radius: 100px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border);
            color: var(--muted);
            letter-spacing: 0.02em;
        }

        .service-arrow {
            position: absolute;
            top: 2rem;
            right: 2rem;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transform: translateY(4px);
            transition: opacity 0.2s, transform 0.2s;
            color: var(--accent);
            font-size: 1rem;
        }

        .service-card:hover .service-arrow {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── ABOUT ── */
        .about {
            padding: 7rem 6vw;
            background: var(--bg);
        }

        .about-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.2fr) minmax(260px, 0.8fr);
            gap: 3.5rem;
            align-items: start;
        }

        .about-copy p {
            color: var(--muted);
            font-size: 1.02rem;
            line-height: 1.8;
            margin-bottom: 1.15rem;
            max-width: 640px;
        }

        .about-copy p:last-of-type {
            margin-bottom: 0;
        }

        .about-copy strong {
            color: var(--text);
            font-weight: 500;
        }

        .about-meta {
            display: flex;
            flex-direction: column;
            gap: 1px;
            background: var(--border);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
        }

        .about-meta-item {
            background: var(--card);
            padding: 1.35rem 1.5rem;
        }

        .about-meta-item span {
            display: block;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 0.35rem;
        }

        .about-meta-item p {
            color: var(--text);
            font-size: 0.95rem;
            line-height: 1.5;
        }

        /* ── WORK ── */
        .work {
            padding: 7rem 6vw;
            background: var(--bg2);
        }

        .work-list {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .work-item {
            display: grid;
            grid-template-columns: 80px minmax(0, 1fr) auto;
            gap: 2rem;
            align-items: start;
            background: var(--card);
            padding: 2.25rem 2.5rem;
            border-radius: 18px;
            border: 1px solid var(--border);
            transition: border-color 0.3s, transform 0.3s, box-shadow 0.3s, background 0.3s;
            position: relative;
        }

        .work-item:hover {
            background: #161622;
            border-color: rgba(232, 255, 71, 0.25);
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4), 0 0 25px rgba(232, 255, 71, 0.05);
        }

        .work-index {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--accent);
            letter-spacing: -0.02em;
            line-height: 1;
            padding: 0.5rem 0.75rem;
            background: rgba(232, 255, 71, 0.08);
            border: 1px solid rgba(232, 255, 71, 0.15);
            border-radius: 12px;
            text-align: center;
            width: fit-content;
        }

        .work-body h3 {
            font-family: 'Syne', sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
            letter-spacing: -0.01em;
            margin-bottom: 0.65rem;
            color: var(--text);
        }

        .work-problem {
            font-size: 0.92rem;
            color: #d0d0dc;
            line-height: 1.65;
            margin-bottom: 1rem;
        }

        .work-problem strong {
            color: var(--accent);
            font-weight: 600;
        }

        .work-features {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 0.5rem 1.25rem;
            margin-bottom: 1.25rem;
            padding-left: 0;
        }

        .work-features li {
            font-size: 0.85rem;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .work-features li::before {
            content: "✦";
            color: var(--accent);
            font-size: 0.7rem;
        }

        .work-link {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            color: var(--accent);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            white-space: nowrap;
            padding: 0.6rem 1.1rem;
            border: 1px solid rgba(232, 255, 71, 0.25);
            background: rgba(232, 255, 71, 0.06);
            border-radius: 100px;
            transition: color 0.2s, border-color 0.2s, background 0.2s, transform 0.2s;
        }

        .work-link:hover {
            color: #0a0a0f;
            background: var(--accent);
            border-color: var(--accent);
            transform: translateY(-2px);
        }

        .work-footnote {
            margin-top: 2rem;
            color: var(--muted);
            font-size: 0.95rem;
            text-align: center;
        }

        .work-footnote a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
        }

        .work-footnote a:hover {
            text-decoration: underline;
        }

        /* ── SKILLS ── */
        .skills {
            padding: 7rem 6vw;
            background: var(--bg);
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1.5rem;
        }

        .skill-group {
            background: var(--card);
            padding: 2.5rem;
            border-radius: 18px;
            border: 1px solid var(--border);
            transition: border-color 0.3s;
        }

        .skill-group:hover {
            border-color: rgba(232, 255, 71, 0.2);
        }

        .skill-group h3 {
            font-family: 'Syne', sans-serif;
            font-size: 1.35rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .skill-group h3 span {
            color: var(--accent);
        }

        .skill-group > p {
            color: var(--muted);
            font-size: 0.9rem;
            line-height: 1.7;
            margin-bottom: 1.75rem;
        }

        .skill-rows {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .skill-row {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .skill-row-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .skill-row strong {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text);
        }

        .skill-row span {
            font-size: 0.78rem;
            color: var(--accent);
            font-weight: 500;
        }

        .skill-track {
            width: 100%;
            height: 6px;
            background: rgba(255, 255, 255, 0.07);
            border-radius: 100px;
            overflow: hidden;
        }

        .skill-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--accent), var(--accent2));
            border-radius: 100px;
        }

        @media (max-width: 900px) {
            .about-grid,
            .skills-grid {
                grid-template-columns: 1fr;
            }

            .work-item {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .work-link {
                justify-self: start;
            }
        }

        /* ── CONTACT ── */
        .contact {
            padding: 7rem 6vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .contact-glow {
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(232, 255, 71, 0.06) 0%, transparent 70%);
            bottom: -200px;
            left: 50%;
            transform: translateX(-50%);
            pointer-events: none;
        }

        .contact h2 {
            font-family: 'Syne', sans-serif;
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            line-height: 1.05;
            margin-bottom: 1.25rem;
        }

        .contact h2 span {
            color: var(--accent);
        }

        .contact p {
            color: var(--muted);
            max-width: 460px;
            margin-bottom: 2.5rem;
            font-size: 1rem;
        }

        .contact-email {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: var(--card);
            border: 1px solid var(--border);
            color: var(--text);
            padding: 1rem 2rem;
            border-radius: 100px;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            transition: border-color 0.2s, background 0.2s;
            margin-bottom: 1.5rem;
        }

        .contact-email:hover {
            border-color: rgba(232, 255, 71, 0.3);
            background: rgba(232, 255, 71, 0.05);
            color: var(--accent);
        }

        /* ── FOOTER ── */
        footer {
            padding: 2rem 6vw;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        footer p {
            color: var(--muted);
            font-size: 0.85rem;
        }

        footer p span {
            color: var(--accent);
        }

        .footer-links {
            display: flex;
            gap: 1.5rem;
        }

        .footer-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.2s;
        }

        .footer-links a:hover {
            color: var(--text);
        }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(6px);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: var(--card);
            padding: 2rem;
            border-radius: 16px;
            width: 90%;
            max-width: 400px;
            color: var(--text);
            border: 1px solid var(--border);
            position: relative;
            animation: fadeUp 0.3s ease;
        }

        .modal-content h2 {
            margin-bottom: 1rem;
            font-family: 'Syne', sans-serif;
        }

        .modal-content ul {
            list-style: none;
            padding: 0;
        }

        .modal-content li {
            padding: 0.5rem 0;
            color: var(--muted);
        }

        .close {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 1.6rem;
            cursor: pointer;
            color: var(--muted);
            transition: color 0.2s;
            z-index: 10;
        }

        .close:hover {
            color: var(--accent);
        }

        /* ── CONTACT MODAL STYLES ── */
        .contact-modal-content {
            max-width: 540px !important;
            width: 92% !important;
            padding: 2.25rem !important;
            background: #13131c !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            border-radius: 20px !important;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.7), 0 0 30px rgba(232, 255, 71, 0.05) !important;
            max-height: 90vh;
            overflow-y: auto;
        }

        .contact-modal-header {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .contact-modal-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(232, 255, 71, 0.1);
            border: 1px solid rgba(232, 255, 71, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
            flex-shrink: 0;
        }

        .contact-modal-header h2 {
            font-size: 1.4rem;
            margin-bottom: 0.25rem;
            color: var(--text);
            font-family: 'Syne', sans-serif;
        }

        .contact-modal-header p {
            font-size: 0.85rem;
            color: var(--muted);
            line-height: 1.4;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        @media (max-width: 540px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        .form-group {
            margin-bottom: 1.25rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 0.4rem;
            letter-spacing: 0.02em;
        }

        .form-group label .req {
            color: var(--accent);
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group textarea {
            width: 100%;
            background: rgba(10, 10, 15, 0.7);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            color: var(--text);
            font-family: inherit;
            font-size: 0.9rem;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: rgba(232, 255, 71, 0.5);
            box-shadow: 0 0 0 3px rgba(232, 255, 71, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .file-dropzone {
            border: 2px dashed rgba(255, 255, 255, 0.15);
            background: rgba(10, 10, 15, 0.4);
            border-radius: 12px;
            padding: 1.25rem 1rem;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.2s, background 0.2s;
        }

        .file-dropzone:hover,
        .file-dropzone.dragover {
            border-color: var(--accent);
            background: rgba(232, 255, 71, 0.05);
        }

        .file-dropzone svg {
            color: var(--accent);
            margin-bottom: 0.5rem;
        }

        .file-dropzone p {
            font-size: 0.85rem;
            color: var(--text);
            margin-bottom: 0.2rem;
        }

        .file-dropzone .browse-link {
            color: var(--accent);
            text-decoration: underline;
            font-weight: 500;
        }

        .file-dropzone .file-hint {
            display: block;
            font-size: 0.75rem;
            color: var(--muted);
        }

        .file-list {
            margin-top: 0.75rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .file-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border);
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            font-size: 0.8rem;
        }

        .file-item-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .file-item-name {
            color: var(--text);
            font-weight: 500;
        }

        .file-item-size {
            color: var(--muted);
            font-size: 0.75rem;
        }

        .file-item-remove {
            background: transparent;
            border: none;
            color: #ff5f56;
            cursor: pointer;
            padding: 0.2rem 0.4rem;
            font-size: 1rem;
            line-height: 1;
            border-radius: 4px;
            transition: background 0.2s;
        }

        .file-item-remove:hover {
            background: rgba(255, 95, 86, 0.15);
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }

        .btn-cancel {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--muted);
            padding: 0.7rem 1.25rem;
            border-radius: 100px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: color 0.2s, border-color 0.2s;
        }

        .btn-cancel:hover {
            color: var(--text);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .btn-submit {
            background: var(--accent);
            color: #0a0a0f;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 100px;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: opacity 0.2s, transform 0.2s;
        }

        .btn-submit:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .btn-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .form-alert {
            padding: 0.75rem 1rem;
            border-radius: 10px;
            font-size: 0.85rem;
            margin-bottom: 1.25rem;
            text-align: left;
        }

        .form-alert.success {
            background: rgba(168, 255, 120, 0.1);
            border: 1px solid rgba(168, 255, 120, 0.3);
            color: #a8ff78;
        }

        .form-alert.error {
            background: rgba(255, 95, 86, 0.1);
            border: 1px solid rgba(255, 95, 86, 0.3);
            color: #ff5f56;
        }

        .spinner {
            width: 16px;
            height: 16px;
            border: 2px solid rgba(0, 0, 0, 0.2);
            border-top-color: #0a0a0f;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .hero-stats {
                gap: 1.5rem;
                flex-wrap: wrap;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        .stat-item {
            position: relative;
            cursor: default;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        a.stat-item {
            cursor: pointer;
        }

        /* hidden tooltip */
        .stat-tooltip {
            position: absolute;
            bottom: 120%;
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            background: var(--card);
            color: var(--text);
            padding: 0.75rem 1rem;
            border-radius: 10px;
            font-size: 0.75rem;
            width: 220px;
            text-align: center;
            opacity: 0;
            visibility: hidden;
            transition: 0.3s ease;
            border: 1px solid var(--border);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            z-index: 10;
        }

        /* small arrow */
        .stat-tooltip::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border-width: 6px;
            border-style: solid;
            border-color: var(--card) transparent transparent transparent;
        }

        /* SHOW ON HOVER */
        .stat-item:hover .stat-tooltip {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .card-wrap {
            position: relative;
            width: 100%;
            max-width: 320px;
            height: 480px;
            cursor: pointer;
            perspective: 1400px;
            perspective-origin: center bottom;
        }

        /* ── BACK CARD ── */
        .card-back {
            position: absolute;
            width: 100%;
            height: 88%;
            bottom: 0;
            left: 0;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(232, 255, 71, 0.1);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            z-index: 1;
            transform: rotate(-4deg) translateX(-8px) translateY(6px);
            transition: transform 0.45s cubic-bezier(0.25, 1, 0.5, 1),
                box-shadow 0.45s ease;
            transform-style: preserve-3d;
        }

        .card-back-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top;
            display: block;
            filter: brightness(0.75);
            transition: filter 0.4s ease;
        }

        /* ── FRONT CARD ── */
        .card-front {
            position: absolute;
            width: 100%;
            height: 88%;
            bottom: 0;
            left: 0;
            border-radius: 20px;
            overflow: visible;
            z-index: 2;
            transition: transform 0.45s cubic-bezier(0.25, 1, 0.5, 1);
            transform-style: preserve-3d;
            will-change: transform;
        }

        .card-front-frame {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 110%;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(232, 255, 71, 0.18);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            transition: box-shadow 0.45s ease, border-color 0.45s ease;
            transform: translateZ(0);
        }

        .card-front-bg {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: bottom;
            display: block;
        }

        /* Character floats OUTSIDE the frame */
        .card-front-character {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%) translateY(20px) translateZ(0);
            width: 120%;
            height: 120%;
            object-fit: cover;
            object-position: top;
            z-index: 5;
            pointer-events: none;
            opacity: 0;
            transition: transform 0.45s cubic-bezier(0.34, 1.35, 0.64, 1),
                filter 0.45s ease,
                opacity 0.3s ease;
            filter: drop-shadow(0 -8px 15px rgba(232, 255, 71, 0.1)) drop-shadow(0 12px 25px rgba(0, 0, 0, 0.6));
            transform-origin: bottom center;
            will-change: transform, opacity;
        }

        /* ── FLOATING TECH BADGES ON HOVER ── */
        .tech-badge {
            position: absolute;
            z-index: 10;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.45rem 0.85rem;
            background: rgba(19, 19, 28, 0.92);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(232, 255, 71, 0.35);
            border-radius: 100px;
            color: var(--text);
            font-size: 0.78rem;
            font-weight: 600;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5), 0 0 15px rgba(232, 255, 71, 0.15);
            opacity: 0;
            visibility: hidden;
            transform: scale(0.7) translateY(15px);
            transition: opacity 0.35s cubic-bezier(0.34, 1.4, 0.64, 1),
                transform 0.35s cubic-bezier(0.34, 1.4, 0.64, 1),
                visibility 0.35s ease;
            pointer-events: none;
            white-space: nowrap;
        }

        .tech-badge i {
            color: var(--accent);
            font-size: 0.9rem;
        }

        /* Staggered badge positions around card */
        .tech-badge.badge-1 { top: -12px; left: -30px; }
        .tech-badge.badge-2 { top: 40px; right: -35px; }
        .tech-badge.badge-3 { top: 145px; left: -45px; }
        .tech-badge.badge-4 { top: 215px; right: -40px; }
        .tech-badge.badge-5 { bottom: 70px; left: -35px; }
        .tech-badge.badge-6 { bottom: 10px; right: -25px; }

        /* Hover states */
        .card-wrap:hover .card-front-character {
            transform: translateX(-50%) translateY(-35px) translateZ(30px);
            opacity: 1;
            filter: drop-shadow(0 -15px 30px rgba(232, 255, 71, 0.25)) drop-shadow(0 20px 40px rgba(0, 0, 0, 0.8));
        }

        .card-wrap:hover .card-back {
            transform: rotate(-5deg) translateX(-12px) translateY(8px) scale(0.98);
        }

        .card-wrap:hover .card-back-img {
            filter: brightness(0.65);
        }

        .card-wrap:hover .card-front {
            transform: translateY(-12px) rotateX(6deg) rotateY(-2deg);
        }

        .card-wrap:hover .card-front-frame {
            border-color: rgba(232, 255, 71, 0.4);
            box-shadow: 0 30px 70px rgba(0, 0, 0, 0.7),
                0 0 35px rgba(232, 255, 71, 0.15);
        }

        .card-wrap:hover .tech-badge {
            opacity: 1;
            visibility: visible;
            transform: scale(1) translateY(0);
        }

        .card-wrap:hover .tech-badge.badge-1 { transition-delay: 0.05s; }
        .card-wrap:hover .tech-badge.badge-2 { transition-delay: 0.12s; }
        .card-wrap:hover .tech-badge.badge-3 { transition-delay: 0.18s; }
        .card-wrap:hover .tech-badge.badge-4 { transition-delay: 0.24s; }
        .card-wrap:hover .tech-badge.badge-5 { transition-delay: 0.30s; }
        .card-wrap:hover .tech-badge.badge-6 { transition-delay: 0.36s; }

        /* ── VIEWERS BADGE & MODAL STYLES ── */
        .viewers-pulse-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.18rem 0.55rem;
            background: rgba(232, 255, 71, 0.12);
            border: 1px solid rgba(232, 255, 71, 0.35);
            color: var(--accent);
            border-radius: 100px;
            font-size: 0.72rem;
            font-weight: 700;
            margin-left: 0.35rem;
        }

        .viewers-pulse-badge::before {
            content: "";
            width: 6px;
            height: 6px;
            background: var(--accent);
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 8px var(--accent);
            animation: pulseDot 1.5s infinite;
        }

        @keyframes pulseDot {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.4); opacity: 0.4; }
        }

        .viewers-modal-content {
            background: #101018 !important;
            border: 1px solid rgba(232, 255, 71, 0.25) !important;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.8), 0 0 30px rgba(232, 255, 71, 0.1) !important;
            max-width: 620px !important;
        }

        .viewers-stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.85rem;
            margin-bottom: 1.25rem;
        }

        .viewers-stat-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 0.85rem;
            text-align: center;
        }

        .viewers-stat-card .v-num {
            font-family: var(--font-head);
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--accent);
        }

        .viewers-stat-card .v-label {
            font-size: 0.72rem;
            color: var(--muted);
            margin-top: 0.2rem;
        }

        .viewers-personalizer {
            background: rgba(232, 255, 71, 0.04);
            border: 1px dashed rgba(232, 255, 71, 0.3);
            border-radius: 12px;
            padding: 0.9rem 1.1rem;
            margin-bottom: 1.25rem;
        }

        .viewers-personalizer label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 0.4rem;
        }

        .viewers-name-row {
            display: flex;
            gap: 0.5rem;
        }

        .viewers-name-row input {
            flex: 1;
            background: #0a0a0f;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 0.5rem 0.85rem;
            color: #fff;
            font-size: 0.82rem;
        }

        .viewers-name-row button {
            background: var(--accent);
            color: #0a0a0f;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            cursor: pointer;
            font-size: 0.82rem;
            transition: transform 0.2s ease;
        }

        .viewers-name-row button:hover {
            transform: translateY(-2px);
        }

        .recent-visitors-list {
            max-height: 220px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            padding-right: 0.25rem;
        }

        .visitor-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 0.6rem 0.85rem;
            font-size: 0.82rem;
        }

        .visitor-info {
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .visitor-meta {
            color: var(--muted);
            font-size: 0.75rem;
        }

        @media (max-width: 768px) {
            .tech-badge.badge-1 { left: -10px; }
            .tech-badge.badge-2 { right: -10px; }
            .tech-badge.badge-3 { left: -15px; }
            .tech-badge.badge-4 { right: -15px; }
            .tech-badge.badge-5 { left: -10px; }
            .tech-badge.badge-6 { right: -10px; }
            .viewers-stats-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>

    {{-- Navigation --}}
    <nav>
        <a href="#" class="nav-logo">DTD<span>.</span></a>
        <div class="nav-mobile">
            <button class="nav-toggle" aria-label="Toggle menu" aria-expanded="false">
                <span></span>
            </button>
            <ul class="nav-links">
                <li><a href="#about">About</a></li>
                <li><a href="#work">Work</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#contact">Contact</a></li>
                <li>
                    <a href="javascript:void(0)" onclick="openViewersModal(event)">
                        <i class="bi bi-eye-fill"></i> Viewers
                        <span class="viewers-pulse-badge" id="navViewersBadge">1 Live</span>
                    </a>
                </li>
                <li><a href="javascript:void(0)" onclick="openContactModal(event)" class="nav-cta">Hire Me</a></li>
            </ul>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="hero" id="home">
        <div class="hero-grid-bg"></div>
        <div class="hero-glow"></div>

        <div class="hero-inner">
            <div class="hero-copy">
                <div class="hero-tag">Welcome to my Page</div>

                <h1>
                    Daryl Tuante<br>
                    <em>Dagpin.</em>
                </h1>

                <p class="hero-sub">
                    Web developer &amp; IT support specialist based in the Philippines.
                    I build clean, reliable digital solutions for real-world problems.
                </p>

                <div class="hero-actions">
                    <a href="#work" class="btn-primary">
                        View Work
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </a>
                    <a href="javascript:void(0)" onclick="openContactModal(event)" class="btn-secondary">Get in
                        touch</a>
                </div>
            </div>

            <div class="hero-image">
                <div class="card-wrap">

                    <!-- FRONT CARD: second image pops out in 3D -->
                    <div class="card-front">
                        <div class="card-glow"></div>
                        <!-- Card frame with background -->
                        <div class="card-front-frame">
                            <img class="card-front-bg" src="{{ asset('Image/DAGPIN, DARYL T. (4 of 4).jpg') }}"
                                alt="Daryl Dagpin">
                        </div>
                        <!-- Character floats OUTSIDE the frame -->
                        <img class="card-front-character" src="{{ asset('Image/Daryl Second Image.png') }}"
                            alt="Daryl Dagpin">

                        <!-- Floating Tech Stack Badges on Hover -->
                        <div class="tech-badge badge-1">
                            <i class="bi bi-layers-fill"></i>
                            <span>Laravel</span>
                        </div>
                        <div class="tech-badge badge-2">
                            <i class="bi bi-react"></i>
                            <span>React</span>
                        </div>
                        <div class="tech-badge badge-3">
                            <i class="bi bi-code-slash"></i>
                            <span>PHP</span>
                        </div>
                        <div class="tech-badge badge-4">
                            <i class="bi bi-database-fill"></i>
                            <span>MySQL</span>
                        </div>
                        <div class="tech-badge badge-5">
                            <i class="bi bi-filetype-js"></i>
                            <span>JavaScript</span>
                        </div>
                        <div class="tech-badge badge-6">
                            <i class="bi bi-tools"></i>
                            <span>IT Support</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="hero-stats">

            <div class="stat-item">
                <div class="stat-num">5<span>+</span></div>
                <div class="stat-label">Months Experience</div>
                <div class="stat-tooltip">Started as a student developer, focused on web systems and IT support.</div>
            </div>

            <a href="#work" class="stat-item">
                <div class="stat-num">5<span>+</span></div>
                <div class="stat-label">Projects Done</div>
                <div class="stat-tooltip">Includes web apps, games, and system development projects.</div>
            </a>

            <div class="stat-item">
                <div class="stat-num">100<span>%</span></div>
                <div class="stat-label">Client Satisfaction</div>
                <div class="stat-tooltip">All feedback received from school and personal clients.</div>
            </div>

            <a href="javascript:void(0)" onclick="openViewersModal(event)" class="stat-item">
                <div class="stat-num" id="heroViewsNum">1<span>+</span></div>
                <div class="stat-label">Total Views</div>
                <div class="stat-tooltip">Click to see live online visitors and location insights.</div>
            </a>

        </div>
    </section>

    {{-- About --}}
    <section class="about" id="about">
        <div class="section-header reveal">
            <div>
                <span class="section-label">About</span>
                <h2 class="section-title">Developer and IT support,<br>built for real problems</h2>
            </div>
        </div>
        <div class="about-grid reveal">
            <div class="about-copy">
                <p>
                    I’m <strong>Daryl Tuante Dagpin</strong>, a web developer and IT support specialist
                    based in the Philippines. I build clean, reliable digital tools — and I stay around
                    to keep the machines they run on healthy.
                </p>
                <p>
                    Most of my work sits in the same place clients actually live: barangay records,
                    pharmacy counters, document routing, and the day-to-day troubleshooting that
                    keeps a small team online. I care about systems that are easy to use, easy to
                    maintain, and honest about what they do.
                </p>
                <p>
                    If you need a site, a web app, or someone who can both ship code and fix the
                    network underneath it — that’s the lane I work in.
                </p>
            </div>
            <div class="about-meta">
                <div class="about-meta-item">
                    <span>Based in</span>
                    <p>Philippines</p>
                </div>
                <div class="about-meta-item">
                    <span>Focus</span>
                    <p>Web development &amp; IT support</p>
                </div>
                <div class="about-meta-item">
                    <span>Availability</span>
                    <p>Open for freelance and hire</p>
                </div>
                <div class="about-meta-item">
                    <span>Stack</span>
                    <p>Laravel, React, MySQL, HTML/CSS, JavaScript</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Work --}}
    <section class="work" id="work">
        <div class="section-header reveal">
            <div>
                <span class="section-label">Selected Systems &amp; Case Studies</span>
                <h2 class="section-title">Things I’ve built</h2>
            </div>
            <p class="section-desc">
                Production-focused web applications and operational software. Each project solves a specific real-world problem for local government, healthcare, or administrative workflows.
            </p>
        </div>

        <div class="work-list reveal">
            {{-- Project 01 --}}
            <article class="work-item">
                <span class="work-index">01</span>
                <div class="work-body">
                    <h3>Barangay Information System</h3>
                    <p class="work-problem">
                        <strong>Problem Solved:</strong> Manual paper-based records hindered resident verifications, certificate issuance, and community profiling for local staff.
                    </p>
                    <ul class="work-features">
                        <li>Resident registry with instant search &amp; filter</li>
                        <li>Automated barangay clearance &amp; certificate generation</li>
                        <li>Household data grouping &amp; demographic analytics</li>
                    </ul>
                    <div class="service-tags">
                        <span class="tag">PHP / Laravel</span>
                        <span class="tag">MySQL</span>
                        <span class="tag">Bootstrap</span>
                        <span class="tag">Web System</span>
                    </div>
                </div>
                <a class="work-link" href="https://github.com/etnaut?tab=repositories" target="_blank"
                    rel="noopener noreferrer">GitHub Repo <span aria-hidden="true">↗</span></a>
            </article>

            {{-- Project 02 --}}
            <article class="work-item">
                <span class="work-index">02</span>
                <div class="work-body">
                    <h3>Pharmacy POS &amp; Inventory Management System</h3>
                    <p class="work-problem">
                        <strong>Problem Solved:</strong> Disorganized stock tracking caused stockouts and manual calculation errors at cashier checkout counters.
                    </p>
                    <ul class="work-features">
                        <li>Point-of-sale checkout counter with barcode lookup</li>
                        <li>Real-time stock alerts &amp; medicine expiration warnings</li>
                        <li>Automated end-of-day sales reporting &amp; profit tracking</li>
                    </ul>
                    <div class="service-tags">
                        <span class="tag">PHP</span>
                        <span class="tag">MySQL</span>
                        <span class="tag">POS Counter</span>
                        <span class="tag">Inventory Control</span>
                    </div>
                </div>
                <a class="work-link" href="https://github.com/etnaut?tab=repositories" target="_blank"
                    rel="noopener noreferrer">GitHub Repo <span aria-hidden="true">↗</span></a>
            </article>

            {{-- Project 03 --}}
            <article class="work-item">
                <span class="work-index">03</span>
                <div class="work-body">
                    <h3>Takipsilim (3D Horror Game)</h3>
                    <p class="work-problem">
                        <strong>Problem Solved:</strong> Designing immersive, responsive third-person movement and dynamic spatial atmosphere in a 3D environment.
                    </p>
                    <ul class="work-features">
                        <li>Custom third-person character movement &amp; collision</li>
                        <li>Dynamic lighting triggers &amp; horror atmosphere design</li>
                        <li>Interactive puzzle mechanisms &amp; sound spatialization</li>
                    </ul>
                    <div class="service-tags">
                        <span class="tag">3D Game Engine</span>
                        <span class="tag">C# / Scripting</span>
                        <span class="tag">3D Design</span>
                        <span class="tag">Interactive</span>
                    </div>
                </div>
                <a class="work-link" href="https://github.com/etnaut?tab=repositories" target="_blank"
                    rel="noopener noreferrer">GitHub Repo <span aria-hidden="true">↗</span></a>
            </article>

            {{-- Project 04 --}}
            <article class="work-item">
                <span class="work-index">04</span>
                <div class="work-body">
                    <h3>Document Flow &amp; Tracking System</h3>
                    <p class="work-problem">
                        <strong>Problem Solved:</strong> Physical document handoffs frequently mislaid files or stalled across multi-department administrative routes.
                    </p>
                    <ul class="work-features">
                        <li>Unique tracking ID &amp; barcode routing</li>
                        <li>Multi-department status timeline &amp; handoff approvals</li>
                        <li>Audit log of document actions and pending approvals</li>
                    </ul>
                    <div class="service-tags">
                        <span class="tag">PHP / Laravel</span>
                        <span class="tag">MySQL</span>
                        <span class="tag">Workflow Automation</span>
                        <span class="tag">REST API</span>
                    </div>
                </div>
                <a class="work-link" href="https://github.com/etnaut?tab=repositories" target="_blank"
                    rel="noopener noreferrer">GitHub Repo <span aria-hidden="true">↗</span></a>
            </article>

            {{-- Project 05 --}}
            <article class="work-item">
                <span class="work-index">05</span>
                <div class="work-body">
                    <h3>Personal Portfolio &amp; Client Hire System</h3>
                    <p class="work-problem">
                        <strong>Problem Solved:</strong> Demonstrating developer technical stack and IT services with custom high-end visuals and working backend attachment handling.
                    </p>
                    <ul class="work-features">
                        <li>Custom 3D pop-out photo card &amp; dark/acid-lime UI theme</li>
                        <li>AJAX contact modal with multi-file attachment support</li>
                        <li>Laravel backend mailer route integration (/contact/send)</li>
                    </ul>
                    <div class="service-tags">
                        <span class="tag">Laravel</span>
                        <span class="tag">Blade</span>
                        <span class="tag">Vanilla CSS</span>
                        <span class="tag">JavaScript</span>
                    </div>
                </div>
                <a class="work-link" href="https://github.com/etnaut?tab=repositories" target="_blank"
                    rel="noopener noreferrer">GitHub Repo <span aria-hidden="true">↗</span></a>
            </article>
        </div>
        <p class="work-footnote reveal">
            More open-source systems and project code live on
            <a href="https://github.com/etnaut?tab=repositories" target="_blank" rel="noopener noreferrer">github.com/etnaut</a>.
        </p>
    </section>

    {{-- Services Section --}}
    <section class="services" id="services">
        <div class="section-header reveal">
            <div>
                <span class="section-label">What I do</span>
                <h2 class="section-title">Services I offer</h2>
            </div>
            <p class="section-desc">
                From building websites to keeping your systems running smoothly —
                I've got you covered end to end.
            </p>
        </div>

        <div class="services-grid reveal">

            {{-- Web Development --}}
            <div class="service-card">
                <div class="service-arrow">↗</div>
                <div class="service-icon">🌐</div>
                <h3>Web Development</h3>
                <p>
                    I design and build responsive, fast, and modern websites and web applications
                    tailored to your goals — from simple landing pages to full-stack systems.
                </p>
                <div class="service-tags">
                    <span class="tag">Laravel/React</span>
                    <span class="tag">HTML / CSS</span>
                    <span class="tag">JavaScript</span>
                    <span class="tag">MySQL</span>
                    <span class="tag">REST APIs</span>
                </div>
            </div>

            {{-- IT / Tech Support --}}
            <div class="service-card">
                <div class="service-arrow">↗</div>
                <div class="service-icon">🖥️</div>
                <h3>IT / Tech Support</h3>
                <p>
                    Reliable technical support for hardware, software, networks, and system
                    troubleshooting. I help individuals and small businesses stay operational.
                </p>
                <div class="service-tags">
                    <span class="tag">Troubleshooting</span>
                    <span class="tag">Network Setup</span>
                    <span class="tag">OS Installation</span>
                    <span class="tag">Maintenance</span>
                </div>
            </div>

        </div>
    </section>

    {{-- Skills --}}
    <section class="skills" id="skills">
        <div class="section-header reveal">
            <div>
                <span class="section-label">Skills &amp; Core Competencies</span>
                <h2 class="section-title">How I work</h2>
            </div>
            <p class="section-desc">
                Two distinct domains, one engineer: architecting full-stack web applications, and ensuring the network &amp; physical hardware beneath remain rock solid.
            </p>
        </div>
        <div class="skills-grid reveal">
            <div class="skill-group">
                <h3><span>🌐</span> Web Development</h3>
                <p>Building functional web apps from frontend layouts down to database queries &amp; APIs.</p>
                <div class="skill-rows">
                    <div class="skill-row">
                        <div class="skill-row-meta">
                            <strong>Laravel &amp; PHP</strong>
                            <span>Full-Stack &amp; MVC</span>
                        </div>
                        <div class="skill-track"><div class="skill-fill" style="width: 88%;"></div></div>
                    </div>
                    <div class="skill-row">
                        <div class="skill-row-meta">
                            <strong>React &amp; JavaScript (ES6+)</strong>
                            <span>Interactive Frontend</span>
                        </div>
                        <div class="skill-track"><div class="skill-fill" style="width: 82%;"></div></div>
                    </div>
                    <div class="skill-row">
                        <div class="skill-row-meta">
                            <strong>MySQL &amp; Relational Databases</strong>
                            <span>Schema &amp; Query Optimization</span>
                        </div>
                        <div class="skill-track"><div class="skill-fill" style="width: 85%;"></div></div>
                    </div>
                    <div class="skill-row">
                        <div class="skill-row-meta">
                            <strong>HTML5, CSS3 &amp; UI Styling</strong>
                            <span>Custom Design &amp; Layouts</span>
                        </div>
                        <div class="skill-track"><div class="skill-fill" style="width: 92%;"></div></div>
                    </div>
                    <div class="skill-row">
                        <div class="skill-row-meta">
                            <strong>REST APIs &amp; Git Version Control</strong>
                            <span>Integrations &amp; Workflows</span>
                        </div>
                        <div class="skill-track"><div class="skill-fill" style="width: 86%;"></div></div>
                    </div>
                </div>
            </div>

            <div class="skill-group">
                <h3><span>🖥️</span> IT Support &amp; Infrastructure</h3>
                <p>Hands-on hardware troubleshooting, networking setup, and system maintenance.</p>
                <div class="skill-rows">
                    <div class="skill-row">
                        <div class="skill-row-meta">
                            <strong>Hardware Diagnostics &amp; Repair</strong>
                            <span>PC Assembly &amp; Troubleshooting</span>
                        </div>
                        <div class="skill-track"><div class="skill-fill" style="width: 90%;"></div></div>
                    </div>
                    <div class="skill-row">
                        <div class="skill-row-meta">
                            <strong>Network Setup &amp; Router Configuration</strong>
                            <span>LAN, Wi-Fi &amp; Cabling</span>
                        </div>
                        <div class="skill-track"><div class="skill-fill" style="width: 85%;"></div></div>
                    </div>
                    <div class="skill-row">
                        <div class="skill-row-meta">
                            <strong>OS Deployment &amp; Administration</strong>
                            <span>Windows Installation &amp; Drivers</span>
                        </div>
                        <div class="skill-track"><div class="skill-fill" style="width: 92%;"></div></div>
                    </div>
                    <div class="skill-row">
                        <div class="skill-row-meta">
                            <strong>System Maintenance &amp; Security</strong>
                            <span>Virus Removal &amp; Optimization</span>
                        </div>
                        <div class="skill-track"><div class="skill-fill" style="width: 88%;"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section class="contact" id="contact">
        <div class="contact-glow"></div>
        <span class="section-label reveal">Let's work together</span>
        <h2 class="reveal">Ready to start a<br><span>project?</span></h2>
        <p class="reveal">
            Whether you need a new website, technical support, or just want to talk —
            feel free to reach out anytime.
        </p>
        <a href="javascript:void(0)" onclick="openContactModal(event)" class="contact-email reveal">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="2" y="4" width="20" height="16" rx="2" />
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
            </svg>
            daryl21t@gmail.com
        </a>
    </section>

    <!-- Contact Email Modal -->
    <div id="contactModal" class="modal">
        <div class="modal-content contact-modal-content">
            <span class="close" onclick="closeContactModal()">&times;</span>

            <div class="contact-modal-header">
                <div class="contact-modal-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="4" width="20" height="16" rx="2" />
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    </svg>
                </div>
                <div>
                    <h2>Send Me an Email</h2>
                    <p>Send a message directly to <strong>daryl21t@gmail.com</strong>.</p>
                </div>
            </div>

            <form id="contactForm" onsubmit="handleContactSubmit(event)" enctype="multipart/form-data">
                <div id="formAlert" class="form-alert" style="display: none;"></div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_name">Your Name <span class="req">*</span></label>
                        <input type="text" id="contact_name" name="name" placeholder="John Doe" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_email">Your Email <span class="req">*</span></label>
                        <input type="email" id="contact_email" name="email" placeholder="john@example.com" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="contact_subject">Subject <span class="req">*</span></label>
                    <input type="text" id="contact_subject" name="subject"
                        placeholder="Project Inquiry / Job Opportunity" required>
                </div>

                <div class="form-group">
                    <label for="contact_message">Message <span class="req">*</span></label>
                    <textarea id="contact_message" name="message" rows="4"
                        placeholder="Hi Daryl, I'd like to discuss a project..." required></textarea>
                </div>

                <div class="form-group">
                    <label>Attach Files (Optional)</label>
                    <div class="file-dropzone" id="dropzone"
                        onclick="document.getElementById('attachment_input').click()">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            <polyline points="17 8 12 3 7 8" />
                            <line x1="12" y1="3" x2="12" y2="15" />
                        </svg>
                        <p>Drag &amp; drop files here, or <span class="browse-link">browse</span></p>
                        <span class="file-hint">PDF, DOCX, TXT, Images, ZIP up to 10MB each</span>
                        <input type="file" id="attachment_input" multiple style="display: none;"
                            onchange="handleFileSelect(event)">
                    </div>
                    <div id="fileList" class="file-list"></div>
                </div>

                <div class="modal-actions">
                    <button type="button" class="btn-cancel" onclick="closeContactModal()">Cancel</button>
                    <button type="submit" id="sendBtn" class="btn-submit">
                        <span id="sendBtnText">Send Email</span>
                        <svg id="sendBtnIcon" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <line x1="22" y1="2" x2="11" y2="13" />
                            <polygon points="22 2 15 22 11 13 2 9 22 2" />
                        </svg>
                        <span id="sendSpinner" class="spinner" style="display: none;"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Viewers & Visitor Insights Modal --}}
    <div id="viewersModal" class="modal" style="display: none;">
        <div class="modal-content viewers-modal-content">
            <div class="modal-header">
                <div>
                    <h3 class="modal-title">👁️ Portfolio Live Viewers &amp; Insights</h3>
                    <p style="font-size: 0.78rem; color: var(--muted); margin-top: 0.2rem;">
                        Real-time visitor counts and location insights.
                    </p>
                </div>
                <button type="button" class="modal-close" onclick="closeViewersModal()">&times;</button>
            </div>

            <div class="viewers-stats-grid">
                <div class="viewers-stat-card">
                    <div class="v-num" id="vTotalViews">1</div>
                    <div class="v-label">Total Page Views</div>
                </div>
                <div class="viewers-stat-card">
                    <div class="v-num" id="vUniqueVisitors">1</div>
                    <div class="v-label">Unique Visitors</div>
                </div>
                <div class="viewers-stat-card">
                    <div class="v-num" id="vActiveOnline">1</div>
                    <div class="v-label">🟢 Online Right Now</div>
                </div>
            </div>

            <div class="viewers-personalizer">
                <label for="visitor_name_input">👤 Personalize Your Visit (Optional Display Name):</label>
                <div class="viewers-name-row">
                    <input type="text" id="visitor_name_input" placeholder="Enter your name or nickname..." maxlength="50">
                    <button type="button" onclick="saveVisitorName()">Save Name</button>
                </div>
                <span id="nameStatusMsg" style="font-size: 0.72rem; color: var(--accent); margin-top: 0.35rem; display: block;"></span>
            </div>

            <div style="margin-bottom: 0.5rem;">
                <h4 style="font-size: 0.85rem; font-family: var(--font-head); color: var(--text); display: flex; align-items: center; justify-content: space-between;">
                    <span>Recent Visitor Activity</span>
                    <span style="font-size: 0.72rem; font-weight: normal; color: var(--muted);" id="lastUpdatedTime">Updated just now</span>
                </h4>
            </div>

            <div class="recent-visitors-list" id="recentVisitorsContainer">
                <div class="visitor-row">
                    <div class="visitor-info">
                        <span class="visitor-flag">📍</span>
                        <div>
                            <strong>Guest (Manila, PH)</strong>
                            <div class="visitor-meta">Desktop • Chrome</div>
                        </div>
                    </div>
                    <span style="color: var(--accent); font-size: 0.75rem;">Online now</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer>
        <p>&copy; {{ date('Y') }} Daryl Tuante Dagpin<span>.</span> All rights reserved.</p>
        <div class="footer-links">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#work">Work</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
            <a href="https://github.com/etnaut" target="_blank" rel="noopener noreferrer">GitHub</a>
        </div>
    </footer>


    <script>
        if ('scrollRestoration' in history) {
            history.scrollRestoration = 'manual';
        }

        const scrollToTop = () => {
            window.scrollTo({ top: 0, left: 0, behavior: 'instant' });
        };

        window.addEventListener('load', () => {
            setTimeout(scrollToTop, 0);
        });

        window.addEventListener('pageshow', (event) => {
            if (event.persisted) {
                scrollToTop();
            }
        });

        // Contact Modal Functions
        let attachedFiles = [];

        function openContactModal(event) {
            if (event) event.preventDefault();
            document.getElementById("contactModal").style.display = "flex";
        }

        function closeContactModal() {
            document.getElementById("contactModal").style.display = "none";
        }

        function handleFileSelect(event) {
            const files = Array.from(event.target.files);
            addFiles(files);
            event.target.value = '';
        }

        function addFiles(files) {
            files.forEach(file => {
                if (file.size > 10 * 1024 * 1024) {
                    showAlert('error', `File "${file.name}" exceeds 10MB limit.`);
                    return;
                }
                if (!attachedFiles.some(f => f.name === file.name && f.size === file.size)) {
                    attachedFiles.push(file);
                }
            });
            renderFileList();
        }

        function removeFile(index) {
            attachedFiles.splice(index, 1);
            renderFileList();
        }

        function renderFileList() {
            const fileListEl = document.getElementById('fileList');
            fileListEl.innerHTML = '';

            attachedFiles.forEach((file, index) => {
                const sizeFormatted = (file.size / (1024 * 1024)).toFixed(2) + ' MB';
                const fileItem = document.createElement('div');
                fileItem.className = 'file-item';
                fileItem.innerHTML = `
            <div class="file-item-info">
                <span>📎</span>
                <span class="file-item-name">${escapeHtml(file.name)}</span>
                <span class="file-item-size">(${sizeFormatted})</span>
            </div>
            <button type="button" class="file-item-remove" onclick="removeFile(${index})">&times;</button>
        `;
                fileListEl.appendChild(fileItem);
            });
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.innerText = text;
            return div.innerHTML;
        }

        // Setup Drag & Drop handlers once DOM is ready
        document.addEventListener('DOMContentLoaded', () => {
            const dropzone = document.getElementById('dropzone');
            if (dropzone) {
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    dropzone.addEventListener(eventName, preventDefaults, false);
                });

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                ['dragenter', 'dragover'].forEach(eventName => {
                    dropzone.addEventListener(eventName, () => dropzone.classList.add('dragover'), false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    dropzone.addEventListener(eventName, () => dropzone.classList.remove('dragover'), false);
                });

                dropzone.addEventListener('drop', (e) => {
                    const dt = e.dataTransfer;
                    const files = Array.from(dt.files);
                    addFiles(files);
                }, false);
            }
        });

        function showAlert(type, message) {
            const alertEl = document.getElementById('formAlert');
            alertEl.className = 'form-alert ' + type;
            alertEl.innerHTML = message;
            alertEl.style.display = 'block';
        }

        function clearAlert() {
            const alertEl = document.getElementById('formAlert');
            alertEl.style.display = 'none';
            alertEl.innerHTML = '';
        }

        async function handleContactSubmit(event) {
            event.preventDefault();
            clearAlert();

            const form = document.getElementById('contactForm');
            const sendBtn = document.getElementById('sendBtn');
            const sendBtnText = document.getElementById('sendBtnText');
            const sendBtnIcon = document.getElementById('sendBtnIcon');
            const sendSpinner = document.getElementById('sendSpinner');

            const formData = new FormData(form);

            attachedFiles.forEach(file => {
                formData.append('attachments[]', file);
            });

            sendBtn.disabled = true;
            sendBtnText.textContent = 'Sending...';
            sendBtnIcon.style.display = 'none';
            sendSpinner.style.display = 'inline-block';

            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const response = await fetch('/contact/send', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    showAlert('success', data.message);
                    form.reset();
                    attachedFiles = [];
                    renderFileList();
                    setTimeout(() => {
                        closeContactModal();
                        clearAlert();
                    }, 3500);
                } else {
                    const errorMsg = data.errors ? data.errors.join('<br>') : (data.message || 'An error occurred while sending email.');
                    showAlert('error', errorMsg);
                }
            } catch (err) {
                console.error(err);
                showAlert('error', 'Network error. Please check your connection and try again.');
            } finally {
                sendBtn.disabled = false;
                sendBtnText.textContent = 'Send Email';
                sendBtnIcon.style.display = 'inline-block';
                sendSpinner.style.display = 'none';
            }
        }

        // close when clicking outside modal
        window.addEventListener("click", function (event) {
            const contactModal = document.getElementById("contactModal");
            const viewersModal = document.getElementById("viewersModal");
            if (event.target === contactModal) {
                closeContactModal();
            }
            if (event.target === viewersModal) {
                closeViewersModal();
            }
        });

        // Viewers Modal Functions
        function openViewersModal(event) {
            if (event) event.preventDefault();
            document.getElementById("viewersModal").style.display = "flex";
            fetchViewersData();
        }

        function closeViewersModal() {
            document.getElementById("viewersModal").style.display = "none";
        }

        async function fetchViewersData() {
            try {
                const response = await fetch('/api/viewers');
                const data = await response.json();

                if (data.success) {
                    document.getElementById('vTotalViews').textContent = data.total_views.toLocaleString();
                    document.getElementById('vUniqueVisitors').textContent = data.unique_visitors.toLocaleString();
                    document.getElementById('vActiveOnline').textContent = data.active_online;

                    // Update Nav & Hero badges
                    const navBadge = document.getElementById('navViewersBadge');
                    if (navBadge) navBadge.textContent = data.active_online + ' Live';

                    const heroViews = document.getElementById('heroViewsNum');
                    if (heroViews) heroViews.innerHTML = data.total_views.toLocaleString() + '<span>+</span>';

                    // Update Recent Visitors Container
                    const container = document.getElementById('recentVisitorsContainer');
                    container.innerHTML = '';

                    if (data.recent_visitors && data.recent_visitors.length > 0) {
                        data.recent_visitors.forEach(v => {
                            const row = document.createElement('div');
                            row.className = 'visitor-row';
                            const isCurrent = data.current_visitor && (data.current_visitor.display_name === v.display_name);

                            row.innerHTML = `
                                <div class="visitor-info">
                                    <span class="visitor-flag">📍</span>
                                    <div>
                                        <strong>${escapeHtml(v.display_name)} ${isCurrent ? '<span style="color:var(--accent); font-size:0.7rem;">(You)</span>' : ''}</strong>
                                        <div class="visitor-meta">${escapeHtml(v.city)}, ${escapeHtml(v.country)} • ${escapeHtml(v.device)} (${escapeHtml(v.browser)})</div>
                                    </div>
                                </div>
                                <span style="color: ${v.is_online ? 'var(--accent)' : 'var(--muted)'}; font-size: 0.75rem;">
                                    ${v.is_online ? '🟢 Online now' : escapeHtml(v.last_seen)}
                                </span>
                            `;
                            container.appendChild(row);
                        });
                    }

                    if (data.current_visitor && data.current_visitor.display_name) {
                        const input = document.getElementById('visitor_name_input');
                        if (input && !input.value) input.value = data.current_visitor.display_name;
                    }

                    const updatedEl = document.getElementById('lastUpdatedTime');
                    if (updatedEl) updatedEl.textContent = 'Updated ' + new Date().toLocaleTimeString();
                }
            } catch (err) {
                console.error('Failed to fetch viewers data:', err);
            }
        }

        async function saveVisitorName() {
            const input = document.getElementById('visitor_name_input');
            const status = document.getElementById('nameStatusMsg');
            const name = input ? input.value.trim() : '';

            if (!name) return;

            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const response = await fetch('/api/viewers/set-name', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ name: name })
                });

                const data = await response.json();
                if (data.success) {
                    if (status) {
                        status.textContent = '✓ Saved! Hello, ' + escapeHtml(data.name) + '!';
                        setTimeout(() => { status.textContent = ''; }, 3500);
                    }
                    fetchViewersData();
                }
            } catch (err) {
                console.error(err);
                if (status) status.textContent = 'Failed to save name.';
            }
        }

        // Periodic heartbeat ping to keep active viewer count accurate
        setInterval(async () => {
            try {
                const csrfMeta = document.querySelector('meta[name="csrf-token"]');
                if (!csrfMeta) return;
                const csrfToken = csrfMeta.getAttribute('content');
                const res = await fetch('/api/viewers/ping', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                });
                const data = await res.json();
                if (data.success) {
                    const navBadge = document.getElementById('navViewersBadge');
                    if (navBadge) navBadge.textContent = data.active_online + ' Live';
                }
            } catch (e) {}
        }, 30000);

        // Fetch viewers stats on DOM ready
        document.addEventListener('DOMContentLoaded', () => {
            fetchViewersData();
        });

        const reveals = document.querySelectorAll('.reveal');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                } else {
                    entry.target.classList.remove('visible');
                }
            });
        }, { threshold: 0.1 });

        reveals.forEach(el => observer.observe(el));

        // Mobile navigation toggle
        const navToggle = document.querySelector('.nav-toggle');
        const navLinks = document.querySelector('.nav-links');

        if (navToggle && navLinks) {
            navToggle.addEventListener('click', () => {
                const isOpen = navLinks.classList.toggle('open');
                navToggle.classList.toggle('open', isOpen);
                navToggle.setAttribute('aria-expanded', isOpen);
            });

            navLinks.querySelectorAll('a').forEach((link) => {
                link.addEventListener('click', () => {
                    navLinks.classList.remove('open');
                    navToggle.classList.remove('open');
                    navToggle.setAttribute('aria-expanded', 'false');
                });
            });

            window.addEventListener('click', function (event) {
                if (!navToggle.contains(event.target) && !navLinks.contains(event.target)) {
                    navLinks.classList.remove('open');
                    navToggle.classList.remove('open');
                    navToggle.setAttribute('aria-expanded', 'false');
                }
            });
    <!-- Firebase Realtime Database SDK -->
    <script src="https://www.gstatic.com/firebasejs/10.8.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.8.0/firebase-database-compat.js"></script>

    <script>
        // Firebase Realtime Database Setup for /portfolio_visitors
        const firebaseConfig = {
            databaseURL: "https://sql-practical-exam-default-rtdb.asia-southeast1.firebasedatabase.app/"
        };
        if (typeof firebase !== 'undefined' && !firebase.apps.length) {
            firebase.initializeApp(firebaseConfig);
        }
        const rtdb = (typeof firebase !== 'undefined' && firebase.database) ? firebase.database() : null;

        if (rtdb) {
            // Realtime Listener for Total Views
            rtdb.ref('portfolio_visitors/stats/total_views').on('value', (snapshot) => {
                const totalViews = snapshot.val();
                if (totalViews) {
                    const vEl = document.getElementById('vTotalViews');
                    if (vEl) vEl.textContent = Number(totalViews).toLocaleString();
                    const heroEl = document.getElementById('heroViewsNum');
                    if (heroEl) heroEl.innerHTML = Number(totalViews).toLocaleString() + '<span>+</span>';
                }
            });

            // Realtime Listener for Active Sessions & Live Viewers
            rtdb.ref('portfolio_visitors/active_sessions').on('value', (snapshot) => {
                const data = snapshot.val() || {};
                const nowMs = Date.now();
                const fiveMinsMs = 5 * 60 * 1000;

                let liveCount = 0;
                const visitorsList = [];

                Object.values(data).forEach(session => {
                    const lastAct = session.last_activity_at || 0;
                    const isOnline = (nowMs - lastAct <= fiveMinsMs);
                    if (isOnline) liveCount++;
                    visitorsList.push({
                        ...session,
                        is_online: isOnline,
                        last_seen: isOnline ? '🟢 Online now' : timeAgo(lastAct)
                    });
                });

                if (liveCount < 1) liveCount = 1;

                const navBadge = document.getElementById('navViewersBadge');
                if (navBadge) navBadge.textContent = liveCount + ' Live';

                const onlineEl = document.getElementById('vActiveOnline');
                if (onlineEl) onlineEl.textContent = liveCount;

                visitorsList.sort((a, b) => (b.last_activity_at || 0) - (a.last_activity_at || 0));
                renderFirebaseVisitors(visitorsList.slice(0, 10));
            });
        }

        function timeAgo(timestampMs) {
            if (!timestampMs) return 'Just now';
            const diffSec = Math.floor((Date.now() - timestampMs) / 1000);
            if (diffSec < 60) return 'Just now';
            if (diffSec < 3600) return Math.floor(diffSec / 60) + 'm ago';
            if (diffSec < 86400) return Math.floor(diffSec / 3600) + 'h ago';
            return Math.floor(diffSec / 86400) + 'd ago';
        }

        function renderFirebaseVisitors(visitors) {
            const container = document.getElementById('recentVisitorsContainer');
            if (!container) return;
            container.innerHTML = '';

            visitors.forEach(v => {
                const row = document.createElement('div');
                row.className = 'visitor-row';

                row.innerHTML = `
                    <div class="visitor-info">
                        <span class="visitor-flag">📍</span>
                        <div>
                            <strong>${escapeHtml(v.display_name || 'Guest')}</strong>
                            <div class="visitor-meta">${escapeHtml(v.city || 'Manila')}, ${escapeHtml(v.country || 'Philippines')} • ${escapeHtml(v.device || 'Desktop')} (${escapeHtml(v.browser || 'Browser')})</div>
                        </div>
                    </div>
                    <span style="color: ${v.is_online ? 'var(--accent)' : 'var(--muted)'}; font-size: 0.75rem;">
                        ${v.is_online ? '🟢 Online now' : escapeHtml(v.last_seen)}
                    </span>
                `;
                container.appendChild(row);
            });
        }
    </script>


</body>

</html>