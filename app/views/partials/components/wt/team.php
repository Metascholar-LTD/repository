<div class="">
    <div class="row pageRecords page-records">
        <?php 
        if(!empty($records)){
        foreach($records as $item){ $rec_id = $item['id'];?>
        <div class="mb-3 col-lg-4 col-md-6 col-12">
            <div class="bg-light h-100 card">
                <div class="texture-gold border-gold fit-object " style="padding-top:70%"> 
                    <img src="<?php print_link(set_img_src($item['img'],700,700));?>" alt="profile"/>
                </div>
                <div class="p-3">
                    <div class="text-line-2 text-gold bold mb-2">
                        <a <?php if(!empty($item['profile_link'])){?> target="_blank" href="<?=$item['profile_link']?>" <?php } ?> class="text-lg"><?=$item['name']?></a>
                    </div>
                    <div class="text-black"><?=$item['affiliation']?></div>
                    <div class="text-black"><?=$item['status']?></div>
                    <div class="text-black"><?=$item['country']?></div>
                </div>

                <?php if(strtolower(USER_ROLE) == 'super admin'){?>
                    <div class="p-3">
                    <a class="btn btn-white page-modal" href="<?php print_link("team/edit/$rec_id"); ?>">
                        <i class="pi pi-pencil"></i> Edit
                    </a>
                    <a  class="btn btn-white record-delete-btn" href="<?php print_link("team/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                        <i class="pi pi-trash text-danger"></i> Delete 
                    </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <div class="data-loading col-12 p-3">
           <!-- <button class="" onclick="loadMore($(this).closest('div.row'))">load more</button>  -->
        </div> 
        <?php } else {
            include COMPS."wt/noRec.php";
        } ?>
    </div>
</div>