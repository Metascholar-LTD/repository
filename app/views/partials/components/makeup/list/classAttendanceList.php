<?php
$ctrl = new ApiController;
$pid = $this->set_field_value('promoClassID');
$classroom = $this->set_field_value('classroom');
$session = $this->set_field_value('session');
$year = $this->set_field_value('year');
$students = $ctrl->arr("SELECT * FROM student_active_class WHERE ( classroom = '$classroom' AND academicSession = '$session' AND academicYear  = '$year' )");        
?>

<table class="table table-sm table-hover">
    <thead class="table-header">
        <tr>
            <th class="th- text-left pl-2">Students</th>
            <?php for($i=1;$i<=31;$i++){?>
            <th class="<?= isDate($i, 'd', 'th-cell-active-date').' tday-'.$i ?> th-"><?=$i?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach($students as $data){ 
            $rec_id = $data['id']; $studentID = $data['studentID'];
            $link = "attendance/student/studentID/$studentID?classroomid=$classroom&year=$year";
        ?>
        <tr>
            <td class="th- text-left pl-2 point has-tooltip" title="<?=$data['fullname']?>">
                <a class="clamp-text" href="<?php print_link($link);?>"><?=$data['fullname']?></a>
            </td>
            <?php for($i=1;$i<=31;$i++){
            ?>
            <td class="<?php  echo ($month == date('m') ? 'td-' : null ) ; echo isDate($i, 'd', 'cell-active-date') ?>">
                <?=check(isPresent($rec_id, $i, $month))?>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
{
// students/attendance.page
$('body').on('change', "[name='range_attendance_month']", function(){
    var $value= $(this).val();
    var $url = $(this).closest('.sliderWrapper').attr('pageUrl');
    url = new URL(siteAddr+$url);
    urlData = url.searchParams;
    urlData.set('month',$value);
    $newUrl = url.toString();
    showToastSuccess($newUrl);
});
}
</script>