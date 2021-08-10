require('alpinejs');

require('./bootstrap');

import { createApp } from 'vue'

import Modal from './components/Modal.vue';

const app = createApp({});

app.component('modal', Modal)
    .mount('#app');

function toggleNavbar(collapseID) {
  document.getElementById(collapseID).classList.toggle("hidden");
  document.getElementById(collapseID).classList.toggle("block");
}