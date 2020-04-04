
</style>


<nav class="menu_container">
 
                <ul class="menu_nav new_menu" >
                   
                      <?php 
        //query to server /and get info
                $query ="SELECT * FROM categories";
                $select_data = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_data)){
                    $cat_title = $row['cat_title'];
                    echo "<li class='db_cat menu' value=''><a class='style_a' href='#'>{$cat_title}</a></li>";
                    
          };
                
                ?> 
                <?php if(!isset($_SESSION['username'])){
          echo "<li class='db_cat admin menu'><a class='style_a' href='loginform.php'>Login</a></li>";
          }else{
                  
           echo "<li class='db_cat admin menu'><a class='style_a' href='admin/index.php' > Hello  ";  echo $_SESSION['username']; "</a></li>";
          };


                  ?>
                    <?php 
                        if (isset($_GET['pst_id']) ){
                           $post_id = $_GET['pst_id'];
                            
                            echo " <li class='db_cat admin menu'><a class='style_a new_li ' href='admin/posts.php?source=edit_post&p_id={$post_id}'>Edit Post</a></li>";
                        }
                    ?>
            <li class="db_cat registration menu" value=""><a class='style_a' href='registration.php'>Registration</a></li>
              </ul>
            

        
       
    </nav>
<script type="text/javascript">
   $(document).ready(function(){
    
       var menu =document.getElementsByClassName("menu");
       $(menu).each(function(){
        $(menu).on('click', function(){
           
               
            $(menu).removeClass('newclass');
            $(this).addClass('newclass');
            $(this).val("1");
            
        });


       })
       
        });
            


    
     /* if($(this).hasClass("newclass")){
                $(this).removeClass("newclass")
                $(this).addClass(".active")

            }*/














</script>