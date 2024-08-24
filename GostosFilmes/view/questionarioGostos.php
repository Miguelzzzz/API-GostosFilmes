<?php
include_once("../controller/questionarioGostos.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Tela PHP</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<br>
		<div class="col-12">
			<h3>Gostos Cinematográficos</h3>
			<hr>
			<div class="card">
				<div class="card-header">
					Cadastro
				</div>
				<div class="card-body">
					<form method="POST" action="?acao=cadastrar">
						<div class="form-group">
							<label>Filme Favorito:</label>
							<input type="text" name="filmefavorito" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Genêro Favorito:</label>
							<input type="text" name="generofavorito" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Filme Odiado:</label>
							<input type="text" name="filmeodiado" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Genêro Odiado:</label>
							<input type="text" name="generoodiado" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Ator/Atriz Favorita:</label>
							<input type="text" name="atorfavorito" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Filme que merece sequência:</label>
							<input type="text" name="filmesequencia" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Codigo do entrevistado:</label>
							<input type="text" name="codCliente" class="form-control" required>
						</div>
						<input type="submit" class="btn btn-primary" value="Cadastrar">
					</form>
				</div>
				<div class="card-header">
					Alteração
				</div>
				<div class="card-body">
					<form method="POST" action="?acao=atualizar">
						<div class="form-group">
							<label>Filme Favorito:</label>
							<input type="text" name="filmefavorito" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Genêro Favorito:</label>
							<input type="text" name="generofavorito" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Filme Odiado:</label>
							<input type="text" name="filmeodiado" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Genêro Odiado:</label>
							<input type="text" name="generoodiado" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Ator/Atriz Favorita:</label>
							<input type="text" name="atorfavorito" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Filme que merece uma sequência:</label>
							<input type="text" name="filmesequencia" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Codigo do entrevistado:</label>
							<input type="text" name="codCliente" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Codigo:</label>
							<input type="text" name="codigo" class="form-control" required>
						</div>
						<input type="submit" class="btn btn-primary" value="Alterar">
					</form>
				</div>
				<div class="card-header">
					Exclusão
				</div>
				<div class="card-body">
					<form method="POST" action="?acao=excluir">
						<div class="form-group">
							<label>Código:</label>
							<input type="text" name="codigo" class="form-control" required>
						</div>
						<input type="submit" class="btn btn-primary" value="Excluir">
					</form>
				</div>
				<div class="card-header">
					Consultar por código
				</div>
				<div class="card-body">
					<form method="POST" action="?acao=retorna_cod">
						<div class="form-group">
							<label>Código:</label>
							<input type="text" name="codigo" class="form-control" required>
						</div>
						<input type="submit" class="btn btn-primary" value="Consultar">
					</form>
				</div>
				<div class="card-header">
					Consultar
				</div>
				<div class="card-body">
					<form method="POST" action="?acao=consultar_json">
						<input type="submit" class="btn btn-primary" value="Consultar">
					</form>
				</div>
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>