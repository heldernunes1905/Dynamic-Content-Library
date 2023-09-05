<?php
class model extends CI_Model
{

        public function getContentList($contentType)
        {
                $query = $this->db->query("SELECT content.contentId FROM content WHERE content_type= '$contentType'");
                $genre_total = $query->result();
                $i = 0;
                $j = 0;
                $genrestdif = array();
                $genrest = array();
                $content = array();
                $contentnogenre = array();


                foreach($genre_total as $genre){
                        $query = $this->db->query("SELECT content.contentId,genrecontent.genre_id FROM genrecontent INNER JOIN content ON genrecontent.content_id=content.contentId WHERE genrecontent.content_id=$genre->contentId");
                        array_push($genrestdif,$query->result());
                }
                foreach($genrestdif as $genres){
                        if($genres[0]->genre_id == 0 ){
                                $differentGenres = array();
                                $putGenre = array();
                                $store = "";
                                $genre_total = $genres[0]->genre_id;
                                $myArray = explode(',', $genre_total);
                                $query = $this->db->query("SELECT content.* FROM content WHERE contentId =". $genres[0]->contentId);
                                array_push($contentnogenre,$query->result());
                                $contentnogenre[$j][0]->{"name"} = $genre_total;
                                $j++;
                        }else{

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
                        
                }
                foreach($contentnogenre as $cg){
                        array_push($content,$cg);
                }

                //get studio for content
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
                
                //get average rating

                    


                return $content;
        }


        public function getContentListNew($contentType)
        {
                //$query = $this->db->query("SELECT content.contentId FROM content WHERE content_type= '$contentType' AND release_date>= DATE_SUB(NOW(), INTERVAL 2 MONTH) AND release_date <= NOW()");// get new content in the last 2 months
                $query = $this->db->query("SELECT content.contentId FROM content WHERE content_type= '$contentType'");

                $genre_total = $query->result();
                $i = 0;
                $j = 0;
                $genrestdif = array();
                $genrest = array();
                $content = array();
                $contentnogenre = array();


                foreach($genre_total as $genre){
                        $query = $this->db->query("SELECT content.contentId,genrecontent.genre_id FROM genrecontent INNER JOIN content ON genrecontent.content_id=content.contentId WHERE genrecontent.content_id=$genre->contentId");
                        array_push($genrestdif,$query->result());
                }
                foreach($genrestdif as $genres){
                        if($genres[0]->genre_id == 0 ){
                                $differentGenres = array();
                                $putGenre = array();
                                $store = "";
                                $genre_total = $genres[0]->genre_id;
                                $myArray = explode(',', $genre_total);
                                $query = $this->db->query("SELECT content.* FROM content WHERE contentId =". $genres[0]->contentId);
                                array_push($contentnogenre,$query->result());
                                $contentnogenre[$j][0]->{"name"} = $genre_total;
                                $j++;
                        }else{

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
                        
                }
                foreach($contentnogenre as $cg){
                        array_push($content,$cg);
                }

                //get studio for content
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
                
                //get average rating

                    


                return $content;
        }



        public function getContentListUpcoming($contentType)
        {
                //$query = $this->db->query("SELECT content.contentId FROM content WHERE content_type= '$contentType' AND release_date >= DATE_ADD(NOW(), INTERVAL 0 DAY) AND release_date <= DATE_ADD(NOW(), INTERVAL 2 MONTH)");
                $query = $this->db->query("SELECT content.contentId FROM content WHERE content_type= '$contentType'");

                $genre_total = $query->result();
                $i = 0;
                $j = 0;
                $genrestdif = array();
                $genrest = array();
                $content = array();
                $contentnogenre = array();


                foreach($genre_total as $genre){
                        $query = $this->db->query("SELECT content.contentId,genrecontent.genre_id FROM genrecontent INNER JOIN content ON genrecontent.content_id=content.contentId WHERE genrecontent.content_id=$genre->contentId");
                        array_push($genrestdif,$query->result());
                }
                foreach($genrestdif as $genres){
                        if($genres[0]->genre_id == 0 ){
                                $differentGenres = array();
                                $putGenre = array();
                                $store = "";
                                $genre_total = $genres[0]->genre_id;
                                $myArray = explode(',', $genre_total);
                                $query = $this->db->query("SELECT content.* FROM content WHERE contentId =". $genres[0]->contentId);
                                array_push($contentnogenre,$query->result());
                                $contentnogenre[$j][0]->{"name"} = $genre_total;
                                $j++;
                        }else{

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
                        
                }
                foreach($contentnogenre as $cg){
                        array_push($content,$cg);
                }

                //get studio for content
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
                
                //get average rating

                    


                return $content;
        }

        function getUserRecomAllList($type){
                $query = $this->db->query("SELECT * FROM recommend ORDER  BY recommend.date");
                $recommendation = $query->result(); 
                
                foreach($recommendation as $rec){
                    $query = $this->db->query("SELECT content.*
                    FROM recommend 
                    INNER JOIN content ON recommend.content_id_chose= content.contentId 
                    WHERE content.contentId = $rec->content_id_chose
                    AND content.content_type = '$type'");
                    $rec_old = $query->result(); 
        
                if(!empty($rec_old)){
                        $rec->{"oldid"} = $rec_old[0]->contentId;
                        $rec->{"oldtitle"} = $rec_old[0]->title;
                        $rec->{"oldimage"} = $rec_old[0]->images;
            
                        $query = $this->db->query("SELECT content.*
                        FROM recommend 
                        INNER JOIN content ON recommend.content_id_recommended= content.contentId 
                        WHERE content.contentId = $rec->content_id_recommended");
                        $rec_new = $query->result(); 
    
                        $rec->{"newid"} = $rec_new[0]->contentId;
                        $rec->{"newtitle"} = $rec_new[0]->title;
                        $rec->{"newimage"} = $rec_new[0]->images;
            
            
                        $query = $this->db->query("SELECT users.*
                        FROM recommend 
                        INNER JOIN users ON recommend.user_id= recommend.user_id 
                        WHERE users.user_id = $rec->user_id");
                        $rec_id = $query->result(); 
            
                        $rec->{"avatar"} = $rec_id[0]->avatar;
                        $rec->{"username"} = $rec_id[0]->username;
                        $rec->{"user_id"} = $rec_id[0]->user_id;
            
                        $rec->{"content_type"} = $rec_old[0]->content_type;
                }
        
                    
        
                }

                
                
                
                return $recommendation;
                
            }

        public function getContentListHigherRated($contentType)
        {
                $query = $this->db->query("SELECT content.contentId FROM content WHERE content_type= '$contentType' ORDER BY rating DESC");
                $genre_total = $query->result();
                $i = 0;
                $j = 0;
                $genrestdif = array();
                $genrest = array();
                $content = array();
                $contentnogenre = array();


                foreach($genre_total as $genre){
                        $query = $this->db->query("SELECT content.contentId,genrecontent.genre_id FROM genrecontent INNER JOIN content ON genrecontent.content_id=content.contentId WHERE genrecontent.content_id=$genre->contentId");
                        array_push($genrestdif,$query->result());
                }
                foreach($genrestdif as $genres){
                        if($genres[0]->genre_id == 0 ){
                                $differentGenres = array();
                                $putGenre = array();
                                $store = "";
                                $genre_total = $genres[0]->genre_id;
                                $myArray = explode(',', $genre_total);
                                $query = $this->db->query("SELECT content.* FROM content WHERE contentId =". $genres[0]->contentId);
                                array_push($contentnogenre,$query->result());
                                $contentnogenre[$j][0]->{"name"} = $genre_total;
                                $j++;
                        }else{

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
                        
                }
                foreach($contentnogenre as $cg){
                        array_push($content,$cg);
                }

                //get studio for content
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
                
                //get average rating

                    


                return $content;
        }

        public function getdisplayinfo($id)
        {
                $query = $this->db->query("SELECT Content.*, studio.first_name,studio.last_name FROM Content INNER JOIN studio ON content.studio_id=studio.studio_id WHERE contentId = $id");
                if(empty($query->result())){
                        $query = $this->db->query("SELECT * FROM Content WHERE contentId = $id");

                }
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
                        

                        $query = $this->db->query("SELECT Content.*, studio.first_name,studio.last_name FROM Content INNER JOIN studio ON content.studio_id=studio.studio_id WHERE content.studio_id = $id AND content.contentId =".$genres[0]->contentId);
                        $cotentnogenre = $query->result();

                        if(!empty($query->result())){
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
                        }else{
                                
                                $cotentnogenre[0]->{"name"} = 'No genre';
                                array_push($content,$cotentnogenre);

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

                return $content;
        }


        public function getStudioContentStuff($id)
        {
                $query = $this->db->query("SELECT * FROM studio WHERE studio_id = $id");
                $studio_stuff = $query->result();

                return $studio_stuff;
        }

        public function getGenreContentStuff($id)
        {
                $query = $this->db->query("SELECT * FROM genre WHERE name ='".$id."'");
                $studio_stuff = $query->result();

                return $studio_stuff;
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
                //get the rating belonging to the user logged in under a particular content
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

        public function getalldisplayrating($id)
        {
                $query = $this->db->query("SELECT user_rating
                FROM personalrating 
                WHERE content_id = $id");
                $userrating = $query->result();
                
                    
                return $userrating;
        }

        public function getStatsinside($id,$type)
        {
                $query = $this->db->query("SELECT content_id,list_state
                FROM lists 
                WHERE list_type = $type");
                $stats = $query->result();
                $content_stats = array();

                $watched = 0;
                $watch = 0;
                $stall = 0;
                $drop = 0;


                foreach($stats as $st){
                        if(!empty($st->content_id)){

                                $content_id = explode(",",$st->content_id);
                                $size = strlen($st->content_id);
                                
                                if (($key = array_search($id, $content_id)) !== false) {

                                        if($st->list_state == 1){
                                                $watched++;
                                        }else if($st->list_state == 2){
                                                $watch++; 
                                        }else if($st->list_state == 3){
                                                $stall++;  
                                        }else if($st->list_state == 4){
                                                $drop++;   
                                        }
                                }
                                
                        }
                }

                array_push($content_stats,$watched,$watch,$stall,$drop);
                

                return $content_stats;
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

        public function getdisplayuserratingtop($id,$firstcomment)
        {
                if(isset($this->session->userdata['logged_in'])){
                        $limit = 4;
                }else{
                        $limit = 3;
                }


                $query = $this->db->query("SELECT personalrating.*, users.user_id, users.username, users.avatar
                FROM personalrating 
                INNER JOIN users ON personalrating.user_id= users.user_id 
                INNER JOIN content ON personalrating.content_id=content.contentId
                WHERE content.contentId = $id
                ORDER  BY personalrating.daterate DESC LIMIT  $limit;");
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

                foreach($contentAllGenre as $ct){
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
                if(!empty( $query->result())){
                        $staff_total = $query->result()[0]->staff_id;
                        $myArray = explode(',', $staff_total);
                        $charactersdif = array();
                        foreach($myArray as $character){
                                $query = $this->db->query("SELECT staff.* FROM staff_character 
                                INNER JOIN staff ON staff_character.staff_id= staff.staff_id 
                                INNER JOIN characters ON staff_character.character_id=characters.character_id 
                                WHERE staff_character.staff_id  = $character");
                                array_push($charactersdif,$query->result());
                        }
                        return $charactersdif;
                }
                
                
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

        public function getPreferencesLike($id)
        {
                $query = $this->db->query("SELECT character_like FROM userpreferences WHERE user_id = $id AND like_state = 1");
                $likepreferences = $query->result();
                if(empty($likepreferences)){
                        return;
                }
                $likedcharacter = explode(',', $likepreferences[0]->character_like);
                
                return $likedcharacter;
        }
        

        public function getPreferencesDislike($id)
        {
                $query = $this->db->query("SELECT character_like FROM userpreferences WHERE user_id = $id AND like_state = 0");
                $likepreferences = $query->result();
                if(empty($likepreferences)){
                        return;
                }
                $dislikedcharacter = explode(',', $likepreferences[0]->character_like);
                
                return $dislikedcharacter;
        }

        public function getPreferencesLikeS($id)
        {
                $query = $this->db->query("SELECT producer_like,writer_like,actor_like FROM userpreferences WHERE user_id = $id AND like_state = 1");
                $likepreferences = $query->result();
                if(empty($likepreferences)){
                        return;
                }
                $likedprod = explode(',', $likepreferences[0]->producer_like);
                $likedwrite = explode(',', $likepreferences[0]->writer_like);
                $likedactor = explode(',', $likepreferences[0]->actor_like);

                $likedstuff = array();

                array_push($likedstuff,$likedactor,$likedprod,$likedwrite);


                return $likedstuff;
        }
        

        public function getPreferencesDislikeS($id)
        {
                $query = $this->db->query("SELECT producer_like,writer_like,actor_like FROM userpreferences WHERE user_id = $id AND like_state = 0");
                $likepreferences = $query->result();
                if(empty($likepreferences)){
                        return;
                }
                $dislikedprod = explode(',', $likepreferences[0]->producer_like);
                $dislikedwrite = explode(',', $likepreferences[0]->writer_like);
                $dislikedactor = explode(',', $likepreferences[0]->actor_like);

                $dislikedstuff = array();

                array_push($dislikedstuff,$dislikedactor,$dislikedprod,$dislikedwrite);


                return $dislikedstuff;
        }

        public function getPreferencesLikeContent($id)
        {
                $query = $this->db->query("SELECT content_like FROM userpreferences WHERE user_id = $id AND like_state = 1");
                $likepreferences = $query->result();
                if(empty($likepreferences)){
                        return;
                }
                $likedcontent = explode(',', $likepreferences[0]->content_like);
                
                return $likedcontent;
        }

        public function getUserWatchep_number($id,$content_id)
        {
                $query = $this->db->query("SELECT ep_amount FROM watchlist WHERE user_id = $id AND content_id = $content_id");
                $ep_amount_user = $query->result();
                
                

                return $ep_amount_user;
        }

        public function getPreferencesDislikeContent($id)
        {
                $query = $this->db->query("SELECT content_like FROM userpreferences WHERE user_id = $id AND like_state = 0");
                $likepreferences = $query->result();
                if(!empty($likepreferences)){
                        $likedcontent = explode(',', $likepreferences[0]->content_like);
                        return $likedcontent;

                }
        }

        public function getPreferencesLikeStudio($id)
        {
                $query = $this->db->query("SELECT studio_like FROM userpreferences WHERE user_id = $id AND like_state = 1");
                $likepreferences = $query->result();
                if(empty($likepreferences)){
                        return;
                }
                $likedcontent = explode(',', $likepreferences[0]->studio_like);
                
                return $likedcontent;
        }

        public function getPreferencesDislikeStudio($id)
        {
                $query = $this->db->query("SELECT studio_like FROM userpreferences WHERE user_id = $id AND like_state = 0");
                $likepreferences = $query->result();
                if(empty($likepreferences)){
                        return;
                }
                $likedcontent = explode(',', $likepreferences[0]->studio_like);
                
                return $likedcontent;
        }


        public function getPreferencesLikeGenre($id)
        {
                $query = $this->db->query("SELECT genre_like FROM userpreferences WHERE user_id = $id AND like_state = 1");
                $likepreferences = $query->result();
                if(empty($likepreferences)){
                        return;
                }
                $likedcontent = explode(',', $likepreferences[0]->genre_like);
                
                return $likedcontent;
        }

        public function getPreferencesDislikeGenre($id)
        {
                $query = $this->db->query("SELECT genre_like FROM userpreferences WHERE user_id = $id AND like_state = 0");
                $likepreferences = $query->result();
                if(empty($likepreferences)){
                        return;
                }
                $likedcontent = explode(',', $likepreferences[0]->genre_like);
                
                return $likedcontent;
        }

        public function changerating($user_id,$contentId,$rating)
        {

                //get rating user left
                $query = $this->db->query("SELECT * FROM personalrating WHERE content_id = $contentId AND user_id = $user_id");
                $ratingquery = $query->result();


                //if not empty it gets updated
                if(!empty($ratingquery)){
                        $this->db->set('user_rating', $rating);
                        $this->db->where('user_id', $user_id);
                        $this->db->where('content_id', $contentId);
                        $this->db->update('personalrating');                
                }else{//if its empty it gets inserted
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
                        $this->db->set('active', 0);
                        $this->db->where('user_id', $user_id);
                        $this->db->where('content_id', $contentId);
                        $this->db->update('personalrating');
                        
                        return;
                }
                

                if(!empty($contentquery)){
                        $this->db->set('userdescription', $comment);
                        $this->db->set('usertitle', $title);
                        $this->db->set('active', 1);
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

        public function addwatchlist($user_id,$contentId,$watchlist)
        {
                //get data from content
                $query = $this->db->query("SELECT content_type,ep_number FROM content WHERE contentId = $contentId ");
                $contentquery = $query->result();
                $content_type = $contentquery[0]->content_type;

                //select content type
                switch($content_type){
                        case "movie":
                                $list_type = 1;
                                break;
                        case "show":
                                $list_type = 2;
                                break;
                        case "book":
                                $list_type = 3;
                                break;
                        case "game":
                                $list_type = 4;
                                break; 
                }

                //get info from lists where it contains teh list type, the user logged and the state meaning if its watched/stalled
                $query = $this->db->query("SELECT * FROM lists WHERE list_state = $watchlist AND user_id = $user_id AND list_type = $list_type");
                $listexists = $query->result();
                

                //if there is no list like that insert one
                if(empty($listexists)){
                        $object = array(
                                'user_id' => $user_id,
                                'content_id' => $contentId,
                                'list_type' => $list_type,
                                'list_state' => $watchlist,
                                'list_public' => 1
                                
                        );
                        $this->db->insert('lists', $object);
                }else{//we update the list here
                        $query = $this->db->query("SELECT * FROM lists WHERE user_id = $user_id AND list_type = $list_type");//get list info
                        $transfeltlist = $query->result();
                        $newlist = "";
                        $newlistid = array();

                        foreach($transfeltlist as $li){
                                array_push($newlistid,$li->list_id);//put list id into an array
                        }


                        foreach($transfeltlist as $li){
                                $myArray = explode(',', $li->content_id);//put all content ids into an array
                                
                                foreach($myArray as $my){
                                        if($my == $contentId){        
                                                if (($key = array_search($contentId, $myArray)) !== false) {//if it found the particular content in the list, it removes it and turns the array into a string
                                                        unset($myArray[$key]);
                                                        $newlist = implode(',',$myArray);
                                                }
                                                if (($key = array_search($li->list_id, $newlistid)) !== false) {//remove the id of the list we are going to update
                                                        unset($newlistid[$key]);
                                                        
                                                }
                                                
                                                //update list
                                                $this->db->set('content_id', $newlist);
                                                $this->db->where('list_id', $li->list_id);
                                                $this->db->update('lists');  
                                        }
                                }
                        }

                        //select the new watchlist we are updating
                        $query = $this->db->query("SELECT * FROM lists WHERE list_state=$watchlist AND user_id = $user_id AND list_type = $list_type");
                        $transfeltlist = $query->result();
                        foreach($transfeltlist as $li){
                                foreach($newlistid as $newl){
                                        if($newl == $li->list_id){
                                                //add the Id to the current string in the table
                                                $newlistadd = $li->content_id.",".$contentId;
                                                $this->db->set('content_id', $newlistadd);
                                                $this->db->where('list_id', $li->list_id);
                                                $this->db->update('lists');  
                                        }
                                }
                        }

                }

                //update watchlist
                $query = $this->db->query("SELECT * FROM watchlist WHERE user_id = $user_id AND content_id = $contentId");
                $listexists = $query->result();
                

                //if user has not seen it so its the first time it inserts a new record but if they click the watched button it edits the amount they've watched to the max amount
                if(empty($listexists)){
                        $object = array(
                                'user_id' => $user_id,
                                'content_id' => $contentId,
                                'ep_amount' => 0
                                
                        );
                        $this->db->insert('watchlist', $object);
                }else if($watchlist == 1){

                        $this->db->set('ep_amount', $contentquery[0]->ep_number);
                        $this->db->where('content_id', $contentId);
                        $this->db->where('user_id', $user_id);
                        $this->db->update('watchlist');  
                }
               
                

        }

        public function removewatchlist($user_id,$contentId)
        {
                //select the watchlists from the user, it excludes custom one bc they would be 5
                $query = $this->db->query("SELECT * FROM lists WHERE user_id = $user_id AND list_type BETWEEN 1 AND 4 ");
                $contentquery = $query->result();

                //go through array until it finds the content with the same id and then remove it and upload the new array to change the user's watchlist
                foreach($contentquery as $cq){
                        $myArray = explode(',', $cq->content_id);
                        foreach($myArray as $my){
                                if($my == $contentId){        
                                        if (($key = array_search($contentId, $myArray)) !== false) {
                                                unset($myArray[$key]);
                                                $newlist = implode(',',$myArray);
                                        }
                                        
                                        $this->db->set('content_id', $newlist);
                                        $this->db->where('list_id', $cq->list_id);
                                        $this->db->update('lists');  
                                }
                        }
                }

                /*$this->db->set('ep_amount', 0);
                $this->db->where('content_id', $contentId);
                $this->db->where('user_id', $user_id);
                $this->db->update('watchlist');*/

        }

        public function removewatchlistep($user_id,$contentId)
        {
                $query = $this->db->query("SELECT * FROM watchlist WHERE user_id = $user_id AND content_id = $contentId");
                $contentquery = $query->result();

               if(empty($contentquery)){
                return;
               }else{
                $this->db->where('content_id', $contentId);
                $this->db->where('user_id', $user_id);
                $this->db->delete('watchlist');
               }
                

        }

        public function addwatchlistep($user_id,$contentId,$episodes)
        {
                $query = $this->db->query("SELECT * FROM watchlist WHERE user_id = $user_id AND content_id = $contentId");
                $contentquery = $query->result();
                
                
                if(!empty($contentquery)){

                        $this->db->set('ep_amount', $episodes);
                        $this->db->where('user_id', $user_id);
                        $this->db->where('content_id', $contentId);
                        $this->db->update('watchlist');                
                }else{
                        $object = array(
                                'user_id' => $user_id,
                                'ep_amount' => $episodes,
                                'content_id' => $contentId,
                        );
                        $this->db->insert('watchlist', $object);
                }
        }

        public function addcharacterContent($user_id,$charId,$comment,$title)
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
                        $this->db->set('comment_title', $title);
                        $this->db->set('date', date('Y-m-d H:i:s'));
                        $this->db->where('user_id', $user_id);
                        $this->db->where('profile_id', $charId);
                        $this->db->where('profile_type', 3);
                        $this->db->update('comments');                
                }else{
                        $object = array(
                                'user_id' => $user_id,
                                'comment_title' => $title,
                                'profile_id' => $charId,
                                'profile_type' => 3,
                                'comment_type' => 1,
                                'comment' => $comment,
                                'date' => date('Y-m-d H:i:s')
                        );
                        $this->db->insert('comments', $object);
                }
        }




        public function addstaffcontent($user_id,$charId,$comment,$title)
        {
                //if comment is that string it gets deleted
                if($comment == "fwhyalhiçufoijj3qop9e4u018rhoirFHUAUIFLfkfkuNKUWKNUewcuknec"){
                        $this->db->where('user_id', $user_id);
                        $this->db->where('profile_id', $charId);
                        $this->db->where('profile_type', 2);

                        $this->db->delete('comments');
                        return;
                }


                //see if the comment exists
                $query = $this->db->query("SELECT staff.staff_id, comments.* FROM comments 
                INNER JOIN staff ON comments.profile_id=staff.staff_id WHERE comments.profile_id = $charId 
                AND comments.profile_type = 2 AND comments.user_id=$user_id");
                $contentquery = $query->result();

                date_default_timezone_set('Europe/Lisbon');

                if(!empty($contentquery)){
                        $this->db->set('comment', $comment);
                        $this->db->set('comment_title', $title);

                        $this->db->set('date', date('Y-m-d H:i:s'));
                        $this->db->where('user_id', $user_id);
                        $this->db->where('profile_type', 2);

                        $this->db->where('profile_id', $charId);
                        $this->db->update('comments');                
                }else{
                        $object = array(
                                'user_id' => $user_id,
                                'comment_title' => $title,
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

        public function getContentsShow()
        {
                $query = $this->db->query('SELECT * FROM content LIMIT 6');
                return $query->result();
        }

        public function getNewContentListShow($type)
        {
                //$query = $this->db->query("SELECT * FROM content WHERE content_type= '$type' AND release_date>= DATE_SUB(NOW(), INTERVAL 2 WEEK) AND release_date <= NOW() LIMIT 6");
                $query = $this->db->query("SELECT * FROM content WHERE content_type= '$type' LIMIT 6");

                return $query->result();
        }
        
        
        public function getContentListUpcomingShow($type)
        {
                //$query = $this->db->query("SELECT * FROM content WHERE content_type= '$type' 
                //AND release_date >= DATE_ADD(NOW(), INTERVAL 0 DAY) AND release_date <= DATE_ADD(NOW(), INTERVAL 2 MONTH) LIMIT 6");
                $query = $this->db->query("SELECT * FROM content WHERE content_type= '$type' LIMIT 6");
                return $query->result();
        }


        public function getContentListHigherRatedShow($type)
        {
                $query = $this->db->query("SELECT * FROM content WHERE content_type= '$type' ORDER BY rating DESC LIMIT 6");
                return $query->result();
        }

        public function getContentListRoulette($type)
        {
                $query = $this->db->query("SELECT * FROM content WHERE content_type= '$type' ORDER BY RAND() DESC LIMIT 6");
                return $query->result();
        }

        public function getContentListNewShow($type)
        {
                //$query = $this->db->query("SELECT * FROM content WHERE content_type= '$type' AND release_date>= DATE_SUB(NOW(), INTERVAL 2 MONTH) AND release_date <= NOW() LIMIT 6");
                $query = $this->db->query("SELECT * FROM content WHERE content_type= '$type' LIMIT 6");

                return $query->result();
        }

       
        public function getAllMovieList()
        {
                $query = $this->db->query('SELECT contentId,title,images FROM content WHERE content_type ="movie"');
                return $query->result();
        }

        public function getAllShowList()
        {
                $query = $this->db->query('SELECT contentId,title,images FROM content WHERE content_type ="show"');
                return $query->result();
        }

        public function getAllGameList()
        {
                $query = $this->db->query('SELECT contentId,title,images FROM content WHERE content_type ="game"');
                return $query->result();
        }

        public function getAllBookList()
        {
                $query = $this->db->query('SELECT contentId,title,images FROM content WHERE content_type ="book"');
                return $query->result();
        }

        public function getAllStaffList()
        {
                $query = $this->db->query('SELECT staff_id,first_name,last_name,pictures FROM staff ');
                return $query->result();
        }

        public function getAllCharacterList()
        {
                $query = $this->db->query('SELECT character_id,first_name,last_name,pictures FROM characters ');
                return $query->result();
        }

        public function getAllUserList()
        {
                $query = $this->db->query('SELECT user_id,username FROM users ');
                return $query->result();
        }


        public function getNotification($id)
        {
                $query = $this->db->query("SELECT notification.*, users.username FROM 
                notification INNER JOIN users ON notification.user_id=users.user_id 
                WHERE users.user_id = $id AND notification.status = 1");
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

        public function removenotifuser($user_id)
        {
                /*$this->db->set('status', 2);
                $this->db->where('notification_id', $notificationid);
                $this->db->update('notification'); */

                $this->db->where('user_id', $user_id);
                $this->db->delete('notification');  
        }
           
        
        public function getStaffComments($id,$personal)
        {

                if(isset($this->session->userdata['logged_in'])){
                        $limit = 4;
                }else{
                        $limit = 3;
                }



                $query = $this->db->query("SELECT staff.staff_id, comments.* FROM comments INNER JOIN staff ON comments.profile_id=staff.staff_id WHERE comments.profile_id = $id AND comments.profile_type = 2  ORDER  BY comments.date DESC LIMIT  $limit;");
                
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

                if(isset($this->session->userdata['logged_in'])){
                        $limit = 4;
                }else{
                        $limit = 3;
                }

                $query = $this->db->query("SELECT characters.character_id, comments.* FROM comments INNER JOIN characters ON comments.profile_id=characters.character_id WHERE comments.profile_id = $id AND comments.profile_type = 3  ORDER  BY comments.date DESC LIMIT  $limit;");
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

        function getUserRecomContent($type){

                //get the 3 youngest recommendations
                $query = $this->db->query("SELECT * FROM recommend ORDER  BY recommend.date DESC LIMIT 3");
                $recommendation = $query->result(); 
                
                foreach($recommendation as $rec){
                
                // Get content information related to a particular in this case the one used to recommend
                    $query = $this->db->query("SELECT content.*
                    FROM recommend 
                    INNER JOIN content ON recommend.content_id_chose= content.contentId 
                    WHERE content.contentId = $rec->content_id_chose
                    AND content.content_type = '$type'");
                    $rec_old = $query->result(); 
        
                    if(!empty($rec_old)){
        
                    $rec->{"oldid"} = $rec_old[0]->contentId;
                    $rec->{"oldtitle"} = $rec_old[0]->title;
                    $rec->{"oldimage"} = $rec_old[0]->images;
        

                // Get content information related to a particular in this case the one being recommended
                    $query = $this->db->query("SELECT content.*
                    FROM recommend 
                    INNER JOIN content ON recommend.content_id_recommended= content.contentId 
                    WHERE content.contentId = $rec->content_id_recommended");
                    $rec_new = $query->result(); 

                    $rec->{"newid"} = $rec_new[0]->contentId;
                    $rec->{"newtitle"} = $rec_new[0]->title;
                    $rec->{"newimage"} = $rec_new[0]->images;

                    
        
                //get user data
                    $query = $this->db->query("SELECT users.*
                    FROM recommend 
                    INNER JOIN users ON recommend.user_id= recommend.user_id 
                    WHERE users.user_id = $rec->user_id");
                    $rec_id = $query->result(); 
        
                    $rec->{"avatar"} = $rec_id[0]->avatar;
                    $rec->{"username"} = $rec_id[0]->username;
                    $rec->{"user_id"} = $rec_id[0]->user_id;
        
                    $rec->{"content_type"} = $rec_old[0]->content_type;
                    }    
                }
        
                return $recommendation;
                
        }


        function getUserRecom(){
                $query = $this->db->query("SELECT * FROM recommend ORDER  BY recommend.date DESC LIMIT 3");
                $recommendation = $query->result(); 
                
                foreach($recommendation as $rec){
                    $query = $this->db->query("SELECT content.*
                    FROM recommend 
                    INNER JOIN content ON recommend.content_id_chose= content.contentId 
                    WHERE content.contentId = $rec->content_id_chose");
                    $rec_old = $query->result(); 
        
                    
        
                    $rec->{"oldid"} = $rec_old[0]->contentId;
                    $rec->{"oldtitle"} = $rec_old[0]->title;
                    $rec->{"oldimage"} = $rec_old[0]->images;
        

                    $query = $this->db->query("SELECT content.*
                    FROM recommend 
                    INNER JOIN content ON recommend.content_id_recommended= content.contentId 
                    WHERE content.contentId = $rec->content_id_recommended");
                    $rec_new = $query->result(); 

                    $rec->{"newid"} = $rec_new[0]->contentId;
                    $rec->{"newtitle"} = $rec_new[0]->title;
                    $rec->{"newimage"} = $rec_new[0]->images;

                    
        
        
                    $query = $this->db->query("SELECT users.*
                    FROM recommend 
                    INNER JOIN users ON recommend.user_id= recommend.user_id 
                    WHERE users.user_id = $rec->user_id");
                    $rec_id = $query->result(); 
        
                    $rec->{"avatar"} = $rec_id[0]->avatar;
                    $rec->{"username"} = $rec_id[0]->username;
                    $rec->{"user_id"} = $rec_id[0]->user_id;
        
                    $rec->{"content_type"} = $rec_old[0]->content_type;        
                }
        
                return $recommendation;
                
            }

            function getUserRecomAll(){
                $query = $this->db->query("SELECT * FROM recommend ORDER  BY recommend.date");
                $recommendation = $query->result(); 
                
                foreach($recommendation as $rec){
                    $query = $this->db->query("SELECT content.*
                    FROM recommend 
                    INNER JOIN content ON recommend.content_id_chose= content.contentId 
                    WHERE content.contentId = $rec->content_id_chose");
                    $rec_old = $query->result(); 
        
                   
        
                    $rec->{"oldid"} = $rec_old[0]->contentId;
                    $rec->{"oldtitle"} = $rec_old[0]->title;
                    $rec->{"oldimage"} = $rec_old[0]->images;
        
                    $query = $this->db->query("SELECT content.*
                    FROM recommend 
                    INNER JOIN content ON recommend.content_id_recommended= content.contentId 
                    WHERE content.contentId = $rec->content_id_recommended");
                    $rec_new = $query->result(); 

                    $rec->{"newid"} = $rec_new[0]->contentId;
                    $rec->{"newtitle"} = $rec_new[0]->title;
                    $rec->{"newimage"} = $rec_new[0]->images;
        
        
                    $query = $this->db->query("SELECT users.*
                    FROM recommend 
                    INNER JOIN users ON recommend.user_id= recommend.user_id 
                    WHERE users.user_id = $rec->user_id");
                    $rec_id = $query->result(); 
        
                    $rec->{"avatar"} = $rec_id[0]->avatar;
                    $rec->{"username"} = $rec_id[0]->username;
                    $rec->{"user_id"} = $rec_id[0]->user_id;
        
                    $rec->{"content_type"} = $rec_old[0]->content_type;
        
                }
        
                return $recommendation;
                
            }


            public function getForumMains()
        {
                $query = $this->db->query("SELECT * FROM forum WHERE public = 1");
                $forum = $query->result();

                return $forum;
        }

        public function getForumMainsAdmin($publicity)
        {
                
                if($publicity == 'all'){
                        $query = $this->db->query("SELECT * FROM forum");
                        $forum = $query->result();
        
                }else if($publicity == 'private'){
                        $query = $this->db->query("SELECT * FROM forum WHERE public = 0");
                        $forum = $query->result();
        
                }if($publicity == 'public'){
                        $query = $this->db->query("SELECT * FROM forum WHERE public = 1");
                $forum = $query->result();

                }

                return $forum;
        }



        public function addforum($title,$description,$public,$date)
        {

                $object = array(
                        'title' => $title,
                        'description' => $description,
                        'date' => $date,
                        'public' => $public
                );
                $this->db->insert('forum', $object);
        }



        public function deleteforum($forum_id)
        {

                $this->db->where('forum_id', $forum_id);
                $this->db->delete('forum');
                return;
        }

        public function modforum($title,$description,$public,$date,$forum_id)
        {

                $this->db->set('title', $title);
                $this->db->set('description', $description);
                $this->db->set('public', $public);
                $this->db->set('date', $date);
                $this->db->where('forum_id', $forum_id);
                $this->db->update('forum');  

                
        }


        public function getThreadMain($forumId)
        {
                $query = $this->db->query("SELECT * FROM thread WHERE forum_id = $forumId AND public = 1");
                $thread = $query->result();

                
                return $thread;
        }

        public function getThreadMainAdmin($forumId,$publicity)
        {

                if($publicity == 'all'){
                        $query = $this->db->query("SELECT * FROM thread WHERE forum_id = $forumId");
                        $thread = $query->result();
                }else if($publicity == 'private'){
                        $query = $this->db->query("SELECT * FROM thread WHERE forum_id = $forumId AND public = 0");
                        $thread = $query->result();
                }if($publicity == 'public'){
                        $query = $this->db->query("SELECT * FROM thread WHERE forum_id = $forumId AND public = 1");
                        $thread = $query->result();
                }
                

                return $thread;
        }

        public function addthread($title,$description,$public,$date,$forum_id)
        {

                $object = array(
                        'forum_id' => $forum_id,
                        'title' => $title,
                        'description' => $description,
                        'date' => $date,
                        'public' => $public
                );
                $this->db->insert('thread', $object);
        }



        public function getThreadInside($thread_id)
        {
                $query = $this->db->query("SELECT comments.comment_id,
                comments.comment, comments.date, users.username, users.user_id, users.avatar
                FROM comments
                INNER JOIN users ON comments.user_id = users.user_id
                WHERE comments.comment_type = 3 AND comments.profile_type = 4 AND comments.profile_id = $thread_id");
                $thread_ones = $query->result();


                return $thread_ones;
        }

        public function getThreadPersonalComment($thread_id,$user_id)
        {
                $query = $this->db->query("SELECT comments.comment_id,
                comments.comment, comments.date, users.username, users.user_id, users.avatar
                FROM comments
                INNER JOIN users ON comments.user_id = users.user_id
                WHERE comments.comment_type = 3 AND comments.profile_type = 4 AND comments.profile_id = $thread_id
                AND comments.user_id = $user_id");
                $thread_comm = $query->result();


                return $thread_comm;
        }

        public function getPublicThread($forum_id)
        {
                $query = $this->db->query("SELECT public
                FROM forum
                WHERE forum_id = $forum_id AND public = 1");
                $thread_comm = $query->result();
                
                return $thread_comm;
        }

        public function getPublicThreadInside($thread_id)
        {

                $query = $this->db->query("SELECT forum.public
                FROM forum
                INNER JOIN thread ON forum.forum_id = thread.forum_id WHERE thread.thread_id = $thread_id");
                $thread_comm = $query->result();

                if($thread_comm[0]->public == 0){
                        return ;
                }else{
                        $query = $this->db->query("SELECT public
                        FROM thread
                        WHERE thread_id = $thread_id AND public = 1");
                        $thread_comm = $query->result();
                        
                        return $thread_comm;
                }

                
                
        }

        public function getThreadInsideAdmin($thread_id)
        {
                $query = $this->db->query("SELECT comments.comment_id,
                comments.comment, comments.date, users.username, users.user_id, users.avatar
                FROM comments
                INNER JOIN users ON comments.user_id = users.user_id
                WHERE comments.comment_type = 3 AND comments.profile_type = 4 AND comments.profile_id = $thread_id");
                $thread_comm = $query->result();
                

                return $thread_comm;
        }

         public function getThreadInsideName($thread_id)
        {
                $query = $this->db->query("SELECT title,description from thread where thread_id = $thread_id");

                $thread_comm = $query->result();
                

                return $thread_comm;
        }

        public function deletethread($thread_id)
        {

                $this->db->where('thread_id', $thread_id);
                $this->db->delete('thread');
                return;
        }

        public function modThread($title,$description,$public,$date,$thread_id)
        {

                $this->db->set('title', $title);
                $this->db->set('description', $description);
                $this->db->set('public', $public);
                $this->db->set('date', $date);
                $this->db->where('thread_id', $thread_id);
                $this->db->update('thread');  
        }

        

        public function addthreadcomment($user_id,$comment,$thread_id,$date)
        {

                $query = $this->db->query("SELECT * FROM comments WHERE profile_id = $thread_id AND user_id = $user_id AND comment_type = 3 AND profile_type = 4");
                $contentquery = $query->result();
                
                if($comment == "fwhyalhiçufoijj3qop9e4u018rhoirFHUAUIFLfkfkuNKUWKNUewcuknec"){        
                        $this->db->where('comment_id', $thread_id);
                        $this->db->where('user_id', $user_id);
                        $this->db->delete('comments');
                        return;
                }
                
                if(!empty($contentquery)){
                        $this->db->set('comment', $comment);
                        $this->db->set('date', $date);
                        $this->db->where('user_id', $user_id);
                        $this->db->where('profile_id', $thread_id);
                        $this->db->where('profile_type', 4);
                        $this->db->where('comment_type', 3);
                        $this->db->update('comments');  
                }else{
                        $object = array(
                                'user_id' => $user_id,
                                'comment' => $comment,
                                'comment_title' => "title",
                                'profile_id' => $thread_id,
                                'profile_type' => 4,
                                'comment_type' => 3,
                                'date' => $date,
        
                        );
                        $this->db->insert('comments', $object);
                }

                
        }


        public function addcharacterliked($char_id,$user_id)
        {

                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 1");
                $contentquery = $query->result();
                
                if(empty($contentquery)){
                        $object = array(
                                'user_id' => $user_id,
                                'character_like' => $char_id,
                                'like_state' => 1
                        );
                        $this->db->insert('userpreferences', $object);

                }else{
                        $list = $contentquery[0]->character_like;
                        if(empty($list)){
                                $this->db->set('character_like',$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                        }else{
                                $this->db->set('character_like', $list.','.$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                        }
                }
                
                /*$query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 0");
                $contentquery = $query->result();

                if(!empty($contentquery)){
                                $list = $contentquery[0]->character_like;
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($char_id, $list_char)) !== false) {
                    
                                        if($size == 1){
                                                $newlist = ' ';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                $this->db->set('character_like', $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                }*/
                
                
        }

        public function removelikedcharacter($char_id,$user_id)
        {


                
                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 1");
                $contentquery = $query->result();

                if(!empty($contentquery)){
                                $list = $contentquery[0]->character_like;
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($char_id, $list_char)) !== false) {
                    
                                        if($size == 1){
                                                $newlist = '';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                $this->db->set('character_like', $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                }
 
        }

        

        public function addcharacterdisliked($char_id,$user_id)
        {

                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 0");
                $contentquery = $query->result();
                
                if(empty($contentquery)){
                        $object = array(
                                'user_id' => $user_id,
                                'character_like' => $char_id,
                                'like_state' => 0
                        );
                        $this->db->insert('userpreferences', $object);

                }else{
                        $list = $contentquery[0]->character_like;
                        if(empty($list)){
                                $this->db->set('character_like',$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                        }else{
                                $this->db->set('character_like', $list.','.$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                        }
                }


                /*$query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 1");
                $contentquery = $query->result();

                if(!empty($contentquery)){
                                $list = $contentquery[0]->character_like;
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($char_id, $list_char)) !== false) {
                    
                                        if($size == 1){
                                                $newlist = ' ';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                $this->db->set('character_like', $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                }*/
                
        }

        public function removedilikedcharacter($char_id,$user_id)
        {


                
                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 0");
                $contentquery = $query->result();

                if(!empty($contentquery)){
                                $list = $contentquery[0]->character_like;
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($char_id, $list_char)) !== false) {
                    
                                        if($size == 1){
                                                $newlist = '';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                $this->db->set('character_like', $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                }

                
                
        }

        //add staff to like
        public function addstaffliked($char_id,$user_id)
        {

                $query = $this->db->query("SELECT staff_type FROM staff WHERE staff_id = $char_id ");
                $contentquery = $query->result();
                if($contentquery[0]->staff_type == 1){
                        $type = "producer_like";
                }else if($contentquery[0]->staff_type == 2){
                        $type = "actor_like";
                }else if($contentquery[0]->staff_type == 3){
                        $type = "writer_like";
                }

                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 1");
                $contentquery = $query->result();
                
                if(empty($contentquery)){
                        $object = array(
                                'user_id' => $user_id,
                                $type => $char_id,
                                'like_state' => 1
                        );
                        $this->db->insert('userpreferences', $object);

                }else{
                        $list = $contentquery[0]->$type;
                        if(empty($list)){
                                $this->db->set($type,$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                        }else{
                                $this->db->set($type, $list.','.$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                        }
                }
                
                /*$query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 0");
                $contentquery = $query->result();

                if(!empty($contentquery)){
                                $list = $contentquery[0]->character_like;
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($char_id, $list_char)) !== false) {
                    
                                        if($size == 1){
                                                $newlist = ' ';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                $this->db->set('character_like', $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                }*/
                
                
        }

        //remove staff from like
        public function removelikedstaff($char_id,$user_id)
        {


                $query = $this->db->query("SELECT staff_type FROM staff WHERE staff_id = $char_id ");
                $contentquery = $query->result();
                if($contentquery[0]->staff_type == 1){
                        $type = "producer_like";
                }else if($contentquery[0]->staff_type == 2){
                        $type = "actor_like";
                }else if($contentquery[0]->staff_type == 3){
                        $type = "writer_like";
                }
                
                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 1");
                $contentquery = $query->result();

                if(!empty($contentquery)){
                                $list = $contentquery[0]->$type;
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($char_id, $list_char)) !== false) {
                    
                                        if($size == 1){
                                                $newlist = '';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                $this->db->set($type, $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                }
 
        }

        
        //add staff to dislike
        public function addstaffdisliked($char_id,$user_id)
        {

                $query = $this->db->query("SELECT staff_type FROM staff WHERE staff_id = $char_id ");
                $contentquery = $query->result();
                if($contentquery[0]->staff_type == 1){
                        $type = "producer_like";
                }else if($contentquery[0]->staff_type == 2){
                        $type = "actor_like";
                }else if($contentquery[0]->staff_type == 3){
                        $type = "writer_like";
                }

                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 0");
                $contentquery = $query->result();
                
                if(empty($contentquery)){
                        $object = array(
                                'user_id' => $user_id,
                                $type => $char_id,
                                'like_state' => 0
                        );
                        $this->db->insert('userpreferences', $object);

                }else{
                        $list = $contentquery[0]->$type;
                        if(empty($list)){
                                $this->db->set($type,$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                        }else{
                                $this->db->set($type, $list.','.$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                        }
                        
                }


                /*$query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 1");
                $contentquery = $query->result();

                if(!empty($contentquery)){
                                $list = $contentquery[0]->character_like;
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($char_id, $list_char)) !== false) {
                    
                                        if($size == 1){
                                                $newlist = ' ';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                $this->db->set('character_like', $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                }*/
                
        }

        //remove staff from disliked
        public function removedilikedstaff($char_id,$user_id)
        {

                $query = $this->db->query("SELECT staff_type FROM staff WHERE staff_id = $char_id ");
                $contentquery = $query->result();
                if($contentquery[0]->staff_type == 1){
                        $type = "producer_like";
                }else if($contentquery[0]->staff_type == 2){
                        $type = "actor_like";
                }else if($contentquery[0]->staff_type == 3){
                        $type = "writer_like";
                }
                
                
                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 0");
                $contentquery = $query->result();


                if(!empty($contentquery)){
                                $list = $contentquery[0]->$type;
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($char_id, $list_char)) !== false) {
                    
                                        if($size == 1){
                                                $newlist = '';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                $this->db->set($type, $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                }

                
                
        }
        

        //add content to liked
        public function addlikedcontent($char_id,$user_id)
        {

                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 1");
                $contentquery = $query->result();
                
                if(empty($contentquery)){
                        $object = array(
                                'user_id' => $user_id,
                                'content_like' => $char_id,
                                'like_state' => 1
                        );
                        $this->db->insert('userpreferences', $object);

                }else{
                        $list = $contentquery[0]->content_like;
                        if(empty($list)){
                                $this->db->set('content_like',$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                        }else{
                                $this->db->set('content_like', $list.','.$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                        }
                }

                
                
        }

        //remoce content from lieked
        public function removelikedcontent($char_id,$user_id)
        {


                
                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 1");
                $contentquery = $query->result();

                if(!empty($contentquery)){
                                $list = $contentquery[0]->content_like;
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($char_id, $list_char)) !== false) {
                    
                                        if($size == 1){
                                                $newlist = '';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                $this->db->set('content_like', $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                }

                
                
        }

        
        //add cont to liek
        public function adddislikedcontent($char_id,$user_id)
        {

                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 0");
                $contentquery = $query->result();
                
                if(empty($contentquery)){
                        $object = array(
                                'user_id' => $user_id,
                                'content_like' => $char_id,
                                'like_state' => 0
                        );
                        $this->db->insert('userpreferences', $object);

                }else{
                        $list = $contentquery[0]->content_like;
                        if(empty($list)){
                                $this->db->set('content_like',$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                        }else{
                                $this->db->set('content_like', $list.','.$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                        }
                }
                
        }

        //remove cont from dislike
        public function removedilikedcontent($char_id,$user_id)
        {


                
                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 0");
                $contentquery = $query->result();

                if(!empty($contentquery)){
                                $list = $contentquery[0]->content_like;
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($char_id, $list_char)) !== false) {
                    
                                        if($size == 1){
                                                $newlist = '';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                $this->db->set('content_like', $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                }

                
                
        }



        //add stud to liked
        public function addlikedstudio($char_id,$user_id)
        {

                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 1");
                $contentquery = $query->result();
                
                if(empty($contentquery)){
                        $object = array(
                                'user_id' => $user_id,
                                'studio_like' => $char_id,
                                'like_state' => 1
                        );
                        $this->db->insert('userpreferences', $object);

                }else{
                        $list = $contentquery[0]->studio_like;
                        if(empty($list)){
                                $this->db->set('studio_like',$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                        }else{
                                $this->db->set('studio_like', $list.','.$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                        }
                }

                
                
        }

        //remove stud from liekd
        public function removelikedstudio($char_id,$user_id)
        {


                
                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 1");
                $contentquery = $query->result();

                if(!empty($contentquery)){
                                $list = $contentquery[0]->studio_like;
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($char_id, $list_char)) !== false) {
                    
                                        if($size == 1){
                                                $newlist = '';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                $this->db->set('studio_like', $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                }

                
                
        }

        
        //add studio to disliked list
        public function adddislikedstudio($char_id,$user_id)
        {

                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 0");
                $contentquery = $query->result();
                
                if(empty($contentquery)){
                        $object = array(
                                'user_id' => $user_id,
                                'studio_like' => $char_id,
                                'like_state' => 0
                        );
                        $this->db->insert('userpreferences', $object);

                }else{
                        $list = $contentquery[0]->studio_like;
                        if(empty($list)){
                                $this->db->set('studio_like',$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                        }else{
                                $this->db->set('studio_like', $list.','.$char_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                        }
                }
                
        }

        //remove studio from liked list
        public function removedilikedstudio($char_id,$user_id)
        {


                
                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 0");
                $contentquery = $query->result();

                if(!empty($contentquery)){
                                $list = $contentquery[0]->studio_like;
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($char_id, $list_char)) !== false) {
                    
                                        if($size == 1){
                                                $newlist = '';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                $this->db->set('studio_like', $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                }

                
                
        }

        //add genre to liked list, if list doesnt exist it creates one else it just adds to the current one
        public function addlikedgenre($genre_id,$user_id)
        {

                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 1");
                $contentquery = $query->result();
                
                if(empty($contentquery)){
                        $object = array(
                                'user_id' => $user_id,
                                'genre_like' => $genre_id,
                                'like_state' => 1
                        );
                        $this->db->insert('userpreferences', $object);

                }else{
                        $list = $contentquery[0]->genre_like;
                        if(empty($list)){
                                $this->db->set('genre_like',$genre_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                        }else{
                                $this->db->set('genre_like', $list.','.$genre_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                        }
                }

                
                
        }

        //remove disliked genre from list
        //searched list of disliked genres and when it finds the same one removes it
        //then sends update list and updates that entry in the table
        public function removelikedgenre($genre_id,$user_id)
        {


                
                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 1");
                $contentquery = $query->result();

                if(!empty($contentquery)){
                                $list = $contentquery[0]->genre_like;
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($genre_id, $list_char)) !== false) {
                    
                                        if($size == 1){
                                                $newlist = '';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                $this->db->set('genre_like', $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 1);
                                $this->db->update('userpreferences');
                }

                
                
        }

        
        //add genre to disliked list, if list doesnt exist it creates one else it just adds to the current one
        public function adddislikedgenre($genre_id,$user_id)
        {

                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 0");
                $contentquery = $query->result();
                
                if(empty($contentquery)){
                        $object = array(
                                'user_id' => $user_id,
                                'genre_like' => $genre_id,
                                'like_state' => 0
                        );
                        $this->db->insert('userpreferences', $object);

                }else{
                        $list = $contentquery[0]->genre_like;
                        if(empty($list)){
                                $this->db->set('genre_like',$genre_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                        }else{
                                $this->db->set('genre_like', $list.','.$genre_id);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                        }
                }
                
        }

        //remove liked genre from list
        //searched list of liked genres and when it finds the same one removes it
        //then sends update list and updates that entry in the table

        public function removedilikedgenre($genre_id,$user_id)
        {
                
                $query = $this->db->query("SELECT * FROM userpreferences WHERE user_id = $user_id AND like_state = 0");
                $contentquery = $query->result();

                if(!empty($contentquery)){
                                $list = $contentquery[0]->genre_like;
                                $arraylist = array();
                                $list_charid = array();
                                $list_char = explode(",",$list);
                                $size = strlen($list);

                                    if (($key = array_search($genre_id, $list_char)) !== false) {
                                        if($size == 1){
                                                $newlist = '';   
                                        }else{
                                            unset($list_char[$key]);
                                            $newlist = implode(',',$list_char);
                                        }
                                    }
                                $this->db->set('genre_like', $newlist);
                                $this->db->where('user_id', $user_id);
                                $this->db->where('like_state', 0);
                                $this->db->update('userpreferences');
                }

                
                
        }



        //check if character,staff and content being accessed exist
        public function getExistsProfileC($id)
        {
                $query = $this->db->query("SELECT character_id FROM characters WHERE character_id = $id");
                $exists = $query->result();

                if(empty($exists)){
                    return 0;
                }else{
                    return 1;
                }
                
                
        }

        public function getExistsProfileS($id)
        {
                $query = $this->db->query("SELECT staff_id FROM staff WHERE staff_id = $id");
                $exists = $query->result();

                if(empty($exists)){
                    return 0;
                }else{
                    return 1;
                }
                
                
        }

        public function getExistsProfileD($id){
                $query = $this->db->query("SELECT contentId FROM content WHERE contentId = $id");
                $exists = $query->result();

                if(empty($exists)){
                    return 0;
                }else{
                    return 1;
                }
                
                
        }
        

}
