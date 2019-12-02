<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
// VARIABLES
$themename = get_theme_data(STYLESHEETPATH . '/style.css');
$themename = $themename['Name'];
$shortname = "mth";

$ackapa = array("Acik","Kapali");
    
$headsabit = array("Normal","Sabit");
    
$gosgiz = array("Goster", "Gizle");    

// Populate OptionsFramework option in array for use in theme
global $of_options;
$of_options = get_option('of_options');

$GLOBALS['template_path'] = OF_DIRECTORY;

//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name; }
$categories_tmp = array_unshift($of_categories, "Kategori seçiniz:");    
       
//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
    $of_pages[$of_page->ID] = $of_page->post_name; }
$of_pages_tmp = array_unshift($of_pages, "Sayfa seçiniz:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 

// Number of featured posts to display
$featured_options_select = array("2","4","6","8","10","12"); 

//Stylesheets Reader
$alt_stylesheet_path = OF_FILEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}


//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$thumbsekil= array("Solda","Şerit");
// Set the Options Array
$options = array();

$options[] = array( "name" => "Genel Ayarlar",
                    "type" => "heading");
					
$options[] = array( "name" => "Logo",
					"desc" => "Kullanmak istediğiniz logoyu yükleyin. Önerilen (111x95)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");
					
$options[] = array( "name" => "Favicon",
					"desc" => "Kullanmak istediğiniz faviconu yükleyin.",
					"id" => $shortname."_favicon",
					"std" => "",
					"type" => "upload");

$options[] = array( "name" => "Slider Kategorisi",
				    "desc" => "Anasayfa sliderda hangi kategorinin yazıları gösterilsin?",
				    "id" => $shortname."_slidercat",
				    "type" => "select",
				    "options" => $of_categories,
				    "std" => "");

$options[] = array( "name" => "Firma adı",
					"desc" => "Firmanızın adını buraya girin",
					"id" => $shortname."_firmaadi",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Firma URL",
					"desc" => "Firmanızın linkini buraya girin",
					"id" => $shortname."_firmaurl",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Reklam Ayarları",
                    "type" => "heading");	

$options[] = array( "name" => "300x250 Reklam Kodu",
					"desc" => "Sidebar en üst kısımda görünen 300x250 reklam alanı",
					"id" => $shortname."_300_250",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "728x90 Reklam Kodu",
					"desc" => "Yazı sayfasında yazının altında gözükecek reklam alanı.",
					"id" => $shortname."_728_90",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "970x250 Reklam Kodu",
					"desc" => "Anasayfa, yazı, kategori, 404, arama sayfalarında gözükecek büyük reklam alanı.",
					"id" => $shortname."_970_250",
					"std" => "",
					"type" => "textarea");   

$options[] = array( "name" => "Uygulama Ayarları",
                    "type" => "heading");	

$options[] = array( "name" => "Google Play",
					"desc" => "Google Play uygulama bağlantınızı girin.",
					"id" => $shortname."_android",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "App Store",
					"desc" => "App Store uygulama bağlantınızı girin.",
					"id" => $shortname."_appstore",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Windows Store",
					"desc" => "Windows Store uygulama bağlantınızı girin.",
					"id" => $shortname."_windows",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Sosyal Medya Hesapları",
                    "type" => "heading");	

$options[] = array( "name" => "Facebook",
					"desc" => "Facebook Sayfa URL Giriniz.",
					"id" => $shortname."_sosyalfacebook",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Youtube",
					"desc" => "Youtube Kanal URL Giriniz.",
					"id" => $shortname."_sosyalyoutube",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Twitter",
					"desc" => "Twitter URL Giriniz.",
					"id" => $shortname."_sosyaltwitter",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Google+",
					"desc" => "Google+ URL Giriniz.",
					"id" => $shortname."_sosyalgplus",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Linkedin",
					"desc" => "Linkedin URL Giriniz.",
					"id" => $shortname."_sosyallinkedin",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Pinterest",
					"desc" => "Pinterest URL Giriniz.",
					"id" => $shortname."_sosyalpinterest",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Footer Ayarları",
                    "type" => "heading");
    
$options[] = array( "name" => "Footer Logo",
					"desc" => "Kullanmak istediğiniz alt alan logosunu yükleyin. Önerilen (100x65)",
					"id" => $shortname."_altlogo",
					"std" => "",
					"type" => "upload");    

$options[] = array( "name" => "Telif Hakkı Yazısı",
					"desc" => "Footerdaki Telif Hakkı Yazınız.",
					"id" => $shortname."_copyright",
					"std" => "",
					"type" => "textarea");    

$options[] = array( "name" => "Google Analytics",
					"desc" => "Google Analytics kodlarınız buraya yazabilirsiniz.",
					"id" => $shortname."_analytics",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "Özel Footer Kodları",
					"desc" => "body kapanış etiketinden önce yazılmasını istediğiniz kodları buraya yazabilirsiniz.",
					"id" => $shortname."_analytics",
					"std" => "",
					"type" => "textarea");							
					
$options[] = array( "name" => "Seo Ayarları",
                    "type" => "heading");
					
$options[] = array( "name" => "Site Title",
					"desc" => "Site Title Giriniz.",
					"id" => $shortname."_seotitle",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Description",
					"desc" => "Site Description Giriniz.",
					"id" => $shortname."_seodescription",
					"std" => "",
					"type" => "textarea");
    
$options[] = array( "name" => "Keyword",
					"desc" => "Site Keyword Giriniz.",
					"id" => $shortname."_seokeyword",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "Author",
					"desc" => "Meta author değerini(site sahibi) buraya girin",
					"id" => $shortname."_seoauthor",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Özel Head Kodları",
					"desc" => "Buraya yazdığınız kodlar head tagleri arasına yazılacaktır. Doğrulama onay vs kodlarınızı buraya giriniz.",
					"id" => $shortname."_customhead",
					"std" => "",
					"type" => "textarea");     
    
$options[] = array( "name" => "Google+ Puplisher URL",
					"desc" => "Google+ Puplisher URL buraya girin",
					"id" => $shortname."_puplisher",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Aboneler",
                    "type" => "heading");
    
$options[] = array( "name" => "Abone Mailleri",
					"desc" => "Her satırda bir abone maili vardır.",
					"id" => $shortname."_abonemail",
					"std" => "",
					"type" => "textarea");   					

					
update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}
?>