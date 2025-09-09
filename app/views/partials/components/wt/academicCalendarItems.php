
<div class="mt-3">
    <!-- <div class="">
        <h4 class="font2 bold text-black">Recently Added</h4>
    </div>
    <hr class="border border-danger short"/> -->
    <div class="submain-5">
            <div class="t3-module module mb-3 " id="Mod334">
                <div class="module-inner">
                    <h3 class="module-title ">
                        <span class="titlecard">Recent Submissions</span>
                    </h3>
                    <div class="module-ct">
                        <div id="mod-custom334" class="mod-custom custom">
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        <img src="<?= print_link(IMG_DIR.'calendar alt.png'); ?>" alt=" paper thumb" width="40px"> 
                    </td>
                    <td>
                        <div class="text-md text-black"><?=$item['title']?></div>
                        <div class="small"><?=$item['faculty']?></div>
                    </td>
                    <td><?=$item['year']?></td>
                    <td><a class="text-primary page-modal" href="<?php print_link('academic_calendar/view/'.$item['id']);?>">Preview</a></td>
                </tr>
                <?php } ?>
                <tr class="data-loading">
                    <td></td>
                    <td></td>
                    <td>
                    <?php
                        if (count($records) > 10) {
                            echo '<button class="" onclick="loadMore($(this).closest(\'tbody\'))">Expand</button>';
                        }
                    ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr> 
                <?php } else { include COMPS."wt/noRec.php"; } ?>
            </tbody>
        </table>
    </div>
</div>