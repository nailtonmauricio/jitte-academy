import './bootstrap';
import './scripts-admin';
import './scripts-sbadmin';
import './charts/failedLoginStatistics';
import { MaskInput } from "maska";

//Faz a inclusão dinâmica dos arquivos css específicos da área de login
if (document.getElementById('login-page')) {
    import('../css/login.main.css');
    import('../css/login.util.css');
}

document.addEventListener('DOMContentLoaded', () => {
    // Inicializa Maska para todos os inputs com o seletor data-maska
    new MaskInput("[data-maska]");
});
