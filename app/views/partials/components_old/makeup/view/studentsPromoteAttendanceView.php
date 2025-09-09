<?php
$session = $data['academicSession'];
$year = $data['academicYear'];
$classroom = $data['classroom'];
?>


<div>
    <div class="mb-4">
        <h3 class="bold"><?=$data['studentaccounts_fullname']?></h3>
        <div class="">
            <?=$data['classrooms_title']?>
            <i class="pi pi-arrow-right small mx-1"></i>
            <?=toTerm($data['academicSession']).' / '.$data['academicYear'] ?>
        </div>
        <div class="text-muted"><?='Head Teacher Name'?></div>
    </div>
    <div>
        <?php 
        $query = "?assessmentsforastudent.session=$session";
        $query = $query."&assessmentsforastudent.academicYear=$year";
        $query = $query."&assessmentsforastudent.classroom=$classroom";
        echo render_data('attendance/student/0/?promoClassID='.$data['id'])
        ?>
    </div>
</div>