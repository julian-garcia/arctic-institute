import '@fortawesome/fontawesome-free/scss/fontawesome.scss';
import '@fortawesome/fontawesome-free/scss/brands.scss';
import '@fortawesome/fontawesome-free/scss/solid.scss';
import './main.css';
import './style/main.scss';
import './script/values';
import './script/approach';
import './script/search';
import './script/calendar';
import {applyMasonrySpacing} from './script/masonry';

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

document.addEventListener('DOMContentLoaded', () => applyMasonrySpacing('load'));
window.addEventListener('resize', () => applyMasonrySpacing('resize'));