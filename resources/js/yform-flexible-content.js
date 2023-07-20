import Alpine from 'alpinejs';

window.Alpine = Alpine;

import './utilities.js';
import './value.js';
import './output.js';
import './link.js';
import './linkList.js';
import './media.js';
import './mediaList.js';
import './choice.js';
import './textarea.js';
import './sql.js';
import './group.js';

document.addEventListener('DOMContentLoaded', () => {
  Alpine.start();
});

$(document).on('rex:ready', function (event, container) {
  document.dispatchEvent(new CustomEvent('rexready', { bubbles: true }));
});