const publicationFilter = document.getElementById('publicationFilter');

if (publicationFilter) {
  const selectTopic = document.getElementById('topic');
  const selectType = document.getElementById('type');
  const selectCountry = document.getElementById('country');

  publicationFilter.addEventListener('submit', (e) => {
    e.preventDefault();
    const params = [];
    if (selectCountry.value) {
      params.push(`country=${selectCountry.value}`);
    }
    if (selectType.value) {
      params.push(`type=${selectType.value}`);
    }
    if (selectTopic.value) {
      params.push(`topic=${selectTopic.value}`);
    }
    const urlParams = params.join('&');
    location.href = `/publications${urlParams ? `?${urlParams}` : ''}`;
  })
}