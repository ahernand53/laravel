<template>
    <div class="row">
        <a href="#">Ver respuestas</a>

        <div class="card" v-for="response in responses">
            {{ response.message }}
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                responses: [
                    {
                        message: "Esto es una prueba"
                    }

                ],
            }
        }
    }
</script>

