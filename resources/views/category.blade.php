@extends('master')

@section('content')

    <button data-title="add" data-toggle="modal" data-target="#add" class="btn btn-warning">ADD CATEGORY</button>
    <div class="card-body table-responsive">
        <table class="table table-bordered" id="category-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Thumnail</th>
                    <th style="width: 150px">Slug</th>
                    <!-- <th>Description</th> -->
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
                    <h4 class="modal-title">New Category</h4>
                </div>
                <div class="modal-body">
                    <form action="{{asset('')}}admin/categories" method="POST" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="">Name(*)</label>
                            <input type="text" class="form-control" id="" placeholder="Input field" name="name" value="{{old('name')}}">
                        </div>
                        @if($errors->has('name'))
                            <p style="color: red">{{$errors->first('name')}}</p>
                        @endif
                        <div class="form-group">
                            <label for="">Thumbnail(*)</label>
                            <input type="text" class="form-control" id="" placeholder="Input field" name="thumbnail" value="{{old('thumbnail')}}">
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Description(*)</label>
                            <textarea type="text" class="form-control" id="" placeholder="Input field" name="description"  value="{{old('description')}}"></textarea>
                        </div> -->
                        @if($errors->has('description'))
                            <p style="color: red">{{$errors->first('description')}}</p>
                        @endif
                        
                        <div class="form-group">
                            <label for="">Description(*)</label>
                            <textarea class="form-control" id="contents" name="description" rows="3"></textarea value="{{old('description')}}">
                                <script>
                                    CKEDITOR.replace( 'descriptions' );
                                </script>
                        </div>
                        @if($errors->has('description'))
                            <p style="color: red">{{$errors->first('description')}}</p>
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
    
@endsection

@section('footer')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
    $(function() {

        var table = $('#category-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{asset('')}}admin/categorylist",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'thumbnail', name: 'thumbnail' },
                { data: 'slug', name: 'slug' },
                // { data: 'description', name: 'description' },
                { data: 'action', name: 'action' },

            ]
        });
        $('#post-table').on('click','.btn-danger',function(){
            var post_id= $(this).attr('PostId');
            
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
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
                swal("Poof! Your imaginary file has been deleted!", {
                  icon: "success",
                });
              } else {
                swal("Your imaginary file is safe!");
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

    });
    </script>
@endsection


