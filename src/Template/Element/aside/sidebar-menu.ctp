<?php
$file = $theme['folder'] . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<ul class="sidebar-menu">
    <li class="treeview">
        <a href="/dashboard">
            <i class="fa fa-files-o"></i>
            <span>TABLEAU DE BORDS</span>
            <!-- <span class="label label-primary pull-right"><?php //echo $produits ?></span>-->
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-files-o"></i>
            <span>TRADUCTION APP</span>
           <!-- <span class="label label-primary pull-right"><?php //echo $produits ?></span>-->
        </a>
        <ul class="treeview-menu">
            <li><a href="/translation"><i class="fa fa-circle-o"></i>Traduire l'APP</a></li>
            <li><a href="/translation/download"><i class="fa fa-circle-o"></i> Télécharger Json</a></li>

        </ul>
    </li>



    <li class="treeview">
        <a href="/users/logout">
            <i class="fa fa-user-times"></i>
            <span>DECONNEXION</span>
            <!-- <span class="label label-primary pull-right"><?php //echo $produits ?></span>-->
        </a>
    </li>

</ul>
<?php } ?>
