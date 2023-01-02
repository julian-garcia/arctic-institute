import '@fortawesome/fontawesome-free/scss/fontawesome.scss';
import '@fortawesome/fontawesome-free/scss/brands.scss';
import '@fortawesome/fontawesome-free/scss/solid.scss';
import 'cookieconsent/build/cookieconsent.min.js';
import 'cookieconsent/build/cookieconsent.min.css';
import './main.css';
import './style/main.scss';
import './script/values';
import './script/approach';
import './script/search';
import './script/calendar';
import './script/experts';
import './script/cookie-consent';
import './script/publication-filter';
import {hideSearch} from './script/search';

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

window.addEventListener('resize', () => { hideSearch(); });

const publicationTypes = document.querySelector('.publication-types');
if (publicationTypes) {
  publicationTypes.addEventListener('click', (e) => {
    document.querySelectorAll('.publication-types .type-text')
      .forEach(type => type.style.display = "none");
    const pubTypeElement = document.querySelector('.publication-types .' + e.target.textContent.replace(/\s/g, '-'));
    pubTypeElement.style.display = "block";
  });
}