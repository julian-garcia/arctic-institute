import '@fortawesome/fontawesome-free/js/fontawesome';
import '@fortawesome/fontawesome-free/js/brands';
import '@fortawesome/fontawesome-free/js/solid';
import './main.css';
import './style/main.scss';
import './script/values';
import './script/approach';
import './script/search';
import {applyMasonrySpacing} from './script/masonry';

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

document.addEventListener('DOMContentLoaded', () => applyMasonrySpacing('load'));
window.addEventListener('resize', () => applyMasonrySpacing('resize', window.innerWidth));