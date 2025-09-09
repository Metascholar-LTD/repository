<div class="pageSection" data-page-url="explore" style="background-color:#F0F4F9 !important; padding-bottom:200px;">
    <div class="container relative" style="z-index:1;">
        <!-- hero -->
        <div class="row align-items-center relative" style="height: 80vh; padding-top:90px;">
            <div class="col-md-6 col-lg-6 mb-5 d-flex flex-column justify-content-center text-center">
                <div>
                    <h2 class="display-4 text-black font2"><?=htmlText('indexTitle1')?></h2>
                    <h1 class="mb-4 bold" style="color:#004C23 !important;"><?=htmlText('indexSubTitle1')?></h1>
                </div>
                <form action="explore">
                    <!-- <div class="input-group border border-2 border-gold p-3 centeredB bg-white">
                        <input type="text" value="-1" name="ps" hidden/>
                        <input type="text" searchPageAjax autocomplete="off" class="form-control text-xl text-muted border-0 shadow-0" name="search" placeholder="Search & Discover the Wealth of Knowledge"/>
                        <span><button class="pi-search centered pi text-xl avt-md bg-danger text-white"></button></span>
                    </div> -->

                    <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                        <div class="input-group">
                            <input type="text" searchPageAjax autocomplete="off" name="search" placeholder="Welcome! May the light of Knowledge and Wisdom Shine Forth" aria-describedby="button-addon1" class="form-control border-0 bg-light">
                            <div class="input-group-append">
                                <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-lg-6 mb-5 d-flex flex-column justify-content-center text-center">
                <img class="pt-7 pt-md-0 w-100" src="assets/images/hero-header.png" width="470" alt="hero-header">
            </div>
        </div>

    </div>
</div>

<!-- about -->
<div class="container" style="background-color:#FFFEFE !important;padding-top:30px !important;padding-bottom:50px !important;">
        <div class="row" style="padding-top:30px;">
            <div class="col-6 col-md-6 col-lg-6 d-none d-md-block d-lg-block">
                <div class="relative w-100 h-100 fit-object">
                    <img src="<?= set_img_src(htmlText('indexImg1'), 700, 800);?>" alt="intro"/>
                    <!--  assets/images/vc.jpeg-->
                </div>
            </div>
            <div class="col-md-6 col-md-6 col-12"> 
                <div>
                    <p class="text-lg"><?=htmlText('indexSubTitle2')?></p>

                    <div>
                        <div class="centeredB" to href="research_document">
                            <a class="shadow-0 p-3 btn btn-info border">
                                <h5 class="text-white">Explore Repository &nbsp;<i class="pi pi-arrow-right" style="color:#fff !important;"></i></h5>
                            </a>
                            <!-- <i class="pi pi-arrow-right avt avt-md border pill centered border-dark text-danger" style="color:#004C23 !important;"></i> -->
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>