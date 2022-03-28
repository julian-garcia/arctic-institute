import Masonry from 'masonry-layout';

export function applyMasonrySpacing() {
  setTimeout(() => {
    var msnry = new Masonry( '.masonry', {
      itemSelector: '.card',
      columnWidth: 120
    });
    var msnryArchive = new Masonry( '.masonry-archive', {
      itemSelector: '.card',
      columnWidth: 120,
      fitWidth: true
    });
  }, 0);
}
