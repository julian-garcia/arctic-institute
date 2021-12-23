export function applyMasonrySpacing(eventType) {
  if (eventType === 'resize') {
    window.location.reload(false);
  }
  setTimeout(() => {
    const gridCards = document.querySelector('.masonry');
    if (gridCards) {
      const publicationsWidth = gridCards.offsetWidth;
      const cards = gridCards.querySelectorAll('.card');
  
      cards.forEach((card, i) => {
        const cols = Math.floor(publicationsWidth / card.offsetWidth);
        if (i >= cols) {
          const prevPosition = cards[i - cols].getBoundingClientRect().bottom;
          const currentPosition = cards[i].getBoundingClientRect().top;
          const gap = Math.floor(currentPosition - prevPosition);
          const marginTopAdjust = gap > 35 ? -(gap - 35) : 35 - gap;
          card.style.marginTop = marginTopAdjust + 'px';
        }
      });
    }
  }, 0);
}
