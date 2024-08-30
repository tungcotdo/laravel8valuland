@if( isset( $sale->sale_video_path ) && !empty( $sale->sale_video_path ) )
    <div class="col-md-12">
        <a href="#" class="btn btn-sm btn-danger mb-3 sale-video-delete" id="{{route('shared.salevideo.delete', $sale->sale_id)}}"><i class="bi bi-trash"></i> Xóa video</a>
        <video controls class="w-100">
        <source src="{{asset($sale->sale_video_path)}}" type="video/mp4">
            Your browser does not support HTML video.
        </video>
    </div>
@else
    <div class="col-md-12">
        <a href="#" class="btn btn-sm btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#videoModal"><i class="bi bi-plus-lg"></i> Thêm mới video</a>
    </div>
@endif