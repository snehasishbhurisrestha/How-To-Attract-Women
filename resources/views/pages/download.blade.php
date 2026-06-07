<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us — HOW TO ATTRACT WOMEN</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Bebas+Neue&family=DM+Sans:wght@300;400;500&family=Rajdhani:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        .dl-btn{
            display: inline-flex;
            align-items: center;
            gap: .75rem;
            background: var(--yellow);
            color: var(--black);
            font-family: 'Oswald', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            padding: .95rem 2.5rem;
            border-radius: 3px;
            text-decoration: none;
            letter-spacing: .1em;
            text-transform: uppercase;
            transition: background .2s, transform .2s
        }
        .dl-btn:hover {
            background: rgb(62, 155, 62);
            color: var(--white);
            transform: translateY(-3px) scale(1.02)
        }

        .dl-btn-icon {
            font-size: 1.3rem;
            animation: bounce 1.2s ease-in-out infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(5px)
            }
        }

        .dl-note {
            font-size: .74rem;
            color: var(--white3);
            margin-bottom: 1.8rem
        }

        .down-arrow {
            display: inline-block;
            font-size: 24px;
            /* increase size */
            font-weight: 300;
            color: var(--yellow);

            text-shadow:
                0 0 8px rgba(255, 215, 0, 0.5),
                0 0 16px rgba(255, 215, 0, 0.3);

            animation: bounce 1.5s ease-in-out infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(6px);
            }
        }

        #particle-canvas {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            opacity: 0.22
        }

        .ambient {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            background: radial-gradient(ellipse 60% 50% at 0% 0%, rgba(255, 215, 0, .05) 0%, transparent 60%),
                radial-gradient(ellipse 50% 60% at 100% 100%, rgba(255, 215, 0, .04) 0%, transparent 60%);
        }

        /* HEADER */
        header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(10, 10, 10, .95);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 215, 0, .18);
            padding: 0 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 66px;
            animation: slideDown .6s ease;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0
            }

            to {
                transform: translateY(0);
                opacity: 1
            }
        }

        .logo {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.6rem;
            letter-spacing: .08em;
            background: linear-gradient(135deg, var(--yellow), var(--yellow3));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
        }

        .back-btn {
            font-family: 'Rajdhani', sans-serif;
            font-size: .85rem;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--white3);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: .4rem;
            padding: .4rem .85rem;
            border: 1px solid rgba(255, 215, 0, .2);
            border-radius: 3px;
            transition: color .25s, border-color .25s;
        }

        .back-btn:hover {
            color: var(--yellow);
            border-color: rgba(255, 215, 0, .5)
        }

        /* HERO */
        .pp-hero {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 5rem 1.5rem 3.5rem;
            overflow: hidden;
        }

        .pp-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            pointer-events: none;
            background: radial-gradient(ellipse 70% 55% at 50% 0%, rgba(255, 215, 0, .07) 0%, transparent 70%);
        }

        .pp-hero-label {
            font-family: 'Rajdhani', sans-serif;
            font-size: .75rem;
            letter-spacing: .25em;
            text-transform: uppercase;
            color: var(--yellow);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: .6rem;
            margin-bottom: 1rem;
            opacity: 0;
            animation: fadeUp .6s ease .1s forwards;
        }

        .pp-hero-label::before,
        .pp-hero-label::after {
            content: '';
            width: 28px;
            height: 1.5px;
            background: var(--yellow);
            display: inline-block
        }

        .pp-hero h1 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(2.8rem, 6vw, 4.2rem);
            letter-spacing: .04em;
            line-height: 1.0;
            color: var(--white);
            opacity: 0;
            animation: fadeUp .6s ease .2s forwards;
        }

        .pp-hero h1 span {
            color: var(--yellow)
        }

        .pp-hero-meta {
            font-size: .9rem;
            color: var(--white3);
            margin-top: 1.1rem;
            letter-spacing: .04em;
            max-width: 540px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.75;
            opacity: 0;
            animation: fadeUp .6s ease .32s forwards;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(18px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        /* DIVIDER */
        .gold-divider {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            padding: 0 1.5rem 3.5rem;
        }

        .gold-divider::before,
        .gold-divider::after {
            content: '';
            flex: 1;
            max-width: 300px;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 215, 0, .35), transparent);
        }

        .gold-divider span {
            font-size: .75rem;
            color: var(--yellow);
            letter-spacing: .2em
        }

        /* WRAP */
        .pp-wrap {
            position: relative;
            z-index: 1;
            max-width: 760px;
            margin: 0 auto;
            padding: 0 1.5rem 6rem
        }

        /* CARD */
        .pp-card {
            background: var(--black3);
            border: 1px solid rgba(255, 215, 0, .13);
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            opacity: 0;
            transform: translateY(22px);
            transition: opacity .6s ease, transform .6s ease, border-color .3s, box-shadow .3s;
        }

        .pp-card+.pp-card {
            margin-top: 1rem
        }

        .pp-card.visible {
            opacity: 1;
            transform: translateY(0)
        }

        .pp-card:hover {
            border-color: rgba(255, 215, 0, .28);
            box-shadow: 0 8px 40px rgba(255, 215, 0, .06)
        }

        .pp-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--yellow), transparent);
            opacity: 0;
            transition: opacity .3s;
        }

        .pp-card:hover::before {
            opacity: 1
        }

        /* SECTION HEADER */
        .pp-sec-head {
            display: flex;
            align-items: center;
            gap: .9rem;
            padding: 1.3rem 1.8rem;
            border-bottom: 1px solid rgba(255, 215, 0, .07);
        }

        .pp-sec-icon {
            width: 36px;
            height: 36px;
            border-radius: 6px;
            background: rgba(255, 215, 0, .08);
            border: 1px solid rgba(255, 215, 0, .18);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            flex-shrink: 0;
            transition: background .3s, transform .3s;
        }

        .pp-card:hover .pp-sec-icon {
            background: rgba(255, 215, 0, .16);
            transform: scale(1.08) rotate(-4deg)
        }

        .pp-sec-title {
            font-family: 'Oswald', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: .05em;
            text-transform: uppercase;
            color: var(--white);
        }

        /* BODY */
        .pp-sec-body {
            padding: 1.4rem 1.8rem
        }

        .pp-sec-body p {
            font-size: .875rem;
            color: var(--white3);
            line-height: 1.85;
            margin-bottom: .9rem
        }

        .pp-sec-body p:last-child {
            margin-bottom: 0
        }

        .pp-sec-body strong {
            color: var(--white2);
            font-weight: 500
        }

        .pp-sec-body a {
            color: var(--yellow);
            text-decoration: none
        }

        .pp-sec-body a:hover {
            text-decoration: underline
        }

        /* CONTACT INFO ROW */
        .contact-info-row {
            display: flex;
            flex-direction: column;
            gap: .9rem;
            margin-top: .4rem;
        }

        .contact-info-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: rgba(255, 215, 0, .04);
            border: 1px solid rgba(255, 215, 0, .1);
            border-radius: 6px;
            padding: .9rem 1.1rem;
            transition: background .3s, border-color .3s;
        }

        .contact-info-item:hover {
            background: rgba(255, 215, 0, .08);
            border-color: rgba(255, 215, 0, .25)
        }

        .ci-icon {
            width: 36px;
            height: 36px;
            border-radius: 6px;
            background: rgba(255, 215, 0, .1);
            border: 1px solid rgba(255, 215, 0, .2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .95rem;
            flex-shrink: 0;
        }

        .ci-label {
            font-family: 'Rajdhani', sans-serif;
            font-size: .7rem;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--yellow);
            font-weight: 600;
            margin-bottom: .15rem;
        }

        .ci-value {
            font-size: .875rem;
            color: var(--white2);
            font-weight: 500
        }

        .ci-value a {
            color: var(--white2);
            text-decoration: none;
            transition: color .2s
        }

        .ci-value a:hover {
            color: var(--yellow)
        }

        /* RESPONSE TIME BADGE */
        .response-badge {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            background: rgba(255, 215, 0, .07);
            border: 1px solid rgba(255, 215, 0, .2);
            border-radius: 20px;
            padding: .45rem 1rem;
            font-family: 'Rajdhani', sans-serif;
            font-size: .78rem;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: var(--yellow);
            font-weight: 600;
            margin-top: 1rem;
        }

        .response-badge::before {
            content: '⏱';
            font-size: .85rem
        }

        /* CONTACT CTA */
        .contact-card {
            background: var(--black3);
            border: 1.5px solid rgba(255, 215, 0, .3);
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            margin-top: 1rem;
            position: relative;
            overflow: hidden;
            opacity: 0;
            transform: translateY(22px);
            transition: opacity .6s ease, transform .6s ease;
        }

        .contact-card.visible {
            opacity: 1;
            transform: translateY(0)
        }

        .contact-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--yellow), var(--yellow3), var(--yellow2), var(--yellow));
            background-size: 300% 100%;
            animation: rainbowBar 2.5s linear infinite;
        }

        @keyframes rainbowBar {
            from {
                background-position: 0%
            }

            to {
                background-position: 300%
            }
        }

        .contact-card h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.55rem;
            letter-spacing: .05em;
            color: var(--white);
            margin-bottom: .5rem;
        }

        .contact-card p {
            font-size: .84rem;
            color: var(--white3);
            line-height: 1.75;
            margin-bottom: 1.3rem
        }

        .contact-btn {
            display: inline-flex;
            align-items: center;
            gap: .55rem;
            background: var(--yellow);
            color: var(--black);
            font-family: 'Oswald', sans-serif;
            font-size: .88rem;
            font-weight: 700;
            padding: .75rem 1.8rem;
            border-radius: 3px;
            text-decoration: none;
            letter-spacing: .08em;
            text-transform: uppercase;
            transition: background .2s, transform .2s, box-shadow .2s;
        }

        .contact-btn:hover {
            background: var(--yellow3);
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(255, 215, 0, .35)
        }

        /* FOOTER */
        footer {
            position: relative;
            z-index: 1;
            background: var(--black2);
            border-top: 1px solid rgba(255, 215, 0, .15);
            color: rgba(255, 255, 255, .6);
            text-align: center;
            padding: 3rem 2rem 2rem;
        }

        .footer-logo {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.8rem;
            letter-spacing: .1em;
            color: var(--yellow);
            margin-bottom: .4rem;
            text-shadow: 0 0 20px rgba(255, 215, 0, .3)
        }

        .footer-tagline {
            font-size: .9rem;
            color: var(--white3);
            margin-bottom: 1.5rem;
            letter-spacing: .04em
        }

        .footer-links {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap
        }

        .footer-links a {
            color: rgba(255, 255, 255, .45);
            text-decoration: none;
            font-family: 'Rajdhani', sans-serif;
            font-size: .82rem;
            letter-spacing: .06em;
            text-transform: uppercase;
            transition: color .2s
        }

        .footer-links a:hover,
        .footer-links a.active {
            color: var(--yellow)
        }

        .footer-copy {
            font-size: .74rem;
            opacity: .35
        }

        /* MOBILE */
        @media (max-width: 640px) {
            header {
                padding: 0 1.2rem
            }

            .logo {
                font-size: 1.05rem
            }

            .pp-hero {
                padding: 3.5rem 1.2rem 2.5rem
            }

            .pp-wrap {
                padding: 0 1rem 4rem
            }

            .pp-sec-head {
                padding: 1.1rem 1.2rem
            }

            .pp-sec-body {
                padding: 1.1rem 1.2rem 1.4rem
            }

            .contact-card {
                padding: 1.5rem 1.2rem
            }
        }
    </style>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        :root {
            --black: #0A0A0A;
            --black2: #111111;
            --black3: #1A1A1A;
            --black4: #242424;
            --yellow: #FFD700;
            --yellow2: #FFC200;
            --yellow3: #FFE566;
            --yellow-dim: #B8960C;
            --white: #FFFFFF;
            --white2: #E8E8E8;
            --white3: #AAAAAA;
            --gold: #C9A96E;
            --red: #E53935;
            --accent: #FFD700;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden
        }

        html {
            scroll-behavior: smooth
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--black);
            /* color: var(--white); */
            overflow-x: hidden
        }

        .limited-offer-banner {
            background-color: #FFD200;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 102;
            display: flex;
            padding: .65rem 1rem;
            align-items: center;
            justify-content: space-between;
        }

        .limited-offer-banner .text {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.2rem;
            letter-spacing: .05em;
            font-weight: 800;
            color: black;
            shadow: 0 0 20px rgba(231, 225, 200, 0.5);
        }

        .limited-offer-banner .button {
            background-color: black;
            color: #FFD200;
            font-family: 'Oswald', sans-serif;
            font-size: 0.89rem;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            letter-spacing: .1em;
            text-transform: uppercase;
            transition: background .2s, transform .2s;

        }

        /* ── HAMBURGER BUTTON ── */
        .menu_btn {
            display: none;
            background: none;
            border: 2px solid var(--yellow);
            color: var(--yellow);
            font-size: 1.4rem;
            width: 42px;
            height: 42px;
            border-radius: 4px;
            cursor: pointer;
            z-index: 200;
            transition: background .3s, color .3s;
            align-items: center;
            justify-content: center;
        }

        .menu_btn.active {
            background: var(--yellow);
            color: var(--black);
        }

        /* ── PARTICLES ── */
        #particle-canvas {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            opacity: 0.35
        }

        /* ── AMBIENT ── */
        .ambient {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            background:
                radial-gradient(ellipse 60% 50% at 0% 0%, rgba(255, 215, 0, 0.06) 0%, transparent 60%),
                radial-gradient(ellipse 50% 60% at 100% 100%, rgba(255, 215, 0, 0.05) 0%, transparent 60%),
                radial-gradient(ellipse 40% 40% at 50% 50%, rgba(229, 57, 53, 0.04) 0%, transparent 60%)
        }

        /* ── TIMER BANNER ── */
        .timer-banner {
            width: 100%;
            background: var(--yellow);
            color: var(--black);
            text-align: center;
            padding: .65rem 1rem;
            font-size: .82rem;
            letter-spacing: .05em;
            font-weight: 600;
            position: fixed;
            z-index: 101;
            animation: bannerPulse 2s ease-in-out infinite alternate
        }

        @keyframes bannerPulse {
            from {
                background: var(--yellow)
            }

            to {
                background: var(--yellow2)
            }
        }

        .countdown {
            display: inline-flex;
            gap: .3rem;
            margin: 0 .5rem;
            align-items: center
        }

        .cnt-unit {
            background: rgba(0, 0, 0, .18);
            border-radius: 5px;
            padding: 2px 8px;
            font-family: 'Oswald', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--black);
            animation: pulse-cnt 1s ease-in-out infinite alternate
        }

        @keyframes pulse-cnt {
            from {
                transform: scale(1)
            }

            to {
                transform: scale(1.08)
            }
        }

        /* ── HEADER ── */
        header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(10, 10, 10, .95);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 215, 0, .18);
            padding: 0 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 66px;
            animation: slideDown .6s ease
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0
            }

            to {
                transform: translateY(0);
                opacity: 1
            }
        }

        .logo {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.6rem;
            letter-spacing: .08em;
            background: linear-gradient(135deg, var(--yellow), var(--yellow3));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text
        }

        /* ── NAV ── */
        nav a {
            font-family: 'Rajdhani', sans-serif;
            font-size: .9rem;
            font-weight: 600;
            color: var(--white3);
            text-decoration: none;
            margin-left: 2rem;
            letter-spacing: .06em;
            text-transform: uppercase;
            position: relative;
            padding-bottom: 3px;
            transition: color .25s
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--yellow);
            transition: width .3s ease
        }

        nav a:hover {
            color: var(--yellow)
        }

        nav a:hover::after {
            width: 100%
        }

        /* ── BRUSH DIVIDER ── */
        .brush-divider {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 1.5rem 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem
        }

        .brush-divider::before,
        .brush-divider::after {
            content: '';
            flex: 1;
            max-width: 220px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--yellow), transparent)
        }

        .brush-divider span {
            font-family: 'Bebas Neue', sans-serif;
            font-size: .85rem;
            letter-spacing: .3rem;
            color: var(--yellow);
            animation: starSpin 4s linear infinite
        }

        @keyframes starSpin {

            0%,
            100% {
                transform: rotate(0deg) scale(1)
            }

            50% {
                transform: rotate(180deg) scale(1.2)
            }
        }

        /* ── HERO ── */
        .hero {
            width: 100%;
            position: relative;
            z-index: 1;
            text-align: center;
            overflow: hidden
        }

        .hero-img-wrap {
            position: relative;
            width: 100%;
            line-height: 0;
            padding: 1rem 18rem
        }


        .hero-img-wrap img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 20px;
            box-shadow: 0 0 40px rgba(160, 140, 26, 0.8);
            object-fit: cover
        }

        .hero-content {
            background: var(--black);
            padding: 2.5rem 1.5rem 3.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem
        }

        .hero-content a {
            text-decoration: none;
            background: var(--accent)
        }

        /* ── CTA ── */
        .hero-cta {
            display: inline-flex;
            align-items: center;
            gap: .8rem;
            background: var(--yellow);
            color: var(--black);
            font-family: 'Oswald', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            padding: 1.05rem 3rem;
            border-radius: 3px;
            text-decoration: none;
            letter-spacing: .1em;
            text-transform: uppercase;
            animation: ctaGlow 2s ease infinite;
            transition: background .2s, transform .2s;
        }

        @keyframes ctaGlow {

            0%,
            100% {
                box-shadow: 0 4px 24px rgba(255, 215, 0, .35)
            }

            50% {
                box-shadow: 0 8px 50px rgba(255, 215, 0, .7), 0 0 0 14px rgba(255, 215, 0, 0)
            }
        }

        .hero-cta:hover {
            background: var(--yellow3);
            transform: translateY(-3px) scale(1.03)
        }

        .hero-cta .arrow {
            font-size: 1.25rem;
            animation: arrowBounce 1s ease infinite
        }

        @keyframes arrowBounce {

            0%,
            100% {
                transform: translateX(0)
            }

            50% {
                transform: translateX(7px)
            }
        }

        /* ── EARNINGS CARD ── */
        .earnings-card {
            display: inline-block;
            background: var(--black3);
            border: 1.5px solid rgba(255, 215, 0, .3);
            border-radius: 6px;
            padding: 1.5rem 3rem;
            box-shadow: 0 0 40px rgba(255, 215, 0, .08), inset 0 0 40px rgba(255, 215, 0, .03);
            position: relative;
            transition: transform .3s, box-shadow .3s
        }

        .earnings-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 60px rgba(255, 215, 0, .18)
        }

        .earnings-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--yellow), transparent)
        }

        .earnings-label {
            font-family: 'Rajdhani', sans-serif;
            font-size: .75rem;
            color: var(--white3);
            letter-spacing: .12em;
            text-transform: uppercase;
            margin-bottom: .5rem
        }

        .earnings-num {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.8rem;
            letter-spacing: .04em;
            color: var(--yellow);
            text-shadow: 0 0 30px rgba(255, 215, 0, .5)
        }

        .earnings-sub {
            font-size: .78rem;
            color: var(--white3);
            margin-top: .3rem
        }

        /* ── SECTION ── */
        section {
            position: relative;
            z-index: 1;
            max-width: 920px;
            margin: 0 auto;
            padding: 3rem 1rem
        }

        .section-label {
            font-family: 'Rajdhani', sans-serif;
            font-size: .75rem;
            letter-spacing: .2em;
            text-transform: uppercase;
            color: var(--yellow);
            font-weight: 600;
            margin-bottom: .6rem;
            display: flex;
            align-items: center;
            gap: .6rem
        }

        .section-label::before {
            content: '';
            width: 30px;
            height: 2px;
            background: var(--yellow);
            display: inline-block
        }

        .section-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(2.2rem, 4vw, 3.2rem);
            letter-spacing: .03em;
            color: var(--white);
            margin-bottom: .8rem;
            line-height: 1.05
        }

        .section-title .yellow {
            color: var(--yellow)
        }

        .section-sub {
            font-size: .93rem;
            color: var(--white3);
            max-width: 520px;
            line-height: 1.75;
            margin-bottom: 2.8rem
        }

        /* ── REVEAL ── */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity .7s ease, transform .7s ease
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0)
        }

        .reveal-left {
            opacity: 0;
            transform: translateX(-40px);
            transition: opacity .7s ease, transform .7s ease
        }

        .reveal-left.visible {
            opacity: 1;
            transform: translateX(0)
        }

        .reveal-right {
            opacity: 0;
            transform: translateX(40px);
            transition: opacity .7s ease, transform .7s ease
        }

        .reveal-right.visible {
            opacity: 1;
            transform: translateX(0)
        }

        /* ── STATS ── */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 1rem;
            max-width: 920px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 1
        }

        .stat-card {
            background: var(--black3);
            border: 1px solid rgba(255, 215, 0, .18);
            border-radius: 6px;
            padding: 1rem 1rem;
            text-align: center;
            transition: transform .3s, box-shadow .3s;
            position: relative;
            overflow: hidden
        }

        .stat-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 215, 0, .04) 0%, transparent 60%);
            opacity: 0;
            transition: opacity .3s
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--yellow);
            transform: scaleX(0);
            transition: transform .4s ease;
            transform-origin: left
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 40px rgba(255, 215, 0, .12)
        }

        .stat-card:hover::before {
            opacity: 1
        }

        .stat-card:hover::after {
            transform: scaleX(1)
        }

        .stat-num {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2rem;
            letter-spacing: .04em;
            color: var(--yellow);
            text-shadow: 0 0 20px rgba(255, 215, 0, .3)
        }

        .stat-lbl {
            font-family: 'Rajdhani', sans-serif;
            font-size: .74rem;
            color: var(--white3);
            text-transform: uppercase;
            letter-spacing: .1em;
            margin-top: .2rem
        }

        /* ── LEARN GRID ── */
        .learn-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.2rem
        }

        .learn-card {
            background: var(--black3);
            border: 1px solid rgba(255, 215, 0, .12);
            border-radius: 8px;
            padding: 0.58rem 1rem;
            transform: uppercase;
            position: relative;
            overflow: hidden;
            transition: transform .35s cubic-bezier(.34, 1.56, .64, 1), box-shadow .35s, border-color .3s
        }

        .learn-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--yellow), transparent);
            transform: scaleX(0);
            transition: transform .4s ease
        }

        .learn-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 50px rgba(255, 215, 0, .1);
            border-color: rgba(255, 215, 0, .4)
        }

        .learn-card:hover::before {
            transform: scaleX(1)
        }

        .learn-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 215, 0, .1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            margin-bottom: 1.1rem;
            border: 1px solid rgba(255, 215, 0, .2);
            transition: transform .3s, background .3s, box-shadow .3s
        }

        .learn-card:hover .learn-icon {
            transform: scale(1.2) rotate(-5deg);
            background: rgba(255, 215, 0, .2);
            box-shadow: 0 0 20px rgba(255, 215, 0, .2)
        }

        .learn-title {
            font-family: 'Oswald', sans-serif;
            font-size: 1.02rem;
            font-weight: 500;
            margin-left: 4px;
            transform: uppercase;
            color: var(--yellow);
            margin-bottom: .5rem;
            letter-spacing: .03em
        }

        .learn-desc {
            font-size: .83rem;
            color: var(--white3);
            line-height: 1.65
        }

        /* ── TESTIMONIAL SLIDER ── */

        .testi-slider {
            position: relative;
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            margin: 0 auto;
        }

        .testi-track {
            display: flex;
            gap: 20px;
            transition: transform 0.4s ease;
            will-change: transform;
        }

        .testi-card {
            flex: 0 0 calc((100% - 40px) / 3);
            min-width: calc((100% - 40px) / 3);
            background: var(--black3);
            border: 1px solid rgba(255, 215, 0, .12);
            border-radius: 8px;
            padding: 1.8rem 1.6rem 1.5rem;
            position: relative;
            overflow: hidden;
            transition: transform .3s, box-shadow .3s, border-color .3s;
            box-sizing: border-box;
        }

        .testi-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 40px rgba(255, 215, 0, .1);
            border-color: rgba(255, 215, 0, .35);
        }

        .testi-card::before {
            content: "\201C";
            font-family: 'Bebas Neue', sans-serif;
            font-size: 5rem;
            color: rgba(255, 215, 0, .15);
            position: absolute;
            top: -6px;
            left: 14px;
            line-height: 1;
        }

        .testi-stars {
            color: var(--yellow);
            font-size: .85rem;
            margin-bottom: .7rem;
            letter-spacing: .1rem;
        }

        .testi-text {
            font-size: .9rem;
            color: var(--white2);
            line-height: 1.7;
            margin-bottom: 1.1rem;
            padding-top: .7rem;
        }

        .testi-author {
            display: flex;
            align-items: center;
            gap: .8rem;
        }

        .testi-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--yellow-dim), var(--yellow));
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Oswald', sans-serif;
            font-size: .8rem;
            font-weight: 600;
            color: var(--black);
            border: 2px solid rgba(255, 215, 0, .4);
            flex-shrink: 0;
        }

        .testi-name {
            font-family: 'Oswald', sans-serif;
            font-size: .88rem;
            font-weight: 500;
            color: var(--white);
        }

        .testi-loc {
            font-size: .74rem;
            color: var(--white3);
        }

        .testi-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border: none;
            border-radius: 50%;
            background: rgba(0, 0, 0, .5);
            color: #fff;
            cursor: pointer;
            z-index: 10;
        }

        .testi-prev {
            left: 10px;
        }

        .testi-next {
            right: 10px;
        }

        .testi-dots {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 16px;
        }

        .testi-dot {
            width: 10px;
            height: 10px;
            border: none;
            border-radius: 50%;
            background: #555;
            cursor: pointer;
        }

        .testi-dot.active {
            background: var(--yellow);
        }

        /* Tablet = 2 cards */

        @media (max-width: 992px) {
            .testi-card {
                flex: 0 0 calc((100% - 20px) / 2);
                min-width: calc((100% - 20px) / 2);
            }
        }

        /* Mobile = 1 card */



        @media (max-width: 768px) {
            .hero-img-wrap {
                padding: 1rem;
            }

            .testi-track {
                gap: 0;
            }

            .testi-card {
                flex: 0 0 100%;
                min-width: 100%;
                width: 100%;
            }

            .testi-btn {
                width: 34px;
                height: 34px;
                font-size: 14px;
            }
        }

        /* ── PRICING ── */
        .price-outer {
            position: relative;
            max-width: 540px;
            margin: 0 auto
        }

        .price-glow {
            position: absolute;
            inset: -25px;
            border-radius: 20px;
            background: linear-gradient(135deg, rgba(255, 215, 0, .15), rgba(229, 57, 53, .08));
            filter: blur(35px);
            animation: priceGlow 3s ease-in-out infinite alternate;
            z-index: 0
        }

        @keyframes priceGlow {
            from {
                opacity: .6;
                transform: scale(.97)
            }

            to {
                opacity: 1;
                transform: scale(1.02)
            }
        }

        .price-wrap {
            background: var(--black3);
            border: 2px solid rgba(255, 215, 0, .35);
            border-radius: 10px;
            padding: 2.8rem 2.5rem;
            text-align: center;
            box-shadow: 0 0 60px rgba(255, 215, 0, .08);
            position: relative;
            z-index: 1;
            overflow: hidden
        }

        .price-wrap::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--yellow), var(--yellow3), var(--yellow2), var(--yellow));
            background-size: 300% 100%;
            animation: rainbowBar 2.5s linear infinite
        }

        @keyframes rainbowBar {
            from {
                background-position: 0%
            }

            to {
                background-position: 300%
            }
        }

        .price-badge {
            display: inline-block;
            background: var(--yellow);
            color: var(--black);
            font-family: 'Oswald', sans-serif;
            font-size: .78rem;
            letter-spacing: .14em;
            text-transform: uppercase;
            font-weight: 600;
            padding: .38rem 1.3rem;
            border-radius: 3px;
            margin-bottom: 1.4rem;
            animation: badgeShake .5s ease 3s 3
        }

        @keyframes badgeShake {

            0%,
            100% {
                transform: rotate(0)
            }

            25% {
                transform: rotate(-3deg)
            }

            75% {
                transform: rotate(3deg)
            }
        }

        .price-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.6rem;
            letter-spacing: .04em;
            color: var(--white);
            margin-bottom: 1.4rem
        }

        .price-row {
            display: flex;
            align-items: baseline;
            justify-content: center;
            gap: .9rem;
            margin-bottom: .6rem
        }

        .price-new {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 4rem;
            letter-spacing: .04em;
            color: var(--yellow);
            text-shadow: 0 0 30px rgba(255, 215, 0, .5)
        }

        .price-old {
            font-size: 1.3rem;
            color: var(--white3);
            text-decoration: line-through
        }

        .price-note {
            font-size: .8rem;
            color: var(--white3);
            margin-bottom: 2rem
        }

        .price-features {
            list-style: none;
            text-align: left;
            margin-bottom: 2.2rem
        }

        .price-features li {
            font-size: .88rem;
            color: var(--white2);
            padding: .55rem 0;
            border-bottom: 1px solid rgba(255, 215, 0, .08);
            display: flex;
            align-items: center;
            gap: .7rem;
            transition: color .2s;
            cursor: default
        }

        .price-features li:hover {
            color: var(--yellow)
        }

        .price-features li::before {
            content: '✦';
            color: var(--yellow);
            font-size: .8rem;
            flex-shrink: 0;
            transition: transform .2s
        }

        .price-features li:hover::before {
            transform: scale(1.5) rotate(20deg)
        }

        .enroll-btn {
            display: block;
            width: 100%;
            background: var(--yellow);
            color: var(--black);
            font-family: 'Oswald', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            padding: 1.1rem;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            letter-spacing: .1em;
            text-transform: uppercase;
            transition: transform .25s, box-shadow .25s, background .2s
        }

        .enroll-btn:hover {
            background: var(--yellow3);
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 40px rgba(255, 215, 0, .4)
        }

        .enroll-sub {
            font-size: .74rem;
            color: var(--white3);
            margin-top: 1rem
        }

        /* ── ABOUT ── */
        .about-wrap {
            display: flex;
            gap: 3rem;
            align-items: center;
            flex-wrap: wrap
        }

        .about-avatar-wrap {
            position: relative;
            flex-shrink: 0
        }

        .about-avatar {
            width: 130px;
            height: 130px;
            border-radius: 6px;
            background: linear-gradient(135deg, #2a2a00, var(--yellow-dim));
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.5rem;
            letter-spacing: .05em;
            color: var(--yellow);
            border: 2px solid rgba(255, 215, 0, .4);
            box-shadow: 0 0 40px rgba(255, 215, 0, .12);
            transition: transform .3s, box-shadow .3s
        }

        .about-avatar:hover {
            transform: scale(1.05);
            box-shadow: 0 0 60px rgba(255, 215, 0, .22)
        }

        .about-ring {
            position: absolute;
            inset: -10px;
            border-radius: 10px;
            border: 2px dashed rgba(255, 215, 0, .25);
            animation: ringRotate 12s linear infinite
        }

        @keyframes ringRotate {
            from {
                transform: rotate(0deg)
            }

            to {
                transform: rotate(360deg)
            }
        }

        .about-text {
            flex: 1;
            min-width: 240px
        }

        .about-name {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.2rem;
            letter-spacing: .05em;
            color: var(--white);
            margin-bottom: .4rem
        }

        .about-bio {
            font-size: .88rem;
            color: var(--white3);
            line-height: 1.8;
            margin-bottom: 1.5rem
        }

        .about-stats {
            display: flex;
            gap: 2.5rem;
            flex-wrap: wrap
        }

        .astat-num {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.2rem;
            letter-spacing: .04em;
            color: var(--yellow)
        }

        .astat-lbl {
            font-family: 'Rajdhani', sans-serif;
            font-size: .62rem;
            color: var(--white3);
            text-transform: uppercase;
            letter-spacing: .1em
        }

        /* ── FAQ ── */
        .faq-item {
            background: var(--black3);
            border: 1px solid rgba(255, 215, 0, .12);
            border-radius: 6px;
            margin-bottom: .8rem;
            overflow: hidden;
            transition: box-shadow .3s, border-color .3s
        }

        .faq-item:hover {
            box-shadow: 0 4px 24px rgba(255, 215, 0, .07);
            border-color: rgba(255, 215, 0, .25)
        }

        .faq-q {
            font-family: 'Oswald', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            color: var(--white);
            letter-spacing: .03em;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.1rem 1.4rem;
            user-select: none
        }

        .faq-icon {
            width: 26px;
            height: 26px;
            border-radius: 3px;
            background: rgba(255, 215, 0, .1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--yellow);
            font-size: 1.1rem;
            flex-shrink: 0;
            transition: transform .35s, background .3s
        }

        .faq-item.open .faq-icon {
            transform: rotate(45deg);
            background: var(--yellow);
            color: var(--black)
        }

        .faq-a {
            font-size: .86rem;
            color: var(--white3);
            line-height: 1.75;
            padding: 0 1.4rem;
            max-height: 0;
            overflow: hidden;
            transition: max-height .4s ease, padding .3s
        }

        .faq-item.open .faq-a {
            max-height: 200px;
            padding: .2rem 1.4rem 1.2rem
        }

        /* ── FOOTER ── */
        footer {
            bottom: 0;
            width: 100%;
            position: relative;
            
            z-index: 1;
            background: var(--black2);
            border-top: 1px solid rgba(255, 215, 0, .15);
            color: rgba(255, 255, 255, .6);
            text-align: center;
            padding: 3rem 2rem 2rem
        }

        .footer-logo {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.8rem;
            letter-spacing: .1em;
            color: var(--yellow);
            margin-bottom: .4rem;
            text-shadow: 0 0 20px rgba(255, 215, 0, .3)
        }

        .footer-tagline {
            font-size: .9rem;
            color: var(--white3);
            margin-bottom: 1.5rem;
            letter-spacing: .04em
        }

        .footer-links_badge {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            color: #B8960C;
            font-weight: 600;
            gap: 20px
        }

        .footer-links {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap
        }

        .footer-links a {
            color: rgba(255, 255, 255, .45);
            text-decoration: none;
            font-family: 'Rajdhani', sans-serif;
            font-size: .82rem;
            letter-spacing: .06em;
            text-transform: uppercase;
            transition: color .2s
        }

        .footer-links a:hover {
            color: var(--yellow)
        }

        .footer-copy {
            font-size: .74rem;
            opacity: .35
        }

        .footer-stars {
            display: flex;
            align-items: center;
            justify-content: space-around;
            font-size: 0.76rem;
            gap: 10px;

            margin-bottom: 1rem;
            color: var(--yellow);
            animation: starGlow 2s ease-in-out infinite alternate
        }

        .footer-stars span {
            display: flex;
            align-items: center;
            gap: 4px;
            white-space: nowrap;
        }

        @keyframes starGlow {
            from {
                text-shadow: none
            }

            to {
                text-shadow: 0 0 20px rgba(255, 215, 0, .8)
            }
        }

        /* ══════════════════════════════
        ── MOBILE RESPONSIVE ──
        ══════════════════════════════ */
        @media(max-width:640px) {
            .menu_btn {
                display: flex
            }

            nav {
                display: flex;
                position: fixed;
                top: 66px;
                left: 0;
                right: 0;
                background: rgba(10, 10, 10, 0.98);
                border-bottom: 1px solid rgba(255, 215, 0, .2);
                flex-direction: column;
                padding: 0;
                z-index: 99;
                max-height: 0;
                overflow: hidden;
                transition: max-height .4s ease, padding .3s ease
            }

            nav.open {
                max-height: 280px;
                padding: .5rem 0
            }

            nav a {
                margin: 0;
                padding: 1rem 2rem;
                font-size: 1rem;
                border-bottom: 1px solid rgba(255, 215, 0, .08);
                opacity: 0;
                transform: translateX(-12px);
                transition: opacity .3s ease, transform .3s ease, color .25s
            }

            nav.open a {
                opacity: 1;
                transform: translateX(0)
            }

            nav.open a:nth-child(1) {
                transition-delay: .05s
            }

            nav.open a:nth-child(2) {
                transition-delay: .1s
            }

            nav.open a:nth-child(3) {
                transition-delay: .15s
            }

            nav.open a:nth-child(4) {
                transition-delay: .2s
            }

            .logo {
                font-size: 1rem;
                letter-spacing: .05em
            }

            .about-wrap {
                flex-direction: column;
                text-align: center
            }

            .about-stats {
                justify-content: center
            }

            .hero-content {
                padding: 2rem 1rem 3rem
            }

            section {
                padding: 3rem 1.2rem
            }

            .price-wrap {
                padding: 2rem 1.5rem
            }

            .earnings-card {
                padding: 1.2rem 1.8rem
            }

            .hero-cta {
                font-size: 1rem;
                padding: .9rem 2rem
            }
        }
    </style>
</head>

<body>

    <canvas id="particle-canvas"></canvas>
    <div class="ambient"></div>

    <header>
        <a href="{{ route('home') }}" class="logo">HOW TO ATTRACT WOMEN</a>
        <a href="{{ route('home') }}" class="back-btn">← Back</a>
    </header>

    <!-- <div class="limited-offer-banner">
        <div class="text">
            Only for ₹199
        </div>
        <div class="button">
            Get Instance Access
        </div>
    </div> -->

    <div class="hero">
        <div class="hero-img-wrap">
            <img src="{{ asset('assets/Attract Women .png') }}" alt="How To Attract Women by Rahul Mondal">
        </div>

        <div class="down-arrow">
            ↓
        </div>


        <div class="hero-content">
            <a href="{{ route('ebook.download') }}" download class="dl-btn">
                DOWNLOAD YOUR EBOOK NOW
            </a>
        </div>
    </div>



    <footer>
        <div class="footer-links_badge">

            <span>✅ Trusted & Genuine</span>
            <span>⚡ Instant Download</span>
            <span>🔒 Secure Payment</span>

        </div>

        <div class="footer-links">
            <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
            <a href="{{ route('terms') }}">Terms</a>
            <a href="{{ route('contact-us') }}">Contact</a>
            <a href="{{ route('refund-policy') }}">Refund Policy</a>
        </div>
        <div class="footer-copy">© 2026 Orbital Webworks · Made with ❤ in India</div>
    </footer>

    <script>
        /* PARTICLES */
        const canvas = document.getElementById('particle-canvas');
        const ctx = canvas.getContext('2d');
        let W, H;
        const particles = [];
        function resize() { W = canvas.width = innerWidth; H = canvas.height = innerHeight }
        resize(); addEventListener('resize', resize);
        for (let i = 0; i < 50; i++) {
            particles.push({
                x: Math.random() * innerWidth, y: Math.random() * innerHeight,
                r: .4 + Math.random() * 1.2,
                vx: (Math.random() - .5) * .25, vy: -.08 - Math.random() * .22,
                opacity: Math.random() * .5 + .1,
                color: Math.random() > .5 ? '255,215,0' : '255,255,255'
            });
        }
        (function animParticles() {
            ctx.clearRect(0, 0, W, H);
            particles.forEach(p => {
                p.x += p.vx; p.y += p.vy;
                if (p.y < -5) { p.y = H + 5; p.x = Math.random() * W }
                if (p.x < -5) p.x = W + 5;
                if (p.x > W + 5) p.x = -5;
                ctx.beginPath(); ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(${p.color},${p.opacity})`; ctx.fill();
            });
            requestAnimationFrame(animParticles);
        })();

        /* SCROLL REVEAL */
        const obs = new IntersectionObserver(entries => {
            entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible') });
        }, { threshold: .08 });
        document.querySelectorAll('.pp-card, .contact-card').forEach(el => obs.observe(el));
    </script>
</body>

</html>