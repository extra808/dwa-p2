<?php
// time how long page takes
$before = microtime(true);

// set default character set
ini_set('default_charset', 'UTF-8');

require_once ("../php/logic.php");

// get last Modified date of this file
$lastMod = date ("F d Y", getlastmod());
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Password Generator</title>

    <link href="css/p2.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">

      <header class="page-header">
        <h1>Password Generator</h1>
      </header>
      <!-- Bootstrap two-columns, first column right -->
      <div class="row">
		<div class="content-nav">
        Placeholder
		</div> <!-- /content-nav -->
		<form action="." method="POST">
		<input type="hidden" name="secrets" value="shhhhhh">
		<fieldset class="content-prose">
		<label>Your generated password 
		<textarea readonly>
<?php hsc($passphrase); ?>
		</textarea>
		</label>

        <label>
        <input type="text" name="qtyWords" id="qtyWords">
        Quantity of words to include
        </label>

        <label>
        <input type="text" name="qtySymbols" id="qtySymbols">
        Quantity of symbols to include
        </label>

        <input type="submit" value="Generate Password" />
		</fieldset> <!-- /content-prose -->
		</form>
      </div>

	<footer class="well well-sm text-right">&copy; Curtis Wilcox <?php echo $lastMod; ?>
	</footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="javascripts/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script async src="javascripts/ie10-viewport-bug-workaround.js"></script>

<?php echo microtime(true) - $before ."\n<br>". round(memory_get_peak_usage(true)/1048576,2) ."MB"; ?>
  </body>
</html>
