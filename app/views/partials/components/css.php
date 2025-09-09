<style>

:root {
    --blue-50:#f3f8fc;
    --blue-100:#c6dcef;
    --blue-200:#98c1e3;
    --blue-300:#6ba5d7;
    --blue-400:#3d8aca;
    --blue-500:#106ebe;
    --blue-600:#0e5ea2;
    --blue-700:#0b4d85;
    --blue-800:#093d69;
    --blue-900:#062c4c;
    --green-50:#f7fbf3;
    --green-100:#d9eac4;
    --green-200:#bbda96;
    --green-300:#9cca67;
    --green-400:#7eb939;
    --green-500:#60a90a;
    --green-600:#529009;
    --green-700:#437607;
    --green-800:#355d06;
    --green-900:#264404;
    --yellow-50:#fffcf2;
    --yellow-100:#ffeec2;
    --yellow-200:#ffe191;
    --yellow-300:#ffd461;
    --yellow-400:#ffc630;
    --yellow-500:#ffb900;
    --yellow-600:#d99d00;
    --yellow-700:#b38200;
    --yellow-800:#8c6600;
    --yellow-900:#664a00;
    --cyan-50:#f2fbfc;
    --cyan-100:#c2eef1;
    --cyan-200:#91e0e5;
    --cyan-300:#61d2da;
    --cyan-400:#30c5ce;
    --cyan-500:#00b7c3;
    --cyan-600:#009ca6;
    --cyan-700:#008089;
    --cyan-800:#00656b;
    --cyan-900:#00494e;
    --pink-50:#fef2f9;
    --pink-100:#f8c2e3;
    --pink-200:#f391ce;
    --pink-300:#ee61b8;
    --pink-400:#e830a2;
    --pink-500:#e3008c;
    --pink-600:#c10077;
    --pink-700:#9f0062;
    --pink-800:#7d004d;
    --pink-900:#5b0038;
    --indigo-50:#f5f6fc;
    --indigo-100:#cdd3f1;
    --indigo-200:#a5b0e6;
    --indigo-300:#7d8edc;
    --indigo-400:#566bd1;
    --indigo-500:#2e48c6;
    --indigo-600:#273da8;
    --indigo-700:#20328b;
    --indigo-800:#19286d;
    --indigo-900:#121d4f;
    --teal-50:#f2f9f8;
    --teal-100:#c2e1dd;
    --teal-200:#91c9c2;
    --teal-300:#61b2a8;
    --teal-400:#309a8d;
    --teal-500:#008272;
    --teal-600:#006f61;
    --teal-700:#005b50;
    --teal-800:#00483f;
    --teal-900:#00342e;
    --orange-50:#fdf7f2;
    --orange-100:#f5d8c2;
    --orange-200:#edb991;
    --orange-300:#e49a61;
    --orange-400:#dc7b30;
    --orange-500:#d45c00;
    --orange-600:#b44e00;
    --orange-700:#944000;
    --orange-800:#753300;
    --orange-900:#552500;
    --bluegray-50:#f8f9fb;
    --bluegray-100:#dee4ed;
    --bluegray-200:#c4cfe0;
    --bluegray-300:#a9bad2;
    --bluegray-400:#8fa4c4;
    --bluegray-500:#758fb6;
    --bluegray-600:#637a9b;
    --bluegray-700:#52647f;
    --bluegray-800:#404f64;
    --bluegray-900:#2f3949;
    --purple-50:#f9f8fd;
    --purple-100:#e1dff7;
    --purple-200:#cac5f1;
    --purple-300:#b2abeb;
    --purple-400:#9b92e4;
    --purple-500:#8378de;
    --purple-600:#6f66bd;
    --purple-700:#5c549b;
    --purple-800:#48427a;
    --purple-900:#343059;
    --red: #ed1b2f;
    --red-50:#fdf5f5;
    --red-100:#f4cecf;
    --red-200:#eba8a9;
    --red-300:#e28184;
    --red-400:#da5b5e;
    --red-500:#d13438;
    --red-600:#b22c30;
    --red-700:#922427;
    --red-800:#731d1f;
    --red-900:#541516;
    --surface-a:#ffffff;
    --surface-b:#faf9f8;
    --surface-c:#f3f2f1;
    --surface-d:#edebe9;
    --surface-e:#ffffff;
    --surface-f:#ffffff;
    --text-color:#000000;
    --text-color-secondary:#605e5c;
    --gold: #dbb367;
    --primary-color:#2f4cdd;
    --primary-color-text:#ffffff;
    --font-family:'Segoe UI', Tahoma, Geneva, Verdana;
    --surface-0: #ffffff;
    --surface-50: #f3f2f1;
    --surface-100: #e1dfdd;
    --surface-200: #bebbb8;
    --surface-300: #a19f9d;
    --surface-400: #797775;
    --surface-500: #484644;
    --surface-600: #323130;
    --surface-700: #252423;
    --surface-800: #1b1a19;
    --surface-900: #11100f;
    --gray-50: #f3f2f1;
    --gray-100: #e1dfdd;
    --gray-200: #bebbb8;
    --gray-300: #a19f9d;
    --gray-400: #797775;
    --gray-500: #484644;
    --gray-600: #323130;
    --gray-700: #252423;
    --gray-800: #1b1a19;
    --gray-900: #11100f;
    --content-padding:1rem;
    --inline-spacing:0.5rem;
    --border-radius:2px;
    --surface-ground:#faf9f8;
    --surface-section:#ffffff;
    --surface-card:#ffffff;
    --surface-overlay:#ffffff;
    --surface-border:#edebe9;
    --surface-hover:#f3f2f1;
    --focus-ring: inset 0 0 0 1px #605e5c;
    --maskbg: rgba(0, 0, 0, 0.4);

    --chartEntry-height : 60px;
    <?php 
    if(!user_login_status()){ echo "--leftNavWidth : 200px;";} 
    else { echo "--leftNavWidth : 0px;";} 
    ?>


    --max-width : 100%;
    --nav-hover-color : rgba(0,0,0,0.053);
    --left-nav-sm-width : 80px;
    --left-nav-transition : 0.2s ease;
    --fast-transition : 0.2s ease;
    --left-nav-border : 1px solid rgba(0,0,0,0.2);  
    --shadow-sm : 1px 1px 5px rgba(0,0,0,0.17);
    --shadow-md : 1px 1px 15px rgba(0,0,0,0.17);
}
body, html{
    /* scroll-behavior: smooth; */
    
}
body{
    color: black;
    overflow-y: scroll;
    font-size: 14px;
}
/* Apply custom styles to the entire page */
body {
    scrollbar-width: thin; /* For Firefox */
    scrollbar-color: #e0e0e0 #f0f0f0; /* For Firefox */
    scrollbar-width: thin;
    scrollbar-color: #e0e0e0 #f0f0f0;
}
body::-webkit-scrollbar {
    width: 7px; /* Width of the scrollbar */
}
body::-webkit-scrollbar-thumb {
    background-color: var(--surface-100); /* Color of the thumb */
    border-radius: 5px; /* Rounded corners for the thumb */
}
body::-webkit-scrollbar-thumb:hover {
    background-color: var(--primary-color); /* Color of the thumb on hover */
}
body::-webkit-scrollbar-track {
    background-color: transparent; /* Color of the track */
}
data{
    display: block;
    position: relative;
    height: 100%;
}
.family-home{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana !important;
}

.panigation-top .pagination-form .col-md-5{
    order: 1;
}
ul.pagination.pagination-sm{
    margin: 0;
} 
.panigation-top .pagination-form .col{
    order: 2;
    display: flex;
    justify-content: flex-end; 
    align-items: center;
}
.panigation-top .pagination-form span,
.panigation-top .pagination-form small{
    display: inline-flex;
    margin: 0px 5px;
    align-items: center;
}
.pagination-form .form-control-sm{
    height: 25px !important;
}
.pagination-form .form-control-sm.page-num{
    margin: 0px 5px;
}
.pagination-form .form-control-sm:not(.page-num){
    margin-left:5px;
}
/* Apply custom styles to the entire page */
.table-responsive{
    overflow-y: hidden;
    min-height:400px;
}
.table{
    font-size: 14px;
}
.table .table-header{
    background-color: #f3f3f3 !important;
    background:#f3f3f3 !important;
    position: relative;
    z-index: 1;
    
}
.table .table-header th{
    font-weight: 500 !important;
}
.table .table-header::after{
    width: 100%;
    display: block;
    position: absolute;
    top: 0px;
    height: 100%;
    left: 0px;
    content: '';
    background-color:  var(--surface-ground);
    border-radius: 15px;
    z-index: -1;
}
.table .td-btn .btn-primary{
    background: unset !important;
    color: var(--primary-color);
}
.table .td-btn .fa.fa-bars{
    display: none;
}
.table .td-btn button.dropdown-toggle{
    display: flex;
    align-items: center;
    background-color: unset;
    border-width: 0px;
}
.table .td-btn button.dropdown-toggle::before{
    content: 'actions';
    color: var(--primary-color);
    font-weight: 600;
    font-size: 11px;
    display: block;
    position: relative;
    text-transform: capitalize;
}
td.td-fullname{
    color: black;
    font-weight: 500;
}
/* td:hover{
    background-color: var(--yellow-200);
} */
.thumb-holder{
    border: var(--left-nav-border);
    padding: 1px;
    margin: 0px 1px;
    display: block;
    border-radius: 3px;
}
button[onclick]{
    text-transform: capitalize;
}



.bar-0::-webkit-scrollbar{
    display: none;
}
.bar-0{
    -ms-overflow-style: none;
}
.scroll-y{
    overflow-y: auto;
    scrollbar-width: thin; /* For Firefox */
    scrollbar-color: #e0e0e0 #f0f0f0; /* For Firefox */
    scrollbar-width: thin;
    scrollbar-color: #e0e0e0 #f0f0f0;
}
.scroll-x{
    display: flex;
    overflow-x: auto;
    scrollbar-width: 3px; /* For Firefox */
    scrollbar-color: #e0e0e0 #f0f0f0; /* For Firefox */
    scrollbar-width: 3px;
    scrollbar-color: #e0e0e0 #f0f0f0;
}
.scroll-snap-y{
    scroll-snap-type: y mandatory;
    overflow-y: scroll;
    scroll-behavior: smooth;
}
.snap-align-center{
    scroll-snap-align: center;
}
.scroll-y::-webkit-scrollbar {
    width: 7px; /* Width of the scrollbar */
}

.scroll-y::-webkit-scrollbar-thumb {
    background-color: var(--surface-100); /* Color of the thumb */
    border-radius: 5px; /* Rounded corners for the thumb */
}
.scroll-y::-webkit-scrollbar-thumb:hover {
    background-color: var(--primary-color); /* Color of the thumb on hover */
}
.scroll-y::-webkit-scrollbar-track {
    background-color: transparent; /* Color of the track */
}




.pageSection{
    padding: 50px 30px;
}
.pageSection .pageSection{
    padding: 50px 0px;
}

/* layout */
.section {
    padding: 20px;
}

section.page > :first-child.bg-light{
    background-color: unset !important;
    background: unset !important;
}
#page-wrapper{
    background-color: white;
    background: white !important;
}
#main-content{
    padding: 0px;
    grid-area: body;
    z-index: 1;
    background-color: #F0F4F9 !important;
}

.counter-bg{
    background-color: #F0F4F9 !important;
}

.bg-counter{
    background-color: #fff !important;

}
.form-bg{
    background-color: #ffffff !important;
}
.bg-filter{
    background-color: #fff !important;

}
.grid3{
    min-height: calc(100vh - 60px);
    height: 100%;
    position: relative;
    display: grid;
    grid-template-columns:  30% calc(100% - 50%) 20%; 
    grid-template-areas:
    "left center right";
    width: 100%;
    max-width: var(--max-width);
    min-height: 100vh;
    margin-right: auto;
    margin-left: auto;
    box-sizing: border-box;
    background-color: white;
    background: white !important;
    text-shadow: none !important;
    text-rendering: optimizeLegibility;
}
.triangle {
    width: 200px;
    height: 200px;
    position: absolute;
    bottom: 38px;
    right: -77px;
    background-color: var(--red);
    transform: rotate(30deg);
}
@media(max-width: 992px){
    .grid3{
        grid-template-columns:  100% ; 
    }
}
.grid2{
    min-height: calc(100vh - 60px);
    height: 100%;
    position: relative;
    display: grid;
    grid-template-columns:  calc(100% - 40%) 40%; 
    grid-template-areas:
    "center side";
    width: 100%;
    max-width: var(--max-width);
    min-height: 100vh;
    margin-right: auto;
    margin-left: auto;
    box-sizing: border-box;
    background-color: white;
    background: white !important;
    text-shadow: none !important;
    text-rendering: optimizeLegibility;
}
#main-content{
    padding: 0px;
    grid-area: body;
    z-index: 1;
}
/* #main-content::after{
    height: 100vh;
    width: 40vw;
    content: '';
    display: block;
    position: fixed;
    right:0px;
    top:0px;
    background-color: var(--blue-50);
    z-index: -1;
} */
.compData{
    width:100%;
}
@media (max-width: 992px) {
    #page-wrapper{
        grid-template-columns: var(--left-nav-sm-width) calc(100% - var(--left-nav-sm-width));
    }
    #left-nav{
        width: var(--left-nav-sm-width);
    }
    #left-nav .menu-label{
        display: none;
    }
}
@media (max-width: 767px) {
    #left-nav:not([state=1]){
        display: none;
    }
    #page-wrapper{
        grid-template-areas:
        "body body";
    }
    #main-content{
        padding: 0px;
        grid-area: body;
    }
}
.side-page-cont{
    width: 250px;
    min-height: 100vh;
    margin-left:-50px;
    border-right: var(--left-nav-border);
}
.accountP label[for='role'], .accountP #ctrl-role-holder{
    display: none;
}
/* topnav */
#top-nav{
    position: relative;
    user-select: none;
    z-index: 10;
    background-color: white;
    width: 100% !important;
}
#top-nav li a.text{
    font-size: 18px;
}
#top-nav .wrapper{
    width: 100%;
    padding: 15px;
    height: 70px;
    /* border-bottom: 4px solid var(--red); */
    transition: var(--left-nav-transition);
}
@media(max-width: 777px){
    #top-nav .wrapper{
        height: 50px;
    }
}
#top-nav ul.navH{
    display: flex;
    list-style: none;
    padding: 0px;
}
#top-nav ul.navH a{
    padding: 10px;
}
#top-nav .dropdown{
    /* border-bottom: 2px solid var(--red); */
}
#top-nav .pi{
    color: var(--gold);
}
.logo-holder{
    display: inline-block;
    padding: 20px 25px 25px 130px;
    position: absolute;
    left: -1950px;
    padding-left: 2000px;
    z-index: 111;
}
.logo-holder::before{
    -ms-transform: skewX(-9deg);
    -webkit-transform: skewX(-9deg);
    transform: skewX(-9deg); 
    box-shadow: 0 0 10px rgba(0,0,0,.3);
    -webkit-box-shadow: 0 0 10px rgba(0,0,0,.3);
    left: 0px;
    top: 0px;
    display: block;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: white;
    z-index: -1;
}
/* leftnav */
#left-nav{
    grid-area: leftNav;
    height: 100%;
    position: relative;
    user-select: none;
}
#left-nav .wrapper{
    position: sticky;
    top:0px;
    z-index: 5;
    width: 100%;
    padding: 15px;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border-right: var(--left-nav-border);
    transition: var(--left-nav-transition);
}
#left-nav ul{
    list-style: none;
    padding: unset;
}
#left-nav ul li a{
    padding: 9px 10px;
    align-items: center;
    display: flex;
    border-radius: 10px;
}
#left-nav ul li a:hover{
    text-decoration: none;
    color: black;
    background-color: var(--nav-hover-color);
}
#left-nav .menu-label{
    font-size: 15px;
    margin-left: 20px;
}
#left-nav .menu-icon{
    font-size: 1.3rem;
}
#left-nav .menu-avt img{
    height: 30px;
    width: 30px;
    border-radius: 50px;
}

#left-nav[state='1'] .wrapper{
    width: var(--left-nav-sm-width);
}
#left-nav[state='1'] .wrapper .menu-label, #left-nav[state='1'] .wrapper .nav-brand{
    visibility: hidden;
}

#left-nav .sidebar-modal-holder{
    display: block;
    visibility: hidden;
    position: fixed;
    z-index: 2999;
    height: 100%;
    top:0px;
}
#left-nav[state='1'] .sidebar-modal-holder{
    visibility: visible;
}
#left-nav .sidebar-modal-holder .modal-item:not(.active) > *{
    display: none !important;
}
.closeSideBarModal{
    height: 40px;
    width: 40px;
    border-radius: 50px;
    z-index: 10;
    position: absolute;
    top: 10px;
    left: calc(400px + var(--left-nav-sm-width) - 55px);
}
.sidebar-modal-holder .modal-item{
    position: absolute;
    margin-left: -70px;
    width: 480px;
    height: 100%;
    background-color: white;
    visibility: hidden;
    opacity: 0;
    transition: var(--left-nav-transition);
    border-right: var(--left-nav-border);
}

@media (max-width: 767px){
    .sidebar-modal-holder .modal-item{
        width: 100vw;
    }
    .closeSideBarModal{
        background-color: white !important;
        font-size: 30px;
        left: calc(100vw - 65px);
    }
}
#left-nav[state='1'] .sidebar-modal-holder .modal-item.active{
    visibility: visible;
    opacity: 1;
    margin-left: 0px;
    /* margin-left: var(--left-nav-sm-width); */
}


/* bottomnav */
.bottom-nav{
    position:fixed;
    bottom:0px;
    left:0px;
    width:100%;
}


/* section */
.section-title{
    margin-bottom: 15px;
}

/* round */
.pill{
    border-radius: 50px;
}
.round-3{
    border-radius: 15px;
}
.round-2{
    border-radius: 10px;
}
.round-1{
    border-radius: 8px;
}
.round-sm{
    border-radius: 5px;
}
.round-md{
    border-radius: 15px;
}

.avt{
    position: relative;
    border-radius: 50%;
}
.avt img{
    border-radius: 50%;
}
.avt-profile{
    width: 130px;
    height: 130px;
}
.avt-xxl{
    width: 90px;
    height: 90px;
}
.avt-xl{
    width: 80px;
    height: 80px;
}
.avt-lg{
    width: 70px;
    height: 70px;
}
.avt-md{
    width: 60px;
    height: 60px;
}
.avt-65{
    width: 65px;
    height: 65px;
}
.avt-m{
    width: 50px;
    height: 50px;
}
.avt-sm{
    width: 40px;
    height: 40px;
}
.avt-xs{
    width: 25px;
    height: 25px;
}
.frameOut1{
    position: relative;
}
.frameOut1::after{
    top: -4px;
    left: -8px;
    display: block;
    content: '';
    position: absolute;
    height: 100%;
    width: 100%;
    border: 2px  solid var(--red);
    transform: rotate(-2deg);
    transition: .2s ease;
}

.frameOut1:hover::after{
    top: 0px;
    left: 0px;
    transform: rotate(0deg);
}
.fit-object{
    position: relative;
}
img.fit-object, .fit-object img, .overlay{
    width: 100% !important;
    height: 100%;
    object-fit: cover;
    position: absolute !important;
    top: 0px !important;
    left: 0px !important;
}

.texture, .texture-gold{
    position: relative;
}
.texture::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: repeating-linear-gradient(45deg, transparent, transparent 2px, var(--red) 1px, white 4px);
  background-size: 10px 20px; /* Adjust the size of the wave pattern */
  pointer-events: none;
  opacity: 0.08;
}
.texture-gold::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: repeating-linear-gradient(45deg, transparent, transparent 2px, var(--gold) 1px, white 4px);
    background-size: 10px 20px; /* Adjust the size of the wave pattern */
    pointer-events: none;
    opacity: 0.20;
  }
hr.short{
    margin-left: 0px;
    width: 70px;
}
/* forms */
form{
    position: relative;
}
form.search .btn.btn-primary{
    border-radius: 5px;
    padding-left: 20px;
    padding-right: 20px;
    margin-left: 15px;
}

.bg-light.page-content{
    background: whitesmoke !important;
    padding: 20px !important;
    border-radius: 15px;
    position: relative;
}
[type='radio'].radio-md{
    height: 20px;
    width: 20px;
}
.alert-pink{
    background-color: rgb(255, 222, 227);
    color: var(--pink-500);
}
.bg-gold{
    background-color: var(--gold);
}
.text-gold{
    color: var(--gold);
}
.border-gold{
    border-color: var(--gold) !important;
}
.bg-light.page-content::before{
    content: '';
    display: block;
    width: 100%;
    height:100%;
    top:0px;
    left:0px;
    position: absolute;
    box-shadow: var(--shadow-sm);
    border-radius: 15px;
}
.form-control,
.input-group .form-control,
.selectize-control.single .selectize-input {
    background: #fff;
    border: 1px solid #bebebe;
    color: #6e6e6e;
    height: 34px; 
    border-radius: 5px !important;
    font-size: 14px;
}
.form-control .form-control{
    padding: 0px 14px;
    /* border-width: 0px; */
    shadow: unset;
}
/* .selectize-dropdown-content{
    position: fixed;
    width: 500px !important;
    padding: 20px 15px;
    background-color: white;
    max-width:100vw;
    z-index: 1;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}
.selectize-dropdown::after{
    content: '';
    position: fixed;
    background-color: rgba(0, 0, 0, 0.2);
    width:100%;
    height:100%;
    left:0px;
    top:0px;
    bottom:0px;
    display: block;
    z-index: -1;
} */
.form-control::placeholder{
    color: #34425a;
}
.form-control.plain, .form-control.plain:focus{
    border-width: 0px;
    box-shadow: unset; 
}
.selectize-control.single .selectize-input, .selectize-dropdown {
    -webkit-box-shadow: unset !important;
    box-shadow: unset !important;
    background-color: white;
    background-image: unset !important;
    /* background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#fefefe), to(#f2f2f2));
    background-image: -webkit-linear-gradient(top, #fefefe, #f2f2f2);
    background-image: -o-linear-gradient(top, #fefefe, #f2f2f2);
    background-image: linear-gradient(to bottom, #fefefe, #f2f2f2); */
    background-repeat: unset !important;
    filter: unset !important;
}

h3 .title{
    text-transform: uppercase !important;
}

.ui-form input, .ui-form .custom-select, .ui-form .selectize-input {
    height: 50px !important;
    /* background-color: var(--surface-ground) !important; */
    border: 1px solid #000000 !important;
    border-radius: 0 !important;
    appearance: none;
}

.ui-form textarea{
    border: 1px solid #000000 !important;
    border-radius: 0 !important;
    appearance: none;
}
/* ajax-input [start] */
.ui-form .selectize-input{
    padding: 0px 15px !important;
}
.ui-form form-control, .input-group .form-control, .selectize-control.single .selectize-input{
    /* border-radius: 0.75rem !important; */
}
.ui-form .selectize-input input{
    border-width: 0px !important;
    background-color: transparent !important;
}
.ui-form .selectize-input .item[data-value]{
    padding: 15px 0px;
}
/* ajax-input [end] */



.ui-form .control-label{
    padding: 0px 15px;
    text-transform: capitalize;
    font-weight: 600;
    font-size: 15px;
}
.ui-form .form-submit-btn-holder.text-center{
    /* text-align: left !important; */
    padding-top: 20px;
    border-top: 1px solid var(--surface-border);
}
.ui-form .form-submit-btn-holder.text-center i{
    display: none;
}
.ui-form .form-submit-btn-holder.text-center button{
    border-radius: 0.75rem !important;
    padding: 10px 30px;
    font-weight: 600;
    text-transform: capitalize;
}
.ui-form .subform{
    padding: 0px !important;
    background-color: unset !important;
    background: unset !important;
}
.ui-form .subform .record-title{
    padding: 15px !important;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana !important;
}
.ui-form #ctrl-sex-holder{
    margin-top: 10px;
}






/* button */
button{
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    line-height: 1.5;
    border-radius: 0;
    -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}
.pi-heart-fill{
    color: red;
}
.selectize-dropdown-content .option{
    background-color: white;
    font-size: 14px;
    /* background: white ; */
}
.selectize-dropdown-content .option:hover{
    background-color: rgb(187, 243, 255);
    color: black
    /* background: white ; */
}

/* general */
.nav-brand{
    font-size:18.5px;
    font-weight: 500;
}
.fix-text-alt {
    box-sizing: border-box;
    background-color: white;
    background: white !important;
    text-shadow: none !important;
    text-rendering: optimizeLegibility;
}
/* topography */
.break-line{
    white-space: pre-line;
}
a, a:hover{
    color: black;
    cursor: pointer;
    user-select: none;
}
.cursor-point,[to][href], button{
    user-select: none;
    cursor: pointer;
}
muted{
    color: #9a9da1;
}
.font1{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana;
}
.font2{
    font-family:'Segoe UI', Tahoma, Geneva, Verdana;
    /* Georgia,serif */
}
.record-title{
    font-size: 1.58rem;
    font-weight: bolder;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana;
    color: black;
}
.text-xl {
    font-size: 1.5rem !important;
}
@media(min-width: 780px) {
    .text-md-xl{
        font-size: 1.5rem !important; 
    }
    .text-md-lg {
        font-size: 1.025rem !important;
    }
}
.text-lg {
    font-size: 1.125rem !important;
}
.text-md2 {
    font-size: 0.99rem !important;
}
.text-md {
    font-size: 0.9125rem !important;
}
.text-0 {
    font-size: 14px !important;
}
@media(max-width: 780px) {
    .display-3{
        font-size: 40px;
    }
}
.display-3{

}
.bold-sm{
    font-weight: 500;
}
.text-line-1, .text-line-2, .text-line-3 {
    width: 100%;
    position: relative;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.text-line-1 { -webkit-line-clamp: 1;}
.text-line-2 { -webkit-line-clamp: 2;}
.text-line-3 { -webkit-line-clamp: 3;}
.text-400{
    color: var(--surface-400);
}
.logo-holder .text-lg{
    font-family:'Segoe UI', Tahoma, Geneva, Verdana;
    letter-spacing:1px;
}
.logo-holder img{
    width: 70px;
}
@media(max-width: 767px){
    h1{
        font-size: 1.4rem;
    }
    .logo-holder .text-lg{
        font-size: 14px !important;
        letter-spacing:unset;
    }
    .logo-holder img{
        width: 50px;
    }
}


/* loading bar */
.ldBar path.mainline{
    stroke-linecap: round;
}
.label-lg .ldBar-label{
    font-size: 45px;
}
[data-preset="fan"].label-lg .ldBar-label{
    top: 70%;
}


/* tools */
.shadow-0,
.shadow-0:hover,
.shadow-0:focus,
.shadow-0:active
{
    box-shadow: unset !important;
}
.border-2{
    border-width: 2px !important;
}
.border-3{
    border-width: 3px !important;
}
.hide{
    display: none;
}
.mx-fill{
    margin-left:-15px;
    margin-right: -15px;
}
.snap-y{
    scroll-snap-type: y mandatory;
}
.skin{
    position: absolute;
    top: 0px;
    left:0px;
    width:100%;
    height:100%;
    z-index: 1;
}
.pi.pi-clock.pi-spin{
    font-size: 30px !important;
}
.blur-light{
    backdrop-filter: blur(5px);
    background-color: #ffffffd4;
}
.relative{
    position: relative;
}
.absolute{
    position: absolute;
}
.sticky-bottom{
    position: sticky;
    bottom: 0px;
}
.z-100{
    z-index: 100;
}
.shadow{
    box-shadow: var(--shadow-md);
}

.hover-warning:hover{
    background-color: var(--yellow-50);
    border-color: var(--yellow-300) !important ;
    transition: 0.3s ease-in-out;
}
.hover-warning.active{
    background-color: var(--yellow-50);
    border-color: var(--yellow-300) !important ;
    transition: 0.3s ease-in-out;
}
.hover-success:hover{
    background: linear-gradient(70deg, rgb(239, 255, 247),  white);
    border-color: rgb(139, 255, 216) !important ;
    transition: 0.3s ease-in-out;
}
.hover-success.active{
    background: linear-gradient(70deg, rgb(239, 255, 247),  white);
    border-color: rgb(139, 255, 216) !important ;
    transition: 0.3s ease-in-out;
}
.hover-secondary:hover{
    background: linear-gradient(70deg, rgb(255, 247, 249),  white);
    border-color: rgb(255, 202, 202) !important ;
    transition: 0.3s ease-in-out;
}
.hover-secondary.active{
    background: linear-gradient(70deg, rgb(255, 247, 249),  white);
    border-color: rgb(255, 202, 202) !important ;
    transition: 0.3s ease-in-out;
}
.hover-primary:hover{
    background: linear-gradient(70deg, rgb(245, 247, 255),  white);
    border-color: var(--blue-300) !important ;
    transition: 0.3s ease-in-out;
}
.hover-primary.active{
    background: linear-gradient(70deg, rgb(245, 247, 255),  white);
    border-color: var(--blue-300) !important ;
    transition: 0.3s ease-in-out;
}
.card-yellow{
    background-color: var(--yellow-50);
    border-color: var(--yellow-200) !important;
}
.btn-yellow{
    background-color: var(--yellow-200);
    color: var(--yellow-700);
}
.list-page-sel-option{
    background-color: white;
    width: 100%;
    z-index: 10;
    position: sticky;
    bottom: 0px;
    border-top: 1px dashed;
    margin-top: 15px;
    padding: 5px 15px;
    display: flex;
    align-items: center;
}
.list-page-sel-option button{
    display: none;
}
.o-0{
    overflow: hidden;
}
.h-55{
    height: 55px;
}
.grid {
    display: flex;
    flex-wrap: wrap;
    margin-right: -0.5rem;
    margin-left: -0.5rem;
    margin-top: -0.5rem;
}
.flex-column{
    display: flex;
    flex-direction: column;
}
.column-reverse{
    display: flex;
    flex-direction: column-reverse !important;
}
.flex-grow-1{
    flex-grow: 1;
}
.fix-md-right{
    position: relative;
    transition: 0.1s ease;
}
@media(max-width: 767px){
    .fix-md-right{
        position: fixed;
        right: 0px;
        top:0px;
        width: 300px;
        max-width: 100vw;
    }
    .h-md-100v{
        height: 100vh;
    }
    .visible-md-0{
        visibility: hidden;
        opacity: 0;
    }
    .visible-md-0.fix-md-right{
        right: -50% !important;
    }
}
.h-100v{
    height: 100vh;
}
.visible-0{
    visibility: hidden;
    opacity: 0;
}
.trace-h{
    flex-grow: 1;
    border-top: 1px dotted;
}
.centered{
    display: flex;
    align-items: center;
    justify-content: center;
}
.centeredB{
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.centeredL{
    display: flex;
    align-items: center;
    justify-content: start;
}
.centeredR{
    display: flex;
    align-items: center;
    justify-content: end;
}
.list-item {
    padding: 5px 0px;
}
.listitem {
    display: block;
    padding: 10px 15px;
    width:100%;
    background: white;
    text-align: left;
    word-wrap: break-word;
    white-space: wrap !important;
}

[src='<?php print_link("assets/images/no-image-available.png")?>']{
    opacity: 0;
}
.fixed-alert{
    z-index: 3000;
}
/* bg */
.surface-ground, .surface{
    background-color: var(--surface-ground) !important;
}
.surface-ground, .surface{
    background-color: var(--surface-ground) !important;
}
.bg-0,
.bg-0:hover,
.bg-0:focus,
.bg-0:active{
    background: transparent;
}
.bg-gt-1{
    background:linear-gradient(95deg, yellow, red, #ad2df6);
}
.skin-dark{
    background: rgba(0,0,0,0.6) !important;
    color: white;
}
.gtImg1{
    background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85) 85%), radial-gradient(ellipse at top left, rgba(255, 165, 0, 0.9), transparent 80%), radial-gradient(ellipse at top right, rgba(0, 51, 102, 0.5), transparent 50%), radial-gradient(ellipse at center right, rgba(128, 0, 128, 0.7), transparent 70%), radial-gradient(ellipse at center left, rgba(51, 153, 204, 0.5), transparent 50%)
}

/* flashcard-item */
.flashcard-item{
    user-select: none;
    scroll-snap-align: center;
}
.flashcard-item .flashcard-inner{
    display: flex;
    width: 100%;
    align-items: center;
    /* height: 100vh; */
    padding: 15px 0px;
}
.flashcard-item .flashcard-wrapper{
    position: relative;
    display: grid;
    width: auto;
    max-width: 100%;
    grid-template-columns: 300px 80px;
    grid-template-areas:
    "content icon";
    height: calc(100vh - 30px);
    margin: 0px auto;
}

.flashcard-item .item-card{
    position: relative;
    height: 100%;
    border-radius: 20px;
    transition: 0.3s ease;
    border: 1px solid #9b9b9b;
    background-color: white;
}
.flashcard-item .item-content, 
.flashcard-item .item-answer{
    grid-area: content;
    position: relative;
    height: 100%;
    position: relative;
    z-index: 1;
}
.flashcard-item:not(.show-answer) .item-answer{
    z-index: -1;
}
.flashcard-item .item-content .item-card{
    visibility: visible;
    opacity: 1;
    scale: 1;
}
.flashcard-item.show-answer .item-content .item-card {
    opacity: 0;
    margin-bottom: -100px;
    visibility: hidden;
    scale: 0.9;
}
.flashcard-item .item-answer .item-card{
    background-color: white;
    position: absolute !important; 
    visibility: hidden;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: 0.3s ease;
    scale: 1;
}
.flashcard-item.show-answer .item-answer .item-card{
    visibility: visible;
    opacity: 1;
    scale: 0.9;
}

/* match */
.masonary-grid{
    column-gap: 20px;
    transition: 0.3s ease;
    columns: 4;
    padding: 20px;
    transition: 0.3s ease;
}
.masonary-grid > div{
    position: relative;
    display: block;
    margin-bottom: 20px; 
    break-inside: avoid;
    transition: 0.3s ease;
}
@media(max-width: 767px){
    .masonary-grid{
        columns: 3;
        column-gap: 15px;
        padding: 10px 0px 10px 10px;
    }
    .masonary-grid > div{
        margin-bottom: 15px;
    }
}
@media(max-width: 500px){
    .masonary-grid{
        columns: 2;
        column-gap: 15px;
        padding: 10px 0px 10px 10px;
    }
    .masonary-grid > div{
        margin-bottom: 15px;
    }
}

.match-item .match-item-inner{
    cursor: pointer;
    user-select: none ;
    background-color: white;
    padding: 20px;
    border: 2px solid var(--surface-border);
    white-space: wrap;
}
[item-state="1"] .match-item[item].match-selected .match-item-inner{
    background-color: var(--orange-50);
}
[item-state="0"].success .match-item[item].match-selected .match-item-inner{
    background-color: #d0f1dd;
    border-color: #13B955 ;
    outline: 0 ;
}
[item-state="0"]:not(.success) .match-item[item].match-selected .match-item-inner{
    background-color: var(--red-100);
    border-color: red;
}

/* .flashcard-item .item-card:after
{
    position: absolute;
    border-radius: 20px;
    content: '';
    display: block;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom:0px;
    box-shadow: var(--shadow-sm);
    z-index: -1;
} */
.flashcard-item .item-icons{
    grid-area: icon;
    transition: 0.3s ease;
}
.flashcard-item button{
    background: unset;
    background-color: unset;
    font-size: 23px;
    line-height: 80%;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    width: 40px;
}
@media(max-width: 500px){
    .flashcard-item .flashcard-inner{
        border-bottom: 1px solid;
    }
    .flashcard-item .flashcard-wrapper{
        grid-template-columns: calc(100% - 0px) 0px;
    }
    .flashcard-item:not(.show-answer) .item-card{
        border-width: 0px;
    }
    .flashcard-item:not(.show-answer) .item-card:after{
        box-shadow: unset;
    }
    .flashcard-item .item-icons{
        position: absolute;
        right: 0px;
        height: 100%;
        width: 80px;
        z-index: 2;
    }
    .flashcard-item.show-answer .item-icons{
        visibility: visible;
        opacity: 0;
    }
}

/* post item */
.post-item{
    user-select: none;
    padding: 10px 15px;
}
.post-item .post-inner{
    display: grid;
    grid-template-columns: 80px auto;
    grid-template-rows: 20px auto;
    grid-template-areas:
    "post-root-avt post-root-text"
    "opost-root-avt post-data";
}
.fullview.post-item .post-inner{
    grid-template-rows: 65px auto;
    grid-template-areas:
    "post-root-avt post-root-text"
    "post-data post-data";
}

.post-item.comment .post-inner{
    grid-template-columns: 60px auto;
    grid-template-rows: 25px auto;
}
.post-item.commentReply .post-inner{
    grid-template-columns: 40px auto;
    grid-template-rows: 20px auto;
}
.post-item .post-root-avt{
    grid-area: post-root-avt;
}
.post-item .post-root-text{
    grid-area: post-root-text;
}
.post-item .post-data{
    grid-area: post-data;
}
.post-data .data-cont{
    max-width: 550px;
    margin-bottom: 5px;
}
[item="comment"] .post-data .data-cont{
    margin-bottom: 0px;
}
.item-max-width{
    max-width: 550px;
}
.fullview .post-data .data-cont{
    margin-bottom: 10px;
}
.post-item .post-text{
    font-size: 1.1rem;
    cursor: pointer;
    line-height:150%;
    white-space: pre-line;
}
.post-item.comment .post-text{
    font-size: 1.0rem;
    line-height:130%;
    display: inline-flex;
    flex-direction: column;
    flex: 0 0 auto;
    width: auto;
    max-width: 400px;
    border-radius: 0px 20px 20px 20px;
    padding: 10px;
    background: linear-gradient(152deg, #f4f6fd, #faf4fd);
    border-color: #f4f6fd;
    color: black;
}
@media(max-width: 400px){
.post-item.comment .post-text{
    max-width: calc(100vw - 80px) !important;
}
}
.post-item.commentReply .post-text{
    font-size: 14px;
}
.fullview.post-item .post-text{
    font-size: 1.267rem;
}
[question-option]{
    cursor: pointer;
    display: none;
}
[question-option].show{
    display: block;
}
[question-option] .option-item{
    border: 2px solid transparent;
    position: relative;
    padding: 10px 15px;
    transition: 0.3s ease-in-out;
}
[question-option] .option-item:hover{
    border-color: var(--surface-500);
}
[question-option] .option-item.selected{
    background-color: var(--surface-200);
}
.post-item .post-img .badge{
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: white;
    font-weight: 500;
    height: 25px;
    width:25px;
    border-radius: 50px;
}
.post-item .post-img{
    margin-top: 15px;
    /* border-radius: 10px; */
}
.post-item .post-img img{
    width: auto;
    height: auto;
    max-height: 350px;
    max-width: 100%;
    /* border-radius: 10px; */
}
.post-item.comment .post-img img{
    width: auto;
    height: auto;
    max-height: 150px;
    max-width: 100%;
    /* border-radius: 10px; */
}
.post-item.commentReply .post-img img{
    width: auto;
    height: auto;
    max-height: 100px;
    max-width: 100%;
    /* border-radius: 10px; */
}

[img-src]{
    opacity: 0;
    transition: 0.5s ease-in;
}
.post-item button{
    background-color: transparent;
    font-size: 22px;
    border-width: 0px;
}
.post-item.comment button{
    font-size: 19px;
}
.post-item.commentReply button{
    font-size: 16px;
}
.post-item button .pi-send, .pi-send{
    transform: rotate(20deg);
}
.bi-reply{
    transform: rotateY(90deg);
}

@media(max-width: 767px){
    .post-item .post-text{
        font-size: 1rem;
    }
    .post-item.comment .post-text{
        font-size: 14px;
    }
    .post-item.commentReply .post-text{
        font-size: 14px;
    }
    .fullview.post-item .post-text{
        font-size: 1.3rem;
    }
    .post-item{
        user-select: none;
        padding: 10px 0px;
    }
    .post-item.comment .post-inner{
        grid-template-columns: 50px auto;
        grid-template-rows: 25px auto;
    }
    .post-item .post-inner{
        grid-template-columns: 65px auto;
    }
    .post-item:not(.fullview) button{
        font-size: 20px;
    }
    .post-item.comment:not(.fullview) button{
        font-size: 18px;
    }
    .post-item.commentReply button{
        font-size: 16px;
    }
    .avt-profile{
        width: 100px;
        height: 100px;
    }
    .avt-xxl{
        width: 90px;
        height: 90px;
    }
    .avt-xl{
        width: 70px;
        height: 70px;
    }
    .avt-lg{
        width: 60px;
        height: 60px;
    }
    .avt-md{
        width: 50px;
        height: 50px;
    }
    .avt-m{
        width: 45px;
        height: 45px;
    }
    .small-md{
        font-size: 13px;
    }
    
}
 
@media(max-width: 500px){
    .small-mx-fill{
        margin-left:-15px;
        margin-right: -15px;
    }
}

/* collection-grid */
.collection-grid{
    display: grid;
    grid-template-columns: 60% 40%;
    grid-template-rows: 50% auto;
    grid-template-areas:
    "one two"
    "one three";
    grid-column-gap: 10px;
    grid-row-gap: 10px; 
    border-radius: 15px;
    overflow: hidden;
    max-width: 500px;
}
.collection-grid > div{
    background: var(--surface-ground);
}
.collection-grid :nth-child(1){
    grid-area: one;
}
.collection-grid :nth-child(2){
    grid-area: two;
}
.collection-grid :nth-child(3){
    grid-area: three;
}


/* 

.img-grid:not(.img-grid-1){
    position: relative;
    display: grid;
    grid-template-columns: 60% 40%;
    grid-template-rows: 50% auto;
    grid-template-areas:
    "one two"
    "one three";
    grid-column-gap: 5px;
    grid-row-gap: 5px; 
    border-radius: 10px;
    overflow: hidden;
    width: 100%;
    max-width: 300px;
    height: 200px;
}
.img-grid.img-grid-2{
    grid-template-areas:
    "one two"
    "one two";
}
.img-grid.img-grid-1{
    grid-template-columns: auto;
    grid-template-rows: auto;
    position: relative;
    display: grid;
    grid-template-areas:
    "one two"
    "one three";
    border-radius: 10px;
    overflow: hidden;
}
.img-grid:not(.img-grid-1) img{
    height: 100% !important;
    width: 100% !important;
    max-height: 100% !important;
    max-width: 100% !important;
    position: absolute;
    object-fit: cover;
    border-radius: unset !important;
}
.img-grid > div{
    display: none;
    height: 100%;
    width: 100%;
    position: relative;
}

 */



.img-grid > div:nth-child(1),
.img-grid > div:nth-child(2),
.img-grid > div:nth-child(3){
    display: block;
}
.img-grid > :nth-child(1){
    grid-area: one;
}
.img-grid > :nth-child(2){
    grid-area: two;
}
.img-grid > :nth-child(3){
    grid-area: three;
}




.blr-gt-1::after{
	content: "";
	border-radius: 50px;
	display: block;
	position: absolute;
	padding: 12px;
	background-color: #bd79d5;
	filter: blur(1.8rem);
}
.blr-gt-2::after {
	content: "";
	border-radius: 50px;
	display: block;
	position: absolute;
	padding: 12px;
	background-color: #ff7f12;
	filter: blur(1.8rem);
}
.blr-gt-3::after {
	content: "";
	border-radius: 50px;
	display: block;
	position: absolute;
	padding: 12px;
	background-color: rgb(0, 255, 34);
	filter: blur(1.8rem);
}
.blr-gt-4::after{
	content: "";
	border-radius: 50px;
	display: block;
	position: absolute;
	padding: 12px;
	background-color: rgb(255, 32, 77);
	filter: blur(1.8rem);
}



/* z-tab-content */
.z-tab-content ul.nav-ul{
    list-style:none;
    padding: 0;
    border-top: var(--left-nav-border);
    display: flex;
    /* justify-content: center; */
    flex-wrap: nowrap;
}
.z-tab-content ul.border-down{
    border-top: unset;
    border-bottom: var(--left-nav-border);
}
.z-tab-content .z-tab-item{
    padding: 15px 20px;
    font-size: 14px;
    border-top: 2px solid transparent;
    cursor: pointer;
    user-select: none;
    /* font-weight: 500; */
    transition: var(--fast-transition);
    color: var(--surface-700);
}
.z-tab-content ul.border-down .z-tab-item{
    border-top: unset;
    border-bottom: 2px solid transparent;
}

.z-tab-content .z-tab-item.active{
    border-color: black !important;
    color: black;
}
.z-tab-content .z-tab-pane{
    display: none;
}
.z-tab-content .z-tab-pane.active{
    display: block;
}
@media(max-width: 767px){
    .z-tab-content .z-tab-item{
        padding: 10px 15px;
        font-size: 13px;
        border-top: 1px solid transparent;
        /* font-weight: 500; */
        transition: var(--fast-transition);
        color: var(--surface-600);
    }
}


.commentImgPrev img{
	height: 100px;
	border-radius: 5px;
	margin: 8px 5px 5px 0px;
}
.commentImgInput .dz-default.dz-message{
	display: none !important;
}
.commentImgInput .dropzone{
	border: 0px solid !important;
	text-align: inherit;
	max-width: 100%;
	padding: 0px 10px;
	display: flex;
}

.commentImgInput .dropzone .dz-preview.dz-success{
	border: 0px solid !important;
}
inputholder {
min-height: 45px;
max-height: 80px;
width: 100%;
word-wrap: break-word;
word-break: inherit;
padding-top: 12.5px !important;
padding-bottom: 12.5px !important;
overflow-y: scroll;
}
inputholder:focus{
box-shadow: 0 0 0 0 !important;
border:0 !important;
}
inputholder:empty:after{
content: attr(placeholder);
position: absolute;
top: 10px;
}


.has-modal > .dropdown{
    display: none;
}

.has-children > .dropdown{
  visibility: hidden;
  opacity: 0;
  z-index: 2;
  position: absolute;
  min-width: 200px;
  background: #fff;
  scale: 0;
  -webkit-transition: 0.2s 0s;
  -o-transition: 0.2s 0s;
  transition: 0.2s 0s;
}
.has-children > .dropdown::before{
  content: '';
  display: block;
  position: absolute;
  width: 100%;
  top:0px;
  bottom: 0px;
  -webkit-box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);
  z-index: -1;
}
.has-children{
  position: relative;
}
.unset-left{
  left: unset
}
.right-0{
  right: 0;
} 
.right-100{
  right: 100%;
} 
.left-0{
  bottom: 0;
}
.top-100{
  top: 100% !important;
}
.bottom-0{
  bottom: 0;
}
.bottom-100{
  bottom: 100% !important;
}
.bottom-alt-100{
  bottom: -100px;
}

.has-children:hover > .dropdown,
.has-children:focus > .dropdown,
.has-children:active > .dropdown{
  -webkit-transition-delay: 0s;
  -o-transition-delay: 0s;
  transition-delay: 0s;
  scale: 1; 
  visibility: visible;
  opacity: 1;
}

.has-children:hover, .has-children:focus, .has-children:active {
  cursor: pointer;
}
/* messages start*/
#chatBoxParent{
    height:calc(100vh - var(--chartEntry-height));
    overflow-x:hidden;
    overflow-y: auto;
}
#chatBoxParent data{
    min-height:calc(100% + 20px);
    height: auto !important;
}
#chatBoxParent .page-records{
    min-height: calc(100vh);
    padding-bottom:var(--chartEntry-height);
    display: flex;
    flex-direction: column-reverse;
}
.mesage-item-bubble{
    padding: 10px;
    border-radius: 20px;
    width:auto;
    max-width:300px;
}
.mesage-item-bubble.my-bubble{
    background-color: #F9F8FC;
}
.mesage-item-bubble.bubble-1{
    border-radius: 20px 20px 20px 0px;
}
.mesage-item-bubble.bubble-2{
    border-radius: 0px 20px 20px 0px;
}
.mesage-item-bubble.my-bubble.bubble-1{
    border-radius: 20px 20px 0px 20px;
}
.mesage-item-bubble.my-bubble.bubble-2{
    border-radius: 20px 0px 0px 20px;
}

/* messages end */



/*modal start*/
#clippModal{
    background: rgba(0,0,0,0.4);
    position: fixed;
    top: 0px;
    bottom: 0px;
    left: 0px;
    right: 0px;
    width: 100%;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    z-index:2999;
    visibility: hidden;
    opacity: 0;
    transition: 0.1s ease;
}
#clippModal.visible{
    opacity: 1;
}
#clippModal .modalHolder #appmodal{
    visibility: hidden;
    position: relative;
    margin-bottom: -100px;
    transition: 0.2s ease;
}

#clippModal .modalHolder.visible #appmodal{
    margin-bottom: 0px;
    visibility: visible;
}

.modalHolder{
    max-width: 500px;
}
.appModal_parent{
    display: none;
}
#appmodal_holder{
    /*background: rgba(0,0,0,0.5);*/
    top: 0px;
    left: 0px;
    bottom: 0px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    z-index: 2500;
}
#appmodal_header{
    background: white;
    z-index: 1;
}
#appmodal_footer{
    background: white;
}
@media(max-width: 767px){
    #appmodal_holder{align-items: flex-end !important;}
    .h-sm-100{min-height: 100% !important;height: 100%;max-height: 100vh !important;}
	.topNav h3, [smNav] h3{
		font-size: 22px;
	}
}
#appmodal{
    background: white;
    min-height: 200px;
    width:100vw;
    max-width:500px;
    position: relative;
}
@media(min-width: 767px){
    #appmodal.sm_{max-width: 350px !important;}
    #appmodal.md_{max-width: 450px !important;}
    #appmodal.lg_{max-width: 500px !important;}
}
/*modal end*/
</style>