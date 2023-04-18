const commentBtns = document.querySelectorAll('.post-comments');

commentBtns.forEach(commentBtn => {
  commentBtn.addEventListener('click', () => {
    const commentsSection = commentBtn.parentNode.parentNode.querySelector('.post-comments-section');
    commentsSection.style.display = commentsSection.style.display === 'none' ? 'block' : 'none';
  });
});

const stars = document.querySelectorAll('.star');

stars.forEach((star, index) => {
  star.addEventListener('click', () => {
    for (let i = 0; i < stars.length; i++) {
      if (i <= index) {
        stars[i].classList.add('clicked');
      } else {
        stars[i].classList.remove('clicked');
      }
    }
  });
});