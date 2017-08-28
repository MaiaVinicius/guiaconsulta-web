<template>
    <div>
        <app-header></app-header>

        <div class="container-fluid greyBg">
            <div class="row p20 text-center">
                <div class="col-md-12">
                    <h3> Adquira mais pacientes para sua clínica ou consultório</h3>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-md-3 hidden-xs">

                </div>

                <div class="col-md-6 col-xs-12 col-sm-6 p20">

                    <h3 class="text-center"> Monte seu Perfil!</h3>

                    <P class="text-center">Não há custo para usar. Porque não testar?</P>
                    <!-- inicio form de cdastro de clinica ou profissional -->
                    <div class="bs row">


                        <Div class="col-md-12"><h5 class="subLine">Dados da Conta</h5>
                            <div data-toggle="buttons" class="btn-group btn-group-justified fancy-radio-group">
                                <label class="btn btn-fancy-radio text-xs text-no-transform clearfix"> <img
                                        src="images/radio/empty.gif" class="normal"/> <img src="images/radio/cked.gif"
                                                                                           class="checked"/>
                                    <input type="radio" class="hidden ctype" name="ctype" value="fisico"> Pessoa Física
                                </label>
                                <label class="btn btn-fancy-radio text-xs text-no-transform clearfix"> <img
                                        src="images/radio/empty.gif" class="normal"/> <img src="images/radio/cked.gif"
                                                                                           class="checked"/>
                                    <input type="radio" class="hidden ctype" name="ctype" value="juridico">Pessoa Jurídica
                                </label>

                            </div>
                        </Div>
                        <Div class="col-md-12">
                            <div class="pesFisica" style="display:block" id="fisico">

                                <div class="input-group  mb-sm-0 mtop20">
                                    <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    <input type="text" class="form-control"
                                           placeholder="Nome Completo">
                                </div>

                                <div class="input-group mb-sm-0 mtop20">
                                    <div class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true"></i></div>
                                    <input type="text" class="form-control cpf"  placeholder="CPF">
                                </div>
                            </div>
                        </Div>

                        <div class="col-md-12">
                            <h5 class="subLine mtop20">Dados do Consultório</h5>
                            <span class="legenda">* Nessa etapa de cadastro, é necessário informar o endereço de apenas um dos seus consultórios.</span>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group  mtop20">
                                <div class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></div>
                                <input type="text" class="form-control cep"  placeholder="CEP">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="input-group  mtop20">
                                <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                <input type="text" class="form-control"  placeholder="Endereço">
                            </div>
                        </div>


                        <div class="col-md-5">
                            <div class="input-group  mtop20">
                                <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                <input type="text" class="form-control"  placeholder="Número">
                            </div>
                        </div>


                        <div class="col-md-7">
                            <div class="input-group  mtop20">
                                <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                <input type="text" class="form-control"  placeholder="Complemento">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group  mtop20">
                                <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                <input type="text" class="form-control"  placeholder="Bairro">
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="input-group  mtop20">
                                <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                <input type="text" class="form-control"  placeholder="Cidade">
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="input-group  mtop20">
                                <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                <input type="text" class="form-control"  placeholder="Estado">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="input-group  mtop20">
                                <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                <input type="text" class="form-control"  placeholder="DDD">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="input-group  mtop20">
                                <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                <input type="text" class="form-control phone"
                                       placeholder="Telefone do Consultório">
                            </div>
                        </div>

                        <div class="col-md-12 mtop20">

                            <h5 class="subLine">Acesso do Adminsitrador</h5>
                        </div>


                        <div class="col-md-12">
                            <div class="input-group  mtop20">
                                <div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                <input type="email" class="form-control"  placeholder="E-mail">
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="input-group  mtop20">
                                <div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                <input type="password" class="form-control"  placeholder="Senha">
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="input-group  mtop20">
                                <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                <input type="text" class="form-control"  placeholder="DDD">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="input-group  mtop20">
                                <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                <input type="text" class="form-control phone"
                                       placeholder="Telefone do Administrador">
                            </div>
                        </div>


                        <div class="col-md-12 p30 text-right">

                            <button class="btn btn-success">Continuar</button>
                        </div>
                    </div>
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
