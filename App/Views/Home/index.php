<!DOCTYPE html>
<html>
<head>
	<title>Hello World</title>
	<meta charset="utf-8">
</head>
<body>
	<h1> Hello le monde </h1>
	<p> Hello <?= htmlspecialchars($name); ?> </p>

	<ul> 
		<?php foreach ($colours as $colour): ?>
			<li> <?= htmlspecialchars($colour); ?> </li> 
		<?php endforeach; ?>
	</ul>
</body>
</html>