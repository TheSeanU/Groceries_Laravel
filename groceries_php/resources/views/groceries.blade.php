@extends ('layout')
@section ('content')
<!-- header just for looks -->
<div class="container-fluid mt-5 mb-5">
   <div class="row w-50 m-auto">
      <div class="col p-0 m-0">
        <h3 class="text-primary">Grocery List</h3>
        @if (\Session::has('success'))
        <div class="alert alert-success" role="alert">
          <p class="m-0">{!! \Session::get('success') !!}</p>
        </div>
        @endif
      </div>
   </div>

<!-- add product to database  -->
<form method="POST" action="/" accept-charset="UTF-8" class="needs-validation w-50 m-auto p-3 text-dark border shadow-sm rounded">
@csrf
  <h6 class="pb-0">Add a item to your grocery list...</h6>
  <hr class="pt-0 mt-0">
   <div class="row">
     <div class="col">
       <label>Product</label>
         <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" placeholder="Name" >
         @error('product_name')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
       </div>
       <div class="arrow col">
         <label>Price</label>
         <input type="number" class="currency form-control @error('product_price') is-invalid @enderror" name="product_price" step="any" min="0" placeholder="Price">
         @error('product_price')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         </div>
       <div class="col">
         <label>Quantity</label>
           <input type="number" class="form-control @error('product_amount') is-invalid @enderror" name="product_amount" value="1" >
           @error('product_amount')
           <div class="alert alert-danger">{{ $message }}</div>
           @enderror
         </div>
     </div>
     <div class="row">
       <div class="col pb-2 pt-1">
         <label class="p-0">Discription</label>
         <textarea class="form-control @error('product_description') is-invalid @enderror" name="product_description" placeholder="Enter a description"></textarea>
         @error('product_description')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
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
@foreach ($product as $key)
 <div class="row row w-50 m-auto">
   <div class="col-1">
     <form method="POST" action="{{ route('groceries.destroy', $key->id) }}">
        @csrf
        @method('DELETE')
       <button type="submit" class="btn btn-link">
         <svg class="svg-icon" viewBox="0 0 20 20">
         <path fill="none" d="M16.471,5.962c-0.365-0.066-0.709,0.176-0.774,0.538l-1.843,10.217H6.096L4.255,6.5c-0.066-0.362-0.42-0.603-0.775-0.538C3.117,6.027,2.876,6.375,2.942,6.737l1.94,10.765c0.058,0.318,0.334,0.549,0.657,0.549h8.872c0.323,0,0.6-0.23,0.656-0.549l1.941-10.765C17.074,6.375,16.833,6.027,16.471,5.962z"></path>
         <path fill="none" d="M16.594,3.804H3.406c-0.369,0-0.667,0.298-0.667,0.667s0.299,0.667,0.667,0.667h13.188c0.369,0,0.667-0.298,0.667-0.667S16.963,3.804,16.594,3.804z"></path>
         <path fill="none" d="M9.25,3.284h1.501c0.368,0,0.667-0.298,0.667-0.667c0-0.369-0.299-0.667-0.667-0.667H9.25c-0.369,0-0.667,0.298-0.667,0.667C8.583,2.985,8.882,3.284,9.25,3.284z"></path>
       </svg>
     </button>
     </form>
   </div>
    <div class="col-4">
     <h6>{{$key->product_name}}</h6>
     <p>{{$key->product_description}}</p>
   </div>
  <div class="col text-right">
    <h6><span>‎€ ‎</span>{{$key->product_price}}</h6>
    <p data-tooltip="Product amount" class="badge bg-primary text-wrap">{{$key->product_amount}}</p>
   </div>
  <div class="col w-auto">
<!--- popup that will enable product editing -->
   <a type="button" class="btn btn-primary close btn-sm text-end" data-bs-toggle="modal" data-bs-target="#edit_product_{{$key->id}}" >
    <p class="rotate">EDIT</p>
   </a>
  </div>
 </div>
 <div class="row w-50 m-auto">
  <div class="col">
    <hr>
  </div>
 </div>



<!-- For editing products -->
<div class="modal fade close" id="edit_product_{{$key->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <form method="POST" action="{{ route('groceries.update', $key->id)}}">
  @csrf
  @method('PUT')
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Edit the product...</h6>
        <button data-tooltip="Dismiss changes" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
           <div class="row">
             <div class="col">
               <label>Product</label>
                 <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{$key->product_name}}">
                 @error('product_name')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
               </div>
               <div class="arrow col">
                 <label>Price</label>
                 <input type="number" class="currency form-control @error('product_price') is-invalid @enderror" name="product_price" value="{{$key->product_price}}">
                 @error('product_price')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                 </div>
               <div class="col col-quan">
                 <label>Quantity</label>
                   <input type="number" class="form-control @error('product_amount') is-invalid @enderror" name="product_amount" value="{{$key->product_amount}}" >
                   @error('product_amount')
                   <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                 </div>
             </div>
             <div class="row">
               <div class="col pb-2 pt-1">
                 <label class="p-0">Discription</label>
                 <textarea class="form-control @error('product_description') is-invalid @enderror" name="product_description" >{{$key->product_description}}</textarea>
                 @error('product_description')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
               </div>
             </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</form>
</div>


@endforeach
@endsection
