<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
    <div class="modal fade" id="create">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">New Category</h4>
				</div>
				<div class="modal-body">
					<form  method="POST" role="form">
						@csrf
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="name">
						</div>

						<div class="form-group">
							<label for="">Slug</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="slug">
						</div>

						<div class="form-group">
							<label for="">Description</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="description">
						</div>

						<div class="form-group">
		                    <label for="exampleInputFile">Thumbnail</label>
		                    <div class="input-group">
		                      	<div class="custom-file">
			                        <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">			                        
		                      	</div>
		                    </div>
		                </div>
					
						
					
						<button type="submit" class="btn btn-primary" class="create">Create</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>


