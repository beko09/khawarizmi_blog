<?php include "db.php";

/** 
 *  Admin area
 *  All this function work in admin area
 *  All this function deal with database only
 *  All this function don't deal with html
*/

?>



<?php 
    /**
     *  This function was created to 
     *  test the type of data and from
     *  data base and data coming from 
     *  form client side and only use
     *  in development
     */
    function testing($var)
    {
        echo "<pre>" . var_dump($var) . "</pre>";
        die("This function test data type");
    }
?>

<?php 

 /**
 * This function add  categories
 * in database
 */

  function add_cat(){
      global $conn;
      $cat_title = $_POST['category'] ;
      $stmt = $conn->prepare("INSERT INTO categories (cat_title) VALUES (?)");
      $stmt->bind_param("s", $categories);
      $categories = $cat_title;
      $stmt->execute();
      $stmt->close();
    
  }


/**
 * This function load and display 
 *  categories form database
 */

  function load_category(){
      global $conn;
        $sql = "SELECT * FROM categories ORDER BY cat_ID";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $data = $result;
        return $data;
        } else {
         return false;
        }
  }


 /**
 * This function load and display 
 *  one category form database depend
 *  category id
 */

  function load_one_category($cat_id){
      global $conn;
        $sql = "SELECT cat_title FROM categories WHERE cat_ID=$cat_id ORDER BY cat_ID";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return $data['cat_title'];
        } else {
         return false;
        }
  }

/**
 * This function delete  
 *  one category form database depend
 *  category id
 */

  function delete_cat($id){
    global $conn;
    //  check if id (category) in database or no
    function check($category){
      global $conn;
       $stmt = $conn->prepare("SELECT * FROM categories WHERE cat_ID=?");
        $stmt->bind_param('i', $category);
        $stmt->execute();
        if ($stmt->num_rows > 0) {
            return true;
        }else {
            return false;
        }
        
    }
        if (check($id)) {
            return false;
        } else {
            $stmt = $conn->prepare("DELETE FROM categories WHERE cat_ID=?");
            $stmt->bind_param('i', $id);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
  }


/**
 * This function add post in to
 * database when user is register
 */

function add_post($category_id,$userId,$content,$date,$target_file,$title,$post_status,$tags)
{
      global $conn;  
      $sql ="INSERT INTO posts (cat_id,user_id,post_content,post_date,post_image,post_title,post_status,post_tags) 
      VALUES ('$category_id','$userId','$content','$date','$target_file','$title','$post_status','$tags')";
      if($conn->query($sql) === TRUE){
          return true;
        //   header('Location: posts.php');
      }else {
          header('Location: posts.php?to=add_post');
      }
}


/**
 * This function load and display 
 *  all posts form database
 */

 function loadPosts(){
      global $conn;
        $sql = "SELECT * FROM posts 
        INNER JOIN users ON posts.user_id=users.user_ID 
        INNER JOIN categories ON posts.cat_id=categories.cat_ID";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
        } else {
         return false;
        }
 }

/**
 * This function load and display 
 *  all users form database
 */

 function loadUsers(){
      global $conn;
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        return $result;
        } else {
         return false;
        }
 }


/**
 * This function load and display 
 *  only one post form database
 *  depend on user who write
 */

  function load_posts_user($user_id){
      global $conn;
        function check($user_id) {
            global $conn;
            $sql = "SELECT user_id FROM posts WHERE user_id=$user_id";
            $result = $conn->query($sql);
             if ($result->num_rows > 0) {
                return true;
                } else {
                return false;
                }
        }
        if(check($user_id)){
             $sql = "SELECT * FROM posts 
                INNER JOIN categories ON posts.cat_id=categories.cat_ID 
                INNER JOIN users ON posts.user_id=users.user_ID
                WHERE user_id=$user_id
                ";
        $result = $conn->query($sql);
         die($result);
     
        if ($result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
        } else {
         return false;
        }
        }else {
            return false;
        }
       
 }


 

/**
 * This function get user info
 * from database depend on the
 * user id
 */

  function get_user($user_id){
      global $conn;
        $sql = "SELECT * FROM users WHERE user_ID=$user_id ORDER BY user_ID";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $data = $result;
        return $data;
        } else {
         return false;
        }
  }
  






/**
 * This function delete any thing when 
 * give prams to be deleted
 */

function delete($table,$col,$id){
     global $conn;

    //check if this item id in database or no
    function check($table,$col,$id){ 
      global $conn;
       $stmt = $conn->prepare("SELECT $col FROM $table WHERE $col=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        if ($stmt->num_rows > 0) {
            return true;
        }
        return false;
    }
        if (check($table,$col,$id)) {
            return false;
        } else {
            $stmt = $conn->prepare("DELETE FROM $table WHERE $col=?");
            $stmt->bind_param('i', $id);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
}


/**
 * This function modify status
 *  item when
 * take prams to be approved
 */

function modify_status($col_status,$table,$col,$id){
     global $conn;
    $sql = "SELECT $col_status FROM $table WHERE $col=$id";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        //  check status item from database
        $status = $row[$col_status];
        if ($status === "unapproved") {
            $sql = "UPDATE $table SET $col_status='approve' WHERE $col=$id";
            $conn->query($sql);
        }else {
            $sql = "UPDATE $table SET $col_status='unapproved' WHERE $col=$id";
            $conn->query($sql);
        }
        return true;
    }
    } else {
        return false;
    }
}





/**
 * This function load all detail about one
 * post and show him in single post page
 */

function single_post($post_id){
        global $conn;
        $sql = "SELECT * FROM posts WHERE post_ID = $post_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $data = $result;
        return $data;
        } else {
         return false;
        }  
}



function update_post($category_id,$userId,$content,$date,$target_file,$title,$post_status,$tags,$postID){
    global $conn;
    $sql = "UPDATE posts SET cat_id='$category_id',user_id='$userId',post_content='$content',post_date='$date',post_image='$target_file',post_title='$title',post_status='$post_status',post_tags='$tags' WHERE post_ID='$postID'";
    if ($conn->query($sql)) {
    return true;
    } else {
        return false;
    }  

}










  function load_posts_user1($user_id){
      global $conn;
             $sql = "SELECT * FROM posts 
                WHERE user_id=$user_id
                ";
        $result = $conn->query($sql);
        //  die($result);
     
        if ($result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
        } else {
         return false;
        }
        
       
 }









   
?>