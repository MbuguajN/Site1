<?php
include "../db.php";

$sql = "SELECT * FROM articles ORDER BY created_at DESC";
$result = mysqli_query($mysql, $sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Articles</title>
	<style>
		.article {
			background-color: #f9f9f9;
			border: 1px solid #ddd;
			border-radius: 4px;
			padding: 10px;
			margin-bottom: 20px;
		}

		.article h2 {
			font-size: 24px;
			margin-bottom: 10px;
		}

		.article p {
			font-size: 16px;
			line-height: 1.5;
		}
	</style>
</head>
<body>
	<?php
	// Display the articles
	while ($row = mysqli_fetch_assoc($result)) {
	    $title = $row['title'];
	    $content = $row['content'];
	    
	    echo '<div class="article">';
	    echo '<h2>' . $title . '</h2>';
	    echo '<p>' . $content . '</p>';
	    echo '</div>';
	}

	// Close the database connection
	mysqli_close($mysql);
	?>
</body>
</html>
