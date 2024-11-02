<div class="sidebar-header border-bottom">
    <div class="sidebar-brand">
        <svg class="sidebar-brand-full" width="88" height="32" alt="CoreUI Logo">
            <use xlink:href="../public/assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
            <use xlink:href="../public/assets/brand/coreui.svg#signet"></use>
        </svg>
    </div>
    <button class="btn-close d-lg-none" type="button" data-coreui-dismiss="offcanvas" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
</div>
<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
    <li class="nav-item"><a class="nav-link" href="index.html">
            <svg class="nav-icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
    <li class="nav-title">Theme</li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="../public/ vendors/@coreui/icons/svg/free.svg#cil-cursor"></use>
            </svg> LotoFacil</a>
        <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" onclick="redirecionarNumerosmaisSaidos();"><span class="nav-icon"><span class="nav-icon-bullet"></span></span>Número mais saídos</a></li>
            <li class="nav-item"><a class="nav-link" onclick="redirecionarValorTotalPorJogo();"><span class="nav-icon"><span class="nav-icon-bullet"></span></span>Soma por jogos</a></li>
            <li class="nav-item"><a class="nav-link" href="buttons/dropdowns.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Dropdowns</a></li>
        </ul>
    </li>
</ul>
<div class="sidebar-footer border-top d-none d-md-flex">
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>