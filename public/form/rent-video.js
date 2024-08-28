// Define API
async function fetchVideoAPI(url, formVideo) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Handle successful response from the server
                let result = JSON.parse(xhr.response);
                document.getElementById("rent-video").innerHTML = result.template;
                document.getElementById("modal__loading").style.display = "none";
                
                // Delete files
                document.querySelectorAll('.rent-video-delete').forEach(btn => {
                    btn.addEventListener('click', e => {
                        e.preventDefault();
                        document.getElementById("modal__loading").style.display = "block";
                        const formVideo = new FormData();
                        formVideo.append("_token", document.querySelector("#csrf-token").content);
                        fetchVideoAPI(btn.getAttribute("id"), formVideo);
                    })
                });

            } else {
                // Handle error response from the server
                console.error('Failed to upload files.');
            }
        }
    };
    xhr.send(formVideo);
}

// Load video data
const formVideo = new FormData();
formVideo.append("_token", document.querySelector("#csrf-token").content);
fetchVideoAPI(document.getElementById('admin-rentvideo-upload-url').value, formVideo);

// Validate video uploading
Validator({
    form: '#admin-rentvideo-upload',
    rules: [
        Validator.file({
            required: true,
            selector: '#rent_video_input',
            extension: ['mp4'],
            submit: true
        })
    ],
    onSubmit: (data) => {
        document.getElementById("modal__loading").style.display = "block";
        document.getElementById("btn-video-modal-close").click();

        const formVideo = new FormData();
        formVideo.append("_token", document.querySelector("#csrf-token").content);

        let videoFile = document.querySelector('#rent_video_input').files[0];

        if (videoFile.length === 0) {
            alert("Bạn chưa chọn video!");
            return;
        }

        formVideo.append("file", videoFile);
        fetchVideoAPI(data.form.action, formVideo);
    }
});
