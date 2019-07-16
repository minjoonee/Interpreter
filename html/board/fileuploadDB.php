<?php
# session 연결
 session_start();
    if(!isset($_SESSION['id'])){
      echo "<script>
      location.href='../index.php';
      </script>";
    }


    $conn=mysqli_connect('localhost', 'db_id', 'db_pw', 'db_name', '3306');
    if(!$conn){
      echo"connect fail....";
    }
    mysqli_set_charset($conn, 'utf8');
    $db=mysqli_select_db($conn , "interpreter");

    $db_id= $_SESSION['id'];

    $nquery = "select name, student from member where id='$db_id'";
    $nresult = mysqli_query($conn, $nquery);
    $narray = mysqli_fetch_array($nresult);
    $db_name = $narray['name'].'+'.$narray['student'];

    $num = $_GET['board'];

$upload_dir = "upload/";
$current = getcwd();
$upload_size = $_FILES['userfile']['size']; //file_size
$upload_file = $upload_dir . basename($_FILES["userfile"]["name"]);
$filename_ext=strtolower(array_pop(explode('.',$upload_file)));
if($filename_ext=='zip'){
  echo "true";

  //file_path
  if(move_uploaded_file($_FILES["userfile"]["tmp_name"],$upload_file)){
    $dot_filename= '.' . $filename_ext;
    $name = basename($_FILES["userfile"]["name"],$dot_filename);
    $fullname = $_FILES["userfile"]["name"];
    echo "success<br>$dot_filename<br>$name<br>$fullname<br>";
    //$dot_filename: .확장자
    //$name : 확장자 제외한 파일명
    //$fullname : 확장자 포함한 파일명

    //생성할 dir 폴더경로
    $dir = $current . '/' . $upload_dir . $name;
    $filedir = $current . '/' . $upload_dir . $fullname;
    $unzip = 'unzip ' . $filedir . ' -d ' . $dir;
    echo "unzip 은 $unzip 까지";
    //echo "$dir";

    $mydir = $dir;
    if(@mkdir($mydir, 0777)) {
      if(is_dir($mydir)) {
        @chmod($mydir, 0777);
        echo "${mydir} 디렉토리를 생성하였습니다.";
        system($unzip);
          $tablename = "f_submission";
          $sql = "INSERT into $tablename values(default,'$num','$db_id','$name','$db_name','$dir',default)";
          mysqli_query($conn, $sql);
      }
    }
    else {
      echo "${mydir} 같은 파일명으로 인해 디렉토리를 생성하지 못했습니다.";
    }

  }
  else{
    echo("<script>
    window.alert('failed');
    history.go(-1);
    </script>");
  }
}
else{
  echo "false";
  echo("<script>
  window.alert('$filename 파일은 업로드할수 없는 확장자의 파일입니다.');
  history.go(-1);
  </script>");
}
?>
