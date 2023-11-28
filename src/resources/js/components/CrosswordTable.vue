<template>
    <div class="container my-5">
        <h3>Crossword</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Question</th>
                <th>Answer</th>
                <th>Length</th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="word in crossword">
                <td>{{word.question}}</td>
                <td>{{word.answer}}</td>
                <td>{{word.length}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        crossword: {
            type: Array,
        },
    },
}
</script>
