<?php
$user = get_active_user("role");
html :: page_css('primeicons/primeicons.css');
html :: page_css('bi/bootstrap-icons.css');
include "app/views/partials/components/css.php";
include "app/views/partials/components/navs/leftNav.php";
if(!user_login_status() || (strtolower($user) != 'admin' && strtolower($user) != 'super admin'))
{include "app/views/partials/components/navs/topNav.php";} else {?>
    <style>
        #page-wrapper{
            min-height: calc(100vh - 60px);
            height: 100%;
            position: relative;
            display: grid;
            grid-template-columns: 250px calc(100% - 250px);
            grid-template-areas:
            "leftNav body";
            width: 100%;
            max-width: var(--max-width);
            min-height: 100vh;
            margin-right: auto;
            margin-left: auto;
            box-sizing: border-box;
            background-color: white;
            background: white !important;
            text-shadow: none !important;
            text-rendering: optimizeLegibility;
        }
        @media(max-width: 993px){
            #page-wrapper{
                grid-template-columns: 70px calc(100% - 70px);
            }
        }
        @media(min-width: 993px){
            .closeSideBarModal{
                left: calc(470px + var(--left-nav-sm-width) - 55px);
            }
        }
        #left-nav[state='1'] .sidebar-modal-holder .modal-item.active{
            margin-left: var(--left-nav-sm-width) !important;
        }
    </style>
<?php } ?>