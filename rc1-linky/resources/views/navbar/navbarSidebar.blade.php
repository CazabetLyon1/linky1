<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Connecté</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
        @if ($page=="accueil")
            <li class="active">
        @else
            <li>
        @endif
                <a href="/">
                    <i class="fa fa-home"></i> <span>Accueil</span>
                </a>
            </li>
        @if ($page=="consoView" || $page=="importPage")
            <li class="treeview active">
        @else
            <li class="treeview">
        @endif
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Ma consommation</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                @if ($page=="consoView")
                    <li class="active">
                @else
                    <li>
                @endif
                        <a href="/consoView">
                            <i class="fa fa-circle-o"></i>Visualisation
                        </a>
                    </li>
                @if ($page=="importPage")
                    <li class="active">
                @else
                    <li>
                @endif
                        <a href="/importPage">
                            <i class="fa fa-circle-o">

                            </i>Importer
                        </a>
                    </li>
                </ul>
            </li>
            @if ($page=="parametre")
                <li class="active">
            @else
                <li>
            @endif
                <a href="/parameters">
                    <i class="fa fa-wrench"></i>
                    <span>Paramètres</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>