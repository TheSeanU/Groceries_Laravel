@extends ('layout')
@section ('content')

<!-- header just for looks -->
<div class="container-fluid mt-5 mb-5">
   <div class="row w-50 m-auto">
      <div class="col p-0 m-0">
        <h3 class="text-primary">Grocery List</h3>
      </div>
   </div>


<!-- add product to database  -->
<form class="needs-validation w-50 m-auto p-3 text-dark border shadow-sm rounded">
  <h6 class="pb-0">Add a item to your grocery list...</h6>
  <hr class="pt-0 mt-0">
   <div class="row">
     <div class="col">
       <label>Product</label>
         <input type="text" class="form-control" name="product_name" placeholder="Name" required>
       </div>
       <div class="col">
         <label>Price</label>
         <input type="number" class="currency form-control" name="product_price" placeholder="Price" required>
         </div>
       <div class="col">
         <label>Quantity</label>
           <input type="number" class="form-control" name="product_amount" value="1" required>
         </div>
     </div>
     <div class="row">
       <div class="col pb-2 pt-1">
         <label class="p-0">Discription</label>
         <textarea class="form-control" name="product_description" placeholder="Enter a description"></textarea>
       </div>
     </div>
     <div class="row">
       <div class="col text-end">
     <button class="btn btn-primary submitit" type="submit" value="Submit">Submit</button>
   </div>
 </div>
 </form>
 <div class="row w-50 m-auto">
   <div class="col">
     <hr>
   </div>
 </div>



<!-- product from database -->
@foreach ($product as $key => $value)
 <div class="row row-cols-4 w-50 m-auto">
    <div class="col">
      <p class="tooltip--left" data-tooltip="Hey">Short</p>
    </div>
    <div class="col">

     <h6>{{$value->product_name}}</h6>
     <span>description:</span>
     <p>{{$value->product_description}}</p>
</div>
<div class="col">
  <h6>{{$value->product_price}}</h6>
  <p class="border">{{$value->product_amount}}</p>
 </div>
 <div class="col">
<!--- popup that will enable product editing -->
   <button type="button" class="btn btn-primary close" data-bs-toggle="modal" data-bs-target="#edit_product">
     Edit product
   </button>

 </div>
 </div>
 @endforeach




<div class="modal fade close" id="edit_product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Edit the product</h6>
      </div>
      <div class="modal-body">
        <form class="needs-validation">
           <div class="row">
             <div class="col">
               <label>Product</label>
                 <input type="text" class="form-control" name="product_name" placeholder="Name" required>
               </div>
               <div class="col">
                 <label>Price</label>
                 <input type="number" class="currency form-control" name="product_price" placeholder="Price" required>
                 </div>
               <div class="col col-quan">
                 <label>Quantity</label>
                   <input type="number" class="form-control" name="product_amount" value="1" required>
                 </div>
             </div>
             <div class="row">
               <div class="col pb-2 pt-1">
                 <label class="p-0">Discription</label>
                 <textarea class="form-control" name="product_description" placeholder="Enter a description"></textarea>
               </div>
             </div>
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
