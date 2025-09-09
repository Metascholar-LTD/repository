
<!-- <section data-page-url="inTab">
<div> -->
<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
$title = 'Discover';
$wrapperClass = "pb-md-3 pb-2";
include COMPS.'wt/topBarSearch2.php';
$search = $this->set_field_value('search');
$query = !empty($search)?"&search=$search":NULL;
$navItems = [
    [
        'id'=>'exploreResearchDocs',
        'title'=>'Research Documents',
        'cont' => '<div class="mx-fill mt-4">'.render_data('research_document/list/?ph=unset'.$query).'</div>',
        'state'=>'active'
    ],
    [
        'id'=>'exploreResearchArticles',
        'title'=>'Research Articles',
        'cont' => '<div class="mx-fill mt-4">'.render_data('research_article/list/?ph=unset'.$query).'</div>',
        'state'=>''
    ],
    [
        'id'=>'exploreResearchNotes',
        'title'=>'Lecture Notes+',
        'cont' => '<div class="mx-fill mt-4">'.render_data('lecture_notes/list/?ph=unset'.$query).'</div>',
        'state'=>''
    ],
    [
        'id'=>'exploreResearchBooks',
        'title'=>'Books+',
        'cont' => '<div class="mx-fill mt-4">'.render_data('ebooks/list/?ph=unset'.$query).'</div>',
        'state'=>''
    ],
    [
        'id'=>'exploreResearchQuestions',
        'title'=>'Past Questions',
        'cont' => '<div class="mx-fill mt-4">'.render_data('past_questions/list/?ph=unset'.$query).'</div>',
        'state'=>''
    ],
    [
        'id'=>'exploreResearchConference',
        'title'=>'Conference',
        'cont' => '<div class="mx-fill mt-4">'.render_data('conferences/list/?ph=unset'.$query).'</div>',
        'state'=>''
    ],
    [
        'id'=>'exploreResearchSpeech',
        'title'=>'Speech',
        'cont' => '<div class="mx-fill mt-4">'.render_data('speech/list/?ph=unset'.$query).'</div>',
        'state'=>''
    ],
];
?>
<div class="pageSection pt-0">
    <div class="container px-0">
        <?php
        $tabNavWrapper = 'border-down';
        include UTILS."tabContent.php";
        ?>
    </div>
</div>
<!-- </div>
</section> -->
