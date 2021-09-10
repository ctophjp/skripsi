<!-- Sidebar -->
<?php 
    $privilege  = $sessionData['privilege'];
    // $privilege  = array_flip($privilege);
    $userDetail = $sessionData['userDetail'];

    //define parent menu here...
    $systemSettingParentMenu = array('privilege_setting', 'user_privilege_setting');
    $drillingParrentMenu     = array('initiate_drilling');
    $applicationSetting      = array('pit_setting', 'blok_setting', 'operator_setting', 'alatberat_setting');

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

        <?php 
        if(count(array_intersect($drillingParrentMenu, $privilege)) > 0):
        ?>
        <li class="nav-item <?php echo (!empty($menuInfo['parentMenu'])) ? ($menuInfo['parentMenu'] == 'System Setting') ? 'menu-is-opening menu-open' : '' : ''; ?> ">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
            Drilling
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            
            <?php if(in_array('initiate_drilling', $privilege)):?>
            <li class="nav-item">
            <a href="/privilege/setting" class="nav-link <?php echo (!empty($menuInfo['childMenu'])) ? ($menuInfo['childMenu'] ==  'Privilege Setting') ? 'active' : '': ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Initiate Drilling</p>
            </a>
            </li>
            <?php endif;?>
        </ul>
        </li>

        <?php 
        endif;
        ?>

        <?php 
        if(count(array_intersect($applicationSetting, $privilege)) > 0):
        ?>
        <li class="nav-item <?php echo (!empty($menuInfo['parentMenu'])) ? ($menuInfo['parentMenu'] == 'Application Setting') ? 'menu-is-opening menu-open' : '' : ''; ?> ">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
            Application Setting
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            
            <?php if(in_array('pit_setting', $privilege)):?>
            <li class="nav-item">
            <a href="/privilege/setting" class="nav-link <?php echo (!empty($menuInfo['childMenu'])) ? ($menuInfo['childMenu'] ==  'Pit') ? 'active' : '': ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Pit</p>
            </a>
            </li>
            <?php endif;?>

            <?php if(in_array('blok_setting', $privilege)):?>
            <li class="nav-item">
            <a href="/privilege/setting" class="nav-link <?php echo (!empty($menuInfo['childMenu'])) ? ($menuInfo['childMenu'] ==  'Blok') ? 'active' : '': ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Blok</p>
            </a>
            </li>
            <?php endif;?>

            <?php if(in_array('operator_setting', $privilege)):?>
            <li class="nav-item">
            <a href="/privilege/setting" class="nav-link <?php echo (!empty($menuInfo['childMenu'])) ? ($menuInfo['childMenu'] ==  'Operator') ? 'active' : '': ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Operator</p>
            </a>
            </li>
            <?php endif;?>
            

            <?php if(in_array('alatberat_setting', $privilege)):?>
            <li class="nav-item">
            <a href="/privilege/setting" class="nav-link <?php echo (!empty($menuInfo['childMenu'])) ? ($menuInfo['childMenu'] ==  'Alat Berat') ? 'active' : '': ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Alat Berat</p>
            </a>
            </li>
            <?php endif;?>

        </ul>
        </li>

        <?php 
        endif;
        ?>
        
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>