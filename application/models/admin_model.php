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

    public function getAllStaff()
    {
        $query = $this->db->get('staff');
        return $query->result();
    }

    public function getAllCharacter()
    {
        $query = $this->db->get('characters');
        return $query->result();
    }

    public function getAllGenre()
    {
        $query = $this->db->get('genre');
        return $query->result();
    }

    public function getAllStudio()
    {
        $query = $this->db->get('studio');
        return $query->result();
    }


    public function getimg()
    {
        $query = $this->db->get('content');
        $content = $query->result();
        
        foreach($content as $c){
            $content_id = $c->contentId;
            $this->db->select('genre_id');
            $this->db->from('genrecontent');
            $this->db->where('content_id',$content_id);
            $query = $this->db->get();
            $response = $query->result_array();
            
            foreach($response as $res){
                $genrelist = "";
                if($res["genre_id"] != 0){
                    $myArray = explode(',', $res["genre_id"]);
                    foreach($myArray as $my){
                        $this->db->select('name');
                        $this->db->from('genre');
                        $this->db->where('genre_id',$my);
                        $query = $this->db->get();
                        $genre_names = $query->result_array();
                        $genrelist .= '/'.$genre_names[0]["name"];
                    }

                    $c->{"genre"} = $genrelist;
                }
            }
        }

        foreach($content as $c){
            $content_id = $c->contentId;
            $this->db->select('character_id');
            $this->db->from('content_character');
            $this->db->where('content_id',$content_id);
            $query = $this->db->get();
            $response = $query->result_array();
            
            foreach($response as $res){
                $charlist = "";
                if($res["character_id"] != 0){
                    $myArray = explode(',', $res["character_id"]);
                    foreach($myArray as $my){
                        $this->db->select('first_name,last_name');
                        $this->db->from('characters');
                        $this->db->where('character_id',$my);
                        $query = $this->db->get();
                        $genre_names = $query->result_array();
                        $charlist .= '/'.$genre_names[0]["first_name"].' '.$genre_names[0]["last_name"];
                    }
                    $c->{"character"} = $charlist;
                }
            }
        }

        foreach($content as $c){
            $content_id = $c->contentId;
            $this->db->select('staff_id');
            $this->db->from('staffcontent');
            $this->db->where('content_id',$content_id);
            $query = $this->db->get();
            $response = $query->result_array();
            
            foreach($response as $res){
                $charlist = "";
                if($res["staff_id"] != 0){
                    $myArray = explode(',', $res["staff_id"]);
                    foreach($myArray as $my){
                        $this->db->select('first_name,last_name');
                        $this->db->from('staff');
                        $this->db->where('staff_id',$my);
                        $query = $this->db->get();
                        $genre_names = $query->result_array();
                        $charlist .= '/'.$genre_names[0]["first_name"].' '.$genre_names[0]["last_name"];
                    }

                    $c->{"staff"} = $charlist;
                }
            }
        }


        return $content;
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

     function getSupportTickets($user_id){
        $query = $this->db->query("SELECT * from supportform where user_id = $user_id AND status =1");
        $result = $query->result();
        return $result;
     }

     function getAllsupport(){
        $query = $this->db->query("SELECT * from supportform");
        $result = $query->result();
        return $result;
     }

     function getSudios(){
        $query = $this->db->query("SELECT * from studio");
        $result = $query->result();
        return $result;
     }

     function getGenres(){
        $query = $this->db->query("SELECT genre_id,name from genre");
        $result = $query->result();
        return $result;
     }

     function getStaff(){
        $query = $this->db->query("SELECT staff_id,first_name,last_name,pictures from staff");
        $result = $query->result();
        return $result;
     }

     function getCharacter(){
        $query = $this->db->query("SELECT character_id,first_name,last_name,pictures from characters");
        $result = $query->result();
        return $result;
     }

     function getStudioId($studio_name){
        $studio_name = explode(" ", $studio_name);
        $query = $this->db->query("SELECT studio_id from studio WHERE first_name = '$studio_name[0]' AND last_name= '$studio_name[1]'");
        $result = $query->result();
        return $result;
     }

    public function remove_user($id)
    {

        $this->db->delete('users', array('user_id' => $id));
        $this->db->delete('userpreferences', array('user_id' => $id));
        $this->db->delete('supportform', array('user_id' => $id));
        $this->db->delete('personalrating', array('user_id' => $id));
        $this->db->delete('notification', array('user_id' => $id));
        $this->db->delete('lists', array('user_id' => $id));
        $this->db->delete('comments', array('user_id' => $id));
        $this->db->delete('recommend', array('user_id' => $id));
        $this->db->delete('watchlist', array('user_id' => $id));


            $query = $this->db->query("SELECT user_likes_id,user_id FROM userpreferences");//get list info
            $transfeltlist = $query->result();
            foreach($transfeltlist as $tl){
                $myArray = explode(',', $tl->user_id);//put all content ids into an array

                if (($key = array_search($id, $myArray)) !== false) {//if it found the particular content in the list, it removes it and turns the array into a string
                    unset($myArray[$key]);
                    $newlist = implode(',',$myArray);
                    echo $tl->user_likes_id;
                    //update list
                    $this->db->set('user_id', $newlist);
                    $this->db->where('user_likes_id', $tl->user_likes_id);
                    $this->db->update('userpreferences');  
                }
            }

        header("Location: http://localhost/Dynamic-Content-Library-main/index.php/edit_user");

    }
    public function remove_staff($id)
    {
        $this->db->select('*');
        $this->db->from('staffcontent');
        $query = $this->db->get();
        $response = $query->result_array();
        $arraygenresid = array();
        $arraygenres = array();
        $count = 0;

        
        foreach($response as $resp){
            $genre = explode(",",$resp['staff_id']);
            $size = strlen($resp['staff_id']);
            
                if (($key = array_search($id, $genre)) !== false) {

                    if($size == 1){
                        array_push($arraygenres,0);
                        array_push($arraygenresid,$resp['staffcontent_id']);
                    }else{
                        unset($genre[$key]);
                        $newlist = implode(',',$genre);
                        array_push($arraygenres,$newlist);
                        array_push($arraygenresid,$resp['staffcontent_id']);
                    }
                }
        }

        

       foreach($arraygenresid as $ag){
            $this->db->set('staff_id', $arraygenres[$count]);
            $this->db->where('staffcontent_id', $ag);
            $this->db->update('staffcontent');
            $count++;
        }

        $this->db->select('*');
        $this->db->from('staff_character');
        $query = $this->db->get();
        $response = $query->result_array();
        $arraygenresid = array();
        $arraygenres = array();
        $count = 0;

        foreach($response as $resp){
            $genre = explode(",",$resp['staff_id']);
            $size = strlen($resp['staff_id']);
                if (($key = array_search($id, $genre)) !== false) {

                    if($size == 1){
                        array_push($arraygenres,0);
                        array_push($arraygenresid,$resp['staff_character_id']);
                    }else{
                        unset($genre[$key]);
                        $newlist = implode(',',$genre);
                        array_push($arraygenres,$newlist);
                        array_push($arraygenresid,$resp['staff_character_id']);
                    }
                }
        }
       foreach($arraygenresid as $ag){
            $this->db->set('staff_id', $arraygenres[$count]);
            $this->db->where('staff_character_id', $ag);
            $this->db->update('staff_character');
            $count++;
        }

        $this->db->select('staff_type');
        $this->db->from('staff');
        $this->db->where('staff_id',$id);
        $query = $this->db->get();
        $responsestaff = $query->result_array();

        

        $this->db->select('*');
        $this->db->from('userpreferences');
        $query = $this->db->get();
        $response = $query->result_array();
        $arraygenresid = array();
        $arraygenres = array();
        $count = 0;

        foreach($response as $resp){
            switch($responsestaff[0]['staff_type']){
                case 1:
                    $genre = explode(",",$resp['producer_like']);
                    $size = strlen($resp['producer_like']);    
                    break;
                case 2:
                    $genre = explode(",",$resp['writer_like']);
                    $size = strlen($resp['writer_like']); 
                    break;
   
                case 3:
                    $genre = explode(",",$resp['actor_like']);
                    $size = strlen($resp['actor_like']);    
                    break;

            }
                if (($key = array_search($id, $genre)) !== false) {

                    if($size == 1){
                        array_push($arraygenres,0);
                        array_push($arraygenresid,$resp['user_likes_id']);
                    }else{
                        unset($genre[$key]);
                        $newlist = implode(',',$genre);
                        array_push($arraygenres,$newlist);
                        array_push($arraygenresid,$resp['user_likes_id']);
                    }
                }
        }


        foreach($arraygenresid as $ag){
            switch($responsestaff[0]['staff_type']){
                case 1:
                    $this->db->set('producer_like', $arraygenres[$count]); 
                    break;

                case 2:
                    $this->db->set('writer_like', $arraygenres[$count]);
                    break;

                case 3:
                    $this->db->set('actor_like', $arraygenres[$count]);
                    break;

            }
            $this->db->where('user_likes_id', $ag);
            $this->db->update('userpreferences');
            $count++;
        }
        
        $this->db->delete('staff', array('staff_id' => $id));
        header("Location: http://localhost/Dynamic-Content-Library-main/index.php/edit_staff");

    }

    public function remove_character($id)
    {
        $this->db->select('*');
        $this->db->from('content_character');
        $query = $this->db->get();
        $response = $query->result_array();
        $arraygenresid = array();
        $arraygenres = array();
        $count = 0;

        
        foreach($response as $resp){
            $genre = explode(",",$resp['character_id']);
            $size = strlen($resp['character_id']);
            
                if (($key = array_search($id, $genre)) !== false) {

                    if($size == 1){
                        array_push($arraygenres,0);
                        array_push($arraygenresid,$resp['content_character_id']);
                    }else{
                        unset($genre[$key]);
                        $newlist = implode(',',$genre);
                        array_push($arraygenres,$newlist);
                        array_push($arraygenresid,$resp['content_character_id']);
                    }
                }
        }

        

       foreach($arraygenresid as $ag){
            $this->db->set('character_id', $arraygenres[$count]);
            $this->db->where('content_character_id', $ag);
            $this->db->update('content_character');
            $count++;
        }

        $this->db->select('*');
        $this->db->from('staff_character');
        $query = $this->db->get();
        $response = $query->result_array();
        $arraygenresid = array();
        $arraygenres = array();
        $count = 0;

        foreach($response as $resp){
            $genre = explode(",",$resp['character_id']);
            $size = strlen($resp['character_id']);
                if (($key = array_search($id, $genre)) !== false) {

                    if($size == 1){
                        array_push($arraygenres,0);
                        array_push($arraygenresid,$resp['staff_character_id']);
                    }else{
                        unset($genre[$key]);
                        $newlist = implode(',',$genre);
                        array_push($arraygenres,$newlist);
                        array_push($arraygenresid,$resp['staff_character_id']);
                    }
                }
        }
       foreach($arraygenresid as $ag){
            $this->db->set('character_id', $arraygenres[$count]);
            $this->db->where('staff_character_id', $ag);
            $this->db->update('staff_character');
            $count++;
        }

        $this->db->select('*');
        $this->db->from('userpreferences');
        $query = $this->db->get();
        $response = $query->result_array();
        $arraygenresid = array();
        $arraygenres = array();
        $count = 0;

        foreach($response as $resp){
            $genre = explode(",",$resp['character_like']);
            $size = strlen($resp['character_like']);
                if (($key = array_search($id, $genre)) !== false) {

                    if($size == 1){
                        array_push($arraygenres,0);
                        array_push($arraygenresid,$resp['user_likes_id']);
                    }else{
                        unset($genre[$key]);
                        $newlist = implode(',',$genre);
                        array_push($arraygenres,$newlist);
                        array_push($arraygenresid,$resp['user_likes_id']);
                    }
                }
        }
       foreach($arraygenresid as $ag){
            $this->db->set('character_like', $arraygenres[$count]);
            $this->db->where('user_likes_id', $ag);
            $this->db->update('userpreferences');
            $count++;
        }

        $this->db->delete('characters', array('character_id' => $id));
        header("Location: http://localhost/Dynamic-Content-Library-main/index.php/edit_characters");

    }

    public function remove_img($id)
    {

        $this->db->delete('content', array('contentId' => $id));
        $this->db->delete('personalrating', array('content_id' => $id));
        $this->db->delete('genrecontent', array('content_id' => $id));
        $this->db->delete('staffcontent', array('content_id' => $id));
        $this->db->delete('content_character', array('content_id' => $id));
        $this->db->delete('watchlist', array('content_id' => $id));
        $this->db->delete('recommend', array('content_id_chose' => $id));
        $this->db->delete('recommend', array('content_id_recommended' => $id));

        for ($i = 1; $i <= 5; $i++) {
            $query = $this->db->query("SELECT list_id,content_id FROM lists WHERE list_type = $i");//get list info
            $transfeltlist = $query->result();
            foreach($transfeltlist as $tl){
                $myArray = explode(',', $tl->content_id);//put all content ids into an array

                if (($key = array_search($id, $myArray)) !== false) {//if it found the particular content in the list, it removes it and turns the array into a string
                    unset($myArray[$key]);
                    $newlist = implode(',',$myArray);
                    //update list
                    $this->db->set('content_id', $newlist);
                    $this->db->where('list_id', $tl->list_id);
                    $this->db->update('lists');  
                }
            }
        }

            $query = $this->db->query("SELECT user_likes_id,content_like FROM userpreferences");//get list info
            $transfeltlist = $query->result();
            foreach($transfeltlist as $tl){
                $myArray = explode(',', $tl->content_like);//put all content ids into an array

                if (($key = array_search($id, $myArray)) !== false) {//if it found the particular content in the list, it removes it and turns the array into a string
                    unset($myArray[$key]);
                    $newlist = implode(',',$myArray);
                    echo $tl->user_likes_id;
                    //update list
                    $this->db->set('content_like', $newlist);
                    $this->db->where('user_likes_id', $tl->user_likes_id);
                    $this->db->update('userpreferences');  
                }
            }
        

            header("Location: http://localhost/Dynamic-Content-Library-main/index.php/edit_image");

        

       

    }
    public function remove_genre($id)
    {
        $this->db->select('*');
        $this->db->from('genrecontent');
        $query = $this->db->get();
        $response = $query->result_array();
        $arraygenresid = array();
        $arraygenres = array();
        $count = 0;

        foreach($response as $resp){
            $genre = explode(",",$resp['genre_id']);
            $size = strlen($resp['character_id']);

                if (($key = array_search($id, $genre)) !== false) {
                    if($size == 1){
                        array_push($arraygenres,0);
                        array_push($arraygenresid,$resp['genre_content_id']);
                    }else{
                        unset($genre[$key]);
                        $newlist = implode(',',$genre);
                        array_push($arraygenres,$newlist);
                        array_push($arraygenresid,$resp['genre_content_id']);
                    }
                }
        }
            foreach($arraygenresid as $ag){
                $this->db->set('genre_id', $arraygenres[$count]);
                $this->db->where('genre_content_id', $ag);
                $this->db->update('genrecontent');
                $count++;
            }

        $this->db->delete('genre', array('genre_id' => $id));
        header("Location: http://localhost/Dynamic-Content-Library-main/index.php/edit_genre");

    }
    public function remove_studio($id)
    {

        $this->db->set('studio_id', 0);
        $this->db->where('studio_id', $id);
        $this->db->update('content');
            

        $this->db->delete('studio', array('studio_id' => $id));
        header("Location: http://localhost/Dynamic-Content-Library-main/index.php/edit_studio");

    }
    public function edit_user($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id',$id['user_id']);
        $query = $this->db->get();
        $response = $query->result_array();


        if(empty($response)){
            
            return 1;
        }else{
            $this->db->where('user_id', $id['user_id']);
            $this->db->update('users', $id);
            return 2;
        }
        
    }

    public function edit_staff($id)
    {
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('staff_id',$id['staff_id']);
        $query = $this->db->get();
        $response = $query->result_array();

        if(empty($response)){
            return 1;
        }else{
            $this->db->where('staff_id', $id['staff_id']);
            $this->db->update('staff', $id);
            return 2;
        }
        
        
    }

    public function edit_character($id)
    {
        $this->db->select('*');
        $this->db->from('characters');
        $this->db->where('character_id',$id['character_id']);
        $query = $this->db->get();
        $response = $query->result_array();

        if(empty($response)){
            return 1;
        }else{
            $this->db->where('character_id', $id['character_id']);
            $this->db->update('characters', $id);
            return 2;
        }
        
    }

    public function edit_genre($id)
    {
        $this->db->select('*');
        $this->db->from('genre');
        $this->db->where('genre_id',$id['genre_id']);
        $query = $this->db->get();
        $response = $query->result_array();

        if(empty($response)){
            return 1;
        }else{
            $this->db->where('genre_id', $id['genre_id']);
            $this->db->update('genre', $id);
            return 2;
        }
        
    }

    public function edit_studio($id)
    {
        $this->db->select('*');
        $this->db->from('studio');
        $this->db->where('studio_id',$id['studio_id']);
        $query = $this->db->get();
        $response = $query->result_array();

        if(empty($response)){
            return 1;
        }else{
            $this->db->where('studio_id', $id['studio_id']);
            $this->db->update('studio', $id);
            return 2;
        }
        
    }

    public function edit_not($id)
    {
        
            $this->db->where('notification_id', $id['notification_id']);
            $this->db->update('notification', $id);

        
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

        if(empty($result[0]->content_id)){
            $listcomplete = $content_id;
        }

        
        if($type == 1){
            if(strlen($result[0]['content_id']) == 1){
                $listcomplete = str_replace("$content_id", "", $listcomplete);
            }else
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
        $this->db->where('user_id',$user_id);
        $this->db->where('like_state',0);
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

            var_dump($result[0]);
            $size = strlen($result[0]['user_like']);
            if($size = 1){
                $list = $profile_id;

            }else{
                $list = $arraydata.",".$profile_id;

            }
            $this->db->set('user_like', $list);
            $this->db->where('user_id', $user_id);
            $this->db->where('like_state', 1);
            $this->db->update('userpreferences');
        }
        
    }

    public function unfollowUser($profile_id,$user_id)
    {

        $this->db->select('user_like');
        $this->db->from('userpreferences');
        $this->db->where('user_id',$user_id);
        $this->db->where('like_state',0);
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
        $this->db->where('like_state', 1);
        $this->db->update('userpreferences');
    }


    public function blockUser($profile_id,$user_id)
    {

        $this->db->select('user_like');
        $this->db->from('userpreferences');
        $this->db->where('user_id',$user_id);
        $this->db->where('like_state',0);
        $query = $this->db->get();
        $result = $query->result_array();

        if(empty($result)){
            $object = array(
                'user_id' => $user_id,
                'user_like' => $profile_id,
                'like_state' => 0
        );
        $this->db->insert('userpreferences', $object);
        }else{
            $arraydata = implode(',',$result[0]);

            
            $size = strlen($result[0]['user_like']);
            if($size = 1){
                $list = $profile_id;

            }else{
                $list = $arraydata.",".$profile_id;

            }
            $this->db->set('user_like', $list);
            $this->db->where('user_id', $user_id);
            $this->db->where('like_state', 0);
            $this->db->update('userpreferences');
        }

        $this->db->select('user_like');
        $this->db->from('userpreferences');
        $this->db->where('user_id',$user_id);
        $this->db->where('like_state',1);
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
        $this->db->where('like_state', 1);
        $this->db->update('userpreferences');
        
    }

    public function unblockUser($profile_id,$user_id)
    {

        $this->db->select('user_like');
        $this->db->from('userpreferences');
        $this->db->where('user_id',$user_id);
        $this->db->where('like_state',0);
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
        $this->db->where('like_state', 0);
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

    public function add_staff_char_content($info)
    {
        $this->db->select('contentId');
        $this->db->from('content');
        $this->db->where('title',$info["title"]);
        $this->db->where('content_type',$info["content_type"]);
        $this->db->where('description',$info["description"]);
        $this->db->where('rating',$info["rating"]);
        $this->db->where('release_date',$info["release_date"]);
        $this->db->where('duration',$info["duration"]);
        $this->db->where('ep_number',$info["ep_number"]);
        $query = $this->db->get();
        $result = $query->result_array();
        $content_id = $result[0]["contentId"];
        

        //adds to staffcontent
        $staff = array(
            'content_id' => $content_id,
            'staff_id' => $info["staff"]
        );

        $this->db->insert('staffcontent', $staff);


        //adds to content_character
        $characters = array(
            'content_id' => $content_id,
            'character_id' => $info["characters"]
        );

        $this->db->insert('content_character', $characters);


        //adds to genrecontent
        $genre = array(
            'content_id' => $content_id,
            'genre_id' => $info["genres"]
        );

        $this->db->insert('genrecontent', $genre);



        $characters_staff = array(
            'character_id' => $info["characters"],
            'staff_id' => $info["staff"]

        );
        
        $this->db->insert('staff_character', $characters_staff);
    }

    public function add_staff($info)
    {
        $this->db->insert('staff', $info);
    }

    public function add_characters($info)
    {
        $this->db->insert('characters', $info);
    }

    public function add_genre($info)
    {

        $this->db->select('*');
        $this->db->from('genre');
        $this->db->where('name', $info["name"]);
        $query = $this->db->get();
        $response = $query->result_array();
        
        if(!empty($response)){
            return false;
        }else{
            $this->db->insert('genre', $info);
            return true;
        }
    }

    public function add_studio($info)
    {
        $this->db->select('*');
        $this->db->from('studio');
        $this->db->where('first_name', $info["first_name"]);
        $this->db->where('last_name', $info["last_name"]);
        $query = $this->db->get();
        $response = $query->result_array();
        
        if(!empty($response)){
            return false;
        }else{
            $this->db->insert('studio', $info);
            return true;
        }
    }

    public function add_not_db($info)
    {
       
        $this->db->insert('notification', $info);

    }


    public function sendsupportticket($info)
    {
        $this->db->insert('supportform', $info);
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
                $query = $this->db->query("SELECT content_like FROM userpreferences WHERE user_id = $id AND like_state = 1");
                $liked = $query->result();
                if(empty($liked[0]->content_like)){
                    return;
                }
                break;
            case 2:
                $query = $this->db->query("SELECT genre_like FROM userpreferences WHERE user_id = $id AND like_state = 1");
                $liked = $query->result();
                if(empty($liked[0]->genre_like)){
                    return;
                }
                break;
            case 3:
                $query = $this->db->query("SELECT character_like FROM userpreferences WHERE user_id = $id AND like_state = 1");
                $liked = $query->result();
                if(empty($liked[0]->character_like)){
                    return;
                }
                break;
            case 4:
                $query = $this->db->query("SELECT studio_like FROM userpreferences WHERE user_id = $id AND like_state = 1");
                $liked = $query->result();
                if(empty($liked[0]->studio_like)){
                    return;
                }
                break;
            case 5:
                switch($staff_type){
                    case 1:
                        $query = $this->db->query("SELECT producer_like FROM userpreferences WHERE user_id = $id AND like_state = 1");
                        $liked = $query->result();
                        if(empty($liked[0]->producer_like)){
                            return;
                        }
                        break;
                    case 2:
                        $query = $this->db->query("SELECT writer_like FROM userpreferences WHERE user_id = $id AND like_state = 1");
                        $liked = $query->result();
                        if(empty($liked[0]->writer_like)){
                            return;
                        }
                        break;
                    case 3:
                        $query = $this->db->query("SELECT actor_like FROM userpreferences WHERE user_id = $id AND like_state = 1");
                        $liked = $query->result();
                        if(empty($liked[0]->actor_like)){
                            return;
                        }
                        break;
                }
                break;

            case 6:
                $query = $this->db->query("SELECT user_liked FROM userpreferences WHERE user_id = $id AND like_state = 1");
                $liked = $query->result();
                if(empty($liked[0]->user_liked)){
                    return;
                }
                break;
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
                    break;

                case 6:
                    $likedId = explode(',', $like->user_liked);
                    break;
            }
            $content = array();
            
            

            foreach($likedId as $likeId){

                if($likeId == " "){
                    return;
                }


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
                    case 6:
                        $query = $this->db->query("SELECT * FROM users WHERE user_id = $likeId");
                        break;
                }
                $contentInfo = $query->result();
                array_push($content, $contentInfo);
            }
        }

        return $content;
    }

    function getStaffDislike($id,$staff_type,$like_type)
    {
        $response = array();
        switch($like_type){
            case 1:
                $query = $this->db->query("SELECT content_like FROM userpreferences WHERE user_id = $id AND like_state = 0");
                $liked = $query->result();
                if(empty($liked[0]->content_like)){
                    return;
                }
                break;
            case 2:
                $query = $this->db->query("SELECT genre_like FROM userpreferences WHERE user_id = $id AND like_state = 0");
                $liked = $query->result();
                if(empty($liked[0]->genre_like)){
                    return;
                }
                break;
            case 3:
                $query = $this->db->query("SELECT character_like FROM userpreferences WHERE user_id = $id AND like_state = 0");
                $liked = $query->result();
                if(empty($liked[0]->character_like)){
                    return;
                }
                break;
            case 4:
                $query = $this->db->query("SELECT studio_like FROM userpreferences WHERE user_id = $id AND like_state = 0");
                $liked = $query->result();
                if(empty($liked[0]->studio_like)){
                    return;
                }
                break;
            case 5:
                switch($staff_type){
                    case 1:
                        $query = $this->db->query("SELECT producer_like FROM userpreferences WHERE user_id = $id AND like_state = 0");
                        $liked = $query->result();
                        if(empty($liked[0]->producer_like)){
                            return;
                        }
                        break;
                    case 2:
                        $query = $this->db->query("SELECT writer_like FROM userpreferences WHERE user_id = $id AND like_state = 0");
                        $liked = $query->result();
                        if(empty($liked[0]->writer_like)){
                            return;
                        }
                        break;
                    case 3:
                        $query = $this->db->query("SELECT actor_like FROM userpreferences WHERE user_id = $id AND like_state = 0");
                        $liked = $query->result();
                        if(empty($liked[0]->actor_like)){
                            return;
                        }
                        break;
                    
                }
                break;
            case 6:
                $query = $this->db->query("SELECT user_liked FROM userpreferences WHERE user_id = $id AND like_state = 0");
                $liked = $query->result();
                if(empty($liked[0]->user_liked)){
                    return;
                }
                break;

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
                break;

                case 6:
                    $likedId = explode(',', $like->user_liked);
                    break;
            }
            $content = array();
            foreach($likedId as $likeId){
                if($likeId == " "){
                    return;
                }
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
                    case 6:
                        $query = $this->db->query("SELECT * FROM users WHERE user_id = $likeId");
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
        $query = $this->db->query("SELECT comments.* FROM comments 
        INNER JOIN users ON comments.profile_id= users.user_id 
        WHERE profile_id = $profile_id AND comments.user_id = $user_id 
        AND profile_type = 1 AND comment_type = 1");
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

    function removeusercomment($comment_id){
        $this->db->where('comment_id', $comment_id);
        $this->db->delete('comments');
    }

    function removeuserrecommendation($rec_id){
        $this->db->where('recommend_id', $rec_id);
        $this->db->delete('recommend');
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
        $query = $this->db->query("SELECT user_like FROM userpreferences WHERE user_id = $id AND like_state = 1");
        $followers = $query->result();

        if(empty($followers)){
            $followercount = array(2,3);
        }else
        $followercount = explode(',', $followers[0]->user_like);

        if(empty($followers[0]->user_like) && $type == 0){
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
        $query = $this->db->query("SELECT user_like FROM userpreferences WHERE user_id = $id AND like_state = 1");
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
        
        
        if(empty($character_collumn[0]->content_id)){
            return;
        }

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

        foreach($content as $ct){
            $totalrat = 0;

            $query = $this->db->query("SELECT studio.first_name,studio.last_name FROM studio INNER JOIN content ON studio.studio_id=content.studio_id  WHERE content.contentId =". $ct[0]->contentId);
            $query_studio = $query->result();
            $ct[0]->{"first_name"} = $query_studio[0]->first_name;
            $ct[0]->{"last_name"} = $query_studio[0]->last_name;
            $query = $this->db->query("SELECT user_rating
            FROM personalrating 
            WHERE content_id =" . $ct[0]->contentId);
            $userrating = $query->result();
            foreach($userrating as $ur){
                    $totalrat += $ur->user_rating;
            }
            if(count($userrating) != 0){
                    $totalrat = $totalrat/count($userrating);
            }
            if(!empty($userrating)){
                    $ct[0]->{"rating"} = $totalrat;

            }else{
                    $ct[0]->{"rating"} = 0.00;
            }
        }

        foreach($content as $c){
            $query = $this->db->query("SELECT personalrating.user_rating
            FROM personalrating 
            INNER JOIN users ON personalrating.user_id= users.user_id 
            INNER JOIN content ON personalrating.content_id=content.contentId
            WHERE content.contentId = ".$c[0]->contentId.
            " AND users.user_id =".$id);
            $userrating = $query->result();
            
            if(empty($userrating)){
                $c[0]->{"personalrating"} = 'Not rated';
            }else{
                $c[0]->{"personalrating"} = $userrating[0]->user_rating;
            }
        }

        $query = $this->db->query("SELECT list_id FROM lists WHERE user_id=$id AND list_id=$list_id");
        $list_id = $query->result(); 
        $c[0]->{"list_id"} = $list_id[0]->list_id;

        return $content;
    }

    //show content inside a list made by a user
    function getProfileContentList($id,$type,$state){
        //state 0 means see all the lists
        if($state == 0){
            $query = $this->db->query("SELECT content_id FROM lists WHERE user_id=$id AND list_type = $type");
        }else{
            $query = $this->db->query("SELECT content_id FROM lists WHERE user_id=$id AND list_type = $type AND list_state = $state");
        }

        $character_collumn = $query->result(); 

        //if one of the list is 0 it removes from the array
        foreach ($character_collumn as $key => $obj) {
            if (empty($obj->content_id)) {
                unset($character_collumn[$key]);
            }
        }
        
       

        $genre_total = $query->result();
                $i = 0;
                $genrestdif = array();
                $genrest = array();
        foreach($character_collumn as $test){
            $content = array();
            $mycharacter = explode(',', $test->content_id);
            foreach($mycharacter as $myc){
                if(!empty($myc)){
                    $query = $this->db->query("SELECT content.contentId,genrecontent.genre_id FROM genrecontent 
                    INNER JOIN content ON genrecontent.content_id=content.contentId WHERE genrecontent.content_id=$myc");
                    array_push($genrestdif,$query->result());
                }
                
            }

        }

        $rating_counter = 0;
            foreach($genrestdif as $genres){
                $differentGenres = array();
                $putGenre = array();
                $store = "";
                $genre_total = $genres[0]->genre_id;
                $myArray = explode(',', $genre_total);
                
                if($genre_total != 0){
                    $query = $this->db->query("SELECT content.*,genre.name FROM genrecontent INNER JOIN content ON 
                    genrecontent.content_id=content.contentId INNER JOIN genre ON genrecontent.genre_id= genre.genre_id 
                    WHERE genrecontent.content_id =". $genres[0]->contentId);
                
                    $contentquery = $query->result();

                    $query = $this->db->query("SELECT personalrating.user_rating FROM personalrating INNER JOIN users ON personalrating.user_id= users.user_id  INNER JOIN content ON personalrating.content_id=content.contentId WHERE personalrating.content_id = ".$contentquery[0]->contentId." AND users.user_id =".$id);
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
                            if(!empty($content[$i])){
                                $content[$i][0]->name = $myArray;
                            }
                            
                    }else{                   
                            
                            array_push($content,$contentquery);
                    }

                }else{

                    $query = $this->db->query("SELECT content.* FROM content WHERE contentId =". $genres[0]->contentId);
                
                    $contentquery = $query->result();
                    $contentquery[0]->{"name"} = 0;

                    array_push($content,$contentquery);

                }
                $i++;
  
            }

        if(!empty($content)){
            foreach($content as $ct){
                $totalrat = 0;
                $query = $this->db->query("SELECT studio.first_name,studio.last_name FROM studio INNER JOIN content ON studio.studio_id=content.studio_id  WHERE content.contentId =". $ct[0]->contentId);
                $query_studio = $query->result();
                $ct[0]->{"first_name"} = $query_studio[0]->first_name;
                $ct[0]->{"last_name"} = $query_studio[0]->last_name;
                
                $query = $this->db->query("SELECT user_rating
                FROM personalrating 
                WHERE content_id =" . $ct[0]->contentId);
                $userrating = $query->result();
                foreach($userrating as $ur){
                        $totalrat += $ur->user_rating;
                }
                if(count($userrating) != 0){
                        $totalrat = $totalrat/count($userrating);
                }
                if(!empty($userrating)){
                        $ct[0]->{"rating"} = $totalrat;
    
                }else{
                        $ct[0]->{"rating"} = 0.00;
                }
        }
        
    

    foreach($content as $c){
        $query = $this->db->query("SELECT personalrating.user_rating
        FROM personalrating 
        INNER JOIN users ON personalrating.user_id= users.user_id 
        INNER JOIN content ON personalrating.content_id=content.contentId
        WHERE content.contentId = ".$c[0]->contentId.
        " AND users.user_id =".$id);
        $userrating = $query->result();
        
        if(empty($userrating)){
            $c[0]->{"personalrating"} = 'Not rated';
        }else{
            $c[0]->{"personalrating"} = $userrating[0]->user_rating;
        }
    }

    foreach($content as $c){
        $query = $this->db->query("SELECT ep_amount FROM watchlist WHERE user_id = $id AND content_id = ".$c[0]->contentId);
        $ep_amount_user = $query->result();

        if(!empty($ep_amount_user)){
            $c[0]->{"amount_watched"} = $ep_amount_user[0]->ep_amount;
        }else{
            $c[0]->{"amount_watched"} = 0;
        }
        
    }
    

        return $content;
    }
    
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
        $query = $this->db->query("SELECT personalrating.*, content.contentId, content.title, content.images, content.altImg, content.description
        FROM personalrating 
        INNER JOIN users ON personalrating.user_id= users.user_id 
        INNER JOIN content ON personalrating.content_id=content.contentId
        WHERE users.user_id = $id");
        $rating_column = $query->result(); 
        
        return $rating_column;
        
    }

    function getUserComments($id,$type){
        $query = $this->db->query("SELECT * FROM comments WHERE user_id =$id AND profile_type = $type");
        $rating_column = $query->result(); 
        
        return $rating_column;  
    }

    function getUserCommentForum($id){
        $query = $this->db->query("SELECT * FROM comments WHERE user_id =$id AND comment_type = 3");
        $rating_column = $query->result(); 
        
        return $rating_column;
        
    }

    function getUserRecom($id){
        $query = $this->db->query("SELECT * FROM recommend WHERE user_id =$id");
        $recommendation = $query->result(); 
        
        foreach($recommendation as $rec){
            $query = $this->db->query("SELECT content.*
            FROM recommend 
            INNER JOIN content ON recommend.content_id_chose= content.contentId 
            WHERE content.contentId = $rec->content_id_chose");
            $rec_old = $query->result(); 

            $query = $this->db->query("SELECT content.*
            FROM recommend 
            INNER JOIN content ON recommend.content_id_recommended= content.contentId 
            WHERE content.contentId = $rec->content_id_recommended");
            $rec_new = $query->result(); 

            $rec->{"oldid"} = $rec_old[0]->contentId;
            $rec->{"oldtitle"} = $rec_old[0]->title;
            $rec->{"oldimage"} = $rec_old[0]->images;

            $rec->{"newid"} = $rec_new[0]->contentId;
            $rec->{"newtitle"} = $rec_new[0]->title;
            $rec->{"newimage"} = $rec_new[0]->images;



            $rec->{"content_type"} = $rec_old[0]->content_type;

        }

        return $recommendation;
        
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


                
                //var_dump($listuser);
                
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

        public function removeTicket($id)
        {

                $this->db->set('status', 0);
                $this->db->where('support_id', $id);
                $this->db->update('supportform');
            
        }

        public function deleteTicket($id)
        {

            $this->db->where('support_id', $id);
            $this->db->delete('supportform');
            
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

        public function add_list($data)
        {
            $this->db->insert('lists', $data);
        }

        public function getNotification($id)
        {
                $query = $this->db->query("SELECT notification.*, users.username FROM notification INNER JOIN users ON notification.user_id=users.user_id WHERE users.user_id = $id AND notification.status = 1");
                $notifications = $query->result();

                return $notifications;
        }

        public function getExistsProfile($id)
        {
                $query = $this->db->query("SELECT username FROM users WHERE user_id = $id");
                $exists = $query->result();

                if(empty($exists)){
                    return 0;
                }else{
                    return 1;
                }
                
                
        }

        public function getBlockedUser($id)
        {
                $query = $this->db->query("SELECT user_like FROM userpreferences WHERE user_id = $id AND like_state = 0");
                $likepreferences = $query->result();
                
                if(empty($likepreferences[0]->user_like)){
                    return $likepreferences;
                }else{
                    $likedcharacter = explode(',', $likepreferences[0]->user_like);

                }               
                return $likedcharacter;
        }

        public function getcheckuserblocked($id)
        {
                $query = $this->db->query("SELECT user_like FROM userpreferences WHERE user_id = $id AND like_state = 0");
                $likepreferences = $query->result();
                
                if(empty($likepreferences[0]->user_like)){
                    return $likepreferences;
                }else{
                    $likedcharacter = explode(',', $likepreferences[0]->user_like);

                }               
                return $likedcharacter;
        }


       
        
        public function getPreferencesLikeUser($id)
        {
                $query = $this->db->query("SELECT user_liked FROM userpreferences WHERE user_id = $id AND like_state = 1");
                $likepreferences = $query->result();
                
                if(empty($likepreferences[0]->user_liked)){
                    return $likepreferences;
                }else{
                    $likedcharacter = explode(',', $likepreferences[0]->user_liked);

                }                
                return $likedcharacter;
        }



        public function getPreferencesDislikeUser($id)
        {
                $query = $this->db->query("SELECT user_liked FROM userpreferences WHERE user_id = $id AND like_state = 0");
                $likepreferences = $query->result();
                if(empty($likepreferences[0]->user_liked)){
                    return $likepreferences;
                }else{
                    $likedcharacter = explode(',', $likepreferences[0]->user_liked);

                }
                
                return $likedcharacter;
        }

        

        public function addlikeduser($profileId,$user_id)
        {

                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 1");
                $contentquery = $query->result();
                
                if(empty($contentquery)){
                        $object = array(
                                'user_id' => $user_id,
                                'user_liked' => $profileId,
                                'like_state' => 1
                        );
                        $this->db->insert('userpreferences', $object);

                }else{
                        $list = $contentquery[0]->user_liked;
                        if(empty($list)){
                                $this->db->set('user_liked',$profileId);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                        }else{
                                $this->db->set('user_liked', $list.','.$profileId);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                        }
                }

                
                
        }

        public function removedilikeduser($profileId,$user_id)
        {


                
                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 0");
                $contentquery = $query->result();

                if(!empty($contentquery)){
                                $list = $contentquery[0]->user_liked;
                                var_dump($list);
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($profileId, $list_char)) !== false) {
                    
                                        if($size == 1){
                                                $newlist = '';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                
                                $this->db->set('user_liked', $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                }

                
                
        }

        

        public function adddislikeduser($profileId,$user_id)
        {

                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 0");
                $contentquery = $query->result();
                
                if(empty($contentquery)){
                        $object = array(
                                'user_id' => $user_id,
                                'user_liked' => $profileId,
                                'like_state' => 0
                        );
                        $this->db->insert('userpreferences', $object);

                }else{
                        $list = $contentquery[0]->user_liked;
                        if(empty($list)){
                                $this->db->set('user_liked',$profileId);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                        }else{
                                $this->db->set('user_liked', $list.','.$profileId);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                        }
                }
                
        }

        public function removelikeduser($profileId,$user_id)
        {


                
                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 1");
                $contentquery = $query->result();

                if(!empty($contentquery)){
                                $list = $contentquery[0]->user_liked;
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($profileId, $list_char)) !== false) {
                    
                                        if($size == 1){
                                                $newlist = '';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                $this->db->set('user_liked', $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                }

                
                
        }
}


