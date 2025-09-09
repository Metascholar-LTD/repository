<div>
    <div class="mb-4">
        <h3 class="bold">Class subject</h3>
    </div>
    <div>
        <div>
            
        </div>
        <?php 
        $icon = '
            <avt class="crest1 theme2-1"></avt>
        ';
        foreach($records as $data){
            $l = SITE_ADDR.'assigned_subjects/view/'.$data['id'];
            $title = $data['subjects_code'].' / '.$data['subjects_title'];
            $title = '<a class="page-modal" modal-size="modal-xl" href="'.$l.'">'.$title.'</a>';
            $subtitle1 = '<div class="text-400" style="font-size:13px;">'.$data['staffaccounts_fullname'].'</div>';
            include MAKEUPS.'listItem-sm.php';
            echo '<hr/>';
        } ?>
    </div>
</div>