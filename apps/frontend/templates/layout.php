<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" />

<?php if (!include_slot('title')): ?>
			Casa de Apuesta
		<?php endif; ?>
	
	
	<?php include_http_metas() ?>
    <?php include_metas() ?>
    
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
	

</head>

<body>

<div align="center">
  <form id="form1" method="post" action="">
    <table width="700" border="0">
      <tr>
        <td width="309" align="right"><span class="Estilo2"><a href="#">Registrate</a> | <a href="#"></a> <a href="#">Olvide la Clave </a></span></td>
        <td width="174" align="right"><label>
          <input name="usuario" type="text" id="usuario" value="Usuario" />
        </label></td>
        <td width="149" align="right"><label>
          <input name="clave" type="text" id="clave" value="Clave" />
        </label></td>
        <td width="50" align="right"><label>
          <input id="searchsubmit" type="submit" name="Submit" value="Login" />
        </label></td>
      </tr>
    </table>
  </form>
  <br />
</div>
<div id="header">
	<div id="logo">
		<h1><a href="#">Landscape</a></h1>
		<h2><a href="http://www.freecsstemplates.org/">By Free CSS Templates</a></h2>
	</div>
	<div id="menu">
		<ul>
			<li class="active"><a href="#">Home</a></li>
			<li><a href="#">Products</a></li>
			<li><a href="#">Support</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
	</div>
</div>
<div id="page">
	<div id="content">
		<div>
			<h1 class="title"><?php echo $sf_content ?></h1>
		  <blockquote>&nbsp;</blockquote>
		</div>
		<div class="twocols">
			<div class="col1">
				<h2 class="title">&nbsp;</h2>
		  </div>
			<div class="col2">
				<h2 class="title">&nbsp;</h2>
		  </div>
		</div>
	</div>
	<div id="sidebar">
		<div id="search" class="boxed">
			<h2 class="title">Search</h2>
			<div class="content">
				<form id="searchform" method="get" action="">
					<fieldset>
					<input id="searchinput" type="text" name="searchinput" value="" />
					<input id="searchsubmit" type="submit" value="Search" />
					</fieldset>
				</form>
				<p><a href="#">Advanced Search</a></p>
			</div>
		</div>
		<div id="news" class="boxed">
			<h2 class="title">News &amp; Events</h2>
			<div class="content">
				<ul>
					<li class="first">
						<h3>04 July 2007</h3>
						<p><a href="#">In posuere eleifend odio quisque semper&hellip;</a></p>
					</li>
					<li>
						<h3>29 June 2007</h3>
						<p><a href="#">Donec leo, vivamus fermentum nibh in augue&hellip;</a></p>
					</li>
					<li>
						<h3>13 June 2007</h3>
						<p><a href="#">Quisque dictum integer nisl risus sagittis&hellip;</a></p>
					</li>
				</ul>
			</div>
		</div>
		<div id="extra" class="boxed">
			<h2 class="title">Sagittis Convallis</h2>
		  <div class="content">
				<ul class="list">
					<li class="first"><a href="#">Ut semper vestibulum est</a></li>
					<li><a href="#">Vestibulum luctus venenatis</a></li>
					<li><a href="#">Integer rutrum nisl in mi</a></li>
					<li><a href="#">Etiam malesuada rutrum enim</a></li>
					<li><a href="#">Aenean elementum facilisis</a></li>
					<li><a href="#">Ut tincidunt elit vitae augue</a></li>
					<li><a href="#">Sed quis odio sagittis leo</a></li>
				</ul>
		  </div>
		</div>
		<div id="footer">
			<p id="legal">&copy;2007 Landscape. All Rights Reserved<br />
				Designed by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a></p>
			<p id="links"><a href="#">Privacy</a> | <a href="#">Terms</a> | <a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional"><abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> | <a href="http://jigsaw.w3.org/css-validator/check/referer" title="This page validates as CSS"><abbr title="Cascading Style Sheets">CSS</abbr></a></p>
		</div>
	</div>
</div>

</body>
</html>