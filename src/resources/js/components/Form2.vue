<template>
<!--    {{ formData }}-->
    <form id="form2" @submit.prevent="submitForm">
        <div class="mb-3">
            <label for="company">Company:</label>
            <input type="text" class="form-control" v-model="formData.company">
        </div>
        <div class="mb-3">
            <label for="position">Position:</label>
            <input type="text" class="form-control" v-model="formData.position">
        </div>
        <div class="mb-3">
            <label for="about-me">About me:</label>
            <textarea class="form-control" v-model="formData.about_me" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label for="photo">Photo (file size: 2MB):</label>
            <input
                type="file"
                class="custom-file-input"
                id="photo"
                @change="checkFileSize"
                accept="image/jpeg, image/png"
            >
            <br><small class="form-text text-danger" id="fileSizeError">{{ fileSizeError }}</small>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" id="nextStep2">Next</button>
        </div>
    </form>
</template>

<script>
export default {
    props: {
        responseData: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            formData: this.responseData.request,
            fileSizeError: '',
        };
    },
    methods: {
        checkFileSize(event) {
            const photoInput = event.target;
            if (photoInput.files.length > 0) {
                const fileSize = photoInput.files[0].size / 1024 / 1024;
                if (fileSize > 2) {
                    this.fileSizeError = 'File size should not exceed 2MB.';
                    photoInput.value = '';
                } else {
                    this.fileSizeError = '';
                    // console.log(photoInput.files[0]);
                    this.formData.photo = photoInput.files[0];
                }
            }
        },
        submitForm() {
            axios.post('/submit_form2', this.formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    if (response.status === 200) {
                        window.location.href = `/social_buttons`;
                    } else {
                        console.log('Error');
                    }
                })

                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        },
    },
};
</script>

