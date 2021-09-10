<!-- Sidebar -->
<?php 
    $privilege  = $sessionData['privilege'];
    // $privilege  = array_flip($privilege);
    $userDetail = $sessionData['userDetail'];

    //define parent menu here...
    $purchaseOrderParentMenu = array('create_po', 'approve_po', 'ongoing_po');
    $systemSettingParentMenu = array('privilege_setting', 'user_privilege_setting');

?>
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="/../admin-lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block"><?php echo $userDetail->NAMA;?></a>
    </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <?php if(in_array('dashboard', $privilege)):?>
        <li class="nav-item">
        <a href="/dashboard" class="nav-link <?php echo (!empty($menuInfo['childMenu'])) ? ($menuInfo['childMenu'] == 'Dashboard') ? 'active' : '': ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
            Dashboard
            </p>
        </a>
        </li>
        <?php endif;?>
        <li class="nav-header">MENU</li>
        
        <?php 
        if(count(array_intersect($purchaseOrderParentMenu, $privilege)) > 0):
        ?>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                Purchase Orders
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
                <ul class="nav nav-treeview">
                    <?php if(in_array('create_po', $privilege)):?>
                        <li class="nav-item">
                        <a href="pages/forms/general.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create PO</p>
                        </a>
                        </li>
                    <?php endif;?>
                    
                    <?php if(in_array('ongoing_po', $privilege)):?>
                        <li class="nav-item">
                        <a href="pages/forms/advanced.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List On Going PO</p>
                        </a>
                        </li>
                    <?php endif; ?>
                    <?php if(in_array('approve_po', $privilege)):?>
                    <li class="nav-item">
                    <a href="pages/forms/editors.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Waiting Approval</p>
                    </a>
                    </li>
                    <?php endif;?>
                </ul>
        </li>
        <?php endif;?>

        
        <?php 
        if(count(array_intersect($systemSettingParentMenu, $privilege)) > 0):
        ?>
        <li class="nav-item <?php echo (!empty($menuInfo['parentMenu'])) ? ($menuInfo['parentMenu'] == 'System Setting') ? 'menu-is-opening menu-open' : '' : ''; ?> ">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
            System Setting
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            
            <?php if(in_array('privilege_setting', $privilege)):?>
            <li class="nav-item">
            <a href="/privilege/setting" class="nav-link <?php echo (!empty($menuInfo['childMenu'])) ? ($menuInfo['childMenu'] ==  'Privilege Setting') ? 'active' : '': ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Privilege Setting</p>
            </a>
            </li>
            <?php endif;?>
            
            <?php if(in_array('user_privilege_setting', $privilege)):?>
            <li class="nav-item">
            <a href="/privilege/usersetting" class="nav-link <?php echo (!empty($menuInfo['childMenu'])) ? ($menuInfo['childMenu'] == 'User Privilege Setting') ? 'active':'' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>User Privilege Setting</p>
            </a>
            </li>
            <?php endif; ?>
        </ul>
        </li>

        <?php 
        endif;
        ?>
        
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>