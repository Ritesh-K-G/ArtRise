const commentBtns = document.querySelectorAll('.post-comments');

commentBtns.forEach(commentBtn => {
  commentBtn.addEventListener('click', () => {
    const commentsSection = commentBtn.parentNode.parentNode.querySelector('.post-comments-section');
    commentsSection.style.display = commentsSection.style.display === 'none' ? 'block' : 'none';
  });
});


var loadFile = function (event) {
  var image = document.getElementById("output");
  image.src = URL.createObjectURL(event.target.files[0]);
};