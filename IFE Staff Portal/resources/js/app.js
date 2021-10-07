require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Sortable from 'sortablejs';

window.Sortable = require('sortablejs').default;
