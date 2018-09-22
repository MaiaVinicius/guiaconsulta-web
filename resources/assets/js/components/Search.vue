<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">the search</div>

                    <div class="panel-body">
                        {{term}}
                        {{location}}
                        {{payment}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Search',
        mounted () {
            let p = this.$route.params;

            this.location = p.location;
            this.payment = p.payment;
            this.term = p.term;
            console.log(p);
        },
        data () {
            return {
                location: false,
                payment: false,
                term: false,
            }
        }
    }
</script>
