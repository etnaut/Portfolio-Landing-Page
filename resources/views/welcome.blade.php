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
                max-height: 320px;
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
            perspective: 1600px;
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
            transition: transform 0.5s cubic-bezier(0.34, 1.3, 0.64, 1),
                box-shadow 0.5s ease;
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
            transition: transform 0.5s cubic-bezier(0.34, 1.3, 0.64, 1);
            transform-style: preserve-3d;
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
            transition: box-shadow 0.5s ease;
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
            transform: translateX(-50%) translateY(30px) translateZ(0);
            width: 120%;
            height: 120%;
            object-fit: cover;
            object-position: top;
            z-index: 5;
            pointer-events: none;
            opacity: 0;
            transition: transform 0.5s cubic-bezier(0.34, 1.4, 0.64, 1),
                filter 0.5s ease,
                opacity 0.35s ease;
            filter: drop-shadow(0 -10px 20px rgba(232, 255, 71, 0.1)) drop-shadow(0 15px 30px rgba(0, 0, 0, 0.7));
            transform-origin: bottom center;
        }

        .card-wrap:hover .card-front-character {
            transform: translateX(-50%) translateY(-45px) translateZ(50px) rotateX(1deg);
            opacity: 1;
            filter: drop-shadow(0 -20px 40px rgba(232, 255, 71, 0.2)) drop-shadow(0 25px 50px rgba(0, 0, 0, 0.9));
        }

        .card-wrap:hover .card-back {
            transform: rotate(-6deg) translateX(-18px) translateY(10px) scale(0.98);
        }

        .card-wrap:hover .card-back-img {
            filter: brightness(0.6);
        }

        .card-wrap:hover .card-front {
            transform: translateY(-20px) rotateX(8deg) rotateY(-3deg);
        }

        .card-wrap:hover .card-front-frame {
            box-shadow: 0 35px 80px rgba(0, 0, 0, 0.7),
                0 0 40px rgba(232, 255, 71, 0.1);
        }

        .card-wrap:hover .card-glow {
            opacity: 1;
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
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
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
                    <a href="#services" class="btn-primary">
                        View Services
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

            <div class="stat-item" onclick="openProjectsModal()" style="cursor: pointer;">
                <div class="stat-num">5<span>+</span></div>
                <div class="stat-label">Projects Done</div>
                <div class="stat-tooltip">Includes web apps, games, and system development projects.</div>
            </div>

            <div class="stat-item">
                <div class="stat-num">100<span>%</span></div>
                <div class="stat-label">Client Satisfaction</div>
                <div class="stat-tooltip">All feedback received from school and personal clients.</div>
            </div>

        </div>
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

    <!-- Projects Modal -->
    <div id="projectsModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeProjectsModal()">&times;</span>

            <h2>My Projects</h2>

            <ul>
                <li><i class="bi bi-laptop"></i> Barangay Information System</li>
                <li><i class="bi bi-cash"></i> Pharmacy POS Management System</li>
                <li><i class="bi bi-controller"></i> Takipsilim Third Person Horror Game</li>
                <li><i class="bi bi-diagram-3"></i> Document Flow and Tracking System</li>
                <li><i class="bi bi-globe"></i> Laravel Landing Page</li>
            </ul>

            <div style="margin-top: 1.5rem; text-align: center;">
                <a href="https://github.com/etnaut?tab=repositories" target="_blank" rel="noopener noreferrer"
                    class="btn-primary"
                    style="display: inline-flex; align-items: center; gap: 0.5rem; justify-content: center; width: 100%; text-decoration: none;">
                    <i class="bi bi-github"></i> View Repositories
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                        <polyline points="15 3 21 3 21 9" />
                        <line x1="10" y1="14" x2="21" y2="3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

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

    {{-- Footer --}}
    <footer>
        <p>&copy; {{ date('Y') }} Daryl Tuante Dagpin<span>.</span> All rights reserved.</p>
        <div class="footer-links">
            <a href="#home">Home</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
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

        function openProjectsModal() {
            document.getElementById("projectsModal").style.display = "flex";
        }

        function closeProjectsModal() {
            document.getElementById("projectsModal").style.display = "none";
        }

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
            const projectsModal = document.getElementById("projectsModal");
            const contactModal = document.getElementById("contactModal");
            if (event.target === projectsModal) {
                projectsModal.style.display = "none";
            }
            if (event.target === contactModal) {
                closeContactModal();
            }
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

            window.addEventListener('click', function (event) {
                if (!navToggle.contains(event.target) && !navLinks.contains(event.target)) {
                    navLinks.classList.remove('open');
                    navToggle.classList.remove('open');
                    navToggle.setAttribute('aria-expanded', 'false');
                }
            });
        }
    </script>


</body>

</html>