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

			$statement = $conn->prepare("SELECT * from pages where id = $page");
			$row = $statement->fetch();?>

			<h1><?php $row['title'];?></h1>
			<p><?php $row['content'];?></p>

	<?php 
		} catch (PDOException $er) {
		  echo "Error!: " . $er->getMessage();
		}
		?>
	</body>
</html>