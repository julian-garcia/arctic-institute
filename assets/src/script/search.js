setTimeout(() => {
  document.querySelectorAll('.nav-menu, .mobile-nav-menu')
    .forEach(nav => {
      nav.addEventListener('click', el => {
        const classes = el.target.classList;
        if (
          classes.contains('search') ||
          ['path', 'svg'].indexOf(el.target.tagName.toLowerCase()) > -1
        ) {
          let searchForm;
          if (nav.classList.contains('nav-menu')) {
            searchForm = document.querySelector('.nav-menu .searchform');
            searchForm.classList.toggle('show');
          } else {
            searchForm = document.querySelector('.mobile-nav-menu .search-box');
            searchForm.classList.add('show');
            searchForm.addEventListener('click', e => {
              if (e.target.classList.contains('search-close')) {
                searchForm.classList.remove('show');
              }
            });
          }
          searchForm.querySelector('#s').focus();
          searchForm.querySelector('#s').value = '';
        }
      })
    });
}, 0);

export function hideSearch() {
  document.querySelectorAll('.searchform, .search-box').forEach(searchForm => {
    searchForm.classList.remove('show');
  });
}