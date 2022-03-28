import '@fortawesome/fontawesome-free/scss/fontawesome.scss';
import '@fortawesome/fontawesome-free/scss/brands.scss';
import '@fortawesome/fontawesome-free/scss/solid.scss';
import './main.css';
import './style/main.scss';
import './script/values';
import './script/approach';
import './script/search';
import './script/calendar';
import './script/experts';
import {applyMasonrySpacing} from './script/masonry';
import {hideSearch} from './script/search';

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

document.addEventListener('DOMContentLoaded', () => applyMasonrySpacing());
window.addEventListener('resize', () => { hideSearch(); });

document.querySelector('.publication-types').addEventListener('click', (e) => {
  document.querySelectorAll('.publication-types .type-text')
    .forEach(type => type.style.display = "none");
  const pubTypeElement = document.querySelector('.publication-types .' + e.target.textContent.replace(/\s/g, '-'));
  pubTypeElement.style.display = "block";
});