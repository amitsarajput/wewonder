<?php
error_reporting(1);
ob_start();
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . "/wewonder/";
$full_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$cachetype = 1.1;

$page = str_replace($url, '', $full_url);
if($page == "index.php"){
    header('Location: '.$url);
}
if(!$page){
    $page = 'home';
}

$pages = array('home', 'about', 'work', 'services', 'leadership', 'contact', 'blog');

$page_names = array(
    '',
    'zappfresh',
    'indian-earth',
    'omni-united',
    'pepizza',
    'sona',
    'holxo',
    'swinng',
    'black-birdie',
    'advoice-ui',
    'indus-valley-partners',
    'coming-soon1',
    'coming-soon2',
    'coming-soon3',
);

if(!in_array($page, $pages)){
    if(in_array($page, $page_names)){
        $page = 'project-'.$page;
    }else {
        header("HTTP/1.0 404 Not Found");
        $page = 'error';
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <title><?= ucwords(str_replace('-',' ', $page)); ?> - WE Wonder</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <meta name="theme-color" content="#222324"/>
    <meta name="msapplication-navbutton-color" content="#222324"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#222324"/>
    <link href="assets/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/app 1.css">
    <script>var base_url = '<?= $url; ?>'; var main_pages = <?php /*$page_names = array_values(array_filter(array_map('trim', $page_names), 'strlen'));*/ echo json_encode($page_names); ?> </script>
    <script src="assets/js/jquery.min.js"></script>

    <!-- vuejs -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2"></script> -->
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/app 1.js?<?= $cachetype; ?>"></script>
    <link rel="shortcut icon" href="assets/img/fav.png">
    <!-- blog script -->
    <!-- <script src="assets/js/blog.js?<?= $cachetype; ?>"></script> -->
</head>
<body class="preload" id="<?= $page; ?>" data-page="<?= $page; ?>">

<div class="loading_we">
    <div class="animb">
        <span class="lg1"></span>
        <span class="lg2"></span>
        <span class="lg3"></span>
        <span class="lg4"></span>
        <span class="lg5"></span>
    </div>
    <p class="w">W</p>
    <p class="e"><i></i><i></i><i></i></p>
    <p class="we-text">Click to Wonder with us!</p>
</div>

<div class="loader">
    <div class="load"><span><img src="assets/img/line.jpg" class="loaderact"></span></div>
    <p class="load-text">Loading...</p>
</div>

<div class="menubar mline0">
    <span class="title">i think we<br>clicked!</span>
    <div class="blue">
        <a class="remove_menu" href="#">&times;</a>
        <ul>
            <li><a href="<?= $url; ?>" data-page="">home</a></li>
            <li><a href="<?= $url; ?>about" data-page="about">about</a></li>
            <li><a href="<?= $url; ?>work" data-page="work">work</a></li>
            <li><a href="<?= $url; ?>services" data-page="services">services</a></li>
            <li><a href="<?= $url; ?>leadership" data-page="leadership">leadership</a></li>
            <li><a href="<?= $url; ?>blog" data-page="blog">blog</a></li>
            <li><a href="<?= $url; ?>contact" data-page="contact">contact</a></li>
        </ul>
        <img src="assets/img/logo.svg" class="foot_logo">
    </div>
    <?php foreach (range(1, 7) as $r) { ?>
        <div class="menu_line"></div>
    <?php } ?>
</div>

<div class="header">
    <div class="arrow_back showafter">
        <span></span>
    </div>
    <div class="logo showafter">
        <img src="assets/img/logo.svg" class="white">
        <img src="assets/img/logo-b.svg" class="black">
        <img src="assets/img/logo-invert.svg" class="invert">
    </div>
    <div class="menu showafter">
        <button>
            <span></span>
            <span></span>
        </button>
    </div>
</div>

<a href="#" class="gobackdata"></a>

<div class="mbview sub_page home_content">
    <div class="lines">
        <?php
        foreach (range(1, 13) as $r) {
            $mglink = $page_names[$r];
            if($r > 13){
                $r = 14;
            }
            $line = $r;
            include 'assets/inc/proj-'.$r.'.php';
        } ?>
    </div>
</div>



<div class="sub_page blog_content">
    <div class="work_topbar">
        <div class="blue-lecks no-lines">
            <?php
            $margin = array_reverse(array(0, 14.5, 7.5, 6, 5, 4, 3, 2, 1.5, 1));
            $width = array_reverse(array(1, 1.5, 2, 2.5, 2.8, 3, 4, 5, 8, 25.7));
            foreach ($width as $k => $t){
            ?>
            <span style="width: <?= $t; ?>%; margin-left: <?= $margin[$k]; ?>%"></span>
            <?php } ?>
        </div>
        <div class="contents">
            <p class="wow fadeIn">Blog<br>LMC</p>
            <span class="wow fadeInUp">We are focused on creating<br> remarkable human experiences<br> that simplify and clarify your story</span>
            <a class="wow fadeInUp we_redirect" data-page="contact" href="<?= $url; ?>contact">contact</a>
        </div>
        <img src="assets/img/work.svg" class="wow fadeIn rightdown">
        <img src="assets/img/arrow.svg" class="wow fadeIn arrows">
    </div>

    <div class="cnt">
        <div class="b_text wow fadeIn">
            <p class="some_partner">Some of our fine posts in public domain.</p>
            <!-- <div class="menu-popup">
                <span class="sortby">Sort</span>
                <ul>
                    <li><a href="#">Branding</a></li>
                    <li><a href="#">UI / UX</a></li>
                    <li><a href="#">Web</a></li>
                    <li><a href="#">Packaging</a></li>
                </ul>
            </div> -->
        </div>

        <div id="blogsApp" class="row workpage">
            <div class="blogpost" v-for="row in allBlogPosts">
                <p>{{row.first_name}} {{row.last_name}}</p>
            </div>
        </div>

        <div class="b_copy btn-big wow fadeIn">
            <a data-page="contact" href="<?= $url; ?>contact" class="we_redirect">Contact Us</a>
        </div>

        <div class="b_text wow fadeInUp">
            <p>We are brand architects. Our aspirations lie in understanding our client’s work, brand nuances, the challenges at hand, and how we can make it work together.</p>
        </div>

        <div class="b_mnu wow fadeInUp">
            <ul>
                <li><a href="<?= $url; ?>about" data-page="about">About us</a></li>
                <li><a href="<?= $url; ?>leadership" data-page="leadership">Team</a></li>
                <li><a href="<?= $url; ?>work" data-page="work">Work</a></li>
                <li><a href="<?= $url; ?>services" data-page="services">Services</a></li>
                <li><a href="<?= $url; ?>contact" data-page="contact">Contact</a></li>
            </ul>
        </div>

        <div class="f_logo wow fadeIn">
            <img src="assets/img/logo-b.svg">
        </div>

        <div class="b_copy wow fadeIn">
            <p>Copyright © <?= date('Y'); ?> WeWonder Global</p>
        </div>
    </div>
</div>

<div class="sub_page error_content">
    <p class="comings">Page not found..! <a href="<?= $url; ?>">Go to home....</a></p>
</div>

<div class="sub_page about_content">

    <div class="top-lines">
        <?php
        $ard = array(2, 4, 1, 6, 1.5, 1, 2, 1, 4, 1, 2, 0.5, 1, 1.5, 2, 0.8, 6, 2, 1, 3, 1, 4, 1, 2, 0.5, 1);
        foreach ($ard as $p){
            $p = $p*0.5;
            echo '<span style="width: '.$p.'%"></span>';
        }
        ?>
    </div>

    <div class="team-top">
        <div class="teamdata">
            <p class="wow fadeIn">intelligence<br>made visible</p>
            <span class="wow fadeIn">WeWonder is a Digital Creative Agency focused<br>
on design, content, and technology to help you<br>
drive business performance as you pursue<br>
glocal initiatives </span>
            <a data-page="work" href="<?= $url; ?>work" class="we_redirect wow fadeInUp">explore</a>
        </div>
        <img src="assets/img/about.svg" class="wow fadeIn rightdown">
        <img src="assets/img/arrow.svg" class="wow fadeInDown arrows">
    </div>

    <div class="cnt">
        <div class="row">
            <div class="clearfix">
                <div class="w80">
                    <h1 class="wow fadeIn">about us <span class="wow fadeInRight"></span></h1>


                    <div class="clearfix about_data">
                        <div class="width33 bx1">
                            <img src="assets/img/a1-01.svg" class="wow fadeIn">
                            <p class="wow fadeInUp">Based in Dallas, TX, our mission is to unite design, content, and technology to connect your products to the hearts and minds of consumers.</p>
                        </div>
                        <div class="width33 bx2">
                            <img src="assets/img/a2-01.svg" class="wow fadeIn">
                            <p class="wow fadeInUp">Our clients span global economies, societies, social circles and industries. </p>
                        </div>
                        <div class="width33 bx3">
                            <img src="assets/img/a3-01.svg" class="wow fadeIn">
                            <p class="wow fadeInUp">Our team is internationally versed in various regions and cultures around the world if you have “glocal” projects</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row teams">
            <div class="clearfix flags">
                <div class="w80">
                    <div class="clearfix">
                        <div class="country wow fadeInLeft">
                            <div class="rotate-text"><span></span>GO</div>
                        </div>
                        <div class="profile company">
                            <p class="wow fadeInUp">We consider all our
                                clients partners and
                                love to roll our sleeves
                                up with startup firms
                                as much as we do
                                larger Fortune 500
                                companies.</p>
                            <a class="connectus wow fadeInUp we_redirect" data-page="contact" href="<?= $url; ?>contact">Connect with us</a>
                        </div>
                        <div class="country rightsides wow fadeInRight">
                            <div class="rotate-text">GLOCAL</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row is_stretegic">
            <div class="clearfix">
                <div class="w80">
                    <div class="row">
                        <div class="clearfix strategic">
                            <div class="w80">
                                <h1 class="wow fadeIn">Strategic Investors<br>
                                    & Advisors</h1>
                                <h4 class="wow fadeIn">WeWonder is backed by private equity investors and
                                    advisors with experience in design, digital strategy,
                                    change management, brand transformations,
                                    innovation, operations, product packaging, and
                                    corporate strategy, logistics and media. </h4>
                                <a data-page="leadership" href="<?= $url; ?>leadership" class="we_redirect connectus wow fadeIn">Our Team</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row client-sec">
            <div class="clearfix">
                <div class="w90">
                    <div class="clearfix">
                        <div class="w50">
                            <div class="sub-clients">
                                <div class="isclients">
                                <p class="nums wow fadeInLeft">300+</p>
                                <span class="wow fadeInLeft">clients</span>
                                </div>

                                <p class="wow fadeInUp">We have worked closely with more than 300 companies across a wide
                                    array of industries including Technology, Fintech, Cannabis, Retail,
                                    Education, Real Estate, Interior Design, Entertainment, and so on. </p>
                                <p class="wow fadeInUp">Our global client list ranges from legacy Fortune 500 companies looking
                                    to refresh their public perception to venture start-ups ready to impact
                                    markets with new brands or ideas. </p>

                                <a data-page="work" href="<?= $url; ?>work" class="we_redirect connectus wow fadeIn">Explore our work</a>
                            </div>
                        </div>
                        <div class="w50 clientrotate wow fadeInRight">
                            <p>YOU</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row client-sec years">
            <div class="clearfix">
                <div class="w90">
                    <div class="clearfix">
                        <div class="w50">
                            <div class="sub-clients">
                                <div class="isyears">
                                <p class="nums wow fadeInLeft">45</p>
                                <span class="wow fadeInLeft">years</span>
                                </div>

                                <p class="wow fadeInUp">Our founders have collectively spent more than 45 years experiencing, motivating and learning from the evolution
                                    of the digital, design and media industries.
                                </p>

                                <p class="wow fadeInUp">Our clients span global economies, societies, social circles and industries. We work to not only find the common
                                    threads of humanity, but the visual, textural and technological motivators of varying cultures around the world.</p>

                                <p class="wow fadeInUp">Our work knows no borders, but we are sensitive and highly aware of the unique social and cultural differences in
                                    all the countries we do business. Our team is internationally diversified and will be sure you’re properly
                                    represented in the areas you want to target.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="b_text wow fadeInUp">
            <p>We are brand architects. Our aspirations lie in understanding our client’s work, brand nuances, the challenges at hand, and how we can make it work together.</p>
        </div>

        <div class="b_mnu wow fadeInUp">
            <ul>
                <li><a href="<?= $url; ?>about" data-page="about">About us</a></li>
                <li><a href="<?= $url; ?>leadership" data-page="leadership">Team</a></li>
                <li><a href="<?= $url; ?>work" data-page="work">Work</a></li>
                <li><a href="<?= $url; ?>services" data-page="services">Services</a></li>
                <li><a href="<?= $url; ?>contact" data-page="contact">Contact</a></li>
            </ul>
        </div>

        <div class="f_logo wow fadeIn">
            <img src="assets/img/logo-b.svg">
        </div>

        <div class="b_copy wow fadeIn">
            <p>Copyright © <?= date('Y'); ?> WeWonder Global</p>
        </div>
    </div>
</div>

<div class="sub_page work_content">
    <div class="work_topbar">
        <div class="blue-lecks no-lines">
            <?php
            $margin = array_reverse(array(0, 14.5, 7.5, 6, 5, 4, 3, 2, 1.5, 1));
            $width = array_reverse(array(1, 1.5, 2, 2.5, 2.8, 3, 4, 5, 8, 25.7));
            foreach ($width as $k => $t){
            ?>
            <span style="width: <?= $t; ?>%; margin-left: <?= $margin[$k]; ?>%"></span>
            <?php } ?>
        </div>
        <div class="contents">
            <p class="wow fadeIn">Brand<br>Architects</p>
            <span class="wow fadeInUp">We are focused on creating<br> remarkable human experiences<br> that simplify and clarify your story</span>
            <a class="wow fadeInUp we_redirect" data-page="contact" href="<?= $url; ?>contact">contact</a>
        </div>
        <img src="assets/img/work.svg" class="wow fadeIn rightdown">
        <img src="assets/img/arrow.svg" class="wow fadeIn arrows">
    </div>

    <div class="cnt">
        <div class="b_text wow fadeIn">
            <p class="some_partner">Some of our Partners and Projects</p>

            <div class="menu-popup">
                <span class="sortby">Sort</span>
                <ul>
                    <li><a href="#">Branding</a></li>
                    <li><a href="#">UI / UX</a></li>
                    <li><a href="#">Web</a></li>
                    <li><a href="#">Packaging</a></li>
                </ul>
            </div>
        </div>

        <div class="row workpage">
            <div class="clearfix">
            <?php
            $array_links = array(
                'black-birdie',
                'advoice-ui',
                '#',
                '#',
                'indus-valley-partners',
                'zappfresh',
                '#',
                'indian-earth',
                'omni-united',
                'pepizza',
                '#',
                'sona',
                '#',
                '#',
                '#',
                '#',
                'holxo',
                '#',
                'swinng',
                '#',
            );
            $array = array(
                'The Black Birdie',
                'Advoice UI',
                'BookmyHSRP',
                'UI - Market Mix',
                'Indus Valley Partners',
                'Zappfresh',
                'Oxane Partners',
                'Indian Earth',
                'Omni United',
                'Pepizza Pizzeria',
                'Basis Vectors',
                'Sona',
                'ShotX',
                'Travel Metrics',
                '1tab',
                'Go Fressh',
                'Holxo',
                'Howdy App',
                'Swinng App',
                'Light Up',
            );
            $nums = 0;
            foreach ($array as $k => $ut){
                $nums++;
                if($array_links[$k] == "#"){
                    $array_links[$k] = $array_links[$k] . '.';
                }
            ?>
                <div class="anchor">
                    <a href="<?= $url.$array_links[$k]; ?>" data-page="project-<?= $array_links[$k]; ?>" class="right wow fadeInUp">
                        <span></span>
                        <b><?= $ut; ?></b>
                        <p>User Interface<br>Identity System Design</p>
                    </a>
                </div>
            <?php
                if($nums == 3){
                    echo '</div><div class="clearfix">';
                    $nums = 0;
                }
            } ?>
            </div>
        </div>

        <div class="b_copy btn-big wow fadeIn">
            <a data-page="contact" href="<?= $url; ?>contact" class="we_redirect">Contact Us</a>
        </div>

        <div class="b_text wow fadeInUp">
            <p>We are brand architects. Our aspirations lie in understanding our client’s work, brand nuances, the challenges at hand, and how we can make it work together.</p>
        </div>

        <div class="b_mnu wow fadeInUp">
            <ul>
                <li><a href="<?= $url; ?>about" data-page="about">About us</a></li>
                <li><a href="<?= $url; ?>leadership" data-page="leadership">Team</a></li>
                <li><a href="<?= $url; ?>work" data-page="work">Work</a></li>
                <li><a href="<?= $url; ?>services" data-page="services">Services</a></li>
                <li><a href="<?= $url; ?>contact" data-page="contact">Contact</a></li>
            </ul>
        </div>

        <div class="f_logo wow fadeIn">
            <img src="assets/img/logo-b.svg">
        </div>

        <div class="b_copy wow fadeIn">
            <p>Copyright © <?= date('Y'); ?> WeWonder Global</p>
        </div>
    </div>
</div>

<div class="sub_page services_content">
    <div class="team-top">
        <div class="teamdata">
            <p class="wow fadeIn">Great Design<br>
                Great Stories</p>
            <span class="wow fadeIn">= digital empathy, compassion, and emotion<br>
with the end user </span>
        </div>
        <img src="assets/img/service.svg" class="wow fadeIn rightdown">
        <img src="assets/img/arrow.svg" class="wow fadeInDown arrows">

        <div class="mg-lines">
            <?php
            foreach (range(1,25) as $lg){
                echo "<span></span>";
            }
            ?>
        </div>
    </div>


    <div class="cnt">
        <div class="row">
            <div class="clearfix">
                <div class="w80">
                    <h1 class="wow fadeIn">services <span class="wow fadeInRight"></span></h1>
                </div>
            </div>
        </div>


        <div class="row teams">
            <div class="clearfix">
                <div class="w80">
                    <div class="clearfix">
                        <div class="country wow fadeInLeft">
                            <div class="rotate-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SECRET<br>
                                WEAPON</div>
                        </div>
                        <div class="profile company">
                            <p class="wow fadeInUp">We are easy to engage.
                                Think of us as your
                                “secret weapon;” that
                                you can leverage to
                                help tell your story as a
                                strategic outsourcing
                                partner or on a project
                                basis with scalable and
                                adjustable terms. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row issevice">
            <div class="clearfix">
                <div class="w80 inservice">
                    <h1 class="wow fadeIn">Our Services</h1>

                    <div class="clearfix">
                        <div class="w50">
                            <p class="act wow fadeIn">Branding</p>
                            <p class="wow fadeInUp">Brand Strategy</p>
                            <p class="wow fadeInUp">Brand Identity Design</p>
                            <p class="wow fadeInUp">Visual Language</p>
                            <p class="wow fadeInUp">Art Direction</p>
                            <p class="wow fadeInUp">Content Marketing</p>
                        </div>
                        <div class="w50">
                            <p class="act wow fadeIn">Digital</p>
                            <p class="wow fadeInUp">Digital Design</p>
                            <p class="wow fadeInUp">Digital Marketing</p>
                            <p class="wow fadeInUp">Social Media Marketing</p>
                            <p class="wow fadeInUp">Google Adwords</p>
                            <p class="wow fadeInUp">Seo</p>
                        </div>
                    </div>

                    <div class="clearfix">
                        <div class="w50">
                            <p class="act wow fadeIn">Online</p>
                            <p class="wow fadeInUp">User Interface Design (Ui)</p>
                            <p class="wow fadeInUp">User Experience Design (Ux)</p>
                            <p class="wow fadeInUp">App And Website Design</p>
                            <p class="wow fadeInUp">Development</p>
                        </div>
                        <div class="w50">
                            <p class="act wow fadeIn">Videos & Motion</p>
                            <p class="wow fadeInUp">Video Editing</p>
                            <p class="wow fadeInUp">Video Intros & Outros</p>
                            <p class="wow fadeInUp">Web Animation</p>
                            <p class="wow fadeInUp">Animated Gifs</p>
                            <p class="wow fadeInUp">Stop Motion</p>
                        </div>
                    </div>

                    <div class="clearfix">
                        <div class="w50">
                            <p class="act wow fadeIn">Packaging</p>
                            <p class="wow fadeInUp">Packaging Design</p>
                            <p class="wow fadeInUp">Product Design</p>
                            <p class="wow fadeInUp">Materials & Forms</p>
                        </div>
                        <div class="w50">
                            <p class="act wow fadeIn">Print</p>
                            <p class="wow fadeInUp">Marketing Collaterals</p>
                            <p class="wow fadeInUp">Editorial Design</p>
                            <p class="wow fadeInUp">Advertising</p>
                            <p class="wow fadeInUp">Brand Stationery</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row issevice">
            <div class="clearfix">
                <div class="w80 inservice">
                    <h1 class="wow fadeIn">Your Strategic Partner <span class="wow fadeInRight"></span></h1>
                </div>
            </div>
        </div>


        <div class="cm_design">
            <?php
            $cm_design = array();
            $cm_design[] = array(80,0,20,5);
            $cm_design[] = array(41,10,18,10);
            $cm_design[] = array(41,18,18,10);
            $cm_design[] = array(41,26,18,10);
            $cm_design[] = array(0,18,10,2);
            $cm_design[] = array(20,36,14,100);
            $cm_design[] = array(85,55,3,10);
            $cm_design[] = array(0,62,12,10);
            $cm_design[] = array(64,65,15,3);
            $cm_design[] = array(83,75,2,7);
            $cm_design[] = array(35,79,14,50);
            foreach ($cm_design as $k => $t){
                ?>
                <span class="wow fadeInUp tiles design_<?= $k; ?>" style="left: <?= $t[0]; ?>%; top: <?= $t[1]; ?>%; width: <?= $t[2]; ?>%; height: <?= $t[3]; ?>px"></span>
            <?php }
            $cm_designs = array();
            $cm_designs[] = array(63, 9, 'Content');
            $cm_designs[] = array(15, 25, 'Digital Strategy');
            $cm_designs[] = array(75, 32, 'Packaging');
            $cm_designs[] = array(61, 49, 'Web & App UI / UX');
            $cm_designs[] = array(17, 69, 'Strategic Outsourcing Partner');
            foreach ($cm_designs as $k => $t){
                ?>
                <span class="tile-text wow fadeIn" style="left: <?= $t[0]; ?>%; top: <?= $t[1]; ?>%;"><?= $t[2]; ?></span>
            <?php
            } ?>
        </div>

        <div class="b_text wow fadeInUp">
            <p>We are brand architects. Our aspirations lie in understanding our client’s work, brand nuances, the challenges at hand, and how we can make it work together.</p>
        </div>

        <div class="b_mnu wow fadeInUp">
            <ul>
                <li><a href="<?= $url; ?>about" data-page="about">About us</a></li>
                <li><a href="<?= $url; ?>leadership" data-page="leadership">Team</a></li>
                <li><a href="<?= $url; ?>work" data-page="work">Work</a></li>
                <li><a href="<?= $url; ?>services" data-page="services">Services</a></li>
                <li><a href="<?= $url; ?>contact" data-page="contact">Contact</a></li>
            </ul>
        </div>

        <div class="f_logo wow fadeIn">
            <img src="assets/img/logo-b.svg">
        </div>

        <div class="b_copy wow fadeIn">
            <p>Copyright © <?= date('Y'); ?> WeWonder Global</p>
        </div>
    </div>
</div>

<div class="sub_page leadership_content">
    <div class="team-top">
        <div class="bgcolor1"></div>
        <div class="bgcolor2"></div>
        <div class="teamdata">
            <p class="wow fadeIn">Talent is<br>never enough</p>
            <span class="wow fadeIn">The best teams are the hardest workers</span>
            <a data-page="contact" href="<?= $url; ?>contact" class="we_redirect wow fadeInUp">meet us</a>
        </div>
        <img src="assets/img/team.svg" class="wow fadeIn rightdown">
    </div>

    <div class="cnt">

        <div class="row">
            <div class="clearfix">
                <div class="w80 temtops">
                    <h1 class="wow fadeIn">team <span class="wow fadeInRight"></span></h1>
                    <h4 class="wow fadeIn">Our team comprises a diverse group 20 skilled designers, digital
                        engineers, and business savvy marketers — rolling up our sleeves to
                        give your business or product an edge to compete.
                    </h4>
                    <p class="wow fadeIn">Our talent and collective work have been recognized by some of the biggest international outlets and publications including Fox News, Bloomberg,
                        The Wall Street Journal, CNBC, and many others. Our creative designers, strategists and coders have served many clients to compete across a wide
                        range of industries.
                        </p>
                </div>
            </div>
        </div>


        <div class="row teams mgcountry">
            <div class="clearfix">
                <div class="w80 is100">
                    <div class="clearfix">
                        <div class="country wow fadeInLeft">
                            <div class="rotate-text">US<span></span></div>
                        </div>
                        <div class="profile">
                            <p class="name wow fadeInUp">Jared Levy <a href="#"><img src="assets/img/ln.png"></a></p>
                            <p class="designation wow fadeInUp">Co-Founder & Marketing Director</p>
                            <p class="linehr wow fadeInRight"></p>
                            <p class="email wow fadeInUp">jared@wewonderglobal.com</p>
                            <p class="info wow fadeInUp">Jared’s 24+ year career has woven through brand, media, marketing, and
                                finance. While he’s worked for some of the top corporate firms and media
                                outlets globally, his drive lies in perfecting the intricacies and often misused
                                methods of communication across all mediums. </p>
                            <div class="more_about">
                                <p class="info">He’s built a brand around his unique ability to distill and convey complex and esoteric concepts and topics into compelling, easy to understand visuals, sound bytes and text to create compelling, viral content leveraged globally across hundreds of platforms.</p>
                                <p class="info">With an unrelenting drive early on, he was one of the youngest members of the Philadelphia Stock Exchange (PHLX) and highly successful in finance, but after years in that realm, his passion and forte for branding, writing and media work came to fruition, evidenced by his work with top agencies, brands and campaigns.</p>
                                <p class="info big_info">Over the years, Jared has been featured in hundreds of industry publications and won an Emmy for his work on one of the first finance video podcasts, “Trader Cast.” He became a CNBC Fast Money contributor in 2008 and is now a regular finance and economics contributor for Fox News and Fox Business. He is regularly quoted by major trade publications and reputable news outlets globally.</p>
                                <p class="info">Jared served as Senior Derivatives Strategist and media lead for PEAK6 Investments and has created viral online content for firms large and small while helping launch several wildly successful sites. He’s authored several books and hundreds of publications over the years.</p>
                            </div>
                            <a class="moreinfo wow fadeInUp" href="#">+ Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row teams nottop mgcountry">
            <div class="clearfix">
                <div class="w80 is100">
                    <div class="clearfix">
                        <div class="country hideprofile">
                            &nbsp;
                        </div>
                        <div class="profile">
                            <p class="name wow fadeInUp">Chandan Wadhwa <a href="#"><img src="assets/img/ln.png"></a></p>
                            <p class="designation wow fadeInUp">Co-Founder & Creative Director</p>
                            <p class="linehr wow fadeInLeft"></p>
                            <p class="email wow fadeInUp">chandan@wewonderglobal.com</p>
                            <p class="info wow fadeInUp">The inherent hunger for creativity made sure that Chandan never settled for
                                the norm. Armed with a comprehensive 15+ years of hands-on experience in
                                the Design industry, Chandan can very well be dubbed as a serial entrepreneur.</p>
                            <div class="more_about">
                                <p class="info">What started out as a dream from a small room in a residential neighbourhood in 2008, has today flourished in to an international name with an equally passionate team. Chandan started his design firm, Lopamudra Creative, in India armed with a perfectionist streak with an acumen for problem solving and out of the box thinking. Over the years he has not just earned a name and goodwill of his clients but has expanded his niche from Branding to Strategy led Design, UI UX, Packaging, Digital and Environments.</p>
                                <p class="info big_info">A background of Masters in Design from University of Central Lancashire, Software Engineering, Bachelors in Communications along with expertise in Visual Communication from India, Chandan brings to table a perfectionist’s work ethos with a generous garnishing of proven track record. Not just a designer par excellence, Chandan also loves to teach. He was a design professor to students almost his age and remodelled the teaching methodology to more realistic industry assignments. </p>
                                <p class="info">Chandan is not just a businessman, he loves to pursue multiple fields – he is a state level Cricketer and also an awarded photographer in both traditional and digital photography. He has a keen eye for talent, a propensity for problem solving and fantastic grasp of human temperament, these qualities have helped him straddle across continents and have a relationship with his international clients as well. Chandan is truly a global citizen with a profound love of creating.</p>
                            </div>
                            <a class="moreinfo wow fadeInUp" href="#">+ Read More</a>
                        </div>
                        <div class="country rightsides wow fadeInRight">
                            <div class="rotate-text"><span></span>INDIA</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="b_text wow fadeInUp">
            <p>We are brand architects. Our aspirations lie in understanding our client’s work, brand nuances, the challenges at hand, and how we can make it work together.</p>
        </div>

        <div class="b_mnu wow fadeInUp">
            <ul>
                <li><a href="<?= $url; ?>about" data-page="about">About us</a></li>
                <li><a href="<?= $url; ?>leadership" data-page="leadership">Team</a></li>
                <li><a href="<?= $url; ?>work" data-page="work">Work</a></li>
                <li><a href="<?= $url; ?>services" data-page="services">Services</a></li>
                <li><a href="<?= $url; ?>contact" data-page="contact">Contact</a></li>
            </ul>
        </div>

        <div class="f_logo wow fadeIn">
            <img src="assets/img/logo-b.svg">
        </div>

        <div class="b_copy wow fadeIn">
            <p>Copyright © <?= date('Y'); ?> WeWonder Global</p>
        </div>
    </div>
</div>

<div class="sub_page contact_content">
    <div class="top-lines">
        <?php
        $ard = array(2, 4, 1, 6, 1.5, 1, 2, 1, 4, 1, 2, 0.5, 1, 1.5, 2, 0.8, 6, 2, 1, 3, 1, 4, 1, 2, 0.5, 1);
        foreach ($ard as $p){
            $p = $p*0.5;
            echo '<span style="width: '.$p.'%"></span>';
        }
        ?>
    </div>

    <div class="contact-top">
        <div class="contact-form clearfix"> 
            <p class="wow fadeInLeft">Say Hello</p>
            <form method="post" class="wow fadeIn" onsubmit="return false;">
                <input type="text" placeholder="Name">
                <input type="text" placeholder="Contact">
                <input type="text" placeholder="Number">
                <textarea placeholder="Message" rows="4"></textarea>
                <button>Submit</button>
            </form>
            <div class="contact-details wow fadeInRight">
                <b>WeWonder Global</b>
                <span>5555 Apollo Drive, 2nd Floor, Dallas TX 75234</span>
                <span>Call: +1.2548.27741</span>
                <span>Email: hello@wewonderglobal.com</span>
            </div>
        </div>
        <img src="assets/img/contact.svg" class="wow fadeIn rightdown">
    </div>

    <div class="cnt">
        <div class="b_text wow fadeInUp">
            <p>We are brand architects. Our aspirations lie in understanding our client’s work, brand nuances, the challenges at hand, and how we can make it work together.</p>
        </div>

        <div class="b_mnu wow fadeInUp">
            <ul>
                <li><a href="<?= $url; ?>about" data-page="about">About us</a></li>
                <li><a href="<?= $url; ?>leadership" data-page="leadership">Team</a></li>
                <li><a href="<?= $url; ?>work" data-page="work">Work</a></li>
                <li><a href="<?= $url; ?>services" data-page="services">Services</a></li>
                <li><a href="<?= $url; ?>contact" data-page="contact">Contact</a></li>
            </ul>
        </div>

        <div class="f_logo wow fadeIn">
            <img src="assets/img/logo-b.svg">
        </div>

        <div class="b_copy wow fadeIn">
            <p>Copyright © <?= date('Y'); ?> WeWonder Global</p>
        </div>
    </div>
</div>

<div class="hidden">

</div>
<script>

</script>
</body>
</html>
