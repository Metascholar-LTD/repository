<?php
if(!isset($records))$records = [];
if(!isset($title) || empty($title))$title = 'My Records History';
?>
<div class="<?=isset($wrapperClass)?$wrapperClass:'';?>" data-page-url="<?php print_link($current_page)?>">
    <div class="row">
      
        <h4 class="font2 bold text-black col mb-3">
        <div class="submain-5">
            <div class="t3-module module mb-3 " id="Mod334">
                <div class="module-inner">
                    <h3 class="module-title ">
                        <span class="titlecard"><?=$title?></span>
                    </h3>
                    <div class="module-ct">
                        <div id="mod-custom334" class="mod-custom custom">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </h4>
        <div class="col-md-3 col-12 mb-3">
            <div class="input-group centeredL p-2">
                <input type="text" class="form-control border-0 text-md" placeholder="Search records by ID" searchpageajax/>
                <i class="pi pi-search p-2 ml-3 text-lg"></i>
            </div>
        </div>
    </div>
    <hr/>
    <ul class="p-0 pageRecords page-records" id="explorItemsRecords">
        <?php 
        if(!empty($records)){
        foreach($records as $data){
            $path = $data['path'];
            $icon = $data['action']=='download'? 'pi-download' : 'pi-upload';
            $download = $data['action']=='download'? true : false;
            $recid = $data['id']; 
            $ctl = $data['ctrl'];
            $x =  explode('/',$ctl);
            $xi = count($x);
            $id = $x[$xi-1];
        ?>
        <li>
            <div>
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="avt avt-md centered surface border">
                            <i class="pi <?=$icon?> text-lg <?= $download?'text-primary':'';?>"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-primary text-md text-capitalize"><?=str_replace('_',' ',$path)?></div>
                        <div class="row">
                            <div class="col"><?=$data['ctrl']?></div>
                            <div class="col"><?=relative_date($data['datein']);?></div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <?php if(!$download){ ?>
                            <div class="dropleft">
                                <button class="btn btn-dark" data-toggle="dropdown">Action</button>
                                <div class="dropdown-menu">
                                    <div class="">
                                        <a class="dropdown-item page-modal" href="<?=$path?>/view/<?=$id?>"><i class="mr-3 pi pi-eye"></i> Open</a>
                                    </div>
                                    <div class="">
                                        <a class="dropdown-item page-modal" href="<?=$path?>/edit/<?=$id?>"><i class="mr-3 pi pi-pencil"></i> Edit</a>
                                    </div>
                                    <?php if($can_delete){ ?>
                                    <div class="">
                                        <a class="text-danger dropdown-item record-delete-btn"   data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal"
                                        href="<?php print_link("activities/delete/$data[id]/?csrf_token=$csrf_token&redirect=$current_page"); ?>">
                                            <i class="mr-3 pi pi-trash"></i> Delete
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } else { ?>
                            <a class="btn btn-primary page-modal" href="<?=$data['path']?>/view/<?=$id?>">Open</a>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
            <hr/>
        </li>
        <?php }
        } else {
            include COMPS."wt/noRec.php";
        } ?>
       <?php
            if (count($records) > 10) {
                echo '<li class="data-loading">
                        <button class="" onclick="loadMore($(this).closest(\'ul\'))">Expand</button> 
                    </li>';
            }
        ?>
    </ul>
</div>
