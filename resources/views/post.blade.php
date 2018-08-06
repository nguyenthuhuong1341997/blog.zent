@extends('master')

@section('content')

    <button data-title="add" data-toggle="modal" data-target="#add" class="btn btn-warning">ADD </button>
    <div class="card-body table-responsive">
        <table class="table table-bordered" id="post-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Name</th>
                    <!-- <th>Photo</th> -->
                    <!-- <th>Created At</th> -->
                    <!-- <th>Updated At</th> -->
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="modal fade" id="add" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">New Post</h4>
                </div>
                <div class="modal-body">
                    <form action="{{asset('')}}admin/posts" method="POST" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="">Title(*)</label>
                            <input type="text" class="form-control" id="" placeholder="Input field" name="title" value="{{old('title')}}">
                        </div>
                        @if($errors->has('title'))
                            <p style="color: red">{{$errors->first('title')}}</p>
                        @endif
                        <div class="form-group">
                            <label for="">Description(*)</label>
                            <input type="text" class="form-control" id="" placeholder="Input field" name="description" value="{{old('description')}}">
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Description(*)</label>
                            <textarea type="text" class="form-control" id="" placeholder="Input field" name="description"  value="{{old('description')}}"></textarea>
                        </div> -->
                        @if($errors->has('description'))
                            <p style="color: red">{{$errors->first('description')}}</p>
                        @endif
                        <div class="form-group">
                            
                                <label for="">Content</label>
                                <textarea id="editor2" class="form-control" name="content" placeholder="Input field" rows="3"></textarea>
                            
                        </div>
                        @if($errors->has('content'))
                            <p style="color: red">{{$errors->first('content')}}</p>
                        @endif
                        <div class="form-group">
                            <label for="">Thumbnail</label>
                            <input type="text" class="form-control" id="" placeholder="Input field" name="thumbnail" value="{{old('thumbnail')}}">
                        </div>
                        @if($errors->has('thumbnail'))
                            <p style="color: red">{{$errors->first('thumbnail')}}</p>
                        @endif
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" id="" placeholder="Input field" name="slug" value="{{old('slug')}}">
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục</label>
                            <select name="category_id" class="form-control">
                            <?php foreach ($categories as $catgr) {
                            ?>
                              <option value="<?= $catgr['id']?>"><?= $catgr['name']?></option>
                            <?php } ?>
                              
                            </select>
                        </div>
                        
                        <!-- <input type="hidden" name="user_id" id="" class="form-control" value="{{Auth::user()->id}}"> -->
                        <!-- <div class="form-group">
                            <label for="">Author</label>
                            <input type="text" class="form-control" id="" placeholder="Input field" name="name">
                        </div> -->
                        <button type="submit" name= "submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <div id="show" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Information Posts</h4>
                </div>
                <div class="modal-body">
                    <div class="container"> 
                        <div class="row">
                            <div class="col-md-12" style="padding-top: 1100px;">
                                <div class="span2 col-md-12">
                                    <h5 id="title" class="col-md-10"></h5>  
                                    <img  src="" id="thumbnail" style="width: 440px;">
                                </div> 
                                <div class="span4">
                                    
                                    <p>
                                         <i><span id="description"></span></i>
                                        <br>
                                        <p><span id="content"></span></p>
                                        <br>
                                    </p>
                                </div>
                            </div>
                        </div> 
                        
                    </div>
                    <div style="height: 50px"></div>
                </div>
            </div>
            <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog --> 
    </div>
    <div id="detail" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Information Category</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container"> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="span2 col-md-12">
                                            <h1 id="name" class="col-md-10">
                                            </h1>  
                                            <img class="img-responsive col-md-8" src="" id="thumbnail" style="float: left;">
                                        </div> 
                                        <div class="span4">
                                            
                                            <p>
                                                 <h3><i class="fa fa-pencil"></i> Slug: </h3><span id="slug"></span>
                                                <br>
                                                <h3><i class="fa fa-envelope"></i> Decription: </h3><span id="description"></span>
                                                <br>
                                            </p>
                                        </div>
                                    </div>
                                </div> 
                                
                            </div>
                            <div style="height: 50px"></div>
                        </div>
                    </div>
                    <!-- /.modal-content --> 
                </div>
                <!-- /.modal-dialog --> 
            </div>
@endsection

@section('footer')
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $(function () {
            CKEDITOR.replace('editor2');
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5();
         });
</script>
<script type="text/javascript">
    $(function() {

        var table = $('#post-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{asset('')}}admin/postlist",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action' },

            ]
        });
        $('#post-table').on('click','.btn-danger',function(){
            var post_id= $(this).attr('PostId');
            
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this post!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                type: 'delete',
                url: 'postResource/' + post_id,
                success:function(response){
                    table.ajax.reload();
                }
            })
                swal("Poof! Your post has been deleted!", {
                  icon: "success",
                });
              } else {
                swal("Your post is safe!");
              }
            });
            // })
        });

        $(document).on('click','.show', function(){
                var id=$(this).attr("PostId");
                $.ajax({
                    url: 'posts/show/'+id,
                    method: 'GET',
                    
                    // dataType: 'JSON',
                    success: function (response) {
                        console.log(response);
                        
                        $('#title').text(response.title);
                        document.getElementById("thumbnail").src=response.thumbnail;
                        $('#content').text(response.content);
                        $('#slug').text(response.slug);
                        $('#description').text(response.description);

                    }
                });
            });

        
        //display modal form for task editing
        // $(document).on('click','.edit', function(){
        //     var id=$(this).attr("PostId");
        //         $.ajax({
        //             url: 'posts/show/'+id,
        //             method: 'GET',
        //         success: function (response) {
        //             // console.log(response);
                    
        //             $('#title').val(name);
        //             $('#thumbnail').val(thumbnail);
        //             $('#description').val(description);
        //             $('#content').val("content");
        //             $('#slug').val("slug");


        //         }
            // var url= 'usersxx/';
            // var user_id= $(this).attr('userId');
            // $.get('/posts/show/' + user_id, function (data) {
                //success data
                // console.log(data);
                // $('#title').val(name);
                // $('#thumbnail').val(thumbnail);
                // $('#description').val(description);
                // $('#btn-save').val("update");

                // $('#myModal').modal('show');
            // }) 
        // *});
    });
    </script>
@endsection


