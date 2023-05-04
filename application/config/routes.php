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
$route['default_controller'] = 'welcome/index';//homepage
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['recommendations'] = 'Welcome/recommendations';//recommendation page

$route['movie']="Welcome/content";//movie page
$route['new_movie']="Welcome/content_all_list";//new movie
$route['upcoming_movie']="Welcome/content_all_list";//upcoming movie
$route['higher_movie']="Welcome/content_all_list";//higher movie
$route['recommended_movie']="Welcome/recommended_content";//recom movie
$route['browse_all_movie']="Welcome/content_all_list";//browse all movei


$route['show']="Welcome/content";//show page
$route['new_show']="Welcome/content_all_list";//new show
$route['upcoming_show']="Welcome/content_all_list";//upcoming show
$route['higher_show']="Welcome/content_all_list";//higher show
$route['recommended_show']="Welcome/recommended_content";//recom show
$route['browse_all_show']="Welcome/content_all_list";//all show





$route['game']="Welcome/content";//show game page
$route['new_game']="Welcome/content_all_list";//new game list
$route['upcoming_game']="Welcome/content_all_list";//upcoming game list
$route['higher_game']="Welcome/content_all_list";//higher game list
$route['recommended_game']="Welcome/recommended_content";//recomment game list
$route['browse_all_game']="Welcome/content_all_list";//all game




$route['book']="Welcome/content";//show book page
$route['new_book']="Welcome/content_all_list";//new book list
$route['upcoming_book']="Welcome/content_all_list";//upcoming book list
$route['higher_book']="Welcome/content_all_list";//higher book list
$route['recommended_book']="Welcome/recommended_content";//recomm book list
$route['browse_all_book']="Welcome/content_all_list";//all book list




$route['display/(:num)']="Welcome/display";//display contnet
$route['display/(:num)/characters']="Welcome/characters";//display characters in content
$route['display/(:num)/staff']="Welcome/staff";//staff in content
$route['display/(:num)/review']="Welcome/review";//comments in content

$route['characters/(:num)/review']="Welcome/charactersreview";//characters review page
$route['staff/(:num)/review']="Welcome/staffreview";//staff review page

$route['studio']="Welcome/studioall";//list of studio
$route['studio/(:num)']="Welcome/studio";//studio 
$route['staff/(:num)']="Welcome/staffshow";//staff show page
$route['characters/(:num)']="Welcome/charactersshow";//show char page
$route['genre/(:any)']="Welcome/genre";//genre
$route['genre']="Welcome/genreall";//list of all genre

$route['notification/(:any)']="Welcome/notification";//all notif
$route['removenotif/(:any)']="Welcome/removenotif";//remove notif
$route['removenotifuser/(:any)']="Welcome/removenotifuser";//remove all notif crom user
$route['addrecom']="Admin/addrecom";//add recom of content



$route['removeusercomment/(:any)']="Admin/removeusercomment";//remove comment

$route['addwatchlist/(:any)/(:any)/(:any)']="Welcome/addwatchlist";//add to watchlist

$route['addwatchedepisodes/(:any)/(:any)/(:any)']="Welcome/addwatchedepisodes";//add number of episodes watched




$route['ratinguserchange/(:any)/content/(:any)/rating/(:any)']="Welcome/ratinguserchange";//change rating in contnet
$route['removerating/(:any)/(:any)']="Welcome/removerating";//remove rating in comment

$route['addcontentcomment/(:any)/userid/(:any)']="Welcome/addcommentContent";//add user comment in contnet
$route['removecommentcontent/(:any)/(:any)']="Welcome/removecommentcontent";//remove user coment in content 


$route['removeuserrecommendation/(:any)']="Admin/removeuserrecommendation";//remove user recommendation


$route['addcharactercontent/(:any)/userid/(:any)']="Welcome/addcharactercontent";//add user comment in char
$route['removecharactercontent/(:any)/(:any)']="Welcome/removecharactercontent";//remove user comment in char

$route['addstaffcontent/(:any)/userid/(:any)']="Welcome/addstaffcontent";//add user comment in staff
$route['removestaffcontent/(:any)/(:any)']="Welcome/removestaffcontent";//remove user comment in staff

$route['addusercommentprofile/(:any)/userid/(:any)']="Admin/addusercommentprofile";//add user comment in user prof
$route['removesprofilecomment/(:any)/(:any)']="Admin/removesprofilecomment";//remove user comment in user profile

$route['forum']="Welcome/forum";//forum main page
$route['forum/public']="Welcome/forum";//public forums
$route['forum/private']="Welcome/forum";//pricate forums

$route['addforum']="Welcome/addforum";//add form based on what is input
$route['deleteforum']="Welcome/modforum";//delete forum, threads and commnets
$route['modforum']="Welcome/modforum";//edit forum data


$route['forum/(:num)']="Welcome/thread";//thread of a forum
$route['forum/(:num)/public']="Welcome/thread";//public thread
$route['forum/(:num)/private']="Welcome/thread";//private thread


$route['addthread/(:num)']="Welcome/addthread";//add thread to a forum
$route['deletethread']="Welcome/modthread";//delete thread
$route['modthread']="Welcome/modthread";//mod thread info


$route['forum/thread/(:num)']="Welcome/threadinside";//comments of a threa


$route['removecommentforum/(:any)/(:any)']="Welcome/removecommentforum";//remove user comments
$route['addthreadcomment/(:num)']="Welcome/addthreadcomment";//user leave comments
$route['removecommentforum/(:any)/(:any)']="Welcome/removecommentforum";//remove user comments using admin


$route['profile/(:num)']="Login/profile";//see profile
$route['profile/(:num)/list/(:num)']="Login/profilelist";//watchlist in profile
$route['adminpanel']="Admin/adminpanel";//admin panel


$route['profile/(:num)/following']="Login/following";//following page
$route['profile/(:num)/followers']="Login/follower";//followers oage

$route['profile/(:num)/rating']="Admin/rating";//user ratings
$route['profile/(:num)/customlist']="Admin/customlist";//custom list page

$route['login']="Login/index";//login page
$route['login_enter']="Login/user_login_process";//allow login
$route['logout']="Login/logout";//allow logout
$route['register']="Login/user_registration_show";//register page
$route['new_user_registration']="Login/new_user_registration";//registe user using info

$route['profile/(:num)/comments']="Login/comment";//see comments in profile
$route['profile/(:num)/recommendations']="Admin/recommendations";//see user recommentdation
$route['profile/(:num)/comments/(:num)']="Login/comment";//see commetn

$route['profile/(:num)/liked']="Login/liked";//liked list
$route['profile/(:num)/liked/(:num)']="Login/likednumber";//type of liked


$route['profile/(:num)/disliked']="Login/disliked";//disliked list
$route['profile/(:num)/disliked/(:num)']="Login/dislikednumber";//type of disliked



$route['addlikedcharacter/(:num)']="Welcome/likedcharacter";//like a char
$route['removelikedcharacter/(:num)']="Welcome/removelikedcharacter";//remove a char like
$route['adddislikedcharacter/(:num)']="Welcome/likedcharacter";//dislike char
$route['removedilikedcharacter/(:num)']="Welcome/removelikedcharacter";//remove dislike char from list


$route['addlikedstaff/(:num)']="Welcome/likedstaff";//like staff
$route['removelikedstaff/(:num)']="Welcome/removelikedstaff";//remove a staff like
$route['adddislikedstaff/(:num)']="Welcome/likedstaff";//dislike staff
$route['removedilikedstaff/(:num)']="Welcome/removelikedstaff";//remove dislike staff from list


$route['addlikedcontent/(:num)']="Welcome/likedcontent";//like content
$route['removelikedcontent/(:num)']="Welcome/removelikedcontent";//remove a content like
$route['adddislikedcontent/(:num)']="Welcome/likedcontent";//dislike content
$route['removedilikedcontent/(:num)']="Welcome/removelikedcontent";//remove dislike content from list

$route['addlikedstudio/(:num)']="Welcome/likedstudio";//like stud
$route['removelikedstudio/(:num)']="Welcome/removelikedstudio";//remove a stud like
$route['adddislikedstudio/(:num)']="Welcome/likedstudio";//dislike stud
$route['removedilikedstudio/(:num)']="Welcome/removelikedstudio";//remove dislike stud from list


$route['addlikedgenre/(:num)']="Welcome/likedgenre";//like genre
$route['removelikedgenre/(:num)']="Welcome/removelikedgenre";//remove a genre like
$route['adddislikedgenre/(:num)']="Welcome/likedgenre";//dislike genre
$route['removedilikedgenre/(:num)']="Welcome/removelikedgenre";//remove dislike genre from list



$route['addlikeduser/(:num)']="Login/likeduser";//like user
$route['removelikeduser/(:num)']="Login/removelikeduser";//remove a user like
$route['adddislikeduser/(:num)']="Login/likeduser";//dislike user
$route['removedilikeduser/(:num)']="Login/removelikeduser";//remove dislike user from list


//inside the admin page
$route['add_user']="Admin/add_user";//ad user page
$route['userDetails']="Admin/userDetails";//user info
$route['edit_user']="Admin/edit_user";//redirect to user page
$route['mod_user']="Admin/mod_user";//change info on a user
$route['update_user']="Admin/update_user";//change info on a user
$route['remove_user']="Admin/remove_user";//remove the user
$route['add_user_db']="Admin/add_user_db";//add user from admin page


$route['add_staff']="Admin/add_staff";//add staff page
$route['edit_staff']="Admin/edit_staff";//edit staff page
$route['add_staff_db']="Admin/add_staff_db";//add staff to databae
$route['mod_staff']="Admin/mod_staff";//edit staff info
$route['remove_staff']="Admin/remove_staff";//remove staff from db



$route['add_characters']="Admin/add_characters";//add char page
$route['edit_characters']="Admin/edit_characters";//edit char page
$route['add_characters_db']="Admin/add_characters_db";//add char to databae
$route['mod_character']="Admin/mod_character";//edit char info
$route['remove_character']="Admin/remove_character";//remove char from db


$route['add_genre']="Admin/add_genre";//add genre page
$route['edit_genre']="Admin/edit_genre";//edit genre page
$route['add_genre_db']="Admin/add_genre_db";//add genre to databae
$route['mod_genre']="Admin/mod_genre";//edit genre info
$route['remove_genre']="Admin/remove_genre";//remove genre from db

$route['add_studio']="Admin/add_studio";//add stud page
$route['edit_studio']="Admin/edit_studio";//edit stud page
$route['add_studio_db']="Admin/add_studio_db";//add stud to databae
$route['mod_studio']="Admin/mod_studio";//edit stud info
$route['remove_studio']="Admin/remove_studio";//remove stud from db


$route['newcustomlist/(:num)']="Admin/newcustomlist";//add user from admin page

$route['userinfo']="Admin/admindetails";//fetch user info
$route['admin_user_registration']="Admin/admin_user_registration";//register an admin

$route['supportform']="Admin/supportform";//view support forms
$route['supportformuser']="Admin/supportformuser";//view forms from user
$route['addSupportTicket']="Admin/addSupportTicket";//add a suport ticket



$route['additemlist/(:num)/(:num)']="Admin/addToList";//add to custom list
$route['removeitemlist/(:num)/(:num)']="Admin/removeitemlist";//remove from custom list
$route['profile/(:num)/notifications']="Admin/notifications";//see notifications

$route['add_notification']="Admin/add_notification";//add notif page
$route['edit_notification']="Admin/notifications";//edit notif page

$route['add_not_db']="Admin/add_not_db";//add notif to db
$route['mod_not']="Admin/mod_not";//change notif




$route['profile/(:num)/forms']="Admin/forms";// see foms submiter

$route['removeTicket/(:num)']="Admin/removeTicket";//remove ticket but not delete from db
$route['deleteTicket/(:num)']="Admin/deleteTicket";//delete from databas
$route['report/(:num)']="Admin/report";//report use



$route['follow/(:num)']="Admin/follow";//follow user
$route['unfollow/(:num)']="Admin/unfollow";//unfollow user


$route['block/(:num)']="Admin/block";//block user
$route['unblock/(:num)']="Admin/unblock";//unblock user

$route['deletelist/(:num)']="Admin/deleteList";//delte custom list


$route['publiclist/(:num)']="Admin/publicList";//make custom list public
$route['privatelist/(:num)']="Admin/privateList";//make custom list private

$route['publicprofile/(:num)']="Admin/publicprofile";//make profile public
$route['privateprofile/(:num)']="Admin/privateprofile";//make profile private

$route['removefromlist/(:num)/(:num)']="Admin/removeFromList";//remove from watchlist

$route['profile/(:num)/movielist']="Admin/allListUser";//show watchlist of movies
$route['profile/(:num)/movielist/(:num)']="Admin/allListUser";//show watchlist of movies state


$route['profile/(:num)/showlist']="Admin/allListUser";//show watchlist of shows
$route['profile/(:num)/showlist/(:num)']="Admin/allListUser";//show watchlist of shows state

$route['profile/(:num)/gamelist']="Admin/allListUser";//show watchlist of games
$route['profile/(:num)/gamelist/(:num)']="Admin/allListUser";//show watchlist of games state

$route['profile/(:num)/booklist']="Admin/allListUser";//show watchlist of books
$route['profile/(:num)/booklist/(:num)']="Admin/allListUser";//show watchlist of books state




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




