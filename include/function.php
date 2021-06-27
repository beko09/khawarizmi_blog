<?php include 'admin/includes/db.php';

/** 
 *  web side (front-end) area
 *  All this function work in web side area
 *  All this function deal with database only
 *  All this function don't deal with html
*/



/**
 * This function load all categories
 * and display in front-end
 */

function show_cat(){
    global $conn;
        $sql = "
        SELECT * FROM categories 
        ORDER BY cat_ID
        ";
        $result = $conn->query($sql);
         if ($result->num_rows > 0) {
         $data = $result;
        return $data;
        } else {
        return false;
        }

}

/**
 * This function load all categories
 * and display in sidebar with limit 5
 */

function show_cat_sidebar(){
    global $conn;
        $sql = "SELECT * FROM categories ORDER BY cat_ID DESC LIMIT 5";
        $result = $conn->query($sql);
         if ($result->num_rows > 0) {
         $data = $result;
        return $data;
        
        } else {
         echo "0 results";
        }

}

/**
 * This function show all posts
 * and display in index page when
 * admin approve that post
 */
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


 /**
 * This function load some post
 * and display in sidebar with limit 5
 */

function show_posts_sidebar(){
      global $conn;
        $sql = "SELECT * FROM posts WHERE post_status='approve' ORDER BY post_ID DESC LIMIT 5";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $data = $result;
        return $data;
        } else {
         return false;
        }
 }

 /**
 * This function display all tags
 */

function show_tags(){
      global $conn;
        $sql = "SELECT * FROM posts ORDER BY post_ID DESC LIMIT 5";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $data = $result;
        return $data;
        } else {
         return false;
        }
 }

/**
 * This function take word from user input
 * and search in post in database when find
 * display that post in search page 
 */

function search_posts($search){
        global $conn;
        $sql = "SELECT * FROM posts WHERE post_title LIKE '%$search%' AND post_status='approve'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $data = $result;
        return $data;
        } else {
         return false;
        }
}


/**
 * This function load all detail about
 * post and show him in single post page
 */

function get_single_post($post_id){
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


/**
 * This function show post depend categories
 * and display in categories page
 */


function show_posts_cat($cat_id){
        global $conn;
        $sql = "
        SELECT * FROM posts 
        WHERE cat_id=$cat_id 
        AND post_status='approve'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
        } else {
         return false;
        }

}


  /**
   * This function get user info depend on
   * user id from database
   */

  function get_user($user_id){
      global $conn;
        $sql = "SELECT * FROM users WHERE user_ID=$user_id ORDER BY user_ID";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
        $data = $result;
        return $data;
        } else {
         return false;
        }
  }
 


  /**
   *  This function get one category
   * from database depend category id
   * and display in front-end
   */
  
  function load_one_category($cat_id){
      global $conn;
        $sql = "SELECT cat_title FROM categories WHERE cat_ID=$cat_id ORDER BY cat_ID";
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

