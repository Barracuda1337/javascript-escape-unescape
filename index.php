<!DOCTYPE html>
<html lang="tr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Javascript Escape/UnEscape</title>
	<style>
		@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap");

		body {
			font-weight: 400;
			line-height: 1.7;
			font-family: "Poppins", sans-serif !important;
			background-image: url("https://i.pinimg.com/originals/65/f5/6e/65f56efd2a0a3144424b4f47a39cd54f.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment: fixed;
			background-position: center;
			width: auto;
			height: 100%;
		}

		h1 {
			font-size: 2rem;
			margin-bottom: 25px;
			color: white;
			text-shadow: 0px 0px 7px rgba(150, 150, 150, 1);
		}

		.search {
			padding-top: 100px;
			text-align: center;
		}

		.search input,
		.search button {
			padding: 10px 20px;
			border: none;
			outline: none;
			font-size: 20px;
		}

		.search input {
			transition: all 0.3s ease-in;
			border-radius:25px ;
			width: 60vw;
			max-width: 600px;
			-webkit-box-shadow: 0px 10px 38px -17px rgba(0, 0, 0, 0.75);
			-moz-box-shadow: 0px 10px 38px -17px rgba(0, 0, 0, 0.75);
			box-shadow: 0px 10px 38px -17px rgba(0, 0, 0, 0.75);
		}


		button {
			border-radius: 25px;
			margin-left: -5px;
			color: white;
			background-color: black;
			cursor: pointer;
		}
	</style>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body>
	<div class="search">
		<h1>javascript EnCode/DeCode</h1>
		<center>
			<form name="fA">
				<table cellpadding="5" cellspacing="0" border="0">
					<tr align="center" valign="top">
						<td class="tblc">
							<textarea id="f1" cols="40" rows="10" wrap="off"></textarea>
						</td>
						<td>
							<input class="inpB" type="button" value=">"
								onclick="document.fA.c1.value=escapeTxt(document.fA.f1.value)"><br /><br />
							<input class="inpB" type="button" value="<"
								onclick="document.fA.f1.value=unescapeTxt(document.fA.c1.value)">
						</td>
						<td class="tblc">
							<textarea id="c1" cols="40" rows="10"></textarea>
						</td>
					</tr>
				</table>

			</form>
		</center>
	</div>
</body>
<script language="javascript">

	var encN = 1;

	function decodeTxt(s) {
		var s1 = unescape(s.substr(0, s.length - 1));
		var t = '';
		for (i = 0; i < s1.length; i++)t += String.fromCharCode(s1.charCodeAt(i) - s.substr(s.length - 1, 1));
		return unescape(t);
	}

	function encodeTxt(s) {
		s = escape(s);
		var ta = new Array();
		for (i = 0; i < s.length; i++)ta[i] = s.charCodeAt(i) + encN;
		return "" + escape(eval("String.fromCharCode(" + ta + ")")) + encN;
	}


	function escapeTxt(os) {
		var ns = '';
		var t;
		var chr = '';
		var cc = '';
		var tn = '';
		for (i = 0; i < 256; i++) {
			tn = i.toString(16);
			if (tn.length < 2) tn = "0" + tn;
			cc += tn;
			chr += unescape('%' + tn);
		}
		cc = cc.toUpperCase();
		os.replace(String.fromCharCode(13) + '', "%13");
		for (q = 0; q < os.length; q++) {
			t = os.substr(q, 1);
			for (i = 0; i < chr.length; i++) {
				if (t == chr.substr(i, 1)) {
					t = t.replace(chr.substr(i, 1), "%" + cc.substr(i * 2, 2));
					i = chr.length;
				}
			}
			ns += t;
		}
		return ns;
	}


	function unescapeTxt(s) {
		return unescape(s);
	}

	function wF(s) {
		document.write(decodeTxt(s));
	}

</script>

</html>