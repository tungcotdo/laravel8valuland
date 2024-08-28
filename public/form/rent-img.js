// Define API
async function fetchAPI(url, formData) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Handle successful response from the server
                let result = JSON.parse(xhr.response);
                document.getElementById("rent-img").innerHTML = result.template;
                document.getElementById("modal__loading").style.display = "none";
                
                // Delete files
                document.querySelectorAll('.rent-img-delete').forEach(btn => {
                    btn.addEventListener('click', e => {
                        document.getElementById("modal__loading").style.display = "block";
                        const formData = new FormData();
                        formData.append("_token", document.querySelector("#csrf-token").content);
                        fetchAPI(btn.getAttribute("id"), formData);
                    })
                });

            } else {
                // Handle error response from the server
                console.error('Failed to upload files.');
            }
        }
    };
    xhr.send(formData);
}

// Load IMG data
const formData = new FormData();
formData.append("_token", document.querySelector("#csrf-token").content);
fetchAPI(document.getElementById('rent-loadimg-url').value, formData);

// Validate img uploading
Validator({
    form: '#admin-rent-uploadimg',
    rules: [
        Validator.file({
            required: true,
            selector: '#rent_img_input',
            extension: ['png','jpg'],
            submit: true
        })
    ],
    onSubmit: (data) => {
        document.getElementById("modal__loading").style.display = "block";
        document.getElementById("btn-img-modal-close").click();

        const formData = new FormData();
        formData.append("_token", document.querySelector("#csrf-token").content);

        let selectedFiles = document.querySelector('#rent_img_input').files;
        if (selectedFiles.length === 0) {
            alert("Bạn chưa chọn ảnh!");
            return;
        }

        for (let i = 0; i < selectedFiles.length; i++) {
            formData.append("files[]", selectedFiles[i]);
        }

        fetchAPI(data.form.action, formData);
    }
});

// Validate upload form
Validator({
    form: '#admin-rent-edit',
    rules: [
        Validator.tbRequired({
            selector: '#code',
            submit: true
        }),
        Validator.tbRequired({
            selector: '#owner_name',
            submit: true
        }),

        Validator.tbRequired({
            selector: '#owner_phone',
            submit: true
        })
    ],
    onSubmit: (data) => {
        document.getElementById("modal__loading").style.display = "block";
        data.form.submit();
    }
});
  