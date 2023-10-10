<template>
    <div class="container my-5">
        <h4>Members</h4>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th v-for="key in memberKeys">
                    <template v-if="key === 'id'">N</template>
                    <template v-else>{{ key }}</template>
                </th>
                <th>operations</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(member, index) in members" :key="index">
                <td v-for="(value, key) in member">
                    <template v-if="key === 'photo'">
                        <img v-if="value" :src="`img/${value}`" alt="User" />
                        <img v-else src='img/default_user.png' alt="Default User" />
                    </template>
                    <template v-else-if="key === 'id'">
                        {{ index+1 }}
                    </template>
                    <template v-else>
                        {{ value }}
                    </template>
                </td>
                <td>
                    <a :href="`/home/${member.id}/edit`" class="btn btn-success btn-sm">Edit</a>
                    <a :href="`/home/${member.id}/${1}`"
                       v-if="!member.hidden" class="btn btn-secondary btn-sm" id="hide_btn">
                        Hide
                    </a>
                    <a :href="`/home/${member.id}/${0}`"
                       v-if="member.hidden" class="btn btn-secondary btn-sm" id="show_btn">
                        Show
                    </a>

                    <button @click="deleteMember(member.id)" class="btn btn-danger btn-sm" id="del_btn">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        members: Array,
    },
    computed: {
        memberKeys() {
            return Object.keys(this.members[0] || {});
        }
    },
    methods: {
        deleteMember(memberId) {
            if (confirm("Are you sure you want to delete this user?")) {
                axios.delete(`/home/${memberId}`)
                    .then(response => {
                        window.location.href = '/home';
                    })
                    .catch(error => {
                        console.error('Error', error);
                    });
            }
        }
    }
};
</script>
