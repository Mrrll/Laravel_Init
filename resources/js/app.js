import './bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
import 'jquery-ui/dist/jquery-ui';
import './bootstrap-tagsinput';
import './aside';
import './header';
import * as functions from './functions'
window.functions = functions
import './setting'

// Tooltip
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
