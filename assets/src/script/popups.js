setTimeout(() => {
  const donatePopup = document.getElementById('donatePopup');
  const closePopup = document.getElementById('closePopup');

  if (donatePopup) {
    togglePopup(true);
    donatePopup.addEventListener('click', (e) => {
      if (e.target.id == 'donatePopup') togglePopup(false);
    })
  }

  if (closePopup) {
    closePopup.addEventListener('click', () => togglePopup(false));
  }
}, 5000);

function togglePopup(show = true) {
  if (show) {
    const nextPopup = sessionStorage.getItem( 'arcticDonatePopup' );
  
    if (nextPopup > new Date()) {
      return;
    }
    
    let expires = new Date();
    expires = expires.setHours(expires.getHours() + 1);
    sessionStorage.setItem( 'arcticDonatePopup', expires );
  }

  ['h-full','opacity-100'].map(className => {
    show 
      ? donatePopup.classList.add(className) 
      : donatePopup.classList.remove(className)
  });
}