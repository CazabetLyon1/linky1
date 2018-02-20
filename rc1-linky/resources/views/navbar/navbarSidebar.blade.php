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
                <a href="#"><i class="fa fa-circle text-success"></i> Certifié</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-home"></i> <span>Acceuil</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Ma consommation</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Visualisation</a></li>
                    <li><a href="index2.html"><i class="fa fa-circle-o"></i>Importer</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-wrench"></i>
                    <span>Paramètres</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>