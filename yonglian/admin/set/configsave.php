<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 
require_once '../login/login_check.php';
$met_footstat      =str_replace("\\\"","",$met_footstat);
$met_jiathis       =str_replace("\\\"","",$met_jiathis);
$met_tools_code    =str_replace("\\\"","",$met_tools_code);
$met_webname       =str_replace("\"","'",$met_webname);
$met_weburl        =str_replace("\"","'",$met_weburl);
$met_logo          =str_replace("\"","'",$met_logo);
$met_skin_user     =str_replace("\"","'",$met_skin_user);
$met_webhtm        =str_replace("\"","'",$met_webhtm);
$met_img_type      =str_replace("\"","'",$met_img_type);
$met_img_maxsize   =str_replace("\"","'",$met_img_maxsize);
$met_big_wate      =str_replace("\"","'",$met_big_wate);
$met_thumb_wate    =str_replace("\"","'",$met_thumb_wate);
$met_wate_class    =str_replace("\"","'",$met_wate_class);
$met_wate_img      =str_replace("\"","'",$met_wate_img);
$met_text_wate     =str_replace("\"","'",$met_text_wate);
$met_text_size     =str_replace("\"","'",$met_text_size);
$met_text_fonts    =str_replace("\"","'",$met_text_fonts);
$met_text_color    =str_replace("\"","'",$met_text_color);
$met_text_angle    =str_replace("\"","'",$met_text_angle);
jmali_start();
$met_watermark     =str_replace("\"","'",$met_watermark);
$met_img_style     =str_replace("\"","'",$met_img_style);
$met_img_x         =str_replace("\"","'",$met_img_x);
$met_img_y         =str_replace("\"","'",$met_img_y);
$met_newsimg_x     =str_replace("\"","'",$met_newsimg_x);
$met_newsimg_y     =str_replace("\"","'",$met_newsimg_y);
$met_productimg_x  =str_replace("\"","'",$met_productimg_x);
$met_productimg_y  =str_replace("\"","'",$met_productimg_y);
$met_imgs_x        =str_replace("\"","'",$met_imgs_x);
$met_imgs_y        =str_replace("\"","'",$met_imgs_y);
$met_file_format   =str_replace("\"","'",$met_file_format);
$met_file_maxsize  =str_replace("\"","'",$met_file_maxsize);
$met_title_keywords=str_replace("\"","'",$met_title_keywords);
$met_keywords      =str_replace("\"","'",$met_keywords);
$met_description   =str_replace("\"","'",$met_description);
$met_seo           =str_replace("\"","'",$met_seo);
$met_alt           =str_replace("\"","'",$met_alt);
$met_atitle        =str_replace("\"","'",$met_atitle);
$met_linkname      =str_replace("\"","'",$met_linkname);
$met_online_type   =str_replace("\"","'",$met_online_type);
$met_footright     =str_replace("\"","'",$met_footright);
$met_footaddress   =str_replace("\"","'",$met_footaddress);
$met_foottel       =str_replace("\"","'",$met_foottel);
$met_footother     =str_replace("\"","'",$met_footother);
$met_foottext      =str_replace("\"","'",$met_foottext);
$met_footstat      =str_replace("\"","'",$met_footstat);
$met_product_list  =str_replace("\"","'",$met_product_list);
$met_news_list     =str_replace("\"","'",$met_news_list);
$met_download_list =str_replace("\"","'",$met_download_list);
$met_img_list      =str_replace("\"","'",$met_img_list);
$met_job_list      =str_replace("\"","'",$met_job_list);
$met_search_list   =str_replace("\"","'",$met_search_list);
$met_fd_fromname   =str_replace("\"","'",$met_fd_fromname);
$met_fd_smtp       =str_replace("\"","'",$met_fd_smtp);
$met_fd_usename    =str_replace("\"","'",$met_fd_usename);
$met_fd_password   =str_replace("\"","'",$met_fd_password);
$met_memberemail   =str_replace("\"","'",$met_memberemail);
$met_membercontrol =str_replace("\"","'",$met_membercontrol);
$met_onlinetel     =str_replace("\"","'",$met_onlinetel);
$met_addlinkopen   =str_replace("\"","'",$met_addlinkopen);
$met_wap_logo      =str_replace("\"","'",$met_wap_logo);
$met_wap_img       =str_replace("\"","'",$met_wap_img);
$met_jiathis       =str_replace("\"","'",$met_jiathis);
$met_tools_code    =str_replace("\"","'",$met_tools_code);

$met_text_wate     =str_replace(chr(13).chr(10),"",$met_text_wate);
$met_description   =str_replace(chr(13).chr(10),"",$met_description);
$met_seo           =str_replace(chr(13).chr(10),"",$met_seo);
$met_foottext      =str_replace(chr(13).chr(10),"",$met_foottext);
$met_footother     =str_replace(chr(13).chr(10),"",$met_footother);
$met_footstat      =str_replace(chr(13).chr(10),"",$met_footstat);
$met_memberemail   =str_replace(chr(13).chr(10),"",$met_memberemail);
$met_membercontrol =str_replace(chr(13).chr(10),"",$met_membercontrol);
$met_onlinetel     =str_replace(chr(13).chr(10),"",$met_onlinetel);
$met_jiathis       =str_replace(chr(13).chr(10),"",$met_jiathis);
$met_tools_code    =str_replace(chr(13).chr(10),"",$met_tools_code);

$config_save       = "<?php
/*
met_weburl        = \"$met_weburl\";
met_webname       = \"$met_webname\";
met_logo          = \"$met_logo\";
met_skin_user     = \"$met_skin_user\";
met_big_wate      = \"$met_big_wate\";
met_thumb_wate    = \"$met_thumb_wate\";
met_wate_class    = \"$met_wate_class\";
met_wate_img      = \"$met_wate_img\";
met_wate_bigimg   = \"$met_wate_bigimg\";
met_text_wate     = \"$met_text_wate\";
met_text_size     = \"$met_text_size\";
met_text_bigsize  = \"$met_text_bigsize\";
met_text_fonts    = \"$met_text_fonts\";
met_text_color    = \"$met_text_color\";
met_text_angle    = \"$met_text_angle\";
met_watermark     = \"$met_watermark\";
met_img_style     = \"$met_img_style\";
met_img_x         = \"$met_img_x\";
met_img_y         = \"$met_img_y\";
met_newsimg_x     = \"$met_newsimg_x\";
met_newsimg_y     = \"$met_newsimg_y\";
met_productimg_x  = \"$met_productimg_x\";
met_productimg_y  = \"$met_productimg_y\";
met_imgs_x        = \"$met_imgs_x\";
met_imgs_y        = \"$met_imgs_y\";
met_title_keywords= \"$met_title_keywords\";
met_keywords      = \"$met_keywords\";
met_description   = \"$met_description\";
met_title_type    = \"$met_title_type\";
met_seo           = \"$met_seo\";
met_jiathis_ok    = \"$met_jiathis_ok\";
met_jiathis_custom= \"$met_jiathis_custom\";
met_tools_ok      = \"$met_tools_ok\";
met_tools_custom  = \"$met_tools_custom\";
met_tools_code    = \"$met_tools_code\";
met_jiathis       = \"$met_jiathis\";
met_alt           = \"$met_alt\";
met_atitle        = \"$met_atitle\";
met_linkname      = \"$met_linkname\";
met_online_type   = \"$met_online_type\";
met_footright     = \"$met_footright\";
met_footaddress   = \"$met_footaddress\";
met_foottel       = \"$met_foottel\";
met_footother     = \"$met_footother\";
met_foottext      = \"$met_foottext\";
met_footstat      = \"$met_footstat\";
met_product_list  = \"$met_product_list\";
met_news_list     = \"$met_news_list\";
met_download_list = \"$met_download_list\";
met_img_list      = \"$met_img_list\";
met_job_list      = \"$met_job_list\";
met_message_list  = \"$met_message_list\";
met_search_list   = \"$met_search_list\";
met_fd_fromname   = \"$met_fd_fromname\";
met_fd_smtp       = \"$met_fd_smtp\";
met_fd_usename    = \"$met_fd_usename\";
met_fd_password   = \"$met_fd_password\";
met_skin_css      = \"$met_skin_css\";
met_autothumb_ok  = \"$met_autothumb_ok\";
met_member_use    = \"$met_member_use\";
met_member_login  = \"$met_member_login\";
met_newsdays      = \"$met_newsdays\";
met_hot           = \"$met_hot\";
met_listtime      = \"$met_listtime\";
met_contenttime   = \"$met_contenttime\";
met_memberemail   = \"$met_memberemail\";
met_membercontrol = \"$met_membercontrol\";
met_sitemap_html    =\"$met_sitemap_html\";
met_sitemap_xml     =\"$met_sitemap_xml\";
met_sitemap_max     =\"$met_sitemap_max\";
met_pseudo          =\"$met_pseudo\";
met_online_skin     =\"$met_online_skin\";
met_online_color    =\"$met_online_color\";
met_qq_type         =\"$met_qq_type\";
met_msn_type        =\"$met_msn_type\";
met_taobao_type     =\"$met_taobao_type\";
met_alibaba_type    =\"$met_alibaba_type\";
met_skype_type      =\"$met_skype_type\";
met_onlinetel       =\"$met_onlinetel\";
met_addlinkopen     =\"$met_addlinkopen\";
met_pageskin        =\"$met_pageskin\";
met_indexskin       =\"$met_indexskin\";
met_urlblank        =\"$met_urlblank\";
met_hitsok          =\"$met_hitsok\";
met_product_page    =\"$met_product_page\";
met_img_page        =\"$met_img_page\";
met_product_detail  =\"$met_product_detail\";
met_img_detail      =\"$met_img_detail\";
met_productdetail_x =\"$met_productdetail_x\";
met_productdetail_y =\"$met_productdetail_y\";
met_imgdetail_x     =\"$met_imgdetail_x\";
met_imgdetail_y     =\"$met_imgdetail_y\";
met_onlineright_top =\"$met_onlineright_top\";
met_onlineright_right =\"$met_onlineright_right\";
met_onlineleft_top  =\"$met_onlineleft_top\";
met_onlineleft_left =\"$met_onlineleft_left\";
met_onlinenameok    =\"$met_onlinenameok\";
met_file_format   = \"$met_file_format\";
met_file_maxsize  = \"$met_file_maxsize\";
met_memberlogin_code= \"$met_memberlogin_code\";
met_login_code    = \"$met_login_code\";
met_sqlnum        = \"$met_sqlnum\";
met_submit_type   = \"$met_submit_type\";
met_img_type      = \"$met_img_type\";
met_img_maxsize   = \"$met_img_maxsize\";
met_webhtm        = \"$met_webhtm\";
met_htmtype       = \"$met_htmtype\";
met_htmpagename   = \"$met_htmpagename\";
met_htmlistname   = \"$met_htmlistname\";
met_htmpack       = \"$met_htmpack\";
met_htmpack_url   = \"$met_htmpack_url\";
met_htmway        = \"$met_htmway\";
met_member_force  = \"$met_member_force\";
met_memberforce   = \"$met_memberforce\";
index_online_type = \"$index_online_type\";
index_news_no     = \"$index_news_no\";
index_product_no  = \"$index_product_no\";
index_download_no = \"$index_download_no\";
index_img_no      = \"$index_img_no\";
index_job_no      = \"$index_job_no\";
index_link_ok     = \"$index_link_ok\";
index_link_img    = \"$index_link_img\";
index_link_text   = \"$index_link_text\";
met_deleteimg     = \"$met_deleteimg\";
*/
?>";
if(!is_writable("../../config/config_".$lang.".inc.php"))@chmod("../../config/config_".$lang.".inc.php",0777);
$fp = fopen("../../config/config_".$lang.".inc.php",w);
      fputs($fp, $config_save);
      fclose($fp);
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>