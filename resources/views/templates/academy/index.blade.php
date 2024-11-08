<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite([
    'resources/css/app.css',
    'resources/js/app.js'
    ])

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>{{ env('APP_NAME') }}</title>
    @livewireStyles
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark bg-gradient">
    <!--
    ====================================================================================================================
    Nav Brand
    ====================================================================================================================
    -->
    <a class="navbar-brand ps-3" href="#">{{ env('APP_NAME') }}</a>
    <!-- Sidebar Toggle-->
    @if(auth()->check())
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    @endif

    <!-- Navbar Search-->
    {{--@livewire('form-search')--}}

    <!--
    ====================================================================================================================
    Navbar
    ====================================================================================================================
    -->
    <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
        @if(!auth()->check())
            <li class="nav-item">
                {{--<a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Entrar<span class="fa fa-sign-in ms-3"></span>
                </a>--}}

                <a href="#" class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLogin" aria-controls="offcanvasRight">
                    Entrar<span class="fa fa-sign-in ms-3"></span>
                </a>
            </li>
        @else
            <li class="nav-item"><a class="nav-link position-relative" id="navbarGift" href="#" role="button"><i class="fa-solid fa-bell"></i></a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fa-solid fa-user-gear me-2"></i>Perfil</a></li>
                    <li>
                        <hr class="dropdown-divider"/>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('visitor.logout', ['user']) }}"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Sair</a></li>
                </ul>
            </li>
        @endif
    </ul>
</nav>

<!--
========================================================================================================================
Side Navbar
========================================================================================================================
-->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        @if(auth()->check())
            <nav class="sb-sidenav accordion sb-sidenav-five" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a @class(['nav-link', 'active'=>isset($menu) && $menu == 'inicio'])  href="{{ route('home.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-column"></i></div>
                        Dashboard
                    </a>

                    <a @class(['nav-link', 'active'=>isset($menu) && $menu == 'cursos'])  href="{{ route('all-courses.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-swatchbook"></i></div>
                        Cursos
                    </a>

                    <a @class(['nav-link'])  href="{{ route('visitor.logout', ['user']) }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                        Sair
                    </a>

                    <div class="sb-sidenav-menu-heading">Trilha de Sucesso</div>
                    <a @class(['nav-link', 'active'=>isset($menu) && $menu == 'meus-cursos']) href="{{ route('my-courses.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-graduate"></i></div>
                        Meus Cursos
                    </a>

                    <a @class(['nav-link', 'active'=>isset($menu) && $menu == 'avaliacoes']) href="{{ route('quiz.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-spell-check"></i></div>
                        Avaliações
                    </a>

                    <div class="sb-sidenav-menu-heading">Minhas Conquistas</div>
                    <a @class(['nav-link', 'active'=>isset($menu) && $menu == 'declaracao']) href="{{ route('attendance.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                        Minhas Declarações
                    </a>

                    <a @class(['nav-link', 'active'=>isset($menu) && $menu == 'certificado']) href="{{ route('certificate.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-trophy"></i></div>
                        Meus Certificados
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer p-4">
                <div class="small">Logged in as:
                    <span class="text-capitalize">
                        @if(auth()->check())
                            {{ explode(' ', auth()->user()->name)[0] }}
                        @endif
                    </span>
                </div>
            </div>
        </nav>
        @endif
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container px-4">
                <x-alert/>
                @yield('content')
            </div>
        </main>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; {{ env('APP_NAME') }} {{ date('Y') }}</div>
                    <div>
                        <a href="#">Política de privacidade</a>
                        <a href="#">Termos &amp; Condições</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<!--
========================================================================================================================
Modal Login
========================================================================================================================
-->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark bg-gradient">
                <h5 class="modal-title text-white text-center w-100" id="loginModal">Login</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" action="{{ route('visitor.login') }}">
                    @csrf
                    @method('POST')
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="e-mail">
                        <label for="email">E-Mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                        <label for="password">Senha</label>
                    </div>
                    <div class="d-grid gap-2 mb-2">
                        <button type="submit" class="btn btn-dark bg-gradient">Enviar</button>
                    </div>
                </form>
                <hr>
                <div class="row justify-content-around mt-2">
                    <!--
                    ========================================================================================================================
                    TRIGGER MODAL RECUPERAR SENHA
                    ========================================================================================================================
                    -->
                    <div class="col-6">
                        <a class="text-secondary" href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Cadastre-se</a>
                    </div>
                    <div class="col-6 text-end">
                        <a class="text-secondary" href="#" data-bs-toggle="modal" data-bs-target="#recoverModal">Esqueceu a senha?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--
========================================================================================================================
Offcanvas Login
========================================================================================================================
-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasLogin" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="form-floating" action="{{ route('visitor.login') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="e-mail">
                <label for="email">E-Mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                <label for="password">Senha</label>
            </div>
            <div class="d-grid gap-2 mb-2">
                <button type="submit" class="btn btn-dark bg-gradient">Enviar</button>
            </div>
        </form>
        <div class="row justify-content-around mt-2">
            <!-- Link para abrir Offcanvas de Cadastro -->
            <div class="col-6">
                <a class="text-secondary" href="#" onclick="openRegister()">Cadastre-se</a>
            </div>
            <!-- Link para abrir Offcanvas de Recuperar Senha -->
            <div class="col-6 text-end">
                <a class="text-secondary" href="#" onclick="openRecover()">Esqueceu a senha?</a>
            </div>
        </div>
    </div>
</div>

<!--
========================================================================================================================
Login Cadastrar
========================================================================================================================
-->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark bg-gradient">
                <h5 class="modal-title text-white text-center w-100" id="loginModal">Novo Usuário</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" action="{{ route('student.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
                        <label for="name">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="document" name="document" placeholder="CPF" data-maska="###.###.###-##">
                        <label for="document">CPF</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Contato" data-maska="(##) #####-####">
                        <label for="contact">Contato</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="e-mail">
                        <label for="email">E-Mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                        <label for="password">Senha</label>
                    </div>
                    <div class="d-grid gap-2 mb-2">
                        <button type="submit" class="btn btn-dark bg-gradient">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--
========================================================================================================================
Offcanvas Cadastrar
========================================================================================================================
-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRegister" aria-labelledby="offcanvasRegisterLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRegisterLabel">Cadastre-se</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

    </div>
</div>

<!--
========================================================================================================================
Recuperar Senha
========================================================================================================================
-->
<div class="modal fade" id="recoverModal" tabindex="-1" aria-labelledby="recoverModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark bg-gradient">
                <h5 class="modal-title text-white text-center w-100" id="recoverModal">Recuperar Senha</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" action="#">
                    @csrf
                    @method('POST')
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="e-mail">
                        <label for="email">E-Mail</label>
                    </div>
                    <div class="d-grid gap-2 mb-2">
                        <button type="submit" class="btn btn-dark bg-gradient">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--
========================================================================================================================
Offcanvas Recuperar Senha
========================================================================================================================
-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRecover" aria-labelledby="offcanvasRecoverLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRecoverLabel">Recuperar Senha</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

    </div>
</div>

@stack('scripts')
@livewireScripts
</body>
</html>
