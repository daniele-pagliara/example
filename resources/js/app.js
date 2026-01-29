import './bootstrap';
import { createApp } from 'vue';

// Importa i componenti Header e Footer che abbiamo creato
// Assicurati che il percorso sia corretto rispetto alla posizione dei file
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
import HeroSection from './components/HeroSection.vue';
import LoginForm from './components/login-03/components/LoginForm.vue';
import SignupForm from './components/signup-03/components/SignupForm.vue';
import HeaderUser from './components/HeaderUser.vue';
import DashboardHome from './components/DashboardHome.vue';
import KpiStatusCard from './components/dashboard/KpiStatusCard.vue';
import AppSidebar from './components/AppSidebar.vue';
import { SidebarProvider } from './components/ui/sidebar';
import ChartAreaInteractive from './components/ChartAreaInteractive.vue';
import DashboardUser from './components/Home.vue';
import TabUtenti from './components/Dashboard.vue';
import UpdateForm from './components/signup-01/components/SignupForm.vue';

// Inizializza l'app Vue
const app = createApp({});

// Registra i componenti globalmente per usarli nei file .blade.php
app.component('header-guest', Header);                          // HEADER OSPITE
app.component('footer-guest', Footer);                          // FOOTER OSPITE
app.component('hero-section', HeroSection);                     // HOME OSPITE
app.component('login-page', LoginForm);                         // PAGINA LOGIN
app.component('signup-page', SignupForm);                       // PAGINA REGISTRAZIONE
app.component('header-user', HeaderUser);                       // HEADER UTENTE
app.component('dashboard-home', DashboardHome);                 // DASHBOARD 1
app.component('kpi-status-card', KpiStatusCard);                // CARD 
app.component('sidebar-provider', SidebarProvider);             // PROVIDER SIDEBAR
app.component('app-sidebar', AppSidebar);                       // SIDEBAR
app.component('chart-area-interactive', ChartAreaInteractive);  // GRAFICO INTERATTIVO
app.component('dashboard-user', DashboardUser);                 // DASHBOARD UTENTE
app.component('tab-utenti', TabUtenti);                         // TABELLA UTENTI
app.component('update-form', UpdateForm);                       // PAGINA MODIFICA DATI

// Monta l'app sull'ID #app che deve essere presente nel tuo master-guest.blade.php
app.mount('#app');