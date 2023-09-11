<?php
if (isset($this->session->userdata['logged_in'])) {
    $user_id = ($this->session->userdata['logged_in']['user_id']);
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $first = ($this->session->userdata['logged_in']['first_name']);
    $last = ($this->session->userdata['logged_in']['last_name']);
    $this->load->view('login/insideheader/header');

} else {
    $this->load->view('login/insideheader/headernotlog');
    $user_id = 0;
}

if(!empty($checkuserblocked) || !isset($this->session->userdata['logged_in']) || isset($this->session->userdata['logged_in'])){    

    $checkuserblocked = array();

if(($key = array_search($user_id, $checkuserblocked)) !== false){
}else{
?>

   <?php 
        $uri = $_SERVER['REQUEST_URI']; 
        $profileId = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
        $profileId = strtok($profileId, '/');
        $finalword = str_replace("/Dynamic-Content-Library-main/index.php/profile/$profileId/","",$uri);
        if($state[0]->profile_state == 1){?>

        <div class="container-fluid no-padding">
            <div id="my-row" class="row">
            <div class="col-sm-1" >
            </div>
            <div class="col-sm-10"  >
                <div class="row">
            <?php if($finalword == "following/"){
            if(!empty($follows[0])){
                foreach($follows as $f){?>
                    <?php if(isset($this->session->userdata['logged_in']) && $user_id==$profileId){?>
                    <div class="col-sm-2"  >
                    <a href="<?= base_url() ?>index.php/profile/<?= $f[0]->user_id ?>">
                    <img src='../../../../uploads/<?php echo $f[0]->avatar?>'class='myImages' width="100%" alt='<?php echo $f[0]->avatar?>' >
                        </div>
                    </a>
                    <div class="col-sm-2" >
                    <?php 
                        echo "<p>".base64_decode($f[0]->username)."</p>"; ?>
                    </div>
                    <?php if($user_id != 0){?>
                    <div class="col-sm-2"  >
                    <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $f[0]->user_id?>"'>Unfollow</button><br>
                    <?php } ?>
                    </div>
                    <?php }else { ?>
                        <div class="col-sm-3"  >
                    <a href="<?= base_url() ?>index.php/profile/<?= $f[0]->user_id ?>">
                    <img src='../../../../uploads/<?php echo $f[0]->avatar?>'class='myImages' width="100%" alt='<?php echo $f[0]->avatar?>' >
                        </div>
                    </a>
                    <div class="col-sm-3" >
                    <?php 
                        echo "<p>".base64_decode($f[0]->username)."</p>"; ?>
                    </div>
                    <?php } ?>
                <?php } ?>
                <?php
            }else{
                echo "<p>YOU DONT FOLLOW ANYONE CURRENTLY</p>";
             }


        }else{
            
            if(!empty($follows[0])){
                foreach($follows as $f){?>
                    <?php if(isset($this->session->userdata['logged_in']) && $user_id==$profileId){?>

                    <div class="col-sm-2"  >

                    <a href="<?= base_url() ?>index.php/profile/<?= $f[0]->user_id ?>">
                    <img src='../../../../uploads/<?php echo $f[0]->avatar?>'class='myImages' width="100%" alt='<?php echo $f[0]->avatar?>' >

                    </a>
                    </div>
                    <div class="col-sm-2"  >

                    <?php echo "<p>".base64_decode($f[0]->username)."</p>"; ?>
                    </div>
                    <?php if($user_id != 0){?>
                        <div class="col-sm-2"  >

                    <?php if(!empty($f[0]->following)){?>
                        <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $f[0]->user_id?>"'>Unfollow</button><br>
                    <?php }else{ ?>
                        <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/follow/<?= $f[0]->user_id?>"'>Follow</button><br>

                    <?php }?>
                    <?php } ?>
                    </div>
                    <?php }else{ ?>
                           <div class="col-sm-3"  >

                            <a href="<?= base_url() ?>index.php/profile/<?= $f[0]->user_id ?>">
                            <img src='../../../../uploads/<?php echo $f[0]->avatar?>'class='myImages' width="100%" alt='<?php echo $f[0]->avatar?>' >

                            </a>
                            </div>
                            <div class="col-sm-3"  >

                            <?php echo "<p>".base64_decode($f[0]->username)."</p>"; ?>
                            </div>
         <?php }
         } 
         }
        } ?>
            </div>
            </div>
            <div class="col-sm-1" >
            
            </div>
        </div>
        
        




    <?php }
    ?>
<?php
}
}
$this->load->view('header/bottom');
?>