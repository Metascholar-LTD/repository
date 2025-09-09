<?php
?> 
<div class="">
    <div class="">
        <h4 class="font2 bold text-black">Recently Added</h4>
    </div>
    <hr class="border border-danger short"/>
    <div class="row">
        <table class="table table-hover">
            <tbody class="pageRecords page-records">
                <?php 
                if(!empty($records)){
                foreach($records as $item){?>
                <tr>
                    <td style="width:30px;">
                        <label class="custom-control custom-checkbox custom-control-inline">
                            <input class="optioncheck custom-control-input" name="name" type="checkbox" />
                            <span class="custom-control-label pt-1"></span>
                        </label>
                    </td>
                    <td style="width:70px;">
                        <img src="<?= print_link(IMG_DIR.'notes2.png'); ?>" alt=" paper thumb" width="40px"> 
                    </td>
                    <td>
                        <div class="text-md text-black"><?=$item['course_title']?></div>
                        <div><?='<span class="pill">'.$item['course_code'].'</span> / '.$item['program']?> </div>
                    </td>
                    <td><?=$item['academic_year']?></td>
                    <td><a class="text-primary page-modal" href="<?php print_link('past_questions/view/'.$item['id']);?>">Preview</a></td>
                </tr>
                <?php } ?>
                <tr class="data-loading">
                    <td></td>
                    <td></td>
                    <td><button class="" onclick="loadMore($(this).closest('table'))">load more</button></td>
                    <td></td>
                    <td></td>
                </tr> 
                <?php } else { include COMPS."wt/noRec.php"; } ?>
            </tbody>
        </table>
    </div>
</div>