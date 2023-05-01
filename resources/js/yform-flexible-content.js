import Alpine from 'alpinejs';
// import collapse from '@alpinejs/collapse';
// import ajax from '@imacrayon/alpine-ajax'

window.Alpine = Alpine;
// Alpine.plugin(collapse);
// Alpine.plugin(ajax);

import './value.js';
import './output.js';
import './link.js';
import './media.js';
import './mediaList.js';

document.addEventListener("DOMContentLoaded", () => {
  Alpine.start();
});

$(document).on('rex:ready', function (event, container) {
  document.dispatchEvent(new CustomEvent('rexready', { bubbles: true }));
});