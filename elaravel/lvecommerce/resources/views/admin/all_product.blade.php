@extends('admin_layout')
@section('admin_dashboard')


<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">All Product</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Product</h2>

					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product Id</th>
								  <th>Product Name</th>
								  <th>Product Image</th>
								  <th>Product Price</th>
								  <th>Category Name</th>
								  <th>Manufacture Name</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  
                      


                         <p class="alert-success">
							<?php
							$message = Session::get('message');
							if ($message) {
								   echo $message;
								   Session::put('message',null);
							}
						?>
						</p>

                          @foreach($all_product_info as $product)
						  <tbody>
							<tr>
								<td>{{$product->product_id}}</td>
								<td class="center">{{$product->product_name}}</td>
								
								<td><img src="{{URL::to($product->product_image)}}" style="height: 50px; width: 50px;"></td>
								<td class="center">{{$product->product_price}}</td>
								<td class="center">{{$product->category_name}}</td>
								<td class="center">{{$product->manufacture_name}}</td>
								
								<td class="center">
                                
                                @if($product->publication_status==1)
                                    <span class="label label-success">Active</span>
									@else
									<span class="label label-danger">Unactive</span>
									@endif
								</td>
								
								<td class="center">
									@if($product->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/unactive-product'.$product->product_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
                                     @else
                                     <a class="btn btn-success" href="{{URL::to('/active-product'.$product->product_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									 </a>
                                    @endif
									
									<a class="btn btn-info" href="{{URL::to('/edit-product'.$product->product_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-product'.$product->product_id)}}" id="delete">
										<i class="halflings-icon white trash"></i> 
									</a>

								</td>

							</tr>

						  </tbody>
						  @endforeach

                


					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->





@endsection