<?php
/**
 * Plugin Name: Bbpress Login Register Links On Forum Topic Pages
 * Plugin URI:  http://tomas.zhu.bz/bbpress-plugin-bbpress-login-register-links-on-forum-page-and-topic.html/
 * Description: Add bbpress login link, register links, on forum pages or topic pages so users can use our forums more easier. Any feature request is welcome to support to our <a href='http://tomas.zhu.bz/forums/forum/bbpress-notification-plugin-support/'>Support Forum</a>, like our plugin? <a href='https://wordpress.org/support/view/plugin-reviews/bbpress-login-register-links-on-forum-topic-pages/'>Submit a review</a>
 * Author:      Tomas Zhu
 * Author URI:  http://tomas.zhu.bz
 * Version:     1.1.0
 */
function bbpressLoginRegisterLinksOnForumPage()
{
	echo '<div class="bbpressloginlinks" style="float:right;padding-right:20px;">';
	if ( !is_user_logged_in() )
	{
		$login_url = site_url( 'wp-login.php' );
		echo "<a href='$login_url'>".' Log In '.'</a> ';

		$register_url = site_url( 'wp-login.php?action=register' );
		echo " <a href='$register_url' style='margin-left:20px;'>".' Register '.'</a> ';
		
		$lost_password_url = site_url( 'wp-login.php?action=lostpassword' );
		echo " <a href='$lost_password_url' style='margin-left:20px;'>".' Lost Password '.'</a> ';
	}
	else 
	{
		$logout_url = wp_logout_url( get_permalink() );
		echo "<a href='$logout_url'>".' Log Out'.'</a> ';
	}
	echo '</div>'; // class of "bbpressloginlinks"
}
add_action('bbp_template_after_forums_loop','bbpressLoginRegisterLinksOnForumPage'); 
add_action('bbp_template_before_pagination_loop','bbpressLoginRegisterLinksOnForumPage'); 
add_action('bbp_template_after_single_forum','bbpressLoginRegisterLinksOnForumPage'); 
add_action('bbp_template_before_forums_loop','bbpressLoginRegisterLinksOnForumPage'); 
?>