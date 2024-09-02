@extends('layouts.admin')
@section('admin.main')
        <div class="pagetitle">
            <h1>Trang chủ</h1>
        </div><!-- End Page Title -->

        @if( $_authorization('admin', 'dashboard', 'index', true) )
            <section class="section dashboard" id="dashboard"></section>
            <input type="hidden" value="{{ route('admin.dashboard.render') }}" id="dashboard-render-url">
        @endif
@endsection

@section('admin.script')
  <script>
    // Define API
    async function fetchAPI(url, formData) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Handle successful response from the server
                    let result = JSON.parse(xhr.response);
                    document.getElementById("dashboard").innerHTML = result.template;

                } else {
                    // Handle error response from the server
                    console.error('Failed to upload files.');
                }
            }
        };
        xhr.send(formData);
    }

    // render
    const formData = new FormData();
    formData.append("_token", document.querySelector("#csrf-token").content);
    const urlElement = document.getElementById('dashboard-render-url');

    if( urlElement ){
        fetchAPI(urlElement.value, formData);

        // update after 5s
        setInterval(function(){
            fetchAPI(urlElement.value, formData);
        }, 5000);
    }
  </script>
@endsection