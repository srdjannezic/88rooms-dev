<?php /* @var $this Controller */ 
$language = Yii::app()->language;
$isFrontpage = false;
if ((Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId()) == 'site/index'  ) { 
    $isFrontpage = true;
} 
$homeclass = "";
if($isFrontpage) $homeclass = "class='home'";
//var_dump('expression');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <meta name="viewport" content="width=1400" />
        <link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/favicon_16x16.png" sizes="16x16" />
        <link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/favicon_32x32.png" sizes="32x32" />
        <link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/favicon_196x196.png" sizes="196x196" />
        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/vendors/flexslider/flexslider.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/vendors/royalslider/royalslider.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/vendors/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/vendors/Zebra_Datepicker-master/public/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/grid.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/style_new.css" />
   	<link href="/booking/phobs.css" rel="stylesheet" type="text/css" />                       <!-- INSERT THIS PART IN PAGE HEAD SECTION -->
   	<!--<link href="/booking/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />--> 
   	<!--<link href="/booking/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />--> 
   	<link href="/booking/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />            
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/vendors/royalslider/skins/default/rs-default.css" rel="stylesheet" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->
        
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TL4M8C8');</script>
        <!-- End Google Tag Manager -->
    </head>

    <body <?= $homeclass ?>>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TL4M8C8"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1459864330949696&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="header-wrap">
        <hr />
            <div class="container_12 cf" id="header">                           
                <div id="logo" class="grid_2 first">
                    <a href="<?php echo param('baseUrl'); ?>" title="">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/88_logo.gif" alt=""/>
                    </a>
                </div>
                <div id="mainmenu" class="grid_10">
                    <div class="menu-top cf">
                        <div class="grid_8 first menu-first-row">
                            <?php
                            $this->widget('zii.widgets.CMenu', array(
                                'items' => Menu::model()->formatMenu("top1"),
                                'htmlOptions' => array(
                                    'class' => 'nav pull-right',
                                ),
                            ));
                            ?>
                        </div>
                        <div class="grid_2 last">
                            <div class="social first last">
                                <ul>
                                    <li class="tw">
                                        <a href="<?php echo $this->config->twitter; ?>" title="Twitter" target="_blank"></a>
                                    </li>
                                    <li class="fb">
                                        <a href="<?php echo $this->config->facebook; ?>" title="Facebook" target="_blank"></a>
                                    </li>
                                    <li class="inst">
                                        <a href="<?php echo $this->config->instagram; ?>" title="Instagram" target="_blank"></a>
                                    </li>
                                    <li class="linkedin">
                                        <a href="<?php echo $this->config->linkedin; ?>" title="Linkedin" target="_blank"></a>
                                    </li>
                                </ul>
                            </div>
                            <?php
                            $this->widget('LanguageSelector');
                            ?>
                        </div>
                    </div>
                    <div class="menu-top-btm cf">
                        <div class="grid_7 first menu-top-btm-sec menu-second-row">
                            <?php
                            $this->widget('zii.widgets.CMenu', array(
                                'items' => Menu::model()->formatMenu("top2"),
                                'htmlOptions' => array(
                                    'class' => 'nav pull-right',
                                ),
                            ));
                            ?>
                        </div>
                        <div class="grid_3 modified first">
                        <?php /*
                            <div class="book-now-drop">                                
                                <?php
                                /*$this->widget('BookNow', array(
                                    'title' => Translation::model()->getByKey('book_now'),
                                    "boxType" => 'drop',
                                    "aditionalText" => '* ' . Translation::model()->getByKey('all_fields_are_mandatory'),
                                    'cancelationText' => Translation::model()->getByKey('cancel_reservation'),
                                        )
                                );*//*
                                ?>
                                <a target="_blank" href="<?php echo param('bookingBaseUrl'); ?>" class="book-new-top" target="_blank">
                                    <?php echo Translation::model()->getByKey('book_now');?>
                                    <i class="calendar-white"></i>
                                </a>
                            </div>
                            <?php */ ?>
                        </div>
                    </div>
                </div>
            </div><!-- mainmenu -->
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>
            <div id="inner-header-bottom" class="booking">
               <?php 
               switch($language){
                    case 'sr': 
                         include_once('booking/booking_form_rs.html');
                         break;                                    
                    default:
                         include_once('booking/booking_form_en.html');
                         break;
               } 
             ?>                 
            </div>
	</div>

        <?php echo $content; ?>
        <div class="clear"></div>        
        <?php echo $this->renderPartial("//common/partials/_book_now_form"); ?>        
        <div class="clear"></div>

        <div id="footer">
            <span class="footer-rect"></span>
            <div class="footer-inner container_12 cf">
                <div class="container_12 cf footer-navs">
                    <div class="grid_3 first">                        
                        <nav class="footer-block">
                            <h2><a href="<?php echo Utility::createUrl("page/index", array("slug" => "about-the-hotel")); ?>"><?php echo Translation::model()->getByKey('about_the_hotel'); ?></a></h2>
                            <?php
                            $this->widget('zii.widgets.CMenu', array(
                                'items' => Menu::model()->formatMenu("footer1"),
                                'htmlOptions' => array(
                                    'class' => '',
                                ),
                            ));
                            ?>
                        </nav>
                        <div class="book-now-link">
                            <a href="/book-now/"><?php echo Translation::model()->getByKey('book_now'); ?></a>
                        </div>
                    </div>
                    <div class="grid_3">
                        <nav class="footer-block">
                            <h2><a href="<?php echo Utility::createUrl("page/index", array("slug" => "rooms-and-suites")); ?>"><?php echo Translation::model()->getByKey('rooms_and_suits'); ?></a></h2>
                            <ul>
                                <?php foreach (HotelRoom::model()->findAll() as $room): ?>
                                    <li><a href="<?php echo Utility::createUrl("rooms/view", array("slug" => $room->slug)); ?>" title="<?php echo $room->name; ?>"><?php echo $room->name; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                        <nav class="footer-block">
                            <h2><a href="<?php echo Utility::createUrl("page/index", array("slug" => "vip-concierge")); ?>"><?php echo Translation::model()->getByKey('vip_concierge'); ?></a></h2>
                            <ul>
                                <?php foreach (CityOffer::model()->findAll(array("limit" => 2)) as $child): ?>
                                    <li><a href="<?php echo Utility::createUrl("cityOffers/view", array("slug" => $child->slug)); ?>" title="<?php echo $child->title; ?>"><?php echo $child->title; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="grid_3">
                        <nav class="footer-block">
                            <h2><a href="<?php echo Utility::createUrl("page/index", array("slug" => "special-offers")); ?>"><?php echo Translation::model()->getByKey('special_offers'); ?></a></h2>
                            <ul>
                                <?php foreach (SpecialOffer::model()->findAll(array("limit" => 4, 'order' => 'ordr')) as $offer): ?>
                                    <li><a href="<?php echo Utility::createUrl("specialOffers/view", array("slug" => $offer->slug)); ?>" title="<?php echo $offer->title; ?>"><?php echo $offer->title; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                        <div class="footer-block">
                            <h2>
                                <a href="<?php echo Utility::createUrl("page/index", array("slug" => "news")); ?>" ><?php echo Translation::model()->getByKey('news'); ?></a>
                            </h2>
                        </div>
                        <div class="footer-block">
                            <h2>
                                <a href="<?php echo Utility::createUrl("page/index", array("slug" => "events-and-conferences")); ?>"><?php echo Translation::model()->getByKey('events_and_conferences'); ?></a>
                            </h2>                            
                        </div>
                    </div>
                    <div class="grid_3">
                        <div class="footer-block">
                            <h2><?php echo Translation::model()->getByKey('contact_us'); ?></h2>
                            <p><?php echo Translation::model()->getByKey('address'); ?>: </p>
                            <p><?php echo $this->config->address; ?>,</p>
                            <p><?php echo Translation::model()->getByKey('tel'); ?>: <?php echo $this->config->phone; ?></p>
                            <p><?php echo Translation::model()->getByKey('email'); ?>: <?php echo $this->config->email; ?></p>
                        </div>
                        <div class="footer-block social-footer">
                            <h2><?php echo Translation::model()->getByKey('follow_us'); ?></h2>
                            <p>
                                <ul class="cf">
                                    <li><a href="<?php echo $this->config->facebook; ?>" title="Facebook" target="_blank">Facebook</a></li>
                                    <li><a href="<?php echo $this->config->twitter; ?>" title="Twitter" target="_blank">Twitter</a></li>
                                    <li><a href="<?php echo $this->config->instagram; ?>" title="Instagram" target="_blank">Instagram</a></li>
                                    <li><a href="<?php echo $this->config->linkedin; ?>" title="Linkedin" target="_blank">Linkedin</a></li>
                                </ul>
                            </p>
                        </div>
                        <div class="footer-block">
                            <div class="grid_2 first">
                                <h2><?php echo Translation::model()->getByKey('language'); ?></h2>
                            </div>
                            <?php
                            $this->widget('LanguageSelector');
                            ?>
                        </div>
                    </div>
                </div>
                <div id="logo-footer" class="centered">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/logo-footer.png" />
                </div>
                <div class="grid_6 first left-aligned">
                    <p class="copy">&copy; 88 Rooms Hotel <?php echo date("Y");?>. All Rights Reserved.</p>
                </div>
                <div class="grid_6 right-aligned">
                    <!--<p class="copy">88 Rooms Hotel is a part of MK Mountain Resort d.o.o.</p>-->
                </div>

            </div>
        </div><!-- footer -->

        </div><!-- page -->
        <?php /*<div class="popup">
            <div class="popup-inner">
                <div class="popup-inner-wrap">
                    <span class="popup-close"></span>
                    <?php if (Yii::app()->language == 'sr') { ?>
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/popup/srb_1.png" />
                    <?php } else { ?>
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/popup/eng_1.png" />
                    <?php } ?>
                </div>
            </div>
        </div>*/?>
                         
     <script language="javascript" type="text/javascript" src="/booking/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
   <script language="javascript" type="text/javascript" src="/booking/phobs.js"></script>    <!-- INSERT THIS PART IN PAGE HEAD SECTION -->
    <script language="javascript" type="text/javascript" src="/booking/bootstrap/js/bootstrap.min.js"></script>
   <script language="javascript" type="text/javascript" src="/booking/bootstrap/js/bootstrap.js"></script>   
                 
                   <script type="text/javascript">                    
                      $(function() {

                         $(".datetimepicker1 > input").attr('disabled','disabled');
                         date = new Date();
                        day = str_pad(date.getDate());
                        month = str_pad(date.getMonth()+1);
                        year = date.getFullYear();
                        var currentDate = day + "-" + month + "-" + year;
                        $("#datetimepicker1 > input").val(currentDate);  
                       console.log('test');

                      if(screen.width > 800){  
                        $("#phobs_book").find(".nights-box").find("select").append('<option value="1" selected="selected" hidden>1</option>');
                        $("#phobs_book").find(".adults-box").find("select").append('<option value="0" selected="selected" hidden>0</option>');
                        $("#phobs_book").find(".chd-box").find("select").append('<option value="0" selected="selected" hidden>0</option>');                  
                        $("#phobs_book").find("input").removeAttr('placeholder');
                      }
                        $('#datetimepicker1 > input').datepicker({ showOn: "both",
                buttonImage: "/booking/images/calendar-white.svg",
                buttonImageOnly: true,dateFormat: 'dd-mm-yy'});
                    
                      });
                      
                       $(".phobs-booknow").hover(function(){
                       	//console.log('puf');
                       	var datetime = $("#datetimepicker1 > input").val();
                       	var date_array = datetime.split("-");
                       	var arrival = date_array[2] + "-" + date_array[1] + "-" + date_array[0];
                       	var nights = $("select[name='nights']").val();
                       	var adults = $("select[name='adults[1]']").val();
                       	var childs = $("select[name='chd[1]']").val();
                       	var access = $(".access_code").val();

                       	console.log(datetime);
                       	console.log(nights);
                       	console.log(adults);
                       	console.log(childs);
                       	console.log(access);

                       	$(this).attr('href',"/book-now/?nights="+nights+"&arrival="+arrival+"&adults="+adults+"&chd="+childs+"&access="+access);
                       });
                       
                      function str_pad(n) {
                        return String("00" + n).slice(-2);
                      }

                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', 'UA-48730929-1']);
                _gaq.push(['_trackPageview']);

                (function() {
                    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                })();     




                    </script>   
             
                          <?php /**/ ?>
    </body>
</html>
