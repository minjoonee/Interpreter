<?php
    //file save.
    session_start();
			if(!isset($_SESSION['id'])){
				echo "<script>
				location.href='../index.php';
    		</script>";
			}

    $conn = mysqli_connect('127.0.0.1', 'inter', '771029', 'interpreter', '3306');
    if(!$conn){
      echo "connect fail....";
    }
    mysqli_set_charset($conn, 'utf8');
    $db=mysqli_select_db($conn, "interpreter");

    // 가져올 데이터 : 현재 사용중인 문제 정보
    $id = $_SESSION['id'];
    $num = $_GET['board'];

    // 현재 board 정보 ( num 값) 에 따른 디렉토리 생성.
    // 디렉토리 존재여부 확인하고 생성 필요.
    // 아니면 그냥 파일명에 board 값 넣어준다?
    $query = "SELECT id, input1, input2, output1, output2 FROM practice WHERE num='$num'";
    $result = mysqli_query($conn, $query);
    $array = mysqli_fetch_array($result);

    // 이름 쓸지도 몰라서 일단 가져옴
    $i_query = "SELECT name, student FROM info WHERE id='$id'";
    $i_result = mysqli_query($conn, $i_query);
    $i_array = mysqli_fetch_array($i_result);
    $filename = "./practice/".$i_array[student]."_pr_".$num.".c";
    $exFile = "./practice/".$i_array[student];

    // input1 input2 값 유효성 검사 필요
    // input2 가 null 인 경우 발생 가능.
    // 1. not null 로 해결 가능.
    //
    $file = fopen($filename,"w+");
    $code=$_POST['c_code'];

     fwrite($file, $code);
     fclose($file);
    // 여기 나오는 값들 다시 echo로 반환
     system("gcc -o $exFile $filename");

     // 여기부터 양식 맞춰서 출력하면 될거같음.
     $return1 = shell_exec("echo $array[input1] | $exFile");
     $return2 = shell_exec("echo $array[input2] | $exFile");
     $n=0;
     $score=0;
     if($return1 == $array[output1])
     {
       $score = $score + 50;
       $n = $n + 1;
     }
     if($return2 == $array[output2])
     {
       $score = $score + 50;
       $n = $n + 1;
     }
     // return1 == array[result1] >> score+50 , n+1

     echo "<div class='table'>
       <table class='return'>
         <tr>
           <th colspan='2'>테스트 1</th>
         </tr>
         <tr>
           <td>입력값</td>
           <td>$array[input1]</td>
         </tr>
         <tr>
           <td scope='col' width='100px'>기댓값</td>
           <td>$array[output1]</td>
         </tr>
         <tr>
           <td>실행결과</td>
           <td>$return1</td>
         </tr>
       </table>
       <table class='return'>
         <tr>
           <th colspan='2'>테스트 2</th>
         </tr>
         <tr>
           <td scope='col' width='100px'>입력값</td>
           <td>$array[input2]</td>
         </tr>
         <tr>
           <td>기댓값</td>
           <td>$array[output2]</td>
         </tr>
         <tr>
           <td>실행결과</td>
           <td>$return2</td>
         </tr>
       </table>
     </div>
     <div id='evaluation'>
       <br>테스트 결과 :</br></br>
         2개 중 $n 개 성공.</br>
         점수 : $score 점
     </div>
     </div>";
?>
