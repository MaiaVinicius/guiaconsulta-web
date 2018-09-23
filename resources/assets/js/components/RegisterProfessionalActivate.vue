<template>
    <div>
        <app-header></app-header>
        <div class="container-fluid greyBg">
            <div class="row p20 text-center">


                <div class="col-md-12">
                    <h3>Bem vindo! Só falta acessar o seu e-mail e ativar sua conta</h3>

                </div>


            </div>


        </div>
        <div class="container">

            <div class="row">
                <div class="col-md-3 hidden-xs">

                </div>

                <div class="col-md-6 col-xs-12 col-sm-6 p20">

                    <h3 class="text-center"> Acabamos de enviar um e-mail para você</h3>

                    <P class="text-center p20">ATENÇÃO: Se o e-mail não estiver na sua caixa de entrada, procure na caixa de
                        Spam ou Lixo eletrônico.</P>
                    <!-- inicio form de cdastro de clinica ou profissional -->
                </div>
            </div>
        </div>

        <hr>
        <app-footer></app-footer>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
