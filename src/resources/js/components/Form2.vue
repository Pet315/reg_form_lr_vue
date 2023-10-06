<template>
    {{ formData }}
    <form id="form2" @submit.prevent="submitForm" enctype="multipart/form-data">
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
            formData: {
                first_name: this.responseData.request.first_name,
                last_name: this.responseData.request.last_name,
                birthdate: this.responseData.request.birthdate,
                report_subject: this.responseData.request.report_subject,
                country: this.responseData.request.country,
                phone: this.responseData.request.phone,
                email: this.responseData.request.email,
                company: '',
                position: '',
                about_me: '',
                photo: ''
            },
            fileSizeError: '',
        };
    },
    // created() {
    //     const queryData = this.$route.query.data;
    //     if (queryData) {
    //         this.receivedData = JSON.parse(decodeURIComponent(queryData));
    //     }
    // },
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
                    console.log(photoInput.files[0]);
                    this.formData.photo = photoInput.files[0]['name'];
                }
            }
        },
        submitForm() {
            axios.post('/submit_form2', this.formData)
                .then(response => {
                    if (response.status === 200) {
                        const data = encodeURIComponent(JSON.stringify(response.data));
                        window.location.href = `/social_buttons?data=${data}`;
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

