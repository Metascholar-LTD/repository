<?php
$arr1 = [
    [
        'title' => 'Introduction to Computer Science',
        'edition' => '3rd Edition',
        'author' => 'John Doe',
        'thumb' => 'book1.jpg',
        'file_link' => 'cs_book.pdf',
        'category' => 'Computer Science',
    ],
    [
        'title' => 'History of Art',
        'edition' => 'Revised Edition',
        'author' => 'Jane Smith',
        'thumb' => 'book2.jpg',
        'file_link' => 'art_book.pdf',
        'category' => 'Art',
    ],
    [
        'title' => 'Economics for Beginners',
        'edition' => '2nd Edition',
        'author' => 'Michael Johnson',
        'thumb' => 'book3.jpg',
        'file_link' => 'econ_book.pdf',
        'category' => 'Economics',
    ],
    [
        'title' => 'Chemistry Fundamentals',
        'edition' => '4th Edition',
        'author' => 'Emma Brown',
        'thumb' => 'book4.jpg',
        'file_link' => 'chem_book.pdf',
        'category' => 'Chemistry',
    ],
    [
        'title' => 'Literature Anthology',
        'edition' => '5th Edition',
        'author' => 'William Taylor',
        'thumb' => 'book5.jpg',
        'file_link' => 'lit_book.pdf',
        'category' => 'Literature',
    ],
    // Add more books with their properties as needed
];

?>
<div class="">
    <div class="">
        <h4 class="font2 bold text-black">Recently Added</h4>
    </div>
    <hr class="border border-danger short"/>
    <div class="row">
        <?php foreach($arr1 as $item){?>
        <div class="mb-3 col-lg-4 col-md-6 col-12 has-tooltip" title="<?=$item['title']?>">
            <div class="row m-0 h-100">
                <div class="col-auto texture fit-object" style="width:110px;height:140px;">
                    <img src="<?php print_link(set_img_src(IMGDIR.$item['thumb'],200));?>" alt="">
                </div>
                <div class="col py-2">
                    <div class="font2 bold text-line-2"><?=$item['title']?></div>
                    <div class="small text-400"><?=$item['edition']?></div>
                    <div class="small text-400"><?=$item['author']?></div>
                    <button class="pill text-white  mt-2 small bg-black pill"> (23) Download</button>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>