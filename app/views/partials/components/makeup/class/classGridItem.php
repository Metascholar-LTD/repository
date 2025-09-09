<div class="col-lg-4 col-md-6 col-12">
    <div class="border border-2 p-3 shadow-0 card hover-warning">
        <div class="">
            <div class="centeredB">
                <div class="bold-sm"><i class="pi pi-folder text-primary mr-2"></i> <?=$data['code']?></div> 
                <div class="has-children">
                    <button class="bg-0 p-1"><i class="pi pi-ellipsis-h"></i></button>
                    <?php
                    $dropdownItems = [
                        ['title'=>'Modify','icon'=>'pi pi-pencil', 'attr'=>''],
                        ['title'=>'Delete','icon'=>'pi pi-trash text-danger', 'attr'=>''],
                    ];
                    $class = 'right-0';
                    include UTILS.'dropdownList.php';
                    ?>
                </div>
            </div>
            <div class="bold text-md"><?=$data['title']?></div>
            <div class="text-400 mb-3">Information below depicts "<?=$data['title']?>" current or most recent academic Year or Section </div>
            
            <div class="">
                <button class="round-sm alert-success small page-modal" modal-size="modal-xl"href="<?php print_link('classrooms/list/classlevels.code/'.$data['code']);?>"><?= classroomCount($data['id']);?> Rooms</button>
                <button class="round-sm small">9 head-Tchs.</button>
                <button class="round-sm small">56 Sudents.</button>
            </div>
            <hr/>
            <div class="">
                <button class="bg-0" openNav="classrooms/add">
                    <i class="pi pi-plus"></i> Add a classroom
                </button>
            </div>
        </div>
    </div>
</div>