<?php
$arr1 = [
    [
        'title' => 'Introduction to Computer Science',
        'edition' => '3rd Edition',
        'author' => 'John Doe',
        'thumb' => 'book1.csv',
        'file_link' => 'cs_book.pdf',
        'category' => 'Computer Science',
    ],
    [
        'title' => 'History of Art',
        'edition' => 'Revised Edition',
        'author' => 'Jane Smith',
        'thumb' => 'book2.csv',
        'file_link' => 'art_book.pdf',
        'category' => 'Art',
    ],
    [
        'title' => 'Economics for Beginners',
        'edition' => '2nd Edition',
        'author' => 'Michael Johnson',
        'thumb' => 'book3.pdf',
        'file_link' => 'econ_book.pdf',
        'category' => 'Economics',
    ],
    [
        'title' => 'Chemistry Fundamentals',
        'edition' => '4th Edition',
        'author' => 'Emma Brown',
        'thumb' => 'book4.csv',
        'file_link' => 'chem_book.pdf',
        'category' => 'Chemistry',
    ],
    [
        'title' => 'Literature Anthology',
        'edition' => '5th Edition',
        'author' => 'William Taylor',
        'thumb' => 'book5.pdf',
        'file_link' => 'lit_book.pdf',
        'category' => 'Literature',
    ],
    // Add more books with their properties as needed
];

?>
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
                        <img src="<?= print_link(IMG_DIR.'es fm.png'); ?>" alt=" paper thumb" width="40px"> 
                    </td>
                    <td>
                        <div class="text-md text-black"><?=$item['title']?></div>
                        <div class=""><?=$item['authors']?></div>
                        <div class="small"><?=$item['publisher']?></div>
                    </td>
                    <td><?=$item['issue_date']?></td>
                    <td><a class="text-primary page-modal" href="<?php print_link('conferences/view/'.$item['id']);?>">Preview</a></td>
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