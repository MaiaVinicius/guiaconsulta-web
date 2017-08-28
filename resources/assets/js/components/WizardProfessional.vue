<template>
    <div>
        <app-header></app-header>

        <div class="container-fluid greyBg">
            <div class="row p20 text-center">
                <div class="col-md-12">
                    <h3>Cadastro de Profissional</h3>

                </div>
            </div>
        </div>
        <div class="container">

            <div class="row">


                <div class="col-md-12 col-xs-12 col-sm-12 mtop20">
                    <div class="alert alert-warning" role="alert">
                        As informações serão auditadas e estão sujeitas a revisão
                    </div>

                </div>

                <div class="col-md-12 wizard">
                    <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                        <li v-for="step in steps" v-bind:class="{ disabled: current_step != step.id, active: current_step == step.id }">
                            <a href="#">
                            <h4 class="list-group-item-heading">
                                <button class="btn btn-circle btn-info">{{step.id}}</button>
                            </h4>
                            <p class="list-group-item-text hidden-xs"> {{step.label}}</p>
                        </a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12  stepsHolder">
                    <div class="col-md-12 well setup-content text-center" id="step-1">
                        <!-- <h1> Passo 1</h1>-->
                        <div class="row p20  text-left">
                            <div class="col-md-4 col-sm-12 mtop20">
                                <label for="">Selecione o Conselho</label>
                                <select class="form-control" name="conselho">
                                    <option>Selecione o Conselho</option>
                                    <option>CRM</option>
                                    <option>CRO</option>
                                    <option>CREFITO</option>
                                </select>

                            </div>

                            <div class="col-md-3 col-sm-12 mtop20">

                                <label for="">Selecione Estado do Conselho</label>
                                <select class="form-control" name="conselho">
                                    <option>Selecione o Conselho</option>
                                    <option>RJ</option>
                                    <option>SP</option>
                                    <option>MG</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-12 mtop20">

                                <label for="">Número do Conselho</label>
                                <div class="input-group ">
                                    <div class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" class="form-control"
                                           placeholder="Número do Conselho">
                                </div>
                            </div>


                            <div class="col-md-3 col-sm-12 mtop20">

                                <label for="">CPF</label>
                                <div class="input-group ">
                                    <div class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="CPF">
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-12 mtop20">

                                <label for="">Nome Completo do Profissional</label>
                                <div class="input-group ">
                                    <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    <input type="text" class="form-control"
                                           placeholder="Nome do Profissional">
                                </div>

                            </div>

                            <div class="col-md-12 col-sm-12 mtop20">


                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Apresentação profissional</label>
                                    <textarea class="form-control" rows="6"></textarea>
                                    <span class="legenda">Máximo de 500 caracteres.</span>
                                </div>

                            </div>

                            <div class="col-md-12 col-sm-12 mtop20">


                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Formação acadêmica (graduação, pós graduação,
                                        residência)</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                                    <span class="legenda">Máximo de 500 caracteres.</span>
                                </div>

                            </div>


                            <div class="col-md-6 text-left">
                                <button id="#" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"
                                                                                    aria-hidden="true"></i> Voltar
                                </button>
                                <button id="activate-step-2" class="btn btn-primary colorBase ">Continuar <i
                                        class="fa fa-arrow-right" aria-hidden="true"></i></button>

                            </div>

                            <div class="col-md-6 text-right">

                                <!--   <button id="activate-step-2" class="btn btn-primary btn-lg">Próximo</button>-->

                            </div>


                        </div>

                    </div>


                </div>
            </div>

            <div class="row" v-if="current_step == 2">
                <div class="col-xs-12  col-md-12  stepsHolder">
                    <div class="col-md-12 well setup-content" id="step-2">

                        <div class="col-md-12">

                            <div class="box text-center">
                                <input type="file" name="avatarMedico" id="avatarMedico" class="inputfile"
                                       data-multiple-caption="{count} files selected"/>
                                <label for="avatarMedico" class="inputfileLabel"><i class="fa fa-cloud-upload"
                                                                                    aria-hidden="true"></i> <span
                                        class="btn btn-outline-info">Escolha uma foto</span></label>
                            </div>

                        </div>
                        <div class="col-md-6 text-left">
                            <button id="" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"
                                                                               aria-hidden="true"></i>
                                Voltar
                            </button>
                            <button id="activate-step-3" class="btn btn-primary colorBase ">Continuar <i
                                    class="fa fa-arrow-right" aria-hidden="true"></i></button>

                        </div>

                        <div class="col-md-6 text-right">

                            <!--   <button id="activate-step-2" class="btn btn-primary btn-lg">Próximo</button>-->

                        </div>


                    </div>
                </div>
            </div>
            <div class="row" v-if="current_step == 3">
                <div class="col-xs-12  col-md-12  stepsHolder">
                    <div class="col-md-12 well setup-content" id="step-3">

                        <div class="row">
                            <div class="col-md-6">


                            </div>

                            <div class="col-md-6 text-right">
                                <button class="btn btn-info colorBase"> Adicionar Especialidade</button>

                            </div>
                            <div class="col-md-6">
                                <label>Selecione a Especialidade</label>
                                <select class="form-control" name="conselho">
                                    <option>Escolha uma especialidade</option>
                                    <option>Médico - Acupuntura</option>
                                    <option>Médico - Cardiologia</option>
                                    <option>Médico - Dermatologia</option>
                                </select>


                            </div>

                            <div class="col-md-6">
                                <label>RQE</label>
                                <div class="input-group ">
                                    <div class="input-group-addon"> RQE</div>
                                    <input type="text" class="form-control"
                                           placeholder="Nome do Profissional">
                                </div>

                            </div>

                            <div class="col-md-12">
                                <h4 class="mtop20 bb1">Área de Atuação</h4>
                                <div class="row bb1">
                                    <div class="col-md-1 ">

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">

                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 espname"> Nome subsespecialidade</div>
                                    <div class="col-md-5">
                                        <div class="input-group ">
                                            <div class="input-group-addon"> RQE</div>
                                            <input type="text" class="form-control"
                                                   placeholder="Nome do Profissional">
                                        </div>
                                    </div>
                                </div>
                                <div class="row bb1">
                                    <div class="col-md-1 ">

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">

                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 espname"> Nome subsespecialidade</div>
                                    <div class="col-md-5">
                                        <div class="input-group ">
                                            <div class="input-group-addon"> RQE</div>
                                            <input type="text" class="form-control"
                                                   placeholder="Nome do Profissional">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-6 mtop20 text-left">
                            <button class="btn btn-outline-secondary"><i class="fa fa-arrow-left"
                                                                         aria-hidden="true"></i>
                                Voltar
                            </button>
                            <button id="activate-step-4" class="btn btn-primary colorBase ">Continuar <i
                                    class="fa fa-arrow-right" aria-hidden="true"></i></button>

                        </div>

                        <div class="col-md-6 mtop20 text-right">

                            <!--   <button id="activate-step-2" class="btn btn-primary btn-lg">Próximo</button>-->

                        </div>
                    </div>

                </div>
            </div>
            <div class="row" v-if="current_step == 4">
                <div class="col-xs-12  col-md-12  stepsHolder">
                    <div class="col-md-12 well setup-content" id="step-4">
                        <h1 class="text-center"> 4</h1>
                    </div>
                </div>
            </div>
            <div class="row" v-if="current_step == 5">
                <div class="col-xs-12  col-md-12 stepsHolder">
                    <div class="col-md-12 well setup-content" id="step-5">
                        <h1 class="text-center"> 5</h1>
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
        },
        data () {
            return {
                current_step: 1,
                steps: [{
                    id: 1,
                    label: 'Dados do perfil'
                }, {
                    id: 2,
                    label: 'Foto'
                }, {
                    id: 3,
                    label: 'Especialidades'
                }, {
                    id: 4,
                    label: 'Consultórios'
                }, {
                    id: 5,
                    label: 'Preços e convenios'
                }]
            }
        }
    }
</script>
