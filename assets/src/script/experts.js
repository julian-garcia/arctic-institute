const expertGrid = document.querySelector('.expert-grid');
let experts = 20;

if (expertGrid) {
  limitVisibleExperts(experts)
  
  document.querySelector('.load-more').addEventListener('click', () => {
    experts += 10;
    limitVisibleExperts(experts)
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
