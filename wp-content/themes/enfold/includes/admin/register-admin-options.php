<?php
global $avia_config;

//avia pages holds the data necessary for backend page creation
$avia_pages = array(

	array( 'slug' => 'avia', 		'parent'=>'avia', 'icon'=>"hammer_screwdriver.png" , 	'title' =>  __('主题选项', 'avia_framework')),
	array( 'slug' => 'layout', 		'parent'=>'avia', 'icon'=>"application_side_expand.png",'title' =>  __('常规布局', 'avia_framework')),
	array( 'slug' => 'styling', 	'parent'=>'avia', 'icon'=>"palette.png", 				'title' =>  __('常规风格', 'avia_framework')),
	array( 'slug' => 'customize', 	'parent'=>'avia', 'icon'=>"wand.png", 					'title' =>  __('先进样式', 'avia_framework')),
	array( 'slug' => 'header', 		'parent'=>'avia', 'icon'=>"layout_select.png", 			'title' =>  __('页眉', 'avia_framework')),
	array( 'slug' => 'sidebars', 	'parent'=>'avia', 'icon'=>"layout_select_sidebar.png", 	'title' =>  __('侧边栏', 'avia_framework')),
	array( 'slug' => 'footer', 		'parent'=>'avia', 'icon'=>"layout_select_footer.png", 	'title' =>  __('页脚', 'avia_framework')),
	array( 'slug' => 'blog', 		'parent'=>'avia', 'icon'=>"blog.png", 					'title' =>  __('博客布局', 'avia_framework')),
	array( 'slug' => 'social', 		'parent'=>'avia', 'icon'=>"user.png", 					'title' =>  __('社会分享', 'avia_framework')),
);

if(!current_theme_supports('avia_disable_import_export')){
	$avia_pages[] = array( 'slug' => 'demo', 		'parent'=>'avia', 'icon'=>"doc_text_image.png", 'title' => __('导入演示', 'avia_framework'));
	$avia_pages[] = array( 'slug' => 'upload', 		'parent'=>'avia', 'icon'=>"import_export.png", 'title' => __('导入/导出', 'avia_framework'));
}





//required for the general styling color schemes
include('register-backend-styles.php');

//required for the general styling google fonts
include('register-backend-google-fonts.php');

//required for the advanced styling wizard
include('register-backend-advanced-styles.php');





/*layout*/

$iconSpan = "<span class='pr-icons'>
				<img src='".AVIA_IMG_URL."icons/social_facebook.png' alt='' />
				<img src='".AVIA_IMG_URL."icons/social_twitter.png' alt='' />
				<img src='".AVIA_IMG_URL."icons/social_flickr.png' alt='' />
			</span>";

$avia_elements[] =	array(
					"slug"	=> "layout",
					"id" 	=> "default_layout_target",
					"type" 	=> "target",
					"std" 	=> "
					<style type='text/css'>
						.avprev-layout-container, .avprev-layout-container *{ 
							-moz-box-sizing: border-box;
							-webkit-box-sizing: border-box;
							box-sizing: border-box;
						}
						#avia_default_layout_target .avia_target_inside{min-height: 300px;}
						#boxed .avprev-layout-container{ padding:23px; border:1px solid #e1e1e1; background-color: #555;}
						#boxed .avprev-layout-container-inner{border:none; overflow: hidden;}
						.avprev-layout-container-inner{border: 1px solid #e1e1e1; background:#fff;}
						.avprev-layout-content-container{overflow:hidden; margin:0 auto; position:relative;}
						.avprev-layout-container-sizer{margin:0 auto; position:relative; z-index:5;}
						.avprev-layout-content-container .avprev-layout-container-sizer{display:table;}
						.avprev-layout-content-container .avprev-layout-container-sizer .av-cell{display:table-cell; padding: 20px;}
						.avprev-layout-content-container .avprev-layout-container-sizer:after{ background: #F8F8F8; position: absolute; top: 0; left: 99%; width: 100%; height: 100%; content: ''; z-index:1;}
						.avprev-layout-header{border-bottom:1px solid #e1e1e1; padding:20px; overflow: hidden;}
						.avprev-layout-slider{border-bottom:1px solid #e1e1e1; padding:30px 20px; background:#3B740F url('".AVIA_IMG_URL."layout/diagonal-bold-light.png') top left repeat; color:#fff;}
						.avprev-layout-content{border-right:1px solid #e1e1e1; width:73%; }
						.avprev-layout-sidebar{border-left:1px solid #e1e1e1; background:#f8f8f8; left:-1px; position:relative; min-height:141px;}
						.avprev-layout-menu-description{float:left;}
						.avprev-layout-menu{float:right; color:#999;}
						
						
						#header_right .avprev-layout-header{border-left:1px solid #e1e1e1; width:130px; float:right; border-bottom:none; min-height: 220px;}
						#header_left .avprev-layout-header{border-right:1px solid #e1e1e1; width:130px; float:left; border-bottom:none; min-height: 220px;}
						
						#header_right .avprev-layout-content-container{border-right:1px solid #e1e1e1; right:-1px;}
						#header_left  .avprev-layout-content-container{border-left:1px solid #e1e1e1; left:-1px;}
						
						#header_left .avprev-layout-menu, #header_right .avprev-layout-menu{float:none; padding-top:23px; clear:both; }
						#header_left .avprev-layout-divider, #header_right .avprev-layout-divider{display:none;}
						#header_left .avprev-layout-menuitem, #header_right .avprev-layout-menuitem{display:block; border-bottom:1px dashed #e1e1e1; padding:3px;}
						#header_left .avprev-layout-menuitem-first, #header_right .avprev-layout-menuitem-first{border-top:1px dashed #e1e1e1;}
						#header_left .avprev-layout-header .avprev-layout-container-sizer, #header_right .avprev-layout-header .avprev-layout-container-sizer{width:100%!important;}
						
						
						.avprev-layout-container-widget{display:none; border:1px solid #e1e1e1; padding:7px; font-size:12px; margin-top:5px; text-align:center;}
						.avprev-layout-container-social{margin-top:5px; text-align:center;}
						.av-active .pr-icons{display:block; }
						
						#header_left .avprev-layout-container-widget.av-active, #header_right .avprev-layout-container-widget.av-active{display:block;}
						#header_left .avprev-layout-container-social.av-active, #header_right .avprev-layout-container-widget.av-social{display:block;}
						
					</style>

					<small class=''>A rough preview of the frontend.</small>
					<div class='avprev-layout-container'>
						<div class='avprev-layout-container-inner'>
							<div class='avprev-layout-header'>
								<div class='avprev-layout-container-sizer'>
									<strong class='avprev-layout-menu-description'>Logo + Main Menu Area</strong>
									<div class='avprev-layout-menu'>
									<span class='avprev-layout-menuitem avprev-layout-menuitem-first'>Home</span> 
									<span class='avprev-layout-divider'>|</span> 
									<span class='avprev-layout-menuitem'>About</span> 
									<span class='avprev-layout-divider'>|</span> 
									<span class='avprev-layout-menuitem'>Contact</span> 
									</div>
								</div>
								
								<div class='avprev-layout-container-social'>
									{$iconSpan}	
								</div>
								
								<div class='avprev-layout-container-widget'>
									<strong>Widgets</strong>
								</div>
								
							</div>
							
							<div class='avprev-layout-content-container'>
								<div class='avprev-layout-slider'>
									<strong>Fullwidth Area (eg: Fullwidth Slideshow)</strong>
								</div>
							
								<div class='avprev-layout-container-sizer'>
									<div class='avprev-layout-content av-cell'><strong>Content Area</strong><p>This is the content area. The content area holds all your blog entries, pages, products etc</p></div>
									<div class='avprev-layout-sidebar av-cell'><strong>Sidebar</strong><p>This area holds all your sidebar widgets</p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					

					",
					"nodescription" => true
					);

//START TAB CONTAINER
$avia_elements[] = array(	"slug"	=> "layout", "type" => "visual_group_start", "id" => "avia_tab_layout1", "nodescription" => true, 'class'=>'avia_tab_container avia_set');

$avia_elements[] = array(	"slug"	=> "layout", "type" => "visual_group_start", "id" => "avia_tab_layout5", "nodescription" => true, 'class'=>'avia_tab avia_tab2','name'=>__('布局', 'avia_framework'));

$avia_elements[] =	array(
					"slug"	=> "layout",
					"name" 	=> __("使用拉伸或盒装的布局?", 'avia_framework'),
					"desc" 	=> __("延伸布局扩展从视窗的左侧.", 'avia_framework'),
					"id" 	=> "color-body_style",
					"type" 	=> "select",
					"std" 	=> "stretched",
					"class" => "av_2columns av_col_1",
					"no_first"=>true,
					"target" => array("default_slideshow_target, #avia_default_layout_target::.avia_control_container::set_id"),
					"subtype" => array(__('延伸布局', 'avia_framework') => 'stretched', __('盒装的布局', 'avia_framework') => 'boxed'));


$avia_elements[] =	array(
					"slug"	=> "layout",
					"name" 	=> __("标志和主菜单", 'avia_framework'),
					"desc" 	=> __("你可以把你的商标和网站主菜单的顶部或在一个栏", 'avia_framework'),
					"id" 	=> "header_position",
					"type" 	=> "select",
					"std" 	=> "header_top",
					"class" => "av_2columns av_col_2",
					"target" => array("default_layout_target, #avia_default_slideshow_target::.avprev-layout-container, .avprev-design-container::set_id_single"),
					"no_first"=>true,
					"subtype" => array( __('页眉顶部', 'avia_framework') =>'header_top',
										__('左侧边栏', 'avia_framework') =>'header_left header_sidebar',
										__('右侧边栏', 'avia_framework') =>'header_right header_sidebar',
										));
										

$avia_elements[] =	array(
					"slug"	=> "layout",
					"name" 	=> __("内容对齐", 'avia_framework'),
					"desc" 	=> __("如果窗口宽度超过最大内容的宽度时,你想把你的内容", 'avia_framework'),
					"id" 	=> "layout_align_content",
					"type" 	=> "select",
					"std" 	=> "content_align_center",
					"class" => "av_2columns av_col_1",
					"required" => array('header_position','{contains}header_sidebar'),
					"no_first"=>true,
					"subtype" => array( __('中心内容', 'avia_framework') =>'content_align_center',
										__('位置在左边', 'avia_framework') 	=>'content_align_left',
										__('在正确的位置', 'avia_framework') 	=>'content_align_right',
										));

										

$avia_elements[] =	array(
					"slug"	=> "layout",
					"name" 	=> __("粘性的侧边栏菜单", 'avia_framework'),
					"desc" 	=> __("你可以选择如果你想要一个粘性侧栏不滚动的内容", 'avia_framework'),
					"id" 	=> "sidebarmenu_sticky",
					"type" 	=> "select",
					"std" 	=> "conditional_sticky",
					"class" => "av_2columns av_col_2",
					"required" => array('header_position','{contains}header_left'),
					"no_first"=>true,
					"subtype" => array( __('粘性栏是否小于屏幕高度,否则滚动', 'avia_framework') =>'conditional_sticky',
										__('总是黏性', 'avia_framework') 	=>'always_sticky',
										__('没有粘性', 'avia_framework') 	=>'never_sticky',
										));





$avia_elements[] =	array(
					"slug"	=> "layout",
					"name" 	=> __("主菜单栏", 'avia_framework'),
					"desc" 	=> __("你可以选择使用主菜单区域也显示小部件领域", 'avia_framework'),
					"id" 	=> "sidebarmenu_widgets",
					"type" 	=> "select_sidebar",
					"std" 	=> "",
					"no_first"=>true,
					"required" => array('header_position','{contains}header_sidebar'),
					"target" => array("default_layout_target::.avprev-layout-container-widget::set_active"),
					"exclude" 	=> array(), /*eg: 'Displayed Everywhere'*/
					"additions" => array('No widgets' => "", /* 'Display Widgets by page logic' => "av-auto-widget-logic", */ 'Display a specific Widget Area'=> '%result%'),
					);
					
					

$avia_elements[] = array(
		"name" 	=> __("显示社会图标下面的主菜单? (你可以设置你的社交图标 <a href='#goto_social_profiles'>社会概要文件</a>)", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "sidebarmenu_social",
		"type" 	=> "checkbox",
		"std"	=> "",
		"slug"	=> "layout",
		"target" => array("default_layout_target::.avprev-layout-container-social::set_active"),
		"required" => array('header_position','{contains}header_sidebar'),
		);	



// END TAB
$avia_elements[] = array(	"slug"	=> "layout", "type" => "visual_group_end", "id" => "avia_tab5ewwe_end", "nodescription" => true);
$avia_elements[] = array(	"slug"	=> "layout", "type" => "visual_group_start", "id" => "avia_tab5wewe", "nodescription" => true, 'class'=>'avia_tab avia_tab2','name'=>__(' 规模', 'avia_framework'));
// START TAB


$avia_elements[] = array(
		"name" 	=> __("响应式网站", 'avia_framework'),
		"desc" 	=> __("使你的网站的大小是否会适应和改变布局,以适应小屏幕,像平板电脑或手机", 'avia_framework'),
		"id" 	=> "responsive_active",
		"type" 	=> "checkbox",
		"std"	=> "enabled",
		"slug"	=> "layout",
		);	

$avia_elements[] =	array(
		"slug"	=> "layout",
		"name" 	=> __("最大的集装箱宽度", 'avia_framework'),
		"desc" 	=> __("输入的最大宽度为你的网站内容. 像素和 % 是允许的 例: 1130px, 1310px, 100% ", 'avia_framework'),
		"id" 	=> "responsive_size",
		"type" 	=> "text",
		"std" 	=> "1310px",
		"required" => array('responsive_active','{contains}enabled'),
		);



$avia_elements[] =	array(
					"slug"	=> "layout",
					"name" 	=> __("内容|侧边栏比", 'avia_framework'),
					"desc" 	=> __("在这里你可以选择你的内容的宽度和侧边栏. 第一号表明内容的宽度,第二号表明栏宽度. <br/><strong>Note:</strong> 如果你想禁用侧边栏,你可以这样做 <a href='#goto_sidebar_settings'>侧栏设置</a>", 'avia_framework'),
					"id" 	=> "content_width",
					"target" => array("default_layout_target::.avprev-layout-content::width"),
					"type" 	=> "select",
					"std" 	=> "73",
					"no_first"=>true,
					"subtype" => array( 
											'80% | 20%' =>'80',
											'79% | 21%' =>'79',
											'78% | 22%' =>'78',
											'77% | 23%' =>'77',
											'76% | 24%' =>'76',
											'75% | 25%' =>'75',
											'74% | 26%' =>'74',
											'73% | 27%' =>'73',
											'72% | 28%' =>'72',
											'71% | 29%' =>'71',
											
											'70% | 30%' =>'70',
											'69% | 31%' =>'69',
											'68% | 32%' =>'68',
											'67% | 33%' =>'67',
											'66% | 34%' =>'66',
											'65% | 35%' =>'65',
											'64% | 36%' =>'64',
											'63% | 37%' =>'63',
											'62% | 38%' =>'62',
											'61% | 39%' =>'61',
											
											'60% | 40%' =>'60',
											'59% | 41%' =>'59',
											'58% | 42%' =>'58',
											'57% | 43%' =>'57',
											'56% | 44%' =>'56',
											'55% | 45%' =>'55',
											'54% | 46%' =>'54',
											'53% | 47%' =>'53',
											'52% | 48%' =>'52',
											'51% | 49%' =>'51',
											'50% | 50%' =>'50',
										
																				));

$numbers = array();
for($i = 100; $i >= 50; $i--)
{
	$numbers[$i."%"] = $i;
}

$avia_elements[] =	array(
					"slug"	=> "layout",
					"name" 	=> __("内容+侧边栏的宽度", 'avia_framework'),
					"desc" 	=> __("在这里您可以输入内容和侧边栏的宽度相结合", 'avia_framework'),
					"id" 	=> "combined_width",
					"target" => array("default_layout_target::.avprev-layout-container-sizer::width"),
					"type" 	=> "select",
					"std" 	=> "100",
					"no_first"=>true,
					"subtype" => $numbers
					);


// END TAB
$avia_elements[] = array(	"slug"	=> "layout", "type" => "visual_group_end", "id" => "avia_tab4543_end", "nodescription" => true);


//END TAB CONTAINER
$avia_elements[] = array(	"slug"	=> "layout", "type" => "visual_group_end", "id" => "avia_tab_container_end2", "nodescription" => true);
		
		
/*Frontpage Settings*/


if(is_child_theme()){
$avia_elements[] =	array(
					"slug"	=> "upload",
					"name" 	=> __("从你的父主题导入设置", 'avia_framework'),
					"desc" 	=> __("我们检测到您正在使用一个孩子的主题. 那太好了!.如果你想,我们可以导入你的父主题的设置你的孩子的主题. <br/>请注意,这将覆盖当前儿童主题设置.", 'avia_framework'),
					"id" 	=> "parent_setting_import",
					"type" 	=> "parent_setting_import");
}


$avia_elements[] =	array(
    "slug"	=> "upload",
    "name" 	=> __("导出主题设置文件", 'avia_framework'),
    "desc" 	=> __("单击按钮来生成并下载一个配置文件包含的主题设置. 您可以使用配置文件导入主题设置在另一个服务器.", 'avia_framework'),
    "id" 	=> "theme_settings_export",
    "type" 	=> "theme_settings_export");

$avia_elements[] =	array(
    "slug"		=> "upload",
    "name" 		=> __("导入主题设置文件", 'avia_framework'),
    "desc" 		=> __("上传一个主题在这里配置文件.注意,配置文件设置将覆盖当前的配置和你不能恢复当前配置.", 'avia_framework'),
    "id" 		=> "config_file_upload",
    "title" 	=> __("上传主题设置文件", 'avia_framework'),
    "button" 	=> __("插入设置文件", 'avia_framework'),
    "trigger" 	=> "av_config_file_insert",
    // "fopen_check" 	=> "true",
    "std"	  	=> "",
    "file_extension" => "txt",
    "file_type"		=> "text/plain",
    "type" 		=> "file_upload");
    
    

    

  					
$avia_elements[] =	array(
	"slug"		=> "upload",
	"name" 		=> __("Iconfont 经理 ", 'avia_framework'),
	"desc" 		=> __("你可以上传更多Iconfont包生成<a href='http://fontello.com/' target='_blank'>Fontello</a> 在布局中使用它们构建器.<br/><br/>The 'Default Font' can't be deleted. <br/><br/>确保删除任何您不使用的字体,保持低你的访客的加载时间", 'avia_framework'),
	"id" 		=> "iconfont_upload",
	"title" 	=> __("上传/选择Zip Fontello字体", 'avia_framework'),
	"button" 	=> __("插入Zip文件", 'avia_framework'),
	"trigger" 	=> "av_fontello_zip_insert",
	// "fopen_check" 	=> "true",
	"std"	  	=> "",
	"type" 		=> "file_upload",
	"file_extension" => "zip", //used to check if user can upload this file type
	"file_type"		=> "application/octet-stream, application/zip", //used for javascript gallery to display file types
	);	  
    
    
    

    


$avia_elements[] =	array(
					"slug"	=> "avia",
					"name" 	=> __("首页", 'avia_framework'),
					"desc" 	=> __("选择的页面显示在你的首页. 如果留空,博客将会显示", 'avia_framework'),
					"id" 	=> "frontpage",
					"type" 	=> "select",
					"subtype" => 'page');

$avia_elements[] =	array(
					"slug"	=> "avia",
					"name" 	=> __("和你想显示博客?", 'avia_framework'),
					"desc" 	=> __("选择要显示的页面作为你的博客页面. 如果留空不博客将显示出来", 'avia_framework'),
					"id" 	=> "blogpage",
					"type" 	=> "select",
					"subtype" => 'page',
					"required" => array('frontpage','{true}')
					);

$avia_elements[] =	array(
					"slug"	=> "avia",
					"name" 	=> __("标志 ", 'avia_framework'),
					"desc" 	=> __("传标志形象,或输入图像的URL或ID如果已经上传. 主题默认标志应用如果输入字段留空<br/>标志尺寸: 340px * 156px (if your logo is larger you might need to modify style.css to align it perfectly)", 'avia_framework'),
					"id" 	=> "logo",
					"type" 	=> "upload",
					"label"	=> __("使用形象的标志", 'avia_framework'));

$avia_elements[] =	array(
					"slug"	=> "avia",
					"name" 	=> __("图标 ", 'avia_framework'),
					"desc" 	=> __("指定  a <a href='http://en.wikipedia.org/wiki/Favicon'>favicon</a> for your site. <br/>接受的格式: .ico, .png, .gif", 'avia_framework'),
					"id" 	=> "favicon",
					"type" 	=> "upload",
					"label"	=> __("使用形象的图标", 'avia_framework'));


$avia_elements[] =	array(
					"slug"	=> "avia",
					"name" 	=> __("Websafe字体后备Windows", 'avia_framework'),
					"desc" 	=> __("老版本浏览器在Windows上不呈现自定义字体和现代的一样光滑. 如果你想迫使websafe字体代替自定义字体的浏览器激活设置在这里 (affects older versions of IE, Firefox and Opera)", 'avia_framework'),
					"id" 	=> "websave_windows",
					"type" 	=> "select",
					"std" 	=> "",
					"no_first"=>true,
					"subtype" => array( __('未激活 ', 'avia_framework') =>'',
										__('激活的', 'avia_framework') =>'active',
										));


$avia_elements[] =	array(
					"slug"	=> "avia",
					"name" 	=> __("自动模式.org HTML 标记 ", 'avia_framework'),
					"desc" 	=> __("将通用的HTML模式标记添加到您的主题模板生成器元素为搜索引擎提供额外的上下文. 如果你想添加您自己的特定标记通过插件或自定义的HTML代码,您可以禁用该设置", 'avia_framework'),
					"id" 	=> "markup",
					"type" 	=> "select",
					"std" 	=> "",
					"no_first"=>true,
					"subtype" => array( __('未激活 ', 'avia_framework') =>'inactive',
										__('激活的', 'avia_framework') =>'',
										));



$avia_elements[] = array(
		"name" 	=> __("Lightbox模态窗口", 'avia_framework'),
		"desc" 	=> __("检查启用默认的lightbox,一旦你点击链接打开一个图像. 取消只有如果你想使用自己的模态窗口插件", 'avia_framework'),
		"id" 	=> "lightbox_active",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"slug"	=> "avia");	
		
		
		

$avia_elements[] =	array(
					"slug"	=> "avia",
					"name" 	=> __("Google分析跟踪代码", 'avia_framework'),
					"desc" 	=> __("在这里输入您的谷歌分析跟踪代码. 它会自动添加所以谷歌可以跟踪你的访客的行为.", 'avia_framework'),
					"id" 	=> "analytics",
					"type" 	=> "textarea"
					);






$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> __("选择一个预定义的配色方案", 'avia_framework'),
					"desc" 	=> __("选择一个预定义的配色方案. 您可以编辑下面的设置方案.", 'avia_framework'),
					"id" 	=> "color_scheme",
					"type" 	=> "link_controller",
					"std" 	=> "Blue",
					"class"	=> "link_controller_list",
					"subtype" => $styles);
					



$avia_elements[] =	array(
					"slug"		=> "customize",
					"name" 		=> __("在这里你可以选择许多不同的元素和改变他们的默认样式", 'avia_framework'),
					"desc" 		=> __("如果一个值为空或设置为默认,它将不会被从你的CSS文件中定义的值", 'avia_framework')."<br/><br/>".
									__("<strong>Attention:</strong> 这个特性是在活跃 <strong>BETA!</strong>我们将不断添加新的元素来定制和需要你的帮助:如果你有任何建议请添加<a target='_blank' href='http://www.kriesi.at/support/enfold-feature-requests/'>post them here</a>"."<br/><br/>", 'avia_framework'),
					"id" 		=> "advanced_styling",
					"type" 		=> "styling_wizard",
					"order" 	=> array(__("标签",'avia_framework'), __("标题 ",'avia_framework'), __("主菜单",'avia_framework'), __("杂项",'avia_framework')),
					"std" 		=> "",
					"class"		=> "",
					"elements" => $advanced);




/*Styling Settings*/
$avia_elements[] =	array(
					"slug"	=> "styling",
					"id" 	=> "default_slideshow_target",
					"type" 	=> "target",
					"std" 	=> "
					<style type='text/css'>

						#boxed .live_bg_wrap{ padding:23px;   border:1px solid #e1e1e1; background-position: top center;}
						.live_bg_small{font-size:10px; color:#999;}
						.live_bg_wrap{ padding: 0; background:#f8f8f8; overflow:hidden; background-position: top center;}
						.live_bg_wrap div{overflow:hidden; position:relative;}
						.live_bg_wrap h3{margin: 0 0 5px 0 ; color:inherit;}
						.live_bg_wrap .main_h3{font-weight:bold; font-size:17px;  }
						.border{border:1px solid; border-bottom-style:none; border-bottom-width:0; padding:13px; width:562px;}
						#boxed .border{  width:514px;}

						.live_header_color {position: relative;width: 100%;left: }
						.bg2{border:1px solid; margin:4px; display:block; float:right; width:220px; padding:5px; max-width:80%}
						.content_p{display:block; float:left; width:250px; max-width: 100%;}
						.live-socket_color{font-size:11px;}
						.live-footer_color a{text-decoration:none;}
						.live-socket_color a{text-decoration:none;  position:absolute; top:28%; right:13px;}

						#avia_preview .webfont_google_webfont{  font-weight:normal; }
						.webfont_default_font{  font-weight:normal; font-size:13px; line-height:1.7em;}

						div .link_controller_list a{ width:95px; font-size:11px;}
						.avia_half{width: 267px; float:left; height:183px;}
						.avia_half .bg2{float:none; margin-left:0;}
						.avia_half_2{border-left:none; padding-left:14px;}
						#boxed  .avia_half { width: 243px; }
						.live-slideshow_color{text-align:center;}
						.text_small_outside{position:relative; top:-15px; display:block; left: 10px;}
						
						#header_left .live-header_color{float:left; width:101px; height: 380px; border-bottom:1px solid; border-right: none;}
						#header_right .live-header_color{float:right; width:101px; height: 380px; border-bottom:1px solid; border-left: none;}
						.av-sub-logo-area{overflow:hidden;}
						
						#boxed #header_left .live-header_color, #boxed #header_right .live-header_color{height: 380px;}
						#boxed #header_right .avia_half, #boxed #header_left .avia_half{width: 179px; height: 215px;}
						#header_right .avia_half, #header_left .avia_half{width: 203px; height: 215px;}
						#boxed .live-socket_color{border-bottom:1px solid;}
					</style>





					<small class='live_bg_small'>A rough preview of the frontend.</small>

					<div id='avia_preview' class='live_bg_wrap webfont_default_font'>
					<div class='avprev-design-container'>
					<!--<small class='text_small_outside'>Next Event: in 10 hours 5 minutes.</small>-->


						<div class='live-header_color border'>
							<span class='text'>Logo Area</span>
							<a class='a_link' href='#'>A link</a>
							<a class='an_activelink' href='#'>A hovered link</a>
							<div class='bg2'>Highlight Background + Border Color</div>
						</div>
						
						<div class='av-sub-logo-area'>

						<!--<div class='live-slideshow_color border'>
							<h3 class='webfont_google_webfont main_h3'>Slideshow Area/Page Title Area</h3>
								<p class='slide_p'>Slideshow caption<br/>
									<a class='a_link' href='#'>A link</a>
									<a class='an_activelink' href='#'>A hovered link</a>
								</p>
						</div>-->

						<div class='live-main_color border avia_half'>
							<h3 class='webfont_google_webfont main_h3'>Main Content heading</h3>
								<p class='content_p'>This is default content with a default heading. Font color, headings and link colors can be choosen below. <br/>
									<a class='a_link' href='#'>A link</a>
									<a class='an_activelink' href='#'>A hovered link</a>
								</p>

								<div class='bg2'>Highlight Background + Border Color</div>
						</div>



						<div class='live-alternate_color border avia_half avia_half_2'>
								<h3 class='webfont_google_webfont main_h3'>Alternate Content Area</h3>
								<p>This is content of an alternate content area. Choose font color, headings and link colors below. <br/>
									<a class='a_link' href='#'>A link</a>
									<a class='an_activelink' href='#'>A hovered link</a>
								</p>

								<div class='bg2'>Highlight Background + Border Color</div>
						</div>

						<div class='live-footer_color border'>
							<h3 class='webfont_google_webfont'>Demo heading (Footer)</h3>
							<p>This is text on the footer background</p>
							<a class='a_link' href='#'>Link | Link 2</a>
						</div>

						<div class='live-socket_color border'>Socket Text <a class='a_link' href='#'>Link | Link 2</a></div>
					</div>	
					</div>
					</div>

					",
					"nodescription" => true
					);





$avia_elements[] = array(	"slug"	=> "styling", "type" => "visual_group_start", "id" => "avia_tab1", "nodescription" => true, 'class'=>'avia_tab_container avia_set');





//create color sets for #header, Main Content, Secondary Content, Footer, Socket, Slideshow

$colorsets = $avia_config['color_sets'];
$iterator = 1;

foreach($colorsets as $set_key => $set_value)
{
	$iterator ++;

	$avia_elements[] = array(	"slug"	=> "styling", "type" => "visual_group_start", "id" => "avia_tab".$iterator, "nodescription" => true, 'class'=>'avia_tab avia_tab'.$iterator,'name'=>$set_value);

	$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> $set_value ." ". __("背景颜色", 'avia_framework'),
					"id" 	=> "colorset-$set_key-bg",
					"type" 	=> "colorpicker",
					"class" => "av_2columns av_col_1",
					"std" 	=> "#ffffff",
					"desc" 	=> __("默认颜色 ", 'avia_framework'),
					"target" => array("default_slideshow_target::.live-$set_key::background-color"),
					);

	$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> __("备用背景颜色", 'avia_framework'),
					"desc" 	=> __("备用背景菜单盘旋,表等", 'avia_framework'),
					"id" 	=> "colorset-$set_key-bg2",
					"type" 	=> "colorpicker",
					"class" => "av_2columns av_col_2",
					"std" 	=> "#f8f8f8",
					"target" => array("default_slideshow_target::.live-$set_key .bg2::background-color"),
					);

	$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> __("原色 ", 'avia_framework'),
					"desc" 	=> __("字体颜色为链接,dropcaps和其他元素", 'avia_framework'),
					"id" 	=> "colorset-$set_key-primary",
					"type" 	=> "colorpicker",
					"class" => "av_2columns av_col_1",
					"std" 	=> "#719430",
					"target" => array("default_slideshow_target::.live-$set_key .a_link, .live-$set_key-wrap-top::color,border-color"),
					);


	$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> __("高光颜色 ", 'avia_framework'),
					"desc" 	=> __("二次颜色链接和按钮悬停, etc<br/>", 'avia_framework'),
					"id" 	=> "colorset-$set_key-secondary",
					"type" 	=> "colorpicker",
					"class" => "av_2columns av_col_2",
					"std" 	=> "#8bba34",
					"target" => "default_slideshow_target::.live-$set_key .an_activelink::color",
					);


	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> $set_value." ". __("字体颜色", 'avia_framework'),
						"id" 	=> "colorset-$set_key-color",
						"type" 	=> "colorpicker",
						"class" => "av_2columns av_col_1",
						"std" 	=> "#666666",
						"target" => array("default_slideshow_target::.live-$set_key::color"),
						);

	$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> __("边框的颜色", 'avia_framework'),
					"id" 	=> "colorset-$set_key-border",
					"type" 	=> "colorpicker",
					"class" => "av_2columns av_col_2",
					"std" 	=> "#e1e1e1",
					"target" => array("default_slideshow_target::.live-$set_key.border, .live-$set_key .bg2::border-color"),
					);






	$avia_elements[] = array(	"slug"	=> "styling", "type" => "hr", "id" => "hr".$set_key, "nodescription" => true);

	$avia_elements[] = array(
						"slug"	=> "styling",
						"id" 	=> "colorset-$set_key-img",
						"name" 	=> __("背景影像", 'avia_framework'),
						"desc" 	=> __("你的背景图像 $set_value<br/><br/>", 'avia_framework'),
						"type" 	=> "select",
						"subtype" => array(__('没有背景图片', 'avia_framework')=>'',__('上传自定义图片', 'avia_framework')=>'custom'),
						"std" 	=> "",
						"no_first"=>true,
						"class" => "av_2columns av_col_1",
						"target" => array("default_slideshow_target::.live-$set_key::background-image"),
						"folder" => "images/background-images/",
						"folderlabel" => "",
						"group" => "Select predefined pattern",
						);


	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> __("自定义背景图片", 'avia_framework'),
						"desc" 	=> __("上传BG图片给你 $set_value<br/><br/>", 'avia_framework'),
						"id" 	=> "colorset-$set_key-customimage",
						"type" 	=> "upload",
						"std" 	=> "",
						"class" => "set_blank_on_hide av_2columns av_col_2",
						"label"	=> __("使用图像", 'avia_framework'),
						"required" => array("colorset-$set_key-img",'custom'),
						"target" => array("default_slideshow_target::.live-$set_key::background-image"),
						);


	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> __("图像的位置", 'avia_framework'),
						"desc" 	=> "",
						"id" 	=> "colorset-$set_key-pos",
						"type" 	=> "select",
						"std" 	=> "top left",
						"no_first"=>true,
						"class" => "av_2columns av_col_1",
						"required" => array("colorset-$set_key-img",'{true}'),
						"target" => array("default_slideshow_target::.live-$set_key::background-position"),
						"subtype" => array(
											__('左上', 'avia_framework')		=>'top left',
											__('顶部中心', 'avia_framework')		=>'top center',
											__(	'右上', 'avia_framework')		=>'top right',
											__('左下 ', 'avia_framework')		=>'bottom left',
											__('底部中心', 'avia_framework')	=>'bottom center',
											__(	'右下角', 'avia_framework')	=>'bottom right',
											__(	'中间居左  ', 'avia_framework')	=>'center left',
											__('中心', 'avia_framework')	=>'center center',
											__(	'中心右侧', 'avia_framework')	=>'center right'));

	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> __("重复 ", 'avia_framework'),
						"desc" 	=> "",
						"id" 	=> "colorset-$set_key-repeat",
						"type" 	=> "select",
						"std" 	=> "no-repeat",
						"class" => "av_2columns av_col_2",
						"no_first"=>true,
						"required" => array("colorset-$set_key-img",'{true}'),
						"target" => array("default_slideshow_target::.live-$set_key::background-repeat"),
						"subtype" => array(
											__('不重复 ', 'avia_framework') =>'no-repeat',
											__('重复 ', 'avia_framework') =>'repeat',
											__('水平排列', 'avia_framework') =>'repeat-x',
											__('垂直并排', 'avia_framework') =>'repeat-y',
/* 										    __('Stretch Fullscreen', 'avia_framework')=>'fullscreen' */
										    ));
	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> __("附件", 'avia_framework'),
						"desc" 	=> "",
						"id" 	=> "colorset-$set_key-attach",
						"type" 	=> "select",
						"std" 	=> "scroll",
						"class" => "av_2columns av_col_1",
						"no_first"=>true,
						"required" => array("colorset-$set_key-img",'{true}'),
						"target" => array("default_slideshow_target::.live-$set_key::background-attachment"),
						"subtype" => array(__('滚动', 'avia_framework') =>'scroll',__('Fixed', 'avia_framework') =>'fixed'));







	$avia_elements[] = array(	"slug"	=> "styling", "type" => "visual_group_end", "id" => "avia_tab_end".$iterator, "nodescription" => true);
}




$avia_elements[] = array(	"slug"	=> "styling", "type" => "visual_group_start", "id" => "avia_tab54", "nodescription" => true, 'class'=>'avia_tab avia_tab2','name'=>__('Body background', 'avia_framework'),
							"required" => array("color-body_style",'boxed'),
							"inactive"	=> "These options are only available if you select a boxed layout.  Your currently have a stretched layout selected <br/><br/> You can change that setting <a href='#goto_general_layout'>at General Layout</a>",);

$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> __("身体的背景颜色", 'avia_framework'),
					"desc" 	=> __("背景颜色为你的网站<br/> This is the color that is displayed behind your boxed content area", 'avia_framework'),
					"id" 	=> "color-body_color",
					"type" 	=> "colorpicker",
					"std" 	=> "#eeeeee",
/* 					"class" => "av_2columns av_col_2", */
					"target" => array("default_slideshow_target::.live_bg_wrap::background-color"),
					);



	$avia_elements[] = array(
						"slug"	=> "styling",
						"id" 	=> "color-body_img",
						"name" 	=> __("背景影像", 'avia_framework'),
						"desc" 	=> __("The background image of your Body<br/><br/>", 'avia_framework'),
						"type" 	=> "select",
						"subtype" => array(__('没有背景图片', 'avia_framework')=>'',__('上传自定义图片', 'avia_framework')=>'custom'),
						"std" 	=> "",
						"no_first"=>true,
						"class" => "av_2columns av_col_1 set_blank_on_hide",
						"target" => array("default_slideshow_target::.live_bg_wrap::background-image"),
						"folder" => "images/background-images/",
						"folderlabel" => "",
						"group" => "Select predefined pattern",
						
						);


	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> __("自定义背景图片", 'avia_framework'),
						"desc" 	=> __("上传BG形象对你的身体<br/><br/>", 'avia_framework'),
						"id" 	=> "color-body_customimage",
						"type" 	=> "upload",
						"std" 	=> "",
						"class" => "set_blank_on_hide av_2columns av_col_2",
						"label"	=> __("使用图像", 'avia_framework'),
						"required" => array("color-body_img",'custom'),
						"target" => array("default_slideshow_target::.live_bg_wrap::background-image"),
						);


	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> __("图像的位置", 'avia_framework'),
						"desc" 	=> "",
						"id" 	=> "color-body_pos",
						"type" 	=> "select",
						"std" 	=> "top left",
						"no_first"=>true,
						"class" => "av_2columns av_col_1",
						"required" => array("color-body_img",'{true}'),
						"target" => array("default_slideshow_target::.live_bg_wrap::background-position"),
						"subtype" => array(
							__('左上', 'avia_framework')		=>'top left',
							__('顶部中心', 'avia_framework')		=>'top center',
							__(	'右上角', 'avia_framework')		=>'top right',
							__('底部左侧', 'avia_framework')		=>'bottom left',
							__('底部中心', 'avia_framework')	=>'bottom center',
							__(	'底部右侧', 'avia_framework')	=>'bottom right',
							__(	'中心左侧 ', 'avia_framework')	=>'center left',
							__('中心', 'avia_framework')	=>'center center',
							__(	'中信右侧', 'avia_framework')	=>'center right'));

	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> __("重复", 'avia_framework'),
						"desc" 	=> "",
						"id" 	=> "color-body_repeat",
						"type" 	=> "select",
						"std" 	=> "no-repeat",
						"class" => "av_2columns av_col_2",
						"no_first"=>true,
						"required" => array("color-body_img",'{true}'),
						"target" => array("default_slideshow_target::.live_bg_wrap::background-repeat"),
						"subtype" => array(
										__('不重复 ', 'avia_framework')=>'no-repeat',
										__('重复', 'avia_framework')=>'repeat',
										__('水平排列', 'avia_framework')=>'repeat-x',
										__('垂直并排', 'avia_framework')=>'repeat-y',
										__('拉伸全屏', 'avia_framework')=>'fullscreen'));

	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> __("附件", 'avia_framework'),
						"desc" 	=> "",
						"id" 	=> "color-body_attach",
						"type" 	=> "select",
						"std" 	=> "scroll",
						"class" => "av_2columns av_col_1",
						"no_first"=>true,
						"required" => array("color-body_img",'{true}'),
						"target" => array("default_slideshow_target::.live_bg_wrap::background-attachment"),
						"subtype" => array(__('分数', 'avia_framework')=>'scroll',__('固定 ', 'avia_framework')=>'fixed'));


$avia_elements[] = array(	"slug"	=> "styling", "type" => "visual_group_end", "id" => "avia_tab5_end", "nodescription" => true);





$avia_elements[] = array(	"slug"	=> "styling", "type" => "visual_group_start", "id" => "avia_tab5", "nodescription" => true, 'class'=>'avia_tab avia_tab2','name'=>__('字体', 'avia_framework'));


$avia_elements[] =		array(	"name" 	=> __("标题字体", 'avia_framework'),
								"slug"	=> "styling",
								"desc" 	=> __("字体标题使用谷歌字体和允许您使用广泛的定义为您的标题字体", 'avia_framework'),
					            "id" 	=> "google_webfont",
					            "type" 	=> "select",
					            "no_first" => true,
					            "class" => "av_2columns av_col_1",
					            "onchange" => "avia_add_google_font",
					            "std" 	=> "Open Sans",
					            "subtype" =>  $google_fonts);

$avia_elements[] =	array(	"name" 	=> __("定义了为您的正文字体", 'avia_framework'),
							"slug"	=> "styling",
							"desc" 	=> __("选择web安全字体 (faster rendering和googlewebkit的字体 (more unqiue)<br/><br/>", 'avia_framework'),
				            "id" 	=> "default_font",
				            "type" 	=> "select",
				            "no_first" => true,
				            "class" => "av_2columns av_col_2",
				            "onchange" => "avia_add_google_font",
				            "std" 	=> "Helvetica-Neue,Helvetica-websave",
				            "subtype" => apply_filters('avf_google_content_font', array( __('Web save fonts', 'avia_framework') => array(
				            					'Arial'=>'Arial-websave',
				            					'Georgia'=>'Georgia-websave',
				            					'Verdana'=>'Verdana-websave',
				            					'Helvetica'=>'Helvetica-websave',
				            					'Helvetica Neue'=>'Helvetica-Neue,Helvetica-websave',
				            					'Lucida'=>'"Lucida-Sans",-"Lucida-Grande",-"Lucida-Sans-Unicode-websave"'),
				            					
				            					__('Google 字体', 'avia_framework') => array(
				            					'Arimo'=>'Arimo',
				            					'Cardo'=>'Cardo',
				            					'Droid Sans'=>'Droid Sans',
				            					'Droid Serif'=>'Droid Serif',
				            					'Kameron'=>'Kameron',
				            					'Maven Pro'=>'Maven Pro',
				            					'Open Sans'=>'Open Sans:400,600',
					            				'Lato'=>'Lato:300,400,700',
				            					'Lora'=>'Lora',

				            					))));

$avia_elements[] = array(	"slug"	=> "styling", "type" => "visual_group_end", "id" => "avia_tabwe5_end", "nodescription" => true);


$avia_elements[] = array(	"slug"	=> "styling", "type" => "visual_group_end", "id" => "avia_tab_container_end", "nodescription" => true);


$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> __("Quick CSS", 'avia_framework'),
					"desc" 	=> __("只是想做一些快速的CSS改变? 进入这里,他们将会应用于主题. 如果你需要更改请使用自定义主题的主要部分.css file.", 'avia_framework'),
					"id" 	=> "quick_css",
					"type" 	=> "textarea"
					);




/*Sidebar*/
$avia_elements[] =	array(
					"slug"	=> "sidebars",
					"name" 	=> __("在存档页面侧边栏", 'avia_framework'),
					"desc" 	=> __("在这里选择档案栏位置.这个设置将被应用到所有档案页面", 'avia_framework'),
					"id" 	=> "archive_layout",
					"type" 	=> "select",
					"std" 	=> "sidebar_right",
					"no_first"=>true,
					"subtype" => array( __('左侧边栏 ', 'avia_framework') =>'sidebar_left',
										__('右侧边栏', 'avia_framework') =>'sidebar_right',
										__('没有侧边栏', 'avia_framework') =>'fullsize'
										));




$avia_elements[] =	array(
					"slug"	=> "sidebars",
					"name" 	=> __("在博客的页面", 'avia_framework'),
					"desc" 	=> __("选择博客侧边栏的位置在这里. 这个设置将被应用到博客页面", 'avia_framework'),
					"id" 	=> "blog_layout",
					"type" 	=> "select",
					"std" 	=> "sidebar_right",
					"no_first"=>true,
					"subtype" => array( __('左侧边栏 ', 'avia_framework') =>'sidebar_left',
										__('右侧边栏', 'avia_framework') =>'sidebar_right',
										__('没有侧边栏', 'avia_framework') =>'fullsize'
										));




$avia_elements[] =	array(
					"slug"	=> "sidebars",
					"name" 	=> __("侧边栏单独的条目", 'avia_framework'),
					"desc" 	=> __("选择博客侧边栏的位置在这里.这个设置将被应用到单一的博客文章", 'avia_framework'),
					"id" 	=> "single_layout",
					"type" 	=> "select",
					"std" 	=> "sidebar_right",
					"no_first"=>true,
					"subtype" => array( __('左侧边栏 ', 'avia_framework') =>'sidebar_left',
										__('右侧边栏', 'avia_framework') =>'sidebar_right',
										__('没有侧边栏', 'avia_framework') =>'fullsize'
										));







$avia_elements[] =	array(
					"slug"	=> "sidebars",
					"name" 	=> __("侧边栏页面上", 'avia_framework'),
					"desc" 	=> __("选择默认的页面布局. 您可以更改的设置每个页面在编辑页面", 'avia_framework'),
					"id" 	=> "page_layout",
					"type" 	=> "select",
					"std" 	=> "sidebar_right",
					"no_first"=>true,
					"subtype" => array( __('左侧边栏', 'avia_framework') =>'sidebar_left',
										__('右侧边栏', 'avia_framework') =>'sidebar_right',
										__('没有侧边栏', 'avia_framework') =>'fullsize'
										));


$avia_elements[] =	array(
					"slug"	=> "sidebars",
					"name" 	=> __("栏上的智能手机", 'avia_framework'),
					"desc" 	=> __("智能手机上显示侧边栏(Sidebar is displayed then below the actual content)", 'avia_framework'),
					"id" 	=> "smartphones_sidebar",
					"type" 	=> "checkbox",
					"std" 	=> "",
					"no_first"=>true,
					"subtype" => array( __('智能手机上隐藏侧边栏', 'avia_framework') =>'',
										__('智能手机上显示侧边栏', 'avia_framework')	=>'smartphones_sidebar_visible'
										));


$avia_elements[] =	array(
					"slug"	=> "sidebars",
					"name" 	=> __("页面侧边栏导航", 'avia_framework'),
					"desc" 	=> __("显示一个侧边栏导航自动为所有嵌套的类别页面的主要?", 'avia_framework'),
					"id" 	=> "page_nesting_nav",
					"type" 	=> "checkbox",
					"std" 	=> "true",
					"no_first"=>true,
					"subtype" => array( __('显示侧边栏导航', 'avia_framework') =>'true',
										__('不显示侧边栏导航', 'avia_framework') => ""
										));


$avia_elements[] =	array(	"name" => __("创建新的侧边栏小部件领域", 'avia_framework'),
							"desc" => __("主题支持创建自定义小部件的区域. 只是打开你的", 'avia_framework') . " <a target='_blank' href='".admin_url('widgets.php')."'>".__('小部件页面 ', 'avia_framework')."</a> ". 
									  __("并添加一个新的工具栏区域. 之后你可以选择屏幕显示此小部件的编辑页面.", 'avia_framework'),
							"id" => "widgetdescription",
							"std" => "",
							"slug"	=> "sidebars",
							"type" => "heading",
							"nodescription"=>true);



/*Header Layout Settings*/


$avia_elements[] = array(	"slug"	=> "header", 
							"type" => "visual_group_start", 
							"id" => "header_conditional", 
							"nodescription" => true, 
							"required" => array('header_position','{contains}header_top'),
							"inactive"	=> "These options are only available if you select a layout that has a main menu positioned at the top.  You currently have your main menu placed in a sidebar <br/><br/> You can change that setting <a href='#goto_general_layout'>at General Layout</a>",
						);





			
$avia_elements[] =	array(
					"slug"	=> "header",
					"id" 	=> "default_header_target",
					"type" 	=> "target",
					"std" 	=> "
					<style type='text/css'>
					
					#avia_options_page #avia_default_header_target{background:#555; border:none; padding:10px 10px; width: 610px;}
					#avia_header_preview{color:#999; border:1px solid #e1e1e1; padding:15px 45px; overflow:hidden; background-color:#fff; position: relative;}
					
					#pr-main-area{line-height:69px; overflow:hidden;}
					#pr-menu{float:right; font-size:12px;}	
					
					#pr-logo{ max-width: 150px; max-height: 70px; float:left;}
					#avia_header_preview.large #pr-logo{ max-width: 250px; max-height: 115px;}
					#avia_header_preview.large #pr-main-area{line-height:115px;}
					
					#search_icon{opacity:0.5; margin-left: 10px; top:3px; position:relative; display:none;}
					#search_icon.header_searchicon{display:inline;}
					#pr-content-area{display:block; clear:both; padding:15px 45px; overflow:hidden; background-color:#fff; text-align:center; border:1px solid #e1e1e1; border-top:none;}
					.logo_right #pr-logo{float:right}
					.logo_center{text-align:center;}
					.logo_center #pr-logo{float:none}
					.menu_left #pr-menu{float:left}
					#avia_options_page .bottom_nav_header#pr-main-area{line-height: 1em;}
					.bottom_nav_header #pr-menu{float:none; clear:both; }
					.bottom_nav_header.logo_right #pr-menu{text-align:right;}
					
					
					#pr-menu-2nd{height: 17px; color:#aaa; border:1px solid #e1e1e1; padding:5px 45px; overflow:hidden; background-color:#f8f8f8; border-bottom:none; display:none; font-size:11px;}
					.extra_header_active #pr-menu-2nd{display:block;}
					.pr-secondary-items{display:none;}
					.secondary_left .pr-secondary-items, .secondary_right .pr-secondary-items{display:block; float:left; margin:0 10px 0 0;}
					.secondary_right .pr-secondary-items{float:right; margin:0  0 0 10px;}
					
					.pr-icons{opacity:0.3; display:none; position:relative; top:1px;}
					.icon_active_left.extra_header_active #pr-menu-2nd .pr-icons{display:block; float:left; margin:0 10px 0 0;}
					.icon_active_right.extra_header_active #pr-menu-2nd .pr-icons{display:block; float:right; margin:0 0 0 10px ;}
					
					.icon_active_main #pr-main-icon{float:right; position:relative; }
					.icon_active_main #pr-main-icon .pr-icons{display:block; top: 3px; margin: 0 0 0 17px;}
					.icon_active_main .logo_right #pr-main-icon {left:-138px;}
					.icon_active_main .large .logo_right #pr-main-icon {left:-55px;}
					.icon_active_main .bottom_nav_header #pr-main-icon{top:30px;}
					.icon_active_main .large .bottom_nav_header #pr-main-icon{top:50px;}
					.icon_active_main .logo_right.bottom_nav_header #pr-main-icon{float:left; left:-17px;}
					.icon_active_main .logo_center.bottom_nav_header #pr-main-icon{float: right; top: 42px; position: absolute; right: 24px;}
					.icon_active_main .logo_center.bottom_nav_header #pr-main-icon .pr-icons{margin:0; top:0px;}
					
					.pr-phone-items{display:none;}
					.phone_active_left  .pr-phone-items{display:block; float:left;}
					.phone_active_right .pr-phone-items{display:block; float:right;}
					
					.header_stretch #avia_header_preview, .header_stretch #pr-menu-2nd{ padding-left: 15px; padding-right: 15px; }
					.header_stretch .icon_active_main .logo_right.menu_left #pr-main-icon {left:-193px;}
					
					.inner-content{color:#999; text-align: justify; }
					
					#pr-breadcrumb{height: 23px; line-height:23px; color:#aaa; border:1px solid #e1e1e1; padding:5px 45px; overflow:hidden; background-color:#f8f8f8; border-top:none; font-size:16px;}
					#pr-breadcrumb .some-breadcrumb{float:right; font-size:11px;}
					#pr-breadcrumb.title_bar .some-breadcrumb, #pr-breadcrumb.hidden_title_bar{ display:none; }
					
					</style>

					<div id='pr-stretch-wrap' >
						<small class='live_bg_small'>A rough layout preview of the header area</small>
						<div id='pr-phone-wrap' >
							<div id='pr-social-wrap' >
								<div id='pr-seconary-menu-wrap' >
									<div id='pr-menu-2nd'>{$iconSpan}<span class='pr-secondary-items'>Login | Signup | etc</span><span class='pr-phone-items'>Phone: 555-4432</span></div>
									<div id='avia_header_preview' >
										<div id='pr-main-area' >
											<img id='pr-logo' src='".AVIA_BASE_URL."images/layout/logo.png' alt=''/>
											<div id='pr-main-icon'>{$iconSpan}</div>
											<div id='pr-menu'>Home | About | Contact <img id='search_icon' src='".AVIA_IMG_URL."icons/search.png' alt='' /></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id='pr-breadcrumb'>Some Title <span class='some-breadcrumb'>Home  &#187; Admin  &#187; Header </span></div>
						<div id='pr-content-area'> Content / Slideshows / etc 
						<div class='inner-content'>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium sem.</div>
						</div>
					</div>
					",
					"nodescription" => true
					);

//START TAB CONTAINER
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_start", "id" => "avia_tab1", "nodescription" => true, 'class'=>'avia_tab_container avia_set');
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_start", "id" => "avia_tab5", "nodescription" => true, 'class'=>'avia_tab avia_tab2','name'=>__('页眉的布局', 'avia_framework'));
// START TAB

$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> __("菜单和图标位置", 'avia_framework'),
					"desc" 	=> __("你可以选择各种不同的标志和主菜单的位置", 'avia_framework'),
					"id" 	=> "header_layout",
					"type" 	=> "select",
					"std" 	=> "",
					"class" => "av_2columns av_col_1",
					"no_first"=>true,
					"target" => array("default_header_target::#pr-main-area::set_class"),
					"subtype" => array( __('Logo左侧, 菜单右侧', 'avia_framework')  	=>'logo_left main_nav_header menu_right',
										__('Logo右侧,菜单左侧', 'avia_framework')	 	=>'logo_right main_nav_header menu_left',
										__('Logo左侧, 菜单下', 'avia_framework') 	=>'logo_left bottom_nav_header menu_left',
										__('Logo右侧, 菜单下', 'avia_framework') 	=>'logo_right bottom_nav_header menu_center',
										__('Logo中心,菜单下', 'avia_framework') 	=>'logo_center bottom_nav_header menu_right',
										));
										
$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> __("页眉大小", 'avia_framework'),
					"desc" 	=> __("选择一个预定义的页眉大小. 您还可以自定义高度适用于页眉", 'avia_framework'),
					"id" 	=> "header_size",
					"type" 	=> "select",
					"std" 	=> "",
					"class" => "av_2columns av_col_2",
					"target" => array("default_header_target::#avia_header_preview::set_class"),
					"no_first"=>true,
					"subtype" => array( __('苗条', 'avia_framework')  				=>'slim',
										__('大', 'avia_framework')	 			=>'large',
										__('自定义像素值', 'avia_framework') 	=>'custom',
										));				


$customsize = array();
for ($x=45; $x<=300; $x++){ $customsize[$x.'px'] = $x; }	
								
$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> __("页眉定制高度", 'avia_framework'),
					"desc" 	=> __("选择一个自定义的高度(以像素为单位) (不会反映在上面的预览,只有在你实际的页面)", 'avia_framework'),
					"id" 	=> "header_custom_size",
					"type" 	=> "select",
					"std" 	=> "150",
					"required" => array('header_size','custom'),
					"no_first"=>true,
					"subtype" => $customsize);											
										
$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> __("页眉标题和面包屑", 'avia_framework'),
					"desc" 	=> __("选择如果你想如何显示页面的标题和面包屑. 这个选项可以覆盖在编写/编辑页面", 'avia_framework'),
					"id" 	=> "header_title_bar",
					"type" 	=> "select",
					"std" 	=> "title_bar_breadcrumb",
					"target" => array("default_header_target::#pr-breadcrumb::set_class"),
					"no_first"=>true,
					"subtype" => array( __('显示标题和面包屑', 'avia_framework')  =>'title_bar_breadcrumb',
										__('只显示标题', 'avia_framework')	 		 =>'title_bar',
										__('隐藏两', 'avia_framework') 					 =>'hidden_title_bar',
										));											
										
										
																
// END TAB
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_end", "id" => "avia_tab5_end", "nodescription" => true);
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_start", "id" => "avia_tab5", "nodescription" => true, 'class'=>'avia_tab avia_tab2','name'=>__('Header behavior', 'avia_framework'));
// START TAB
										
$avia_elements[] = array(
							"name" 	=> __("粘性的页眉", 'avia_framework'),
							"desc" 	=> __("如果勾选此项头将坚持你的网站,如果用户在向下滚动 (ignored on smartphones)", 'avia_framework'),
							"id" 	=> "header_sticky",
							"type" 	=> "checkbox",
							"std"	=> "true",
							"slug"	=> "header");								

$avia_elements[] = array(
							"name" 	=> __("减少页眉", 'avia_framework'),
							"desc" 	=> __("如果检查粘头将会收缩一旦用户卷轴 (ignored on smartphones + tablets)", 'avia_framework'),
							"id" 	=> "header_shrinking",
							"type" 	=> "checkbox",
							"std"	=> "true",
							"required" => array('header_sticky','header_sticky'),
							"slug"	=> "header");

$avia_elements[] = array(
							"name" 	=> __("让商标和菜单位置适应浏览器窗口", 'avia_framework'),
							"desc" 	=> __("如果检查元素总是会在你的头放置在浏览器窗口的边缘,而不是宽度相匹配的内容", 'avia_framework'),
							"id" 	=> "header_stretch",
							"type" 	=> "checkbox",
							"std"	=> "",
							"target" => array("default_header_target::#pr-stretch-wrap::set_class"),
							"slug"	=> "header");

// END TAB
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_end", "id" => "avia_tab5_end", "nodescription" => true);


$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_start", "id" => "avia_tab5", "nodescription" => true, 'class'=>'avia_tab avia_tab2','name'=>__('Extra Elements', 'avia_framework'));
// START TAB


$avia_elements[] = array(
							"name" 	=> __("添加搜索图标主菜单", 'avia_framework'),
							"desc" 	=> __("如果启用了一个搜索图标将被加到主菜单,允许用户执行 'AJAX' Search", 'avia_framework'),
							"id" 	=> "header_searchicon",
							"type" 	=> "checkbox",
							"std"	=> "true",
							"target" => array("default_header_target::#search_icon::set_class"),
							"slug"	=> "header");	

$avia_elements[] = array(	"slug"	=> "header", "type" => "hr", "id" => "hr_header1", "nodescription" => true);

$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> __("页眉社交图标", 'avia_framework'),
					"desc" 	=> __("如果选择,显示社会图标. 您可以定义的图标<a href='#goto_social_profiles'>Social Profiles</a>", 'avia_framework'),
					"id" 	=> "header_social",
					"type" 	=> "select",
					"std" 	=> "",
					"class" => "av_2columns av_col_1",
					"target" => array("default_header_target::#pr-social-wrap::set_class"),
					"no_first"=>true,
					"subtype" => array( __('任何社会的图标', 'avia_framework')  		=>'',
										__('顶部菜单栏显示在左侧', 'avia_framework')	 =>'icon_active_left extra_header_active',
										__('顶部菜单栏显示在右侧', 'avia_framework')    =>'icon_active_right extra_header_active',
										__('主要显示在头部区域', 'avia_framework')    	 =>'icon_active_main',
										));	

$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> __("页眉二级菜单", 'avia_framework'),
					"desc" 	=> __("选择如果你想显示二级菜单,显示它", 'avia_framework'),
					"id" 	=> "header_secondary_menu",
					"type" 	=> "select",
					"std" 	=> "",
					"class" => "av_2columns av_col_2",
					"target" => array("default_header_target::#pr-seconary-menu-wrap::set_class"),
					"no_first"=>true,
					"subtype" => array( __('没有二级菜单', 'avia_framework')  	=>'',
										__('二级菜单栏在左边', 'avia_framework')	 =>'secondary_left extra_header_active',
										__('二级菜单上酒吧', 'avia_framework') =>'secondary_right extra_header_active',
										));	

$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> __("页眉电话号码/额外的信息", 'avia_framework'),
					"desc" 	=> __("选择如果你想显示另外一个电话号码或者一些额外的信息在你的页眉", 'avia_framework'),
					"id" 	=> "header_phone_active",
					"type" 	=> "select",
					"std" 	=> "",
					"class" => "av_2columns av_col_1",
					"target" => array("default_header_target::#pr-phone-wrap::set_class"),
					"no_first"=>true,
					"subtype" => array( __('没有电话号码/额外的信息', 'avia_framework') 		=>'',
										__('顶部菜单栏显示在左侧', 'avia_framework')	 =>'phone_active_left extra_header_active',
										__('顶部菜单栏显示在右侧', 'avia_framework')    =>'phone_active_right extra_header_active',
										));	

$avia_elements[] = array(
						"name" 	=> __("电话号码或小信息文本", 'avia_framework'),
						"desc" 	=> __("添加的文本在这里应该显示在你的头", 'avia_framework'),
						"id" 	=> "phone",
						"type" 	=> "text",
						"std"	=> "",
						"class" => "av_2columns av_col_2",
						"required" => array('header_phone_active','{contains}phone_active'),
						"slug"	=> "header");
						
						
						


// END TAB
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_end", "id" => "avia_tab5_end", "nodescription" => true);
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_start", "id" => "avia_tab5", "nodescription" => true, 'class'=>'avia_tab avia_tab2','name'=>__('透明度选项', 'avia_framework'));
// START TAB
$avia_elements[] =	array(	"name" => __("什么是页眉透明度",'avia_framework'),
							"desc" => __("在创建/编辑页面时你可以选择标题是透明和显示内容(通常fullwidth幻灯片或fullwidth形象) 在下面 . 在这些情况下,你通常会需要不同的标志和主菜单的颜色,可以在这里设定.",'avia_framework')."<br/><a class='av-modal-image' href='".get_template_directory_uri()."/images/framework-helper/header_transparency.jpg'>".__('(显示示例截图)','avia_framework')."</a>",
							"id" => "transparency_description",
							"std" => "",
							"slug"	=> "header",
							"type" => "heading",
							"nodescription"=>true);
							
							
$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> __("透明的标志", 'avia_framework'),
					"desc" 	=> __("上传标志形象,或输入图像的URL或ID如果已经上传. (离开空使用默认的标志)", 'avia_framework'),
					"id" 	=> "header_replacement_logo",
					"type" 	=> "upload",
					"label"	=> __("使用形象的标志", 'avia_framework'));


$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> __("透明菜单颜色", 'avia_framework'),
					"desc" 	=> __("菜单颜色透明的页眉(离开空使用默认的颜色)", 'avia_framework'),
					"id" 	=> "header_replacement_menu",
					"type" 	=> "colorpicker",
					"std" 	=> ""
					);

// END TAB
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_end", "id" => "avia_tab5_end", "nodescription" => true);
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_start", "id" => "avia_tab5", "nodescription" => true, 'class'=>'avia_tab avia_tab2','name'=>__('手机菜单', 'avia_framework'));
// START TAB
$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> __("页眉移动菜单激活", 'avia_framework'),
					"desc" 	=> __("移动菜单通常显示在smarthphone拉.如果你有很多的主要菜单项你可能想激活它平板电脑屏幕大小也因此不重叠的标志在平板电脑上或小屏幕", 'avia_framework'),
					"id" 	=> "header_mobile_activation",
					"type" 	=> "select",
					"std" 	=> "mobile_menu_phone",
					"no_first"=>true,
					"subtype" => array( __('智能手机只激活(浏览器宽度低于768 px)', 'avia_framework') =>'mobile_menu_phone',
										__('智能手机和平板电脑激活(浏览器宽度低于990 px)', 'avia_framework') =>'mobile_menu_tablet',
										));	
										

$avia_elements[] = array(
							"name" 	=> __("隐藏移动菜单的子菜单选项", 'avia_framework'),
							"desc" 	=> __("默认情况下所有移动菜单的菜单项都是可见的.如果您激活这个选项会被隐藏和一个用户需要点击父菜单项显示子菜单", 'avia_framework'),
							"id" 	=> "header_mobile_behavior",
							"type" 	=> "checkbox",
							"std"	=> "",
							"slug"	=> "header");
							
							

// END TAB
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_end", "id" => "avia_tab5_end", "nodescription" => true);


//END TAB CONTAINER
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_end", "id" => "avia_tab_container_end", "nodescription" => true);

								
// close conditional 
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_end", "id" => "header_conditional_close", "nodescription" => true);


/*social settings*/

$avia_elements[] =	array(	"name" => __("你的社交资料", 'avia_framework'),
							"desc" => __("你可以在这里输入链接到你的社交资料.之后你可以选择被激活来显示他们在各自的领域 (e.g: <a href='#goto_general_layout'>General Layout</a>, <a href='#goto_header'>Header</a>, <a href='#goto_footer'>Footer</a> )", 'avia_framework'),
							"id" => "socialdescription",
							"std" => "",
							"slug"	=> "social",
							"type" => "heading",
							"nodescription"=>true);



$avia_elements[] =	array(
					"type" 			=> "group",
					"id" 			=> "social_icons",
					"slug"			=> "social",
					"linktext" 		=> __("添加另一个社会图标", 'avia_framework'),
					"deletetext" 	=> "Remove icon",
					"blank" 		=> true,
					"nodescription" => true,
					"std"			=> array(
										array('social_icon'=>'twitter', 'social_icon_link'=>'http://twitter.com/kriesi'),
										array('social_icon'=>'dribbble', 'social_icon_link'=>'http://dribbble.com/kriesi'),
										),
					'subelements' 	=> array(

							array(
								"name" 	=> __("社会图标", 'avia_framework'),
								"desc" 	=> "",
								"id" 	=> "social_icon",
								"type" 	=> "select",
								"slug"	=> "sidebar",
								"class" => "av_2columns av_col_1",
								"subtype" => apply_filters('avf_social_icons_options', array(

									'500px' 	=> 'five_100_px',
									'Behance' 	=> 'behance',
									'Dribbble' 	=> 'dribbble',
									'Facebook' 	=> 'facebook',
									'Flickr' 	=> 'flickr',
									'Google Plus' => 'gplus',
									'Instagram'  => 'instagram',
									'LinkedIn' 	=> 'linkedin',
									'Pinterest' 	=> 'pinterest',
									'Reddit' 	=> 'reddit',
									'Skype' 	=> 'skype',
									'Soundcloud'=> 'soundcloud',
									'Tumblr' 	=> 'tumblr',
									'Twitter' 	=> 'twitter',
									'Vimeo' 	=> 'vimeo',
									'Vk' 		=> 'vk',
									'Xing' 		=> 'xing',
									'Youtube'   => 'youtube',
									__('特殊: RSS (add RSS URL, leave blank if you want to use default WordPress RSS feed)', 'avia_framework') => 'rss',
									__('特殊: Email Icon (add your own URL to link to a contact form)', 'avia_framework') => 'mail',

								))),

							array(
								"name" 	=> __("社交图标URL:", 'avia_framework'),
								"desc" 	=> "",
								"id" 	=> "social_icon_link",
								"type" 	=> "text",
								"slug"	=> "sidebar",
								"class" => "av_2columns av_col_2"),
						        )
						);




/*footer settings*/


$avia_elements[] =	array(
					"slug"	=> "footer",
					"name" 	=> __("Default Footer Widgets & Socket Settings", 'avia_framework'),
					"desc" 	=> __("Do you want to display the footer widgets & footer socket?", 'avia_framework'),
					"id" 	=> "display_widgets_socket",
					"type" 	=> "select",
					"std" 	=> "all",
					"no_first" => true,
					"subtype" => array(
				                    __('显示页脚小部件 & 插座', 'avia_framework') =>'all',
				                    __('只显示页脚小部件 (没有插座)', 'avia_framework') =>'nosocket',
				                    __('只显示套接字 (没有页脚小部件)', 'avia_framework') =>'nofooterwidgets',
				                    __('不显示套接字 &页脚的小部件', 'avia_framework') =>'nofooterarea'
									)
					);




$avia_elements[] =	array(
					"slug"	=> "footer",
					"name" 	=> __("页脚列", 'avia_framework'),
					"desc" 	=> __("有多少列应该还在你的页脚吗", 'avia_framework'),
					"id" 	=> "footer_columns",
					"type" 	=> "select",
					"std" 	=> "4",
					"subtype" => array(
						__('1', 'avia_framework') =>'1',
						__('2', 'avia_framework') =>'2',
						__('3', 'avia_framework') =>'3',
						__('4', 'avia_framework') =>'4',
						__('5', 'avia_framework') =>'5'));

$avia_elements[] =	array(
					"slug"	=> "footer",
					"name" 	=> __("版权", 'avia_framework'),
					"desc" 	=> __("添加一个自定义网站的底部版权文字. 例:", 'avia_framework')."<br/><strong>&copy; ".__('版权','avia_framework')."  - ".get_bloginfo('name')."</strong>",
					"id" 	=> "copyright",
					"type" 	=> "text",
					"std" 	=> ""

					);


$avia_elements[] = array(
		"name" 	=> __("社会图标", 'avia_framework'),
		"desc" 	=> __("检查显示社会图标中定义 <a href='#goto_social_profiles'>社会概要文件</a> in your socket", 'avia_framework'),
		"id" 	=> "footer_social",
		"type" 	=> "checkbox",
		"std"	=> "",
		"slug"	=> "footer");	



/*blog settings*/



$avia_elements[] =	array(
					"slug"	=> "blog",
					"name" 	=> __("博客风格", 'avia_framework' ),
					"desc" 	=> __("选择默认博客布局.", 'avia_framework' )."<br/><br/>".__("你可以选择一个预定义的布局或建立自己的博客布局与先进布局编辑器", 'avia_framework' ),
					"id" 	=> "blog_style",
					"type" 	=> "select",
					"std" 	=> "single-small",
					"no_first"=>true,
					"subtype" => array( 
									__( '多作者博客 (显示Gravatar文章的作者在上面的条目和特征的图像)', 'avia_framework' ) =>'multi-big',
									__( '单一的作者,小预览图片(图片没有显示作者的照片,特点是小的)', 'avia_framework' ) =>'single-small',
									__( '单一的作者,大的预览图片(图片没有显示作者的照片,特点是大)', 'avia_framework' ) =>'single-big',
									__( '网格布局', 'avia_framework' ) =>'blog-grid',
									__( '使用提前布局编辑器来构建自己的博客布局(简单编辑页面你选择了拥抱->Theme Options as a blog page)', 'avia_framework') =>'custom',
										));



$avia_elements[] = array("slug"	=> "blog", "type" => "visual_group_start", "id" => "avia_share_links_start", "nodescription" => true);	
    
$avia_elements[] =	array(	"name" => __("单篇文章选择", 'avia_framework'),
							"desc" => __("在这里您可以设置选项,影响你的博客布局", 'avia_framework'),
							"id" => "widgetdescription",
							"std" => "",
							"slug"	=> "blog",
							"type" => "heading",
							"nodescription"=>true);

$avia_elements[] =	array(
    "slug"	=> "blog",
    "name" 	=> __("单一的文章风格", 'avia_framework'),
    "desc" 	=> __("在这里选择单一的文章风格.", 'avia_framework'),
    "id" 	=> "single_post_style",
    "type" 	=> "select",
    "std" 	=> "single-big",
    "no_first"=>true,
    "subtype" => array( __('单后用小预览图片(有图片)', 'avia_framework') =>'single-small',
        __('单后与大预览图像 (特色图像)', 'avia_framework') =>'single-big',
        __('多作者博客(显示Gravatar文章的作者在入口和功能图片上面)', 'avia_framework') =>'multi-big'
    ));
    
    

$avia_elements[] =	array(
    "slug"	=> "blog",
    "name" 	=> __("相关阅读 ", 'avia_framework'),
    "desc" 	=> __("选择如果你想显示你的相关条目. (基于标签的相关条目.如果一篇文章没有任何标签然后没有相关的条目将显示)", 'avia_framework'),
    "id" 	=> "single_post_related_entries",
    "type" 	=> "select",
    "std" 	=> "av-related-style-tooltip",
    "no_first"=>true,
    "subtype" => array( __('Show Thumnails and display post title by tooltip', 'avia_framework') =>'av-related-style-tooltip',
        				__('Show Thumbnail and post title by default', 'avia_framework') =>'av-related-style-full',
        				__('Disable related entries', 'avia_framework') =>'disabled'
    ));
    
    
    
$avia_elements[] =	array(	"name" => __("博客元标签 元素", 'avia_framework'),
							"desc" => __("你可以选择在这里隐藏默认博客的一些元素:", 'avia_framework'),
							"id" => "widgetdescription",
							"std" => "",
							"slug"	=> "blog",
							"type" => "heading",
							"nodescription"=>true);


$avia_elements[] = array(
		"name" 	=> __("博客作者", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "blog-meta-author",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_1",
		"slug"	=> "blog");	
		
		
$avia_elements[] = array(
		"name" 	=> __("博客评论数", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "blog-meta-comments",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");			
		
$avia_elements[] = array(
		"name" 	=> __("博客文章类别", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "blog-meta-category",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");	
		
		

$avia_elements[] = array(
		"name" 	=> __("博客文章日期", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "blog-meta-date",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_1",
		"slug"	=> "blog");	
		
		
$avia_elements[] = array(
		"name" 	=> __("博客允许HTML标记", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "blog-meta-html-info",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");	

$avia_elements[] = array(
		"name" 	=> __("博文标签", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "blog-meta-tag",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_3",
		"slug"	=> "blog");	


    

$avia_elements[] = array("slug"	=> "blog", "type" => "visual_group_end", "id" => "avia_share_links_start", "nodescription" => true);	

$avia_elements[] = array("slug"	=> "blog", "type" => "visual_group_start", "id" => "avia_share_links_start", "nodescription" => true);	
    
$avia_elements[] =	array(	"name" => __("底部的分享链接你的博客", 'avia_framework'),
							"desc" => __("允许您显示主题分享链接各种社交网络的底部你的博客文章.检查这链接你想显示:", 'avia_framework'),
							"id" => "widgetdescription",
							"std" => "",
							"slug"	=> "blog",
							"type" => "heading",
							"nodescription"=>true);


$avia_elements[] = array(
		"name" 	=> __("Facebook链接", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "share_facebook",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_1",
		"slug"	=> "blog");	
		
		
$avia_elements[] = array(
		"name" 	=> __("Twitter链接", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "share_twitter",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");			
		
$avia_elements[] = array(
		"name" 	=> __("Pinterest链接 ", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "share_pinterest",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");	
		
				
		
		
$avia_elements[] = array(
		"name" 	=> __("Google Plus 链接", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "share_gplus",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_1",
		"slug"	=> "blog");	
		
		
$avia_elements[] = array(
		"name" 	=> __("Reddit 链接", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "share_reddit",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");			
		
$avia_elements[] = array(
		"name" 	=> __("Linkedin 链接 ", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "share_linkedin",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");				
		

$avia_elements[] = array(
		"name" 	=> __("Tumblr链接", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "share_tumblr",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_1",
		"slug"	=> "blog");	
		
$avia_elements[] = array(
		"name" 	=> __("VK 链接", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "share_vk",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");	
	
		
$avia_elements[] = array(
		"name" 	=> __("Email链接", 'avia_framework'),
		"desc" 	=> __("检查显示", 'avia_framework'),
		"id" 	=> "share_mail",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");				
		
		
		
		
		

		
$avia_elements[] = array("slug"	=> "blog", "type" => "visual_group_end", "id" => "avia_share_links_end", "nodescription" => true);	
		
		
		

$avia_elements[] =	array(	"name" => __("导入演示文件", 'avia_framework'),
							"desc" => __("如果你是新的wordpress或者问题创建文章或者网页看起来像 <a href='http://www.kriesi.at/themes/enfold/'>主题样片 
</a> you can import dummy posts and pages here that will definitely help to understand how those tasks are done.", 'avia_framework'),
							"id" => "widgetdescription",
							"std" => "",
							"slug"	=> "demo",
							"type" => "heading",
							"nodescription"=>true);	
														
		
if(!current_theme_supports('avia_disable_dummy_import')){


$avia_elements[] =	array(
					"slug"	=> "demo",
					"name" 	=> __("导入 : 默认的演示", 'avia_framework'),
					"desc" 	=> 	 "<p><strong>".__("你得到些什么 : <a href='http://www.kriesi.at/themes/enfold' target='_blank'>Online Demo</a>", 'avia_framework')."</strong></p>"
								."<h4 class='av-before-plugins'>".__("推荐插件:", 'avia_framework')."</h4><ul>"
								."<li>".__("<a href='http://wordpress.org/plugins/woocommerce/' target='_blank'>WooCommerce</a> (for shop functionality)", 'avia_framework')."</li>"
								."<li>".__("<a href='https://wordpress.org/plugins/bbpress/' target='_blank'>BBPress</a> (for forum functionality)", 'avia_framework')."</li>"
								."</ul>"
								."<h4 class='av-before-plugins'>".__("演示图片包括:", 'avia_framework')."</h4><ul>"
								."<li>".__("几个", 'avia_framework')."</li>"
								."</ul>",
					"id" 	=> "import",
					"type" 	=> "import",
					"image"	=> "includes/admin/demo_files/demo_images/default.jpg"
					);


$avia_elements[] =	array(
					"slug"	=> "demo",
					"name" 	=> __("导入: 小型企业  - Flat", 'avia_framework'),
					"desc" 	=> 	 "<p><strong>".__("你得到些什么 : <a href='http://www.kriesi.at/themes/enfold-business-flat' target='_blank'>Online Demo</a>", 'avia_framework')."</strong></p>"
								."<h4 class='av-before-plugins'>".__("推荐插件:", 'avia_framework')."</h4><ul>"
								."<li>".__("没有", 'avia_framework')."</li>"
								."</ul>"
								."<h4 class='av-before-plugins'>".__("演示图片包括:", 'avia_framework')."</h4><ul>"
								."<li>".__("全部", 'avia_framework')."</li>"
								."</ul>",
					'files' => "/includes/admin/demo_files/business-flat",
					"id" 	=> "import",
					"type" 	=> "import",
					"image"	=> "includes/admin/demo_files/demo_images/business-flat.jpg"
					);


$avia_elements[] =	array(
					"slug"	=> "demo",
					"name" 	=> __("导入 : 摄影演示", 'avia_framework'),
					"desc" 	=> 	 "<p><strong>".__("你得到些什么 : <a href='http://www.kriesi.at/themes/enfold-photography' target='_blank'>Online Demo</a>", 'avia_framework')."</strong></p>"
								."<h4 class='av-before-plugins'>".__("Recommended Plugins:", 'avia_framework')."</h4><ul>"
								."<li>".__("<a href='http://wordpress.org/plugins/woocommerce/' target='_blank'>WooCommerce</a> (if you want to sell photos online)", 'avia_framework')."</li>"
								."</ul>"
								."<h4 class='av-before-plugins'>".__("演示图片包括:", 'avia_framework')."</h4><ul>"
								."<li>".__("全部", 'avia_framework')."</li>"
								."</ul>",
					'files' => "/includes/admin/demo_files/photography",
					"id" 	=> "import",
					"type" 	=> "import",
 					"image"	=> "includes/admin/demo_files/demo_images/photography.jpg"
					);


$avia_elements[] =	array(
					"slug"	=> "demo",
					"name" 	=> __("导入: 餐厅演示", 'avia_framework'),
					"desc" 	=> 	 "<p><strong>".__("你得到些什么 : <a href='http://www.kriesi.at/themes/enfold-restaurant' target='_blank'>Online Demo</a>", 'avia_framework')."</strong></p>"
								."<h4 class='av-before-plugins'>".__("推荐插件:", 'avia_framework')."</h4><ul>"
								."<li>".__("<a href='http://wordpress.org/plugins/woocommerce/' target='_blank'>WooCommerce</a> (if you want to provide online ordering and delivery)", 'avia_framework')."</li>"
								."</ul>"
								."<h4 class='av-before-plugins'>".__("演示图片包括:", 'avia_framework')."</h4><ul>"
								."<li>".__("全部", 'avia_framework')."</li>"
								."</ul>",
					'files' => "/includes/admin/demo_files/restaurant",
					"id" 	=> "import",
					"type" 	=> "import",
					"image"	=> "includes/admin/demo_files/demo_images/restaurant.jpg"
					);

$avia_elements[] =	array(
					"slug"	=> "demo",
					"name" 	=> __("导入: 餐厅一页演示", 'avia_framework'),
					"desc" 	=> 	 "<p><strong>".__("你得到些什么 : <a href='http://www.kriesi.at/themes/enfold-restaurant-one-page' target='_blank'>Online Demo</a>", 'avia_framework')."</strong></p>"
								."<h4 class='av-before-plugins'>".__("推荐插件:", 'avia_framework')."</h4><ul>"
								."<li>".__("<a href='http://wordpress.org/plugins/woocommerce/' target='_blank'>WooCommerce</a> (if you want to provide online ordering and delivery)", 'avia_framework')."</li>"
								."</ul>"
								."<h4 class='av-before-plugins'>".__("演示图片包括:", 'avia_framework')."</h4><ul>"
								."<li>".__("全部", 'avia_framework')."</li>"
								."</ul>",
					'files' => "/includes/admin/demo_files/restaurant-one-page",
					"id" 	=> "import",
					"type" 	=> "import",
 					"image"	=> "includes/admin/demo_files/demo_images/restaurant-onepage.jpg"
					);

		
		
$avia_elements[] =	array(
					"slug"	=> "demo",
					"name" 	=> __("导入: 简单的博客演示", 'avia_framework'),
					"desc" 	=> 	 "<p><strong>".__("你得到些什么 : <a href='http://www.kriesi.at/themes/enfold-blog' target='_blank'>Online Demo</a>", 'avia_framework')."</strong></p>"
								."<h4 class='av-before-plugins'>".__("推荐插件:", 'avia_framework')."</h4><ul>"
								."<li>".__("没有", 'avia_framework')."</li>"
								."</ul>"
								."<h4 class='av-before-plugins'>".__("演示图片包括:", 'avia_framework')."</h4><ul>"
								."<li>".__("全部", 'avia_framework')."</li>"
								."</ul>",
					'files' => "/includes/admin/demo_files/blog",
					"id" 	=> "import",
					"type" 	=> "import",
 					"image"	=> "includes/admin/demo_files/demo_images/blog.jpg"
					);


$avia_elements[] =	array(
					"slug"	=> "demo",
					"name" 	=> __("Import: 'Coming Soon' Demo", 'avia_framework'),
					"desc" 	=> 	 "<p><strong>".__("你得到些什么 : <a href='http://www.kriesi.at/themes/enfold-coming-soon' target='_blank'>Online Demo</a>", 'avia_framework')."</strong></p>"
								."<h4 class='av-before-plugins'>".__("推荐插件:", 'avia_framework')."</h4><ul>"
								."<li>".__("全部", 'avia_framework')."</li>"
								."</ul>"
								."<h4 class='av-before-plugins'>".__("演示图片包括:", 'avia_framework')."</h4><ul>"
								."<li>".__("全部", 'avia_framework')."</li>"
								."</ul>",
					'files' => "/includes/admin/demo_files/coming_soon",
					"id" 	=> "import",
					"type" 	=> "import",
 					"image"	=> "includes/admin/demo_files/demo_images/coming-soon.jpg"
					);















}		
		
		
		
		
		
