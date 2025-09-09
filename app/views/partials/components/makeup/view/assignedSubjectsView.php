<?php
$session = $data['session'];
$year = $data['academicYear'];
$classroom = $data['classroom'];
?>


<div>
    <div class="mb-4">
        <h3 class="bold"><?=$data['subjects_title']?></h3>
        <div>
            <?=$data['classrooms_title']?>
            <i class="pi pi-arrow-right small mx-1"></i>
            <?=toTerm($data['session']).' / '.$data['academicYear']?> 
        </div>
        <div class="text-muted"><?=$data['staffaccounts_fullname']?></div>
    </div>
    <div>
        <?php 
        $query = "?assessmentsforasubject.academicSession=$session";
        $query = $query."&assessmentsforasubject.academicYear=$year";
        $query = $query."&assessmentsforasubject.classroom=$classroom";
        echo render_data('assessmentsforasubject/list/subject/'.$data['subject'].$query)
        ?>
    </div>
</div>