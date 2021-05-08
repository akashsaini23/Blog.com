<?php
function page($page_id,$dbcon)
{
    if($page_id=='addpost'){
    require_once "{$page_id}.php";
}
else if($page_id=='viewpost'){
    require_once "{$page_id}.php";
}
else if($page_id=='updatepost'){
    require_once "{$page_id}.php";     
}
else if($page_id=='deletepost'){
    require_once "{$page_id}.php";     
}
else if($page_id=='suspendpost'){
    require_once "{$page_id}.php";      
}
else if($page_id=='setting'){
    require_once "{$page_id}.php";      
}
else if($page_id=='newadmin'){
    require_once "{$page_id}.php";
}
else if($page_id=='viewuser'){
    require_once "{$page_id}.php";
}
else if($page_id=='suspenduser'){
    require_once "{$page_id}.php";      
}
else if($page_id=='theme'){
    require_once "{$page_id}.php";      
     
}
else{
   echo ' <h1>Welcome</h1>';
}
   }

?>