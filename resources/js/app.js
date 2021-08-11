require('alpinejs');

require('./bootstrap');

import { createApp } from 'vue'

import ModalProfileEdit from './components/ModalProfileEdit.vue';

const app = createApp({});

app.component('modal-profile-edit', ModalProfileEdit)
    .mount('#app');

function toggleNavbar(collapseID) {
  document.getElementById(collapseID).classList.toggle("hidden");
  document.getElementById(collapseID).classList.toggle("block");
}