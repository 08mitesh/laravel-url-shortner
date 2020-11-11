<template>
    <div>
        <app-header></app-header>
        <div class="min-h-screen">
            <Index/>
        </div>
        <app-footer></app-footer>
    </div>

</template>

<script>
    import AppHeader from '../components/Layouts/Header';
    import AppFooter from '../components/Layouts/Footer';
    import Index from "./Layouts/Index";
    export default {
        components: {Index, AppHeader,AppFooter}

    }
</script>

<style scoped>

</style>