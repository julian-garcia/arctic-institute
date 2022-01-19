setTimeout(() => {
  document.querySelector('.nav-menu')
    .addEventListener('click', el => {
      const classes = el.target.classList;
      console.log(el.target.tagName, classes);
      if (
        classes.contains('search') ||
        ['path', 'svg'].indexOf(el.target.tagName.toLowerCase()) > -1
      ) {
        const searchForm = document.querySelector('.nav-menu .searchform');
        searchForm.classList.toggle('show');
        searchForm.querySelector('#s').focus();
        searchForm.querySelector('#s').value = '';
      }
    });
}, 0);