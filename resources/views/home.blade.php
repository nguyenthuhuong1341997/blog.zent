@extends('master')

@section('content')

    <button data-title="add" data-toggle="modal" data-target="#add" class="btn btn-warning">ADD USER</button>
    <div class="card-body table-responsive">
        <table class="table table-bordered" id="qqq-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
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
                    <h4 class="modal-title">New User</h4>
                </div>
                <div class="modal-body">
                    <form action="{{asset('')}}admin/dashboard" id="add-user" method="POST" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="">Email(*)</label>
                            <input type="text" class="form-control" id="" placeholder="Input field" name="email" value="{{old('email')}}">
                        </div>
                        
                        @if($errors->has('email'))
                            <p style="color: red">{{$errors->first('email')}}</p>
                        @endif
                        <div class="form-group">
                            <label for="">Name(*)</label>
                            <input type="text" class="form-control" id="" placeholder="Input field" name="name" value="{{old('name')}}">
                        </div>
                        @if($errors->has('name'))
                            <p style="color: red">{{$errors->first('name')}}</p>
                        @endif
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" id="" placeholder="Input field" name="password" value="{{old('password')}}">
                        </div>
                         @if($errors->has('password'))
                            <p style="color: red">{{$errors->first('password')}}</p>
                        @endif
                        <div class="form-group">
                            <label for="">Repeat Password</label>
                            <input type="password" class="form-control" id="" placeholder="Input field" name="password_confirmation" value="{{old('password_confirmation')}}">
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
                    <h4 class="modal-title">Information User</h4>
                </div>
                <div class="modal-body">
                    <div class="container"> 
                        <div class="row">
                            <div class="col-md-12" style="padding-top: 0px;">
                                <form class="form-style-4" action="" method="post">
                                    <div class="col-sm-6" style="float: left;">
                                        <img src="http://icons.iconarchive.com/icons/graphicloads/flat-finance/256/person-icon.png" alt="" style="width: 150px; height: 150px">
                                    </div>
                                    <div class="col-sm-6" style="float: left; padding-top: 30px">
                                        <label for="field1" >
                                        <span>Name: </span><i style="font-style: italic; padding-left: 5 px" id= "nameuser"></i>
                                        </label> <br>
                                        <label for="field2">
                                        <span>Email: </span><i style="font-style: italic; padding-left: 0 px" id= "emailuser"></i>
                                        </label>
                                        <label for="field2">
                                        <span>Username: </span><i style="font-style: italic; padding-left: 0px" id= "emailuser"></i>
                                        </label>
                                    </div>

                                </form>
                            </div>
                        </div> 
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
            <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog --> 
    </div>
    <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit User</h4>
                </div>
                <div class="modal-body">
                    <form  role="form">
                        @csrf
                        <div class="form-group">
                            <label for="">ID</label>
                            <input type="text" class="form-control" id="" placeholder="Input field name" disabled="disabled" name="id" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Name(*)</label>
                            <input type="text" class="form-control" id="" placeholder="Input field name" name="name" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Email(*)</label>
                            <input type="text" class="form-control" id="" placeholder="Input field" name="email" value="">
                        </div>
                        
                        <button type="submit" name= "submit" class="btn btn-primary">Submit</button>
                    </form>
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

        $(document).on('click','.edit',function(){
            var id = $(this).attr('userId');
            $.ajax({
                url : 'dashboard/show/'+id,
                type : 'get',
                success : function(data){
                    console.log(data)
                    $('#edit').find('input[name="id"]').val(data.id);
                    $('#edit').find('input[name="name"]').val(data.name);
                    $('#edit').find('input[name="email"]').val(data.email);
                }
            })
        })
        $('#edit').find('button').click(function(e){
                // e.preventDefault();
                var id = $('#edit').find("input[name='id']").val();
                $.ajax({
                    url : 'dashboard/update/'+id,
                    type : 'post',
                    data : $('#edit').find('form').serialize(),
                    success : function(data){
                        if(data == "yes"){
                            $('#edit').modal('toggle');
                            table.ajax.reload();
                        }
                    }

                })
        })
        
        var table = $('#qqq-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{asset('')}}admin/xxx",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                // { data: 'created_at', name: 'created_at' },
                // { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action' },

            ]
        });
        //Delete user
        $('#qqq-table').on('click','.btn-danger',function(){
            var user_id= $(this).attr('userId');
            
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
                url: 'usersxx/' + user_id,
                success:function(response){
                    table.ajax.reload();
                }
            })
                swal("Poof! Account has been deleted!", {
                  icon: "success",
                });
              } else {
                swal("Account is safe!");
              }
            });
            // })
        });

        //display modal form for task editing
        // $('.open-modal').click(function(){
        //     alert('ffd');
        //     var url= 'usersxx/';
        //     var user_id= $(this).attr('userId');
        //     $.get(url + '/' + user_id, function (data) {
        //         //success data
        //         // console.log(data);
        //         $('#name').val(name);
        //         $('#email').val(email);
        //         $('#password').val(data.password);
        //         $('#btn-save').val("update");

        //         $('#myModal').modal('show');
        //     }) 
        // });
        //show user
        $(document).on('click','.show', function(){
            var id=$(this).attr("userId");
            $.ajax({
                url: 'dashboard/show/'+id,
                method: 'GET',
                
                // dataType: 'JSON',
                success: function (response) {
                    console.log(response);
                    
                    $('#nameuser').text(response.name);
                   
                    $('#emailuser').text(response.email);
                   

                }
            });
        });

    });
    </script>
@endsection


