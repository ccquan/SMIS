<?php
$_SESSION = array(); //清除SESSION值.
          if(isset($_COOKIE[session_name()])){  //判断客户端的cookie文件是否存在,存在的话将其设置为过期.
                setcookie(session_name(),'',time()-1,'/');
            }
                session_destroy(); 
echo "<script>location.href='index.php';</script>";
?>