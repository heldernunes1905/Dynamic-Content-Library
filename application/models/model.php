<?php
class model extends CI_Model
{

        public function getContentList($contentType)
        {
                $query = $this->db->query("SELECT content.contentId FROM content WHERE content_type= '$contentType'");
                $genre_total = $query->result();
                $i = 0;
                $genrestdif = array();
                $genrest = array();
                $content = array();

                foreach($genre_total as $genre){
                        $query = $this->db->query("SELECT content.contentId,genrecontent.genre_id FROM genrecontent INNER JOIN content ON genrecontent.content_id=content.contentId WHERE genrecontent.content_id=$genre->contentId");
                        array_push($genrestdif,$query->result());
                }

                foreach($genrestdif as $genres){
                        $differentGenres = array();
                        $putGenre = array();
                        $store = "";
                        $genre_total = $genres[0]->genre_id;
                        $myArray = explode(',', $genre_total);
                        $query = $this->db->query("SELECT content.*,genre.name FROM genrecontent INNER JOIN content ON genrecontent.content_id=content.contentId INNER JOIN genre ON genrecontent.genre_id= genre.genre_id WHERE genrecontent.content_id =". $genres[0]->contentId);
                        if(strpos($genre_total,",") !== false){
                                array_push($content,$query->result());                                
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
                                array_push($content,$query->result());
                        }

                        $i++;
                }
                return $content;
        }

        public function getdisplayinfo($id)
        {
                $query = $this->db->query("SELECT Content.*, studio.first_name,studio.last_name FROM Content INNER JOIN studio ON content.studio_id=studio.studio_id WHERE contentId = $id");
                return $query->result();
        }

        public function getStudioContentList($id)
        {
                $query = $this->db->query("SELECT Content.*, studio.first_name,studio.last_name FROM Content INNER JOIN studio ON content.studio_id=studio.studio_id WHERE content.studio_id = $id");
                $studio_content = $query->result();
                $i = 0;
                $genrestdif = array();
                $genrest = array();

                foreach($studio_content as $genre){
                        $query = $this->db->query("SELECT content.contentId,genrecontent.genre_id FROM genrecontent INNER JOIN content ON genrecontent.content_id=content.contentId WHERE genrecontent.content_id=$genre->contentId");
                        array_push($genrestdif,$query->result());
                }
                $content = array();

                foreach($genrestdif as $genres){
                        $differentGenres = array();
                        $putGenre = array();
                        $store = "";
                        $genre_total = $genres[0]->genre_id;
                        $myArray = explode(',', $genre_total);
                        $query = $this->db->query("SELECT content.*,genre.name FROM genrecontent INNER JOIN content ON genrecontent.content_id=content.contentId INNER JOIN genre ON genrecontent.genre_id= genre.genre_id WHERE genrecontent.content_id =". $genres[0]->contentId);
                        if(strpos($genre_total,",") !== false){
                                array_push($content,$query->result());                                
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
                                array_push($content,$query->result());
                        }

                        $i++;
                }
                
                return $content;
        }

        public function getdisplaygenre($id)
        {
                $query = $this->db->query("SELECT genre_id FROM genrecontent WHERE content_id = $id");
                $genre_total = $query->result()[0]->genre_id;
                $myArray = explode(',', $genre_total);
                $genrestdif = array();
                foreach($myArray as $genre){
                        $query = $this->db->query("SELECT genre.name FROM genre WHERE genre.genre_id = '$genre'");
                        array_push($genrestdif,$query->result());
                }
                return $genrestdif;
        }

        public function getpersonalrating($id,$userid)
        {
                $query = $this->db->query("SELECT personalrating.active,personalrating.user_rating,personalrating.userdescription,personalrating.personal_rating_id
                FROM personalrating 
                INNER JOIN users ON personalrating.user_id= users.user_id 
                INNER JOIN content ON personalrating.content_id=content.contentId
                WHERE content.contentId = $id".
                " AND users.user_id =".$userid);
                $userrating = $query->result();

                return $userrating;
        }

        public function getdisplayuserratingpersonal($id,$user_id)
        {
                $query = $this->db->query("SELECT personalrating.*, users.user_id, users.username, users.avatar
                FROM personalrating 
                INNER JOIN users ON personalrating.user_id= users.user_id 
                INNER JOIN content ON personalrating.content_id=content.contentId
                WHERE content.contentId = $id
                AND personalrating.user_id = $user_id");
                $userrating = $query->result();
                
                    
                return $userrating;
        }

        public function getdisplayuserrating($id,$firstcomment)
        {
                $query = $this->db->query("SELECT personalrating.*, users.user_id, users.username, users.avatar
                FROM personalrating 
                INNER JOIN users ON personalrating.user_id= users.user_id 
                INNER JOIN content ON personalrating.content_id=content.contentId
                WHERE content.contentId = $id");
                $userrating = $query->result();

                $i=0;
                
                foreach($userrating as $cl){
                        foreach($firstcomment as $li){
                                if($cl->personal_rating_id == $li->personal_rating_id){
                                        unset($userrating[$i]);
                                }
                        }
                        $i++;
                }
                return $userrating;

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

        public function usercustomlistadd($contentid,$userid,$type)
        {
                
                $query = $this->db->query("SELECT title,content_Id,list_id,image FROM lists WHERE user_id = $userid AND list_type = $type");
                $customalllist = $query->result();
                
                $listuser = array();
                $alllist = array();
                $i = 1;
                foreach($customalllist as $list){
                        $mylist = explode(',', $list->content_Id);
                        foreach($mylist as $listexists){
                                if($contentid == $listexists){
                                        array_push($listuser,$list);
                                }
                        }
                        
                }
                return $listuser;

        }
        
        public function allist($contentid,$userid,$type,$list_id)
        {
                $query = $this->db->query("SELECT title,content_Id,list_id,image FROM lists WHERE user_id = $userid AND list_type = $type");
                $customalllist = $query->result();
                
                $i=0;

                foreach($customalllist as $cl){
                        foreach($list_id as $li){
                                if($cl->list_id == $li->list_id){
                                        unset($customalllist[$i]);
                                }
                        }
                        $i++;
                }

                return $customalllist;
        }

        public function getgenreInfo($genre)
        {
                
                $queryGenre = $this->db->query("SELECT genre.genre_id FROM genre WHERE genre.name = '$genre'");
                $genreId = $queryGenre->result()[0]->genre_id;

                $queryContentId = $this->db->query("SELECT * FROM genrecontent");
                $contentId = $queryContentId->result();
                $showmoviegenre = array();
                $contentAllGenre = array();
                $differentGenres = array();
                $putGenre = array();
                $i = 0;

                foreach($contentId as $cont){
                        $mygenre = explode(',', $cont->genre_id);
                        foreach($mygenre as $myg){
                                if($myg == $genreId){
                                        $queryGenre = $this->db->query("SELECT content.*,genre.name,genrecontent.genre_id FROM genrecontent INNER JOIN content ON genrecontent.content_id=content.contentId INNER JOIN genre ON genrecontent.genre_id=genre.genre_id WHERE genrecontent.content_id = $cont->content_id");
                                        array_push($showmoviegenre,$queryGenre->result());
                                }else{
                                        
                                }
                        }
                }

                foreach($showmoviegenre as $getallgenre){
                        $differentGenres = array();
                        $putGenre = array();
                        $store = "";
                        $genre_total = $getallgenre[0]->genre_id;
                        $myArray = explode(',', $genre_total);
                        $queryallGenre = $this->db->query("SELECT content.*,genre.name FROM genrecontent INNER JOIN content ON genrecontent.content_id=content.contentId INNER JOIN genre ON genrecontent.genre_id= genre.genre_id WHERE genrecontent.content_id =". $getallgenre[0]->contentId);
                
                        if(strpos($genre_total,",") !== false){
                                array_push($contentAllGenre,$queryallGenre->result());   
                                foreach($myArray as $genre){
                                        $querygenre = $this->db->query("SELECT genre.name from genre WHERE genre.genre_id=".$genre);   
                                        array_push($differentGenres,$querygenre->result());
                                }

                                foreach($differentGenres as $test){
                                        array_push($putGenre,$test[0]->name);
                                }
                                $myArray = implode(",", $putGenre);
                                $contentAllGenre[$i][0]->name = $myArray;
                        }else{                   
                                array_push($contentAllGenre,$queryallGenre->result());
                        }

                        $i++;
                }

                return $contentAllGenre;

        }

        public function getStaffmembers($id)
        {
                
                $query = $this->db->query("SELECT staff_id FROM staffcontent WHERE content_id = $id");
                $staff_collumn = $query->result();
                if(empty($staff_collumn)){
                        return 0;
                }
                $mystaff = explode(',', $staff_collumn[0]->staff_id);
                $staffall= array();

                foreach($mystaff as $staff){
                        $query = $this->db->query("SELECT  * FROM staff WHERE staff.staff_id = $staff");
                        array_push($staffall,$query->result());
                }
                
                
                return $staffall;
        }


        public function getStaffcharmembers($id)
        {
                $query = $this->db->query("SELECT staff_id FROM staff_character WHERE character_id = $id");
                $staff_total = $query->result()[0]->staff_id;
                $myArray = explode(',', $staff_total);
                $charactersdif = array();
                foreach($myArray as $character){
                        $query = $this->db->query("SELECT staff.* FROM staff_character INNER JOIN staff ON staff_character.staff_id= staff.staff_id INNER JOIN characters ON staff_character.character_id=characters.character_id WHERE staff_character.staff_id  = $character");
                        array_push($charactersdif,$query->result());
                }
                return $charactersdif;
        }
        

        public function getcharbystaffmembers($id)
        {
                $query = $this->db->query("SELECT * FROM staff_character");
                $staff_total = $query->result();
                $charactersall = array();
                foreach($staff_total as $st){
                        $myArray = explode(',', $st->staff_id);
                        foreach($myArray as $ma){
                                if($id == $ma){
                                        $query = $this->db->query("SELECT characters.* FROM staff_character INNER JOIN staff ON staff_character.staff_id= staff.staff_id INNER JOIN characters ON staff_character.character_id=characters.character_id WHERE staff_character.staff_character_id  = $st->staff_character_id");
                                        array_push($charactersall,$query->result());
                                }
                                
                        }
                }
                return $charactersall;
        }


        public function getStaffCharacter($id)
        {


                /*foreach($id['contents'] as $i){
                        $query = $this->db->query("SELECT * FROM staff_character WHERE character_id = ".$i[0]->character_id);
                        $staff_total = $query->result();
                        $chararray = explode(',', $staff_total[0]->staff_id);
                        foreach($chararray as $c){
                                foreach($id['staff'] as $d){
                                        $myArray = explode(',', $d[0]->staff_id);
                                        foreach($myArray as $ma){
                                                if($c == $ma){
                                                        echo $c;
                                                }
                                        }
                                }
                                
                                
                        }
                        $charactersall = array();
                }*/

        }

        public function getCharacters($id)
        {
                $query = $this->db->query("SELECT character_id FROM content_character WHERE content_id = $id");
                $character_collumn = $query->result();
                if(empty($character_collumn)){
                        return 0;
                }
                $mycharacter = explode(',', $character_collumn[0]->character_id);
                $characterall= array();

                foreach($mycharacter as $character){
                        $query = $this->db->query("SELECT * FROM characters WHERE characters.character_id = $character");
                        array_push($characterall,$query->result());
                }

                return $characterall;
        }

        public function changerating($user_id,$contentId,$rating)
        {
                $query = $this->db->query("SELECT * FROM personalrating WHERE content_id = $contentId AND user_id = $user_id");
                $ratingquery = $query->result();

                
                if(!empty($ratingquery)){
                        $this->db->set('user_rating', $rating);
                        $this->db->where('user_id', $user_id);
                        $this->db->where('content_id', $contentId);
                        $this->db->update('personalrating');                
                }else{
                        $object = array(
                                'user_id' => $user_id,
                                'content_id' => $contentId,
                                'user_rating' => $rating,
                                'active' => 1
                        );
                        $this->db->insert('personalrating', $object);
                }
        }

        public function addcommentContent($user_id,$contentId,$comment,$title)
        {
                $query = $this->db->query("SELECT * FROM personalrating WHERE content_id = $contentId AND user_id = $user_id");
                $contentquery = $query->result();
                if($comment == "fwhyalhiçufoijj3qop9e4u018rhoirFHUAUIFLfkfkuNKUWKNUewcuknec"){        
                        $this->db->set('userdescription', "");
                        $this->db->set('usertitle', "");
                        $this->db->where('user_id', $user_id);
                        $this->db->where('content_id', $contentId);
                        $this->db->update('personalrating');
                        
                        return;
                }
                

                if(!empty($contentquery)){
                        $this->db->set('userdescription', $comment);
                        $this->db->set('usertitle', $title);
                        $this->db->where('user_id', $user_id);
                        $this->db->where('content_id', $contentId);
                        $this->db->update('personalrating');                
                }else{
                        $object = array(
                                'user_id' => $user_id,
                                'content_id' => $contentId,
                                'usertitle' => $title,
                                'userdescription' => $comment,
                                'active' => 1
                        );
                        $this->db->insert('personalrating', $object);
                }
        }

        public function addcharacterContent($user_id,$charId,$comment)
        {
                if($comment == "fwhyalhiçufoijj3qop9e4u018rhoirFHUAUIFLfkfkuNKUWKNUewcuknec"){
                        $this->db->where('user_id', $user_id);
                        $this->db->where('profile_id', $charId);
                        $this->db->where('profile_type', 3);

                        $this->db->delete('comments');
                        return;
                }


                $query = $this->db->query("SELECT characters.character_id, comments.* FROM comments INNER JOIN characters ON comments.profile_id=characters.character_id WHERE comments.profile_id = $charId AND comments.profile_type = 3 AND comments.user_id=$user_id");
                $contentquery = $query->result();
                date_default_timezone_set('Europe/Lisbon');

                if(!empty($contentquery)){
                        $this->db->set('comment', $comment);
                        $this->db->set('date', date('Y-m-d H:i:s'));
                        $this->db->where('user_id', $user_id);
                        $this->db->where('profile_id', $charId);
                        $this->db->update('comments');                
                }else{
                        $object = array(
                                'user_id' => $user_id,
                                'comment_title' => 'afsaf',
                                'profile_id' => $charId,
                                'profile_type' => 3,
                                'comment_type' => 1,
                                'comment' => $comment,
                                'date' => date('Y-m-d H:i:s')
                        );
                        $this->db->insert('comments', $object);
                }
        }

        public function addstaffcontent($user_id,$charId,$comment)
        {
                if($comment == "fwhyalhiçufoijj3qop9e4u018rhoirFHUAUIFLfkfkuNKUWKNUewcuknec"){
                        $this->db->where('user_id', $user_id);
                        $this->db->where('profile_id', $charId);
                        $this->db->where('profile_type', 2);

                        $this->db->delete('comments');
                        return;
                }


                $query = $this->db->query("SELECT staff.staff_id, comments.* FROM comments INNER JOIN staff ON comments.profile_id=staff.staff_id WHERE comments.profile_id = $charId AND comments.profile_type = 2 AND comments.user_id=$user_id");
                $contentquery = $query->result();
                date_default_timezone_set('Europe/Lisbon');

                if(!empty($contentquery)){
                        $this->db->set('comment', $comment);
                        $this->db->set('date', date('Y-m-d H:i:s'));
                        $this->db->where('user_id', $user_id);
                        $this->db->where('profile_id', $charId);
                        $this->db->update('comments');                
                }else{
                        $object = array(
                                'user_id' => $user_id,
                                'comment_title' => 'afsaf',
                                'profile_id' => $charId,
                                'profile_type' => 2,
                                'comment_type' => 1,
                                'comment' => $comment,
                                'date' => date('Y-m-d H:i:s')
                        );
                        $this->db->insert('comments', $object);
                }
        }

        public function getCharacterInfo($id)
        {
                $query = $this->db->query("SELECT * FROM characters  WHERE character_id = $id");
                return $query->result();
        }

        public function getStaffInfo($id)
        {
                $query = $this->db->query("SELECT * FROM staff  WHERE staff_id = $id");
                return $query->result();
        }

        public function getSticksShow()
        {
                $query = $this->db->query('SELECT * FROM content LIMIT 4');
                return $query->result();
        }

        public function getNotification($id)
        {
                $query = $this->db->query("SELECT notification.*, users.username FROM notification INNER JOIN users ON notification.user_id=users.user_id WHERE users.user_id = $id AND notification.status = 1");
                $notifications = $query->result();

                return $notifications;
        }

        public function removenotif($notificationid)
        {
                /*$this->db->set('status', 2);
                $this->db->where('notification_id', $notificationid);
                $this->db->update('notification'); */

                $this->db->where('notification_id', $notificationid);
                $this->db->delete('notification');  
        }
           
        
        public function getStaffComments($id,$personal)
        {
                $query = $this->db->query("SELECT staff.staff_id, comments.* FROM comments INNER JOIN staff ON comments.profile_id=staff.staff_id WHERE comments.profile_id = $id AND comments.profile_type = 2");
                $comments = $query->result();

                foreach($comments as $userid){
                        $query = $this->db->query("SELECT username,avatar FROM users WHERE user_id = $userid->user_id");
                        $users = $query->result();
                        $userid->{"username"} = $users[0]->username;
                        $userid->{"avatar"} = $users[0]->avatar;
                }
                
                $i=0;

                foreach($comments as $cl){
                        foreach($personal as $li){
                                if($cl->user_id == $li->user_id){
                                        unset($comments[$i]);

                                }
                        }
                        $i++;
                }

                return $comments;
        }

        public function personalcommentst($id,$user_id,$type)
        {
                if($type == 2){
                        $query = $this->db->query("SELECT staff.staff_id, comments.* FROM comments INNER JOIN staff ON comments.profile_id=staff.staff_id WHERE comments.profile_id = $id AND comments.profile_type = 2 AND user_id = $user_id");
                }else if($type == 3){
                        $query = $this->db->query("SELECT characters.character_id, comments.* FROM comments INNER JOIN characters ON comments.profile_id=characters.character_id WHERE comments.profile_id = $id AND comments.profile_type = 3 AND user_id = $user_id");

                }
                
                $comments = $query->result();
                foreach($comments as $userid){
                        $query = $this->db->query("SELECT username,avatar FROM users WHERE user_id = $userid->user_id");
                        $users = $query->result();
                        $userid->{"username"} = $users[0]->username;
                        $userid->{"avatar"} = $users[0]->avatar;
                }
                return $comments;
        }

        public function getCharComments($id,$personal)
        {
                $query = $this->db->query("SELECT characters.character_id, comments.* FROM comments INNER JOIN characters ON comments.profile_id=characters.character_id WHERE comments.profile_id = $id AND comments.profile_type = 3");
                $comments = $query->result();
                $i=0;

                foreach($comments as $cl){
                        foreach($personal as $li){
                                if($cl->user_id == $li->user_id){
                                        unset($comments[$i]);

                                }
                        }
                        $i++;
                }
                foreach($comments as $userid){
                        $query = $this->db->query("SELECT username,avatar FROM users WHERE user_id = $userid->user_id");
                        $users = $query->result();
                        $userid->{"username"} = $users[0]->username;
                        $userid->{"avatar"} = $users[0]->avatar;
                }
                return $comments;
        }
        public function personalcomment($id,$user_id)
        {
                $query = $this->db->query("SELECT characters.character_id, comments.* FROM comments INNER JOIN characters ON comments.profile_id=characters.character_id WHERE comments.profile_id = $id AND comments.profile_type = 3 AND user_id = $user_id");
                $comments = $query->result();

                return $comments;
        }

        

}
