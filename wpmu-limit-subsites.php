<?php
/**
 * Plugin Name: WPMU Limit Subsites
 * Description: WordPress Multisite - only allow one site per user.
 * Author: Jason Jersey
 * Version: 1.0
 */

function wpmu_limit_subsites($active_signup) {

    /* get the array of the current user's blogs */
    $blogs = get_blogs_of_user( get_current_user_id() );

    /* all users may be members of blog 1 so don't count it */
	if ($blogs["1"]) unset($blogs["1"]);

    /* if the user still has blogs, disable signup else continue with existing active_signup rules */
    $n = count($blogs);

    if($n == 1) {

        $active_signup = 'none';
        echo '';

    } elseif($n > 1) {
    
        $active_signup = 'none';
        echo '';

    } else {

        $active_signup = $active_signup;

    }
    return $active_signup; /* return "all", "none", "blog" or "user" */

}
add_filter('wpmu_active_signup', 'wpmu_limit_subsites');
