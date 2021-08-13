require('alpinejs');

require('./bootstrap');

import { createApp } from 'vue'

import ModalProfileEdit from './components/ModalProfileEdit.vue';
import SocialLink from './components/SocialLink.vue';
import FileUploader from './components/FileUploader.vue';

const app = createApp({});

app.component('modal-profile-edit', ModalProfileEdit)
    .component('social-link', SocialLink)
    .component('file-uploader', FileUploader)
    .mount('#app');

function toggleNavbar(collapseID) {
  document.getElementById(collapseID).classList.toggle("hidden");
  document.getElementById(collapseID).classList.toggle("block");
}