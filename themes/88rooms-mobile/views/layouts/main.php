<?php /* @var $this Controller */ 
$language = Yii::app()->language;

$isFrontpage = false;
if ((Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId()) == 'site/index'  ) { 
    $isFrontpage = true;
} 

$homeclass = "";
if($isFrontpage) $homeclass = "class='home'"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <meta name="MobileOptimized" content="320">
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>			
            <link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/favicon_16x16.png" sizes="16x16" />
            <link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/favicon_32x32.png" sizes="32x32" />
            <link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/favicon_196x196.png" sizes="196x196" />
            <!-- blueprint CSS framework -->
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/vendors/flexslider/flexslider.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/vendors/Zebra_Datepicker-master/public/css/bootstrap.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/vendors/lightbox/ilightbox.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/grid.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/style_new.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/menu.css" />
            <!--[if lt IE 8]>
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
            <![endif]-->

   	<link href="/booking/phobs.css" rel="stylesheet" type="text/css" />                       <!-- INSERT THIS PART IN PAGE HEAD SECTION -->

   	<!--<link href="/booking/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />--> 
   	<!--<link href="/booking/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />--> 
   	<link href="/booking/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />            

    </head>

<body>
<div <?= $homeclass ?>>
        <div class="header-wrap">
           
            <div class="container_12 first last modified cf" id="header">
                <div class="grid_3 first">
                    <div class="menu-trigger">
                        <span class="line-m"></span>
                        <span class="line-m"></span>
                        <span class="line-m"></span>
                    </div>
                </div>
                <div id="logo" class="grid_6">
                    <a href="<?php echo param('baseUrl'); ?>" title="">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/logo.png" alt=""/>
                    </a>
                </div>                
                <div class="grid_3 last">                                
                    <div class="book-now-drop">
                        <?php
                        /* $this->widget('BookNow', array(
                          'title' => '<img src="' . Yii::app()->theme->baseUrl . '/assets/images/book_now_mob_icon.png" alt="" width="26px"/>',
                          'formTitle' => Translation::model()->getByKey('book_your_room_now'),
                          "aditionalText" => '* ' . Translation::model()->getByKey('all_fields_are_mandatory'),
                          "boxType" => 'drop',
                          'cancelationText' => Translation::model()->getByKey('cancel_reservation'),
                          'type' => 'mob'
                          )
                          ); */
                          
			$current_date = date('Y-m-d');
                	$next_date = date('Y-m-d',strtotime('+1 day'));
                        $url = "https://secure.phobs.net/webservice/mobile/booking.php?company_id=ec7b8fd084dbf9278ce8cf53c3c4b10b&hotel=733cdb9685efbbd59d3c6bf7831f4d49";                          
                        ?>
                        <a target="_blank" href="<?php echo $url; ?>">
                            <img src="/themes/88rooms-mobile/assets/images/book_now_mob_icon.png" alt="" width="26px" />
                        </a>
                    </div>
                </div>
            </div><!-- mainmenu -->                 
        </div>
        <div id="mainmenu">            
            <div class="menu-top-btm cf">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => Menu::model()->formatMenu("top2"),
                    'htmlOptions' => array(
                        'class' => 'nav pull-right',
                    ),
                ));
                ?>
            </div>
            <div class="menu-top cf">                        
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => Menu::model()->formatMenu("top1"),
                    'htmlOptions' => array(
                        'class' => 'nav pull-right',
                    ),
                ));
                ?>
            </div>
            <div class="m-bottom container_12 cf">
                <div class="grid_5 first">
                    <?php
                    $this->widget('LanguageSelectorLinks');
                    ?>
                </div>
                <div class="grid_5 last">
                    <div class="social first last">
                        <ul>
                            <li class="tw">
                                <a href="<?php echo $this->config->twitter; ?>" title="Twitter" target="_blank">Twitter</a>
                            </li>
                            <li class="fb">
                                <a href="<?php echo $this->config->facebook; ?>" title="Facebook" target="_blank">Facebook</a>
                            </li>
                            <li class="inst">
                                <a href="<?php echo $this->config->instagram; ?>" title="Instagram" target="_blank">Instagram</a>
                            </li>
                            <li class="linkedin">
                                <a href="<?php echo $this->config->linkedin; ?>" title="Linkedin" target="_blank">Linkedin</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> 
        </div>
        <div class="wrapper">  
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
            <?php echo $content; ?>
            <div class="clear"></div>        
            <?php echo $this->renderPartial("//common/partials/_book_now_form"); ?>        
            <div class="clear"></div>

            <div id="footer">
                <span class="footer-rect"></span>
                <div class="footer-inner container_12 cf">
                    <div class="cf footer-navs">
                        <div class="grid_6 first">
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
                                <a href="/book-now/" class="open-book-now"><?php echo Translation::model()->getByKey('book_now'); ?></a>
                            </div>
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
                                    <a href="<?php echo Utility::createUrl("page/index", array("slug" => "news")); ?>" ><a href="<?php echo Utility::createUrl("page/index", array("slug" => "news")); ?>" ><?php echo Translation::model()->getByKey('news'); ?></a></a>
                                </h2>
                            </div>
                            <div class="footer-block">
                                <h2>
                                    <a href="<?php echo Utility::createUrl("page/index", array("slug" => "events-and-conferences")); ?>"><?php echo Translation::model()->getByKey('events_and_conferences'); ?></a>
                                </h2>                            
                            </div>
                        </div>
                        <div class="grid_6 first">                        
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
                            <div class="footer-block">
                                <h2><?php echo Translation::model()->getByKey('contact_us'); ?></h2>
                                <p><?php echo Translation::model()->getByKey('address'); ?>: </p>
                                <p><?php echo $this->config->address; ?>,</p>
                                <p><?php echo Translation::model()->getByKey('tel'); ?>: <a href="tel:<?php echo $this->config->phone; ?>"><?php echo $this->config->phone; ?></a></p>
                                <p><?php echo Translation::model()->getByKey('email'); ?>: <?php echo $this->config->email; ?></p>
                            </div>
                            <div class="footer-block">
                                <h2><?php echo Translation::model()->getByKey('follow_us'); ?></h2>
                                <p><a href="<?php echo $this->config->facebook; ?>" title="Facebook" target="_blank">Facebook</a>, <a href="<?php echo $this->config->twitter; ?>" title="Twitter" target="_blank">Twitter</a>, <a href="<?php echo $this->config->instagram; ?>" title="Instagram" target="_blank">Instagram</a>, <a href="<?php echo $this->config->linkedin; ?>" title="Linkedin" target="_blank">Linkedin</a></p>
                            </div>
                            <div class="footer-block">
                                <div class="grid_6 first">
                                    <h2><?php echo Translation::model()->getByKey('language'); ?></h2>
                                </div>
                                <div class="clearfix"></div>
                                <?php
                                $this->widget('LanguageSelector');
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="logo-footer" class="centered">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/logo-footer.png" />
                    </div>
                    <div class="first last centered">
                        <p class="copy">&copy; 88 Rooms Hotel <?php echo date("Y"); ?>. All Rights Reserved.</p>
                    </div>
                    <div class="first last centered">
                        <!--<p class="copy">88 Rooms Hotel is a part of MK Mountain Resort d.o.o.</p>-->
                    </div>

                </div>
            </div><!-- footer -->

        </div><!-- page -->
        <div class="popup">
            <div class="popup-inner">
                <div class="popup-inner-wrap">
                    <div class="popup-inner-content">
                        <span class="popup-close"></span>
                        <?php if (Yii::app()->language == 'sr') { ?>
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/popup/srb_1.png" />
                        <?php } else { ?>
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/popup/eng_1.png" />
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</div>
  <script language="javascript" type="text/javascript" src="/booking/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
   <script language="javascript" type="text/javascript" src="/booking/phobs.js"></script>    <!-- INSERT THIS PART IN PAGE HEAD SECTION -->
    <script language="javascript" type="text/javascript" src="/booking/bootstrap/js/bootstrap.min.js"></script>
   <script language="javascript" type="text/javascript" src="/booking/bootstrap/js/bootstrap.js"></script>   
                 
                   <script type="text/javascript">                    
                      $(function() {
			$("#phobs_book").attr('action','https://secure.phobs.net/webservice/mobile/booking.php');

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
    </body>
</html>
