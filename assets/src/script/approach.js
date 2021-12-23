const approach = document.querySelector('.approach');

if (approach) {
  function inactiveColumns() {
    document.querySelectorAll('.approach .wp-block-column')
    .forEach(element => {
      element.classList.add('inactive');
      element.classList.remove('active');
    });
  }
  inactiveColumns();
  
  approach.addEventListener('click', e => {
    let containerColumn;
    if (['FIGCAPTION', 'IMG'].indexOf(e.target.tagName) > -1) {
      containerColumn = e.target.parentNode.parentNode;
    } else if (['FIGURE'].indexOf(e.target.tagName) > -1) {
      containerColumn = e.target.parentNode;
    } else if (['DIV'].indexOf(e.target.tagName) > -1) {
      containerColumn = e.target;
    }
    if (containerColumn) {
      inactiveColumns();
      containerColumn.classList.remove('inactive');
      containerColumn.classList.add('active');
    }
  })
}
