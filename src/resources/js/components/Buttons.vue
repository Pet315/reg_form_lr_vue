<template>
    <div class="text-center mt-4">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{encodeURIComponent(responseData.tw.link)}}" class="btn btn-link" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/200px-2021_Facebook_icon.svg.png" alt="FB" id="btn">
        </a>
        <a :href="twUrl" class="btn btn-link" id="tw_link" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/512/145/145812.png" alt="TW" id="btn">
        </a>
    </div>

    <div class="text-center mt-3">
        <a href="/all_members" class="text-decoration-none" target="_blank">
            <h4 id="members_link">All members ({{ responseData.number }})</h4>
        </a>
    </div>
</template>

<script>
export default {
    props: {
        responseData: {
            type: Object,
            required: true,
        },
    },
    computed: {
        twUrl() {
            return 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(this.responseData.tw.text) + '&url=' + encodeURIComponent(this.responseData.tw.link);
        },
    },
}
</script>
