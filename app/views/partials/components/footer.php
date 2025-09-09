<?php
$DocNavs = 
[
    [
        'title'=>'Lecture Notes+',
        'icon'=>'pi pi-file',
        'attr'=>'to href="lecture_notes"',
    ],
    [
        'title'=>'Books and Chapters',
        'icon'=>'pi pi-book',
        'attr'=>'to href="ebooks"',
    ],
    [
        'title'=>'Past questions',
        'icon'=>'pi pi-clone',
        'attr'=>'to href="past_questions"',
    ],
];
$comNavs = 
[
    [
        'title'=>'Conference',
        'icon'=>'pi pi-folder',
        'attr'=>'to href="conferences"',
    ],
    [
        'title'=>'Speech',
        'icon'=>'pi pi-comments',
        'attr'=>'to href="speech"',
    ],
    [
        'title'=>'Academic Calendar',
        'icon'=>'pi pi-calendar',
        'attr'=>'to href="academic_calendar"',
    ],
];
$serNavs  = 
[
    [
        'title'=>'Theses & Dissertation',
        'icon'=>'pi pi-copy small',
        'attr'=>'to href="research_document"',
    ],
    [
        'title'=>'Research Articles',
        'icon'=>'pi pi-copy small',
        'attr'=>'to href="research_article"',
    ],
    [
        'title'=>'Report and Dataset',
        'icon'=>'pi pi-chart-line',
        'attr'=>'to href="reports_dataset"',
    ],
];
?>

<?php include COMPS."pages/sections/indexSec2.php";?>
<footer class="footer-section">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget company-intro-widget">
                <a href="#" class="site-logo text-center">
                    <!-- <img src="<?php print_link(set_img_src(IMGDIR.'logo.png',50))?>" alt="logo"> -->
                    <h4 class="bold text-white font2 mb-1">Catholic University of Ghana</h4>
                    <div class="text-white" style="letter-spacing:4px;">Academic Repository</div>
                </a>
                <!-- <div class="text-center">
                    <ul class="company-footer-contact-list">
                        <li class="mt-3">
                            <?php if(user_login_status()){?>
                            <button onclick="logout()" class="btn btn-outline-dark btn-md">
                                <label for="">Log out</label>
                            </button>
                            <?php } else { ?>
                            <a href="<?php print_link('home');?>" class="btn btn-outline-dark btn-md">
                                <label for="">Log In</label>
                            </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div> -->
            </div>
          </div><!-- widget end -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget course-links-widget">
              <h4 class="widget-title">Documentation</h4>
              <ul class="courses-link-list">
                <?php foreach($serNavs as $item){?>
                    <li><a <?=$item['attr']?>><?=$item['title']?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div><!-- widget end -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget course-links-widget">
              <h4 class="widget-title">Resources</h4>
              <ul class="courses-link-list">
                <?php foreach($DocNavs as $item){?>
                <li><a  <?=$item['attr']?>><?=$item['title']?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div><!-- widget end -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget course-links-widget">
              <h4 class="widget-title">Scholastic Forums</h4>
                <ul class="courses-link-list">
                    <?php foreach($comNavs as $item){?>
                        <li><a <?=$item['attr']?>><?=$item['title']?></a></li>
                    <?php } ?>
                </ul>
              <!-- <div class="footer-newsletter">
                <p>Sign Up to Our Newsletter to Get Latest Updates & Services</p>
                <form class="news-letter-form">
                  <input type="email" name="news-email" id="news-email" placeholder="Your email address">
                  <input type="submit" value="Send">
                </form>
              </div> -->
            </div>
          </div><!-- widget end -->
        </div>
      </div> 
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 text-sm-left text-center">
              <span class="copy-right-text">Powered By <a to href="team" class="text-gold">CUG Academic Computing & Research Unit</a> | Copyright &copy; <?=date('Y')?> CUG</span>
            </div>
            <div class="col-md-6 col-sm-6">
              <ul class="terms-privacy d-flex justify-content-sm-end justify-content-center">
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
              </ul>
            </div>
        </div>
      </div>
    </div><!-- footer-bottom end -->
  </footer>
<!-- <footer class="">
    <div class="p-3 pt-5 texture-gold">
        <div class="p-3 container">
            <div class="row">
                <div class="col-xl col-12 mb-5">
                    <div class="row h-100 align-items-center mb-5">
                        <div class="col-auto">
                            <img src="<?php print_link(set_img_src(IMGDIR.'logo.png',50))?>" alt="">
                        </div>
                        <div class="col border-left border-danger pt-2">
                            <h4 class="bold text-black font2 mb-1">Catholic University of Ghana</h4>
                            <div style="font-family:monospace;letter-spacing:4px;">Academic Repository</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-auto col-lg col-md-4 col-6 mb-3">
                    <h4 class="bold mb-2 text-danger">Scholary & Research</h4>
                    <ul class="">
                        <?php foreach($serNavs as $item){?>
                        <li><a <?=$item['attr']?>><?=$item['title']?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-xl-auto col-lg  col-md-4 col-6 mb-3">
                    <h4 class="bold mb-2 text-danger">Learning Materials</h4>
                    <ul class="">
                        <?php foreach($DocNavs as $item){?>
                        <li><a  <?=$item['attr']?>><?=$item['title']?></a></li>
                        <?php } ?>
                        <li class="mt-3">
                            <?php if(user_login_status()){?>
                            <button onclick="logout()" class="btn btn-outline-dark btn-md">
                                <label for="">Log out</label>
                            </button>
                            <?php } else { ?>
                            <a href="<?php print_link('home');?>" class="btn btn-outline-dark btn-md">
                                <label for="">Log In</label>
                            </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-auto col-lg  col-md-4 col-6 mb-3">
                    <h4 class="bold mb-2 text-danger">Academic Events</h4>
                    <ul class="">
                        <?php foreach($comNavs as $item){?>
                        <li><a <?=$item['attr']?>><?=$item['title']?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-danger pt-1"></div>
    <div class="bg-black p-2">
        <div class="container text-center text-light">
            <div>Powered By <a to href="team" class="text-gold">CUG Academic Computing & Research Unit</a> | Copyright &copy; <?=date('Y')?> CUG</div>
        </div>
    </div>
</footer> -->

<style>
/* footer{
    color: white;
}
footer ul li a{
    color:white !important;
}
footer ul li{
    padding: 4.99px 0px;
} */

h1,
        h2,
        h3,
        h4,
        h5,
        h6 {}
        
        section {
            padding: 0px 0;
            min-height: 100vh;
        }
        
        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            outline: none;
        }
        
        a,
        a:active,
        a:focus {
            color: #6f6f6f;
            text-decoration: none;
            transition-timing-function: ease-in-out;
            -ms-transition-timing-function: ease-in-out;
            -moz-transition-timing-function: ease-in-out;
            -webkit-transition-timing-function: ease-in-out;
            -o-transition-timing-function: ease-in-out;
            transition-duration: .2s;
            -ms-transition-duration: .2s;
            -moz-transition-duration: .2s;
            -webkit-transition-duration: .2s;
            -o-transition-duration: .2s;
        }
        
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        img {
    max-width: 100%;
    height: auto;
}.footer-section {
  background-color: #233243;
  position: relative;
  overflow: hidden;
  z-index: 9;
}
.footer-section:before {
  content: '';
  position: absolute;
  top: -146%;
  left: -18%;
  width: 44%;
  height: 257%;
  transform: rotate(54deg);
  background-color: rgb(31, 47, 64);
  -webkit-transform: rotate(54deg);
  -moz-transform: rotate(54deg);
  -ms-transform: rotate(54deg);
  -o-transform: rotate(54deg);
  z-index: -10;
}
.footer-section:after {
  position: absolute;
  content: '';
  background-color: rgb(31, 47, 64);
  top: -24%;
  right: 4%;
  width: 26%;
  height: 264%;
  transform: rotate(44deg);
  -webkit-transform: rotate(44deg);
  -moz-transform: rotate(44deg);
  -ms-transform: rotate(44deg);
  -o-transform: rotate(44deg);
  z-index: -10;
}
.footer-top {
  padding-top: 96px;
  padding-bottom: 50px;
}
.footer-top p,
.company-footer-contact-list li {
  color: #ffffff;
}
.company-footer-contact-list {
  margin-top: 10px;
}
.company-footer-contact-list li {
  display: flex;
  display: -webkit-flex;
  align-items: center;
}
.company-footer-contact-list li+li {
  margin-top: 5px;
}
.company-footer-contact-list li i {
  margin-right: 10px;
  font-size: 20px;
  display: inline-block;
}

.footer-top .site-logo {
    margin-bottom: 25px;
    display: block;
    max-width: 170px;
}
.widget-title {
  text-transform: capitalize;
  color: #ffb606 !important;
}
.footer-top .widget-title {
  color: #ffffff;
  margin-bottom: 40px;
}
.courses-link-list li+li {
  margin-top: 10px;
}
.courses-link-list li a {
  color: #ffffff;
  text-transform: capitalize;
  font-family: var(--para-font);
  font-weight: 400;
}
.courses-link-list li a:hover {
  color: #ffb606;
}
.courses-link-list li i {
  margin-right: 5px;
}
.footer-top .small-post-title a {
  font-family: var(--para-font);
  color: #ffffff;
  font-weight: 400;
}
.small-post-item .post-date {
  color: #ffb606;
  margin-bottom: 3px;
  font-family: var(--para-font);
  font-weight: 400;
}
.small-post-list li+li {
  margin-top: 30px;
}
.news-letter-form {
  margin-top: 15px;
}
.news-letter-form input {
  width: 100%;
  padding: 12px 25px;
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  -o-border-radius: 5px;
  border: none;
}
.news-letter-form input[type="submit"] {
  width: auto;
  border: none;
  background-color: #ffb606;
  padding: 9px 30px;
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  -o-border-radius: 5px;
  color: #ffffff;
  margin-top: 10px;
}
.footer-bottom {
  padding: 13px 0;
  border-top: 1px solid rgba(255, 255, 255, 0.149);
}
.copy-right-text {
  color: #ffffff;
}
.copy-right-text a {
  color: #ffb606;
}
.terms-privacy li+li {
  margin-left: 30px;
}
.terms-privacy li a {
  color: #ffffff;
  position: relative;
}
.terms-privacy li a:after {
  position: absolute;
  content: '-';
  color: #ffffff;
  display: inline-block;
  top: 0;
  right: -18px;
}
.terms-privacy li+li a:after {
  display: none;
}

</style>