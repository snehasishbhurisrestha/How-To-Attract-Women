<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOW TO ATTRACT WOMEN</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Bebas+Neue&family=DM+Sans:wght@300;400;500&family=Rajdhani:wght@400;500;600;700&display=swap"
        rel="stylesheet">
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
        .limited-offer-banner .text .highlight {
            color: var(--yellow-dim);
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.8);
        }
        .limited-offer-banner .button:hover{
            background-color: rgb(62, 155, 62);
            color: var(--black);
            transform: translateY(-3px) scale(1.02);
        }
        .limited-offer-banner .button {
            background-color: black;
            color: #FFD200;
            cursor: pointer;
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
            margin-top: 44px;
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
            padding:1rem 18rem
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
            transition: background .2s, transform .2s
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
            position: relative;
            margin-bottom: 60px;
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
        .footer-links_badge{
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            color:#B8960C;
            font-weight: 600;
            gap:20px
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

    <style>
        .payment-loader{
            position:fixed;
            inset:0;
            background:rgba(10,10,10,.96);
            backdrop-filter:blur(8px);
            z-index:999999;
            display:none;
            align-items:center;
            justify-content:center;
        }

        .loader-box{
            width:500px;
            max-width:90%;
            background:#111;
            border:2px solid #FFD700;
            border-radius:20px;
            padding:40px;
            text-align:center;
            color:#fff;
            animation:popupIn .4s ease;
            box-shadow:0 0 40px rgba(255,215,0,.25);
        }

        .loader-box h3{
            color:#FFD700;
            margin-top:20px;
            margin-bottom:10px;
            font-size:28px;
        }

        .loader-box p{
            color:#ccc;
            margin-bottom:20px;
        }

        .loader-box ul{
            list-style:none;
            padding:0;
            margin:0;
            text-align:left;
        }

        .loader-box ul li{
            padding:8px 0;
            color:#fff;
        }

        .loader-ring{
            width:80px;
            height:80px;
            margin:auto;
            border:5px solid rgba(255,215,0,.15);
            border-top:5px solid #FFD700;
            border-radius:50%;
            animation:spin 1s linear infinite;
        }

        .loader-dots{
            margin-top:20px;
        }

        .loader-dots span{
            display:inline-block;
            width:12px;
            height:12px;
            background:#FFD700;
            border-radius:50%;
            margin:0 4px;
            animation:bounce 1.5s infinite;
        }

        .loader-dots span:nth-child(2){
            animation-delay:.2s;
        }

        .loader-dots span:nth-child(3){
            animation-delay:.4s;
        }

        @keyframes spin{
            to{
                transform:rotate(360deg);
            }
        }

        @keyframes bounce{
            0%,80%,100%{
                transform:scale(0);
            }
            40%{
                transform:scale(1);
            }
        }

        @keyframes popupIn{
            from{
                opacity:0;
                transform:scale(.9);
            }
            to{
                opacity:1;
                transform:scale(1);
            }
        }
    </style>

    <style>
        .footer-links_badge{
            display: flex;
            justify-content: center;
           color:#B8960C;
            font-weight: 600;
            gap:20px
        }
        .footer-links_badge img{
            height: 80px;
            width: 100px;
            object-fit: contain;
            border-radius: 6px;
        }
    </style>

    {!! get_setting('header_script') !!}
</head>

<body>

    <canvas id="particle-canvas"></canvas>
    <div class="ambient"></div>

    <!-- Timer banner -->
    <div class="timer-banner">
        <span class="countdown">
            Limited Offer Ends In
            <span class="cnt-unit" id="m">10</span>
            <span>:</span>
            <span class="cnt-unit" id="s">00</span>
        </span>

    </div>

    <div class="limited-offer-banner">
        <div class="text">
            Only for ₹199
        </div>
        <div class="button buyNowDownload">
            Get Instance Access
        </div>
    </div>

    <!-- Header -->
    <header>
        <div class="logo">HOW TO ATTRACT WOMEN</div>

        <!-- ✅ id="menuBtn" matches the JS -->
        <button class="menu_btn" id="menuBtn" onclick="toggleMenu()">☰</button>

        <!-- ✅ all onclick="closeMenu()" — capital M -->
        <nav id="mainNav">
            <a href="#learn" onclick="closeMenu()">Kya Sikhoge</a>
            <a href="#pricing" onclick="closeMenu()">Enroll</a>
            <a href="#about" onclick="closeMenu()">About</a>
            <a href="#faq" onclick="closeMenu()">FAQ</a>
        </nav>
    </header>

    <!-- HERO -->
    <div class="hero">
        <div class="hero-img-wrap">
            <img src="{{ asset('assets/Attract Women .png') }}" alt="How To Attract Women by Rahul Mondal">
        </div>
        <div class="hero-content">
            <a href="javascript:void(0)" class="hero-cta reveal buyNowDownload">
                GET INSTANT ACCESS <span class="arrow">→</span>
            </a>
        </div>
    </div>

    <!-- Stats -->
    <div class="stats-row">
        <div class="stat-card reveal">
            <div class="stat-num" data-target="5000" data-suffix="+">0</div>
            <div class="stat-lbl">Happy clients</div>
        </div>
        <div class="stat-card reveal">
            <div class="stat-num">4.9 ⭐</div>
            <div class="stat-lbl">Our Rating</div>
        </div>
        <div class="stat-card reveal">
            <div class="stat-num" data-target="7" data-suffix=" Days">0</div>
            <div class="stat-lbl">Result in</div>
        </div>
        <div class="stat-card reveal">
            <div class="stat-num" data-target="5 " data-suffix=" Years ">0</div>
            <div class="stat-lbl">of experience</div>
        </div>
    </div>

    <!-- What you'll learn -->
    <section id="learn">
        <div class="section-label reveal"></div>
        <div class="section-title reveal">Ready To<span class="yellow"> Transform Yourself?</span></div>
        <p class="section-sub reveal">Stop Overthinking. Start Improving.</p>
        <div class="learn-grid">
            <div class="learn-card reveal" style="transition-delay:.05s">

                <div class="learn-title"><span style="margin-right: 8px;">✓</span> Better Confidence</div>
                <div class="learn-desc"></div>
            </div>
            <div class="learn-card reveal" style="transition-delay:.1s">

                <div class="learn-title"><span style="margin-right: 8px;">✓</span> Better Conversations</div>
                <!-- <div class="learn-desc">Canva aur free tools se professional products create karo bina ek paisa invest
                    kiye.</div> -->
            </div>
            <div class="learn-card reveal" style="transition-delay:.15s">

                <div class="learn-title"><span style="margin-right: 8px;">✓</span> Improved Social Skills
                </div>
                <!-- <div class="learn-desc">Instagram, WhatsApp aur social media se apna product sell karna ka proven method
                    seekho.</div> -->
            </div>
            <div class="learn-card reveal" style="transition-delay:.2s">

                <div class="learn-title"><span style="margin-right: 8px;">✓</span> Stronger First Impressions</div>
                <!-- <div class="learn-desc">Razorpay, Gumroad ya Instamojo se paise receive karo — fully automated system.
                </div> -->
            </div>
            <div class="learn-card reveal" style="transition-delay:.25s">

                <div class="learn-title"><span style="margin-right: 8px;">✓</span> More Meaningful Connections</div>
                <!-- <div class="learn-desc">Ek product se start karo aur multiple income streams build karo step by step.
                </div> -->
            </div>
            <!-- <div class="learn-card reveal" style="transition-delay:.3s">
                <div class="learn-icon">🎯</div>
                <div class="learn-title">Audience Building</div>
                <div class="learn-desc">Loyal audience build karo jo baar baar tumse kharide — organic aur paid dono
                    methods.</div>
            </div> -->
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials">
        <div class="section-label reveal"></div>
        <div class="section-title reveal">Users <span class="yellow">feedback</span></div>
        <p class="section-sub reveal">Ratings & Feedbacks</p>

        <div class="testi-slider">
            <div class="testi-track" id="testiTrack">

                <div class="testi-card">
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"Language bahut simple hai. Confidence aur conversation wale tips mujhe kaafi
                        useful lage."</p>
                    <div class="testi-author">
                        <div class="testi-avatar">RS</div>
                        <div>
                            <div class="testi-name">Rahul Sharma</div>
                            <div class="testi-loc">Delhi</div>
                        </div>
                    </div>
                </div>
                <div class="testi-card">
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"Main pehle strangers se baat karne mein hesitate karta tha, ab kaafi
                        comfortable feel karta hoon."</p>
                    <div class="testi-author">
                        <div class="testi-avatar">AV</div>
                        <div>
                            <div class="testi-name">Aman Verma</div>
                            <div class="testi-loc">Lucknow</div>
                        </div>
                    </div>
                </div>
                <div class="testi-card">
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"This ebook gave me a fresh perspective on confidence and communication. Very
                        practical."</p>
                    <div class="testi-author">
                        <div class="testi-avatar">AM</div>
                        <div>
                            <div class="testi-name">Arjun Mehta</div>
                            <div class="testi-loc">Mumbai</div>
                        </div>
                    </div>
                </div>
                <div class="testi-card">
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"I liked how everything was explained in a simple step-by-step format."</p>
                    <div class="testi-author">
                        <div class="testi-avatar">SK</div>
                        <div>
                            <div class="testi-name">Sandeep Kumar</div>
                            <div class="testi-loc">Bengaluru</div>
                        </div>
                    </div>
                </div>

                <div class="testi-card">
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"The advice feels realistic and easy to apply in daily life."</p>
                    <div class="testi-author">
                        <div class="testi-avatar">AK</div>
                        <div>
                            <div class="testi-name">Nikhil Gupta</div>
                            <div class="testi-loc">Pune</div>
                        </div>
                    </div>
                </div>

                <div class="testi-card">
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"Short, practical aur direct guide hai. Time waste nahi kiya gaya."</p>
                    <div class="testi-author">
                        <div class="testi-avatar">RS</div>
                        <div>
                            <div class="testi-name">Rohit Singh</div>
                            <div class="testi-loc">Jaipur</div>
                        </div>
                    </div>
                </div>

                <div class="testi-card">
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"Body language aur first impression wala chapter sabse zyada helpful laga."
                    </p>
                    <div class="testi-author">
                        <div class="testi-avatar">VP</div>
                        <div>
                            <div class="testi-name">Vikas Patel</div>
                            <div class="testi-loc">Ahmedabad</div>
                        </div>
                    </div>
                </div>
                <div class="testi-card">
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"₹199 mein itna valuable content expect nahi kiya tha. Easy to understand."
                    </p>
                    <div class="testi-author">
                        <div class="testi-avatar">KM</div>
                        <div>
                            <div class="testi-name">Karan Malhotra</div>
                            <div class="testi-loc">Chandigarh</div>
                        </div>
                    </div>
                </div>
                <div class="testi-card">
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"Great value for money. The communication tips were my favorite part."</p>
                    <div class="testi-author">
                        <div class="testi-avatar">KM</div>
                        <div>
                            <div class="testi-name">Rakesh Yadav</div>
                            <div class="testi-loc">Hyderabad</div>
                        </div>
                    </div>
                </div>
                <div class="testi-card">
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"One of the most straightforward self-improvement guides I've read. Highly
                        recommended."</p>
                    <div class="testi-author">
                        <div class="testi-avatar">AJ</div>
                        <div>
                            <div class="testi-name">Aditya Jain</div>
                            <div class="testi-loc">Indore</div>
                        </div>
                    </div>
                </div>

            </div>
            <button class="testi-btn testi-prev" style="margin-left: -24px; color: #B8960C;"
                id="testiPrev">&#8592;</button>
            <button class="testi-btn testi-next" style="margin-right: -24px; color: #B8960C;"
                id="testiNext">&#8594;</button>
            <div class="testi-dots" id="testiDots"></div>
        </div>
    </section>

    <!-- Pricing -->
    <section id="pricing">
        <div style="text-align:center;margin-bottom:2.8rem">
            <div class="section-label reveal" style="justify-content:center">GET INSTANCE ACCESS</div>
            <div class="section-title reveal">LIMITED TIME OFFER — <span class="yellow">ONLY FOR TODAY</span></div>
        </div>
        <div class="price-outer reveal">
            <div class="price-glow"></div>
            <div class="price-wrap">
                <div class="price-badge">🔥 80% OFF — Today's Offer</div>
                <div class="price-title">HOW TO ATTRACT WOMAN E-BOOK</div>
                <div class="price-row">
                    <span class="price-new">₹199</span>
                    <span class="price-old">₹999</span>
                </div>

                <a href="javascript:void(0)" class="enroll-btn buyNowDownload">GET INSTANT ACCESS <span class="arrow">→</span></a>
                <p class="enroll-sub">✓ Secure payment &nbsp;·&nbsp; ✓ Instant access &nbsp;·&nbsp;</p>
            </div>
        </div>
    </section>

    <!-- About -->
    <section id="about">
        <div class="about-wrap">
            <div class="about-text reveal-right">
                <div class="section-label">Your Mentor</div>
                <div class="about-name">Rahul Mondal</div>
                <p class="about-bio">5+ years ke experience se create ki gayi yeh Hinglish eBook aapko confidence, communication aur attraction improve karne ke practical steps deti hai. Process ko consistently follow karke aap real improvement experience kar sakte hain.</p>
                <div class="about-stats">
                    <div class="astat">
                        <div class="astat-num">5000+</div>
                        <div class="astat-lbl">Happy Clients</div>
                    </div>
                    <div class="astat">
                        <div class="astat-num">4.9</div>
                        <div class="astat-lbl">Our Rating</div>
                    </div>
                    <div class="astat">
                        <div class="astat-num">5 Yrs</div>
                        <div class="astat-lbl">Experience</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq">
        <div class="section-label reveal">FAQ</div>
        <div class="section-title reveal">frequently Asked<span class="yellow"> Question</span></div>
        <div style="max-width:700px">
            <div class="faq-item open reveal">
                <div class="faq-q">Kya yeh eBook beginners ke liye hai?<div class="faq-icon">+</div>
                </div>
                <div class="faq-a">Haan, yeh eBook specially beginners ke liye design ki gayi hai. Sabhi concepts simple
                    Hinglish language mein explain kiye gaye hain.</div>
            </div>
            <div class="faq-item reveal">
                <div class="faq-q">Kya mujhe eBook purchase karne ke baad instant access milega?<div class="faq-icon">+
                    </div>
                </div>
                <div class="faq-a">Haan, payment complete hote hi aapko eBook ka instant download access mil jayega.
                </div>
            </div>
            <div class="faq-item reveal">
                <div class="faq-q">Kya yeh eBook sirf dating ke baare mein hai?<div class="faq-icon">+</div>
                </div>
                <div class="faq-a">Nahi. Yeh eBook confidence, communication skills, body language, personality
                    development aur genuine connections build karne par focus karti hai.</div>
            </div>
            <div class="faq-item reveal">
                <div class="faq-q">Kya eBook Hinglish language mein hai?<div class="faq-icon">+</div>
                </div>
                <div class="faq-a">Haan, poori eBook easy-to-understand Hinglish mein likhi gayi hai, jisse padhna aur
                    implement karna bahut aasaan hai.</div>
            </div>
            <div class="faq-item reveal">
                <div class="faq-q">Kya yeh tips real life mein apply kiye ja sakte hain?<div class="faq-icon">+</div>
                </div>
                <div class="faq-a">Haan, eBook mein practical exercises, examples aur actionable strategies di gayi hain
                    jinhe aap daily life mein implement kar sakte hain.
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        {{-- <div class="footer-links_badge">

            <span>✅ Trusted & Genuine</span>
            <span>⚡ Instant Download</span>
            <span>🔒 Secure Payment</span>

        </div> --}}
        <div class="footer-links_badge" style="display: flex;">
            <span><img src="{{ asset('assets/IMG_1884.PNG') }}" alt="" height="80" width="100"></span>
            <span><img src="{{ asset('assets/IMG_1885.PNG') }}" alt=""height="80" width="100"></span>
            <span><img src="{{ asset('assets/IMG_1886.PNG') }}" alt="" height="80" width="100"></span>
        </div>

        <div class="footer-links">
            <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
            <a href="{{ route('terms') }}">Terms</a>
            <a href="{{ route('contact-us') }}">Contact</a>
            <a href="{{ route('refund-policy') }}">Refund Policy</a>
        </div>
        <div class="footer-copy">Made with ❤ <a href="https://orbitalwebworks.com" target="_blank" style="color: rgba(255, 255, 255, .6);">Orbital Webworks</a></div>
    </footer>

    <div id="paymentLoader" class="payment-loader">
        <div class="loader-box">

            <div class="loader-ring"></div>

            <h3>Preparing Secure Payment</h3>

            <p>
                Please wait while we create your secure order.
            </p>

            <ul>
                <li>✓ Secure SSL Encrypted Payment</li>
                <li>✓ Do Not Refresh This Page</li>
                <li>✓ Do Not Press Back Button</li>
            </ul>

            <div class="loader-dots">
                <span></span>
                <span></span>
                <span></span>
            </div>

        </div>
    </div>

    <script>
        /* ── COUNTDOWN ── */
        let total = 10 * 60;
        function tick() {
            const m = Math.floor(total / 60), s = total % 60;
            document.getElementById('m').textContent = String(m).padStart(2, '0');
            document.getElementById('s').textContent = String(s).padStart(2, '0');
            if (total > 0) total--;
        }
        tick(); setInterval(tick, 1000);

        /* ── PARTICLES ── */
        const canvas = document.getElementById('particle-canvas');
        const ctx = canvas.getContext('2d');
        let W, H, particles = [];
        function resize() { W = canvas.width = innerWidth; H = canvas.height = innerHeight }
        resize(); addEventListener('resize', resize);
        for (let i = 0; i < 60; i++) {
            particles.push({
                x: Math.random() * innerWidth, y: Math.random() * innerHeight,
                r: .5 + Math.random() * 1.5,
                vx: (Math.random() - .5) * .3, vy: -.1 - Math.random() * .3,
                opacity: Math.random() * .6 + .1,
                color: Math.random() > .5 ? '255,215,0' : '255,255,255'
            });
        }
        function animParticles() {
            ctx.clearRect(0, 0, W, H);
            particles.forEach(p => {
                p.x += p.vx; p.y += p.vy;
                if (p.y < -5) { p.y = H + 5; p.x = Math.random() * W }
                if (p.x < -5) p.x = W + 5;
                if (p.x > W + 5) p.x = -5;
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(${p.color},${p.opacity})`;
                ctx.fill();
            });
            requestAnimationFrame(animParticles);
        }
        animParticles();

        /* ── SCROLL REVEAL ── */
        const obs = new IntersectionObserver(entries => {
            entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible') });
        }, { threshold: .12 });
        document.querySelectorAll('.reveal,.reveal-left,.reveal-right').forEach(el => obs.observe(el));

        /* ── COUNTER ── */
        function animCounter(el) {
            const target = parseInt(el.dataset.target);
            const prefix = el.dataset.prefix || '';
            const suffix = el.dataset.suffix || '';
            let current = 0;
            const step = Math.ceil(target / 60);
            const iv = setInterval(() => {
                current = Math.min(current + step, target);
                el.textContent = prefix + (target > 1000 ? current.toLocaleString('en-IN') : current) + suffix;
                if (current >= target) clearInterval(iv);
            }, 20);
        }
        const cobs = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting && e.target.dataset.target) {
                    animCounter(e.target); cobs.unobserve(e.target);
                }
            });
        }, { threshold: .5 });
        document.querySelectorAll('[data-target]').forEach(el => cobs.observe(el));

        /* ── FAQ ── */
        document.querySelectorAll('.faq-q').forEach(q => {
            q.addEventListener('click', () => {
                const item = q.parentElement;
                const wasOpen = item.classList.contains('open');
                document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
                if (!wasOpen) item.classList.add('open');
            });
        });

        /* ── HAMBURGER MENU ── */
        function toggleMenu() {
            const nav = document.getElementById('mainNav');
            const btn = document.getElementById('menuBtn');
            nav.classList.toggle('open');
            btn.classList.toggle('active');
            btn.textContent = nav.classList.contains('open') ? '✕' : '☰';
        }

        function closeMenu() {
            const nav = document.getElementById('mainNav');
            const btn = document.getElementById('menuBtn');
            nav.classList.remove('open');
            btn.classList.remove('active');
            btn.textContent = '☰';
        }

        /* Close menu if screen resizes to desktop */
        window.addEventListener('resize', () => {
            if (window.innerWidth > 640) closeMenu();
        });
    </script>
    <script>
        /* ── TESTIMONIAL SLIDER ── */

        const testiTrack = document.getElementById('testiTrack');
        const testiDots = document.getElementById('testiDots');

        const slideCount = testiTrack.children.length;

        let testiCur = 0;
        let testiTimer;

        /* Visible cards based on screen */
        function getVisibleSlides() {
            if (window.innerWidth <= 768) return 1;
            if (window.innerWidth <= 992) return 2;
            return 3;
        }

        /* Create dots */
        function createDots() {
            testiDots.innerHTML = "";

            const visibleSlides = getVisibleSlides();
            const dotCount = Math.max(1, slideCount - visibleSlides + 1);

            for (let i = 0; i < dotCount; i++) {
                const dot = document.createElement('button');

                dot.className =
                    'testi-dot' + (i === testiCur ? ' active' : '');

                dot.addEventListener('click', () => {
                    testiGo(i);
                });

                testiDots.appendChild(dot);
            }
        }

        /* Move slider */
        function testiGo(n) {
            const card = testiTrack.querySelector('.testi-card');
            const visibleSlides = getVisibleSlides();
            const maxIndex = slideCount - visibleSlides;

            if (n < 0) {
                testiCur = maxIndex;
            } else if (n > maxIndex) {
                testiCur = 0;
            } else {
                testiCur = n;
            }

            // Read actual gap from CSS instead of hardcoding 20
            const gap = parseFloat(getComputedStyle(testiTrack).gap) || 0;
            const cardWidth = card.offsetWidth + gap;

            testiTrack.style.transform = `translateX(-${testiCur * cardWidth}px)`;

            document.querySelectorAll('.testi-dot').forEach((dot, index) => {
                dot.classList.toggle('active', index === testiCur);
            });
        }

        /* Arrows */
        document
            .getElementById('testiPrev')
            .addEventListener('click', () => {
                testiGo(testiCur - 1);
            });

        document
            .getElementById('testiNext')
            .addEventListener('click', () => {
                testiGo(testiCur + 1);
            });

        /* Autoplay */
        function testiStartAuto() {
            testiTimer = setInterval(() => {
                testiGo(testiCur + 1);
            }, 3500);
        }

        function testiStopAuto() {
            clearInterval(testiTimer);
        }

        testiStartAuto();

        testiTrack.addEventListener(
            'mouseenter',
            testiStopAuto
        );

        testiTrack.addEventListener(
            'mouseleave',
            testiStartAuto
        );

        /* Touch swipe */
        let startX = 0;

        testiTrack.addEventListener('touchstart', e => {
            startX = e.touches[0].clientX;
        });

        testiTrack.addEventListener('touchend', e => {

            const diff =
                startX - e.changedTouches[0].clientX;

            if (Math.abs(diff) > 50) {
                testiGo(
                    diff > 0
                        ? testiCur + 1
                        : testiCur - 1
                );
            }
        });

        /* Resize */
        window.addEventListener('resize', () => {
            createDots();
            testiGo(0);
        });

        /* Init */
        createDots();
        testiGo(0);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        $('.buyNowDownload').click(function() {
            $('#paymentLoader').css('display','flex');
            $.ajax({
                url: '/create-order',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#paymentLoader').hide();
                    var options = {
                        key: "{{ env('RAZORPAY_KEY') }}",
                        amount: response.amount,
                        currency: "INR",
                        order_id: response.order_id,
                        name: "How To Attract Women",
                        theme: {
                            color: "#FFD700"
                        },
                        handler: function(payment) {
                            $('.loader-box h3').text('Verifying Payment');
                            $('.loader-box p').text('Please wait while we verify your payment and unlock your ebook.');
                            $('#paymentLoader').css('display','flex');
                            $.ajax({
                                url: '/payment-success',
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    razorpay_order_id: payment.razorpay_order_id,
                                    razorpay_payment_id: payment.razorpay_payment_id,
                                    razorpay_signature: payment.razorpay_signature
                                },
                                success: function() {
                                    window.location.href = "/download?order_id=" + payment.razorpay_order_id;
                                }
                            });

                        }
                    };

                    var rzp = new Razorpay(options);
                    rzp.open();
                }
            });

        });
    </script>

    {!! get_setting('footer_script') !!}

</body>

</html>