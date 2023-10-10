<template>
    <div class="container my-5">
        <h3>All members</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Full Name</th>
                <th>Report Subject</th>
                <th>Email</th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="member in members" :key="member.id">
                <td v-if="!member.hidden">
                    <img :src="member.photo ? `img/${member.photo}` : 'img/default_user.png'" alt="User">
                </td>
                <td v-if="!member.hidden">{{ member.first_name }} {{ member.last_name }}</td>
                <td v-if="!member.hidden">{{ member.report_subject }}</td>
                <td v-if="!member.hidden"><a :href="'mailto:' + member.email">{{ member.email }}</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        members: {
            type: Array,
            required: true,
        },
    },
}
</script>
