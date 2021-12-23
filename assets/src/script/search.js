document.querySelector('.nav-menu')
  .addEventListener('click', el => {
    const classes = el.target.classList;
    if (
      ['search'].indexOf(classes) > -1 ||
      ['path', 'svg'].indexOf(el.target.tagName.toLowerCase()) > -1
    ) {
      const searchForm = document.querySelector('.nav-menu .searchform');
      searchForm.classList.toggle('show');
      searchForm.querySelector('#s').focus();
      searchForm.querySelector('#s').value = '';
    }
  });