<?php
$accountAttr = 'onclick="tabToggle(this, `#settings_Account`)"';
$inviteFriendsAttr = 'onclick="tabToggle(this, `#settings_InviteFriends`)"';
$notificationsAttr = 'onclick="tabToggle(this, `#settings_Notifications`)"';
$securityAttr = 'onclick="tabToggle(this, `#settings_Security`)"';
if(is_mobile()){
    $accountAttr = 'to href="settings/account"';
    $inviteFriendsAttr = 'to href="settings/invite_friends"';
    $notificationsAttr = 'to href="settings/notifications"';
    $securityAttr = 'to href="settings/security"';
}
$itemsLists = [
    ['title'=>'Account', 'icon'=>'pi pi-user', 'attr'=>$accountAttr],
    ['title'=>'Invite friends', 'icon'=>'pi pi-users', 'attr'=>$inviteFriendsAttr],
    ['title'=>'Notifications', 'icon'=>'pi pi-bell', 'attr'=>$notificationsAttr],
    ['title'=>'Security', 'icon'=>'pi pi-shield', 'attr'=>$securityAttr],
    ['title'=>'Help', 'icon'=>'bi bi-life-preserver', 'attr'=>''],
    ['title'=>'Ads', 'icon'=>'pi pi-megaphone', 'attr'=>''],
    ['title'=>'About app', 'icon'=>'pi pi-building', 'attr'=>''],
    ['title'=>'Theme', 'icon'=>'pi pi-palette', 'attr'=>''],
    ['title'=>'Log out', 'icon'=>'pi pi-sign-out', 'attr'=>'onclick="logout()"'],
];
$tabNav = false;
$navItems = [
    ['id'=>'settings_Account', 'state'=>'active', 'cont'=>render_data('settings/account')],
    ['id'=>'settings_InviteFriends', 'state'=>'', 'cont'=>render_data('settings/invite_friends')],
    ['id'=>'settings_Notifications', 'state'=>'', 'cont'=>render_data('settings/notifications')],
    ['id'=>'settings_Security', 'state'=>'', 'cont'=>render_data('settings/security')],
]
?>

<div class="z-tab-content">
    <div class="row">
        <div class="<?= !is_mobile()?'side-page-cont p-3':'col-12'?>">
            <h4 class="mb-3 pt-2">Settings</h4>
            <?php include UTILS.'itemList.php'?>
        </div>
        <?php if(!is_mobile()){?>
        <div class="col">
            <?php include UTILS.'tabContent.php'?>
        </div>
        <?php } ?>
    </div>
</div>
<script>
// logout function
function logout(){
	var logout = "<?php print_link('index/logout?csrf_token='.Csrf::$token); ?>";
	showToastSuccess('loging out...');
	location.href = logout;
}
</script>
