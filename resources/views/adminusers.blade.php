@extends('adminmenu')
@section('admin_content')

<?php
	function getPermit($permit_val, $index){
		for($i = 0; $i< count($permit_val); $i++){
			if($permit_val[$i]->type ==  $index)
				return 1;
		}
		return 0;
	}
?>

	<section class="content-header">
      <h1>
         Admin User Management 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/adminusers"><i class="fa fa-user"></i> Adminusers</a></li>
      </ol>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"></h3>
					</div>
					<div class="box-body">
						<table class="table table-hover table-bordered table-striped" style = "text-align: center;">
							 <thead>           
								  <tr>
									<th>Name</th>
									<th>User Type</th>
									<th>Email</th>
									<th>Permission</th>
									<th>Action</th>
								  </tr>
							</thead>         
									<?php  $i = 0; ?>
									<tbody>
									
									@foreach($users as $user)
										@if($user->usertype == 2)
											@continue
										@endif
									  <tr class="odd gradeX">
										<td>
											{{$user->name}}
										</td>
										
										<td>
											@if($user->usertype == 1)
												Artiste
											@elseif($user->type == 0)
												Fan
											@endif
												
										</td>
										<td>{{$user->email}}</td>
										<td class = 'permission-td'>
										
										
											<label class = 'checkbox-inline'>
												<input type = "checkbox" class = 'access-permission' data-type = '0' <?php if(getPermit($user['permission'], 0)) echo 'checked' ?> > Music
											</label>
											
											<label class = 'checkbox-inline'>
												<input type = "checkbox" class = 'access-permission' data-type = '1' <?php if(getPermit($user['permission'], 1)) echo 'checked' ?>> Lyrics
											</label>
											
											<label class = 'checkbox-inline'>
												<input type = "checkbox" class = 'access-permission' data-type = '2' <?php if(getPermit($user['permission'], 2)) echo 'checked' ?>> News
											</label>
											
											<label class = 'checkbox-inline'>
												<input type = "checkbox" class = 'access-permission' data-type = '5' <?php if(getPermit($user['permission'], 5)) echo 'checked' ?>> Comment
											</label>
											
											
											<label class = 'checkbox-inline'>
												<input type = "checkbox" class = 'access-permission' data-type = '3' <?php if(getPermit($user['permission'], 3)) echo 'checked' ?>> Ads
											</label>
											
											<label class = 'checkbox-inline'>
												<input type = "checkbox" class = 'access-permission' data-type = '4' <?php if(getPermit($user['permission'], 4)) echo 'checked' ?>> Users
											</label>
											
											<label class = 'checkbox-inline'>
												<input type = "checkbox" class = 'access-permission' data-type = '6' <?php if($user['approved'] == 1) echo 'checked' ?>> Approve
											</label>
											
											
										</td>
										<td>
										
											<a class="btn btn-info btn-xs admin-permission-user" data-user-id = "{{$user->id}}" href = "/permission/{{$user->id}}" style = "display:none;">Set</a>
											
											@if($user->status == 1)
											<button class="btn btn-primary btn-xs admin-block-user" data-id = "{{$user->id}}">Block</button>
											@else
											<button class="btn btn-danger btn-xs admin-unblock-user" data-id = "{{$user->id}}">UnBlock</button>
											@endif
											
											<a class="btn btn-danger btn-xs admin-untrash-user"  href = "/deleteuser/{{$user->id}}">Trash</a>
											
										</td>
									  </tr>
								@endforeach
  
									</tbody>
														
						</table>
					</div>
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
		</section>
		
	   <div class = "col-xs-12" style = "text-align:center;">
			@if(count($users))
				{{$users->links()}}
			@endif
		</div>
	
	 
	 @stop     