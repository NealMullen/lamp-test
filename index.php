<html>
	<head>
		<title>Basic LAMP Test</title>
	</head>
	<body>
		<?php
		try {
		  $conn = new PDO('mysql:host=localhost;dbname=test', 'neal', 'zildjian');
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  echo "Connection successful";
		  if(empty($_GET["page"])):
		  	$page = 1;
			else:
				$page=$_GET["page"];
			endif;

			$sth = $conn->prepare('SELECT * FROM pages WHERE id = :id');
			$sth->bindParam(':id', $page);
			$sth->execute();
			$row = $sth->fetch(PDO::FETCH_ASSOC);
			$rows = $sth->fetch(PDO::FETCH_NUM);
			echo $rows[0];
			 ?>

			<h1><?php $row['title'];?></h1>
			<p><?php $row['content'];?></p>

	<?php 
		} catch (PDOException $er) {
		  echo "Error!: " . $er->getMessage();
		}
		?>
	</body>
</html>