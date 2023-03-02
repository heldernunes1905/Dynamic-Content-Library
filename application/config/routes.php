<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['movie']="Welcome/movie";
$route['show']="Welcome/show";
$route['game']="Welcome/game";
$route['display/(:num)']="Welcome/display";
$route['display/(:num)/characters']="Welcome/characters";
$route['display/(:num)/staff']="Welcome/staff";
$route['studio/(:num)']="Welcome/studio";
$route['staff/(:num)']="Welcome/staffshow";
$route['characters/(:num)']="Welcome/charactersshow";
$route['display/genre/(:any)']="Welcome/genre";
$route['notification/(:any)']="Welcome/notification";
$route['removenotif/(:any)']="Welcome/removenotif";



$route['ratinguserchange/(:any)/content/(:any)/rating/(:any)']="Welcome/ratinguserchange";
$route['removerating/(:any)/(:any)']="Welcome/removerating";

$route['addcontentcomment/(:any)/userid/(:any)']="Welcome/addcommentContent";
$route['removecommentcontent/(:any)/(:any)']="Welcome/removecommentcontent";

$route['addcharactercontent/(:any)/userid/(:any)']="Welcome/addcharactercontent";
$route['removecharactercontent/(:any)/(:any)']="Welcome/removecharactercontent";

$route['addstaffcontent/(:any)/userid/(:any)']="Welcome/addstaffcontent";
$route['removestaffcontent/(:any)/(:any)']="Welcome/removestaffcontent";

$route['addusercommentprofile/(:any)/userid/(:any)']="Admin/addusercommentprofile";
$route['removesprofilecomment/(:any)/(:any)']="Admin/removesprofilecomment";

$route['book']="Welcome/book";
$route['forum']="Welcome/forum";
$route['profile/(:num)']="Login/profile";
$route['profile/(:num)/list/(:num)']="Login/profilelist";

$route['profile/(:num)/following']="Login/following";
$route['profile/(:num)/followers']="Login/follower";

$route['profile/(:num)/rating']="Admin/rating";
$route['profile/(:num)/customlist']="Admin/customlist";

$route['login']="Login/index";
$route['login_enter']="Login/user_login_process";
$route['logout']="Login/logout";
$route['register']="Login/user_registration_show";
$route['new_user_registration']="Login/new_user_registration";

$route['profile/(:num)/comments']="Login/comment";


//inside the admin page
$route['add_user']="Admin/add_user";
$route['userDetails']="Admin/userDetails";

$route['edit_user']="Admin/edit_user";//redirect to user page
$route['mod_user']="Admin/mod_user";//change info on a user
$route['update_user']="Admin/update_user";//change info on a user
$route['remove_user']="Admin/remove_user";//remove the user
$route['add_user_db']="Admin/add_user_db";//add user from admin page
$route['userinfo']="Admin/admindetails";//fetch user info
$route['admin_user_registration']="Admin/admin_user_registration";
$route['supportform']="Admin/supportform";
$route['additemlist/(:num)/(:num)']="Admin/addToList";
$route['removeitemlist/(:num)/(:num)']="Admin/removeitemlist";
$route['profile/(:num)/notifications']="Admin/notifications";


$route['follow/(:num)']="Admin/follow";
$route['unfollow/(:num)']="Admin/unfollow";
$route['deletelist/(:num)']="Admin/deleteList";


$route['publiclist/(:num)']="Admin/publicList";
$route['privatelist/(:num)']="Admin/privateList";

$route['publicprofile/(:num)']="Admin/publicprofile";
$route['privateprofile/(:num)']="Admin/privateprofile";

$route['removefromlist/(:num)/(:num)']="Admin/removeFromList";

$route['profile/(:num)/movielist']="Admin/allListUser";
$route['profile/(:num)/movielist/(:num)']="Admin/allListUser";


$route['profile/(:num)/showlist']="Admin/allListUser";
$route['profile/(:num)/showlist/(:num)']="Admin/allListUser";

$route['profile/(:num)/gamelist']="Admin/allListUser";
$route['profile/(:num)/gamelist/(:num)']="Admin/allListUser";

$route['profile/(:num)/booklist']="Admin/allListUser";
$route['profile/(:num)/booklist/(:num)']="Admin/allListUser";




$route['add_image']="Admin/add_image";//page for adding an image
$route['edit_image']="Admin/edit_image";//page for editing an image
$route['imgDetails']="Admin/imgDetails";//get img details
$route['do_upload']="Admin/do_upload";//uploading the img
$route['upload_new_avatar/(:num)']="Admin/upload_new_image";//changing user avatar
$route['upload_new_banner/(:num)']="Admin/upload_new_banner";//changing user avatar

$route['remove_img']="Admin/remove_img";//remove the image
$route['mod_img']="Admin/mod_img";//change info on an image
$route['my_image']="Admin/my_image";//User can see his images


$route['user_info']="Admin/admin_info";//edit user info
$route['notifications']="Admin/notifications";




