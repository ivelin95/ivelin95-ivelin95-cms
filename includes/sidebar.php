   
<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Blog Search Well -->

                <div !important class="well">
                    <h4>Blog Search</h4>
                    <form method="post" action="search.php">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                                            
                                                <!-- login section -->
                            
               
          
                
                
                    <!-- /.input-group -->
                
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul  class="list-unstyled">
                                <?php 
                       $query ="SELECT * FROM categories";// we make querry to DB
                       $select_info_from_table = mysqli_query($connection, $query);//select info from DB
                                //now we have to present information in html list ;
                                while($row = mysqli_fetch_assoc($select_info_from_table)){
                                    $categories = $row['cat_title'];
                                    $cat_id = $row['cat_id'];
                                    echo "<a href=category.php?cat_id={$cat_id}> <li> {$categories}</li></a>";
                                };
                        ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->

                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>