<div class="pageSection texture" data-page-url="explore">
    <div class="container relative" style="z-index:1;">
        <div class="row align-items-end relativ">
            <div class="col-md-7 col-12">
                <div class="pt-5">
                    <h1 class="display-3 text-black font2"><?=htmlText('indexTitle1')?></h1>
                    <h2 class="mb-4 text-gold bold"><?=htmlText('indexSubTitle1')?></h2>
                </div>
            </div>
            <div class="col-md-10 col-12 mb-5"> 
                <form class="centered" action="explore">
                    <div class="input-group border border-2 border-gold p-3 centeredB bg-white">
                        <input type="text" value="-1" name="ps" hidden/>
                        <input type="text" searchPageAjax autocomplete="off" class="form-control text-xl text-muted border-0 shadow-0" name="search" placeholder="Search & Discover the Wealth of Knowledge"/>
                        <span> <button class="pi-search centered pi text-xl avt-md bg-danger text-white"></button></span>
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-12"> 
                <div>
                    <p class="text-lg"><?=htmlText('indexSubTitle2')?></p>

                    <div>
                        <div class="centeredB" to href="explore">
                            <a class="shadow-0 bg-0 pl-0 btn border border-danger"
                            style="border-width: 0px 0px 4px 0px !important; border-radius:0px;">
                                <h3 class="bold text-black">Explore Repository</h3>
                            </a>
                            <i class="pi pi-arrow-right avt avt-md border pill centered border-dark text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5 d-none d-md-block absolute h-100 right-0 p-0 top-0" style="z-index:-1;">
                <div class="relative w-100 h-100 fit-object">
                    <img width="100%" src="<?= set_img_src(htmlText('indexImg1'), 700, 800);?>" alt="intro"/>
                </div>
            </div>
        </div>
        
    </div>
</div>