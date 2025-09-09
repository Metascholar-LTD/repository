<?php
$ctrl = new ApiController;
$faculteis = $ctrl->arr("SELECT * FROM faculties ORDER BY id DESC LIMIT 0,6");
?>
<div class="pageSection py-5" style="background-color:var(--surface-50)">
    <div class="container relative" style="z-index:1;">
        <div class="row relativ centered mb-5">
            <?php foreach([1,2,3] as $item){ ?>
            <div class="col-lg-3 col-md-4 col-6 p-3 text-center">
                <div>
                    <div class="centered" >
                        <img width="auto" src="<?php print_link(set_img_src(htmlText('counterItem'.$item.'-svg')))?>" alt="factultiy"/>
                    </div>
                    <div class="p-3">
                        <h1 class="text-black bold mb-2"><?=htmlText('counterItem'.$item.'-title')?></h1>
                        <p class="text-line-2 text-md-lg"><?=htmlText('counterItem'.$item.'-subtitle')?></p>
                    </div>
                </div>
            </div>
            <?php  } ?>
        </div>
        
        <div class="container relative  text-center mb-5" style="z-index:1;">
            <div class="">
                <div>
                    <h1 class="font2 text-black break-line"><?=htmlText('indexTitle2')?></h1>
                </div>
            </div>
        </div>

        <div class="row relativ">
            <?php foreach($faculteis as $item){ ?>
            <div class="col-lg-4 col-md-6 col-12" >
                <div>
                    <div class="frameOut1">
                        <img width="100%" src="<?php print_link(set_img_src($item['img'],400,300))?>" alt="factultiy"/>
                    </div>
                    <div class="p-3">
                        <h4 class="text-black mb-2 bold text-capitalize"><?=$item['title']?></h4>
                        <p class="text-line-2 text-md-lg"><?=$item['description']?></p>
                    </div>
                </div>
            </div>
            <?php  } ?>
        </div>
        
    </div>
</div>