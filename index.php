<?php
	date_default_timezone_set('Europe/Paris');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Narzędzie sprawdzania dostępności witryny</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="copyright" content="Maciej Jaros">

	<link rel="stylesheet" type="text/css" href="style.css?1610">

	<link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon"/>

	<meta property="og:title" content="Narzędzie sprawdzania dostępności witryny"/>
	<meta property="og:description" content="Narzędzie sprawdzania zgodności z całym WCAG. Działa dla dowolnej witryny."/>
	<meta property="og:image" content="https://f.enux.pl/wcag/narzedzie-sprawdzania-dostepnosci/Check_sheet.svg.png"/>
</head>
<body>
    <!-- content -->
	<main>
		<form method="get">
			<label>Wpisz url witryny:
				<input class="text" type="url" name="url" value="<?=(!empty($_REQUEST['url']) ? htmlspecialchars($_REQUEST['url']) : '')?>" />
			</label>
			<input type="submit" value="Sprawdź" />
		</form>
		<?php
			//var_export($_REQUEST);
			if (!empty($_REQUEST['url'])) {
				if (empty($_REQUEST['url'])) {
					echo "<p class='msg error'>Błąd! Brak url.</p>";
				} else if (!preg_match("#^[a-z]+://[^./][^/]+#", $_REQUEST['url'])) {
					echo "<p class='msg error'>Błąd! Url wygląda na niepoprawny.</p>";
				} else {
					echo "<p class='msg warning'>Uwaga! Wykryto niezgodności z WCAG. Witryna nie jest w pełni dostępna.</p>";
				}
			}
		?>
	</main>
	<footer>
		<p><a href="https://github.com/Eccenux/narzedzie-sprawdzania-dostepnosci/"
			title="Otwiera dokumentację narzędzia"
			>Narzędzie sprawdzania zgodności z całym WCAG</a>.
		<p class="copyright">Copyright &copy; Maciej Jaros.
	</footer>
</body>
</html>