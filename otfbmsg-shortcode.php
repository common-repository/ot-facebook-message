<?php
/**
 * Function otfb_message_shortcode()  is used to create shortcode for plugin.
*/
function otfbmsg_message_shortcode(){
  $settings = (array) get_option( 'otfbmsg-plugin-settings' );
  
  ob_start();
  list($r, $g, $b) = sscanf($settings['otfbmsg_bgcolor'], "#%02x%02x%02x");
  $r=$r-30;
  $g=$g-30;
  $b=$b-30;
  if($settings['otfbmsg_layout'] == 'tab-text') {
    $otclass="ot-fbc-tabbutton ".$settings['otfbmsg_otstyle'];
  } else {
    $otclass="trigger-image ot-fbc-tabimage";
  } ?>
  <style type="text/css">
    .ot_facebook_message .tab-content {
      font-size: <?php echo $settings['otfbmsg_fontsize'] ?>px;
    }
    #ot-tab-container{
      background-color: <?php echo $settings['otfbmsg_bgcolor'] ?>;
      border: medium none;
      border-radius: 10px 10px 0 0;
      box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
      color: <?php echo $settings['otfbmsg_textcolor'] ?>;
    }
    <?php if($settings['otfbmsg_position'] == 'bottom-right') { ?>
      #ot-tab-container {
        bottom: 0;
        box-sizing: border-box;
        cursor: pointer;
        left: auto;
        position: fixed;
        right: 0%;
        z-index: 14000000;
      }
      #b-c-facebook {
        position:fixed;
        right:0%;
      }
      <?php } elseif($settings['otfbmsg_position'] == 'bottom-left') { ?>
        #ot-tab-container {
          bottom: 0;
          box-sizing: border-box;
          cursor: pointer;
          right: auto;
          position: fixed;
          left: 0%;
          z-index: 14000000;
        }
        #b-c-facebook {
          position:fixed;
          left:0%;
        }
      <?php } elseif($settings['otfbmsg_position'] == 'center-left') { ?>
        #ot-tab-container {
          top:50%;
           height: 50px;
          position: absolute;
          right: -<?php echo (128 -(18-$settings['otfbmsg_fontsize'])*5); ?>px;
          transform: rotate(90deg);
        }
        #b-c-facebook {
          position:fixed;
          left:0%;
        }
      <?php } elseif($settings['otfbmsg_position'] == 'center-right') { ?>
        #ot-tab-container {
          top:50%;
           height: 50px;
          position: absolute;
          left: -<?php echo (128 -(18-$settings['otfbmsg_fontsize'])*5); ?>px;
          transform: rotate(270deg);
        }
        #b-c-facebook {
          position:fixed;
          right:0%;
        }
      <?php } ?>
      .ot-fbc-tabbutton {
          cursor: pointer;
          float: left;
          font-size: 18px;
          font-weight: normal;
          height: 40px;
          line-height: 32px;
          padding: 4px;
          text-decoration: none;
          width: auto;
      }
      #f-chat-conent {
        border:5px solid <?php echo $settings['otfbmsg_boxcolor'] ?>;
        height:323px;
        border-image: none;
        border-style: solid solid none;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        width: 260px;
      }
      .ot-about {
          background-color: <?php echo $settings['otfbmsg_boxcolor'] ?>;
      }
      .style1 {
          background: rgba(0, 0, 0, 0) linear-gradient(to bottom, <?php echo $settings['otfbmsg_bgcolor'] ?> 0%, rgb(<?php echo $r; ?>,<?php echo $g; ?>,<?php echo $b; ?>) 50%) repeat scroll 0 0;
      }    
  </style>
  <script language="javascript">
    (function(d, s, a) {
      var b, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(a)) return;
      b = d.createElement(s);
      b.id = a;
      b.src = '//connect.facebook.net/en_US/all.js#xfbml=1&version=v2.0';
      fjs.parentNode.insertBefore(b, fjs)
    }(document, 'script', 'facebook-jssdk'));
    
    var f_chat_fanpage = "<?php echo $settings['otfbmsg_fanpage'] ?>";
    jQuery(document).ready(function($) {
       $("#ot-tab-container").css("margin-top","-"+$("#ot-tab-container").height()/2+"px");
      
      $(".f-chat-conent").hover(function() {
        $(".white-icon.icon-close").css("display","block");
      }, function() {
        $(".white-icon.icon-close").css("display","none");
      });
      $(".chat_f_vt").hover(function() {
        $(".ot-close-tabimage").css("display","block");
      }, function() {
        $(".ot-close-tabimage").css("display","none");
      });
      <?php if($settings['otfbmsg_position'] == "center-left") { ?>
        $("#ot-tab-container").click(function(){
          jQuery('#b-c-facebook').css('z-index',101009);
          jQuery('#b-c-facebook').stop(true,false).animate({left:0}, 500); 
        });
        $("#chat_f_close").click(function(){
          jQuery('#b-c-facebook').css('z-index',10000);
          jQuery("#b-c-facebook").stop(true,false).animate({left: -260}, 500); 
        });
      <?php } elseif($settings['otfbmsg_position'] == "center-right") { ?>
        $("#ot-tab-container").click(function(){
          jQuery('#b-c-facebook').css('z-index',101009);
          jQuery('#b-c-facebook').stop(true,false).animate({right:0}, 500); 
        });
        $("#chat_f_close").click(function(){
          jQuery('#b-c-facebook').css('z-index',10000);
          jQuery("#b-c-facebook").stop(true,false).animate({right: -260}, 500); 
        }); 
      <?php }else { ?>
        $("#ot-tab-container").click(function(){
          jQuery('#b-c-facebook').css('z-index',101009);
          jQuery('#b-c-facebook').stop(true,false).animate({bottom:0}, 500);
        });
        $("#chat_f_close").click(function(){
          jQuery('#b-c-facebook').css('z-index',10000);
          jQuery("#b-c-facebook").stop(true,false).animate({bottom: -323}, 500);
          
        });
      <?php } ?>
      $(".ottext").click(function() {
        $(".ottext").css("display","none");
      });
      $("#chat_f_close").click(function() {
        $(".chat-f-b").css("display","block");
      });
      $(".ot-fbc-tabimage img,.icon-ot-icon-close").click(function() {
        $(".otimage").css("display","none");
      }); 
      $(".icon-ot-icon-close").click(function() {
        $(".f-chat-conent").css("display","none");
      });
    });
  </script>
  <div id="ot_facebook_message" class="ot_facebook_message" >
    <div id='fb-root'></div>
    <div id='b-c-facebook' class='chat_f_vt' 
    <?php if($settings['otfbmsg_position'] == "center-left") { ?>
      style="top: 50%; left: -260px; z-index: 10000; margin-top:-162px;"
    <?php } elseif($settings['otfbmsg_position'] == "center-right") { ?>  
      style="top: 50%; right: -260px; z-index: 10000; margin-top:-162px;"
    <?php } else { ?>
      style="bottom: -328px; z-index: 10000;"
    <?php } ?>  >
      <div id='ot-tab-container' class='chat-f-b <?php if($settings['otfbmsg_layout'] == 'tab-img') echo "otimage"; else echo "ottext"; ?>'>
        <?php if($settings['otfbmsg_layout'] == 'tab-text') { ?>
        <div id="ot-fbc-show-widget" class="<?php echo $otclass; ?>">
          <span class="<?php echo $settings['otfbmsg_texticon'] ?> tab-text-icon"></span>
          <div id="f_chat_name" class="tab-content"><?php echo $settings['otfbmsg_tabtext'] ?></div>
        </div>  
        <?php } else { ?>
        <div id="ot-fbc-show-widget" class="<?php echo $otclass; ?>" style="width:<?php //echo $otimagesize; ?>">
          <img width="<?php echo $settings['otfbmsg_imagesize'] ?>" alt="" title=""  src="<?php echo $settings['otfbmsg_otimage'] ?>" />
        </div>
        <div class="ot-close-tabimage">
          <span class=" white-icon  icon-ot-icon-close"></span>
        </div>  
        <?php } ?>
      </div>
      <div id='f-chat-conent' class='f-chat-conent'>
        <a href='#'  id='chat_f_close' class='chat-left-5'><span class=" white-icon  icon-close "></span></a>
        <script>document.write("<div class='fb-page' data-tabs='messages' data-href='"+f_chat_fanpage+"' data-hide-cover='false' data-width='250' data-height='300' data-small-header='true' data-adapt-container-width='true' data-hide-cover='true' data-show-facepile='false' data-show-posts='true'></div>");</script>
        <div class="ot-about"> 
      </div>
      </div>
    </div>
  </div>
  <?php
  $shortcodeData = ob_get_contents(); 
  ob_end_clean();
  return $shortcodeData;
} 

/**
 * Function otfbmsg_register_shortcodes()  is used to register shortcode.
*/
function otfbmsg_register_shortcodes(){
	add_shortcode('otfb-message', 'otfbmsg_message_shortcode');
}
add_action( 'init', 'otfbmsg_register_shortcodes');

add_action( 'wp_enqueue_scripts', 'otfbmsg_required_style_scripts' );
function otfbmsg_required_style_scripts() {
    $settings = (array) get_option( 'otfbmsg-plugin-settings' );
    wp_enqueue_style( 'otfbmsg_css', plugins_url('/assets/css/otfbmsg.css', __FILE__) );
    wp_enqueue_style( 'otfbmsg_chat_css', plugins_url('/assets/css/facebookchat.css', __FILE__) );
}