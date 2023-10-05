<template>
    <form @submit.prevent="submitForm" id="form1">
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name (max length: 30 symbols):</label>
            <input type="text" class="form-control" name="first_name" v-model="formData.first_name" maxlength="30">
            <small class="form-text text-danger" v-if="errors.first_name">{{ errors.first_name[0] }}</small>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name (max length: 50):</label>
            <input type="text" class="form-control" name="last_name" v-model="formData.last_name" maxlength="50">
            <small class="form-text text-danger" v-if="errors.last_name">{{ errors.last_name[0] }}</small>
        </div>

        <div class="mb-3">
            <label for="birthdate" class="form-label">Birth date:</label>
            <input type="date" class="form-control" name="birthdate" :max="maxDate" v-model="formData.birthdate">
            <small class="form-text text-danger" v-if="errors.birthdate">{{ errors.birthdate[0] }}</small>
        </div>

        <div class="mb-3">
            <label for="report_subject" class="form-label">Report Subject (max length: 150):</label>
            <input type="text" class="form-control" name="report_subject" v-model="formData.report_subject" maxlength="150">
            <small class="form-text text-danger" v-if="errors.report_subject">{{ errors.report_subject[0] }}</small>
        </div>

        <div class="mb-3">
            <label for="country" class="form-label">Country:</label>
            <select id="country" name="country" class="form-select search_select_box" v-model="formData.country">
<!--                <option v-if="!formData.country" value="">Ukraine</option>-->
                <option v-for="country in countries" :key="country" :value="country">{{ country }}</option>
            </select>
            <span v-if="formData.country" class="d-none">{{ formData.country[0] }}</span>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone (use this format: +1 (555) 555-5555):</label>
            <input type="text" class="form-control" name="phone" id="phone" v-model="formData.phone">
            <small class="form-text text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email (max length: 70):</label>
            <input type="text" class="form-control" name="email" v-model="formData.email">
            <small class="form-text text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
        </div>

        <button type="submit" class="btn btn-primary" id="nextStep1">Next</button>
    </form>
</template>

<script>
import Inputmask from 'inputmask';

export default {
    data() {
        return {
            formData: {
                first_name: '',
                last_name: '',
                birthdate: '',
                report_subject: '',
                country: '',
                phone: '',
                email: '',
                company: '',
                position: '',
                about_me: '',
                photo: ''
            },
            countries: [],
            errors: {},
        };
    },
    computed: {
        maxDate() {
            const today = new Date();
            const year = today.getFullYear();
            const month = today.getMonth() + 1;
            const day = today.getDate();
            return `${year}-${month < 10 ? '0' + month : month}-${day < 10 ? '0' + day : day}`;
        },
    },
    mounted() {
        this.fetchCountries();
        const phoneInput = document.getElementById('phone');
        Inputmask({ mask: '+9[9] (999) 999-9999' }).mask(phoneInput);
    },
    // directives: {
    //     mask: VueTheMask.directive,
    // },
    methods: {
        fetchCountries() {
            fetch('https://restcountries.com/v3.1/all')
                .then((res) => res.json())
                .then((data) => {
                    this.countries = data.map((country) => country.name['common']).sort();
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        submitForm() {
            axios.post('/submit_form1', this.formData)
                .then(response => {
                    console.log(response.data);
                    // if (response.status === 200) {
                    //     window.location.href = '/step2';
                    // } else {
                    //     console.log('Error');
                    // }
                })

                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        },
    },
};
</script>

