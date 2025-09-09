
<section data-page-url="inTab">
<div>
<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
$navItems = [
    [
        'id'=>'GeneralSettings',
        'title'=>'General',
        'cont' => '<div class="mx-fill mt-4">'.render_data('settings/gen/?ph=unset').'</div>',
        'state'=>'active'
    ],
    [
        'id'=>'Tags',
        'title'=>'Tags',
        'cont' => '<div class="mx-fill mt-4">'.render_data('tags/list/?ph=unset').'</div>',
        'state'=>''
    ],
    [
        'id'=>'Roles',
        'title'=>'Roles',
        'cont' => '<div class="mx-fill mt-4">'.render_data('assigned_department/list/?ph=unset').'</div>',
        'state'=>''
    ],
    [
        'id'=>'Plugins',
        'title'=>'Packages & Plugins',
        'cont' => '<div class="mx-fill mt-4">'.render_data('packages/list/?ph=unset').'</div>',
        'state'=>''
    ],
    [
        'id'=>'Payments',
        'title'=>'Payments',
        'cont' => '<div class="mx-fill mt-4">WORK IN PROGRESS...</div>',
        'state'=>''
    ],
];
?>
<div class="pageSection pt-0">
    <div class="container px-0">
        <?php 
        include "settings/head.php"; 
        
        $tabNavWrapper = 'border-down';
        include UTILS."tabContent.php";
        ?>
    </div>
</div>
</div>
</section>
