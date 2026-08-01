import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {

  // Typing animation for hero title
  const typingEl = document.getElementById('typing-word');
  if (typingEl) {
    const words = [
      { text: 'jeunes', color: '#E85D4A' },
      { text: 'femmes', color: '#FBB507' }
    ];
    let wordIndex = 0, charIndex = 0, isDeleting = false;
    let speed = 120;

    function typeEffect() {
      const current = words[wordIndex];
      if (isDeleting) {
        typingEl.textContent = current.text.substring(0, charIndex - 1);
        charIndex--;
        speed = 60;
      } else {
        typingEl.textContent = current.text.substring(0, charIndex + 1);
        charIndex++;
        speed = 120;
      }
      typingEl.style.color = current.color;
      if (!isDeleting && charIndex === current.text.length) {
        speed = 2000;
        isDeleting = true;
      } else if (isDeleting && charIndex === 0) {
        isDeleting = false;
        wordIndex = (wordIndex + 1) % words.length;
        speed = 800;
      }
      setTimeout(typeEffect, speed);
    }
    typeEffect();
  }

  // Scroll reveal — every <section> animates on scroll
  document.querySelectorAll('main section').forEach(sec => sec.classList.add('anim-reveal'));

  const revealEls = document.querySelectorAll('.anim-reveal');
  if (revealEls.length) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
    revealEls.forEach(el => observer.observe(el));
  }

  // Navbar scroll
  const navbar = document.getElementById('navbar');
  if (navbar) {
    const onScroll = () => navbar.classList.toggle('scrolled', window.scrollY > 20);
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  // Lazy load blur effect
  document.querySelectorAll('img[loading="lazy"]').forEach(img => {
    if (img.complete) { img.style.filter = 'blur(0)'; }
    else { img.addEventListener('load', () => { img.style.filter = 'blur(0)'; }); }
  });
});
