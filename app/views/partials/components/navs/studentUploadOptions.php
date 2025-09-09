<?php
$items = [
    [
        'title'=>'Theses / Dissertation',
        'icon'=>'pi pi-plus',
        'attr'=>'to href="research_document/add"',
    ],
    [
        'title'=>'Research article',
        'icon'=>'pi pi-plus',
        'attr'=>'to href="research_article/add"',
    ],
    [
        'title'=>'Lecture Notes',
        'icon'=>'pi pi-plus',
        'attr'=>'to href="lecture_notes/add"',
    ],
    [
        'title'=>'Books & chapters',
        'icon'=>'pi pi-plus',
        'attr'=>'to href="ebooks/add"',
    ],
    [
        'title'=>'Past Question',
        'icon'=>'pi pi-plus',
        'attr'=>'to href="past_questions/add"',
    ]
];
?>
<div>
    <div class="col-12">
        <div>
            <h1>Upload New Records</h1>
            <div>Which records would you like to upload</div>
        </div>
        <hr>
        <?php foreach($items as $item){?>
        <a class="d-block" <?=$item['attr']?>>
            <div class="centeredB">
                <div class="text-lg"><?=$item['title']?></div>
                <div>
                    <i class="pi pi-chevron-right"></i>
                </div>
            </div>
            <hr/>
        </a>
        <?php } ?>
    </div>
</div>