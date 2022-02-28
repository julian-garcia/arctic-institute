const expertGrid = document.querySelector('.expert-grid');

if (expertGrid) {
  let experts = 8;
  window.addEventListener('beforeunload', () => {window.scroll(0,0)})
  limitVisibleExperts(experts);
  let scrollUpperLimit = window.innerHeight * .2;
  window.addEventListener('scroll', () => {
    if (window.scrollY > scrollUpperLimit) {
      experts += experts;
      limitVisibleExperts(experts);
      scrollUpperLimit += (window.innerHeight * .2);
    }
  });
}

function limitVisibleExperts(limit) {
  expertGrid.querySelectorAll('.wp-block-group__inner-container > .wp-block-group')
    .forEach((element, i) => {
      if (i >= limit) {
        element.classList.add('hidden');
      } else {
        element.classList.remove('hidden');
      }
    });
}
