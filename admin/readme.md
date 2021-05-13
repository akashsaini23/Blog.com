
////////////////////////////////////////////////
INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES (NULL, 'Akash Saini', 'admin@gmail.com', 'akash1234');
///////////////////////////////////////////////
INSERT INTO `blog_post` (`post_id`, `post_title`, `post_msg`, `post_cat`) VALUES (NULL, 'My First Blog', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In corporis eligendi alias laboriosam vel qui possimus similique itaque nesciunt perspiciatis?', 'uncategorized');


///////////////////////////////////add post//////////////////////////
if(isset($_POST['post'])){
    extract($_POST);
    $query="INSERT INTO `blog_post` (`post_id`, `post_title`, `post_msg`, `post_cat`) VALUES (NULL, '$post_title', '$post_msg', 'uncategorized')";
    mysqli_query($dbcon,$query);
    $msg="saved Succesful";
}
else{
    $msg="can't saved";
}


