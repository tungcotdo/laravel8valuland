@foreach( $imgs as $value )
    <div class="col-lg-2">  
        <div class="card">
            <div class="card-body text-center">
                <button onclick="return confirm('Bạn có muốn xóa ảnh này không?')" type="button"  id="{{route('admin.saleimg.delete', $value->sale_img_id)}}" class="btn btn-sm btn-danger sale-img-delete"><i class="small bi bi-trash"> Xóa</i> </button>
            </div>
            <a href="{{asset($value->sale_img_path)}}" class="card-img-link" target="_blank"><img class="card-img-top rounded-0" src="{{asset($value->sale_img_path)}}" alt="Card image cap"></a>
        </div>
    </div>
@endforeach