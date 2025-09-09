<?php
$ctrl = new ApiController;
$months = [
    ['title'=>'January','value'=>'01'],
    ['title'=>'February','value'=>'02'],
    ['title'=>'March','value'=>'03'],
    ['title'=>'April','value'=>'04'],
    ['title'=>'May','value'=>'05'],
    ['title'=>'June','value'=>'06'],
    ['title'=>'July','value'=>'07'],
    ['title'=>'August','value'=>'08'],
    ['title'=>'September','value'=>'09'],
    ['title'=>'October','value'=>'10'],
    ['title'=>'November','value'=>'11'],
    ['title'=>'December','value'=>'12']
];
$pid = $this->set_field_value('promoClassID');
?>


<table class="table table-sm table-hover">
    <thead class="table-header">
        <tr>
            <th class="th-"><a>Students</a></th>
            <?php for($i=1;$i<=31;$i++){?>
            <th class="<?= isDate($i, 'd', 'th-cell-active-date').' tday-'.$i ?>">
                <?=$i?>
            </th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach($months as $m){ $month = $m['value']?>
        <tr>
            <td class="th- point has-tooltip" title="<?=$m['title']?>">
                <a class="clamp-text"><?=$m['title']?></a>
            </td>
            <?php for($i=1;$i<=31;$i++){?>
                <td class="<?php  echo ($month == date('m') ? 'td-' : null ) ; echo isDate($i,'d','cell-active-date')?>">
                    <?=check(isPresent($pid, $i, $month))?>
                </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </tbody>
</table>