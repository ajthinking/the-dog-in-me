<template>
    <div class="flex flex-col items-center mx-auto max-w-md bg-indigo-dark mt-8 p-4 text-white font-black">
        <h1>you are {{ Math.floor(accuracy*100) }}% {{ pred_class }}!</h1>
        <img :src="imgPath">
        <a href="https://twitter.com/ajthinking" class="flex flex-col mx-auto w-full items-center no-underline">
            <button class="rounded px-8 py-4 bg-yellow-dark text-black m-2 w-full hover:bg-yellow">
                <span>how this app was built</span>
            </button>
        </a>
        <div class="text-xs font-normal mt-4">
            Powered by math™ and science™. Special thanks to fast.ai
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'accuracy', 'pred_class'
        ],

        computed: {
            imgPath: function() {
                return '/images/' + this.pred_class + '.jpg';
            }
        }
        
        // {{window.result.accuracy}} % {{window.result.pred_class}}
    }
</script>
