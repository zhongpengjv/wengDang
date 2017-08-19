<?php 
header("Content-Type:text/html;charset=utf-8");
$conn = mysqli_connect( 
 'mysql.sql191.eznowdata.com',
 'sq_f735846599',     
 'd735846599',
 'sq_f735846599');    
 
 if(! $conn )
{
    die('连接失败: ' . mysqli_error($conn));
}
echo '连接成功<br />';
// addtable($conn);
// adddata($conn);

// finThisId($conn);
	// movedata($conn);
place($conn);
// readdata($conn);
// 建立表单
function addtable($conn){
	// CREATE TABLE MyArticleTit
	$sql = "CREATE TABLE MyArticleContent( ".
	        "id INT NOT NULL AUTO_INCREMENT, ".
	         "titId VARCHAR(30) NOT NULL,".
	        // "tit VARCHAR(30) NOT NULL,".
	        // "mainClass TinyInt NOT NULL, ".
	        // "secondaryClass TinyInt NOT NULL, ".
	        "content longText NOT NULL, ".
	        // "date DATE, ".
	        "PRIMARY KEY ( id ))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
	// $sql = "CREATE TABLE training( ".
	//         "id INT NOT NULL AUTO_INCREMENT, ".
	//         "project longText NOT NULL,".
	//         "name longText NOT NULL,".
	//         "contact longText NOT NULL,".
	//         "source longText NOT NULL,".
	//         "note longText NOT NULL,".
	//         "showtime DATE,".
	//         "PRIMARY KEY ( id ))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
	// $sql = "CREATE TABLE service( ".
	//         "id INT NOT NULL AUTO_INCREMENT, ".
	//         "project longText NOT NULL,".
	//         "name longText NOT NULL,".
	//         "time longText NOT NULL,".
	//         "place longText NOT NULL,".
	//         "contact longText NOT NULL,".
	//         "source longText NOT NULL,".
	//         "note longText NOT NULL,".
	//            "showtime longText NOT NULL,".
	//         "PRIMARY KEY ( id ))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
	mysqli_select_db( $conn, 'RUNOOB' );
	$retval = mysqli_query( $conn, $sql );
	if(! $retval )
	{
	    die('数据表创建失败: ' . mysqli_error($conn));
	}
	echo "数据表创建成功\n";
}


// 插入数据
function adddata($conn){
	mysqli_query($conn , "set names utf8");
	$tit = "第一";
	$mainClass = "2";
	$secondaryClass = "2";
	// $content = '内容';
	 
	$sql = "INSERT INTO MyArticleTit ".
	        "(tit,mainClass,secondaryClass) ".
	        "VALUES ".
	        "('$tit','$mainClass','$secondaryClass')";
	 
	 
	 
	mysqli_select_db( $conn, 'RUNOOB' );
	$retval = mysqli_query( $conn, $sql );
	if(! $retval )
	{
	  die('无法插入数据: ' . mysqli_error($conn));
	}
	echo "数据插入成功\n";	
}
// 读取数据
function readdata($conn){
	mysqli_query($conn , "set names utf8");
 
	$sql = 'SELECT id,tit,mainClass,secondaryClass, content,submission_date
	        FROM MyArticle';
	 
	mysqli_select_db( $conn, 'RUNOOB' );
	$retval = mysqli_query( $conn, $sql );
	if(! $retval )
	{
	    die('无法读取数据: ' . mysqli_error($conn));
	}
	$arr = array();
	$sun = 0;
	while($row = mysqli_fetch_assoc($retval))
	{
	    echo "id".$row['id']."<br>".
	    	 $row['tit']."<br>".
	         $row['mainClass']."<br>".
	         $row['secondaryClass']."<br>".
	         $row['content']."<br>".
	         $row['submission_date'];
	         // $arr[$sun] = array($row['id'],$row['tit'],$row['mainClass'],$row['secondaryClass'],$row['content'],$row['submission_date']);
	         // $sun++;
	}
		// echo json_encode($arr);;
}
// 以id查找
function finThisId($conn){
	mysqli_query($conn , "set names utf8");
	$count_sql = "SELECT * FROM wenzhang where id='2'";
	$result = mysqli_query($conn,$count_sql);
	while ($row = $result->fetch_assoc())
	{
	    echo $row['content'];
	}
}
function place($conn){
	mysqli_query($conn , "set names utf8");
 	$tit = "测试";
 	$mainClass = "58";
	$secondaryClass = "78";
	$sql = 'UPDATE MyArticleTit
	        SET tit="'.$tit.'",mainClass="'.$mainClass.'",secondaryClass="'.$secondaryClass.'"
	        WHERE thisId=20170703183445';
	 
	mysqli_select_db( $conn, 'RUNOOB' );
	$retval = mysqli_query( $conn, $sql );
	if(! $retval )
	{
	    die('无法更新数据: ' . mysqli_error($conn));
	}
	echo '数据更新成功！';
  // mysql_query("UPDATE wenzhang SET mainClass = '1' WHERE id = '1'");
 
}
// 删除
function movedata($conn){
	mysqli_query($conn , "set names utf8"); 
	$id = 21; 
	mysqli_query($conn,"DELETE FROM MyArticle WHERE id=$id");
}

 
  
 ?>