/* ── Scroll-triggered reveal ─────────────── */
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const delay = parseInt(entry.target.dataset.delay || 0);
        setTimeout(() => entry.target.classList.add('visible'), delay);
        revealObserver.unobserve(entry.target);
    });
}, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

document.querySelectorAll('.reveal, .reveal-left, .reveal-right')
    .forEach(el => revealObserver.observe(el));

/* ── Sticky nav ──────────────────────────── */
const nav = document.getElementById('main-nav');
if (nav) {
    const onScroll = () => {
        nav.classList.toggle('nav-scrolled', window.scrollY > 60);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
}

/* ── Counter animation ───────────────────── */
function runCounter(el) {
    const target   = parseInt(el.dataset.counter);
    const suffix   = el.dataset.suffix  || '';
    const prefix   = el.dataset.prefix  || '';
    const duration = 2000;
    const fps      = 60;
    const steps    = (duration / 1000) * fps;
    let step = 0;
    const id = setInterval(() => {
        step++;
        const val = Math.round(target * (step / steps));
        el.textContent = prefix + val.toLocaleString('en-IN') + suffix;
        if (step >= steps) { el.textContent = prefix + target.toLocaleString('en-IN') + suffix; clearInterval(id); }
    }, 1000 / fps);
}

const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        runCounter(entry.target);
        counterObserver.unobserve(entry.target);
    });
}, { threshold: 0.6 });

document.querySelectorAll('[data-counter]').forEach(el => counterObserver.observe(el));

/* ── Track download clicks ───────────────── */
const csrfMeta = document.querySelector('meta[name="csrf-token"]');

function trackClick(platform) {
    if (!csrfMeta) return;
    fetch('/track/click', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfMeta.content,
        },
        body: JSON.stringify({ platform }),
    }).catch(() => {});
}

document.querySelectorAll('[data-track]').forEach(el => {
    el.addEventListener('click', () => trackClick(el.dataset.track));
});

/* ── Mobile nav toggle ───────────────────── */
const toggle   = document.getElementById('menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');
if (toggle && mobileMenu) {
    toggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        const open = !mobileMenu.classList.contains('hidden');
        toggle.setAttribute('aria-expanded', open);
    });
}

/* ── Smooth scroll for anchor links ──────── */
document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
        const target = document.querySelector(a.getAttribute('href'));
        if (!target) return;
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        if (mobileMenu) mobileMenu.classList.add('hidden');
    });
});

/* ── Hero parallax on scroll ─────────────── */
const heroDecor = document.getElementById('hero-decor');
if (heroDecor) {
    window.addEventListener('scroll', () => {
        heroDecor.style.transform = `translateY(${window.scrollY * 0.3}px)`;
    }, { passive: true });
}
