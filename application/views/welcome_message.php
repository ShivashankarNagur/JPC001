

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Shiv Title</title>

    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">

   <link href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link href='https://fonts.googleapis.com/css?family=Lato:400,300,100,700,900' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/animate.css">
</head>

<body>
    <!-- HEADER -->
    <header id="header">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid top-nav">
                <!-- Brand and toggle get grouped for better mobile display -->

                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo-top page-scroll" href="#header">
                      <!--   <img class="img-responsive"  src="<?php echo base_url(); ?>/assets/img/logo.png" alt="logo"> -->
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden nav-buttons">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#services">Services</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#team">Team</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#portfolio">Portfolio</a>
                        </li>
                        <li>
                            <a class="listName" data-screen="bbm/adminPageCt/index" >adminPage</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#clients">Clients</a>
                        </li>
                       <!--  <li>
                            <a class="page-scroll" href="#testimonials">Testimonials</a>
                        </li> -->
                        <li>
                            <a class="page-scroll" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    <!-- Slider -->
    <section id="slider">
      <div id="myCarousel-one" class="carousel slide">

       <ol class="carousel-indicators">
            <li data-target="#myCarousel-one" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel-one" data-slide-to="1"></li>
           
        </ol>

            <div class="carousel-inner appendHeaderImage">
                <!-- <div class="item active "> 
                    <div class="carousel-caption wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="intro-text">
                                    <h1 class="intro-lead-in animated bounceInLeft">Creative Digital</h1>
                                    <h2 class="intro-heading animated bounceInRight">Agency</h2>
                                    <p class="intro-paragraph animated bounceInRight">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime <br>quam architecto quo inventore harum ex magni, dicta impedit.</p>
                                </div>
                                <a href="#services" class="page-scroll btn btn-xl slider-button animated bounceInUp">Services</a>
                            </div>
                        </div>
                    </div>

                    <img src="<?php echo base_url(); ?>/assets/img/backgrounds/header-bg.jpg" alt="slider-image"/>
                </div>
                 <div class="item">
                    <div class="carousel-caption wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="intro-text">
                                    <h1 class="intro-lead-in animated bounceInLeft">Creative Digital</h1>
                                    <h2 class="intro-heading animated bounceInRight">Agency</h2>
                                    <p class="intro-paragraph animated bounceInRight">Welcome to our private quarters on the web</p>
                                </div>
                                <a href="#services" class="page-scroll btn btn-xl slider-button animated bounceInUp">Services</a>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo base_url(); ?>/assets/img/backgrounds/header-bg-two.jpg" alt="slider-image"/>
                </div> 

                     -->
                     <a class="myCarousel-one-left" href="#myCarousel-one" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="myCarousel-one-right" href="#myCarousel-one" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services">
       <!--  <h2 class="section-heading1 text-center" style="color:white;">Services</h2> -->
       <!--  <div class="container-fluid wrapper"> -->

           <!--  <div class="row">
                <div class="col-lg-12 text-left">
                    <h2 class="section-heading">Services</h2>
                    <h3 class="section-subheading" >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </h3>
                </div>
            </div> -->
           <!--  <div class="row text-center">
               
                <div class="row first-services">
                    <div class="col-sm-12 col-md-4 service">
                        <i class="fa fa-desktop"></i>
                        <h4 class="service-heading">Web and Graphic Design</h4>
                        <p class="text-services">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-sm-12 col-md-4 service">
                        <i class="fa fa-magic"></i>
                        <h4 class="service-heading">Branding</h4>
                        <p class="text-services">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-sm-12 col-md-4 service">
                        <i class="fa fa-cubes"></i>
                        <h4 class="service-heading">Front End Development</h4>
                        <p class="text-services">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                </div>
               
                <div class="row second-services">
                    <div class="col-sm-12 col-md-4 service">
                        <i class="fa fa-cogs"></i>
                        <h4 class="service-heading">Back End Development</h4>
                        <p class="text-services">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-sm-12 col-md-4 service">
                        <i class="fa fa-laptop"></i>
                        <h4 class="service-heading">Responsive Design</h4>
                        <p class="text-services">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-sm-12 col-md-4 service">
                        <i class="fa fa-heart"></i>
                        <h4 class="service-heading">Consulting</h4>
                        <p class="text-services">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
    <!-- Team Section -->
    <section id="team">
         <div class="container-fluid wrapper">
            
            <div id="myCarousel-two" class="carousel slide">
               
                <div class="carousel-inner team-wrapper teamMembersDiv">
                    
                </div>
               
                <a class="left carousel-control" href="#myCarousel-two" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel-two" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
                
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel-two" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel-two" data-slide-to="1"></li>
                    <li data-target="#myCarousel-two" data-slide-to="2"></li>
                </ol>
            </div>
        </div> 
    </section>
    <!-- Portfolio Section -->
     
    <section id="portfolio">
        <h2 class="text-center" style="margin-top:-45px;">Tenders</h2>
        <!-- <div class="container-fluid wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-heading">Portfolio</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</h3>
                </div>
                <div class="col-xs-12 col-md-12 portfolio-submenu text-center">
                    <ul class="filter">
                        <li><a class="active" href="#" data-filter="*">All</a></li>
                        <li><a href="#" data-filter=".wordpress">WordPress</a></li>
                        <li><a href="#" data-filter=".html">Web Design</a></li>
                        <li><a href="#" data-filter=".graphic">Graphic Design</a></li>
                        <li><a href="#" data-filter=".php">PHP</a></li>
                        <li><a href="#" data-filter=".bootstrap">Bootstrap</a></li>
                    </ul>
                    
                </div>
            </div>
        </div> -->

        <div class="portfolio-wrapper portfolio-container-fluid">
            <div class="portfolio-items portfolioSubDiv">
              <!--   <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 work-grid php graphic">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                                <div class="hover-text">
                                    <h4>Wine Label</h4>
                                    <h5>Branding</h5>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="<?php echo base_url(); ?>/assets/img/portfolio/card.jpg" class="img-responsive" alt="portfolio-image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 work-grid php graphic">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                                <div class="hover-text">
                                    <h4>Business Card</h4>
                                    <h5>Stationary</h5>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="<?php echo base_url(); ?>/assets/img/portfolio/2.jpg" class="img-responsive" alt="portfolio-image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 work-grid wordpress bootstrap">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <h5>Branding</h5>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="<?php echo base_url(); ?>/assets/img/portfolio/3.jpg" class="img-responsive" alt="portfolio-image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 work-grid wordpress html bootstrap graphic">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <h5>Branding</h5>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="<?php echo base_url(); ?>/assets/img/portfolio/4.jpg" class="img-responsive" alt="portfolio-image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 work-grid wordpress graphic">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                                <div class="hover-text">
                                    <h4>Web Design</h4>
                                    <h5>Web Design</h5>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="<?php echo base_url(); ?>/assets/img/portfolio/5.jpg" class="img-responsive" alt="portfolio-image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 work-grid wordpress html graphic">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                                <div class="hover-text">
                                    <h4>Packageing and Label Design</h4>
                                    <h5>Branding</h5>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="<?php echo base_url(); ?>/assets/img/portfolio/6.jpg" class="img-responsive" alt="portfolio-image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 work-grid wordpress graphic">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <h5>Branding</h5>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="<?php echo base_url(); ?>/assets/img/portfolio/1.jpg" class="img-responsive" alt="portfolio-image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 work-grid wordpress graphic">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                                <div class="hover-text">
                                    <h4>Book Cover</h4>
                                    <h5>Branding</h5>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="<?php echo base_url(); ?>/assets/img/portfolio/book.jpg" class="img-responsive" alt="portfolio-image">
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Pricing Section -->
    <!-- <section id="pricing">
        <div class="container-fluid wrapper">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <h2 class="section-heading">Pricing</h2>
                    <h3 class="section-subheading">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="pricing text-center">
                    <div class="pricing-top-box">
                         <h3 class="pricing-title">Basic</h3>
                        <h4 class="price">$39</h4>
                    </div>
                    <ul>
                        <li>Free Download</li>
                        <li>1000+ Softwear</li>
                        <li>Full Access</li>
                        <li>Free Update</li>
                        <li>Live Support</li>
                    </ul>
                    <a href="" class="btn btn-send">Sign Up</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="pricing text-center">
                    <div class="pricing-top-box">
                       <h3 class="pricing-title">Medium</h3>
                        <h4 class="price">$89</h4>
                    </div>
                    <ul>
                        <li>Free Download</li>
                        <li>1000+ Softwear</li>
                        <li>Full Access</li>
                        <li>Free Update</li>
                        <li>Live Support</li>
                    </ul>
                    <a href="" class="btn btn-send">Sign Up</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="pricing text-center">
                    <div class="pricing-top-box">
                        <h3 class="pricing-title">Premium</h3>
                        <h4 class="price">$119</h4>
                    </div>
                    <ul>
                        <li>Free Download</li>
                        <li>1000+ Softwear</li>
                        <li>Full Access</li>
                        <li>Free Update</li>
                        <li>Live Support</li>
                    </ul>
                    <a href="" class="btn btn-send">Sign Up</a>
                </div>
            </div>
        </div>
    </section>-->
    <!-- Client Section -->
    <div id="clients">
        <div class="container-fluid-clients wrapper">
            <div id="myCarousel-three" class="carousel-clients slide">
                <!-- Wrapper for Slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                            <a href="#" class="logo-link"><img src="<?php echo base_url(); ?>/assets/img/clients/envato-logo.png" class="client-logo" alt="logo"></a>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                            <a href="#" class="logo-link"><img src="<?php echo base_url(); ?>/assets/img/clients/geforce-logo.png" class="client-logo" alt="logo"></a>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                            <a href="#" class="logo-link"><img src="<?php echo base_url(); ?>/assets/img/clients/uber-logo.png" class="client-logo" alt="logo"></a>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                            <a href="#" class="logo-link"><img src="<?php echo base_url(); ?>/assets/img/clients/airbnb-logo.png" class="client-logo" alt="logo"></a>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                            <a href="#" class="logo-link"><img src="<?php echo base_url(); ?>/assets/img/clients/bootstrap-logo.png" class="client-logo" alt="logo"></a>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                            <a href="#" class="logo-link"><img src="<?php echo base_url(); ?>/assets/img/clients/tmobile-logo.png" class="client-logo" alt="logo"></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                            <a href="#" class="logo-link"><img src="<?php echo base_url(); ?>/assets/img/clients/woo-logo.png" class="client-logo" alt="logo"></a>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                            <a href="#" class="logo-link"><img src="<?php echo base_url(); ?>/assets/img/clients/valve-logo.png" class="client-logo" alt="logo"></a>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                            <a href="#" class="logo-link"><img src="<?php echo base_url(); ?>/assets/img/clients/talenthouse-logo.png" class="client-logo" alt="logo"></a>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                            <a href="#" class="logo-link"><img src="<?php echo base_url(); ?>/assets/img/clients/amazon-logo.png" class="client-logo" alt="logo"></a>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                            <a href="#" class="logo-link"><img src="<?php echo base_url(); ?>/assets/img/clients/river-logo.png" class="client-logo" alt="logo"></a>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                            <a href="#" class="logo-link"><img src="<?php echo base_url(); ?>/assets/img/clients/audio-logo.png" class="client-logo" alt="logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials Section-->
    <section id="testimonials">
        <div class="container-fluid wrapper"  style="margin-top: -200px;margin-bottom:-200px;">
            <div class="row">
                <div class="col-sm-8 col-lg-12 text-left">
                    <h2 class="section-heading">Testimonials</h2>
                    <h3 class="section-subheading">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div id="myCarousel-four" class="carousel-testimonials slide" data-ride="carousel">
                <!-- Wrapper for Slides -->
                <div class="carousel-inner">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-md-6 col-sm-6">
                                <div class="block-text">
                                    <img src="<?php echo base_url(); ?>/assets/img/team/1.png" alt="team-member-img3" class="col-md-6 img-circle">
                                    <h5 class="testimonial-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </h5>
                                    <p class="testimonial-author"><strong>Martin Santorini</strong>, CEO Talenthouse</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="block-text">
                                    <img src="<?php echo base_url(); ?>/assets/img/team/2.png" alt="team-member-img3" class="col-md-6 img-circle">
                                    <h5 class="testimonial-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </h5>
                                    <p class="testimonial-author"><strong>Pierre Bronson</strong>, CEO Talenthouse</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-6 col-sm-6">
                                <div class="block-text">
                                    <img src="<?php echo base_url(); ?>/assets/img/team/4.png" alt="team-member-img3" class="col-md-6 img-circle">
                                    <h5 class="testimonial-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </h5>
                                    <p class="testimonial-author"><strong>Victor Vella</strong>, CEO Talenthouse</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="block-text">
                                    <img src="<?php echo base_url(); ?>/assets/img/team/3.png" alt="team-member-img3" class="col-md-6 img-circle">
                                    <h5 class="testimonial-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </h5>
                                    <p class="testimonial-author"><strong>Lora Jones</strong>, CEO Talenthouse</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
   <!-- <section id="contact">
        <div class="container-fluid wrapper">
            <div class="row">
                <div class="col-lg-6 text-center">
                    <h2 class="section-heading">Get in touch</h2>
                    <h3 class="section-subheading">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="col-md-6">
                                 <div class="company-address col-sm-6 col-md-6">  
                                    <address>
                                        xBe - Creative Agency
                                        <br>
                                        <span id="map-input">
                                 
                                    284 Swanston St,<br>
                                    Melbourne VIC 3000, Australia</span>
                                        <br>
                                    </address>
                                </div>
                               <div class="company-contact col-sm-6 col-md-6">
                                    <address>Email Us
                                        <br>
                                        <a href="mailto:#">your.email@example.com</a>
                                        <br>
                                        <a href="mailto:#">support@example.com</a>
                                    </address>
                               </div>
                 </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="" novalidate>
                        <div class="row">
                            <div class="col-md-6 contact-form-box">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                           

                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                               
                           </div>
                            <div class="col-md-6">
                                <div id="map-canvas">
                                    
                                </div>
                              </div>   
                                
                            <div class="clearfix"></div>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>-->
    <!-- Footer -->
    <footer>
        <div class="container-fluid wrapper">
            <div class="col-lg-12 footer-info">
                <a class="footer-logo" href="#header">
                  <!--   <img class="img-responsive" src="<?php echo base_url(); ?>/assets/img/footer-logo.png" alt="logo-footer"> -->
                </a>
                <p class="footer-text">Put any meessage. </p>
            </div>
            <div class="col-sm-6 col-md-12 social-icons-footer">
                <ul class="list-inline social-buttons">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-behance"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-google"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 copyright-bottom">
                <span class="copyright">Copyright &copy; JP 2015.</span>
            </div>
        </div>
    </footer>
    <!-- Scroll-up -->
    <div class="scroll-up">
        <a href="#header" class="page-scroll"><i class="fa fa-angle-up"></i></a>
    </div>
    <div id="theme-settings">
        <div id="settings-button">
        </div>
        <div class="color">
            <span class="settings-title">Theme color selector</span>
            <ul class="gradients">
                <li>
                    <div class="gradient1">
                    </div>
                </li>
                <li>
                    <div class="gradient2">
                    </div>
                </li>
                <li>
                    <div class="gradient3">
                    </div>
                </li>
                <li>
                    <div class="gradient4">
                    </div>
                </li>
                <li>
                    <div class="gradient5">
                    </div>
                </li>
                <li>
                    <div class="gradient6">
                    </div>
                </li>
                <li>
                    <div class="gradient7">
                    </div>
                </li>
                <li>
                    <div class="gradient8">
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->
    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2>Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-responsive img-centered" src="<?php echo base_url(); ?>/assets/img/portfolio/flattastic-free.jpg" alt="modal">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <p>
                                <strong>Want this UI kit sample?</strong>You can download it for free, courtesy of <a href="#">edubd.net</a>, or you can download it <a href="#">here</a>.</p>
                            <ul class="list-inline">
                                <li>Date: August 9, 2013</li>
                                <li>Client: Web Designer Depot</li>
                                <li>Category: Graphic Design</li>
                            </ul>
                            <button type="button" class="btn btn-xl" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2>Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-responsive img-centered" src="<?php echo base_url(); ?>/assets/img/portfolio/flat.jpg" alt="modal">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <p>
                                <strong>Want this flat style illustrations? </strong>You can download it for free, courtesy of <a href="#">edubd.net</a>, or you can download it <a href="#">here</a>.</p>
                            <ul class="list-inline">
                                <li>Date: February 20, 2015</li>
                                <li>Client: Web Designer Depot</li>
                                <li>Category: Graphic Design</li>
                            </ul>
                            <button type="button" class="btn btn-xl" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <!-- Color Settings script -->
    <script src="<?php echo base_url(); ?>/assets/js/settings-script.js"></script>
    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery.easing.min.js"></script>
    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/js/jqBootstrapValidation.js"></script>
    
    <!-- SmoothScroll script -->
    <script src="<?php echo base_url(); ?>/assets/js/smoothscroll.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/js/jp.js"></script>
    <!-- Isotope -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.isotope.min.js"></script>
    <!-- Google Map 
    <script src="http://maps.googleapis.com/maps/api/js?extension=.js&output=embed"></script>-->
    <!-- Footer Reveal scirt -->
    <script src="<?php echo base_url(); ?>/assets/js/footer-reveal.js"></script>

</body>
</html>

<script type="text/javascript">

$(document).ready(function(){

$.ajax({
    type:'post',
    url:'./welcome/getCorousalData',
    success:function(data){
        var corousalImges = '';
        var i = 0;
        $.each(data,function(key,val){
           
           var str = i>0?'<div class="item">' : '<div class="item active">';
           i++;
           corousalImges +=str+
                                '<div class="carousel-caption wrapper">'+
                                  '  <div class="row">'+
                                        '<div class="col-md-12">'+
                                           ' <div class="intro-text">'+
                                               ' <h1 class="intro-lead-in animated bounceInLeft">'+val.title+'</h1>'+
                                                '<h2 class="intro-heading animated bounceInRight">'+val.heading+'</h2>'+
                                                '<p class="intro-paragraph animated bounceInRight">'+val.sub_heading+'</p>'+
                                           ' </div>'+
                                            '<a href="#services" class="page-scroll btn btn-xl slider-button animated bounceInUp">Services</a>'+
                                       ' </div>'+
                                    '</div>'+
                                '</div>'+
                               '<img   src="./assets/img/homePage/'+val.home_image+'" />'+
                           ' </div>';
        });
        $(".appendHeaderImage").append(corousalImges); 
    }
})

$.ajax({
    type:'post',
    url:'./welcome/getServeyData',
    success:function(data){
        var servicesDiv = '';
        var servicesFirstRow=''; var servicesSecondRow='';
        var i = 0;
       $.each(data,function(key,val){ 
        //for(var i =0;i<=5;i++){
          if(i<3){
            if(i==0){
                var fafaIconClass= 'fa fa-desktop';
            }else if(i==1){
                var fafaIconClass= 'fa fa-laptop';
            }else if(i==2){
                 var fafaIconClass= 'fa fa-cubes';
            }
            
            servicesFirstRow +=  
                                     '<div class="col-sm-12 col-md-4 service">'+
                                            '<i class="'+fafaIconClass+'"></i>'+
                                            '<h4 class="service-heading">'+val.service_title+'</h4>'+
                                            '<p class="text-services">'+val.short_desc+'</p>'+
                                        
                                    '</div>';
              }else if(i>2 && i<6){
                if(i==3){
                    var fafaIconClass= 'fa fa-heart';
                }else if(i==4){
                    var fafaIconClass= 'fa fa-times';
                }else if(i==5){
                     var fafaIconClass= 'fa fa-plus';
                }
                servicesSecondRow += 
                                        '<div class="col-sm-12 col-md-4 service">'+
                                           '<i class="'+fafaIconClass+'"></i>'+
                                            '<h4 class="service-heading">'+val.service_title+'</h4>'+
                                            '<p class="text-services">'+val.short_desc+'</p>'+
                                        '</div>';

          }
          i++;
      })
       // });
        servicesDiv =    '<div class="container-fluid wrapper">'+
                                '<div class="row text-center">'+
                                '<div class="row first-services">'+
                                servicesFirstRow+
                                '</div>'+
                                '<div class="row second-services">'+
                                servicesSecondRow+
                                '</div>'+
                                '</div>'+
                           '</div>';
        $("#services").append(servicesDiv); 
    }
})


$.ajax({
    type:'post',
    url:'./welcome/getTeamMembersInfo',
    success:function(data){
        var corousalImges = '';
        var i = 0;
        $.each(data,function(key,val){
           
           var str = i>0?'<div class="item">' : '<div class="item active">';
           i++;
           corousalImges +=str+ 
                        
                                    '<div class="col-xs-12 col-sm-4 col-md-4 team-member">'+
                                       '<img   src="./assets/img/team/'+val.member_image+'" />'+
                                   ' </div>'+
                                   ' <div class="col-xs-12 col-sm-8 col-md-8 team-member-bio">'+
                                       ' <h3 class="team-member-name">'+val.member_name+'</h3>'+
                                        '<p class="text-muted-role">'+val.profile+'</p>'+
                                        ' <p class="team-text-short">'+val.about_Desc+'</p>'+
                                        '<ul class="list-inline social-buttons">'+
                                           '<li><a href="#"><i class="fa fa-twitter"></i></a>'+
                                           ' </li>'+
                                          '  <li><a href="#"><i class="fa fa-facebook"></i></a>'+
                                            '</li>'+
                                            '<li><a href="#"><i class="fa fa-linkedin"></i></a>'+
                                            '</li>'+
                                       ' </ul>'+
                                   ' </div>'+
                                '</div>';
        });
        $(".teamMembersDiv").append(corousalImges); 
    }
})

/*
$.ajax({
    type:'post',
    url:'./welcome/getCorousalData',
    success:function(data){
        var corousalImges = '';
        var i = 0;
        $.each(data,function(key,val){
           
           var str = i>0?'<div class="item">' : '<div class="item active">';
           i++;
           corousalImges +=str+ 
                        
                                    '<div class="col-xs-12 col-sm-4 col-md-4 team-member">'+
                                       ' <img src="<?php echo base_url(); ?>/assets/img/team/david.png" alt="team-member-img1">'+
                                   ' </div>'+
                                   ' <div class="col-xs-12 col-sm-8 col-md-8 team-member-bio">'+
                                       ' <h3 class="team-member-name">David Farland</h3>'+
                                        '<p class="text-muted-role">Full Stack Developer</p>'+
                                        ' <p class="team-text-short">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>'+
                                        '<ul class="list-inline social-buttons">'+
                                           '<li><a href="#"><i class="fa fa-twitter"></i></a>'+
                                           ' </li>'+
                                          '  <li><a href="#"><i class="fa fa-facebook"></i></a>'+
                                            '</li>'+
                                            '<li><a href="#"><i class="fa fa-linkedin"></i></a>'+
                                            '</li>'+
                                       ' </ul>'+
                                   ' </div>'+
                                '</div>';
        });
        $(".teamMembersDiv").append(corousalImges); 
    }
})*/


$.ajax({
    type:'post',
    url:'./welcome/getTendersData',
    success:function(data){
        var corousalImges = '';
        var i = 0;
        $.each(data,function(key,val){
           
           var str = i>0?'<div class="item">' : '<div class="item active">';
           i++;
           corousalImges +=str+ 
                       
                                     '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 work-grid php graphic">'+
                                        '<div class="portfolio-item">'+
                                           ' <div class="hover-bg">'+
                                                '<a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">'+
                                                    '<div class="hover-text">'+
                                                        '<h4>'+val.title+'</h4>'+
                                                        '<h5>'+val.Description+'</h5>'+
                                                       ' <div class="clearfix"></div>'+
                                                        '<i class="fa fa-plus"></i>'+
                                                    '</div>'+
                                                   ' <img  src="./assets/img/tenders/'+val.image_path+'" class="img-responsive" alt="portfolio-image">'+
                                                    //'<img   src="./assets/img/team/'+val.member_image+'" />'+
                                                   //' <img src="<?php echo base_url(); ?>/assets/img/portfolio/2.jpg" class="img-responsive" alt="portfolio-image">'+
                                               ' </a>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>';
        });
        $(".portfolioSubDiv").append(corousalImges); 
    }
})



})




$(document).on('click touchstart','.listName',function(){
    var screen = $(this).data('screen');
    window.location.href="../"+screen;
})
</script>

               