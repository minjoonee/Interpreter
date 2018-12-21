<!doctype html>
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

    $query = "SELECT content, input1, input2, output1, output2 FROM practice WHERE board_num='$num'";
    $result = mysqli_query($conn, $query);
    $array = mysqli_fetch_array($result);

?>

<html lang="kr">
	<head>
	<meta charset="UTF-8">
	<title>Web Compiler</title>
	<link rel="stylesheet" href="lib/codemirror.css"/>
	<link rel="stylesheet" href="theme/darcula.css"/>
  <link rel="stylesheet" type="text/css" href="css/resize.css?ver2" />

	<script src="lib/codemirror.js"></script>
	<script src="addon/edit/matchbrackets.js"></script>
	<script src="mode/clike/clike.js"></script>
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

	<style>
	  .CodeMirror {
			border-top: 1px solid #eee;
			border-bottom: 1px solid #eee;
			line-height: 1.3;
			height: 100%;
			width: 100%;

		}
	  .CodeMirror-linenumbers { padding: 0 8px; }
	</style>
</head>
<body>


<body ng-app="angularResizable">
    <main>
        <nav class="guide-section" resizable r-directions="['right']">
            <div class="guide">
							<h2> 문제 </h2>
							<?php
                $content = str_replace("\n","<br>",$array[content]);
                $input1 = str_replace("\n","<br>",$array[input1]);
                $input2 = str_replace("\n","<br>",$array[input2]);
							 	echo "$content <br>";
								echo "----------------------------------------- <br>";
								echo "입력 1 : <br>$input1 <br>";
								echo "출력 1 : $array[output1] <br><br> ";
								echo "입력 2 : <br>$input2 <br>";
								echo "출력 2 : $array[output2] ";
							 ?>
						</div>
        </nav>
        <div class="content">
            <div class="row" resizable r-directions="['bottom']" r-flex="true">
                <section id="code-section">
                    <p>코드 작성 부분</p>
										<article>
											<form id="formCode" name="formCode">
												<div><textarea id="c_code" name="c_code">
<?php
echo
"#include <stdio.h>
  int main(){

	return 0;
}";
?>
											</textarea></div></form>
											<script>
									      var cEditor = CodeMirror.fromTextArea(document.getElementById("c_code"), {
									        lineNumbers: true,
									        matchBrackets: true,
									        mode: "text/x-csrc",
													theme: "darcula",
                          lineWrapping: true
									      });

									      var mac = CodeMirror.keyMap.default == CodeMirror.keyMap.macDefault;
									      CodeMirror.keyMap.default[(mac ? "Cmd" : "Ctrl") + "-Space"] = "autocomplete";


                        $(document).ready(function() {
                          $('#running').click(function(){
                            var board = <?php echo $num; ?>;
                            var c_code = cEditor.getValue();
                            $.ajax({
                              type:'POST',
                              url:'practice_comp.php?board='+board,
                              data: {'c_code':c_code},
                              async:false,
                              success: function(data){
                                  $('#result').html(data);
                              }
                            });
                          });
                        });
                      </script>
										</article>
                </section>
            </div>
            <div class="row">
                <section id="output-section">
                  <p>코드 실행 결과</p>
                  <div id="result">

                  </div>
                  <a href="javascript:void(0);" class="btn" id="running"><strong>Run</strong></a>
                  <a href="practice_save.php?board=<?php echo $num; ?>" class="btn"><strong>Clear</strong></a>
                </section>
            </div>
        </div>
    </main>

    <script src='http://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js'></script>
    <script type="text/javascript" src="js/resize.js"></script>
</body></html>
