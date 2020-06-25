<template>
    <div class="container flex">
        <div class="justify-center">
            <div class="w-6/12">
                <div class="card bg-gray-600 text-white">
                    <div class="card-header text-2xl">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
