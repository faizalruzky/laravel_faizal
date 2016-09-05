<!DOCTYPE html>
<html>
<head>
	<title>Articles Info</title>
</head>
<body>
<form action="postImport" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="file" name="article">
	<input type="submit" name="ImportArticle">
</form>
</body>
</html>