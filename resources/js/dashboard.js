/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap/bootstrap-vue');

/**
 * The following block of code may be used to automatically register Vue components.
 * It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/dashboard/ExampleComponent.vue -> <example-component></example-component>
 */
const files = require.context('./components/common', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

const dashboardFiles = require.context('./components/dashboard', true, /\.vue$/i);
dashboardFiles.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], dashboardFiles(key).default))

/**
 * ag-Grid styles and theme
 */
import "@ag-grid-enterprise/all-modules/dist/styles/ag-grid.css";
import "@ag-grid-enterprise/all-modules/dist/styles/ag-theme-alpine.css";
import { LicenseManager } from "@ag-grid-enterprise/core";

LicenseManager.setLicenseKey(process.env.MIX_AG_GRID_LICENSE_KEY);

import {RichTextEditor} from "./mixins/RichTextEditor";
import CKEditor from '@ckeditor/ckeditor5-vue2';
Vue.use( CKEditor );

import VueFontAwesomePicker from "vfa-picker";
Vue.use(VueFontAwesomePicker);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    mixins: [RichTextEditor],
});
