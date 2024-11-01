<?php
/*
Plugin Name: Tagvn Button
Version: 2.0.2
Plugin URI: http://www.tagvn.com/buttons#wordpress
Description: Nút gửi bài cho phép bạn chèn nút chia sẻ của Tagvn vào Blog. Từ đó sẽ tạo điều kiện cho bạn hoặc các user khác chia sẻ thông tin từ website của mình vào Tagvn.com cũng như là khả năng bình chọn thông tin. <a href="http://www.tagvn.com/buttons" target="_blank">Xem thêm</a> - <a href="../wp-content/plugins/tagvn_button/readme.txt" target="_blank">Hướng dẫn sử dụng</a>.
Author: Tagvn.com
Author URI: http://www.tagvn.com/aboutus
*/

$message = "";

if (!function_exists('smtagvn_request_handler')) {
    function smtagvn_request_handler() {
        global $message;

        if ($_POST['smtagvn_action'] == "update options") {
            $smtagvn_align_v = $_POST['smtagvn_align_sl'];
			$smtagvn_style_v = $_POST['smtagvn_style_sl'];
			
    		if(get_option("smtagvn_box_align")) {
    			update_option("smtagvn_box_align", $smtagvn_align_v);
    		} else {
    			add_option("smtagvn_box_align", $smtagvn_align_v);
    		}

    		if(get_option("smtagvn_box_style")) {
    			update_option("smtagvn_box_style", $smtagvn_style_v);
    		} else {
    			add_option("smtagvn_box_style", $smtagvn_style_v);
    		}
			
            $message = '<br clear="all" /> <div id="message" class="updated fade"><p><strong>Đã lưu thành công!</strong></p></div>';
        }
    }
}

if(!function_exists('smtagvn_add_menu')) {
    function smtagvn_add_menu () {
        add_options_page("Tinh chỉnh nút Tag", "Tinh chỉnh nút Tag", 8, basename(__FILE__), "smtagvn_displayOptions");
    }
}

if (!function_exists('smtagvn_displayOptions')) {
    function smtagvn_displayOptions() {

        global $message;
        echo $message;

		print('<div class="wrap">');
		print('<h2><img width="32" align="absmiddle" src="http://image.tagvn.com/tools/gadgets/tagv1_50x51.png">    Tinh chỉnh nút Tag</h2>');
		print('<p>Các bạn có thể dễ dàng tinh chỉnh nút chia sẻ Tag ở đây như vị trí hiển thị của nút trong bài viết hoặc là template cho nút chia sẻ.</p>');
        print ('<form name="smtagvn_form" action="'. get_bloginfo("wpurl") . '/wp-admin/options-general.php?page=tagvn_button.php' .'" method="post">');
?>

		<table class="form-table"/>
		<tbody>
        	<tr valign="top">
				<th scope="row">
					Vị trí của nút chia sẻ
                </th>
                <td>
                    <select name="smtagvn_align_sl" id="smtagvn_align_sl">
                        <option value="Top Left" <?php if (get_option("smtagvn_box_align") == "Top Left") echo " selected"; ?> >Bên trái trên đầu</option>
                        <option value="Top Right" <?php if (get_option("smtagvn_box_align") == "Top Right") echo " selected"; ?> >Bên phải trên đầu</option>
                        <option value="Bottom Left" <?php if (get_option("smtagvn_box_align") == "Bottom Left") echo " selected"; ?> >Bên trái phía dưới</option>
                        <option value="Bottom Right" <?php if (get_option("smtagvn_box_align") == "Bottom Right") echo " selected"; ?> >Bên phải phía dưới</option>
                        <option value="None" <?php if (get_option("smtagvn_box_align") == "None") echo " selected"; ?> >Tự chèn Code</option>
                    </select>                
                </td>    
			</tr>
        	<tr valign="top">
				<th scope="row">
					Template cho nút chia sẻ Tag
                </th>
                <td>
                    <select name="smtagvn_style_sl" id="smtagvn_style_sl">
                        <option value="4" <?php if (get_option("smtagvn_box_style") == "4") echo " selected"; ?> >Mặc định (Tối ưu nhất) </option>                    
                        <option value="1" <?php if (get_option("smtagvn_box_style") == "1") echo " selected"; ?> >Loại 1 </option>
                        <option value="2" <?php if (get_option("smtagvn_box_style") == "2") echo " selected"; ?> >Loại 2 </option>
                        <option value="3" <?php if (get_option("smtagvn_box_style") == "3") echo " selected"; ?> >Loại 3 </option>
                    </select>            
                </td>    
			</tr>            
        </tbody>    
        </table>

<?php
		print ('<p class="submit"><input type="submit" class="button-primary" value="Lưu lựa chọn &raquo;"></p>');
		print ('<input type="hidden" name="smtagvn_action" value="update options" />');
		print('</form></div>');

    }
}


if (!function_exists('smtagvn_tagithtml')) {
	function smtagvn_tagithtml($float,$style) {
		global $wp_query;
		$post = $wp_query->post;
		$permalink = get_permalink($post->ID);
        $title = urlencode($post->post_title);
		$tagithtml = <<<CODE
    <div style="clear:both"></div>
    <span style="margin: 0px 6px 0px 0px; float: $float;">
	<script type="text/javascript">var submit_url = "$permalink";</script>
	<script type="text/javascript">var submit_style = "$style";</script>
	<script language="javascript" src="http://www.tagvn.com/minify/?f=tools/buttons/evb.js"></script> 
	</span>
    <div style="clear:both"></div>
CODE;
	return  $tagithtml;
	}
}


if (!function_exists('smtagvn_addbutton')) {
	function smtagvn_addbutton($content) {

		if ( !is_feed() && !is_page() && !is_archive() && !is_search() && !is_404() ) {
    		if(! preg_match('|<!--Tagit-->|', $content)) {
    		    $smtagvn_align = get_option("smtagvn_box_align");
                $smtagvn_style = get_option("smtagvn_box_style");
    		    if ($smtagvn_align) {
                	if ($smtagvn_style) {
                    switch ($smtagvn_align) {
                        case "Top Left":
        		              return smtagvn_tagithtml("left",$smtagvn_style).$content;
                              break;
                        case "Top Right":
        		              return smtagvn_tagithtml("right",$smtagvn_style).$content;
                              break;
                        case "Bottom Left":
        		              return $content.smtagvn_tagithtml("left",$smtagvn_style);
                              break;
                        case "Bottom Right":
        		              return $content.smtagvn_tagithtml("right",$smtagvn_style);
                              break;
                        case "None":
        		              return $content;
                              break;
                        default:
        		              return smtagvn_tagithtml("left",$smtagvn_style).$content;
                              break;
                    }
                    }
                } else {
        		      return smtagvn_tagithtml("left",$smtagvn_style).$content;
                }

    		} else {
                  return str_replace('<!--Tagit-->', smtagvn_tagithtml("",$smtagvn_style), $content);
            }
        } else {
			return $content;
        }
	}
}

if (!function_exists('show_tagit')) {
	function show_tagit($float = "left",$style = "4") {
        global $post;
		$permalink = get_permalink($post->ID);
		echo <<<CODE
    <span style="margin: 0px 6px 0px 0px; float: $float;">
	<script type="text/javascript">var submit_url = "$permalink";</script>
    <script type="text/javascript">var submit_style = "$style";</script>
    <script language="javascript" src="http://www.tagvn.com/minify/?f=tools/buttons/evb.js&838199002"></script> 
	</span>
CODE;
    }
}

add_filter('the_content', 'smtagvn_addbutton', 999);
add_action('admin_menu', 'smtagvn_add_menu');
add_action('init', 'smtagvn_request_handler');

?>
