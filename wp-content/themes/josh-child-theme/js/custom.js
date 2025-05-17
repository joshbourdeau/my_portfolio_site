document.addEventListener('DOMContentLoaded', function () {
    const textElements = document.querySelectorAll('.fade-in-text');
  
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target); // Optional: only animate once
        }
      });
    }, {
      threshold: 0.1 // Trigger when 10% of the element is visible
    });
  
    textElements.forEach(el => {
      observer.observe(el);
    });
  });