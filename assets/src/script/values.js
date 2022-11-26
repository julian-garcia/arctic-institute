document.querySelectorAll('.values').forEach(values => {
  values.querySelectorAll('li').forEach((li, i) => {
    li.setAttribute('index', i + 1);
    if (i === 0) {
      li.classList.add('active');
    } else {
      li.classList.remove('active');
    }
  });
  values.querySelectorAll('.wp-block-group').forEach((group, i) => {
    group.classList.add('hidden');
    if (i == 0) { group.classList.remove('hidden'); }
  });
  values.addEventListener('click', e => {
    const classes = e.target.parentNode.parentNode.parentNode.parentNode.classList;
    if (e.target.nodeName === 'LI' && !classes.contains('country-content')) {
      values.querySelectorAll('li').forEach((li, i) => {
        li.classList.remove('active');
      });
      values.querySelectorAll('.wp-block-group').forEach((group, i) => {
        group.classList.add('hidden');
        if (i + 1 == e.target.getAttribute('index')) {
          e.target.classList.add('active');
          group.classList.remove('hidden');
        }
      });
    }
  });
});
