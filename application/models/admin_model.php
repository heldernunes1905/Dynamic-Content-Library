<?php
class admin_model extends CI_Model
{


    // Insert registration data in database
    public function registration_insert($data)
    {
        // Query to check whether username already exist or not
        $condition = ['email' => $data['email'], 'username' => $data['username']];
        $this->db->select('*');
        $this->db->from('users');
        $this->db->or_where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {

            // Query to insert data in database
            $this->db->insert('users', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }
    public function getUsers()
    {
        $query = $this->db->get('users');
        return $query->result();
    }
    public function getimg()
    {
        $query = $this->db->get('content');
        return $query->result();
    }
    public function getownimg($iduser){
       $this->db->select('*');
        $this->db->from('sticks');
        $this->db->join('user_login', 'user_login.id = sticks.idUser');
        $this->db->where('idUser',$iduser);
        $query = $this->db->get();
        $response = $query->result_array();
        return $response;
    }

    public function getsupportforms(){
        $this->db->select('supportform.*,users.username, users.user_id');
         $this->db->from('supportform');
         $this->db->join('users', 'supportform.user_id=users.user_id');
         //$this->db->where('idUser',$iduser);
         $query = $this->db->get();
         $response = $query->result_array();
         return $response;
     }

    public function remove_user($id)
    {

        $this->db->delete('users', array('user_id' => $id));
        header("Location: http://localhost/CodeIgniter-3.1.10/index.php/edit_user");
    }
    public function remove_img($id)
    {

        $this->db->delete('content', array('contentId' => $id));
        header("Location: http://localhost/CodeIgniter-3.1.10/index.php/edit_image");
    }
    public function edit_user($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username',$id['username']);
        $query = $this->db->get();
        $response = $query->result_array();

        if(!empty($response)){
            return 1;
        }else{
            $this->db->where('user_id', $id['user_id']);
            $this->db->update('users', $id);
            return 2;
        }
        
    }

    public function updateUserList($list_id,$content_id,$type)
    {

        $this->db->select('content_id');
        $this->db->from('lists');
        $this->db->or_where('list_id='.$list_id);
        $query = $this->db->get();

        $result = $query->result_array();
        $arraydata = implode(',',$result[0]);
        $listcomplete = $arraydata.",".$content_id;

        if($type == 1){
            
            $listcomplete = str_replace(",$content_id", "", $listcomplete);
        }
        $this->db->set('content_id', $listcomplete);
            $this->db->where('list_id', $list_id);
            $this->db->update('lists');
        
    }

    public function removeFromList($list_id,$content_id)
    {

        $this->db->select('content_id');
        $this->db->from('lists');
        $this->db->or_where('list_id='.$list_id);
        $query = $this->db->get();
        $result = $query->result_array();
        $arraydata = implode(',',$result[0]);

        $followlist = explode(",",$arraydata);

        if (($key = array_search($content_id, $followlist)) !== false) {
            unset($followlist[$key]);
        }

        $newlist = implode(',',$followlist);

        $this->db->set('content_id', $newlist);
        $this->db->where('list_id', $list_id);
        $this->db->update('lists');
    }

    public function followUser($profile_id,$user_id)
    {

        $this->db->select('user_like');
        $this->db->from('userpreferences');
        $this->db->or_where('user_id='.$user_id);
        $query = $this->db->get();
        $result = $query->result_array();
        if(empty($result)){
            $object = array(
                'user_id' => $user_id,
                'user_like' => $profile_id,
                'like_state' => 1
        );
        $this->db->insert('userpreferences', $object);
        }else{
            $arraydata = implode(',',$result[0]);

            $list = $arraydata.",".$profile_id;
    
            $this->db->set('user_like', $list);
            $this->db->where('user_id', $user_id);
            $this->db->update('userpreferences');
        }
        
    }

    public function unfollowUser($profile_id,$user_id)
    {

        $this->db->select('user_like');
        $this->db->from('userpreferences');
        $this->db->or_where('user_id='.$user_id);
        $query = $this->db->get();
        $result = $query->result_array();
        $arraydata = implode(',',$result[0]);

        $followlist = explode(",",$arraydata);

        if (($key = array_search($profile_id, $followlist)) !== false) {
            unset($followlist[$key]);
        }

        $newlist = implode(',',$followlist);

        $this->db->set('user_like', $newlist);
        $this->db->where('user_id', $user_id);
        $this->db->update('userpreferences');
    }

    public function edit_image($id)
    {
        $this->db->where('contentId', $id['contentId']);
        $this->db->update('content', $id);
    }
    
    public function add_image($info)
    {
        $this->db->insert('content', $info);
    }

    public function change_avatar($user_id,$avatar)
    {
        $this->db->set('avatar', $avatar);
        $this->db->where('user_id', $user_id);
        $this->db->update('users');    
    }

    public function change_banner($user_id,$banner)
    {
        $this->db->set('profile_banner', $banner);
        $this->db->where('user_id', $user_id);
        $this->db->update('users');    
    }

    function getUserDetails($postData = array())
    {

        $response = array();

        if (isset($postData['id'])) {

            // Select record
            $this->db->select('*');
            $this->db->where('id', $postData['id']);
            $records = $this->db->get('user_login');
            $response = $records->result_array();
        }

        return $response;
    }
    function getimgDetails($postData = array())
    {

        $response = array();
        if (isset($postData['id_stick'])) {

            $this->db->select('*');
            $this->db->from('sticks');
            $this->db->join('user_login', 'user_login.id = sticks.idUser');
            $query = $this->db->get();
            $response = $query->result_array();

        }

        return $response;
    }

    

    function getallnotification($id)
    {
        $response = array();
        $query = $this->db->query("SELECT notification.*, users.*
        FROM notification
        INNER JOIN users
        ON notification.user_id=users.user_id");
        $response = $query->result();

        return $response;
    }

    //this only gets the lists from the user, it will show the one item as the main img of the list and when user clicks it it will send to another page that will display the list itself
    function getProfileList($id)
    {
        $response = array();
        $query = $this->db->query("SELECT lists.list_id,lists.title,lists.list_public, content.images, lists.image  FROM lists  INNER JOIN users ON lists.user_id= users.user_id  INNER JOIN content ON lists.content_id=content.contentId WHERE users.user_id = $id AND lists.list_type = 5");
        $response = $query->result();

        return $response;
    }

    function getContentLike($id)
    {
        $response = array();
        $query = $this->db->query("SELECT content_like FROM userpreferences WHERE user_id = $id");
        $contentliked = $query->result();
        $content = array();

        foreach($contentliked as $like){
            $contentLikeId = explode(',', $like->content_like);
            foreach($contentLikeId as $contentId){
                $query = $this->db->query("SELECT contentId, title, images, altImg FROM content WHERE contentId = $contentId");
                $contentInfo = $query->result();
                array_push($content, $contentInfo);
            }
            
        }
        return $content;
    }

    function getGenreLike($id)
    {
        $response = array();
        $query = $this->db->query("SELECT genre_like FROM userpreferences WHERE user_id = $id");
        $genreliked = $query->result();
        $content = array();

        foreach($genreliked as $like){
            $genrelikedId = explode(',', $like->genre_like);
            foreach($genrelikedId as $genreId){
                $query = $this->db->query("SELECT * FROM genre WHERE genre_id = $genreId");
                $contentInfo = $query->result();
                array_push($content, $contentInfo);
            }
            
        }
        return $content;
    }
    
    function getCharacterLike($id)
    {
        $response = array();
        $query = $this->db->query("SELECT character_like FROM userpreferences WHERE user_id = $id");
        $characterliked = $query->result();
        $content = array();

        foreach($characterliked as $like){
            $characterlikedId = explode(',', $like->character_like);
            foreach($characterlikedId as $characterId){
                $query = $this->db->query("SELECT * FROM characters WHERE character_id = $characterId");
                $contentInfo = $query->result();
                array_push($content, $contentInfo);
            }
            
        }
        return $content;
    }

    function getStudioLike($id)
    {
        $response = array();
        $query = $this->db->query("SELECT studio_like FROM userpreferences WHERE user_id = $id");
        $studioliked = $query->result();
        $content = array();

        foreach($studioliked as $like){
            $studiolikedId = explode(',', $like->studio_like);
            foreach($studiolikedId as $studioId){
                $query = $this->db->query("SELECT * FROM studio WHERE studio_id = $studioId");
                $contentInfo = $query->result();
                array_push($content, $contentInfo);
            }
            
        }
        return $content;
    }

    function getStaffLike($id,$staff_type,$like_type)
    {
        $response = array();
        switch($like_type){
            case 1:
                $query = $this->db->query("SELECT content_like FROM userpreferences WHERE user_id = $id");
                $liked = $query->result();
                if(empty($liked[0]->content_like)){
                    return;
                }
                break;
            case 2:
                $query = $this->db->query("SELECT genre_like FROM userpreferences WHERE user_id = $id");
                $liked = $query->result();
                if(empty($liked[0]->genre_like)){
                    return;
                }
                break;
            case 3:
                $query = $this->db->query("SELECT character_like FROM userpreferences WHERE user_id = $id");
                $liked = $query->result();
                if(empty($liked[0]->character_like)){
                    return;
                }
                break;
            case 4:
                $query = $this->db->query("SELECT studio_like FROM userpreferences WHERE user_id = $id");
                $liked = $query->result();
                if(empty($liked[0]->studio_like)){
                    return;
                }
                break;
            case 5:
                switch($staff_type){
                    case 1:
                        $query = $this->db->query("SELECT producer_like FROM userpreferences WHERE user_id = $id");
                        $liked = $query->result();
                        if(empty($liked[0]->producer_like)){
                            return;
                        }
                        break;
                    case 2:
                        $query = $this->db->query("SELECT writer_like FROM userpreferences WHERE user_id = $id");
                        $liked = $query->result();
                        if(empty($liked[0]->writer_like)){
                            return;
                        }
                        break;
                    case 3:
                        $query = $this->db->query("SELECT actor_like FROM userpreferences WHERE user_id = $id");
                        $liked = $query->result();
                        if(empty($liked[0]->actor_like)){
                            return;
                        }
                        break;
                    
                }
        }

        foreach($liked as $like){
            switch($like_type){
                case 1:
                    $likedId = explode(',', $like->content_like);
                    break;
                case 2:
                    $likedId = explode(',', $like->genre_like);
                    break;
                case 3:
                    $likedId = explode(',', $like->character_like);
                    break;
                case 4:
                    $likedId = explode(',', $like->studio_like);
                    break;
                case 5:
                    switch($staff_type){
                        case 1:
                            $likedId = explode(',', $like->producer_like);
                            break;
                        case 2:
                            $likedId = explode(',', $like->writer_like);
                            break;
                        case 3:
                            $likedId = explode(',', $like->actor_like);
                            break;
                        
                    }
            }
            $content = array();
            foreach($likedId as $likeId){
                switch($like_type){
                    case 1:
                        $query = $this->db->query("SELECT contentId, title, images, altImg FROM content WHERE contentId =".$likeId);
                        break;
                    case 2:
                        $query = $this->db->query("SELECT * FROM genre WHERE genre_id = $likeId");
                        break;
                    case 3:
                        $query = $this->db->query("SELECT * FROM characters WHERE character_id = $likeId");
                        break;
                    case 4:
                        $query = $this->db->query("SELECT * FROM studio WHERE studio_id = $likeId");
                        break;
                    case 5:
                        $query = $this->db->query("SELECT * FROM staff WHERE staff_id = $likeId AND staff_type=$staff_type");
                        break;
                }
                $contentInfo = $query->result();
                array_push($content, $contentInfo);
            }
        }
        return $content;
    }
    
    function getCommentsProfile($id,$all)
    {
        $response = array();
        $query = $this->db->query("SELECT comments.* FROM comments INNER JOIN users ON comments.profile_id=users.user_id WHERE profile_id = $id AND profile_type = 1 AND comment_type = 1");
        $comments = $query->result();

        foreach($comments as $userid){
            $query = $this->db->query("SELECT username,avatar FROM users WHERE user_id = $userid->user_id");
            $users = $query->result();
            $userid->{"username"} = $users[0]->username;
            $userid->{"avatar"} = $users[0]->avatar;
        }


        $i = 0;
        foreach($comments as $cl){
            foreach($all as $li){
                    if($cl->comment_id == $li->comment_id){
                            unset($comments[$i]);

                    }
            }
            $i++;
    }

    return $comments;
    }

    function personalcommentprofile($profile_id,$user_id)
    {
        $response = array();
        $query = $this->db->query("SELECT comments.* FROM comments INNER JOIN users ON comments.profile_id= users.user_id WHERE profile_id = $profile_id AND comments.user_id = $user_id AND profile_type = 1 AND comment_type = 1");
        $comments = $query->result();
        
        foreach($comments as $userid){
            $query = $this->db->query("SELECT username,avatar FROM users WHERE user_id = $userid->user_id");
            $users = $query->result();
            $userid->{"username"} = $users[0]->username;
            $userid->{"avatar"} = $users[0]->avatar;
        }
        
        return $comments;
    }

    public function addprofilecomment($user_id,$profile_id,$comment)
        {
                if($comment == "fwhyalhiçufoijj3qop9e4u018rhoirFHUAUIFLfkfkuNKUWKNUewcuknec"){
                        $this->db->where('user_id', $user_id);
                        $this->db->where('profile_id', $profile_id);
                        $this->db->where('profile_type', 1);

                        $this->db->delete('comments');
                        return;
                }

                $query = $this->db->query("SELECT users.user_id, comments.* FROM comments INNER JOIN users ON comments.profile_id=users.user_id WHERE comments.profile_id = $profile_id AND comments.profile_type = 1 AND comments.user_id=$user_id");
                $contentquery = $query->result();
                date_default_timezone_set('Europe/Lisbon');

                var_dump($contentquery);
                if(!empty($contentquery)){
                        $this->db->set('comment', $comment);
                        $this->db->set('date', date('Y-m-d H:i:s'));
                        $this->db->where('user_id', $user_id);
                        $this->db->where('profile_id', $profile_id);
                        $this->db->update('comments');                
                }else{
                        $object = array(
                                'user_id' => $user_id,
                                'comment_title' => 'afsaf',
                                'profile_id' => $profile_id,
                                'profile_type' => 1,
                                'comment_type' => 1,
                                'comment' => $comment,
                                'date' => date('Y-m-d H:i:s')
                        );
                        $this->db->insert('comments', $object);
                }
        }

    function deleteList($listid){
        $this->db->where('list_id', $listid);
        $this->db->delete('lists');
    }


    function getProfileState($id)
    {
        $query = $this->db->query("SELECT * FROM users WHERE user_id = $id");
        $state = $query->result();
       
        return $state;
    }

    function getFollow($id)
    {
        $follows = array();
        $follower = 0;
        $query = $this->db->query("SELECT user_like FROM userpreferences WHERE user_id = $id AND like_state = 1");
        $followers = $query->result();
        if(empty($followers[0]->user_like)){
            $followercount = 0;
        }else{
            $followercount = explode(',', $followers[0]->user_like);
            $followercount = count($followercount);
        }
        $query = $this->db->query("SELECT user_like FROM userpreferences WHERE like_state = 1");
        $following = $query->result();
        if(empty($following[0]->user_like)){
            $follower = 0;
        }else{
            foreach($following as $f){
                $followingcount = explode(',', $f->user_like);
                foreach($followingcount as $fc){
                    if($fc == $id){
                        $follower++;
                    }
                }
            }
        }
        array_push($follows,$followercount,$follower);
        
        return $follows;
    }

    function getFollows($id,$type)
    {
        $follows = array();
        $query = $this->db->query("SELECT user_like FROM userpreferences WHERE user_id = $id");
        $followers = $query->result();
        if(empty($followers)){
            $followercount = array(2,3);
        }else
        $followercount = explode(',', $followers[0]->user_like);
        if(empty($followers[0]->user_like)){
            return;
        }
        if($type == 0){
            foreach($followercount as $fc){
                $query = $this->db->query("SELECT user_id,username,avatar FROM users WHERE user_id = $fc");
                $result = $query->result();
                array_push($follows,$result);
            }
        }else{
            $query = $this->db->query("SELECT user_id,user_like FROM userpreferences WHERE like_state = 1 ");
            $following = $query->result();
            foreach($following as $f){
                $followingcount = explode(',', $f->user_like);
                foreach($followingcount as $fc){
                    if($fc == $id){
                        $query = $this->db->query("SELECT user_id,username,avatar FROM users WHERE user_id = $f->user_id;");
                        $result = $query->result();
                        foreach($followercount as $foll){
                            foreach($result as $folls){
                                if($foll == $folls->user_id){
                                    $folls->{"following"} = 1;
                                }
                            }
                        }
                        array_push($follows,$result);
                    }
                }
               
            }
            
        }
        
        return $follows;
    }

    function followprofile($id,$profile_id)
    {
        $follows = array();
        $query = $this->db->query("SELECT user_like FROM userpreferences WHERE user_id = $id");
        $followers = $query->result();
        $followfound = 0;
        if(!empty($followers)){
            $followprofile = explode(',', $followers[0]->user_like);
            $followfound = 0;
    
            if (($key = array_search($profile_id, $followprofile)) !== false) {
                $followfound = $followprofile[$key];
            }
        }
        
        return $followfound;
    }

    //show content inside a list made by a user
    function getListContent($id,$list_id){
        $query = $this->db->query("SELECT content_id FROM lists WHERE user_id=$id AND list_id=$list_id");
        $character_collumn = $query->result();  
        $genre_total = $query->result();
                $i = 0;
                $genrestdif = array();
                $genrest = array();
        foreach($character_collumn as $test){
            $content = array();
            $mycharacter = explode(',', $test->content_id);
            foreach($mycharacter as $myc){
                $query = $this->db->query("SELECT content.contentId,genrecontent.genre_id FROM genrecontent INNER JOIN content ON genrecontent.content_id=content.contentId WHERE genrecontent.content_id=$myc");
                array_push($genrestdif,$query->result());
            }
            $rating_counter = 0;
            foreach($genrestdif as $genres){
                $differentGenres = array();
                $putGenre = array();
                $store = "";
                $genre_total = $genres[0]->genre_id;
                $myArray = explode(',', $genre_total);
                $query = $this->db->query("SELECT content.*,genre.name FROM genrecontent INNER JOIN content ON genrecontent.content_id=content.contentId INNER JOIN genre ON genrecontent.genre_id= genre.genre_id WHERE genrecontent.content_id =". $genres[0]->contentId);
                
                $contentquery = $query->result();
                
                $query = $this->db->query("SELECT personalrating.user_rating
                FROM personalrating 
                INNER JOIN users ON personalrating.user_id= users.user_id 
                INNER JOIN content ON personalrating.content_id=content.contentId
                WHERE personalrating.content_id = ".$contentquery[0]->contentId.
                " AND users.user_id =".$id
                );
                $rating_column = $query->result();
                if(empty($rating_column)){
                    $rated = "Not rated";
                    array_push($contentquery,$rated);  

                }else{
                    $rated = $rating_column[0]->user_rating;
                    array_push($contentquery,$rated);  

                }

                if(strpos($genre_total,",") !== false){
                        array_push($content,$contentquery);  
                                                      
                        foreach($myArray as $genre){
                                $querygenre = $this->db->query("SELECT genre.name from genre WHERE genre.genre_id=".$genre);   
                                array_push($differentGenres,$querygenre->result());
                        }
                        foreach($differentGenres as $test){
                                array_push($putGenre,$test[0]->name);
                        }
                        $myArray = implode(",", $putGenre);
                        $content[$i][0]->name = $myArray;
                }else{                   
                        array_push($content,$contentquery);
                }

                $i++;
            }
        }
        return $content;
    }

    //show content inside a list made by a user
    function getProfileContentList($id,$type,$state){
        if($state == 0){
            $query = $this->db->query("SELECT content_id FROM lists WHERE user_id=$id AND list_type = $type");

        }else{
            $query = $this->db->query("SELECT content_id FROM lists WHERE user_id=$id AND list_type = $type AND list_state = $state");

        }
        $character_collumn = $query->result(); 
        if(empty($character_collumn)){
            return;
        } 
        $genre_total = $query->result();
                $i = 0;
                $genrestdif = array();
                $genrest = array();
        foreach($character_collumn as $test){
            $content = array();
            $mycharacter = explode(',', $test->content_id);
            foreach($mycharacter as $myc){
                $query = $this->db->query("SELECT content.contentId,genrecontent.genre_id FROM genrecontent INNER JOIN content ON genrecontent.content_id=content.contentId WHERE genrecontent.content_id=$myc");
                array_push($genrestdif,$query->result());
            }
            $rating_counter = 0;
            foreach($genrestdif as $genres){
                $differentGenres = array();
                $putGenre = array();
                $store = "";
                $genre_total = $genres[0]->genre_id;
                $myArray = explode(',', $genre_total);
                $query = $this->db->query("SELECT content.*,genre.name FROM genrecontent INNER JOIN content ON genrecontent.content_id=content.contentId INNER JOIN genre ON genrecontent.genre_id= genre.genre_id WHERE genrecontent.content_id =". $genres[0]->contentId);
                
                $contentquery = $query->result();
                
                $query = $this->db->query("SELECT personalrating.user_rating
                FROM personalrating 
                INNER JOIN users ON personalrating.user_id= users.user_id 
                INNER JOIN content ON personalrating.content_id=content.contentId
                WHERE personalrating.content_id = ".$contentquery[0]->contentId.
                " AND users.user_id =".$id
                );
                $rating_column = $query->result();
                if(empty($rating_column)){
                    $rated = "Not rated";
                    array_push($contentquery,$rated);  

                }else{
                    $rated = $rating_column[0]->user_rating;
                    array_push($contentquery,$rated);  

                }

                if(strpos($genre_total,",") !== false){
                        array_push($content,$contentquery);  
                                                      
                        foreach($myArray as $genre){
                                $querygenre = $this->db->query("SELECT genre.name from genre WHERE genre.genre_id=".$genre);   
                                array_push($differentGenres,$querygenre->result());
                        }
                        foreach($differentGenres as $test){
                                array_push($putGenre,$test[0]->name);
                        }
                        $myArray = implode(",", $putGenre);
                        $content[$i][0]->name = $myArray;
                }else{                   
                        array_push($content,$contentquery);
                }

                $i++;
            }
        }
        return $content;
    }


    //type is the type like movie,show and this will show the contents from a list like movie watchlist
    function getListUser($id,$list_id,$type){
        $query = $this->db->query("SELECT content_id FROM lists WHERE user_id=$id AND list_id=$list_id");
        $character_collumn = $query->result();  
        foreach($character_collumn as $test){
            $content = array();
            $mycharacter = explode(',', $test->content_id);
            foreach($mycharacter as $myc){
                $query = $this->db->query("SELECT * FROM content WHERE contentId=$myc AND content_type='$type'");
                array_push($content,$query->result());
            }
        }
    }

    //type is the type like movie,show and this will show the contents from a list like movie watchlist
    function getprofileRating($id){
        $query = $this->db->query("SELECT personalrating.user_rating, personalrating.userdescription, content.contentId, content.title, content.images, content.altImg, content.description
        FROM personalrating 
        INNER JOIN users ON personalrating.user_id= users.user_id 
        INNER JOIN content ON personalrating.content_id=content.contentId
        WHERE users.user_id = $id");
        $rating_column = $query->result(); 
        
        return $rating_column;
        
    }

    function getUserComments($id){
        $query = $this->db->query("SELECT * FROM comments WHERE user_id =$id");
        $rating_column = $query->result(); 
        
        return $rating_column;
        
    }

    public function getuserlist($contentid,$userid,$type)
        {
                if($type == 0){
                        $query = $this->db->query("SELECT title,content_Id,list_state FROM lists WHERE user_id = $userid");

                }else{
                        $query = $this->db->query("SELECT title,content_Id,list_state FROM lists WHERE user_id = $userid AND list_type = $type");

                }
                
                $userlists = $query->result();
                $listuser = array();
                foreach($userlists as $list){
                        $mylist = explode(',', $list->content_Id);
                        foreach($mylist as $listexists){
                                if($contentid == $listexists){
                                        array_push($listuser,$contentid,$list->list_state);
                                }
                        }
                }
                //var_dump($userlists);
                if(empty($listuser)){
                        array_push($listuser,$contentid,0);
                }
                return $listuser;
        }

        function getListState($id){
            $query = $this->db->query("SELECT list_public FROM lists WHERE list_id = $id");
            $result = $query->result(); 
            
            return $result;
            
        }

        public function privateList($list_id,$type)
        {

            if($type == 1){
                $this->db->set('list_public', 0);
                $this->db->where('list_id', $list_id);
                $this->db->update('lists');
            }else{
                $this->db->set('list_public', 1);
                $this->db->where('list_id', $list_id);
                $this->db->update('lists');
            }   
        }

        public function privateprofile($profileId,$type)
        {

            if($type == 1){
                $this->db->set('profile_state', 0);
                $this->db->where('user_id', $profileId);
                $this->db->update('users');
            }else{
                $this->db->set('profile_state', 1);
                $this->db->where('user_id', $profileId);
                $this->db->update('users');
            }
            
            
        }


}
