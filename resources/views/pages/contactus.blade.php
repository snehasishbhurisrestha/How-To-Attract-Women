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
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0 }
        :root {
            --black: #0A0A0A; --black2: #111111; --black3: #1A1A1A;
            --yellow: #FFD700; --yellow2: #FFC200; --yellow3: #FFE566;
            --yellow-dim: #B8960C; --white: #FFFFFF; --white2: #E8E8E8; --white3: #AAAAAA; --red: #E53935;
        }
        html { scroll-behavior: smooth }
        body { font-family: 'DM Sans', sans-serif; background: var(--black); color: var(--white); overflow-x: hidden }

        #particle-canvas { position: fixed; inset: 0; pointer-events: none; z-index: 0; opacity: 0.22 }
        .ambient {
            position: fixed; inset: 0; pointer-events: none; z-index: 0;
            background: radial-gradient(ellipse 60% 50% at 0% 0%, rgba(255,215,0,.05) 0%, transparent 60%),
                        radial-gradient(ellipse 50% 60% at 100% 100%, rgba(255,215,0,.04) 0%, transparent 60%);
        }

        /* HEADER */
        header {
            position: sticky; top: 0; z-index: 100;
            background: rgba(10,10,10,.95); backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255,215,0,.18);
            padding: 0 2.5rem; display: flex; align-items: center; justify-content: space-between;
            height: 66px; animation: slideDown .6s ease;
        }
        @keyframes slideDown { from { transform: translateY(-100%); opacity: 0 } to { transform: translateY(0); opacity: 1 } }
        .logo {
            font-family: 'Bebas Neue', sans-serif; font-size: 1.6rem; letter-spacing: .08em;
            background: linear-gradient(135deg, var(--yellow), var(--yellow3));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-decoration: none;
        }
        .back-btn {
            font-family: 'Rajdhani', sans-serif; font-size: .85rem; font-weight: 600;
            letter-spacing: .08em; text-transform: uppercase; color: var(--white3); text-decoration: none;
            display: flex; align-items: center; gap: .4rem;
            padding: .4rem .85rem; border: 1px solid rgba(255,215,0,.2); border-radius: 3px;
            transition: color .25s, border-color .25s;
        }
        .back-btn:hover { color: var(--yellow); border-color: rgba(255,215,0,.5) }

        /* HERO */
        .pp-hero {
            position: relative; z-index: 1; text-align: center;
            padding: 5rem 1.5rem 3.5rem; overflow: hidden;
        }
        .pp-hero::before {
            content: ''; position: absolute; inset: 0; pointer-events: none;
            background: radial-gradient(ellipse 70% 55% at 50% 0%, rgba(255,215,0,.07) 0%, transparent 70%);
        }
        .pp-hero-label {
            font-family: 'Rajdhani', sans-serif; font-size: .75rem; letter-spacing: .25em;
            text-transform: uppercase; color: var(--yellow); font-weight: 600;
            display: inline-flex; align-items: center; gap: .6rem; margin-bottom: 1rem;
            opacity: 0; animation: fadeUp .6s ease .1s forwards;
        }
        .pp-hero-label::before, .pp-hero-label::after { content: ''; width: 28px; height: 1.5px; background: var(--yellow); display: inline-block }
        .pp-hero h1 {
            font-family: 'Bebas Neue', sans-serif; font-size: clamp(2.8rem, 6vw, 4.2rem);
            letter-spacing: .04em; line-height: 1.0; color: var(--white);
            opacity: 0; animation: fadeUp .6s ease .2s forwards;
        }
        .pp-hero h1 span { color: var(--yellow) }
        .pp-hero-meta {
            font-size: .9rem; color: var(--white3); margin-top: 1.1rem; letter-spacing: .04em;
            max-width: 540px; margin-left: auto; margin-right: auto; line-height: 1.75;
            opacity: 0; animation: fadeUp .6s ease .32s forwards;
        }
        @keyframes fadeUp { from { opacity: 0; transform: translateY(18px) } to { opacity: 1; transform: translateY(0) } }

        /* DIVIDER */
        .gold-divider {
            position: relative; z-index: 1;
            display: flex; align-items: center; justify-content: center;
            gap: 1rem; padding: 0 1.5rem 3.5rem;
        }
        .gold-divider::before, .gold-divider::after {
            content: ''; flex: 1; max-width: 300px; height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,215,0,.35), transparent);
        }
        .gold-divider span { font-size: .75rem; color: var(--yellow); letter-spacing: .2em }

        /* WRAP */
        .pp-wrap { position: relative; z-index: 1; max-width: 760px; margin: 0 auto; padding: 0 1.5rem 6rem }

        /* CARD */
        .pp-card {
            background: var(--black3); border: 1px solid rgba(255,215,0,.13);
            border-radius: 10px; overflow: hidden; position: relative;
            opacity: 0; transform: translateY(22px);
            transition: opacity .6s ease, transform .6s ease, border-color .3s, box-shadow .3s;
        }
        .pp-card + .pp-card { margin-top: 1rem }
        .pp-card.visible { opacity: 1; transform: translateY(0) }
        .pp-card:hover { border-color: rgba(255,215,0,.28); box-shadow: 0 8px 40px rgba(255,215,0,.06) }
        .pp-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
            background: linear-gradient(90deg, transparent, var(--yellow), transparent);
            opacity: 0; transition: opacity .3s;
        }
        .pp-card:hover::before { opacity: 1 }

        /* SECTION HEADER */
        .pp-sec-head {
            display: flex; align-items: center; gap: .9rem;
            padding: 1.3rem 1.8rem; border-bottom: 1px solid rgba(255,215,0,.07);
        }
        .pp-sec-icon {
            width: 36px; height: 36px; border-radius: 6px;
            background: rgba(255,215,0,.08); border: 1px solid rgba(255,215,0,.18);
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem; flex-shrink: 0; transition: background .3s, transform .3s;
        }
        .pp-card:hover .pp-sec-icon { background: rgba(255,215,0,.16); transform: scale(1.08) rotate(-4deg) }
        .pp-sec-title {
            font-family: 'Oswald', sans-serif; font-size: 1rem; font-weight: 500;
            letter-spacing: .05em; text-transform: uppercase; color: var(--white);
        }

        /* BODY */
        .pp-sec-body { padding: 1.4rem 1.8rem }
        .pp-sec-body p { font-size: .875rem; color: var(--white3); line-height: 1.85; margin-bottom: .9rem }
        .pp-sec-body p:last-child { margin-bottom: 0 }
        .pp-sec-body strong { color: var(--white2); font-weight: 500 }
        .pp-sec-body a { color: var(--yellow); text-decoration: none }
        .pp-sec-body a:hover { text-decoration: underline }

        /* CONTACT INFO ROW */
        .contact-info-row {
            display: flex; flex-direction: column; gap: .9rem; margin-top: .4rem;
        }
        .contact-info-item {
            display: flex; align-items: center; gap: 1rem;
            background: rgba(255,215,0,.04); border: 1px solid rgba(255,215,0,.1);
            border-radius: 6px; padding: .9rem 1.1rem;
            transition: background .3s, border-color .3s;
        }
        .contact-info-item:hover { background: rgba(255,215,0,.08); border-color: rgba(255,215,0,.25) }
        .ci-icon {
            width: 36px; height: 36px; border-radius: 6px;
            background: rgba(255,215,0,.1); border: 1px solid rgba(255,215,0,.2);
            display: flex; align-items: center; justify-content: center;
            font-size: .95rem; flex-shrink: 0;
        }
        .ci-label {
            font-family: 'Rajdhani', sans-serif; font-size: .7rem; letter-spacing: .12em;
            text-transform: uppercase; color: var(--yellow); font-weight: 600; margin-bottom: .15rem;
        }
        .ci-value { font-size: .875rem; color: var(--white2); font-weight: 500 }
        .ci-value a { color: var(--white2); text-decoration: none; transition: color .2s }
        .ci-value a:hover { color: var(--yellow) }

        /* RESPONSE TIME BADGE */
        .response-badge {
            display: inline-flex; align-items: center; gap: .5rem;
            background: rgba(255,215,0,.07); border: 1px solid rgba(255,215,0,.2);
            border-radius: 20px; padding: .45rem 1rem;
            font-family: 'Rajdhani', sans-serif; font-size: .78rem; letter-spacing: .1em;
            text-transform: uppercase; color: var(--yellow); font-weight: 600;
            margin-top: 1rem;
        }
        .response-badge::before { content: '⏱'; font-size: .85rem }

        /* CONTACT CTA */
        .contact-card {
            background: var(--black3); border: 1.5px solid rgba(255,215,0,.3);
            border-radius: 8px; padding: 2rem; text-align: center;
            margin-top: 1rem; position: relative; overflow: hidden;
            opacity: 0; transform: translateY(22px);
            transition: opacity .6s ease, transform .6s ease;
        }
        .contact-card.visible { opacity: 1; transform: translateY(0) }
        .contact-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
            background: linear-gradient(90deg, var(--yellow), var(--yellow3), var(--yellow2), var(--yellow));
            background-size: 300% 100%; animation: rainbowBar 2.5s linear infinite;
        }
        @keyframes rainbowBar { from { background-position: 0% } to { background-position: 300% } }
        .contact-card h3 {
            font-family: 'Bebas Neue', sans-serif; font-size: 1.55rem;
            letter-spacing: .05em; color: var(--white); margin-bottom: .5rem;
        }
        .contact-card p { font-size: .84rem; color: var(--white3); line-height: 1.75; margin-bottom: 1.3rem }
        .contact-btn {
            display: inline-flex; align-items: center; gap: .55rem;
            background: var(--yellow); color: var(--black);
            font-family: 'Oswald', sans-serif; font-size: .88rem; font-weight: 700;
            padding: .75rem 1.8rem; border-radius: 3px; text-decoration: none;
            letter-spacing: .08em; text-transform: uppercase;
            transition: background .2s, transform .2s, box-shadow .2s;
        }
        .contact-btn:hover { background: var(--yellow3); transform: translateY(-2px); box-shadow: 0 8px 30px rgba(255,215,0,.35) }

        /* FOOTER */
        footer {
            position: relative; z-index: 1; background: var(--black2);
            border-top: 1px solid rgba(255,215,0,.15);
            color: rgba(255,255,255,.6); text-align: center; padding: 3rem 2rem 2rem;
        }
        .footer-logo { font-family: 'Bebas Neue', sans-serif; font-size: 1.8rem; letter-spacing: .1em; color: var(--yellow); margin-bottom: .4rem; text-shadow: 0 0 20px rgba(255,215,0,.3) }
        .footer-tagline { font-size: .9rem; color: var(--white3); margin-bottom: 1.5rem; letter-spacing: .04em }
        .footer-links { display: flex; gap: 1.5rem; justify-content: center; margin-bottom: 1.5rem; flex-wrap: wrap }
        .footer-links a { color: rgba(255,255,255,.45); text-decoration: none; font-family: 'Rajdhani', sans-serif; font-size: .82rem; letter-spacing: .06em; text-transform: uppercase; transition: color .2s }
        .footer-links a:hover, .footer-links a.active { color: var(--yellow) }
        .footer-copy { font-size: .74rem; opacity: .35 }

        /* MOBILE */
        @media (max-width: 640px) {
            header { padding: 0 1.2rem }
            .logo { font-size: 1.05rem }
            .pp-hero { padding: 3.5rem 1.2rem 2.5rem }
            .pp-wrap { padding: 0 1rem 4rem }
            .pp-sec-head { padding: 1.1rem 1.2rem }
            .pp-sec-body { padding: 1.1rem 1.2rem 1.4rem }
            .contact-card { padding: 1.5rem 1.2rem }
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

<div class="pp-hero">
    <div class="pp-hero-label">Support</div>
    <h1>CONTACT <span>US</span></h1>
    <p class="pp-hero-meta">If you have any questions regarding the <strong style="color:var(--white2)">How To Attract Women In 7 Days</strong> eBook, your order, payment, download access, or any other issue, feel free to contact us.</p>
</div>


<div class="pp-wrap">

    <!-- CONTACT INFORMATION -->
    <div class="pp-card">
        <div class="pp-sec-head">
            <div class="pp-sec-icon">📬</div>
            <div class="pp-sec-title">Contact Information</div>
        </div>
        <div class="pp-sec-body">
            <p>Our support team will review your query and respond as quickly as possible.</p>
            <div class="contact-info-row">
                <div class="contact-info-item">
                    <div class="ci-icon">👤</div>
                    <div>
                        <div class="ci-label">Name</div>
                        <div class="ci-value">Rahul Mondal</div>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="ci-icon">✉️</div>
                    <div>
                        <div class="ci-label">Email</div>
                        <div class="ci-value"><a href="mailto:business.mondal1@gmail.com">business.mondal1@gmail.com</a></div>
                    </div>
                </div>
            </div>
            <div class="response-badge">We aim to respond within 24 hours</div>
        </div>
    </div>

    <!-- WHAT YOU CAN CONTACT US FOR -->
    <div class="pp-card">
        <div class="pp-sec-head">
            <div class="pp-sec-icon">💬</div>
            <div class="pp-sec-title">How Can We Help?</div>
        </div>
        <div class="pp-sec-body">
            <p>You can reach out to us for any of the following:</p>
            <div class="">If you have any questions regarding the How To Attract Women In 7 Days eBook, your order, payment, download access, or any other issue, feel free to contact us.</div>
        </div>
    </div>

    <!-- CTA -->
    <div class="contact-card">
        <h3>SEND US AN EMAIL</h3>
        <p>Thank you for choosing our eBook! We're here to help.<br>Drop us a message and we'll get back to you within 24 hours.</p>
        <a href="mailto:business.mondal1@gmail.com" class="contact-btn">✉ business.mondal1@gmail.com</a>
    </div>

</div>

<footer>
    <div class="footer-logo">Rahul Mondal</div>
    <div class="footer-tagline">GET INSTANT ACCESS</div>
    <div class="footer-links">
        <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
        <a href="{{ route('terms') }}">Terms</a>
        <a href="{{ route('contact-us') }}" class="active">Contact</a>
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