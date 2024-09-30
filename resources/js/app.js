import './bootstrap';
import './scripts-admin';
import './scripts-sbadmin';
import './charts/failedLoginStatistics';

//Faz a inclusão dinâmica dos arquivos css específicos da área de login
if (document.getElementById('login-page')) {
    import('../css/login.main.css');
    import('../css/login.util.css');
}
