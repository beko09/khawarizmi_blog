<?php 
include 'admin/includes/db.php';

function show_cat(){
    global $conn;
        $sql = "SELECT * FROM categories ORDER BY ID";
        $result = $conn->query($sql);
         if ($result->num_rows > 0) {
        // output data of each row
         $data = $result;
        return $data;
        
        } else {
        return false;
        }

}

function show_cat_sidebar(){
    global $conn;
        $sql = "SELECT * FROM categories ORDER BY ID DESC LIMIT 5";
        $result = $conn->query($sql);
         if ($result->num_rows > 0) {
        // output data of each row
         $data = $result;
        return $data;
        
        } else {
         echo "0 results";
        }

}

function show_posts(){
      global $conn;
        $sql = "SELECT * FROM posts WHERE post_status='approve'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $data = $result;
        return $data;
        } else {
         return false;
        }
 }
function show_posts_sidebar(){
      global $conn;
        $sql = "SELECT * FROM posts WHERE post_status='approve' ORDER BY ID DESC LIMIT 5";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $data = $result;
        return $data;
        } else {
         return false;
        }
 }
function show_tags(){
      global $conn;
        $sql = "SELECT * FROM posts ORDER BY ID DESC LIMIT 5";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $data = $result;
        return $data;
        } else {
         return false;
        }
 }

function search_posts($search){
        global $conn;
        $sql = "SELECT * FROM posts WHERE post_title LIKE '%$search%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $data = $result;
        return $data;
        } else {
         return false;
        }
}

function get_single_post($post_id){
        global $conn;
        $sql = "SELECT * FROM posts WHERE ID = $post_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $data = $result;
        return $data;
        } else {
         return false;
        }  
}

function show_posts_cat($cat_id){
        global $conn;
        $sql = "SELECT * FROM posts INNER JOIN categories ON posts.cat_id=categories.ID WHERE cat_id=$cat_id";
        $result = $conn->query($sql);
     
        if ($result->num_rows > 0) {
        // output data of each row
        $data = $result->fetch_all(MYSQLI_ASSOC);

        // $sql = "SELECT * FROM posts WHERE post_category_id=$cat_id ORDER BY post_id";
        // $result = $conn->query($sql);
        // if ($result->num_rows > 0) {
        // // output data of each row
        // $data = $result;
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

?>

