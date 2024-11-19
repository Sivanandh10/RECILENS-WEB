

const stars = document.querySelectorAll('.star');
const feedbackButton = document.querySelector('.feedback button');
const feedbackTextarea = document.querySelector('.feedback textarea');

stars.forEach(star => {
  star.addEventListener('click', () => {
      const rating = star.getAttribute('data-rating');
      stars.forEach(s => {
          s.style.color = s.getAttribute('data-rating') <= rating ? 'gold' : '#ccc';
      });
  });
});

feedbackButton.addEventListener('click', () => {
  const feedback = feedbackTextarea.value;
  if (feedback) {
      alert('Thank you for your feedback: ' + feedback);
      feedbackTextarea.value = '';
  } else {
      alert('Please enter your feedback before submitting.');
  }
});
window.addEventListener('load', function() {
  document.body.classList.remove('loading');
  document.getElementById('loader').style.display = 'none';
});