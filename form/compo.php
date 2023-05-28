<?php
 
require 'vendor/autoload.php';
$factory = new RandomLib\Factory;
$generator = $factory ->getGenerator(new SecurityLib\Strength(SecurityLib\Strength::MEDIUM));

?>

<html>
<head> </head>
<body>
<?php for ($i = 0; $i <= 10; $i++): ?>
	<ul> 
		<li> <?= $generator->generateString(32,'abc123')."\n";?> </li>
	</ul>

<?php endfor; ?>

</body>
</html>