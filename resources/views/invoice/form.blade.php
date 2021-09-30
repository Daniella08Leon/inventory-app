@extends('layout')

@section('title','Invoices')
@section('encabezado','New Invoices')
@section('content')
<form action="{{ route('brand.save') }}" method="post" id="invoiceForm">
        @csrf
        <div class="row">
         <div class="col-sm-3"><b>Producto</b></div>
         <div class="col-sm-3"><b>Cantidad</b></div>
         <div class="col-sm-3"><b>Precio</b></div>
         <div class="col-sm-3"><b>Total producto</b></div>
        </div>

        <div class="mb-3 row">
            <div class="col-sm-3">
             <select name="product[]" id="product1" class="form-select product"
             data-row="1">
                 <option value="">Seleccione un producto</option>
                 @foreach($products as $product)
                 <option value="{{$product->id}}">{{$product->name}}</option>
                 @endforeach
             </select>
            </div>
            <div class="col-sm-3">
                <input type="number" name="quantity[]" id="quantity1" class="form-control"
                min="1" value="1" data-row="1">

            </div>

            <div class="col-sm-3">
                <input type="number" name="price[]" id="price1" class="form-control"
                data-row="1">
            </div>

            <div class="col-sm-3">
               <input type="text" readonly class="form-control-plaintext" id="totalProduct1">
            </div>
        
    
        </div>

        <div class="row buttons">
         <div class="col-sm-1">
             <button type="button" id="add" class="btn btn-secondary">Añadir prodcuto</button>

         </div>
         <div class="col-sm-10"></div>
    
	          <div class="col-sm-11"></div>
          	<div class="col-sm-1">
	        	<button type="submit" class="btn btn-primary">Save</button>
          	</div>
          </div>
</form>
@endsection
@section('script')
<script>
const productList = @json($products);
console.log(productList)

let elementProduct = document.querySelector('.product')
let elementPrice = document.querySelector('#price1')
let elementQuantity = document.querySelector('#quantity1')
let elementTotalProduct = document.querySelector('#totalProduct1')
let elementAdd = document.querySelector("#add")
let buttonsRow = document.querySelector(".buttons")
var contador=1
init()

elementAdd.addEventListener('click',(event)=>{
    let fila = document.createElement('div')
    fila.className= 'mb-3 row'
    fila.innerHTML=`<div class="mb-3 row">
            <div class="col-sm-3">
             <select name="product[]" id="product${contador}" class="form-select product"
             data-row="1">
                 <option value="">Seleccione un producto</option>
                 @foreach($products as $product)
                 <option value="{{$product->id}}">{{$product->name}}</option>
                 @endforeach
             </select>
            </div>
            <div class="col-sm-3">
                <input type="number" name="quantity[]" id="quantity${contador}"" class="form-control"
                min="1" value="1" data-row="1">

            </div>

            <div class="col-sm-3">
                <input type="number" name="price[]" id="price${contador}"" class="form-control"
                data-row="1">
            </div>

            <div class="col-sm-3">
               <input type="text" readonly class="form-control-plaintext" id="totalProduct${contador}"">
            </div>
        
    
        </div>`
        let form = document.querySelector('#invoiceForm')
        form.insertBefore(fila,buttonsRow)
        init()
})
init()

function init(){
    contador=1
    arrProductList = document.querySelectorAll('.product')
    arrProductList.forEach(elementProduct=>{
        elementPrice = document.querySelector('#price' +contador)
        elementQuantity = document.querySelector('#quantity' +contador)
        elementTotalProduct = document.querySelector('#totalProduct' +contador)
        elementProduct.addEventListener('change', (event)=>{
            let id = event.target.value
            selectedProduct = productList.filter(product=> product.id ==id)
            elementPrice.value = selectedProduct[0].price

            elementTotalProduct.value = elementPrice.value * elementQuantity.value
         })
         contador++
    })
}


elementProduct.addEventListener('change', (event) => {
      let id = event.target.value
      selectedProduct = productList.filter( product => product.id == id)
      elementPrice.value = selectedProduct[0].price
    

      elementTotalProduct.value = elementPrice.value * elementQuantity.value
  })

  elementQuantity.addEventListener('input', (event)=>{
      elementTotalProduct.value = elementPrice.value * elementQuantity.value
  })

  elementPrice.addEventListener('input', (event)=>{
      elementTotalProduct.value = elementPrice.value * elementQuantity.value
  })
</script>
@endsection


