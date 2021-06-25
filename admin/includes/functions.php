<?php include "db.php"; ?>

<?php 
    function dd($var)
    {
        echo "<pre>" . var_dump($var) . "</pre>";
        die();
    }
?>

<?php 

 # This function add categories in data base
  function add_cat(){
      global $conn;
      $cat_title = $_POST['category'] ;
      $stmt = $conn->prepare("INSERT INTO categories (cat_title) VALUES (?)");
      $stmt->bind_param("s", $categories);
      $categories = $cat_title;
      $stmt->execute();
      $stmt->close();
    
  }

# This function load categories from data base
  function load_category(){
      global $conn;
        $sql = "SELECT * FROM categories ORDER BY ID";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
        $data = $result;
        return $data;
        // print_r($data);

        } else {
         return false;
        }
  }


  # This function load one category depend by cat_id from data base
  function load_one_category($cat_id){
      global $conn;
        $sql = "SELECT cat_title FROM categories WHERE ID=$cat_id ORDER BY ID";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
        $data = $result->fetch_assoc();
        return $data['cat_title'];
        } else {
         return false;
        }
  }

  // This function remove categories

  function remove_cat($id){
    global $conn;
    //  check if id in database or no
    function check($category){
      global $conn;
       $stmt = $conn->prepare("DELETE FROM categories WHERE ID=?");
        $stmt->bind_param('i', $category);
        $stmt->execute();
        if ($stmt->num_rows > 0) {
            return true;
        }
        return false;
    }
        if (check($id)) {
            return false;
        } else {
            $stmt = $conn->prepare("DELETE FROM categories WHERE ID=?");
            $stmt->bind_param('i', $id);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
  }

//    this function add post

function add_post($category_id,$userId,$content,$date,$target_file,$title,$post_status,$tags)
{
     global $conn;  
      
      $sql ="INSERT INTO posts (cat_id,user_id,post_content,post_date,post_image,post_title,post_status,post_tags) 
      VALUES ('$category_id','$userId','$content','$date','$target_file','$title','$post_status','$tags')";
      if($conn->query($sql) === TRUE){
          header('Location: posts.php');
      }else {
          header('Location: posts.php?to=add_new');
      }

   // }

}


 function loadPosts(){
      global $conn;
        $sql = "SELECT * FROM posts INNER JOIN users ON posts.user_id=users.ID INNER JOIN categories ON posts.cat_id=categories.ID";
        $result = $conn->query($sql);
     
        if ($result->num_rows > 0) {
        // output data of each row
        $data = $result->fetch_all(MYSQLI_ASSOC);
        // dd($data);
        
        return $data;
        } else {
         return false;
        }
 }
//  loadPosts();


  function load_posts_user($user_id){
      global $conn;
        $sql = "SELECT * FROM posts 
                INNER JOIN categories ON posts.cat_id=categories.ID 
                INNER JOIN users ON posts.user_id=users.ID
                WHERE user_id=$user_id
                ";
        $result = $conn->query($sql);
     
        if ($result->num_rows > 0) {
        // output data of each row
        $data = $result->fetch_all(MYSQLI_ASSOC);
        // dd($data);
        
        return $data;
        } else {
         return false;
        }
 }


 # This function load one user depend by user_id from data base
  function get_user($user_id){
      global $conn;
        $sql = "SELECT * FROM users WHERE ID=$user_id ORDER BY ID";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
        $data = $result;
        return $data;
        } else {
         return false;
        }
  }
  








function delete_post($id){
    // global $conn;
    // $sql ="DELETE FROM $table WHERE $col=$id";
    // if($conn->query($sql) === TRUE) {
    // return true;
    // } else {
    // echo "Error deleting record: " . $conn->error;
    // }

     global $conn;
    //  check if id in database or no
    
    function check($id){
       
      global $conn;
       $stmt = $conn->prepare("SELECT ID FROM posts WHERE ID=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        if ($stmt->num_rows > 0) {
            return true;
        }
        return false;
    }
        if (check($id)) {
            return false;
        } else {
            $stmt = $conn->prepare("DELETE FROM posts WHERE ID=?");
            $stmt->bind_param('i', $id);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
}

function approve($id){
     global $conn;
    $sql = "SELECT post_status FROM posts WHERE ID=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $status = $row['post_status'];
        if ($status === "draft") {
            $sql = "UPDATE posts SET post_status='approve' WHERE ID=$id";
            $conn->query($sql);
            
        }else {
            $sql = "UPDATE posts SET post_status='draft' WHERE ID=$id";
            $conn->query($sql);
        }
        return true;
    }
    } else {
        return false;
    }
}

























   
?>