
<div >
    <div class="z-tab-content">
        <?php if(!isset($tabNav) || $tabNav){?>
        <ul class="nav-ul scroll-x bar-0 <?=isset($tabNavWrapper)?$tabNavWrapper:null;?>">
            <?php foreach($navItems as $item){ $id = $item['id'];?>
            <li class="z-tab-item <?=$item['state']?>" onclick="tabToggle(this, '#<?=$id?>')">
                <a class="text-truncate"><?=$item['title']?></a>
            </li>
            <?php } ?>
        </ul>
        <?php } ?>
        <div class="">
            <?php foreach($navItems as $item){ $id = $item['id'];?>
            <div class="z-tab-pane <?=$item['state']?>" id="<?=$id?>">
                <?=$item['cont']?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<style>
@media(max-width: 767px){
    .nav-ul{
        margin-left: -15px;
        margin-right: -15px;
    }
}
</style>
<script>
function tabToggle(dis, el){
    var parent = $(dis).closest('.z-tab-content');
    var cont = $(dis).closest('.z-tab-content').find(el);
    parent.find('.z-tab-pane, .z-tab-item').removeClass('active');
    cont.addClass('active');
    $(dis).addClass('active');
}
</script>